<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerification;
use App\Mail\ResetPassword;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{   
    public function userRegistration(Request $req){//user registration
        
        $rules = [
            'username'       => ['required', 'max:100', 'string'],
            'email'      => ['required', 'email', 'string', 'unique:users'],
            'contact_no' => ['required','max:30', 'string'],
            'password'   => ['required', 'min:6', 'max:50', 'string']
        ];

        $validator = Validator::make($req->all(), $rules);

        if($validator->fails()){
            return api_response(false, null, $validator->errors());
        }

        $user = new User;
        $user->username       = $req->username;
        $user->email      = $req->email;
        $user->contact = $req->contact_no;
        $user->password   = Hash::make($req->password);
        $user->otp = rand(1111, 9999);
        $user->save();

        Mail::to($user->email)->send(new EmailVerification($user->username, $user->otp));//send verification code to use email
        
        $token = $this->login($req->only(['email',  'password']));

        return api_response(true, ['access_token'=>$token], 'You have registered successfully OTP has been send to your email');
    }

    public function userLogin(Request $req){
        $rules = [
            'email'    => ['required', 'max:100', 'email'],
            'password' => ['required', 'max:100']
        ];
        $validator = Validator::make($req->all(), $rules);
        
        if($validator->fails()){
            return api_response(false, null, $validator->errors());
        }

        $token = $this->login($req->all());
        
        if(!$token){
            return api_response(false, null, ['error'=>'Given email or password is invalid']);
        }
        return api_response(true, $this->respondWithToken($token),'Login successfully');
    }

    public function verifyEmail(Request $req){//verify user otp
        if(auth()->guard('api')->user()->otp == $req->otp){
            $user = Auth::guard('api')->user();
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->save();
            return api_response(true, null, 'Account verified successfully');
        }
        return api_response(false, null, 'Wrong OTP');
    }
    
    public function resendOtp(){
        $user      = Auth::guard('api')->user();
        $user->otp = rand(111111,999999);
        $user->save();

        Mail::to($user->email)->send(new EmailVerification($user->username, $user->otp));//send verification code to use email
        
        return api_response(true, null, 'OTP send successfully on your email');
    }

    public function resetPasswordUrl(Request $req){//send reset password link to user givene mail if exists
        
        $validator = Validator::make($req->all(),[
            'email' => ['required', 'email', 'exists:users', 'max:100']
        ],[
            'email.exists'  => 'Invalid email'
        ]);

        if($validator->fails()){
            return api_response(false, null, $validator->errors());
        }
      
        $user= User::where('email', $req->email)->first();
        $url = URL::temporarySignedRoute('fronts.reset_password_form', now()->addMinutes(10), ['user_id'=>$user->hashid ]);

        Mail::to($user->email)->send(new ResetPassword($user->username, $url));//send new password to user email
        
        return api_response(true, null, 'Your password reset link has been send on your givene email');
    }

    public function userLogout(){
        Auth::guard('api')->logout();

        return api_response(true, null, 'Successfully logged out');
    }

    public function respondWithToken($token){
        return [
            'access_token'  => $token,
            'token_type'    => 'bearer',
            'expires_in'    => auth()->guard('api')->factory()->getTTL()*60
        ];
    }

    public function login($credentials){
        if($token = auth()->guard('api')->attempt(['email'=>$credentials['email'], 'password'=>$credentials['password']])){
            return $token;
        }
        return false;
    }

    public function serviceCategories(){
        $data = array(
            'service_categories'    =>  ServiceCategory::with(['services'])->get(),  
        );
        return api_response(true, $data, null);
    }
    
    public function serviceDetails(Request $req){
        
        $rules = [
            'service_id'    => ['required', 'integer']
        ];

        $validator = Validator::make($req->all(), $rules);

        if($validator->fails()){
            return api_response(false, null, $validator->errors());
        }

        $data = array(
            'service'  => Service::with(['packages', 'faqs', 'discount'=>function($query){
                $query->orderBy('no_of_people', 'DESC');
            }])->where('id', $req->service_id)->first(),
        );
        return api_response(true, $data, null, url('/'));
    }
}
