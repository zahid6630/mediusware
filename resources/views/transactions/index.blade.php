@extends('layouts.app')

@section('title', 'Transaction List')

@section('content')
    <div class="main-content">
    	<div class="page-content">
    		<div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Transaction List</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Transactions</a></li>
                                    <li class="breadcrumb-item active">Transaction List</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive">
                                <form methode="get" action="{{ route('transactions_index') }}">
                                    <input type="hidden" name="search" value="yes">
                                    <input type="hidden" name="paginationAmount" value="{{isset($_GET['paginationAmount']) && !empty($_GET['paginationAmount']) ? $_GET['paginationAmount'] : 10}}">

                                    <div style="margin-bottom: 10px;" class="row">
                                        <div style="padding-right: 0px;padding-left: 5px;" class="col-md-4">
                                            <select style="cursor: pointer" name="account_type" class="form-control select2" id="search_status" required>
                                                <option value="0">--Select Transaction Type--</option>
                                                <option value="1" {{ isset($_GET['account_type']) && ($_GET['account_type'] == 1) ? 'selected' : '' }}>Deposit</option>
                                                <option value="2" {{ isset($_GET['account_type']) && ($_GET['account_type'] == 2) ? 'selected' : '' }}>Withdrawal</option>
                                            </select>
                                        </div>

                                        <div style="padding-left: 5px;" class="col-md-1">   
                                            <button type="submit" style="float: right;cursor: pointer;background-color: #5d64a9;text-align: center;" class="form-control">
                                                <i style="color: white;" class="bx bx-search font-size-24"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <div style="margin-bottom: 10px;margin-right: 0px;" class="row">
                                    <div style="padding-right: 0px;" class="col-md-10">
                                        <a style="cursor: pointer;background-color: #5d64a9;text-align: center;color: white !important;" href="{{ route('transactions_create') }}" class="btn btn-primary floatLeft">
                                            <i class='bx bx-plus'></i> Add Transaction
                                        </a>
                                    </div>
                                    <div style="padding-right: 0px;" class="col-md-2">
                                        <select style="float: right" name="paginationAmount" class="form-control select2 paginationAmount" style="padding-right: 0px;padding-left: 5px;">
                                            <option value="10">Row- 10</option>
                                            <option value="50" {{isset($_GET['paginationAmount']) && $_GET['paginationAmount'] == 50 ? 'selected' : Null}}>Row- 50</option>
                                            <option value="100" {{isset($_GET['paginationAmount']) && $_GET['paginationAmount'] == 100 ? 'selected' : Null}}>Row- 100</option>
                                            <option value="200" {{isset($_GET['paginationAmount']) && $_GET['paginationAmount'] == 200 ? 'selected' : Null}}>Row- 200</option>
                                            <option value="300" {{isset($_GET['paginationAmount']) && $_GET['paginationAmount'] == 300 ? 'selected' : Null}}>Row- 300</option>
                                        </select>
                                    </div>
                                </div>

                                <table class="table table-bordered table-striped">
                                    <thead style="background-color: #5d64a9 !important;color: white;">
                                        <tr class="text-center">
                                            <th>SL</th>
                                            <th>Type</th>
                                            <th>Date</th>
                                            <th>User</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody class="dragAndDrop">
                                        @if(!empty($transactions) && ($transactions->count() > 0))
                                        @foreach($transactions as $key => $transaction)
                                            <tr style="cursor: pointer">
                                                <td class="text-center verticalAlignMiddle">
                                                    {!! isset($_GET['page']) && !empty($_GET['page']) ? (($_GET['page']-1)*10)+($key+1) : $key + 1 !!}
                                                </td>
                                                <td class="text-center verticalAlignMiddle">
                                                    @if($transaction->transaction_type == 1)
                                                        Deposit
                                                    @else
                                                        Withdrawal
                                                    @endif
                                                </td>
                                                <td class="text-center verticalAlignMiddle">
                                                    {{ date('M-d, Y', strtotime($transaction->date)) }}
                                                </td>
                                                <td class="text-left verticalAlignMiddle">
                                                    {{ $transaction->user->name }}
                                                </td>
                                                <td class="text-center verticalAlignMiddle">
                                                    {{ $transaction->amount }}
                                                </td>
                                                <td class="text-center verticalAlignMiddle">
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
                                        @else
                                        <tr><td colspan="9" class="text-center">No Data</td></tr>
                                        @endif
                                    </tbody>
                                </table>

                                <div style="margin-left: 0px;" class="row">
                                    <div class="col-sm-4"></div>

                                    @if(!empty($transactions) && count($transactions)>0)
                                    <div class="col-sm-8 text-right customPaginationStyle">
                                        {{$transactions->appends(request()->input())->links()}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    		</div>
		</div>
    </div>
@endsection

@section('scripts')
    <script src="{{ url('assets/js/swap.js') }}"></script>
    <script src="{{ url('assets/custom_js/custom_table.js') }}"></script>
@endsection