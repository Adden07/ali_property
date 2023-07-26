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
                        <form method="get" action="#">
                            <div class="row clearfix">

                                <div class="form-group mb-3 col-lg-4 col-md-6 col-sm-12">
                                    <input type="text" class="form-control" placeholder="Enter Keyword..." name="keyword">
                                </div>

                                <!-- Form Group -->
                                <div class="form-group mb-3 col-lg-3 col-md-6 col-sm-12">
                                    <select class="form-select" name="property_type">
                                        {!! get_property_types() !!}
                                    </select>
                                </div>

                                <!-- Form Group -->
                                <div class="form-group mb-3 col-lg-3 col-md-6 col-sm-12">
                                    <select class="form-select" name="location">
                                        <option value="">Location</option>
                                        <option value="">California</option>
                                        <option value="">New York</option>
                                        <option value="">Sydney</option>
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
                                                <select class="form-select" name="rooms">
                                                    <option value="">Room</option>
                                                    <option value="1">01</option>
                                                    <option value="2">02</option>
                                                    <option value="3">03</option>
                                                </select>
                                            </div>
                                            <!-- Form Group -->
                                            <div class="form-group mb-3 col-lg-4 col-md-6 col-sm-12">
                                                <select class="form-select" name="bathrooms">
                                                    <option value="">Baths</option>
                                                    <option value="1">01</option>
                                                    <option value="2">02</option>
                                                    <option value="3">03</option>
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
                                                    @foreach(get_amenities() AS $amenity)
                                                    <div class="col-md-6">
                                                        <label class="d-block">
                                                            {{ $amenity }}
                                                            <input type="checkbox" name="amenities[]" value="{{ $amenity }}" @if(isset($property)) {{ @in_array($amenity, json_decode(@$property->amenities)) ? 'checked' : '' }}@endif>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    @endforeach
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
                @php
                    $currentPage = $properties->currentPage();
                    $startingIndex = ($currentPage - 1) * config('app.per_page') + 1;
                    $endingIndex = ($currentPage - 1) * config('app.per_page') + $properties->count();
                @endphp
                <div>Showing {{ $startingIndex }} to {{ $endingIndex }} of {{ $properties->total() }} entries</div>
                {{-- <div>
                    <select class="form-select">
                        <option>Top Selling</option>
                        <option>Most Viewed</option>
                        <option>Price(low to high)</option>
                        <option>Price(high to low)</option>
                    </select>
                </div> --}}
            </div>
        </div>

        <div class="property_listing">
            <div class="row">
                @foreach($properties AS $property)
                <div class="col-md-3">
                    <div class="properties">
                        <a href="{{ route('fronts.property', ['id'=>$property->hashid]) }}" class="text-decoration-none position-relative d-block">
                            <div class="position-absolute property_cate rent">
                                Rent
                            </div>

                            <div class="position-absolute property_cate buy">
                                Sell
                            </div>

                            <div class="position-absolute property_cate sold">
                                Sold
                            </div>
                            <img src="{{ asset(@$property->thumbnail->image) }}" width="100%">
                            <div class="properties_content">
                                <div class="property_type">
                                    Type: {{ $property->type }} 
                                </div>
                                <h5>{{ $property->title }}</h5>
                                <h5 class="mb-2 price">$ {{ number_format($property->price) }}</h5>

                                <ul class="list-inline more_detail">
                                    <li class="list-inline-item"><img src="{{ asset('front_assets/imgs/double-bed.png') }}" alt="Beds" class="m-0 d-inline-block"> {{ $property->rooms }}</li>
                                    <li class="list-inline-item"><img src="{{ asset('front_assets/imgs/bathroom.png') }}" alt="Baths" class="m-0 d-inline-block"> {{ $property->bathrooms }}</li>
                                    <li class="list-inline-item"><img src="{{ asset('front_assets/imgs/house-design.png') }}" alt="Area" class="m-0 d-inline-block"> {{ $property->area }} sqft</li>
                                </ul>

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