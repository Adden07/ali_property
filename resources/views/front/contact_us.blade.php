@extends('front.layouts.master')
@section('content')

<div class="banner_main">
    <div class="slider-content pb-5">
        <h1>Contact Us</h1>
    </div>
</div>

<section class="bg-gradient cat_list mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-md-8 mx-auto">
                    <div class="login-frm frm_affliate">
                        <div class="text-center">
                            <h2 class="fw-bold mb-4">Fill the below form</h2>
                        </div>
                        <form action="{{ route('fronts.contact_us') }}" method="POST" class="ajaxForm">
                            @csrf
                            <div class="col-12">
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label fw-500">First Name</label>
                                        <input type="text" class="form-control" id="firstname" name="first_name" placeholder="First Name" required>
                                    </div>
                                    <div class="col-md-6">
                                    <label class="form-label fw-500">Last Name</label>
                                        <input type="text" class="form-control" id="lastname" name="last_name" placeholder="Last Name" required>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-12">
                                    <label class="form-label fw-500">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-500">Description</label>
                                <textarea  class="form-control" id="description" name="message" placeholder="Any Message?"></textarea>
                            </div>
                            <button type="submit" class="btn btn-theme w-100">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection