@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">update profile</a></li>
                </ol>
            </div>
            <h4 class="page-title">Update profile</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title m-t-0">Update profile</h4>
            <p class="text-muted font-14 m-b-20">
                Here you can update your profile.
            </p>

            <form action="{{ route('admin.profiles.update') }}" class="ajaxForm" method="post" enctype="multipart/form-data" novalidate id="form">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="{{ @$edit_profile->name }}" name="name" id="name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="">Username</label>
                        <input type="text" class="form-control" value="{{ @$edit_profile->username }}" name="username" id="username" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Email</label>
                        <input type="text" class="form-control" value="{{ @$edit_profile->email }}" name="email" id="email" required>
                    </div>
                    <div class="col-md-6">
                        <label for="">Current Password</label>
                        <input type="password" class="form-control" value="" name="current_password" id="current_password">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">New Password</label>
                        <input type="password" class="form-control" value="" name="password" id="password">
                    </div>
                    <div class="col-md-6">
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control" value="" name="password_confirmation" id="password_confirmation">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="logo">Vendor Profile</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image"  id="image" onchange="showPreview('preview_image')">
                                <label class="custom-file-label profile_img_label" for="logo">Choose Vendor Profile</label>
                            </div>
                            <img id="preview_image" src=""  class="d-none" width="100px" height="100px"/>
                            @isset($is_update)
                                <img src="{{ check_file(@$edit_profile->image) }}" alt="" height="100px" widht="100px">
                            @endisset
                        </div>
                    </div>
                </div>
                <input type="hidden" value="{{ @$edit_profile->hashid }}"  name="admin_id" id="admin_id">
                <input type="submit" class="btn btn-primary float-right" value="{{ isset($is_update) ? 'Update':'Add' }}">
            </form>
        </div>
    </div>
</div>
@endsection

@section('page-scripts')
@include('admin.partials.datatable', ['load_swtichery' => true])
@endsection