@extends('front.layouts.master')
@section('content')

<!-- Listing Single Property -->
<section class="listing-title-area single-property-view mb-3 pb-3 mt-md-5 pt-md-5">
    <div class="container mt-5">
        <div class="row mb30">
            <div class="col-md-12">
                <div class="single_property_title mt30-767">
                    <h2>Browse Properties</h2>
                    <p>More than 13250, Properties, Appartments & Offices.</p>
                </div>

                <section class="listing-form-section">
                    <!-- Default Form -->
                    <div class="default-form">
                        <form method="post" action="#">
                            <div class="row clearfix">

                                <div class="form-group mb-3 col-lg-4 col-md-6 col-sm-12">
                                    <input type="text" class="form-control" placeholder="Enter Keyword...">
                                </div>

                                <!-- Form Group -->
                                <div class="form-group mb-3 col-lg-3 col-md-6 col-sm-12">
                                    <select class="form-select">
                                        <option>Property Type</option>
                                        <option>Type One</option>
                                        <option>Type Two</option>
                                        <option>Type Three</option>
                                    </select>
                                </div>

                                <!-- Form Group -->
                                <div class="form-group mb-3 col-lg-3 col-md-6 col-sm-12">
                                    <select class="form-select">
                                        <option>Location</option>
                                        <option>California</option>
                                        <option>New York</option>
                                        <option>Sydney</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3 col-lg-2 col-md col-sm">
                                    <button type="submit" class="btn btn-theme w-100">Search</button>
                                </div>

                                <div class="col-12 text-center mt-2 mb-2">
                                    <a class="btn btn-theme" data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Advanced Search</a>
                                </div>

                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body mt-3">
                                        <div class="row">

                                            <!-- Form Group -->
                                            <div class="form-group mb-3 col-lg-4 col-md-6 col-sm-12">
                                                <select class="form-select">
                                                    <option>Room</option>
                                                    <option>01</option>
                                                    <option>02</option>
                                                    <option>03</option>
                                                </select>
                                            </div>

                                            <!-- Form Group -->
                                            <div class="form-group mb-3 col-lg-4 col-md-6 col-sm-12">
                                                <select class="form-select">
                                                    <option>Bed</option>
                                                    <option>01</option>
                                                    <option>02</option>
                                                    <option>03</option>
                                                </select>
                                            </div>

                                            <!-- Form Group -->
                                            <div class="form-group mb-3 col-lg-4 col-md-6 col-sm-12">
                                                <select class="form-select">
                                                    <option>Baths</option>
                                                    <option>01</option>
                                                    <option>02</option>
                                                    <option>03</option>
                                                </select>
                                            </div>


                                            <div class="col-md-8 col-lg-6 range">
                                                <label class="form-label">Price</label>
                                                <div id="slider-range"></div>

                                                <div class="d-flex justify-content-between mt-2">
                                                    <div id="pfrom">$ 100</div>
                                                    <div id="pto">$ 300</div>
                                                </div>

                                                <!-- Form Group -->
                                                <label class="form-label mt-4">Square Feets</label>

                                                <div id="square-range"></div>

                                                <div class="d-flex justify-content-between mt-2">
                                                    <div id="sfrom">100 sq ft</div>
                                                    <div id="sto">300 sq ft</div>
                                                </div>
                                            </div>

                                            <!-- Form Group -->
                                            <div class="col-md-4 col-lg-6 amenities">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="d-block">
                                                            Air Conditioning
                                                            <input type="checkbox">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="d-block">
                                                            Swimming Pool
                                                            <input type="checkbox">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="d-block">
                                                            Central Heating
                                                            <input type="checkbox">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="d-block">
                                                            Laundry Room
                                                            <input type="checkbox">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="d-block">
                                                            Gym
                                                            <input type="checkbox">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="d-block">
                                                            Alarm
                                                            <input type="checkbox">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="d-block">
                                                            Window Covering
                                                            <input type="checkbox">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="d-block">
                                                            WiFi
                                                            <input type="checkbox">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="d-block">
                                                            TV Cable
                                                            <input type="checkbox">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="d-block">
                                                            Dryer
                                                            <input type="checkbox">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="d-block">
                                                            Microwave
                                                            <input type="checkbox">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="d-block">
                                                            Washer
                                                            <input type="checkbox">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="d-block">
                                                            Refrigerator
                                                            <input type="checkbox">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="d-block">
                                                            Outdoor Shower
                                                            <input type="checkbox">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container">
        <div class="listing_toparea mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>Showing 1 to 12 of 30 entries</div>
                <div>
                    <select class="form-select">
                        <option>Top Selling</option>
                        <option>Most Viewed</option>
                        <option>Price(low to high)</option>
                        <option>Price(high to low)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="property_listing">
            <div class="row">
                @foreach($properties AS $property)
                    <div class="col-md-3">
                        <div class="properties">
                            <a href="{{ route('fronts.property', ['id'=>$property->hashid]) }}" class="text-decoration-none">
                                <img src="{{ asset(@$property->thumbnail->image) }}" width="100%">
                                <div class="properties_content">
                                    <h5>{{ $property->title }}</h5>
                                    <h5 class="mb-2 price">$ {{ number_format($property->price) }}</h5>
                                    <p>{{ $property->rooms }} Bed | {{ $property->bathrooms }} Bath | {{ $property->area }} sq ft</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row mb-5 mt-3">
                {{ $properties->links() }}
                {{-- <nav class="btm_pagination">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">&laquo;</a>
                        </li>
                        <li class="page-item"><a class="page-link active" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">&raquo;</a>
                        </li>
                    </ul>
                </nav> --}}
            </div>

        </div>
    </div>
</section>

@endsection
@section('script')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


<script>
    $(function() {
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 500,
            values: [100, 300],
            slide: function(event, ui) {
                // $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                $('#pfrom').html("$" + ui.values[0]);
                $('#pto').html("$" + ui.values[1]);
            }
        });

        $("#square-range").slider({
            range: true,
            min: 0,
            max: 500,
            values: [100, 300],
            slide: function(event, ui) {
                // $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                $('#sfrom').html(ui.values[0] + "sq ft");
                $('#sto').html(ui.values[1] + "sq ft");
            }
        });
        //$( "#amount" ).val( "$" + $( "#square-range" ).slider( "values", 0 ) + " - $" + $( "#square-range" ).slider( "values", 1 ) );
    });
</script>
@endsection