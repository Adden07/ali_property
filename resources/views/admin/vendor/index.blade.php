@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">vendor</a></li>
                    <li class="breadcrumb-item active">All</li>
                </ol>
            </div>
            <h4 class="page-title">All vendors</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title m-t-0">All vendors</h4>
            <p class="text-muted font-14 m-b-20">
                Here is the list of all the vendors.
            </p>
            <table class="table dt_table table-bordered w-100 nowrap" id="laravel_datatable">
                <thead>
                    <th>S.no</th>
                    <th>Total Properties</th>
                    <th>Full Name</th>
                    <th>Contact no</th>
                    <th>Email</th>
                    <th>Coountry</th>
                    <th>State</th>
                    <th>Cities</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($vendors AS $vendor)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $vendor->properties_count }}</td>
                            <td>{{ $vendor->full_name }}</td>
                            <td>{{ $vendor->contact_no }}</td>
                            <td>{{ $vendor->email }}</td>
                            <td>{{ $vendor->country }}</td>
                            <td>{{ $vendor->state }}</td>
                            <td>
                                {!! implode(", <br/>", $vendor->cities->pluck('city')->toArray()) !!}
                            </td>
                            <td>
                                <img src="{{ check_file($vendor->image) }}" alt="" width="50px" height="50px">
                            </td>
                            <td>
                                <input type="checkbox" class="js-switch-small nopopup"  data-toggle="switchery" onchange="ajaxRequest(this)" data-url="{{ route('admin.vendors.update_status', ['id'=>$vendor->hashid, 'status'=>$vendor->status]) }}" @if($vendor->status) checked @endif value="1" name="minimum_amount_btn" id="minimum_amount_btn"/>
                            </td>
                            <td>
                                <button type="button" onclick="ajaxRequest(this)" data-url="{{ route('admin.vendors.delete', ['id'=>$vendor->hashid]) }}" class="btn btn-danger btn-xs waves-effect waves-light">
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