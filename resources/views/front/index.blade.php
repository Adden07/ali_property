@extends('front.layouts.master')
<style>
 #map {
    height: 500px;
  }
    </style>
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">

                {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d3604.9407195175736!2d68.35130741448798!3d25.373303180760875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0x394c7034bbdd3f37%3A0x51c3c38ecd337dde!2sGexton%20Education%2C%203rd%20Floor%D8%8C%20Auto%20Bahn%20Road%2C%20Hyderabad!3m2!1d25.3751754!2d68.3505706!4m5!1s0x394c7061e83d2983%3A0x6714b1b7fdaa9c9c!2sGexton%20Rd%2C%20Latifabad%20Unit%207%20Latifabad%2C%20Hyderabad%2C%20Sindh%2071000%2C%20Pakistan!3m2!1d25.3719657!2d68.3531361!5e0!3m2!1sen!2s!4v1677841739325!5m2!1sen!2s" width="100%" height="450" style="border:0;margin-top: 95px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                <div id="map" style="margin-top: 95px"></div>

            </div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="banner">
                    <div class="container">
                        <ul class="nav nav-tabs" id="myTab" role="tablist" style="position: relative;z-index: 99;">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#property" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true" style="border-radius: 5px 0px 0px 0px;">Property</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#agent" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false" style="border-radius: 0px 5px 0px 0px;">Agent</button>
                            </li>
                        </ul>

                        <div class="tab-content mt-5" id="myTabContent">
                            <div class="tab-pane show active" id="property" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <form class="search-property" action="{{ route('fronts.all_properties') }}">
                                    <div class="input-group">
                                        <select class="form-select" name="property_type" aria-label="Default select example">
                                            <option selected>Type of Property</option>
                                            {!! get_property_types() !!}
                                        </select>

                                        <input type="text" name="city" placeholder="Enter City or country" class="form-control">
                                        <button class="btn" type="submit">Find</button>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane" id="agent" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                <form class="search-agent">
                                    <div class="input-group">

                                        <input type="text" name="" placeholder="Enter Your Zip Code" class="form-control">

                                        <button class="btn" type="submit">Find My Local Agent</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<section class="property-sale">
    <div class="container">

        <div class="d-flex justify-content-between heading">
            <div>
                <h3>Popular properties for sale around the world</h3>
                <p>Explore some of the most popular properties for sale around the world</p>
            </div>

            <div><a href="{{ route('fronts.all_properties') }}" class="btn btn-primary">VIEW ALL</a></div>
        </div>

        <div class="properties-slider">
            @foreach($properties AS $property)
            <div class="col-md-3 properties">
                <a href="{{ route('fronts.property', ['id'=>$property->hashid]) }}" class="text-decoration-none position-relative">
                    @if($property->purpose == 'rent')
                    <div class="position-absolute property_cate rent">
                        Rent
                    </div>
                    @else
                    <div class="position-absolute property_cate buy">
                        Sell
                    </div>
                    @endif
                    {{-- <div class="position-absolute property_cate sold">
                            Sold
                        </div> --}}

                    <img src="{{ asset(@$property->thumbnail->image) }}" class="property_image" width="100%">
                    <div class="properties_content">
                        <div class="property_type">
                            Type: {{ $property->type }}
                        </div>
                        <h5 class="title">{{ $property->title }}</h5>
                        <h5 class="price">$ {{ number_format($property->price, 2) }}</h5>
                        <!-- <p><img src="{{ asset('front_assets/imgs/MapPinLine.png') }}" class="m-0 me-2 d-inline">{{ $property->address }}</p> -->
                        <ul class="list-inline">
                            <li class="list-inline-item"><img src="{{ asset('front_assets/imgs/double-bed.png') }}" alt="Beds" class="m-0 d-inline-block"> {{ $property->rooms }}</li>
                            <li class="list-inline-item"><img src="{{ asset('front_assets/imgs/bathroom.png') }}" alt="Baths" class="m-0 d-inline-block"> {{ $property->bathrooms }}</li>
                            <li class="list-inline-item"><img src="{{ asset('front_assets/imgs/house-design.png') }}" alt="Area" class="m-0 d-inline-block">{{ number_format($property->area) }} sqft</li>
                        </ul>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="category mt-5">
    <div class="container">
        <div class="text-center">
            <h3>Explore overseas property in popular areas</h3>

            <a href="javascript:void(0)" class="text-decoration-none">
                <p><img src="{{ asset('front_assets/imgs/MapPinLine.png') }}" class="me-2">Explore all 117 countries and regions</p>
            </a>
        </div>

        <!--
        <div class="row categories align-items-center mb-5 pb-3">

            <div class="col-md-6 type">
                <div class="main-cat" style="background: url( {{ asset('front_assets/imgs/home-bgtravel.png') }} ) no-repeat;">
                    <div class="d-flex align-items-center">
                        <div class="ms-3">
                            <h5>Travel & Tourism</h5>
                            <p class="mb-5">Choose the deals that suit you the best.</p>
                            <a href="{{ route('fronts.travel_tourisam') }}" class="btn btn-white">Explore</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 type">
                <div class="main-cat" style="background: url( {{ asset('front_assets/imgs/home-itsol.png') }} ) no-repeat;">
                    <div class="d-flex align-items-center">
                        <div class="ms-3">
                            <h5>IT Solutions</h5>
                            <p class="mb-5">Best In Class IT deals and packages!</p>
                            <a href="{{ route('fronts.it_solutions') }}" class="btn btn-white">Explore</a>
                        </div>
                    </div>
                </div>
            </div>

        </div> -->

        <div class="row services my-4 mt-5">
            {{-- @foreach($services->mergeRecursive($packages) AS $all)
            <div class="col-md-2 text-center">
                <img src="{{ check_file($all->image) }}" height="100px" width="100px" class="rounded-circle">
            <h5>{{ $all->service_name ?? $all->title }}</h5>
            <a href="{{ route('fronts.it_solutions') }}" class="btn btn-white">23 listing</a>
        </div>
        @endforeach --}}
    </div>
    </div>
</section>

<section class="about-section mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Ali Property Advisors is your international assistant in buying and selling real estate!
                </h2>
                <a href="javascript:void(0)" class="btn btn-primary">ABOUT</a>
            </div>

            <div class="col-md-6">
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
            </div>
        </div>
    </div>
</section>


{{--
<section class="property-sale">
    <div class="container">
        <div class="d-flex justify-content-between heading">
            <div>
                <h3>Popular properties for sale around the world</h3>
                <p>Explore some of the most popular properties for sale around the world</p>
            </div>
            <div><a href="javascript:void(0)" class="btn btn-primary">VIEW ALL</a></div>
        </div>

        <div class="properties-slider">
            @foreach($properties AS $property)
                <div class="col-md-3 properties">
                    <a href="javascript:void(0)" class="text-decoration-none">
                        <div class="badge rent">
                            Rent
                        </div>
                        <img src="{{ check_file($property->image) }}" width="100%">
                        <h5>{{ number_format($property->price, 2) }}</h5>
                        <p><img src="{{ asset('front_assets/imgs/MapPinLine.png') }}" class="m-0 me-2 d-inline">{{ $property->address }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section> --}}

<!-- <section class="agents-banner mt-5">
    <div class="container">
        <h1 class="text-white">We are dedicated to helping agents build successful
            real estate careers. We help agents develop a plan, build a database and work smarter to uncover keys to success as a real estate agent.</h1>

        <div class="row">
            <div class="col-md-3 agents">
                <img src="{{ asset('front_assets/imgs/HouseLine.png') }}">
                <h6>Properties at Great Prices</h6>
                <p>The best investment opportunities</p>
                <a href="javascript:void(0)" class="text-decoration-none text-white">Find out now<img src="{{ asset('front_assets/imgs/ArrowUpRight.png') }}" class="ams-2"></a>
            </div>
            <div class="col-md-3 agents">
                <img src="{{ asset('front_assets/imgs/HouseLine.png') }}">
                <h6>Local Agents</h6>
                <p>Vivamus ac tellus ut massa bibendum aliquam</p>
                <a href="javascript:void(0)" class="text-decoration-none text-white">Find out now<img src="{{ asset('front_assets/imgs/ArrowUpRight.png') }}" class="ams-2"></a>
            </div>
            <div class="col-md-3 agents">
                <img src="{{ asset('front_assets/imgs/HouseLine.png') }}">
                <h6>Free Mortgage Calculation</h6>
                <p>Lorem ipsum dolor sit amet, consectetur</p>
                <a href="javascript:void(0)" class="text-decoration-none text-white">Find out now<img src="{{ asset('front_assets/imgs/ArrowUpRight.png') }}" class="ams-2"></a>
            </div>
            <div class="col-md-3 agents">
                <img src="{{ asset('front_assets/imgs/HouseLine.png') }}">
                <h6>Property Trends</h6>
                <p>Find popular areas to buy property</p>
                <a href="javascript:void(0)" class="text-decoration-none text-white">Find out now<img src="{{ asset('front_assets/imgs/ArrowUpRight.png') }}" class="ams-2"></a>
            </div>
        </div>
    </div>
</section>

<section class="meet-agents">
    <div class="container">
        <div class="heading d-flex justify-content-between">
            <div>
                <h3>Meet Our Agents</h3>
            </div>

            <div>
                <a href="javascript:void(0)" class="btn" id="agent">+ BECOME AN AGENT</a>
                <a href="javascript:void(0)" class="btn" id="view">View all<img src="{{ asset('front_assets/imgs/ArrowUpRight-blue.png') }}" class="ms-1"></a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 agents">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img src="{{ asset('front_assets/imgs/agent1.png') }}">
                    </div>
                    <div class="flex-grow-1 ms-3 details">
                        <h5>Aly Khan</h5>
                        <p class="occupation">Real State Agent</p>
                        <p class="mt-3"><img src="{{ asset('front_assets/imgs/PhoneCall.png') }}" class="me-2">+92-333-1111222</p>
                        <p><img src="{{ asset('front_assets/imgs/EnvelopeSimple.png') }}" class="me-2">user@domain.com</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 agents">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img src="{{ asset('front_assets/imgs/agent2.png') }}">
                    </div>
                    <div class="flex-grow-1 ms-3 details">
                        <h5>Kyle Walker</h5>
                        <p class="occupation">Real State Agent</p>
                        <p class="mt-3"><img src="{{ asset('front_assets/imgs/PhoneCall.png') }}" class="me-2">+92-333-1111222</p>
                        <p><img src="{{ asset('front_assets/imgs/EnvelopeSimple.png') }}" class="me-2">user@domain.com</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 agents">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img src="{{ asset('front_assets/imgs/agent3.png') }}">
                    </div>
                    <div class="flex-grow-1 ms-3 details">
                        <h5>Naby Keita</h5>
                        <p class="occupation">Real State Agent</p>
                        <p class="mt-3"><img src="{{ asset('front_assets/imgs/PhoneCall.png') }}" class="me-2">+92-333-1111222</p>
                        <p><img src="{{ asset('front_assets/imgs/EnvelopeSimple.png') }}" class="me-2">user@domain.com</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 agents">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img src="{{ asset('front_assets/imgs/agent4.png') }}">
                    </div>
                    <div class="flex-grow-1 ms-3 details">
                        <h5>Bruno Fernades</h5>
                        <p class="occupation">Real State Agent</p>
                        <p class="mt-3"><img src="{{ asset('front_assets/imgs/PhoneCall.png') }}" class="me-2">+92-333-1111222</p>
                        <p><img src="{{ asset('front_assets/imgs/EnvelopeSimple.png') }}" class="me-2">user@domain.com</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 agents">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img src="{{ asset('front_assets/imgs/agent5.png') }}">
                    </div>
                    <div class="flex-grow-1 ms-3 details">
                        <h5>Catherine Olson</h5>
                        <p class="occupation">Real State Agent</p>
                        <p class="mt-3"><img src="{{ asset('front_assets/imgs/PhoneCall.png') }}" class="me-2">+92-333-1111222</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 agents">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img src="{{ asset('front_assets/imgs/agent6.png') }}">
                    </div>
                    <div class="flex-grow-1 ms-3 details">
                        <h5>Jordan Henderson</h5>
                        <p class="occupation">Real State Agent</p>
                        <p><img src="{{ asset('front_assets/imgs/EnvelopeSimple.png') }}" class="me-2">user@domain.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->


<section class="become-agent">
    <div class="container-fluid">
        <h1>We provides agents with the tools and services to grow their business.</h1>
        <a href="javascript:void(0)" class="btn">+ BECOME AN AGENT</a>
    </div>
</section>

<section class="faq">
    <div class="container">
        <h3 class="text-center">Frequently Asked Questions</h3>
        <div class="row">
            @foreach($faqs AS $faq)
            <div class="col-md-6">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                {{ $faq->question }}
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                {!! $faq->answer !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="request-form">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Want to become a Real Estate Agent?</h2>
                <p>We'll help you to grow your career and growth.</p>
                <a href="javascript:void(0)" class="btn btn-dark">Signup Today</a>
            </div>

            <div class="col-md-6 form">
                <h5>Request a Callback</h5>
                <p>Fill out the form below to schedule a meeting with us. Our representatives accommodate your needs</p>
                <form action="{{ route('fronts.agent_request') }}" method="POST" class="ajaxForm">
                    @csrf
                    <div class="row req-form">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control name" placeholder="Your Name">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="contact_no" class="form-control" placeholder="Contact Number">
                        </div>

                        <div class="col-md-12">
                            <textarea rows="2" class="form-control" name="message" placeholder="Your Message"></textarea>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary text-center">SEND</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
<script  src="https://maps.googleapis.com/maps/api/js?key={{config('app.map_key')}}">
    </script>
<script>
var mapDiv;
let position = {coords:{latitude:'',longitude:''}};
function initMap(position) {
  mapDiv = document.getElementById('map');
  var map = new google.maps.Map(mapDiv, {
  	center: new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
    zoom: 12,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}] // "Subtle Grayscale" style found on snazzymaps.com

	});
 //[53.34449219138831, -6.259396073702419]
  var markerCoords = [];
  var markers = [];
  var marker;
  for (var i = 0, len = markerCoords.length; i < len; i++){
    marker = new google.maps.Marker({position: new google.maps.LatLng(markerCoords[i][0], markerCoords[i][1])});
    markers.push(marker);
  }
  var markerCluster = new MarkerClusterer(map, markers,{imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

}

$( document ).ready(function() {
    getLocation();
    function getLocation() {
    if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition,showError);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
  initMap(position);
   get_location(function(data){
         getlisting(data);
    })
}
function showError(error) {
    get_location(function(data){
         position.coords.latitude  = data.latitude;
         position.coords.longitude = data.longitude;
         initMap(position);
         getlisting(data);
    })
}
});
function getlisting(data){
    console.log(data);
}
function get_location(callback){
    $.getJSON('https://json.geoiplookup.io/?callback=?', function(data) {
        callback(data);
    });
}
// initMap();
</script>

@endsection
