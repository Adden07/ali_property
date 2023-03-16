@extends('front.layouts.master')
@section('content')

<div class="banner_main">
    <div class="slider-content pb-5">
        <h1>Terms of use</h1>
    </div>
</div>

<section class="container-fluid cat_list mb-5">
    <div class="container">
        <div class="row pt-5">
            <div class="col-12">
                {!! $data->data !!}
            </div>
        </div>
    </div>
</section>

@endsection