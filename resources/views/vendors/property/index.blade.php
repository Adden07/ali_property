@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">Property</a></li>
                    <li class="breadcrumb-item active">All</li>

                </ol>
            </div>
            <h4 class="page-title"> All Properties</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title m-t-0">All properties</h4>
            <p class="text-muted font-14 m-b-20">
                Here are all the properties.
            </p>
            <table class="table dt_table table-bordered w-100 nowrap" id="laravel_datatable">
                <thead>
                    <th>S.no</th>
                    <th>City</th>
                    <th>Purpose</th>
                    <th>Property Type</th>
                    <th>Area Size</th>
                    <th>Bedrooms</th>
                    <th>Bathrooms</th>
                    <th>Price</th>
                    <th>Action</th>
                    {{-- <th>Departure <br /> City</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Details</th> --}}
                </thead>
                <tbody>
                    @foreach($properties AS $property)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $property->city->city }}</td>
                            <td>{{ $property->purpose }}</td>
                            <td>{{ $property->property_type }}</td>
                            <td>{{ $property->area_size }}</td>
                            <td>{{ $property->bedrooms }}</td>
                            <td>{{ $property->bathrooms }}</td>
                            <td>{{ $property->price }}</td>
                            <td>
                                <a href="{{ route('vendors.properties.edit', ['id'=>$property->hashid]) }}" class="btn btn-warning btn-xs waves-effect waves-light">
                                    <span class="btn-label"><i class="icon-pencil"></i></span>Edit
                                </a>
                                <button type="button" onclick="ajaxRequest(this)" data-url="{{ route('vendors.properties.delete', ['id'=>$property->hashid]) }}" class="btn btn-danger btn-xs waves-effect waves-light">
                                    <span class="btn-label"><i class="icon-trash"></i></span>Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    {{-- @foreach($bookings->bookings->where('status', 'approved') AS $booking)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $booking->vendor_package->title }}</td>
                            <td>{{ $booking->name }}</td>
                            <td>{{ $booking->email }}</td>
                            <td>{{ $booking->phone_no }}</td>
                            <td>{{ $booking->departure_city }}</td>
                            <td>{{ number_format($booking->total_amount, 2) }} </td>
                            <td>{!! get_status($booking->status) !!}</td>
                            <td>
                                <a href="{{ route('vendors.tour_bookings.details', ['id'=>$booking->hashid]) }}">
                                    <i class="fa fa-eye text-primary" data-route=""></i>
                                </a>
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