<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class VendorLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/login';

    public function __construct()
    {   
        $this->middleware('guest:vendor', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {   
        return view('auth.vendor.login');
    }

    public function login(\Illuminate\Http\Request $request)
    {   
        $a = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::guard('vendor')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // return redirect()->intended(url('/web_admin'));
            return redirect()->route('vendors.home');

        }

        return redirect()
            ->back()
            ->withInput($request->only($request->only('email', 'remember')))
            ->withErrors(['email' => 'These credentials do not match our records.']);
    }

    public function logout()
    {   
        Auth::guard('vendor')->logout();
        return redirect(route('vendors.login'));
    }
}
