@extends('layouts.admin')

@section('content')

<style>
    .package_image {
        width: 100px;
        height: 100px;
        object-fit: contain;
    }
</style>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">Property</a></li>
                    <li class="breadcrumb-item active">{{ isset($is_update) ? 'edit' : 'add'}} </li>
                </ol>
            </div>
            <h4 class="page-title">{{ isset($is_update) ? 'Edit' : 'Add'}} Property</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('vendors.properties.store') }}" class="ajaxForm" method="post" enctype="multipart/form-data" novalidate id="form">
            @csrf
            <div class="card-box">
                <!-- <h4 class="header-title m-t-0">{{ isset($is_update) ? 'Edit' : 'Add'}} Property</h4>
                <p class="text-muted font-14 m-b-20">
                    Here you can {{ isset($is_update) ? 'edit' : 'add'}} Property.
                </p> -->

                <h4 class="header-title m-t-0">Location and Purpose</h4>
                <hr>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Purpose</label>
                        <select class="form-control" name="purpose" id="purpose">
                            <option value="">Select purpose</option>
                            <option value="sell">Sell</option>
                            <option value="rent">Rent</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Property Type</label>
                        <select class="form-control" name="property_type" id="property_type">
                            <option value="">Select property type</option>
                            <option value="house">House</option>
                            <option value="flat">Flat</option>
                            <option value="uppoer_portion">Upper Portion</option>
                            <option value="lower_portion">Lower portion</option>
                            <option value="farmhouse">Farm House</option>
                            <option value="room">Room</option>
                            <option value="penthouse">Penthouse</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">City</label>
                        <select class="form-control select_2_class" name="city_id" id="city_id">
                            <option value="">Select City</option>
                            @foreach(auth('vendor')->user()->cities()->get() AS $city)
                                <option value="{{ $city->hashid }}">{{ $city->city }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        {{-- <div class="selection">
                            <input id="map_input" type="text" size="50" class="map_input form-control mb-3">
                            <div id="map" style="width: 100%; height: 300px;"></div>
                        </div> --}}
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="address" id="address">
                    </div>
                </div>
            </div>

            <div class="card-box">
                <h4 class="header-title m-t-0">Price and Area</h4>
                <hr>
                <div class="row">
                    <div class="col-md">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="">Area size</label>
                                <input type="number" class="form-control" name="area_size" id="area_size">
                            </div>
                            <div class="col-md-4">
                                <label for="">&nbsp;&nbsp;&nbsp;</label>
                                <select class="form-control" name="area_size_unit" id="area_size_unit">
                                    <option value="sq/ft">Sq/ft</option>
                                    <option value="sq/yds">Sq/Yds</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <label for="">Price</label>
                        <input type="number" class="form-control" name="price" id="price">
                    </div>
                </div>
            </div>


            <div class="card-box">
                <h4 class="header-title m-t-0">Feature and Amenities</h4>
                <hr>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Bedrooms</label>
                        <select class="form-control" name="bedrooms" id="bedrooms">
                            <option value="">Select Bedrooms</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Batrooms</label>
                        <select class="form-control" name="bathrooms" id="bathrooms">
                            <option value="">Select Bathroom</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-box">
                <h4 class="header-title m-t-0">Property images</h4>
                <hr>
                <div class="row mt-2">
                    <div class="form-group col-md-6">
                        <label for="logo">Property Thumbnail</label>
                        <div class="input-group mb-2">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image"  id="image" onchange="showPreview('preview_image')">
                                <label class="custom-file-label profile_img_label" for="logo">Choose property thumbnail</label>
                            </div>
                        </div>
                        <img id="preview_image" src="{{ check_file(@$edit_package->image) }}"  class="@if(!@$is_update) d-none @endif" width="100px" height="100px"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="logo">Property images <small class="text-danger">(Here you can upload multiple images)</small></label><br />
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" multiple class="custom-file-input" name="image_arr[]"  id="image" onchange="multiImagePreview(this, '.multi_image_preview')">
                                <label class="custom-file-label profile_img_label" for="logo">Choose property images</label>
                            </div>
                        </div>

                        <div class="multi_image_preview mt-3">
                            @isset($is_update)
                                @if($edit_package->package_images_count > 0)
                                    @foreach($edit_package->packageImages AS $image)
                                    <div class="position-relative d-inline inner_box mr-2 mb-2">
                                        <button type="button" class="btn btn-danger position-absolute nopopup" onclick="ajaxRequest(this); deleteImage(this)", data-url="{{ route('vendors.packages.delete_image', ['id'=>$image->hashid]) }}" style="right: 0"><i class="fas fa-times"></i></button>
                                        <img src="{{ check_file($image->image) }}" alt="" class="package_image">
                                    </div>
                                    @endforeach
                                @endif
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-box">
                <h4 class="header-title m-t-0">Ad Information</h4>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                </div>
                <div class="row mt-4 mb-3">
                    <div class="col-md-12">
                        <label for="">Long Description</label>
                        <textarea name="description" id="ck" cols="30" rows="10">
                            {{ @$edit_faq->description }}
                        </textarea>
                    </div>
                </div>
            </div> 
            <div class="card-box">
                <h4 class="header-title m-t-0">Contact information</h4>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="col-md-4">
                        <label for="">Contact no</label>
                        <input type="text" class="form-control" name="contact_no" id="contact_no">
                    </div>
                    {{-- <div class="col-md-4">
                        <label for="">landline</label>
                        <input type="email" class="form-control" name="landline" id="landline">
                    </div> --}}
                </div>
            </div>
            <div class="text-right">
                <input type="hidden" name="location" id="location" value="">
                <input type="hidden" name="faq_id" value="{{ @$edit_faq->hashid }}">
                <input type="submit" class="btn btn-primary" value="{{ isset($is_update) ? 'Update':'Add' }}">
            </div>   
            </form>
        </div>
    </div>
</div>
@endsection

@section('page-scripts')
@include('admin.partials.datatable', ['load_swtichery' => true])
<script src="{{ get_asset('admin_assets') }}/js/custom_counrties_cities_api.js"></script>
<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyCqLOd0HPJc-QRw50tDw7Hm0ODZ8nTi4pw&libraries=places'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.min.js"></script>
<script>
    $('form').on('submit', function(){
        CKupdate();
    });

    // $(document).ready(function(){
    //     getCities(get_token(), 'city_id', "{{ auth('vendor')->user()->state }}");
    // });
    var autocompletes = [],
		map, marker, geocoder;

	var latlng = {
		lat: 24.395328065245653,
		lng: 54.57230402925457
	};

	function initialize() {
		var inputs = $('.map_input');
		map = new google.maps.Map(document.getElementById("map"), {
			center: latlng,
			zoom: 13
		});
		marker = new google.maps.Marker({
			position: latlng,
			map: map,
			draggable: true
		});

		// map2 = new google.maps.Map(document.getElementById("modal_map"), {
		// 	center: latlng,
		// 	zoom: 13
		// });

		// marker2 = new google.maps.Marker({
		// 	position: latlng,
		// 	map: map2,
		// 	draggable: true
		// });

		geocoder = new google.maps.Geocoder();
		// autocomplete = new google.maps.places.Autocomplete(input);
		var autocomplete_options = {
			componentRestrictions: {
				country: 'ae'
			}
		};
        console.log(autocomplete_options);
		for (var i = 0; i < inputs.length; i++) {
			var autocomplete = new google.maps.places.Autocomplete(inputs[i], autocomplete_options);
			autocomplete.inputId = inputs[i].id;
			autocomplete.addListener('place_changed', autocomplete_filling);
			autocompletes.push(autocomplete);
		}

		google.maps.event.addListenerOnce(map, 'idle', function() {
			geocodePosition(this.center);
		});

		// google.maps.event.addListenerOnce(map2, 'idle', function() {
		// 	geocodePosition(this.center);
		// });

		google.maps.event.addListener(marker, 'dragend', function() {
			map.setCenter(this.getPosition()); // Set map center to marker position
			map2.setCenter(this.getPosition()); // Set map center to marker position
			marker2.setPosition(this.getPosition()); // Set map center to marker position
			geocodePosition(this.getPosition()); // update position display
		});

		google.maps.event.addListener(map, 'dragend', function() {
			map2.setCenter(this.getCenter());
			marker.setPosition(this.getCenter()); // set marker position to map center
			marker2.setPosition(this.getCenter()); // set marker position to map center
			geocodePosition(this.getCenter()); // update position display
		});

		// google.maps.event.addListener(marker2, 'dragend', function() {
		// 	map.setCenter(this.getPosition()); // Set map center to marker position
		// 	map2.setCenter(this.getPosition()); // Set map center to marker position
		// 	marker.setPosition(this.getPosition()); // Set map center to marker position
		// 	geocodePosition(this.getPosition()); // update position display
		// });

		// google.maps.event.addListener(map2, 'dragend', function() {
		// 	map.setCenter(this.getCenter()); // Set map center to marker position
		// 	marker.setPosition(this.getCenter()); // set marker position to map center
		// 	marker2.setPosition(this.getCenter()); // set marker position to map center
		// 	geocodePosition(this.getCenter()); // update position display
		// });
	}

	function autocomplete_filling() {
		var place = this.getPlace();
		map.setCenter(place.geometry.location);
		// map2.setCenter(place.geometry.location);
		marker.setPosition(place.geometry.location);
		// marker2.setPosition(place.geometry.location);
		geocodePosition(place.geometry.location);
	}

	function geocodePosition(pos) {
		// {lat: '123', lng: '123'};
		geocoder.geocode({
			location: pos,
		}, function(responses) {
			var address = '';
			if (responses && responses.length > 0) {
				address = responses[0].formatted_address;
			} else {
				address = 'Cannot determine address at this location.';
			}
			$('.map_input').val(address)
			$('#location').val(address);
		});
	}
	// google.maps.event.addDomListener(window, 'load', initialize);

	$('.map_input').change(function() {
		// alert('on');
		$('#address').val($('.map_input').val());
	});

    //delete package image
    function deleteImage(_self){
        $(_self).next().remove();
        $(_self).parent().remove();
    }

    var input = document.querySelector("#contact_no");
    intlTelInput(input, {
      initialCountry: "pk",
    //   countryCode:"us"
    //   geoIpLookup: function (success, failure) {
    //     $.get("https://ipinfo.io", function () { }, "jsonp").always(function (resp) {
    //       var countryCode = (resp && resp.country) ? resp.country : "us";
    //       success(countryCode);
    //     });
    //   },
    });
</script>
@endsection