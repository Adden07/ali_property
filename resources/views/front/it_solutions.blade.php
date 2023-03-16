@extends('front.layouts.master')
@section('content')

<div class="col-12">
    <div class="text-center breadcrumb-main it_solutions">
        <h1 class="text-white fw-bold">IT Solutions</h1>
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
                    @foreach($services AS $service)
                        <div class="projects-card mb-4 flex-fill">
                            <div class="card-body">
                                <div class="projects-details align-items-center">
                                    <div class="project-img">
                                        <img src="{{ check_file($service->image) }}" alt="Project" with="100px" height="100px">
                                    </div>
                                    <div class="project-info">
                                        <h2 class="title">{{ $service->service_name }}</h2>
                                        <div class="customer-info">
                                            <ul class="list-details">
                                                <li>
                                                    <div class="slot">
                                                        <h5>{{ $service->short_desc }}</h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="slot mt-2">
                                                        <h5>
                                                            {{-- <img src="{{ asset('front_assets/imgs/MapPinLine.png') }}" class="location_icon me-1" /> Pakistan</h5> --}}
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="project-hire-info">
                                        <div class="projects-amount">
                                            <h3>AED 50</h3>
                                            <h5>Hourly</h5>
                                        </div>
                                        <div class="content-divider"></div>
                                        <div class="projects-action text-center">
                                            <a href="{{ route('fronts.it_solution_details', ['id'=>$service->hashid]) }}" class="btn btn-theme">Book now </a>
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