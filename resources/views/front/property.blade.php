@extends('front.layouts.master')
@section('content')


<!-- Listing Single Property -->
<section class="listing-title-area single-property-view mb-3 pb-3 mt-md-5 pt-md-5">
    <div class="container mt-5">
        <div class="row mb30">
            <div class="col-md-8">
                <div class="single_property_title mt30-767">
                    <h2>{{ $property->title }}</h2>
                    <p>{{ $property->type }}, ID: {{ $property->property_id }}, Added On: {{ date('d-M-Y', strtotime($property->created_at)) }}</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="view_propertyslide">
                            @foreach($property->images AS $image)
                            <div class="spls_style_two mb30-520">
                                <a class="popup-img" data-lightbox="roadtrip" href="{{ asset($image->image) }}"><img class="img-fluid w100" src="{{ asset($image->image) }}" alt="Image Name"></a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-5 col-lg-4">
                <div class="additional_details p-0 border-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="mb30">Property Details</h3>
                        </div>
                        <div class="col-md-12">
                            <ul class="list-unstyled mr-0 p-0 mb-0">
                                <li><p><span class="mr-2">Property ID : </span> ({{ $property->property_id }})</p></li>
                                <li><p><span class="mr-2">Price :</span> $ {{ number_format($property->price) }}</p></li>
                                <li><p><span class="mr-2">Property Size :</span> {{ number_format($property->area) }} Sq Ft</p></li>
                                <li><p><span class="mr-2">Year Built :</span> {{ $property->year_built }}</p></li>
                                <li><p><span class="mr-2">Zipcode :</span> {{ $property->zipcode }}</p></li>

                                <li><p><span class="mr-2">Property Type :</span> {{ $property->type }}</p></li>
                                <li><p><span class="mr-2">Bedrooms :</span> {{ $property->rooms }}</p></li>
                                <li><p><span class="mr-2">Bathrooms :</span> {{ $property->bathrooms }}</p></li>
                                <li><p><span class="mr-2">Est Repair Cost :</span> $ {{ number_format($property->est_repair_cost) }}</p></li>
                                <li><p><span class="mr-2">Status :</span> {{ $property->status }}</p></li>
                            </ul>
                        </div>

                        <div class="col-md-12">
                            <a href="#" class="btn btn-success">Data Room Documents</a>
                            {{-- <a href="#" class="btn btn-danger">Register to offer</a> --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


<section class="our-agent-single bgc-f7 pt-5 pb-4">
    <div class="container">
        <div class="d-flex justify-content-between" style="width: 80%">
            <!-- <div class="d-flex font-weight-bold small">
                <span class="mr-2">Ten-X Licensing</span>
                <span>Ten-X Joshua Jacob RE Brkr PB00077782</span>
            </div> -->
            <div class="d-flex">
                <div class="d-flex fw-bold small">
                    <span class="mr-2">PROPERTY ID</span>
                    <span> {{ $property->property_id }}</span>
                </div>
            </div>
            <div class="d-flex">
                <div class="d-flex fw-bold small">
                    <span class="mr-2">EVENT ITEM</span>
                    <span> {{ date('d-M-Y', strtotime($property->created_at)) }}</span>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Agent Single Grid View -->
<section class="our-agent-single bgc-f7 pb-5 pt-4">
    <div class="container">

        <ul class="nav nav-tabs btm_tabs" id="myTab" role="tablist">
            <li class="nav-item col-md-4 px-0 text-center">
                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"  data-bs-target="#home">Overview</a>
            </li>
            <li class="nav-item col-md-4 px-2 text-center">
                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"  data-bs-target="#profile">Location Information</a>
            </li>
            {{-- <li class="nav-item col-md-4 px-0 text-center">
                <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false" onclick="data_documents()">Data Room</a>
            </li> --}}
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="listing_single_description">
                            <div class="lsd_list">
                                <ul class="p-0">
                                    <li class="list-inline-item mb-2"><a target="_blank" href="#">{{ $property->type }}</a></li>
                                    <li class="list-inline-item mb-2"><a target="_blank" href="#">Bedrooms: {{ $property->rooms }}</a></li>
                                    <li class="list-inline-item mb-2"><a target="_blank" href="#">Baths: {{ $property->bathrooms }} </a></li>
                                    <li class="list-inline-item mb-2">Sq Ft: {{ $property->area }}</li>
                                    <li class="list-inline-item mb-2">Lot Size: {{ $property->lot_size }}</li>
                                    <li class="list-inline-item mb-2">Status: {{ $property->status }}</li>
                                </ul>
                            </div>
                            <h4>Description</h4>
                            <div class="property-desc">
                                {{ $property->description }}
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="col-lg-12">
                        <div class="additional_details">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="mb15">Property Details</h4>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="row">
                                        <ul class="col-md-6 col-lg-6 mr-0">
                                            <li><p>Property ID :</p></li>
                                            <li><p>Price :</p></li>
                                            <li><p>Property Size :</p></li>
                                            <li><p>Lot Size :</p></li>
                                            <li><p>Year Built :</p></li>
                                            <li><p>Zipcode :</p></li>
                                        </ul>
                                        <ul class="col-md-6 col-lg-6">
                                            <li><p>{{ $property->property_id }}</p></li>
                                            <li><p>$ {{ number_format($property->price) }}</p></li>
                                            <li><p>{{ $property->area }} Sq Ft</p></li>
                                            <li><p>{{ $property->lot_size }}</p></li>
                                            <li><p>{{ $property->year_built }}</p></li>
                                            <li><p>{{ $property->zipcode }}</p></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="row">
                                        <ul class="col-md-6 col-lg-6 mr-0">
                                            <li><p>Property Type :</p></li>
                                            <li><p>Bedrooms :</p></li>
                                            <li><p>Bathrooms :</p></li>
                                            <li><p>Est Repair Cost :</p></li>
                                        </ul>
                                        <ul class="col-md-6 col-lg-6 mr-0">
                                            <li><p>{{ $property->type }}</p></li>
                                            <li><p>{{ $property->bathrooms }}</p></li>
                                            <li><p>{{ $property->rooms }}</p></li>
                                            <li><p>$ {{ number_format($property->est_repair_cost) }}</p></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="listing_single_description">
                    <!-- <h4 class="mb30">Location Information</h4> -->
                    <div class="mb25 property-desc">
                        <iframe   src="https://maps.google.com/maps?q=22,5000&hl=es&z=14&amp;output=embed" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <div class="col-12 mt-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <p>
                                            <strong>Address: </strong> <br>
                                            {{ $property->address }}
                                        </p>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>State</strong> <br>
                                        {{ $property->address }}
                                    </div>
                                    <div class="col-md-3">
                                        <strong>City</strong> <br>
                                        {{ $property->city }}
                                    </div>
                                    <div class="col-md-3">
                                        <strong> Zip</strong> <br>
                                        {{ $property->zipcode }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <strong>Description</strong> <br>
                                {{ $property->description }}
                            </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="listing_single_description">
                    <div class="mb25 property-desc">
                     <div class="modal-body" id="documentsModalBody"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


{{--
<section>
    <div class="container-fluid p0">
        <div class="container">
            <div class="row" id="listing_properies">
                <div class="col-sm-6 col-12 col-md-4 col-lg-4">
                    <div class="feat_property home7 style4">
                        <div class="thumb">
                                <div class="item">
                                    <div class="add_to_fav_views">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="m-0 total_views"><span class="badge badge-info"> Views: 0 </span></h5>
                                        </div>
                                    </div>
                                    <a class="d-block" href="{{route('front.properties.single', $val->slug)}}">
                                        <img class="img-whp" src="{{asset(@check_file($val->thumbnail->thumbnail,'property'))}}" alt="{{$val->title}}">
                                    </a>
                                </div>
                        </div>
                        <div class="details">
                            <div class="tc_content">
                                <p class="text-thm">{{$val->type}}</p>
                                <a class="d-block" href="{{route('front.properties.single', $val->slug)}}">
                                    <h4>{{$val->title}}</h4>
                                </a>
                                <p><span class="badge {{get_property_status_color($val->status)}} fz15">{{$val->status}}</span></p>
                                <ul class="prop_details mb0">
                                    <li class="list-inline-item"><a href="javascript:void(0)">Rooms: {{$val->rooms}}</a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)">Baths: {{$val->bathrooms}}</a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)">Area :  {{$val->area}} Sq Ft</a></li>
                                </ul>
                            </div>
                            <div class="fp_footer">
                                <span class="btn btn-success">Starting Offer {{get_price($val->price)}}</span>
                                <div class="fp_pdate float-right">{{$val->created_at->diffForHumans()}}</div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>

            <div class="row">
                <div class="col-12 text-center">
                    <a href="{{ route('front.all_properties', ['category' => $property->type]) }}" class="btn btn-success">View All Similar</a>
                </div>
            </div>
        </div>
    </div>
</section>

--}}

@endsection
@section('script')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
@endsection
