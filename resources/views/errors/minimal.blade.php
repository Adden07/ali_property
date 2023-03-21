{{-- @php
    if (\Request::is('web_admin/*')) {
        $view = 'layouts.admin_error';
        $admin = true;
    } else {
        $view = 'layouts.admin_error';
        $admin = false;
    }
@endphp --}}

@extends('layouts.admin_error')

@section('content')
<div class="container">
    <div class="jumbotron mt-5 bg-light text-center">
        <h1 class="display-4 mb-3" style="font-weight: bold">@yield('code') @yield('title')</h1>
        <p class="lead">@yield('message')</p>
        <a href="{{ route('fronts.home') }}" class="btn btn-primary btn-lg px-4 mt-4">Go to Homepage</a>
    </div>
</div>
@endsection
