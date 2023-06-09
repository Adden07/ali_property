@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">User Role Permission</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
            <h4 class="page-title">{{ isset($update) ? 'Edit' : 'Add'}} User Role Permission</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title m-t-0">{{ isset($update) ? 'Edit' : 'Add'}} User Role Permission</h4>
            <p class="text-muted font-14 m-b-20">
                Here you can {{ isset($update) ? 'Edit' : 'Add'}} User Role Permission.
            </p>

            <form action="{{ route('admin.role_permissions.store') }}" class="ajaxForm" method="post" id="form" enctype="multipart/form-data" novalidate>
                @csrf

                <div class="row">
                    <div class="form-group mb-3 col-md-12">
                        <label for="name">Role Name<span class="text-danger">*</span></label>
                        <select class="form-control" name="role_name" id="role_name" @if(isset($update)) disabled @endif required>
                            <option value="">Select Role</option>
                            
                            
                            <option value="superadmin" @if(@@$edit_permission->role_name == 'superadmin') selected @endif>Super Admin</option>
                            <option value="admin" @if(@@$edit_permission->role_name == 'admin') selected @endif>Admin</option>
                            <option value="franchise" @if(@@$edit_permission->role_name == 'franchise') selected @endif>Franchise</option>
                            <option value="dealer" @if(@@$edit_permission->role_name == 'dealer') selected @endif>Dealer</option>
                            <option value="sub_dealer" @if(@@$edit_permission->role_name == 'sub_dealer') selected @endif>Sub Dealer</option>
                        </select>
                    </div>
                </div>    

                <div class="row" id="rights">
                    <div class="col-sm-12">
                        <h5 for="Rights">Permissions</h5>
                    </div>    
                    <div class="col-sm-6">
                        <div class="form-group" id="rights">
                            <label for="Rights">Activity Logs</label>
                            <table class=" table-bordered w-100 nowrap responsive">
                                <thead>
                                    <tr style="text-align:center;">
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align:center;">
                                        <td>
                                            <input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="view-activity-log" @if(isset($update)){{  @(in_array('view-activity-log',@$edit_permission->permissions)) ? 'checked' : '' }} @endif />
                                        </td>
                                    </tr>
                                </tbody>
                            </table> 
                        </div>
                    </div>
                   
                    <div class="col-sm-6">
                        <div class="form-group" >
                            <label for="Rights">Admin</label>  
                            <table class=" table-bordered w-100 nowrap responsive">
                                <thead>
                                    <tr style="text-align:center;">
                                        <th>Enabled</th>
                                        {{-- <th>All</th> --}}
                                        <th>Add</th>
                                        <th>Edit</th>
                                        <th>View</th>
                                        <th>Documents</th>
                                        {{-- <th>Delete</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align:center;">
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="enabled-admin" @if(isset($update)){{ @(in_array('enabled-admin',@$edit_permission->permissions)) ? 'checked' : '' }}@endif /></td>
{{-- 
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="all-admin" 
                                            @if(isset($update)){{ @(in_array('all-admin',@$edit_permission->permissions)) ? 'checked' : '' }}@endif 
                                            @if(isset($update)){{ @(in_array('enabled-admin',@$edit_permission->permissions)) ? '' : 'disabled' }}@endif /></td> --}}
                                        
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="add-admin" 
                                            @if(isset($update)){{ @(in_array('add-admin',@$edit_permission->permissions)) ? 'checked' : '' }}@endif 
                                            @if(isset($update)){{ @(in_array('enabled-admin',@$edit_permission->permissions)) ? '' : 'disabled' }}@endif/></td>
                                        
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="edit-admin" 
                                            @if(isset($update)){{ @(in_array('edit-admin',@$edit_permission->permissions)) ? 'checked' : '' }}@endif 
                                            @if(isset($update)){{ @(in_array('enabled-admin',@$edit_permission->permissions)) ? '' : 'disabled' }}@endif/></td>

                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="view-admin" @if(isset($update)){{ @(in_array('view-admin',@$edit_permission->permissions)) ? 'checked' : '' }}@endif 
                                            @if(isset($update)){{ @(in_array('enabled-admin',@$edit_permission->permissions)) ? '' : 'disabled' }}@endif/></td>

                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="update-admin-documents" @if(isset($update)){{ @(in_array('update-admin-documents',@$edit_permission->permissions)) ? 'checked' : '' }}@endif 
                                            @if(isset($update)){{ @(in_array('enabled-admin',@$edit_permission->permissions)) ? '' : 'disabled' }}@endif/></td>
        
                                    </tr>
                                </tbody>
                            </table>
                      
                        </div>
                    </div>
                </div>
                {{-- <div class="row" id="rights">
                   
                    <div class="col-sm-6">
                        <div class="form-group" >
                            <label for="Rights">City</label>  
                            <table class=" table-bordered w-100 nowrap responsive">
                                <thead>
                                    <tr style="text-align:center;">
                                        <th>All</th>
                                        <th>Add</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align:center;">
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="all-city" @if(isset($update)){{ @(in_array('all-city',@$edit_permission->permissions)) ? 'checked' : '' }}@endif /></td>
                                        
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="add-city" @if(isset($update)){{ @(in_array('add-city',@$edit_permission->permissions)) ? 'checked' : '' }}@endif /></td>
                                        
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="edit-city" @if(isset($update)){{ @(in_array('edit-city',@$edit_permission->permissions)) ? 'checked' : '' }}@endif /></td>

                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="delete-city" @if(isset($update)){{ @(in_array('delete-city',@$edit_permission->permissions)) ? 'checked' : '' }}@endif /></td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group" >
                            <label for="Rights">Area</label>  
                            <table class=" table-bordered w-100 nowrap responsive">
                                <thead>
                                    <tr style="text-align:center;">
                                        <th>All</th>
                                        <th>Add</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align:center;">
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="all-area" @if(isset($update)){{ @(in_array('all-area',@$edit_permission->permissions)) ? 'checked' : '' }}@endif /></td>
                                        
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="add-area" @if(isset($update)){{ @(in_array('add-area',@$edit_permission->permissions)) ? 'checked' : '' }}@endif /></td>
                                        
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="edit-area" @if(isset($update)){{ @(in_array('edit-area',@$edit_permission->permissions)) ? 'checked' : '' }}@endif /></td>

                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="delete-area" @if(isset($update)){{ @(in_array('delete-area',@$edit_permission->permissions)) ? 'checked' : '' }}@endif /></td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> --}}

                <div class="row" id="rights">
                   
                    <div class="col-sm-6">
                        <div class="form-group" >
                            <label for="Rights">Settings-General</label>  
                            <table class=" table-bordered w-100 nowrap responsive">
                                <thead>
                                    <tr style="text-align:center;">
                                        <th>Enabled</th>
                                        <th>View</th>
                                        {{-- <th>Add</th>
                                        <th>Edit</th>
                                        <th>Delete</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align:center;">
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="enabled-settings" @if(isset($update)){{ @(in_array('enabled-settings',@$edit_permission->permissions)) ? 'checked' : '' }}@endif /></td>

                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="view-general-settings" @if(isset($update)){{ @(in_array('view-general-settings',@$edit_permission->permissions)) ? 'checked' : '' }}@endif  
                                            @if(isset($update)){{ @(in_array('enabled-settings',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>

                                        {{-- <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="all-settings-general" @if(isset($update)){{ @(in_array('all-settings-general',@$edit_permission->permissions)) ? 'checked' : '' }}@endif /></td>
                                        
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="add-settings-general" @if(isset($update)){{ @(in_array('add-settings-general',@$edit_permission->permissions)) ? 'checked' : '' }}@endif /></td>
                                        
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="edit-settings-general" @if(isset($update)){{ @(in_array('edit-settings-general',@$edit_permission->permissions)) ? 'checked' : '' }}@endif /></td>

                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="delete-settings-general" @if(isset($update)){{ @(in_array('delete-settings-general',@$edit_permission->permissions)) ? 'checked' : '' }}@endif /></td> --}}
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group" >
                            <label for="Rights">Settings-Locations</label>  
                            <table class=" table-bordered w-100 nowrap responsive">
                                <thead>
                                    <tr style="text-align:center;">
                                        <th>Enabled</th>
                                        {{-- <th>All</th> --}}
                                        <th>Add</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align:center;">
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="enabled-settings-locations" @if(isset($update)){{ @(in_array('enabled-settings-locations',@$edit_permission->permissions)) ? 'checked' : '' }}@endif /></td>
                                        
                                        {{-- <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="all-settings-locations" @if(isset($update)){{ @(in_array('all-settings-locations',@$edit_permission->permissions)) ? 'checked' : '' }}@endif 
                                            @if(isset($update)){{ @(in_array('enabled-settings-locations',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td> --}}

                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="add-settings-locations" @if(isset($update)){{ @(in_array('add-settings-locations',@$edit_permission->permissions)) ? 'checked' : '' }}@endif 
                                            @if(isset($update)){{ @(in_array('enabled-settings-locations',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>

                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="edit-settings-locations" @if(isset($update)){{ @(in_array('edit-settings-locations',@$edit_permission->permissions)) ? 'checked' : '' }}@endif 
                                            @if(isset($update)){{ @(in_array('enabled-settings-locations',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>

                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="delete-settings-locations" @if(isset($update)){{ @(in_array('delete-settings-locations',@$edit_permission->permissions)) ? 'checked' : '' }}@endif 
                                            @if(isset($update)){{ @(in_array('enabled-settings-locations',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row" id="rights">
                   
                    <div class="col-sm-6">
                        <div class="form-group" >
                            <label for="Rights">Franchises</label>  
                            <table class=" table-bordered w-100 nowrap responsive">
                                <thead>
                                    <tr style="text-align:center;">
                                        <th>Enabled</th>
                                        <th>Add</th>
                                        <th>Edit</th>
                                        <th>View</th>
                                        <th>Packages</th>
                                        <th>Documents</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align:center;">
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="enabled-franchise" @if(isset($update)){{ @(in_array('enabled-franchise',@$edit_permission->permissions)) ? 'checked' : '' }}@endif /></td>

                                        {{-- <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="all-franchise" 
                                            @if(isset($update)){{ @(in_array('all-franchise',@$edit_permission->permissions)) ? 'checked' : '' }}@endif @if(isset($update)){{ @(in_array('enabled-franchise',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td> --}}
                                        
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="add-franchise" @if(isset($update)){{ @(in_array('add-franchise',@$edit_permission->permissions)) ? 'checked' : '' }}@endif 
                                            @if(isset($update)){{ @(in_array('enabled-franchise',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>

                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="edit-franchise" @if(isset($update)){{ @(in_array('edit-franchise',@$edit_permission->permissions)) ? 'checked' : '' }}
                                            @endif @if(isset($update)){{ @(in_array('enabled-franchise',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>

                                        
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="view-franchise" 
                                            @if(isset($update)){{ @(in_array('view-franchise',@$edit_permission->permissions)) ? 'checked' : '' }}@endif 
                                            @if(isset($update)){{ @(in_array('enabled-franchise',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>

                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="franchise-packages" 
                                            @if(isset($update)){{ @(in_array('franchise-packages',@$edit_permission->permissions)) ? 'checked' : '' }}@endif 
                                            @if(isset($update)){{ @(in_array('enabled-franchise',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>
        
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="update-franchise-documents" 
                                            @if(isset($update)){{ @(in_array('update-franchise-documents',@$edit_permission->permissions)) ? 'checked' : '' }}@endif 
                                            @if(isset($update)){{ @(in_array('enabled-franchise',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>
    
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group" >
                            <label for="Rights">Dealers</label>  
                            <table class=" table-bordered w-100 nowrap responsive">
                                <thead>
                                    <tr style="text-align:center;">
                                        <th>Enabled</th>
                                        <th>Add</th>
                                        <th>Edit</th>
                                        <th>View</th>
                                        <th>Packages</th>
                                        <th>Documents</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align:center;">
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="enabled-dealer" @if(isset($update)){{ @(in_array('enabled-dealer',@$edit_permission->permissions)) ? 'checked' : '' }}@endif /></td>
{{-- 
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="all-dealer" @if(isset($update)){{ @(in_array('all-dealer',@$edit_permission->permissions)) ? 'checked' : '' }}@endif 
                                            @if(isset($update)){{ @(in_array('enabled-dealer',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>
                                         --}}
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="add-dealer" @if(isset($update)){{ @(in_array('add-dealer',@$edit_permission->permissions)) ? 'checked' : '' }}@endif 
                                            @if(isset($update)){{ @(in_array('enabled-dealer',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>

                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="edit-dealer" @if(isset($update)){{ @(in_array('edit-dealer',@$edit_permission->permissions)) ? 'checked' : '' }}@endif 
                                            @if(isset($update)){{ @(in_array('enabled-dealer',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>

                                        
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="view-dealer" @if(isset($update)){{ @(in_array('view-dealer',@$edit_permission->permissions)) ? 'checked' : '' }}@endif  
                                            @if(isset($update)){{ @(in_array('enabled-dealer',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>
                                        
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="dealer-packages" @if(isset($update)){{ @(in_array('dealer-packages',@$edit_permission->permissions)) ? 'checked' : '' }}@endif  
                                            @if(isset($update)){{ @(in_array('enabled-dealer',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>
                                        
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="update-dealer-documents" 
                                            @if(isset($update)){{ @(in_array('update-dealer-documents',@$edit_permission->permissions)) ? 'checked' : '' }}@endif 
                                            @if(isset($update)){{ @(in_array('enabled-dealer',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>
    
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row" id="rights">
                   
                    <div class="col-sm-6">
                        <div class="form-group" >
                            <label for="Rights">Sub Dealers</label>  
                            <table class=" table-bordered w-100 nowrap responsive">
                                <thead>
                                    <tr style="text-align:center;">
                                        <th>Enabled</th>
                                        {{-- <th>All</th> --}}
                                        <th>Add</th>
                                        <th>Edit</th>
                                        <th>View</th>
                                        <th>Packages</th>
                                        <th>Documents</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align:center;">
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="enabled-subdealer" @if(isset($update)){{ @(in_array('enabled-subdealer',@$edit_permission->permissions)) ? 'checked' : '' }}@endif /></td>

                                        {{-- <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="all-subdealer" @if(isset($update)){{ @(in_array('all-subdealer',@$edit_permission->permissions)) ? 'checked' : '' }}@endif 
                                            @if(isset($update)){{ @(in_array('enabled-subdealer',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td> --}}
                                        
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="add-subdealer" @if(isset($update)){{ @(in_array('add-subdealer',@$edit_permission->permissions)) ? 'checked' : '' }}@endif 
                                            @if(isset($update)){{ @(in_array('enabled-subdealer',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>

                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="edit-subdealer" @if(isset($update)){{ @(in_array('edit-subdealer',@$edit_permission->permissions)) ? 'checked' : '' }}@endif 
                                            @if(isset($update)){{ @(in_array('enabled-subdealer',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>

                                        
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="view-subdealer" @if(isset($update)){{ @(in_array('view-subdealer',@$edit_permission->permissions)) ? 'checked' : '' }}@endif 
                                            @if(isset($update)){{ @(in_array('enabled-subdealer',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>

                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="subdealer-packages" @if(isset($update)){{ @(in_array('subdealer-packages',@$edit_permission->permissions)) ? 'checked' : '' }}@endif 
                                            @if(isset($update)){{ @(in_array('enabled-subdealer',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>    
                                        
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="update-subdealer-documents" 
                                            @if(isset($update)){{ @(in_array('update-subdealer-documents',@$edit_permission->permissions)) ? 'checked' : '' }}@endif 
                                            @if(isset($update)){{ @(in_array('enabled-subdealer',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>
    
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group" id="rights">
                            <label for="Rights">Finance</label>
                            <table class=" table-bordered w-100 nowrap responsive">
                                <thead>
                                    <tr style="text-align:center;">
                                        <th>Enabled</th>
                                        <th>View Invocies</th>
                                        <th>View Payments</th>
                                        <th>Add Payments</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align:center;">
                                        <td>
                                            <input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="enabled-finance" @if(isset($update)){{  @(in_array('enabled-finance',@$edit_permission->permissions)) ? 'checked' : '' }} @endif />
                                        </td>
                                        
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="enabled-invoices" @if(isset($update)){{ @(in_array('enabled-invoices',@$edit_permission->permissions)) ? 'checked' : '' }}@endif  
                                            @if(isset($update)){{ @(in_array('enabled-finance',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>  

                                        {{-- <td>
                                            <input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="enabled-invoices" @if(isset($update)){{  @(in_array('enabled-invoices',@$edit_permission->permissions)) ? 'checked' : '' }} @endif />
                                        </td> --}}

                                        {{-- <td>
                                            <input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="enabled-payments" @if(isset($update)){{  @(in_array('enabled-payments',@$edit_permission->permissions)) ? 'checked' : '' }} @endif />
                                        </td> --}}

                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="enabled-payments" @if(isset($update)){{ @(in_array('enabled-payments',@$edit_permission->permissions)) ? 'checked' : '' }}@endif  
                                            @if(isset($update)){{ @(in_array('enabled-finance',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>  
                                        
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="add-payments" @if(isset($update)){{ @(in_array('add-payments',@$edit_permission->permissions)) ? 'checked' : '' }}@endif  
                                            @if(isset($update)){{ @(in_array('enabled-payments',@$edit_permission->permissions) && in_array('enabled-finance',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>       
                                        
                                    </tr>
                                </tbody>
                            </table> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group" >
                            <label for="Rights">Users</label>  
                            <table class=" table-bordered w-100 nowrap responsive">
                                <thead>
                                    <tr style="text-align:center;">
                                        <th>Enabled</th>
                                        <th>All</th>
                                        <th>Add</th>
                                        <th>Edit</th>
                                        <th>View</th>
                                        <th>Activate</th>
                                        <th>Renew</th>
                                        <th>Online</th>
                                        <th>Offline</th>
                                        <th>Login Fails</th>
                                        <th>Mac vendor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align:center;">
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="enabled-user" @if(isset($update)){{ @(in_array('enabled-user',@$edit_permission->permissions)) ? 'checked' : '' }}@endif /></td>

                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="all-user" @if(isset($update)){{ @(in_array('all-user',@$edit_permission->permissions)) ? 'checked' : '' }}@endif  
                                            @if(isset($update)){{ @(in_array('enabled-user',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>
                                        
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="add-user" @if(isset($update)){{ @(in_array('add-user',@$edit_permission->permissions)) ? 'checked' : '' }}@endif  
                                            @if(isset($update)){{ @(in_array('enabled-user',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>

                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="edit-user" @if(isset($update)){{ @(in_array('edit-user',@$edit_permission->permissions)) ? 'checked' : '' }}@endif  
                                            @if(isset($update)){{ @(in_array('enabled-user',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>

                                        
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="view-user" @if(isset($update)){{ @(in_array('view-user',@$edit_permission->permissions)) ? 'checked' : '' }}@endif  
                                            @if(isset($update)){{ @(in_array('enabled-user',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>

                                            <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="active-user" @if(isset($update)){{ @(in_array('active-user',@$edit_permission->permissions)) ? 'checked' : '' }}@endif  
                                                @if(isset($update)){{ @(in_array('enabled-user',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>
    
                                            <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="renew-user" @if(isset($update)){{ @(in_array('renew-user',@$edit_permission->permissions)) ? 'checked' : '' }}@endif  
                                                @if(isset($update)){{ @(in_array('enabled-user',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>
                                                
                                            <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="online-users" @if(isset($update)){{ @(in_array('online-users',@$edit_permission->permissions)) ? 'checked' : '' }}@endif  
                                                @if(isset($update)){{ @(in_array('enabled-user',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>  
                                            
                                            <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="offline-users" @if(isset($update)){{ @(in_array('offline-users',@$edit_permission->permissions)) ? 'checked' : '' }}@endif  
                                                    @if(isset($update)){{ @(in_array('enabled-user',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>
                                            
                                            <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="login-fail-users" @if(isset($update)){{ @(in_array('login-fail-users',@$edit_permission->permissions)) ? 'checked' : '' }}@endif  
                                                @if(isset($update)){{ @(in_array('enabled-user',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>       
                                            
                                            <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="mac-vendor-users" @if(isset($update)){{ @(in_array('mac-vendor-users',@$edit_permission->permissions)) ? 'checked' : '' }}@endif  
                                                @if(isset($update)){{ @(in_array('enabled-user',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>       
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group" >
                            <label for="Rights">User Package</label>  
                            <table class=" table-bordered w-100 nowrap responsive">
                                <thead>
                                    <tr style="text-align:center;">
                                        <th>Upgrade</th>
                                        <th>Change</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align:center;">

                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="upgrade-user-package" @if(isset($update)){{ @(in_array('upgrade-user-package',@$edit_permission->permissions)) ? 'checked' : '' }}@endif  
                                            @if(isset($update)){{ @(in_array('enabled-user',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>
                                        
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="change-user-package" @if(isset($update)){{ @(in_array('change-user-package',@$edit_permission->permissions)) ? 'checked' : '' }}@endif  
                                            @if(isset($update)){{ @(in_array('enabled-user',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>     
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group" >
                            <label for="Rights">Billing Cycle Group</label>  
                            <table class=" table-bordered w-100 nowrap responsive">
                                <thead>
                                    <tr style="text-align:center;">
                                        <th>Monthly</th>
                                        <th>Half Month</th>
                                        <th>Full Month</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align:center;">

                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="monthly" @if(isset($update)){{ @(in_array('monthly',@$edit_permission->permissions)) ? 'checked' : '' }}@endif  
                                            @if(isset($update)){{ @(in_array('enabled-user',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>
                                        
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="half-month" @if(isset($update)){{ @(in_array('half-month',@$edit_permission->permissions)) ? 'checked' : '' }}@endif  
                                            @if(isset($update)){{ @(in_array('enabled-user',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>     

                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="full-month" @if(isset($update)){{ @(in_array('full-month',@$edit_permission->permissions)) ? 'checked' : '' }}@endif  
                                            @if(isset($update)){{ @(in_array('enabled-user',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>        
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group" id="rights">
                            <label for="Rights">Invoice</label>
                            <table class=" table-bordered w-100 nowrap responsive">
                                <thead>
                                    <tr style="text-align:center;">
                                        <th>Enabled</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align:center;">
                                        <td>
                                            <input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="enabled-invoices" @if(isset($update)){{  @(in_array('enabled-invoices',@$edit_permission->permissions)) ? 'checked' : '' }} @endif />
                                        </td>
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="view-invoices" @if(isset($update)){{ @(in_array('view-invoices',@$edit_permission->permissions)) ? 'checked' : '' }}@endif  
                                            @if(isset($update)){{ @(in_array('enabled-invoice',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>       
                                    </tr>
                                </tbody>
                            </table> 
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group" id="rights">
                            <label for="Rights">Payments</label>
                            <table class=" table-bordered w-100 nowrap responsive">
                                <thead>
                                    <tr style="text-align:center;">
                                        <th>Enabled</th>
                                        <th>Add</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align:center;">
                                        <td>
                                            <input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="enabled-payments" @if(isset($update)){{  @(in_array('enabled-payments',@$edit_permission->permissions)) ? 'checked' : '' }} @endif />
                                        </td>
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="add-payments" @if(isset($update)){{ @(in_array('add-payments',@$edit_permission->permissions)) ? 'checked' : '' }}@endif  
                                            @if(isset($update)){{ @(in_array('enabled-payments',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>       
                                    </tr>
                                </tbody>
                            </table> 
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="row" id="rights">
                    <div class="col-sm-6">
                        <div class="form-group" >
                            <label for="Rights">User Package</label>  
                            <table class=" table-bordered w-100 nowrap responsive">
                                <thead>
                                    <tr style="text-align:center;">
                                        <th>Activate</th>
                                        <th>Renew</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align:center;">
                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="active-user" @if(isset($update)){{ @(in_array('active-user',@$edit_permission->permissions)) ? 'checked' : '' }}@endif  
                                            @if(isset($update)){{ @(in_array('enabled-user',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>

                                        <td><input type="checkbox" class="form-control" name="permissions[]"  data-toggle="switchery" data-size="small" data-color="#1bb99a" value="renew-user" @if(isset($update)){{ @(in_array('renew-user',@$edit_permission->permissions)) ? 'checked' : '' }}@endif  
                                            @if(isset($update)){{ @(in_array('enabled-user',@$edit_permission->permissions)) ? '' : 'readonly' }}@endif/></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> --}}


                <input type="hidden" name="permission_id" value="{{ @$edit_permission->hashid }}">
                @if(isset($update))
                    <input type="hidden" name="role_name" value="{{ @$edit_permission->role_name }}">
                @endif
                <div class="form-group mb-3 text-right">
                    {{-- <input type="hidden" value="{{ @$edit_isp->hashid }}" name="isp_id"> --}}
                    <button class="btn btn-primary waves-effect waves-light" type="submit" onclick="removeDisabled()">
                        {{ (isset($update)) ? 'Update' : 'Add' }}
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
<script>
    function removeDisabled(){
        $('#form input').removeAttr('disabled');
    }
</script>
@endsection
@section('page-scripts')
<script>        
    @include('admin.partials.datatable', ['load_swtichery' => true])
</script>
@endsection