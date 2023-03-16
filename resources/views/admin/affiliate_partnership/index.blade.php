@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">Affiliate Partership</a></li>
                    <li class="breadcrumb-item active">All</li>

                </ol>
            </div>
            <h4 class="page-title">Affiliate Partnership</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title m-t-0">All Affiliate Partnership</h4>
            <p class="text-muted font-14 m-b-20">
                Here are all the Affiliate partnership.
            </p>
            <table class="table dt_table table-bordered w-100 nowrap" id="laravel_datatable">
                <thead>
                    <th>S.no</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Company <br />Name</th>
                    <th>Phone No</th>
                    <th>Message</th>
                    <th>Attachment</th>
                    <th>Date</th>
                </thead>
                <tbody>
                    @foreach($partnerships AS $partner)
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