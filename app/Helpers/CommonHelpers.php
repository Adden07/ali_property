<?php

namespace App\Helpers;

use App\Models\ApiResponse;
use App\Models\Shipment;
use App\Models\UserDetails;
use App\Models\Invoice;
use App\Models\User;
use App\Models\ActivityLog;
use App\Models\Radacct;
use App\Models\Nas;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use SoapClient;
use App\Models\Admin;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CommonHelpers
{
    public static function send_email($view, $data, $to, $subject = 'Welcome !', $from_email = null, $from_name = null)
    {
        $from_name = $from_name ?? config('mail.from.address');
        $from_email = $from_email ?? config('mail.from.name');
        $data['subject'] = $subject;
        $data['to'] = $to;
        $data['from_name'] = $from_name;
        $data['from_email'] = $from_email;

        $sentEmail = CommonHelpers::save_email_to_db($data, $view, $data);

        $data['email_id'] = hashids_encode($sentEmail->id);
        $data['email_data'] = $data;

        try {
            Mail::send('emails.' . $view, $data, function ($message) use ($data) {
                $message->from($data['from_email'], $data['from_name']);
                $message->subject($data['subject']);
                $message->to($data['to']);
            });
            return true;
        } catch (\Exception $ex) {
            return response()->json($ex);
        }
    }

    public static function save_email_to_db($data, $view, $email_data)
    {
        $sentEmail = new \App\Models\UsersEmail();
        $sentEmail->user_id = $data['user_id'] ?? null;
        $sentEmail->user_type = $data['user_type'] ?? null;
        $sentEmail->parent_id = $data['parent_id'] ?? null;
        $sentEmail->sender_id = $data['sender_id'] ?? null;
        $sentEmail->is_public = $data['is_public'] ?? 0;
        $sentEmail->is_notification = $data['is_notification'] ?? 1;
        $sentEmail->subject = $data['subject'];
        $sentEmail->type = $view;
        $sentEmail->data = $email_data;
        $sentEmail->save();
        return $sentEmail;
    }

    public static function pdf_file($path, $dir, $view, $name, $data)
    {
        if(Storage::has($path)){
            return Storage::download($path);
        }

        $pdf = \PDF::loadView($view, array($name => $data));
        $content = $pdf->output();

        Storage::put($path, $content, 'private');
        return Storage::download($path);
    }

    public static function uploadSingleFile($file, $path = 'uploads/images/', $types = "png,gif,jpeg,jpg", $filesize = '1000', $absolute_path = false)
    {
        if ($absolute_path == false) {
            $path = $path . date('Y');
        }

        $rules = array('image' => 'required|mimes:' . $types . "|max:" . $filesize);
        $validator = \Validator::make(array('image' => $file), $rules);
        if ($validator->passes()) {

            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }

            $file_path = Storage::put($path, $file);
            return $file_path;
        } else {
            return ['error' => $validator->errors()->first('image')];
        }
    }

    public static function activity_logs($activity){
        ActivityLog::insert([
            'user_id'   => auth()->user()->id,
            'user_ip'   => request()->ip(),
            'activity'  => $activity,
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);
    }

    public static function rights($permission_type,$permission){
        if(!(auth()->user()->can($permission_type) && auth()->user()->can($permission))){
           return true;
        }
        return false;
    }

    public static function timeArr($from_time, $to_time, $session_time, $gape_in_time=0, $next_day=false){
        $from_time     = strtotime($from_time);
        $to_time       = strtotime($to_time);
        $now_time      = $from_time;
        $time_array    = array();
        $total_minutes = $session_time + $gape_in_time;
        
        while($now_time < $to_time){
            if(!$next_day){//for cuurrent day
                if(date('H:i') < date('H:i', $now_time)){
                    if(strtotime("+{$total_minutes} minutes", $now_time) < $to_time){
                        $time_array[] = date('H:i', strtotime("+{$gape_in_time} minutes", $now_time)).'--'.date('H:i', strtotime("+{$gape_in_time} minutes", strtotime("+{$session_time} minutes", $now_time)));
                    }
                }
            }else{//for next day
                if(strtotime("+{$total_minutes} minutes", $now_time) < $to_time){
                    $time_array[] = date('H:i', strtotime("+{$gape_in_time} minutes", $now_time)).'--'.date('H:i', strtotime("+{$gape_in_time} minutes", strtotime("+{$session_time} minutes", $now_time)));
                }
            }

            $now_time = strtotime('+30 minutes', $now_time);
        }
        return $time_array;

    }
    //this function update the status
    public static function updateStatus($table_name, $row_id, $column='status', $status=1, $inverse=false, $ban=false){
        if($inverse == true){
            if($ban == true && $status == 'active'){
                $status = 'ban';
            }elseif($ban == true && $status == 'ban'){
                $status = 'active';
            }elseif($status == 'active'){
                $status = 'deactive';
            }elseif($status == 'deactive'){
                $status = 'active';
            }elseif($status == 'pending'){
                $status = 'approved';
            }elseif($status == 'approved'){
                $status = 'pending';
            }elseif($status == 1){
                $status = 0;
            }elseif($status == 0){
                $status = 1;
            }else{
                $status = $status;
            }
        }

        return DB::table($table_name)->where('id', $row_id)->update([$column=>$status]);
    }

    public static function showDescModal($table_name, $row_id, $column, $path, $title, $render=true){
        $data = array(
            'data'  => DB::table($table_name)->where('id', $row_id)->first(),
            'column'=> $column,
            'title' => $title,
            'render'=> $render
        );

        return response()->json([
            'html'  => view($path)->with($data)->render()
        ]);
    }
}
