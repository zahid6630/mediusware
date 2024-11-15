@extends('layouts.app')

@section('title', 'Edit Discount')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Edit Discount</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Discounts</a></li>
                                    <li class="breadcrumb-item active">Edit Discount</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <form id="FormSubmit" action="{{ route('discounts_update', $find_discount['id']) }}" method="post" files="true" enctype="multipart/form-data" onkeypress="return event.keyCode != 13;">
                                {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label">Title *</label>
                                                <input id="title" name="title" type="text" class="form-control" value="{{ $find_discount['title'] }}">
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="coupon_code">Coupon Code</label>
                                                <input id="coupon_code" name="coupon_code" type="text" class="form-control" value="{{ $find_discount['coupon_code'] }}">
                                            </div>
                                        </div>


                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <label class="control-label">Type *</label>
                                                <select style="width: 100%" class="form-control select2" name="discount_type" required>
                                                    <option {{ $find_discount['type'] == 0 ? 'selected' : '' }} value="0">%</option>
                                                    <option {{ $find_discount['type'] == 1 ? 'selected' : '' }} value="1">BDT</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="amount">Amount *</label>
                                                <input id="amount" name="amount" type="text" class="form-control" value="{{ $find_discount['amount'] }}" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="control-label">Status</label>
                                                <select style="width: 100%" class="form-control" name="status" required>
                                                    <option {{ $find_discount['status'] == 1 ? 'selected' : '' }} value="1">Active</option>
                                                    <option {{ $find_discount['status'] == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <hr style="margin-top: 0px">

                                    <div class="form-group row">
                                        <div class="button-items col-md-12">
                                            <button id="submitButtonId" type="submit" class="btn btn-primary waves-effect waves-light floatRight">Update</button>

                                            <a style="color: white" href="{{ route('discounts_index') }}">
                                                <button type="button" class="btn btn-secondary waves-effect waves-light floatRight">Close</button>
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