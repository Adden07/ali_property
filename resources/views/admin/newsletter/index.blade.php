@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">Newsletters</a></li>
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
            <h4 class="header-title m-t-0">All newsletters</h4>
            <p class="text-muted font-14 m-b-20">
                Here are all the  newsletters.
            </p>
            <table class="table dt_table table-bordered w-100 nowrap" id="laravel_datatable">
                <thead>
                    <th>S.no</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($newsletters AS $letter)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $letter->email }}</td>
                            <td>{{ date('d-M-Y', strtotime($letter->created_at)) }}</td>
                            <td>
                                <button type="button" onclick="ajaxRequest(this)" data-url="{{ route('admin.newsletters.delete', ['id'=>$letter->hashid]) }}" class="btn btn-danger btn-xs waves-effect waves-light">
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