@extends('layouts.app')

@section('title', 'Add User')

@section('content')
    <div class="main-content">
    	<div class="page-content">
    		<div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Add User</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                                    <li class="breadcrumb-item active">Add User</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
            					<form id="FormSubmit" action="{{ route('users_store') }}" method="post" enctype="multipart/form-data" onkeypress="return event.keyCode != 13;">

            					    {{ csrf_field() }}

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Name *</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" value="" name="name" id="name" placeholder="Enter Name" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">User Name *</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" value="" name="user_name" id="user_name" placeholder="Enter User Name" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Password *</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" value="" name="password" id="password" placeholder="Enter Password" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Account Type</label>
                                        <div class="col-md-10">
                                            <select style="cursor: pointer" class="form-control select2" name="account_type">
                                                <option value="1">Individual</option>
                                                <option value="2">Business</option>
                                            </select>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="form-group row">
                                        <div class="button-items col-md-12">
                                        	<button type="submit" class="btn btn-primary waves-effect waves-light floatRight">Save</button>

                                            <a style="color: white" href="{{ route('users_index') }}">
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