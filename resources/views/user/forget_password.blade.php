@extends('front.layouts.master')
@section('content')

<div class="banner_main">
    <div class="slider-content pb-5">
        <h1>Reset Password</h1>
    </div>
</div>

<section class="bg-gradient">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-md-6 mx-auto">
                    <div class="login-frm">
                        <div class="text-center">
                            <h2 class="fw-bold mb-4">Reset Password</h2>
                        </div>
                        <form action="{{ route('users.reset_password_link') }}" method="POST" class="ajaxForm">
                            @csrf
                            <div class="mb-4">
                                <label for="user" class="form-label fw-500">Email</label>
                                <input type="text" class="form-control" id="user" name="email" placeholder="example@example.com">
                            </div>
                            <button type="submit" class="btn btn-theme w-100">Reset Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection