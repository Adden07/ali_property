@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">FAQS</a></li>
                    <li class="breadcrumb-item active">All</li>
                </ol>
            </div>
            <h4 class="page-title">{{ isset($is_update) ? 'Edit' : 'Add'}} FAQS</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title m-t-0">All FAQS</h4>
            <p class="text-muted font-14 m-b-20">
                Here are all the FAQS.
            </p>
            <table class="table dt_table table-bordered w-100 nowrap" id="laravel_datatable">
                <thead>
                    <th>S.no</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($faqs AS $faq)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $faq->question }}</td>
                            <td>{!! wordwrap($faq->answer, 50, "<br />\n", true) !!}</td>
                            <td>
                                <input type="checkbox" class="js-switch-small nopopup"  data-toggle="switchery" onchange="ajaxRequest(this)" data-url="{{ route('admin.faqs.update_status', ['id'=>$faq->hashid, 'status'=>$faq->status]) }}" @if($faq->status) checked @endif value="1" name="minimum_amount_btn" id="minimum_amount_btn"/>
                            </td>
                            <td>
                                <a href="{{ route('admin.faqs.edit', ['id'=>$faq->hashid]) }}" class="btn btn-warning btn-xs waves-effect waves-light">
                                    <span class="btn-label"><i class="icon-pencil"></i></span>Edit
                                </a>
                                <button type="button" onclick="ajaxRequest(this)" data-url="{{ route('admin.faqs.delete', ['id'=>$faq->hashid]) }}" class="btn btn-danger btn-xs waves-effect waves-light">
                                    <span class="btn-label"><i class="icon-trash"></i></span>Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('page-scripts')
@include('admin.partials.datatable', ['load_swtichery' => true])
@endsection