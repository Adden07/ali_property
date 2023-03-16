@extends('layouts.admin')
@section('content')

<style>
    .inner_box{width: 22%;float: left;}
    .inner_box img{width: 100%;}

</style>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">packages</a></li>
                    <li class="breadcrumb-item active">{{ isset($is_update) ? 'edit' : 'add'}} </li>
                </ol>
            </div>
            <h4 class="page-title">{{ isset($is_update) ? 'Edit' : 'Add'}} pacakge</h4>
            
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">

            <h4 class="header-title m-t-0">{{ isset($is_update) ? 'Edit' : 'Add'}} package</h4>
            <p class="text-muted font-14 m-b-20">
                Here you can {{ isset($is_update) ? 'edit' : 'add'}} package.
            </p>
            
            <form action="{{ route('vendors.packages.store') }}" class="ajaxForm" method="post" enctype="multipart/form-data" novalidate id="form">
                @csrf
                <div class="row">
                    <div class="col-md-2">
                        <label for="">Infant</label>
                        <input type="checkbox" class="js-switch-small nopopup"  data-toggle="switchery"  value="1" name="is_infant" id="is_infant" @if(!is_null(@$edit_package->infant)) checked @endif />
                    </div>
                    <div class="col-md-2">
                        <label for="">Child</label>
                        <input type="checkbox" class="js-switch-small nopopup"  data-toggle="switchery"  value="1" name="is_child" id="is_child"  @if(!is_null(@$edit_package->child)) checked @endif/>
                    </div>
                    <div class="col-md-2">
                        <label for="">Adult</label>
                        <input type="checkbox" class="js-switch-small nopopup"  data-toggle="switchery"  value="1" name="is_adult" id="is_adult" @if(!is_null(@$edit_package->adult)) checked @endif/>
                    </div>
                    <div class="col-md-2">
                        <label for="">Dinner</label>
                        <input type="checkbox" class="js-switch-small nopopup"  data-toggle="switchery"  value="1" name="is_dinner" id="is_dinner" @if(!is_null(@$edit_package->dinner)) checked @endif/>
                    </div>
                    <div class="col-md-2">
                        <label for="">Morning</label>
                        <input type="checkbox" class="js-switch-small nopopup"  data-toggle="switchery"  value="1" name="is_morning" id="is_morning" onchange="showAddonRow('morning_add_ons_row', this)" @if(@$edit_package->is_morning)  checked @endif />
                    </div>    
                    <div class="col-md-2">
                        <label for="">Evening</label>
                        <input type="checkbox" class="js-switch-small nopopup"  data-toggle="switchery"  value="1" name="is_evening" id="is_evening" onchange="showAddonRow('evening_add_ons_row', this)" @if(@$edit_package->is_evening)  checked @endif />
                    </div>         
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="">Select Emirates</label>
                        <select class="form-control select_2_class" name="country_id" id="country_id">
                            <option value="">Select Emirates</option>
                            @foreach($countries AS $country)
                                <option value="{{ $country->hashid }}" @if(@$edit_package->country_id == $country->id) selected @endif>{{ $country->country_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Package types</label>
                        <select class="form-control select_2_class" name="pkg_type_id" id="pkg_type_id">
                            <option value="">Select package type</option>
                            @foreach($types AS $type)
                                <option value="{{ $type->hashid }}" @if(@$edit_package->pkg_type_id == $type->id) selected @endif>{{ $type->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    
                    <div class="col-md-6">
                        <label for="">Title</label>
                        <input type="text" class="form-control" value="{{ @$edit_package->title }}" placeholder="Enter package title here" name="title" id="title" required>
                    </div>
                    
                    <div class="col-md-6 @if(is_null(@$edit_package->infant)) d-none @endif" id="infant_column">
                        <label for="">Infant</label>
                        <input type="number" class="form-control" value="{{ @$edit_package->infant }}" name="infant" id="infant" @if(!is_null(@$edit_package->infant)) required @endif>
                    </div>
                    
                    <div class="col-md-6 @if(is_null(@$edit_package->child)) d-none @endif" id="child_column">
                        <label for="">Child</label>
                        <input type="number" class="form-control" value="{{ @$edit_package->infant }}" name="child" id="child" @if(!is_null(@$edit_package->child)) required @endif>
                    </div>
                    
                    <div class="col-md-6 @if(is_null(@$edit_package->adult)) d-none @endif" id="adult_column">
                        <label for="">Adult</label>
                        <input type="number" class="form-control" value="{{ @$edit_package->adult }}" name="adult" id="adult" @if(!is_null(@$edit_package->adult)) required @endif>
                    </div>
              
                    <div class="col-md-6 @if(is_null(@$edit_package->dinner)) d-none @endif" id="dinner_column">
                        <label for="">Dinner</label>
                        <input type="number" class="form-control" value="{{ @$edit_package->dinner }}" name="dinner" id="dinner" @if(!is_null(@$edit_package->dinner)) required @endif>
                    </div>
                </div>

                <div class="row @if(!@$edit_package->is_morning == 1) d-none @endif" id="morning_add_ons_row">
                    @if(isset($is_update) && $edit_package->morning_count > 0)
                        @foreach($edit_package->addOns->where('type', 'morning') AS $morning_add_on)
                            <div class="col-md-12 mt-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Morning Add on</label>
                                        <input type="text" class="form-control" value="{{ $morning_add_on->title }}" name="morning_title[]" id="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Price</label>

                                        <div class="input-group">
                                            <input type="number" class="form-control" value="{{ $morning_add_on->price }}" name="morning_price[]" id="" min="1">
                                            <label class="input-group-text p-0" for="inputGroupSelect01">
                                                @if($loop->iteration == 1)
                                                <button type="button" class="btn btn-primary" id="add_morning_add_ons">+</button>
                                                @else 
                                                    <button type="button" class="btn btn-danger remove_morning_add_ons" id="" onclick="removeAddOn(3, this)">x</button>
                                                @endif
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-12">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="">Morning Add on</label>
                                    <input type="text" class="form-control" value="" name="morning_title[]" id="">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Price</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" value="" name="morning_price[]" id="" min="1">
                                        <label class="input-group-text p-0" for="inputGroupSelect01">
                                            <button type="button" class="btn btn-primary" id="add_morning_add_ons">+</button>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="row  @if(!@$edit_package->is_evening == 1) d-none @endif" id="evening_add_ons_row">
                    @if(isset($is_update) && $edit_package->evening_count > 0)
                        @foreach($edit_package->addOns->where('type', 'evening') AS $evening_add_on)
                            <div class="col-md-12">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="">Evening Add on</label>
                                        <input type="text" class="form-control" value="{{ $evening_add_on->title }}" name="evening_title[]" id="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Price</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" value="{{ $evening_add_on->price }}" name="evening_price[]" id="" min="1">
                                            <label class="input-group-text p-0" for="inputGroupSelect01">
                                                @if($loop->iteration == 1)
                                                    <button type="button" class="btn btn-primary" id="add_evening_add_ons">+</button>
                                                @else
                                                    <button type="button" class="btn btn-danger remove_morning_add_ons" id="" onclick="removeAddOn(3, this)">x</button>
                                                @endif
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else 
                        <div class="col-md-12">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="">Evening Add on</label>
                                    <input type="text" class="form-control" value="" name="evening_title[]" id="">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Price</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" value="" name="evening_price[]" id="" min="1">
                                        <label class="input-group-text p-0" for="inputGroupSelect01">
                                            <button type="button" class="btn btn-primary" id="add_evening_add_ons">+</button>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label for=""> Description</label>
                        <textarea name="description" id="ck" cols="30" rows="10">
                            {!! @$edit_package->description !!}
                        </textarea>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="form-group col-md-6">
                        <label for="logo">Package Thumbnail</label>
                        <div class="input-group mb-2">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image"  id="image" onchange="showPreview('preview_image')">
                                <label class="custom-file-label profile_img_label" for="logo">Choose Vendor Profile</label>
                            </div>
                        </div>
                        <img id="preview_image" src="{{ check_file(@$edit_package->image) }}"  class="@if(!@$is_update) d-none @endif" width="100px" height="100px"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="logo">Package Images <small class="text-danger">(Here you can upload multiple images)</small></label><br />
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" multiple class="custom-file-input" name="image_arr[]"  id="image" onchange="multiImagePreview(this, '.multi_image_preview')">
                                <label class="custom-file-label profile_img_label" for="logo">Choose Vendor Profile</label>
                            </div>
                        </div>

                        <div class="multi_image_preview mt-3">
                            @isset($is_update)
                                @if($edit_package->package_images_count > 0)
                                    @foreach($edit_package->packageImages AS $image)
                                    <div class="position-relative d-inline inner_box mr-2 mb-2">
                                        <button type="button" class="btn btn-danger position-absolute nopopup" onclick="ajaxRequest(this); deleteImage(this)", data-url="{{ route('vendors.packages.delete_image', ['id'=>$image->hashid]) }}" style="right: 0"><i class="fas fa-times"></i></button>
                                        <img src="{{ check_file($image->image) }}" alt="" class="package_image">
                                    </div>
                                    @endforeach
                                @endif
                            @endisset
                        </div>

                    </div>
                </div>
                <input type="hidden" name="package_id" value="{{ @$edit_package->hashid }}">
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

    $('#is_infant').change(function(){//show infant column
        $('#infant_column').toggleClass('d-none');
        requiredAttr('infant');
    });

    $('#is_child').change(function(){//show child column
        $('#child_column').toggleClass('d-none');
        requiredAttr('child');

    });

    $('#is_adult').change(function(){//show adult column
        $('#adult_column').toggleClass('d-none');
        requiredAttr('adult');

    });

    $('#is_dinner').change(function(){//show dinner column
        $('#dinner_column').toggleClass('d-none');
        requiredAttr('dinner');

    });

    $('#add_morning_add_ons').click(function(){//add morning add ons row
        $(this).parents().eq(4).append(addOnsHtml('Morning', 'morning_title', 'morning_price'));
    });

    $('#add_evening_add_ons').click(function(){//add evening add ons row
        alert('done');
        $(this).parents().eq(4).append(addOnsHtml('Evening', 'evening_title', 'evening_price'));
    });

    //set required attribute in inpue fileds
    function requiredAttr(id){
        if($('#'+id).attr("required")){
            $('#'+id).removeAttr('required');
            disableInput(id, true);
        }else{
            $('#'+id).attr('required', true);
            disableInput(id, false);
        }
    }

    function disableInput(id, disable=true){
        if(disable == true){
            $('#'+id).attr('disabled', true);
        }else{
            $('#'+id).removeAttr('disabled');
        }
    }
    //show add on row
    function showAddonRow(row_id, _self){
        if($(_self).is(':checked')){
            $('#'+row_id).removeClass('d-none');
        }else{
            $('#'+row_id).addClass('d-none');
        }
    }
    //add ons html 
    function addOnsHtml(title, add_on_column_name, add_on_price_column_name){
        var html =      '<div class="row mt-3">'+
                            '<div class="col-md-6">'+
                                '<label for="">'+title+' Add on</label>'+
                                '<input type="text" class="form-control" value="" name="'+add_on_column_name+'[]" id="">'+
                            '</div>'+
                            '<div class="col-md-6">'+
                                '<label for="">Price</label>'+
                                '<div class="input-group">'+
                                    '<input type="number" class="form-control" value="" name="'+add_on_price_column_name+'[]" id="" min="1">'+
                                    '<label class="input-group-text p-0" for="inputGroupSelect01">'+
                                        '<button type="button" class="btn btn-danger remove_morning_add_ons" id="" onclick="removeAddOn(3, this)">x</button>'+
                                        '</label>'+
                                    '</div>'+
                                '</div>'+
                        '</div>';
        return html;
    }

    //remove add on row 
    function removeAddOn(eq=1, _self){
        $(_self).parents().eq(eq).remove();
    }

    //delete package image
    function deleteImage(_self){
        $(_self).next().remove();
        $(_self).parent().remove();
    }
</script>
@endsection