@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">Agent Requests</a></li>
                    <li class="breadcrumb-item active">All</li>

                </ol>
            </div>
            <h4 class="page-title">Agent Requests</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title m-t-0">All Agent Requests</h4>
            <p class="text-muted font-14 m-b-20">
                Here are all agent requests.
            </p>
            <table class="table dt_table table-bordered w-100 nowrap" id="laravel_datatable">
                <thead>
                    <th>S.no</th>
                    <th>Name</th>
                    <th>Contact No</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($agent_requests AS $request)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $request->name }}</td>
                            <td>{{ $request->contact_no }}</td>
                            <td>
                                <i class="fa fa-eye text-primary show_description" data-route="{{ route('admin.agent_requests.show_message',['id'=>$request->hashid]) }}"></i>
                            </td>
                            <td>{{ date('d-M-Y', strtotime($request->created_at)) }}</td>
                            <td>
                                <button type="button" onclick="ajaxRequest(this)" data-url="{{ route('admin.agent_requests.delete', ['id'=>$request->hashid]) }}" class="btn btn-danger btn-xs waves-effect waves-light">
                                    <span class="btn-label"><i class="icon-trash"></i></span>Delete
                                </button>
                            </td>
                        </tr> 
                    @endforeach
                    {{-- @foreach($partnerships AS $partner)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $partner->name }}</td>
                            <td>{{ $partner->email }}</td>
                            <td>{{ $partner->company_name }}</td>
                            <td>{{ $partner->phone_no }}</td>
                            <td>{{ $partner->message }}</td>
                            <td class="text-center">
                                @if(file_exists($partner->attachment))
                                    <a href="{{ check_file($partner->attachment) }}" download>
                                        <i class="fa fa-download fa-2x text-primary" aria-hidden="true"></i>
                                    </a>
                                @endif
                            </td>
                            <td>{{ date('d-M-Y', strtotime($partner->created_at)) }}</td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('page-scripts')
@include('admin.partials.datatable', ['load_swtichery' => true])
@endsection