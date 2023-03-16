@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">packages</a></li>
                    <li class="breadcrumb-item"><a href="">all</a></li>

                </ol>
            </div>
            <h4 class="page-title">All packages</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title m-t-0">All packages</h4>
            <p class="text-muted font-14 m-b-20">
                Here are all the packages.
            </p>
            <table class="table dt_table table-bordered w-100 nowrap" id="laravel_datatable">
                <thead>
                    <th>S.no</th>
                    <th>Country</th>
                    <th>Package type</th>
                    <th>Title</th>
                    <th>Infant</th>
                    <th>Child</th>
                    <th>Adult</th>
                    <th>Dinner</th>
                    <th>Image</th>
                    <th>View</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($packages AS $package)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $package->country->country_name }}</td>
                            <td>{{ $package->package_type->title }}</td>
                            <td>{{ $package->title }}</td>
                            <td>{{ number_format($package->infant) }}</td>
                            <td>{{ number_format($package->child) }}</td>
                            <td>{{ number_format($package->adult) }}</td>
                            <td>{{ number_format($package->dinner) }}</td>
                            <td>
                                <img src="{{ check_file($package->image) }}" alt="" width="50px" height="50px">
                            </td>
                            <td><i class="fa fa-eye text-primary show_description" data-route="{{ route('vendors.packages.show_description',['id'=>$package->hashid]) }}"></i></td>
                            <td>
                                @if($package->status != 'ban')
                                    <input type="checkbox" class="js-switch-small nopopup"  data-toggle="switchery" onchange="ajaxRequest(this)" data-url="{{ route('vendors.packages.update_status', ['id'=>$package->hashid, 'status'=>$package->status]) }}" @if($package->status == 'active') checked @endif value="1" name="minimum_amount_btn" id="minimum_amount_btn"/>
                                @else
                                    {!! get_status('pending') !!}
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('vendors.packages.edit', ['id'=>$package->hashid]) }}" class="btn btn-warning btn-xs waves-effect waves-light">
                                    <span class="btn-label"><i class="icon-pencil"></i></span>Edit
                                </a>
                                <button type="button" onclick="ajaxRequest(this)" data-url="{{ route('vendors.packages.delete', ['id'=>$package->hashid]) }}" class="btn btn-danger btn-xs waves-effect waves-light">
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