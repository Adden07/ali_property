@extends('front.layouts.master')
@section('content')

<div class="col-12">
    <div class="text-center breadcrumb-main it_solutions">
        <h1 class="text-white fw-bold">{{ $package_detail->title }}</h1>
        <!-- <p class="text-white">Millions of people use us to turn their ideas into reality.</p> -->
    </div>
</div>

<div class="container-fluid cat_list travel_detailmain mb-5">
    <div class="containers px-3">
        <form action="{{ route('fronts.travel_tour_booking') }}" method="POST" class="ajaxForm">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="travel_slider">
                        <div>
                            <img src="{{ check_file($package_detail->image) }}" alt="Tour" class="img-fluid main_img mt-5">
                        </div>
                        @foreach($package_detail->packageImages AS $image)
                        <div>
                            <img src="{{ check_file($image->image) }}" alt="Tour" class="img-fluid main_img mt-5">
                        </div>
                        @endforeach
                    </div>

                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mt-3 fw-500">Description</h4>
                        </div>
                        <div>
                            <a href="javascript:void(0)" data-url="{{ route('users.add_wishlist', ['package_id'=>$package_detail->hashid]) }}" onclick="ajaxRequest(this)" class="mt-3 d-block text-theme text-decoration-none nopopup"><i class="fa-regular fa-heart"></i> Wishlist</a>
                        </div>
                    </div>
                    {!! $package_detail->description !!}

                    <div class="variations">
                        <h4 class="mt-3 fw-500 pb-3 pt-3">Travel date</h4>
                        <div class="col-md-5">
                            <button class="btn btn-theme py-2 check_availability" type="button" data-toggle="datepicker" value="Check availability">
                                <input type="hidden" class="date_avail" /> <span class="change_date">Check availability</span>
                            </button>
                            <!-- <input id="availabile_date" class="form-control" min="<?php echo date("Y-m-d"); ?>"> -->
                        </div>
                    </div>

                    <div class="variations">
                        <h4 class="mt-3 fw-500 pb-3 pt-3">Options</h4>
                        @if(!is_null($package_detail->infant))
                        <label class="variation_container">
                            <input type="checkbox" name="infant" value="infant" onclick="variations('Infant', 'infant', 'number', {{ $package_detail->infant }})">
                            <span class="checkmark">
                                Infant
                            </span>
                        </label>
                        @endif
                        @if(!is_null($package_detail->child))
                        <label class="variation_container">
                            <input type="checkbox" name="child" value="child" onclick="variations('Child', 'child', 'number', {{ $package_detail->child }})">
                            <span class="checkmark">
                                Child
                            </span>
                        </label>
                        @endif
                        @if(!is_null($package_detail->adult))
                        <label class="variation_container">
                            <input type="checkbox" name="adult" value="adult" onclick="variations('Adult', 'adult', 'number', {{ $package_detail->adult }})">
                            <span class="checkmark">
                                Adult
                            </span>
                        </label>
                        @endif
                        @if(!is_null($package_detail->dinner))
                        <label class="variation_container">
                            <input type="checkbox" name="dinner" value="dinner" onclick="variations('dinner', 'dinner', 'hidden', {{ $package_detail->dinner }}, 'd-none')">
                            <span class="checkmark">
                                dinner
                            </span>
                        </label>
                        @endif
                    </div>

                    <div class="variations">
                        <h4 class="mt-3 fw-500 pb-3 pt-3">Timing</h4>
                        @if($package_detail->is_morning)
                        <label class="variation_container">
                            <input type="radio" name="timing" value="morning" onclick="disableOtherAddOn('morning', 'add_on')">
                            <span class="checkmark">
                                Morning
                            </span>
                        </label>
                        @endif
                        @if($package_detail->is_evening)
                        <label class="variation_container">
                            <input type="radio" name="timing" value="evening" onclick="disableOtherAddOn('evening', 'add_on')">
                            <span class="checkmark">
                                Evening
                            </span>
                        </label>
                        @endif
                        <br /><br />
                        @foreach($package_detail->addOns AS $add_on)
                        <label class="variation_container">
                            <input type="checkbox" name="add_on_arr[]" value="{{ $add_on->hashid }}" data-price="{{ $add_on->price }}" class="{{ $add_on->type }} add_on" disabled>
                            <span class="checkmark">
                                {{ $add_on->title }}
                            </span>
                        </label>
                        @endforeach
                    </div>

                    <div class="recent_reviews">
                        <h4 class="mt-3 fw-500 pb-3 pt-3">Most recent review</h4>
                        <div class="col-12">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center">
                                        <div class="average_reviews me-2">
                                            <h1>{{ ($package_detail->adminReviews->count() > 0) ? $package_detail->adminReviews->sum('rating')/$package_detail->adminReviews->count() : 0 }} <small>/ 5</small></h1>
                                        </div>
                                        <div class="rateit" data-rateit-mode="font" style="font-size:40px" data-rateit-value="{{ ($package_detail->adminReviews->count() > 0) ? $package_detail->adminReviews->sum('rating')/$package_detail->adminReviews->count() : 0 }}" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                        <div class="total_reviews">
                                            <p>{{ $package_detail->adminReviews->count() }} reviews</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 text-end all_reviews">
                                    <a href="#all_reviews" class="text-theme text-decoration-none">Read all reviews <i class="fa-solid fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <div class="detail_testimonials">
                                @foreach($package_detail->adminReviews As $review)
                                    <div>
                                        <div class="testimonial_box">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row profile mt-auto">
                                                    <img src="https://cdn.klook.com/upload/img200X200/263e5b67--e-d.jpg" alt="User Profile" class="rounded-circle">
                                                    <div class="user_main">
                                                        <div class="name">{{ $review->username }}</div>
                                                    </div>
                                                </div>
                                                <div class="post_date">
                                                    <p class="mb-0">Today</p>
                                                </div>
                                            </div>

                                            <div class="testimonial_content mt-2">
                                                <p>{{ $review->review }}</p>
                                            </div>
                                            {{-- <div class="testimonials_images">
                                                <img src="https://cdn.klook.com/user_review/product/1946306/995fa05c-6a67-462b-42f9-3fb2f473b294.250*0.jpeg" alt="">
                                                <img src="https://cdn.klook.com/user_review/product/1946306/8a3ef34a-e0ba-46dc-6ca1-d02ab1d30a7a.250*0.jpeg" alt="">
                                            </div> --}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                    <div class="recent_reviews" id="all_reviews">
                        <h4 class="mt-3 fw-500 pb-3 pt-3"> Reviews</h4>
                        <div class="col-12">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center">
                                        <div class="average_reviews me-2">
                                            <h1>{{ ($package_detail->adminReviews->count() > 0) ? $package_detail->adminReviews->sum('rating')/$package_detail->adminReviews->count() : 0 }} <small>/ 5</small></h1>
                                        </div>
                                        <div class="rateit" data-rateit-mode="font" style="font-size:40px" data-rateit-value="{{ ($package_detail->adminReviews->count() > 0) ? $package_detail->adminReviews->sum('rating')/$package_detail->adminReviews->count() : 0 }}" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                        <div class="total_reviews">
                                            <p>{{ $package_detail->adminReviews->count() }} reviews</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 text-end all_reviews">
                                    <a href="#all_reviews" class="text-theme text-decoration-none">Read all reviews <i class="fa-solid fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <div class="all_testimonials">
                                @foreach($package_detail->adminReviews As $review)
                                    <div class="testimonial_box">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-row profile mt-auto">
                                                <img src="https://cdn.klook.com/upload/img200X200/263e5b67--e-d.jpg" alt="User Profile" class="rounded-circle">
                                                <div class="user_main">
                                                    <div class="name">{{ $review->username }}</div>
                                                </div>
                                            </div>
                                            <div class="post_date">
                                                <p class="mb-0">Today</p>
                                            </div>
                                        </div>

                                        <div class="review_stars mt-3">
                                            <div class="rateit" data-rateit-value="{{ $review->rating }}" data-rateit-ispreset="true" data-rateit-mode="font" data-rateit-readonly="true">

                                            </div>
                                          <span>Highly recommended</span>
                                            <p class="my-2">
                                                <small>Review for:{{ $package_detail->title }}</small>
                                            </p>
                                        </div>

                                        <div class="testimonial_content mt-2">
                                            <p>{{ $review->review }}</p>
                                        </div>
                                        {{-- <div class="testimonials_images">
                                            <a data-lightbox="roadtrip" href="https://cdn.klook.com/user_review/product/1946304/dfedecad-6607-4da5-4bc8-7e3e1a1f6a19.0*1200.jpeg">
                                                <img src="https://cdn.klook.com/user_review/product/1946304/dfedecad-6607-4da5-4bc8-7e3e1a1f6a19.0*1200.jpeg" alt="">
                                            </a>
                                            <a data-lightbox="roadtrip" href="https://cdn.klook.com/user_review/product/1946304/5ec18a7f-290f-47b8-7a87-4a6b2a5c1104.0*1200.jpeg">
                                                <img src="https://cdn.klook.com/user_review/product/1946304/5ec18a7f-290f-47b8-7a87-4a6b2a5c1104.0*1200.jpeg" alt="">
                                            </a>
                                        </div> --}}
                                    </div>
                                @endforeach
                            </div>
                        </div>


                    </div>

                </div>
                <div class="col-md-4 position-relative">
                    <div class="fixed_sidebar">
                        <div class="price mt-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h2>Price:</h2>
                                </div>
                                <div class="text-end">
                                    <h2 class="mb-0">AED <span id="total_amount">{{ collect([$package_detail->infant, $package_detail->child, $package_detail->adult])->min() }}</span></h2>
                                    {{-- <p class="mt-2 mb-0">Number of persons {{ $package_detail->number_of_person }}</p> --}}
                                </div>
                            </div>
                        </div>

                        <div class="book_frm">
                            <h1>Book the tour</h1>
                            <div class="mb-3">
                                <label for="name">Your name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name"  required>
                            </div>

                            <div class="mb-3">
                                <label for="email">Email address</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email address" required>
                            </div>

                            <div class="mb-3">
                                <label for="phone">Phone number</label>
                                <input type="text" id="phone" name="phone_no" class="form-control" placeholder="Enter your phone number" required>
                            </div>

                            <div class="mb-3" id="package_booklink">
                                <label for="travel">Travel date</label>
                                <input type="date" id="travel" name="travel_date" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="departure">Departure City</label>
                                <input type="text" class="form-control" placeholder="Enter departure city" name="departure_city" id="departure_city" required>
                                {{-- <select id="departure" class="form-select" required>
                                    <option value="Choose departure city">Choose departure city</option>
                                    <option value="City 1">City 1</option>
                                    <option value="City 2">City 2</option>
                                    <option value="City 3">City 3</option>
                                </select> --}}
                            </div>
                            <div id="variation_div">

                            </div>
                            <div class="mb-3">
                                <input type="hidden" name="vendor_package_id" id="vendor_package_id" value="{{ $package_detail->hashid }}">
                                <button type="submit" class="btn btn-theme w-100 py-2">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="row mt-5 pt-3">
            <div class="related">
                <div class="text-center">
                    <h1>Related tours</h1>
                </div>
            </div>

            <div class="col-12">
                <div class="row">
                    @foreach($related_packages AS $package)
                    <div class="col-md-4">
                        <div class="related-tour">
                            <img src="{{ check_file($package->image) }}" alt="Related tours" class="img-fluid rounded">
                            <h3>{{ $package->title }}</h3>
                            {{-- <p class="cat">Travel Co.</p> --}}
                            {{-- <p>Explore all three branches of the Chicago River on a journey through the heart of the city...</p> --}}
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="related-price">
                                        <h3>AED {{ collect($package->infant, $package->child, $package->adult)->min() }}</h3>
                                        {{-- <p class="mb-0">per adult</p> --}}
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('fronts.travel_tourisam_details', ['id'=>$package->hashid]) }}" class="btn btn-theme">Book now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
@section('script')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

