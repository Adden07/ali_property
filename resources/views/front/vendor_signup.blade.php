@extends('front.layouts.master')
@section('content')

<style>
    .select2-container .select2-selection--single{height: 50px;}
    .select2-container .select2-selection--single .select2-selection__rendered{line-height: 50px;padding-left: 15px;}
    .select2-container--default .select2-selection--single .select2-selection__arrow{top: 12px;right: 5px;}
    .select2-container .select2-selection--multiple .select2-selection__rendered{display: block;}
    .select2-search__field{min-height: 45px !important;margin: 0 !important;padding-left: 10px !important;padding-top: 15px !important;}
    .select2-selection__rendered{margin-bottom: 0;}
</style>

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
                        <form action="{{ route('fronts.vendor_signup') }}" method="POST" class="ajaxForm" enctype="multipart/form-data">
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
                                <label for="contact" class="form-label fw-500">Contact No</label>
                                <input type="text" class="form-control" id="contact" name="contact_no" placeholder="Contact No" value="" >
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label fw-500">Country</label>
                                <select class="form-control select_2_class" name="country" id="country_id">
                                    <option value="">Select country</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label fw-500">State</label>
                                <select class="form-control select_2_class" name="state" id="state_id">
                                    <option value="">Select state</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label fw-500">Cities</label>
                                <select class="form-control select_2_class" multiple name="cities[]" id="city_id">
                                    <option value="">Select city</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <div class="col-12">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <label for="pass" class="form-label fw-500">Password</label>
                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control password" id="pass" name="password" placeholder="Enter Password" >
                                                <button type="button" class="input-group-text btn-theme" id="basic-addon2" onclick="hiden_show_password()">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="cpass" class="form-label fw-500">Confirm Password</label>

                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control password" id="cpass" name="password_confirmation" placeholder="Confirm Password" >
                                                <button type="button" class="input-group-text btn-theme" id="basic-addon2" onclick="hiden_show_password()">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="profile_image" class="form-label fw-500">Profile Image</label>
                                <input type="file" class="custom-file-input" name="image"  id="image" onchange="showPreview('preview_image')">
                            </div>
                            <img id="preview_image" src=""  class="d-none" width="100px" height="100px"/>

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

        $('#country_id').change(function(){//when there is change the get the states of selected country
            getStates(auth_token,'state_id', $(this).val());
        });

        $('#state_id').change(function(){//when there is change in state then get the cities of selected state
            getCities(auth_token, 'city_id', $(this).val());
        });
    });
</script>
@endsection