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
            <h4 class="page-title">{{ isset($is_update) ? 'Edit' : 'Add'}} software serviecs</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title m-t-0">{{ isset($is_update) ? 'Edit' : 'Add'}} software services</h4>
            <p class="text-muted font-14 m-b-20">
                Here you can {{ isset($is_update) ? 'edit' : 'add'}} software services.
            </p>
            <table class="table dt_table table-bordered w-100 nowrap" id="laravel_datatable">
                <thead>
                    <th>S.no</th>
                    <th>Service name</th>
                    <th>Short Desc</th>
                    <th>Form</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Best <br >Seller</th>
                    <th>Newest</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($services AS $service)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $service->service_name }}</td>
                            <td>{{ $service->short_desc }}</td>
                            <td>
                                @if($service->is_form)
                                    <span class="badge bg-success">yes</span>
                                @else 
                                    <span class="badge bg-danger">no</span>
                                @endif
                            </td>
                            <td>
                                <img src="{{ check_file($service->image) }}" alt="" height="50px" height="50px">
                            </td>
                            <td>
                                <input type="checkbox" class="js-switch-small nopopup"  data-toggle="switchery" onchange="ajaxRequest(this)" data-url="{{ route('admin.software_services.update_status', ['id'=>$service->hashid, 'status'=>$service->is_featured, 'column_name'=>'is_featured']) }}" @if($service->is_featured) checked @endif value="1" name="minimum_amount_btn" id="minimum_amount_btn"/>
                            </td>
                            <td>
                                <input type="checkbox" class="js-switch-small nopopup"  data-toggle="switchery" onchange="ajaxRequest(this)" data-url="{{ route('admin.software_services.update_status', ['id'=>$service->hashid, 'status'=>$service->is_best_seller, 'column_name'=>'is_best_seller']) }}" @if($service->is_best_seller) checked @endif value="1" name="minimum_amount_btn" id="minimum_amount_btn"/>
                            </td>
                            <td>
                                <input type="checkbox" class="js-switch-small nopopup"  data-toggle="switchery" onchange="ajaxRequest(this)" data-url="{{ route('admin.software_services.update_status', ['id'=>$service->hashid, 'status'=>$service->is_newest, 'column_name'=>'is_newest']) }}" @if($service->is_newest) checked @endif value="1" name="minimum_amount_btn" id="minimum_amount_btn"/>
                            </td>
                            <td>
                                <input type="checkbox" class="js-switch-small nopopup"  data-toggle="switchery" onchange="ajaxRequest(this)" data-url="{{ route('admin.software_services.update_status', ['id'=>$service->hashid, 'status'=>$service->status]) }}" @if($service->status) checked @endif value="1" name="minimum_amount_btn" id="minimum_amount_btn"/>
                            </td>
                            <td>
                                <a href="{{ route('admin.software_services.edit', ['id'=>$service->hashid]) }}" class="btn btn-warning btn-xs waves-effect waves-light">
                                    <span class="btn-label"><i class="icon-pencil"></i></span>Edit
                                </a>
                                <button type="button" onclick="ajaxRequest(this)" data-url="{{ route('admin.software_services.delete', ['id'=>$service->hashid]) }}" class="btn btn-danger btn-xs waves-effect waves-light">
                                    <span class="btn-label"><i class="icon-trash"></i></span>Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    {{-- @foreach($vendors AS $vendor)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $vendor->company_name }}</td>
                            <td>{{ $vendor->contact_person_name }}</td>
                            <td>{{ $vendor->contact_no }}</td>
                            <td>{{ $vendor->email }}</td>
                            <td>{{ str_replace('_', ' ', $vendor->business_type) }}</td>
                            <td>
                                <img src="{{ check_file($vendor->image) }}" alt="" width="50px" height="50px">
                            </td>
                            <td>
                                <input type="checkbox" class="js-switch-small nopopup"  data-toggle="switchery" onchange="ajaxRequest(this)" data-url="{{ route('admin.vendors.update_status', ['id'=>$vendor->hashid, 'status'=>$vendor->status]) }}" @if($vendor->status) checked @endif value="1" name="minimum_amount_btn" id="minimum_amount_btn"/>
                            </td>
                            <td>
                                <a href="{{ route('admin.vendors.edit', ['id'=>$vendor->hashid]) }}" class="btn btn-warning btn-xs waves-effect waves-light">
                                    <span class="btn-label"><i class="icon-pencil"></i></span>Edit
                                </a>
                                <button type="button" onclick="ajaxRequest(this)" data-url="{{ route('admin.vendors.delete', ['id'=>$vendor->hashid]) }}" class="btn btn-danger btn-xs waves-effect waves-light">
                                    <span class="btn-label"><i class="icon-trash"></i></span>Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('page-scripts')
@include('admin.partials.datatable', ['load_swtichery' => true])
@endsection