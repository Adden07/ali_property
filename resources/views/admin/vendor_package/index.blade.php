@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">vendor packages</a></li>
                </ol>
            </div>
            <h4 class="page-title"> Vendor packages</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title m-t-0">All vendor packages</h4>
            <p class="text-muted font-14 m-b-20">
                Here are all the vendor packages list.
            </p>
            <table class="table dt_table table-bordered w-100 nowrap" id="laravel_datatable">
                <thead>
                    <th>S.no</th>
                    <th>Country</th>
                    <th>Package <br />type</th>
                    <th>Company<br />name</th>
                    <th>Title</th>
                    <td>Infant</td>
                    <td>Child</td>
                    <td>Adult</td>
                    <td>Dinner</td>
                    <th>Image</th>
                    <th>Desc</th>
                    <th>Status</th>
                    <th>Featured</th>
                    <th>Best <br />Seller</th>
                    <th>Newest</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($packages AS $package)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $package->country->country_name }}</td>
                            <td>{{ $package->package_type->title }}</td>
                            <td>{{ $package->vendor->company_name }}</td>
                            <td>{{ $package->title }}</td>
                            <td>{{ number_format($package->infant) }}</td>
                            <td>{{ number_format($package->child) }}</td>
                            <td>{{ number_format($package->adult) }}</td>
                            <td>{{ number_format($package->dinner) }}</td>
                            <td>
                                <img src="{{ check_file($package->image) }}" alt="" width="50px" height="50px">
                            </td>
                            <td>
                                <i class="fa fa-eye text-primary show_description" data-route="{{ route('admin.vendor_packages.show_description',['id'=>$package->hashid]) }}"></i>
                            </td>
                            <td>{!! get_status($package->status) !!}</td>
                            <td>
                                <input type="checkbox" class="js-switch-small nopopup"  data-toggle="switchery" onchange="ajaxRequest(this)" data-url="{{ route('admin.vendor_packages.update_status', ['id'=>$package->hashid, 'status'=>$package->is_featured, 'column_name'=>'is_featured']) }}" @if($package->is_featured) checked @endif value="1" />
                            </td>
                            <td>
                                <input type="checkbox" class="js-switch-small nopopup"  data-toggle="switchery" onchange="ajaxRequest(this)" data-url="{{ route('admin.vendor_packages.update_status', ['id'=>$package->hashid, 'status'=>$package->is_best_seller, 'column_name'=>'is_best_seller']) }}" @if($package->is_best_seller) checked @endif value="1" />
                            </td>
                            <td>
                                <input type="checkbox" class="js-switch-small nopopup"  data-toggle="switchery" onchange="ajaxRequest(this)" data-url="{{ route('admin.vendor_packages.update_status', ['id'=>$package->hashid, 'status'=>$package->is_newest, 'column_name'=>'is_newest']) }}" @if($package->is_newest) checked @endif value="1" />
                            </td>
                            <td>
                                <input type="checkbox" class="js-switch-small nopopup"  data-toggle="switchery" onchange="ajaxRequest(this)" data-url="{{ route('admin.vendor_packages.update_status', ['id'=>$package->hashid, 'status'=>$package->status]) }}" @if($package->status == 'active') checked @endif value="1" />
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