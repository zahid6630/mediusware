@extends('layouts.app')

@section('title', 'Add Transaction')

@section('content')
    <div class="main-content">
    	<div class="page-content">
    		<div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Add Transaction</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Transactions</a></li>
                                    <li class="breadcrumb-item active">Add Transaction</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
            					<form id="FormSubmit" action="{{ route('transactions_store') }}" method="post" files="true" enctype="multipart/form-data" onkeypress="return event.keyCode != 13;">
            					{{ csrf_field() }}

            						<div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label">Transaction Type</label>
                                                <select style="width: 100%;cursor: pointer;" class="form-control select2" name="transaction_type" required>
                                                    <option value="1">Deposit</option>
                                                    <option value="2">Withdrawal</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="coupon_code">User *</label>
                                                <select style="width: 100%;cursor: pointer;" class="form-control select2 loadUser" name="user_id" required>
                                                    <option value="0">-Select User-</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="amount">Amount *</label>
                                                <input id="amount" name="amount" type="number" class="form-control" required>
                                            </div>
                                        </div>
				                	</div>

                                    <hr style="margin-top: 0px">

                                    <div class="form-group row">
                                        <div class="button-items col-md-12">
                                            <button id="submitButtonId" type="submit" class="btn btn-primary waves-effect waves-light floatRight">Save</button>

                                            <a style="color: white" href="{{ route('transactions_index') }}">
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
    <script type="text/javascript">
        $( document ).ready(function() {
            var site_url  = $('.site_url').val();
            $(".loadUser").select2({
                ajax: { 
                url:  site_url + '/users/user-list-load',
                type: "get",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                    cache: true
                },

                minimumInputLength: 0,
                escapeMarkup: function(result) {
                    return result;
                },
                templateResult: function (result) {
                    if (result.loading) return 'Searching...';
                    return result['text'];
                },
            });
        });
    </script>
@endsection