@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="">Terms of use</a></li>
                </ol>
            </div>
            <h4 class="page-title">Update Terms of use</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title m-t-0">Update Terms of use</h4>
            <p class="text-muted font-14 m-b-20">
                Here you can update terms of use.
            </p>

            <form action="{{ route('admin.terms_of_use') }}" class="ajaxForm" method="post" enctype="multipart/form-data" novalidate id="form">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Terms of use</label>
                        <textarea name="term_of_use" id="ck" cols="30" rows="10">
                            {{ @$edit_term_of_use->data }}
                        </textarea>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary float-right" value="update">
            </form>
        </div>
    </div>
</div>
@endsection

@section('page-scripts')
@include('admin.partials.datatable', ['load_swtichery' => true])
<script>
    $('form').on('submit', function(){
        CKupdate();
    });
</script>
@endsection