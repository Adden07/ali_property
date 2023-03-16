@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">Travel & Tour Bookings</a></li>
                </ol>
            </div>
            <h4 class="page-title"> Travel & Tours Bookings</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title m-t-0">All travel & tours bookings</h4>
            <p class="text-muted font-14 m-b-20">
                Here are all the bookings.
            </p>
            <table class="table dt_table table-bordered w-100 nowrap" id="laravel_datatable">
                <thead>
                    <th>S.no</th>
                    <th>Package</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>Departure <br /> City</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Details</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($bookings AS $booking)
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
                                <a href="{{ route('admin.tour_bookings.details', ['id'=>$booking->hashid]) }}"><i class="fa fa-eye text-primary"></i></a>
                            </td>
                            <td>
                                <input type="checkbox" class="js-switch-small nopopup"  data-toggle="switchery" onchange="ajaxRequest(this)" data-url="{{ route('admin.tour_bookings.update_status', ['id'=>$booking->hashid, 'status'=>$booking->status, 'column_name'=>'is_featured']) }}" @if($booking->status == 'approved') checked @endif value="1" />
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