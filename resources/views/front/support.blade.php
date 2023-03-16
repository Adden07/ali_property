@extends('front.layouts.master')
@section('content')

<div class="banner_main support_breadcrumbmain">
    <div class="container">
        <div class="py-5">
            <h1 class="text-white my-5 pt-5 support_breadcrumb">How can we help you?</h1>

            <div class="row">
                <div class="col-md-4">
                    <div class="bg-white p-4 status">
                        <i class="fa-solid fa-file-circle-question"></i> Check booking status
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bg-white p-4 status">
                        <i class="fa-solid fa-file-pen"></i> Change booking
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bg-white p-4 status">
                        <i class="fa-solid fa-file-excel"></i> Cancel booking
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<section class="bg-gradient cat_list mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mt-5">
                    <h4 class="fw-bold mb-3">Search FAQs</h4>
                    <form action="{{ route('fronts.support') }}" method="GET">
                        @csrf
                        <div class="input-group mb-3 search">
                            <input type="text" class="form-control" placeholder="What are you looking for?" aria-label="What are you looking for?" value="@if(request()->has('search')) {{ request()->get('search') }} @endif" name="search" id="search">
                            <span class="input-group-text p-0"><button type="submit" class="btn rounded-0 btn-theme">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button></span>
                        </div>
                    </form>

                    <h4 class="fw-bold mt-5">Explore popular topics</h4>

                    <div class="faq">
                        @foreach($faqs AS $faq)
    
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree{{$loop->iteration}}" aria-expanded="false" aria-controls="collapseThree">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="collapseThree{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {!! $faq->answer !!}
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
</section>

@endsection