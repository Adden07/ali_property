@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">Offers</a></li>
                    <li class="breadcrumb-item active">All</li>
                </ol>
            </div>
            <h4 class="page-title">Offers</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title m-t-0">{{ isset($is_update) ? 'Edit' : 'Add'}} offer</h4>
            <p class="text-muted font-14 m-b-20">
                Here you can {{ isset($is_update) ? 'edit' : 'add'}} offer.
            </p>
            <form action="{{ route('admin.offers.store') }}" class="ajaxForm" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-10">
                        <label for="logo">Offer Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image"  id="image" onchange="showPreview('preview_image')">
                                <label class="custom-file-label profile_img_label" for="logo">Choose Offer Image</label>
                            </div>
                            <img id="preview_image" src=""  class="d-none" width="100px" height="100px"/>
                            @isset($is_update)
                                <img src="{{ check_file($edit_type->image) }}" alt="" height="100px" widht="100px">
                            @endisset
                        </div>
                    </div>
                    <div class="col-md-2 mt-3">
                        <input type="hidden" name="package_type_id" value="{{ @$edit_type->hashid }}">
                        <input type="submit" class="btn btn-primary" value="{{ (isset($is_update)) ? 'Update' : 'Add' }}">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title m-t-0">All offers</h4>
            <p class="text-muted font-14 m-b-20">
                Here are all the  offers.
            </p>
            <table class="table dt_table table-bordered w-100 nowrap" id="laravel_datatable">
                <thead>
                    <th>S.no</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($offers AS $offer)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ check_file($offer->image) }}" alt="" width="50px" height="50px">
                            </td>
                            <td>
                                <input type="checkbox" class="js-switch-small nopopup"  data-toggle="switchery" onchange="ajaxRequest(this)" data-url="{{ route('admin.offers.update_status', ['id'=>$offer->hashid, 'status'=>$offer->status]) }}" @if($offer->status) checked @endif value="1" name="minimum_amount_btn" id="minimum_amount_btn"/>
                            </td>
                            <td>
                                <button type="button" onclick="ajaxRequest(this)" data-url="{{ route('admin.offers.delete', ['id'=>$offer->hashid]) }}" class="btn btn-danger btn-xs waves-effect waves-light">
                                    <span class="btn-label"><i class="icon-trash"></i></span>Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('page-scripts')
@include('admin.partials.datatable', ['load_swtichery' => true])
@endsection