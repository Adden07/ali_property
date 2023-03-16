@extends('front.layouts.master')
@section('content')

<div class="col-12">
    <div class="text-center breadcrumb-main travel_tourisam">
        <h1 class="text-white fw-bold">Travel & Tourism</h1>
        <p class="text-white">Millions of people use us to turn their ideas into reality.</p>
    </div>
</div>


<div class="container-fluid cat_list mb-5">
    <div class="containers px-3">
        <div class="row">
            <div class="col-md-4">
                <div class="search_box">
                    <form>
                        <h3>Search by keywords</h3>
                        <div class="mb-3 search position-relative">
                            <img src="{{ asset('front_assets/imgs/search-icon.png') }}" class="me-2 position-absolute">
                            <input type="text" class="form-control" placeholder="What are you looking for?">
                        </div>

                        <h3>Services</h3>
                        <select class="form-select">
                            <option value="Choose category" selected disabled>Choose category</option>
                            <option value="Category 1">Category 1</option>
                            <option value="Category 2">Category 2</option>
                        </select>

                        <h3>Rate</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Min">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Max">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-theme w-100 mt-0">FIND</button>

                        <button type="reset" class="btn w-100 mt-2">RESET FILTERS</button>
                    </form>


                </div>
            </div>
            <div class="col-md-8">
                <div class="col-lg-12 flex-wrap projects_listing">
                    @foreach($packages AS $package)
                        <div class="projects-card mb-4 flex-fill">
                            <div class="card-body">
                                <div class="projects-details">
                                    <div class="project-img">
                                        <img src="{{ check_file($package->image) }}" alt="Travel" style="border-radius: 20px;" height="100px" width="100px">
                                    </div>
                                    <div class="project-info">
                                        <h2 class="title">{{ $package->title }}</h2>
                                        <div class="customer-info">
                                            <ul class="list-details">
                                                <li>
                                                    <div class="slot">
                                                        <h5 style="font-size: 15px;color: #2E2E2E">Travel Co.</h5>
                                                    </div>
                                                </li>

                                                <li class="mt-3">
                                                    <div class="slot">
                                                        <h5 style="font-size: 15px;">Explore all three branches of the Chicago River on a journey through the heart of the city. This riverboat excursion introduces...</h5>
                                                    </div>
                                                </li>
                                            </ul>

                                            <div class="project-hire-info w-100 mt-4">
                                                <div class="projects-amount text-start">
                                                    <h3>AED {{ collect([$package->infant, $package->child, $package->adult])->min() }}</h3>
                                                    {{-- <h5>No of persons {{ $package->number_of_persons }}</h5> --}}
                                                </div>
                                                <div class="content-divider"></div>
                                                <div class="projects-action text-end">
                                                    <a href="{{ route('fronts.travel_tourisam_details', ['id'=>$package->hashid]) }}" class="btn btn-theme">Book now </a>
                                                </div>
                                            </div>
                                        </div>
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