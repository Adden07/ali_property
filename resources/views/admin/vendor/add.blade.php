@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">vendor</a></li>
                    <li class="breadcrumb-item active">{{ isset($is_update) ? 'edit' : 'add'}} </li>
                </ol>
            </div>
            <h4 class="page-title">{{ isset($is_update) ? 'Edit' : 'Add'}} vendor</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title m-t-0">{{ isset($is_update) ? 'Edit' : 'Add'}} vendor</h4>
            <p class="text-muted font-14 m-b-20">
                Here you can {{ isset($is_update) ? 'edit' : 'add'}} vendor.
            </p>

            <form action="{{ route('admin.vendors.store') }}" class="ajaxForm" method="post" enctype="multipart/form-data" novalidate id="form">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Company Name</label>
                        <input type="text" class="form-control" placeholder="Company name here" name="company_name" id="company_name" value="{{ @$edit_vendor->company_name }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Company Person Name</label>
                        <input type="text" class="form-control" placeholder="Contact person name here" name="contact_person_name" id="contact_person_name" value="{{ @$edit_vendor->contact_person_name }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Contact No</label>
                        <input type="text" class="form-control" placeholder="Contact no here" name="contact_no" id="contact_no" value="{{ @$edit_vendor->contact_no }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Email</label>
                        <input type="email" class="form-control" placeholder="Email address here" name="email" id="email" value="{{ @$edit_vendor->email }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Password</label>
                        <input type="password" class="form-control" placeholder="********" name="password" id="password" @unless(@$is_update) required @endunless>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="********" name="password_confirmation" id="password_confirmation" @unless(@$is_update) required @endunless>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Business Type</label>
                        <select class="form-control" name="business_type" id="business_type" required>
                            <option value="">Select Business Types</option>
                            <option value="travel_and_tours" selected>Travel & Tours</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="logo">Vendor Profile</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image"  id="image" onchange="showPreview('preview_image')">
                                <label class="custom-file-label profile_img_label" for="logo">Choose Vendor Profile</label>
                            </div>
                            <img id="preview_image" src=""  class="d-none" width="100px" height="100px"/>
                            @isset($is_update)
                                <img src="{{ check_file($edit_vendor->image) }}" alt="" height="100px" widht="100px">
                            @endisset
                        </div>
                    </div>
                </div>
                <input type="hidden" name="vendor_id" value="{{ @$edit_vendor->hashid }}">
                <input type="submit" class="btn btn-primary float-right" value="{{ isset($is_update) ? 'Update':'Add' }}">
            </form>
        </div>
    </div>
</div>
@endsection