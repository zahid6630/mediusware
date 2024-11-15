@extends('layouts.app')

@section('title', 'User List')

@section('content')
    <div class="main-content">
    	<div class="page-content">
    		<div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">User List</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                                    <li class="breadcrumb-item active">User List</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive">
                                <table id="datatable" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr class="text-center">
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>User Name</th>
                                            <th>Account Type</th>
                                            <th>Balance</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    	@if(!empty($users) && ($users->count() > 0))
                                    	@foreach($users as $key => $user)
	                                        <tr>
	                                            <td class="text-center">{{ $key + 1 }}</td>
                                                <td class="text-left">{{ $user['name'] }}</td>
	                                            <td class="text-center">{{ $user['email']  }}</td>
	                                            <td class="text-center">
                                                    @if($user['account_type'] == 1)
                                                        Individual
                                                    @else
                                                        Business
                                                    @endif   
                                                </td>
                                                <td class="text-center">{{ $user['balance']  }}</td>
	                                            <td class="text-center">
	                                            	<div class="dropdown">
                                                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" style="">
                                                            <a class="dropdown-item" href="">Edit</a>
                                                        </div>
                                                    </div>
	                                            </td>
	                                        </tr>
	                                    @endforeach
	                                    @endif
                                    </tbody>
                                </table>
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