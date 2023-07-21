@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Properties</li>

                </ol>
            </div>
            <h4 class="page-title">All Properties ({{ $all_properties->total() }})</h4>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <!-- <div class="text-right"> -->
            <!-- </div> -->
            <div class="d-flex align-items-center justify-content-between">
                <div class="align-content-center">
                    <h4 class="header-title mb-0" style="line-height: 1.67">All Properties</h4>
                    <div>
                    <a href="{{ route('vendors.properties.add') }}" class="btn btn-sm btn-primary">Add Property</a>
                    </div>
                </div>
                <form action="{{route('vendors.properties.index')}}" method="GET" class="d-flex align-items-center">
                    <div class="form-group mr-2">
                        <input type="search" name="s" class="form-control form-control-sm" placeholder="Search Properties" value="{{ request('s') }}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger btn-xs waves-effect waves-light">
                            <span class="btn-label"><i class="fa fa-search"></i></span>Search
                        </button>
                    </div>
                </form>
            </div>
            <div class="table-responsive mt-3 dianuj_custom_table">
                <table class="table dt_table table-bordered w-100 nowrap" style="min-height: 120px">
                    <thead>
                        <tr>
                            <th width="30">S.No</th>
                            <th>Image</th>
                            <th>Propert ID</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Date Added</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all_properties as $k => $property)
                        <tr>
                            <td>
                                <p class="m-0 text-center">{{ $k + 1 }}</p>
                            </td>
                            <td>
                                <img src="{{check_file($property->thumbnail->thumbnail ?? null)}}" alt="{{$property->title}}" title="{{$property->title}}" class="rounded-circle avatar-sm">
                            </td>
                            <td><small>{{ $property->property_id }}</small></td>
                            <td>
                                <small>{{ $property->title }}</small>
                                <!-- <p class="m-0">
                                    @if($property->approved_at === null)
                                        <button class="btn btn-xs btn-blue" onclick="viewProduct('{{$property->hashid}}', '{{$property->title}}')">Approve Now</button>
                                    @else
                                        <span class="badge text-danger bg-soft-danger">Approved On: {{get_fulltime($property->approved_at)}}</span>
                                    @endif
                                </p> -->
                            </td>
                            <td>{{ get_price($property->price) }}</td>
                            <td><small>{{ $property->type }}</small></td>
                            <td><small class="badge {{get_property_status_color($property->status)}}">{{ $property->status }}</small></td>
                            <td><small>{{ get_date($property->created_at) }}</small></td>
                            <td>
                                <button data-toggle="tooltip" data-placement="top" title="Documents" type="button" onclick="getPropertyDocuments('{{$property->hashid}}', '{{$property->title}}')" class="btn btn-warning btn-xs waves-effect waves-light px-0">
                                    <span class="btn-label" style="margin: 0 !important"><i class="fa fa-file"></i></span>
                                </button>
                                <a data-toggle="tooltip" data-placement="top" title="View" href="{{route('fronts.property', $property->hashid)}}" target="_blank" class="btn btn-info btn-xs waves-effect waves-light px-0">
                                    <span class="btn-label" style="margin: 0 !important"><i class="fa fa-eye"></i></span>
                                </a>
                                <a data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('vendors.properties.edit', $property->hashid) }}"    class="btn btn-success btn-xs waves-effect waves-light px-0">
                                    <span class="btn-label" style="margin: 0 !important"><i class="fa fa-pencil-alt"></i></span></a>
                                {{--@if($property->status=!'Deleted') --}}   
                                <button data-toggle="tooltip" data-placement="top" title="Delete" type="button" onclick="ajaxRequest(this)" data-url="{{ route('vendors.properties.delete', $property->hashid) }}"  class="btn btn-danger btn-xs waves-effect waves-light px-0">
                                    <span class="btn-label" style="margin: 0 !important"><i class="fa fa-trash"></i></span>
                                </button>
                                {{-- @endif --}} 
                            </td>
                        </tr>
                    
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center align-content-center mt-3">
                    {{$all_properties->appends(['s' => request('s')])->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-center" id="documentsModal" tabindex="-1" role="dialog" aria-labelledby="documentsModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><span id="documentsModalTitle"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="documentsModalBody">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade bs-example-modal-center" id="approveProperty" tabindex="-1" role="dialog" aria-labelledby="approvePropertyLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><span id="approvePropertyTitle"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="approvePropertyBody">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@section('page-scripts')
@include('admin.partials.datatable')

<script>
    function getPropertyDocuments(id, title){
        var url = '{{route("vendors.properties.get_documents", "")}}/'+id;
        getAjaxRequests(url, {}, 'post', function(res){
            $("#documentsModalBody").html(res.html);
            $("#documentsModalTitle").html(title);
            $("#documentsModal").modal('show');
        })
    }
    function viewProduct(id){
        var url = '{{route("vendors.properties.index", "")}}/'+id;
        getAjaxRequests(url, {}, 'post', function(res){
            $("#approvePropertyBody").html(res.html);
            $("#approvePropertyTitle").html("Approve Property");
            $("#approveProperty").modal('show');
        })
    }
</script>
@endsection