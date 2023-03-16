@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">Site settings</a></li>
                </ol>
            </div>
            <h4 class="page-title">Site settings</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title m-t-0">Site settings</h4>
            <p class="text-muted font-14 m-b-20">
                Here you can update the site settings.
            </p>
            <form action="{{ route('admin.site_setting') }}" class="ajaxForm" method="post" enctype="multipart/form-data" novalidate id="form">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Site name</label>
                        <input type="text" class="form-control" placeholder="Enter the site name here" name="site_name" id="site_name" value="{{ @$site_setting->data['site_name'] }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Site short desc</label>
                        <input type="text" class="form-control" placeholder="Enter the site name here" name="short_desc" id="short_desc" value="{{ @$site_setting->data['short_desc'] }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Contact No</label>
                        <input type="text" class="form-control" placeholder="Enter the contact no" name="contact_no" id="contact_no" value="{{ @$site_setting->data['contact_no'] }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Email</label>
                        <input type="email" class="form-control" placeholder="Enter the email here" name="email" id="email" value="{{ @$site_setting->data['email'] }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Facebook</label>
                        <input type="text" class="form-control" placeholder="Enter the facebook URL" name="facebook_link" id="facebook_link" value="{{ @$site_setting->data['facebook_link'] }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Instagram</label>
                        <input type="text" class="form-control" placeholder="Enter the instagram URL" name="instagram_link" id="instagram_link" value="{{ @$site_setting->data['instagram_link'] }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Twitter</label>
                        <input type="text" class="form-control" placeholder="Enter the twitter URL" name="twitter_link" id="twitter_link" value="{{ @$site_setting->data['twitter_link'] }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Youtube</label>
                        <input type="text" class="form-control" placeholder="Enter the youtube URL" name="youtube_link" id="youtube_link" value="{{ @$site_setting->data['youtube_link'] }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="logo">Site header logo</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="header_logo"  id="header_logo" onchange="showPreview('preview_header_logo')">
                                <label class="custom-file-label profile_img_label" for="logo">Choose header logo</label>
                            </div>
                            <img id="preview_header_logo" src="{{ check_file(@$site_setting->data['header_logo']) }}"  class="@if(empty(@$site_setting)) d-none @endif" width="100px" height="100px"/>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="logo">Site footer logo</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="footer_logo"  id="footer_logo" onchange="showPreview('preview_footer_logo')">
                                <label class="custom-file-label profile_img_label" for="logo">Choose footer logo</label>
                            </div>
                            <img id="preview_footer_logo" src="{{ check_file(@$site_setting->data['footer_logo']) }}"  class="@if(empty(@$site_setting)) d-none @endif" width="100px" height="100px"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="logo">Site favicon</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="favicon"  id="favicon" onchange="showPreview('preview_favicon')">
                                <label class="custom-file-label profile_img_label" for="logo">Choose footer logo</label>
                            </div>
                            <img id="preview_favicon" src="{{ check_file(@$site_setting->data['favicon']) }}"  class="@if(empty(@$site_setting)) d-none @endif" width="100px" height="100px"/>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="setting_id" value="{{ @$site_setting->hashid }}">
                <input type="hidden" name="old_header_logo" value="{{ @$site_setting->data['header_logo'] }}">
                <input type="hidden" name="old_footer_logo" value="{{ @$site_setting->data['footer_logo'] }}">
                <input type="hidden" name="old_favicon" value="{{ @$site_setting->data['favicon'] }}">
                <input type="submit" class="btn btn-primary float-right" value="{{ isset($is_update) ? 'Update':'Add' }}">
            </form>
        </div>
    </div>
</div>
@endsection
