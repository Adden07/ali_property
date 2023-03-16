@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">FAQS</a></li>
                    <li class="breadcrumb-item active">{{ isset($is_update) ? 'edit' : 'add'}} </li>
                </ol>
            </div>
            <h4 class="page-title">{{ isset($is_update) ? 'Edit' : 'Add'}} FAQ</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title m-t-0">{{ isset($is_update) ? 'Edit' : 'Add'}} FAQ</h4>
            <p class="text-muted font-14 m-b-20">
                Here you can {{ isset($is_update) ? 'edit' : 'add'}} FAQ.
            </p>

            <form action="{{ route('admin.faqs.store') }}" class="ajaxForm" method="post" enctype="multipart/form-data" novalidate id="form">
                @csrf
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="">Question</label>
                        <input type="text" class="form-control" placeholder="Enter question here" name="question" id="question" value="{{ @$edit_faq->question }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Long Description</label>
                        <textarea name="answer" id="ck" cols="30" rows="10">
                            {{ @$edit_faq->answer }}
                        </textarea>
                    </div>
                </div>
                <input type="hidden" name="faq_id" value="{{ @$edit_faq->hashid }}">
                <input type="submit" class="btn btn-primary float-right" value="{{ isset($is_update) ? 'Update':'Add' }}">
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