<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\ChatDetail;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class HomeController extends Controller
{
    public function index()
    {   
        $data = array(
            "title"             => "Dashboad",
            'bookings_count'    => Vendor::where('id', auth('vendor')->id())->first()
        );
        return view('admin.home')->with($data);
    }

    public function chat(){
        $user_ids = Chat::where('vendor_id', auth('vendor')->id())->get(['user_id'])->pluck('user_id')->toArray();
        $users    = User::whereIn('id', $user_ids)->get();
        return view('vendors.chat', ['vendors'=>$users]);
    }

    public function getMessages(Request $req){

        $chat = Chat::with(['chatDetails'])->where('vendor_id', auth('vendor')->id())->where('user_id', hashids_decode($req->vendor_id))->first();

        return response()->json([
            'html'  => view('front.chat_messages', compact('chat'))->render()
        ]);
    }

    public function sendMessage(Request $req){
        $chat = Chat::firstorCreate(
            ['vendor_id'=>auth('vendor')->id(), 'user_id'=>hashids_decode($req->vendor_id)],
            ['vendor_id'=>auth('vendor')->id(), 'user_id'=>hashids_decode($req->vendor_id), 'chat_id'=>Str::random(20)]
        );
        $message = new ChatDetail();
        $message->user_id = auth('vendor')->id();
        $message->message = $req->message;
        $message->chat_id  = $chat->chat_id;
        $message->save();

        return response()->json([
            'html'  => view('front.chat_messages', compact('chat'))->render()
        ]);
    }
}
