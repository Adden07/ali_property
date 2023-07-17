@extends('layouts.admin')
@section('content')

<style>
    .portfolio_upload{background-color:#f7f7f7;border:1px solid #ebebeb;border-radius:8px;height:223px;margin-bottom:30px;text-align:center}.portfolio_upload .btn{color:#fff;cursor:pointer;padding:8px 20px;font-size:46px;font-weight:400}.portfolio_upload .icon{font-size:48px;margin-top:50px}.portfolio_upload .icon{color:#39b54a;font-size:48px;margin-top:50px;-webkit-transform:rotate(180deg);-moz-transform:rotate(180deg);-o-transform:rotate(180deg);transform:rotate(180deg)}.portfolio_upload p{font-size:22px;font-family:Poppins,sans-serif;color:#484848;font-weight:700;line-height:1.2;margin-bottom:0;position:relative}.portfolio_upload input[type=file]{font-size:100px;height:100%;position:absolute;left:0;top:0;opacity:0}
    .file {
    position: relative;
    display: block;
    cursor: pointer;
    height: 2.5rem;
    }
    .file input {
        min-width: 14rem;
        margin: 0;
        filter: alpha(opacity=0);
        opacity: 0;
    }

    .file-custom {
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        z-index: 5;
        height: 2.5rem;
        padding: 0.5rem 1rem;
        line-height: 1.5;
        color: #555;
        background-color: #fff;
        border: 0.075rem solid #ddd;
        border-radius: 0.25rem;
        box-shadow: inset 0 0.2rem 0.4rem rgb(0 0 0 / 5%);
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .file-custom:before {
        position: absolute;
        top: -0.075rem;
        right: -0.075rem;
        bottom: -0.075rem;
        z-index: 6;
        display: block;
        content: "Browse";
        height: 2.5rem;
        padding: 0.5rem 1rem;
        line-height: 1.5;
        color: #555;
        background-color: #eee;
        border: 0.075rem solid #ddd;
        border-radius: 0 0.25rem 0.25rem 0;
    }

    /* .file-custom:after {
        content: "Choose file...";
    } */

    .portfolio_item {
        border-radius: 8px;
        background-color: #f7f7f7;
        height: 200px;
        margin-bottom: 30px;
        overflow: hidden;
        position: relative;
        width: 200px;
    }

    .portfolio_item img {
        height: 200px;
        width: 200px;
    }

    .portfolio_item .edu_stats_list {
        border-radius: 8px;
        background-color: #ff5a5f;
        cursor: pointer;
        height: 35px;
        line-height: 35px;
        position: absolute;
        right: 10px;
        text-align: center;
        top: 10px;
        width: 35px;
    }

    .portfolio_item.document {
        height: auto;
        overflow: initial;
        border: 1px solid #ccc;
        text-align: center;
    }

    .portfolio_item.document img {
        width: 150px;
        height: 150px;
        margin: 20px 0;
    }

</style>

<!-- Our Dashbord -->
<section class="our-dashsbord dashbord bgc-f7 pt-1 pb50">
    <div class="container-fluid ovh">
        <div class="row">
            <div class="col-lg-12 maxw100flex-992">
                <div class="row">
                    <div class="col-lg-12 mb10">
                        <div class="breadcrumb_content style2 mb-4">
                            <h2 class="breadcrumb_title">Property Details</h2>
                            <p>Upload detailed information about your property</p>
                            @if(isset($property))
                            <a target="_blank" href="" class="btn btn-sm btn-thm">View Property</a>
                            @endif
                        </div>
                    </div>
                    <form method="POST" action="{{ route('vendors.properties.store') }}" enctype="multipart/form-data" class="ajaxForm">
                        @csrf
                        <div class="col-lg-12">
                            <div class="my_dashboard_review card-box">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="mb30">Enter Property Details</h4>
                                        <div class="my_profile_setting_input form-group">
                                            <label for="propertyTitle">Property Title</label>
                                            <input type="text" class="form-control" id="propertyTitle" value="{{@$property->title}}" name="title" data-parsley-required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="my_profile_setting_textarea">
                                            <label for="propertyDescription">Description</label>
                                            <textarea class="form-control editor" id="propertyDescription" rows="4" name="description" data-parsley-required>{!! $property->description ?? '' !!}</textarea>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-6 mt-3">
                                        <div class="my_profile_setting_input ui_kit_select_search form-group">
                                            <label>Type</label>
                                            <select class="form-control" data-live-search="true" data-width="100%" name="type">
                                                @foreach(get_property_types() as $val)
                                                <option value="{{$val}}" <?= (@$property->type == $val) ? 'selected' : '' ?>>{{$val}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-6 mt-3">
                                        <div class="my_profile_setting_input ui_kit_select_search form-group">
                                            <label>Starting Offer Price</label>
                                            <input type="number" class="form-control @error('formGroupExamplePrice') is-invalid @enderror" id="formGroupExamplePrice" name="price" data-parsley-required value="{{@$property->price}}">
                                            @error('formGroupExamplePrice')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-xl-4">
                                        <div class="my_profile_setting_input form-group">
                                        <label for="formGroupExampleArea">Area (sq ft)</label>
                                            <input type="number" class="form-control" id="formGroupExampleArea" name="area" data-parsley-required value="{{@$property->area}}">
                                           
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-xl-4">
                                        <div class="my_profile_setting_input form-group">
                                            <label for="formGroupExampleArea">Lot Size (acres)</label>
                                            <input type="number" class="form-control" id="formGroupExampleLot" name="lot_size" data-parsley-required value="{{@$property->lot_size}}">

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-xl-4">
                                        <div class="my_profile_setting_input ui_kit_select_search form-group">
                                            <label>Rooms</label>
                                            <select class="form-control " data-live-search="true" data-width="100%" name="rooms" data-parsley-required>
                                                <option value="1" <?= (@$property->rooms == '1') ? 'selected' : '' ?>>1</option>
                                                <option value="2" <?= (@$property->rooms == '2') ? 'selected' : '' ?>>2</option>
                                                <option value="3" <?= (@$property->rooms == '3') ? 'selected' : '' ?>>3</option>
                                                <option value="4" <?= (@$property->rooms == '4') ? 'selected' : '' ?>>4</option>
                                                <option value="5" <?= (@$property->rooms == '5') ? 'selected' : '' ?>>5</option>
                                                <option value="5+" <?= (@$property->rooms == '5+') ? 'selected' : '' ?>>5+</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-xl-4">
                                        <div class="my_profile_setting_input form-group ui_kit_select_search">
                                            <label for="bathRooms">Bathrooms</label>
                                            <!-- <input type="text" class="form-control" id="bathRooms" name="bathrooms" > -->
                                            <select class="form-control" data-live-search="true" data-width="100%" name="bathrooms" data-parsley-required>
                                                <option value="1" <?= (@$property->bathrooms == '1') ? 'selected' : '' ?>>1</option>
                                                <option value="2" <?= (@$property->bathrooms == '2') ? 'selected' : '' ?>>2</option>
                                                <option value="3" <?= (@$property->bathrooms == '3') ? 'selected' : '' ?>>3</option>
                                                <option value="4" <?= (@$property->bathrooms == '4') ? 'selected' : '' ?>>4</option>
                                                <option value="5" <?= (@$property->bathrooms == '5') ? 'selected' : '' ?>>5</option>
                                                <option value="5+" <?= (@$property->bathrooms == '5+') ? 'selected' : '' ?>>5+</option>
                                            </select>


                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-4">
                                        <div class="my_profile_setting_input form-group">
                                            <label for="yearBuild">Year Built</label>
                                            <input type="number" class="form-control" id="year_built" name="year_built" data-parsley-required value="{{@$property->year_built}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-4">
                                        <div class="my_profile_setting_input form-group">
                                            <label for="est_repair_cost">Estimated Cost Of Repair</label>
                                            <input type="number" class="form-control" id="est_repair_cost" name="est_repair_cost" value="{{@$property->est_repair_cost}}">
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-xl-6">
                                        <div class="my_profile_setting_input form-group ui_kit_select_search">
                                            <label for="start_date">Offer Start At:</label>
                                            <input type="text"  class="form-control human_timepicker"  name="start_date"  value="{{@$property->start_offer_at}}" data-parsley-required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="my_profile_setting_input form-group ui_kit_select_search">
                                            <label for="end_date">Offer End At:</label>
                                            <input type="text" class="form-control human_timepicker"  name="end_date" value="{{@$property->end_offer_at}}" data-parsley-required >
                                        </div>
                                    </div>

                                   


                                    <!-- <div class="col-xl-12 mb-3">
                                        <h4>Amenities</h4>
                                    </div> -->
                                    <!-- <div class="col-sm-6 col-12 col-md-4">
                                        <ul class="list-unstyled selectable-list">
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="amenities[]" value="Air Conditioning">
                                                    <label class="custom-control-label" for="customCheck1">Air Conditioning</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck2" name="amenities[]" value="Garage">
                                                    <label class="custom-control-label" for="customCheck2">Garage</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck3" name="amenities[]" value="Swimming Pool">
                                                    <label class="custom-control-label" for="customCheck3">Swimming Pool</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck4" name="amenities[]" value="Jacuzzi">
                                                    <label class="custom-control-label" for="customCheck4">Jacuzzi</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div> -->
                                    <!-- <div class="col-sm-6 col-12 col-md-4">
                                        <ul class="list-unstyled selectable-list">
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck7" name="amenities[]" value="Dryer">
                                                    <label class="custom-control-label" for="customCheck7">Dryer</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck9" name="amenities[]" value="Washer">
                                                    <label class="custom-control-label" for="customCheck9">Washer</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck10" name="amenities[]" value="Gym">
                                                    <label class="custom-control-label" for="customCheck10">Gym</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck11" name="amenities[]" value="Refrigerator">
                                                    <label class="custom-control-label" for="customCheck11">Refrigerator</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div> -->
                                    <div class="col-sm-6 col-12 col-md-4 col-lg-3">
                                        <ul class="ui_kit_checkbox selectable-list">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="my_dashboard_review mt30 card-box">
                                <div class="row">
                                <h4 class="mb30">Location</h4>
                                <div class="col-lg-12">
                                        <div class="my_profile_setting_textarea">
                                            <label for="location_description">Description</label>
                                            <textarea class="form-control editor" id="location_description" rows="4" name="location_description" data-parsley-required>{!! $property->location_description ?? '' !!}</textarea>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="my_profile_setting_input form-group">
                                            <label for="propertyAddress">Address</label>
                                            <input style="opacity: 0; position: absolute" />
                                            <input type="search" class="form-control" name="address" data-parsley-required id="address" autocomplete="new-password" value="{{@$property->address}}">

                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="my_profile_setting_input ui_kit_select_search form-group">
                                            <label for="propertyState">State</label>
                                            <select id="propertyState" class="form-control" data-live-search="true" data-width="100%" name="state" data-parsley-required>
                                                @foreach(\CommonHelpers::us_state() as $state)
                                                <option value="{{$state}}" <?= (@$property->state == $state) ? 'selected' : '' ?>>{{$state}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="my_profile_setting_input form-group">
                                            <label for="propertyCity">City</label>
                                            <input type="text" class="form-control " id="propertyCity" name="city" data-parsley-required value="{{@$property->city}}">

                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-xl-4">
                                        <div class="my_profile_setting_input form-group">
                                            <label for="zipCode">Zip</label>
                                            <input type="text" class="form-control " id="zipcode" name="zipcode" data-parsley-required value="{{@$property->zipcode}}">

                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="my_profile_setting_input form-group">
                                            <div class="bdrs8" style="height: 400px" id="map-canvas"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-xl-4">
                                        <div class="my_profile_setting_input form-group">
                                            <label for="googleMapLat">Latitude (for Google Maps)</label>
                                            <input type="text" class="form-control" id="googleMapLat" name="lat" readonly value="{{@$property->lat}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-xl-4">
                                        <div class="my_profile_setting_input form-group">
                                            <label for="googleMapLong">Longitude (for Google Maps)</label>
                                            <input type="text" class="form-control" id="googleMapLong" name="lng" readonly value="{{@$property->lng}}">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="my_dashboard_review mt30 card-box">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="mb30">Property media</h4>
                                    </div>
                                    @if(isset($property->images))
                                    <div class="col-lg-12">
                                        <ul class="mb0">
                                            @foreach($property->images as $val)
                                            <li class="list-inline-item">
                                                <div class="portfolio_item">
                                                    <img class="img-fluid" src="{{URL::asset($val->image)}}" alt="fp1.jpg">
                                                    <div class="edu_stats_list" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><a class="d-block" href="javascript:void(0)" onclick="ajaxRequest(this)" data-url="{{ route('admin.delete_property_image', $val->hashid) }}"><span class="fa fa-trash text-white"></span></a></div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    @endif
                                    <div class="col-lg-12">
                                        <label class="portfolio_upload w-100">
                                            <input type="file" name="myfile[]" multiple id="my_file" accept="image/*" />
                                            <div class="icon"><span class="mdi-set mdi-download"></span></div>
                                            <p id="files_count">Click Here To Upload Images</p>
                                        </label>
                                    </div>


                                </div>
                            </div>

                            <div class="my_dashboard_review mt30 card-box">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="mb30">Property Documents</h4>
                                    </div>

                                    @if(isset($property->documents))
                                    <div class="col-lg-12">
                                        <ul class="mb0">
                                            @foreach($property->documents as $val)
                                            <li class="list-inline-item">
                                                <div class="portfolio_item document">
                                                    <a download href="{{check_file($val->file, 'document')}}">
                                                        <img class="img-fluid" src="{{check_file(null, 'document')}}" alt="Document">
                                                        <p style="color: #484848">{{$val->name}}</p>
                                                    </a>
                                                    <div class="edu_stats_list" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><a href="javascript:void(0)" onclick="ajaxRequest(this)" data-url="{{ route('admin.delete_property_document', $val->hashid) }}" class="d-block"><span class="fa fa-trash text-white"></span></a></div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    <div class="col-md-12" id="add_doc_row">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Document Title</label>
                                                <input type="text" class="form-control" name="documents[][doc_name]" >
                                            </div>
                                            <div class="col-md-5">
                                                <label>Document File</label>
                                                <label class="file">
                                                    <input type="file" id="file_0" class="document_file" aria-label="File browser example" name="documents[][file]">
                                                    <span class="file-custom">Choose File...</span>
                                                </label>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="d-block">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                <button type="button"  class="btn btn-primary add_doc_row">
                                                    <i class="mdi-set mdi-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- @if(isset($property->documents))
                                    <div class="col-lg-12">
                                        <ul class="mb0">
                                            @foreach($property->documents as $val)
                                            <li class="list-inline-item">
                                                <div class="portfolio_item document">
                                                    <a download href="{{check_file($val->file, 'document')}}">
                                                        <img class="img-fluid" src="{{check_file(null, 'document')}}" alt="Document">
                                                        <p>{{$val->name}}</p>
                                                    </a>
                                                    <div class="edu_stats_list" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><a href="javascript:void(0)" onclick="ajaxRequest(this)" data-url="{{ route('front.delete_property_document', $val->hashid) }}"><span class="flaticon-garbage"></span></a></div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <div class="col-lg-12">
                                        <label class="portfolio_upload w-100">
                                            <input type="file" name="documents[]" multiple id="documents" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf" />
                                            <div class="icon"><span class="mdi-set mdi-download"></span></div>
                                            <p id="files_count_document">Click Here To Upload Documents</p>
                                        </label>
                                    </div> --}}


                                </div>
                            </div>
                            <div class="col-12">
                                <div class="text-right mb-4">
                                    @if(isset($property))
                                    <input type="hidden" name="slug" value="{{$property->slug}}" />
                                    <input type="hidden" name="property_id" value="{{$property->hashid}}" />
                                    @endif
                                    <button class="btn btn-primary" name="submitBtn" id="submitBtn">@if(isset($property))
                                        Update @else Submit @endif</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('page-scripts')
<link rel="stylesheet" href="{{asset('frontend_assets/ckeditor/ckeditor.css')}}">
<script src="{{asset('frontend_assets/ckeditor/ckeditor.js')}}"></script>
<script>
    document.querySelectorAll( '.editor' ).forEach( ( node, index ) => {
    ClassicEditor
        .create(node, {
            toolbar: {
                items: [
                    'heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', '|', 'indent', 'outdent', '|', 'horizontalLine', '|', 'blockQuote', 'insertTable', 'undo', 'redo'
                ]
            },
            language: 'en',
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },
            licenseKey: '',
        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(error => {
            console.error(error);
        });
    } );
</script>

<script src="https://maps.googleapis.com/maps/api/js?key={{config('app.map_key')}}&libraries=places"></script>
<script>
    var placeSearch, autocomplete, map, marker;
    var componentForm = {
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name',
    };

    function initAutocomplete() {
        var autocomplete = new google.maps.places.Autocomplete((document.getElementById('address')), {
            types: ['geocode']
        });

        //restrict autocomplete to us only
        autocomplete.setComponentRestrictions({
            'country': ['us']
        });

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
        driver_lat = eval($("#googleMapLat").val());
        driver_lng = eval($("#googleMapLong").val());
        var check_marker = true;
        if (isNaN(driver_lat) || isNaN(driver_lng)) {
            driver_lat = 53.631611;
            driver_lng = -113.323975;
            check_marker = false;
        }
        
        var pos = {
            lat: driver_lat,
            lng: driver_lng
        };
        map = new google.maps.Map(document.getElementById('map-canvas'), {
            center: pos,
            zoom: 13
        });
        if (check_marker) {
            placeMarker(driver_lat, driver_lng, map);
        }

    }

    function placeMarker(lat, lng, map) {
        var latLng = new google.maps.LatLng(lat, lng);
        marker = new google.maps.Marker({
            position: latLng,
            map: map,

        });
    }

    function fillInAddress(places, a, b) {
        var place = this.getPlace();

        if (marker != undefined) {
            marker.setMap(null);
        }

        var lat = place.geometry.location.lat();
        var lng = place.geometry.location.lng();
        var pos = {
            lat: eval(lat),
            lng: eval(lng)
        };
        map.panTo(pos);

        placeMarker(lat, lng, map);
        $("#googleMapLat").val(lat);
        $("#googleMapLong").val(lng);

        var arr = {};

        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                arr[addressType] = val;
            }
        }

        $("input[name='zipcode']").val('');
        $("input[name='city']").val('');
        if (arr.postal_code != undefined) {
            $("input[name='zipcode']").val(arr.postal_code);
        }
        if (arr.locality != undefined) {
            $("input[name='city']").val(arr.locality);
        }
    }

    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }

    var amenities = <?= json_encode(@$property->amenities) ?>;

    initAutocomplete();

    $(document).on('change', '#my_file', function() {
        var count = document.getElementById('my_file').files.length;
        $("#files_count").text(`${count} files selected`);
    })

    $(document).on('change', '#documents', function() {
        var count = document.getElementById('documents').files.length;
        $("#files_count_document").text(`${count} files selected`);
    })

    $.each(amenities, function(i, val) {
        $("input[value='" + val + "']").prop('checked', true);
    });

     $(document).on('change', '.document_file', function(elem) {
        var file_name = elem.target.files.length > 0 ? elem.target.files[0].name : null;
        
        if(file_name){
            $(this).siblings('.file-custom').text(file_name);
        }else{
            $(this).siblings('.file-custom').text('Choose File...');
        }
    })


    $(document).on('change', '#accept_terms', function() {
        if($(this).is(':checked')){
            $("#submitBtn").removeAttr('disabled');
        }else{
            $("#submitBtn").attr('disabled','disabled');
        }
    
    })
   
    var count=1;
    $(document).on('click','.add_doc_row',function(){ 
    var doc_row=`<div class="row">
                 <div class="col-md-5">
                    <label>Document Title</label>
                    <input type="text" name="documents[][doc_name]" class="form-control">
                </div>
                <div class="col-md-5">
                    <label>Document File</label>
                    <label class="file">
                        <input type="file" id="file_${count}" class="document_file" aria-label="File browser example" name="documents[][file]">
                        <span class="file-custom">Choose File...</span>
                    </label>
                </div>
                <div class="col-md-2">
                    <label class="d-block">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <button type="button" class="btn btn-primary add_doc_row">
                        <i class="mdi-set mdi-plus"></i>
                    </button>

                    <button type="button" class="btn btn-danger delete_row">
                        <i class="mdi-set mdi-minus"></i>
                    </button>
                </div>
            </div>`;
        $('#add_doc_row').append(doc_row);
        count = count+1;
    })
    $(document).on('click','.delete_row',function(){
        $(this).parent().parent().remove();
    })
    $(function(){
        $(".human_datepicker").flatpickr({
            altInput: !0,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        })

        $(function(){
            $(".human_timepicker").flatpickr({
                dateFormat: "Y-m-d H:i",
                enableTime: true,
                minDate: "today",

            })
        })
    })

</script>

@endsection