<link rel="stylesheet" href="{{ asset('front_assets/date-picker/bootstrap-datepicker.min.css') }}">
<script src="{{ asset('front_assets/date-picker/bootstrap-datepicker.min.js') }}"></script>

<script>
    $('.date_avail').on('change', function() {
        $('.change_date').text($('.date_avail').val());
    })

    function variations(label, name, type = 'number', price = 0, display = '') {

        if (!$('#' + name + '_column').length) {
            //generate input field
            var html = '<div class="mb-3 ' + display + '" id="' + name + '_column">' +
                '<label for="person">' + label + '</label>' +
                '<input type="' + type + '" id="' + name + '_variation" name="' + name + '_variation" data-price="' + price + '" class="form-control variation_input" value="1" required>' +
                '</div>';

            $('#variation_div').append(html);

        } else {
            $('#' + name + '_column').remove();
        }
    }

    $(document).on('keyup change', '.variation_input', function() { //when user enter the value in input then calculate the total amount
        $('#total_amount').html(parseInt(calculate_total_amount()));

    });


    function calculate_total_amount() { //total amount function to calulte the value of each input
        var total = 0;
        $('.variation_input').each(function() {
            if ($(this).is(':hidden')) { //when input in hidden
                total += $(this).data('price');
            } else { //when input is not hidden
                total += $(this).data('price') * $(this).val();
            }
        });
        //loop on add_on class
        $('.add_on').each(function() {
            if ($(this).is(':checked')) {
                total += parseInt($(this).data('price'));
            }
        });
        return total;
    }

    // variation_container

    $("input[type=checkbox]").click(function() { //whenever user click on the checkbox button calculate the total amount
        $('#total_amount').html(parseInt(calculate_total_amount()));
    });

    //disbale the add on 
    function disableOtherAddOn(timing, add_on_class_name) {
        $('.' + add_on_class_name).each(function() {
            if (!$(this).hasClass(timing)) { //check if this input has not the same class as timing then disbaled
                $(this).attr('disabled', true);
            } else { //remove the disabled from those inputs which has the same class as timing
                $(this).removeAttr('disabled', true);
            }
            $(this).prop('checked', false); //uncheck all the checkboxes whenever user change the timing
        });
        $('#total_amount').html(parseInt(calculate_total_amount()));
    }
</script>
@endsection