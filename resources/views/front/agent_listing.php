@extends('front.layouts.master')
@section('content')

<!-- Listing Single Property -->
<section class="listing-title-area single-property-view mb-3 pb-5 mt-md-5 pt-md-5" style="background-color: #F1F6F6;">
    <div class="container mt-5">
        <div class="row mb30">
            <div class="col-md-12">
                <div class="single_property_title mt30-767 text-center mb-4">
                    <h2>Find an Agent</h2>
                </div>

                <section class="listing-form-section">
                    <!-- Default Form -->
                    <div class="default-form">
                        <form method="get" action="#">
                            <div class="col-md-12">
                                <div class="agents_search">

                                    <div class="input-group">
                                        <select class="form-select">
                                            <option selected>Select City</option>
                                            <option>Hyderabad</option>
                                            <option>Karachi</option>
                                            <option>Badin</option>
                                        </select>

                                        <input type="text" name="city" placeholder="Enter City or country" class="form-control">
                                    </div>

                                    <div class="text-center">
                                        <button class="btn search_btn mt-4" type="submit">Find Agent</button>
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


<section class="mt-5 agent_listing">
    <div class="container">

        <div class="text-center mb-4">
            <h3>25 Property Agents in New York, NY</h3>
        </div>


        <div class="agent_listing mt-4">
            <div class="row">
                <div class="col-md-3">
                    <div class="agents">
                        <img src="{{ asset('front_assets/imgs/agent1.png') }}" class="img-fluid mx-auto d-block">
                        <div class="properties_content text-center">
                            <a href="#" class="text-decoration-none position-relative d-block">
                                <h5>Agent Name</h5>
                            </a>
                            <p class="mb-2 total_properties">For Sale: 12 | For Rent: 50</p>

                            <p class="location">
                                <img src="{{ asset('front_assets/imgs/MapPinLine.png') }}" class="m-0 me-1 d-inline"> New York, NY
                            </p>

                            <div class="buttons">
                                <a href="#" class="text-uppercase w-100 message">message</a>
                                <a href="#" class="text-uppercase w-100 profile">view profile</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="agents">
                        <img src="{{ asset('front_assets/imgs/agent1.png') }}" class="img-fluid mx-auto d-block">
                        <div class="properties_content text-center">
                            <a href="#" class="text-decoration-none position-relative d-block">
                                <h5>Agent Name</h5>
                            </a>
                            <p class="mb-2 total_properties">For Sale: 12 | For Rent: 50</p>

                            <p class="location">
                                <img src="{{ asset('front_assets/imgs/MapPinLine.png') }}" class="m-0 me-1 d-inline"> New York, NY
                            </p>

                            <div class="buttons">
                                <a href="#" class="text-uppercase w-100 message">message</a>
                                <a href="#" class="text-uppercase w-100 profile">view profile</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="agents">
                        <img src="{{ asset('front_assets/imgs/agent1.png') }}" class="img-fluid mx-auto d-block">
                        <div class="properties_content text-center">
                            <a href="#" class="text-decoration-none position-relative d-block">
                                <h5>Agent Name</h5>
                            </a>
                            <p class="mb-2 total_properties">For Sale: 12 | For Rent: 50</p>

                            <p class="location">
                                <img src="{{ asset('front_assets/imgs/MapPinLine.png') }}" class="m-0 me-1 d-inline"> New York, NY
                            </p>

                            <div class="buttons">
                                <a href="#" class="text-uppercase w-100 message">message</a>
                                <a href="#" class="text-uppercase w-100 profile">view profile</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="agents">
                        <img src="{{ asset('front_assets/imgs/agent1.png') }}" class="img-fluid mx-auto d-block">
                        <div class="properties_content text-center">
                            <a href="#" class="text-decoration-none position-relative d-block">
                                <h5>Agent Name</h5>
                            </a>
                            <p class="mb-2 total_properties">For Sale: 12 | For Rent: 50</p>

                            <p class="location">
                                <img src="{{ asset('front_assets/imgs/MapPinLine.png') }}" class="m-0 me-1 d-inline"> New York, NY
                            </p>

                            <div class="buttons">
                                <a href="#" class="text-uppercase w-100 message">message</a>
                                <a href="#" class="text-uppercase w-100 profile">view profile</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="agents">
                        <img src="{{ asset('front_assets/imgs/agent1.png') }}" class="img-fluid mx-auto d-block">
                        <div class="properties_content text-center">
                            <a href="#" class="text-decoration-none position-relative d-block">
                                <h5>Agent Name</h5>
                            </a>
                            <p class="mb-2 total_properties">For Sale: 12 | For Rent: 50</p>

                            <p class="location">
                                <img src="{{ asset('front_assets/imgs/MapPinLine.png') }}" class="m-0 me-1 d-inline"> New York, NY
                            </p>

                            <div class="buttons">
                                <a href="#" class="text-uppercase w-100 message">message</a>
                                <a href="#" class="text-uppercase w-100 profile">view profile</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row mb-5 mt-3">
                <nav class="btm_pagination">
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
                </nav>
            </div>

        </div>
    </div>
</section>

@endsection
