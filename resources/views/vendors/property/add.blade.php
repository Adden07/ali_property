@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">Property</a></li>
                    <li class="breadcrumb-item active">{{ isset($is_update) ? 'edit' : 'add'}} </li>
                </ol>
            </div>
            <h4 class="page-title">{{ isset($is_update) ? 'Edit' : 'Add'}} Property</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('admin.faqs.store') }}" class="ajaxForm" method="post" enctype="multipart/form-data" novalidate id="form">
            @csrf
            <div class="card-box">
                <!-- <h4 class="header-title m-t-0">{{ isset($is_update) ? 'Edit' : 'Add'}} Property</h4>
                <p class="text-muted font-14 m-b-20">
                    Here you can {{ isset($is_update) ? 'edit' : 'add'}} Property.
                </p> -->

                <h4 class="header-title m-t-0">Location and Purpose</h4>
                <hr>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Purpose</label>
                        <select class="form-control" name="purpose" id="purpose">
                            <option value="">Select purpose</option>
                            <option value="sell">Sell</option>
                            <option value="rent">Rent</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Property Type</label>
                        <select class="form-control" name="property_type" id="property_type">
                            <option value="">Select property type</option>
                            <option value="house">House</option>
                            <option value="flat">Flat</option>
                            <option value="uppoer_portion">Upper Portion</option>
                            <option value="lower_portion">Lower portion</option>
                            <option value="farmhouse">Farm House</option>
                            <option value="room">Room</option>
                            <option value="penthouse">Penthouse</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">City</label>
                        <select class="form-control select_2_class" name="city_id" id="city_id">
                            <option value="">Select City</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-box">
                <h4 class="header-title m-t-0">Price and Area</h4>
                <hr>
                <div class="row">
                    <div class="col-md">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="">Area size</label>
                                <input type="number" class="form-control" name="area_size" id="area_size">
                            </div>
                            <div class="col-md-4">
                                <label for="">&nbsp;&nbsp;&nbsp;</label>
                                <select class="form-control" name="area_suze_unit" id="area_size_unit">
                                    <option value="sq/ft">Sq/ft</option>
                                    <option value="sq/yds">Sq/Yds</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <label for="">Price</label>
                        <input type="number" class="form-control" name="price" id="price">
                    </div>
                </div>
            </div>


            <div class="card-box">
                <h4 class="header-title m-t-0">Feature and Amenities</h4>
                <hr>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Bedrooms</label>
                        <select class="form-control" name="bedrooms" id="bedrooms">
                            <option value="">Select Bedrooms</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Batrooms</label>
                        <select class="form-control" name="bathrooms" id="bathrooms">
                            <option value="">Select Bathroom</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-box">
                <h4 class="header-title m-t-0">Ad Information</h4>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                </div>
                <div class="row mt-4 mb-3">
                    <div class="col-md-12">
                        <label for="">Long Description</label>
                        <textarea name="answer" id="ck" cols="30" rows="10">
                            {{ @$edit_faq->answer }}
                        </textarea>
                    </div>
                </div>
                <div class="text-right">
                    <input type="hidden" name="faq_id" value="{{ @$edit_faq->hashid }}">
                    <input type="submit" class="btn btn-primary" value="{{ isset($is_update) ? 'Update':'Add' }}">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('page-scripts')
@include('admin.partials.datatable', ['load_swtichery' => true])
<script src="{{ get_asset('admin_assets') }}/js/custom_counrties_cities_api.js"></script>
<script>
    $('form').on('submit', function(){
        CKupdate();
    });

    $(document).ready(function(){
        getCities(get_token(), 'city_id', "{{ auth('vendor')->user()->state }}");
    });
</script>
@endsection