@extends('front.layouts.master')
@section('content')

<div class="banner_main">
    <div class="slider-content pb-5">
        <h1>Create A New Account?</h1>
    </div>
</div>

<section class="bg-gradient cat_list mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-md-6 mx-auto">
                    <div class="login-frm">
                        <div class="text-center">
                            <h2 class="fw-bold mb-4">Sign Up</h2>
                        </div>
                        <form action="{{ route('users.registration') }}" method="POST" class="ajaxForm">
                            @csrf
                            <div class="mb-4">
                                <label for="fname" class="form-label fw-500">Full Name</label>
                                <input type="text" class="form-control" id="fname" name="full_name" placeholder="Full Name" value="" >
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label fw-500">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="" >
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label fw-500">Country</label>
                                <select class="form-control select_2_class" name="country_id" id="country_id">
                                    <option value="">Select country</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label fw-500">State</label>
                                <select class="form-control select_2_class" name="state_id" id="state_id">
                                    <option value="">Select state</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label fw-500">Cities</label>
                                <select class="form-control select_2_class" multiple="multiple" name="city_id" id="city_id">
                                    <option value="">Select city</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="pass" class="form-label fw-500">Password</label>
                                            <input type="password" class="form-control" id="pass" name="password" placeholder="Enter Password" >
                                        </div>

                                        <div class="col-md-6">
                                            <label for="cpass" class="form-label fw-500">Confirm Password</label>
                                            <input type="password" class="form-control" id="cpass" name="password_confirmation" placeholder="Confirm Password" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-theme w-100">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
@include('admin.partials.datatable', ['load_swtichery' => true])
<script src="{{ get_asset('admin_assets') }}/js/custom_counrties_cities_api.js"></script>
<script>
    $(document).ready(function(){
        var auth_token = get_token();//get auth token
        getCountries(auth_token, 'country_id');//get countries

        $('#country_id').change(function(){
            getStates(auth_token,'state_id', $(this).val());
        });

        $('#state_id').change(function(){
            getCities(auth_token, 'city_id', $(this).val());
        });
    });
</script>
@endsection