@extends('front.layouts.master')
@section('content')

<div class="banner_main">
    <div class="slider-content pb-5">
        <h1>Affiliate Partnership</h1>
    </div>
</div>

<section class="bg-gradient mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-md-8 mx-auto">
                    <div class="login-frm frm_affliate">
                        <div class="text-center">
                            <h2 class="fw-bold mb-4">Fill the below form</h2>
                        </div>
                        <form action="{{ route('fronts.affiliate_partnership_submit') }}" method="POST" class="ajaxForm">
                            @csrf
                            <div class="col-12">
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label fw-500">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-500">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com" required>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label fw-500">Company Name</label>
                                        <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-500">Phone No</label>
                                        <input type="text" class="form-control" id="phone" name="phone_no" placeholder="Phone Number" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-500">Attact if any</label>
                                <input type="file" class="form-control" id="attactment" name="attachment">
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-500">Message </label>
                                <textarea  class="form-control" id="message" name="message" placeholder="Any Message?"></textarea>
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