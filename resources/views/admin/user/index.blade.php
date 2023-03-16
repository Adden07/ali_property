@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">Newsletters</a></li>
                    <li class="breadcrumb-item active">All</li>
                </ol>
            </div>
            <h4 class="page-title">Offers</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title m-t-0">All newsletters</h4>
            <p class="text-muted font-14 m-b-20">
                Here are all the  newsletters.
            </p>
            <table class="table dt_table table-bordered w-100 nowrap" id="laravel_datatable">
                <thead>
                    <th>S.no</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Registration Date</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @foreach($users AS $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ date('d-M-Y', strtotime($user->created_at)) }}</td>
                            <td>
                                <input type="checkbox" class="js-switch-small nopopup"  data-toggle="switchery" onchange="ajaxRequest(this)" data-url="{{ route('admin.users.update_status', ['id'=>$user->hashid, 'status'=>$user->status]) }}" @if($user->status) checked @endif value="1" name="minimum_amount_btn" id="minimum_amount_btn"/>
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