<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateDetailRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisgtrationRequest;
use App\Mail\UserRegistrationMail;
use App\Mail\UserResetPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class UserLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:web', ['loginForm', 'registrationForm', 'registration', 'login' ])->except(['logout', 'updateDetails']);
    }

    public function loginForm(){
        $data = array(
            'title' => 'Login'
        );
        return view('user.login')->with($data);
    }

    public function registrationForm(){
        $data = array(
            'title' => 'Registration'
        );
        return view('user.registration')->with($data);
    }


    public function registration(UserRegisgtrationRequest $req){//registe user

        $validated = $req->validated();
        $user            = new User();
        $user->full_name = $validated['full_name'];
        $user->email     = $validated['email'];
        $user->password  = Hash::make($validated['password']);
        $user->save();
        // $url             = URL::temporarySignedRoute(
        //                         'users.email_verification', now()->addMinutes(30), ['email' => $user->email]
        //                     );

        //Mail::to($user->email)->send(new UserRegistrationMail('', $user->full_name));//send email verification link to user

        return response()->json([
            'success'   => 'You have registered successfully',
            'redirect'  => route('users.login_form')
        ]);
    }

    public function login(UserLoginRequest $req){
        $validated = $req->validated();

        if(Auth::guard('web')->attempt($validated)){
            return response()->json([
                'success'   => 'Login successfully',
                'redirect'  => route('fronts.home')
            ]);
        }else{
            return response()->json([
                'error' => 'Email or password is incorrect'
            ]);
        }
    }

    public function emailVerification(Request $req){
        if(User::where('email', $req->email)->whereNull('email_verified_at')->update(['email_verified_at'=>date('Y-m-d')])){
            dd('done');
        }else{
            dd('error');
        }
    }

    public function forgetPassword(){//forget password form
        $data = array(
            'title' => 'Forget password'
        );
        return view('user.forget_password')->with($data);
    }

    public function resetPasswordLink(Request $req){//send reset password link to user mail
        $req->validate([
            'email' => ['required', 'max:50', 'email', 'exists:users']
        ]);
        //generate reset password url
        $user = User::where('email', $req->email)->first();

        $url = URL::temporarySignedRoute('users.reset_password_form', now()->addMinutes(50), ['user' => $user->hashid]);
        Mail::to($req->email)->send(new UserResetPasswordMail($url));//send reset password link to user email

        return response()->json([
            'success'   => 'Reset password link has been sent on your email',
            'reload'    => true
        ]);
    }


    public function resetPasswordForm(){
        $data = array(
            'title' => 'Reset password'
        );
        return view('user.reset_password')->with($data);
    }

    public function resetPassword(Request $req, $user_id){//rest user password form

        $req->validate([
            'password'  => ['required', 'min:8', 'confirmed']
        ]);

        $user = User::findOrFail(hashids_decode($user_id));
        $user->password = Hash::make($req->password);
        $user->save();

        return response()->json([
            'success'   => 'You password has been updated successfully',
            'redirect'  => route('users.login_form')
        ]);
    }

    public function logout(){
        Auth::guard('web')->logout();
        return response()->json([
            'success'   => 'Logout successfully',
            'redirect'  => route('fronts.home')
        ]);
    }

    public function updateDetails(UpdateDetailRequest $req){
        $validated = $req->validated();

        $user            = User::where('id', auth('web')->id())->first();
        $user->full_name = $validated['full_name'];

        if(!empty($validated['password'])){
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return response()->json([
            'success'   => 'Details updated successfully',
            'reload'    => true
        ]);
    }
}
