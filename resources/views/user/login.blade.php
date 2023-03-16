@extends('front.layouts.master')
@section('content')

<div class="banner_main">
    <div class="slider-content pb-5">
        <h1>Welcome Back</h1>
    </div>
</div>

<section class="bg-gradient cat_list mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-md-6 mx-auto">
                    <div class="login-frm">
                        <div class="text-center">
                            <h2 class="fw-bold mb-4">Login</h2>
                        </div>
                        <form action="{{ route('users.login') }}" method="POST" class="ajaxForm">
                            @csrf
                            <div class="mb-4">
                                <label for="user" class="form-label fw-500">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="example@example.com" required>
                            </div>
                            <div class="mb-4">
                                <label for="pass" class="form-label fw-500">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="remember">
                                            <label class="form-check-label" for="remember">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-6 text-end">
                                        <a href="{{ route('users.forget_password') }}" class="fw-bold text-black">Forgot password?</a>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-theme w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection