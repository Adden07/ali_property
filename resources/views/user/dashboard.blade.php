@extends('front.layouts.master')
@section('content')

<div class="col-12">
    <div class="text-center breadcrumb-main it_solutions">
        <h1 class="text-white fw-bold">Order</h1>
        <p class="text-white">Lorem Ipsum</p>
    </div>
</div>




<div class="container my-5">
    <div class="row">
        <div class="col-md-3">
            <div class="account-tabs">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <button class="nav-link btn active" id="dashboard-tab" data-bs-toggle="tab" data-bs-target="#dashboard" type="button" role="tab" aria-controls="home" aria-selected="true">Dashboard</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link btn" id="booking-tab" data-bs-toggle="tab" data-bs-target="#booking" type="button" role="tab" aria-controls="profile" aria-selected="false">Booking</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link btn" id="account-tab" data-bs-toggle="tab" data-bs-target="#account" type="button" role="tab" aria-controls="contact" aria-selected="false">Account Details</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link btn" id="wishlist-tab" data-bs-toggle="tab" data-bs-target="#wishlist" type="button" role="tab" aria-controls="contact" aria-selected="false">Wishlist</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link btn" data-url="{{ route('users.logout') }}" onclick="ajaxRequest(this)">Logout</button>
                    </li>
                </ul>

            </div>

        </div>


        <div class="col-md-9 mt-3">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">

                    <div>
                        <h3>Welcome! User</h3>
                    </div>

                </div>

                <div class="tab-pane fade" id="booking" role="tabpanel" aria-labelledby="booking-tab">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Booking Id</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings AS $booking)
                                <tr>
                                    <th>{{ $booking->booking_id }}</th>
                                    <td>{{ date('d-M-Y', strtotime($booking->travel_date)) }}</td>
                                    <td>{!! get_status($booking->status) !!}</td>
                                    <td>AED {{ number_format($booking->total_amount, 2) }}</td>
                                    <td><a href="#" class="btn btn-theme">View</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

                <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
                    <div class="">
                        <div class="text-center">
                            <h2 class="fw-bold mb-4">Update Profile</h2>
                        </div>
                        <form action="{{ route('users.update_detail') }}" method="POST" class="ajaxForm">
                            @csrf
                            <div class="mb-4">
                                <label for="fname" class="form-label fw-500">Full Name</label>
                                <input type="text" class="form-control" id="fname" name="full_name" placeholder="Full Name" value="{{ $account_details->full_name }}">
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label fw-500">Email</label>
                                <input type="email" class="form-control" disabled id="email" name="email" placeholder="Email" value="{{ $account_details->email }}">
                            </div>

                            <div class="mb-4">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="pass" class="form-label fw-500">Current Password</label>
                                            <input type="password" class="form-control" id="pass" name="current_password" placeholder="Enter Password">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="pass" class="form-label fw-500">Password</label>
                                            <input type="password" class="form-control" id="pass" name="password" placeholder="Enter Password">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="cpass" class="form-label fw-500">Confirm Password</label>
                                            <input type="password" class="form-control" id="cpass" name="password_confirmation" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-theme w-100 py-2">Update</button>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="wishlist" role="tabpanel" aria-labelledby="wishlist-tab">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Package</th>
                                <th scope="col">Starting Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($wishlists AS $wishlist)
                                <tr>
                                    <th scope="row">{{ $wishlist->package->title }}</th>
                                    <td>AED {{ collect($wishlist->package->infant, $wishlist->package->child, $wishlist->package->adult)->min() ?? 500 }}</td>
                                    <td>
                                        {{-- <button type="button" class="btn btn-theme w-30">Add to cart</button> --}}
                                        <button type="button" class="btn btn-danger w-30 ms-2" data-id="{{ $wishlist->hashid }}" onclick="remove_wishlist(this)">Remove</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        function remove_wishlist(_self){
            var id = $(_self).data('id');
            var route = "{{ route('users.remove_wishlist', ':id') }}";
            route     = route.replace(':id', id);

            getAjaxRequests(route, '', 'GET', function(resp){
                if(resp.success){
                    $(_self).parent().parent().remove();
                }
            });
        }
    </script>
@endsection