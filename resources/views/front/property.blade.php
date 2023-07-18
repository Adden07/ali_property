@extends('front.layouts.master')
@section('content')


<!-- Listing Single Property -->
<section class="listing-title-area single-property-view mb-3 pb-3 mt-md-5 pt-md-5">
    <div class="container mt-5">
        <div class="row mb30">
            <div class="col-md-8">
                <div class="single_property_title mt30-767">
                    <h2>Property Name</h2>
                    <p>Appartment, ID: 13255, Added On: 17 Jluy 2023</p>
                </div>

            </div>
        </div>
       
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="view_propertyslide">
                            <div class="spls_style_two mb30-520">
                                <a class="popup-img" data-lightbox="roadtrip" href="https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg"><img class="img-fluid w100" src="https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg" alt="Image Name"></a>
                            </div>
                            <div class="spls_style_two mb30-520">
                                <a class="popup-img" data-lightbox="roadtrip" href="https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg"><img class="img-fluid w100" src="https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg" alt="Image Name"></a>
                            </div>
                            <div class="spls_style_two mb30-520">
                                <a class="popup-img" data-lightbox="roadtrip" href="https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg"><img class="img-fluid w100" src="https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg" alt="Image Name"></a>
                            </div>
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
                                <li><p><span class="mr-2">Property ID : </span> (544 4654-5454)</p></li>
                                <li><p><span class="mr-2">Price :</span> $ 950.00</p></li>
                                <li><p><span class="mr-2">Property Size :</span> 500 Sq Ft</p></li>
                                <li><p><span class="mr-2">Year Built :</span> 2015</p></li>
                                <li><p><span class="mr-2">Zipcode :</span> 123</p></li>

                                <li><p><span class="mr-2">Property Type :</span> Land</p></li>
                                <li><p><span class="mr-2">Bedrooms :</span> 5</p></li>
                                <li><p><span class="mr-2">Bathrooms :</span> 2</p></li>
                                <li><p><span class="mr-2">Est Repair Cost :</span> $ 23.00</p></li>
                                <li><p><span class="mr-2">Status :</span> Recent Added</p></li>
                            </ul>
                        </div>

                        <div class="col-md-12">
                            <a href="#" class="btn btn-success">Data Room Documents</a>
                            <a href="#" class="btn btn-danger">Register to offer</a>
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
                    <span> (901) 5454 5454</span>
                </div>
            </div>
            <div class="d-flex">
                <div class="d-flex fw-bold small">
                    <span class="mr-2">EVENT ITEM</span>
                    <span> 01, Apr 2022</span>
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
                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"  data-bs-target="#home">Investment Opportunity</a>
            </li>
            <li class="nav-item col-md-4 px-2 text-center">
                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"  data-bs-target="#profile">Location Information</a>
            </li>
            <li class="nav-item col-md-4 px-0 text-center">
                <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false" onclick="data_documents()">Data Room</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="listing_single_description">
                            <div class="lsd_list">
                                <ul class="p-0">
                                    <li class="list-inline-item mb-2"><a target="_blank" href="#">Land</a></li>
                                    <li class="list-inline-item mb-2"><a target="_blank" href="#">Beds: 5+</a></li>
                                    <li class="list-inline-item mb-2"><a target="_blank" href="#">Baths: 2</a></li>
                                    <li class="list-inline-item mb-2">Sq Ft: 26</li>
                                    <li class="list-inline-item mb-2">Lot Size: 82</li>
                                    <li class="list-inline-item mb-2">Status: Recent Added</li>
                                </ul>
                            </div>
                            <h4>Description</h4>
                            <div class="property-desc">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia rem vel assumenda accusamus expedita quis reiciendis ex.
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
                                            <li><p>(901) 5454 5454</p></li>
                                            <li><p>$ 959.00</p></li>
                                            <li><p>62 Sq Ft</p></li>
                                            <li><p>82 Acres</p></li>
                                            <li><p>2010</p></li>
                                            <li><p>1234</p></li>
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
                                            <li><p>Land</p></li>
                                            <li><p>5+</p></li>
                                            <li><p>2</p></li>
                                            <li><p>$ 22.00</p></li>
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
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel quidem veniam totam doloremque.
                                        </p>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>State</strong> <br>
                                        Sindh
                                    </div>
                                    <div class="col-md-3">
                                        <strong>City</strong> <br>
                                        Houston
                                    </div>
                                    <div class="col-md-3">
                                        <strong> Zip</strong> <br>
                                        1234
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <strong>Description</strong> <br>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi deleniti perspiciatis quisquam repudiandae sed? Consequatur debitis harum fuga vel, nihil quos dicta nesciunt deleniti reiciendis quaerat magnam commodi est quas?
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