@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">software services</a></li>
                    <li class="breadcrumb-item active">{{ isset($is_update) ? 'edit' : 'add'}} </li>
                </ol>
            </div>
            <h4 class="page-title">{{ isset($is_update) ? 'Edit' : 'Add'}} software services</h4>
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

            <form action="{{ route('admin.software_services.store') }}" class="ajaxForm" method="post" enctype="multipart/form-data" novalidate id="form">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Service Name</label>
                        <input type="text" class="form-control" placeholder="service name here" name="service_name" id="service_name" value="{{ @$edit_service->service_name }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Short Description</label>
                        {{-- <textarea class="form-control" name="short_desc" id="short_desc" cols="" rows=""></textarea> --}}
                        <input type="text" class="form-control" placeholder="Short description here" name="short_desc" id="short_desc" value="{{ @$edit_service->short_desc }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Long Description</label>
                        <textarea name="long_desc" id="ck" cols="30" rows="10">
                            {{ @$edit_service->long_desc }}
                        </textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-4">
                        <label for="">Form on this service</label>
                        <input type="checkbox" class="js-switch-small nopopup"  data-toggle="switchery"  value="1" name="is_form" id="is_form" @if(@$edit_service->is_form) checked @endif/>
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
                                <img src="{{ check_file(@$edit_service->image) }}" alt="" height="100px" widht="100px">
                            @endisset
                        </div>
                    </div>
                </div>
                <input type="hidden" name="software_service_id" value="{{ @$edit_service->hashid }}">
                <input type="submit" class="btn btn-primary float-right" value="{{ isset($is_update) ? 'Update':'Add' }}">
            </form>
        </div>
    </div>
</div>
@endsection

@section('page-scripts')
@include('admin.partials.datatable', ['load_swtichery' => true])
<script>
    $('form').on('submit', function(){
        CKupdate();
    });
</script>
@endsection