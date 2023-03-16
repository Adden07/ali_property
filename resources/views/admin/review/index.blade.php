@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">reviews</a></li>
                    <li class="breadcrumb-item active">all</li>
                </ol>
            </div>
            <h4 class="page-title">All reviews</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title m-t-0">All reviews</h4>
            <p class="text-muted font-14 m-b-20">
                Here are all the reviews.
            </p>
            <table class="table dt_table table-bordered w-100 nowrap" id="laravel_datatable">
                <thead>
                    <th>S.no</th>
                    <th>Package</th>
                    <th>Username</th>
                    <th>Review</th>
                    <th>Rating</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($reviews AS $review)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $review->package->title }}</td>
                            <td>{{ $review->username }}</td>
                            <td>
                                {{ wordwrap($review->review, 50, "<br>\n") }}
                            </td>
                            <td>
                                <div class="rateit" data-rateit-value="{{ $review->rating }}" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                            </td>
                            <td>
                                <a href="{{ route('admin.reviews.edit', ['id'=>$review->hashid]) }}" class="btn btn-warning btn-xs waves-effect waves-light">
                                    <span class="btn-label"><i class="icon-pencil"></i></span>Edit
                                </a>
                                <button type="button" onclick="ajaxRequest(this)" data-url="{{ route('admin.reviews.delete', ['id'=>$review->hashid]) }}" class="btn btn-danger btn-xs waves-effect waves-light">
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