@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Booking details</a></li>
                </ol>
            </div>
            <h4 class="page-title">Booking details</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title m-t-0">Booking details</h4>
            <p class="text-muted font-14 m-b-20">
                Here is the booking details
            </p>

            <div class="col-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <b>Package Name</b>
                            </div>
                            <div class="col-md-6">
                                {{ $details->vendor_package->title }}
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <b>Booking #</b>
                            </div>
                            <div class="col-md-6">
                                0001
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <b>Travel Date</b>
                            </div>
                            <div class="col-md-6">
                                {{ date('d-M-Y', strtotime($details->travel_date)) }}
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <b>Timing</b>
                            </div>
                            <div class="col-md-6">
                                {{ $details->timing }}
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <b>Booked By</b>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <b>Name: </b>
                            </div>
                            <div class="col-md-6">
                                {{ $details->name }}
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <b>Email: </b>
                            </div>
                            <div class="col-md-6">
                                {{ $details->email }}
                            </div>
                        </div>


                        <div class="row mt-2">
                            <div class="col-md-6">
                                <b>Contact No: </b>
                            </div>
                            <div class="col-md-6">
                                {{ $details->phone_no }}
                            </div>
                        </div>


                        <div class="row mt-2">
                            <div class="col-md-6">
                                <b>Departure City: </b>
                            </div>
                            <div class="col-md-6">
                                {{ $details->departure_city }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h3>{{ $details->vendor_package->vendor->company_name }}</h3>
                        {{ $details->vendor_package->vendor->contact_person_name }} <br>
                        {{ $details->vendor_package->vendor->contact_no }} <br>
                        <br>

                        {{ $details->vendor_package->vendor->email }}

                        {{-- <br>
                        www.website.com --}}

                    </div>

                </div>
            </div>

            <div class="col-md-12 mt-3">
                <h3>Addons</h3>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>No of people</th>
                            <th>Add ons</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Infant</td>
                            <td>{{ $details->no_of_infant }}</td>
                            <td></td>
                            <td>{{ number_format($details->infant_amount, 2) }}</td>
                        </tr>
                        <tr>
                            <td>Child</td>
                            <td>{{ $details->no_of_child }}</td>
                            <td></td>
                            <td>{{ number_format($details->child_amount, 2) }}</td>
                        </tr>
                        <tr>
                            <td>Adult</td>
                            <td>{{ $details->no_of_adult }}</td>
                            <td></td>
                            <td>{{ number_format($details->adult_amount, 2) }}</td>
                        </tr>
                        <tr>
                            <td>Dinner</td>
                            <td></td>
                            <td></td>
                            <td>{{ number_format($details->dinner, 2) }}</td>
                        </tr>
                        @if(!is_null($details->add_ons))
                            @foreach($details->add_ons AS $add_on)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $add_on['title'] }}</td>
                                    <td>{{ number_format($add_on['price'], 2) }}</td>
                                </tr>
                            @endforeach
                        @endif
                        <tr>
                            <td colspan="3"><strong>Total</strong></td>
                            <td>{{ number_format($details->total_amount, 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
