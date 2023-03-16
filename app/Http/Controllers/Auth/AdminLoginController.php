<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use App\Models\AdminAcl;
// use App\Models\LoginFailLog;
use Illuminate\Support\Facades\RateLimiter;


class AdminLoginController extends Controller 
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/login';

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {   
        return view('auth.admin.login');
    }

    public function login(\Illuminate\Http\Request $request)
    {   
        $a = $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required'
        ]);
        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(url('/web_admin'));
        }

        return redirect()
            ->back()
            ->withInput($request->only($request->only('username', 'remember')))
            ->withErrors(['username' => 'These credentials do not match our records.']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }
}
