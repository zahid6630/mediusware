@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="main-content">
    	<div class="page-content">
    		<div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Edit User</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                                    <li class="breadcrumb-item active">Edit User</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
            					<form id="FormSubmit" action="{{ route('users_update',$user_find['id']) }}" method="post" enctype="multipart/form-data" onkeypress="return event.keyCode != 13;">

            					    {{ csrf_field() }}

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Name *</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" value="{{ $user_find['name'] }}" name="name" id="name" placeholder="Enter Name" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">User Name *</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" value="{{ $user_find['email'] }}" name="user_name" id="user_name" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Password</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" value="" name="password" id="password" placeholder="Enter Password">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Role</label>
                                        <div class="col-md-10">
                                            <select style="cursor: pointer" class="form-control" name="role">
                                                @if(Auth::user()->role == 1 || Auth::user()->id == 1)
                                                <option {{ $user_find['role'] == 1 ? 'selected' : '' }} value="1">Super Admin</option>
                                                @endif
                                                <option {{ $user_find['role'] == 2 ? 'selected' : '' }} value="2">Admin</option>
                                                <option {{ $user_find['role'] == 3 ? 'selected' : '' }} value="3">Employee</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Status</label>
                                        <div class="col-md-10">
                                            <select style="cursor: pointer" class="form-control" name="status">
                                                <option {{ $user_find['status'] == 1 ? 'selected' : '' }} value="1">Active</option>
                                                <option {{ $user_find['status'] == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="form-group row">
                                        <div class="button-items col-md-12">
                                        	<button type="submit" class="btn btn-primary waves-effect waves-light floatRight">Update</button>

                                            <a style="color: white" href="{{ route('users_index_all') }}">
                                               <button type="button" class="btn btn-secondary waves-effect waves-light floatRight">
                                                Close   
                                               </button>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    		</div>
		</div>
    </div>
@endsection

@section('scripts')
@endsection