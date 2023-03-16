@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">reviews</a></li>
                    <li class="breadcrumb-item active">{{ isset($is_update) ? 'edit' : 'add'}} </li>
                </ol>
            </div>
            <h4 class="page-title">{{ isset($is_update) ? 'Edit' : 'Add'}} Review</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title m-t-0">{{ isset($is_update) ? 'Edit' : 'Add'}} review</h4>
            <p class="text-muted font-14 m-b-20">
                Here you can {{ isset($is_update) ? 'edit' : 'add'}} review.
            </p>

            <form action="{{ route('admin.reviews.store') }}" class="ajaxForm" method="post" enctype="multipart/form-data" novalidate id="form">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Vendor Package</label>
                        <select class="form-control select_2_class" name="package_id" id="package_id" required>
                            <option value="">Select vendor package</option>
                            @foreach($vendor_packages AS $package)
                                <option value="{{ $package->hashid }}" @if(@$edit_review->package_id == $package->id) selected @endif>{{ $package->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Username</label>
                        <input type="text" class="form-control" placeholder="Enter username here" value="{{ @$edit_review->username }}" name="username" id="username" value="" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Review desc</label>
                        <textarea class="form-control" name="review" id="review" cols="10" rows="5" required>{{ @$edit_review->review }}</textarea>
                    </div>
                </div>
                <div class="row mt-2 mb-3">
                    <div class="col-md-12">
                        <div class="rateit float-right" data-rateit-value="{{ @$edit_review->rating }}" data-rateit-mode="font"  style="font-size:50px" id="rating">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="admin_review_id" value="{{ @$edit_review->hashid }}">
                <input type="hidden" name="rating" id="rating_input" value="{{ @$edit_review->rating ?? 0 }}">
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
    $('#rating').click(function(){//set the rating value in hidden field
        $('#rating_input').val($('#rating').rateit('value'));
    });
    
</script>
@endsection