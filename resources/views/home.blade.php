@extends('layouts.app')

@section('title', 'Dashboard')

@include('layouts.style_home')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-3">
                    <div class="card-counter success">
                        <i class="fa fa-database"></i>
                        <span id="todaysSales" class="count-numbers">
                            <h4 class="mb-0">0</h4>
                        </span>
                        <span class="count-name">Today's Sales</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter info">
                        <i class="fa fa-users"></i>
                        <span id="todaysSalesReturn" class="count-numbers">
                            <h4 class="mb-0">0</h4>
                        </span>
                        <span class="count-name">Today's Sales Return</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter danger">
                        <i class="fa fa-database"></i>
                        <span id="todaysExpense" class="count-numbers">
                            <h4 class="mb-0">0</h4>
                        </span>
                        <span class="count-name">Today's Expense</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter primary">
                        <i class="fa fa-envelope"></i>


                        <span class="count-numbers">
                            <h4 style="color: white;font-size: 30;" class="mb-0"></h4>
                        </span>
                        <span class="count-name">SMS Balance</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="card-counter info">
                        <i class="fa fa-users"></i>
                        <span id="customerDues" class="count-numbers">
                            <h4 class="mb-0">0</h4>
                        </span>
                        <span class="count-name">Customer Dues</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter info">
                        <i class="fa fa-users"></i>
                        <span id="supplierDues" class="count-numbers">
                            <h4 class="mb-0">0</h4>
                        </span>
                        <span class="count-name">Supplier Dues</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter success">
                        <i class="fa fa-database"></i>
                        <span id="totalSells" class="count-numbers">
                            <h4 class="mb-0">0</h4>
                        </span>
                        <span class="count-name">Total Sales</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter success">
                        <i class="fa fa-database"></i>
                        <span id="totalPurchase" class="count-numbers">
                            <h4 class="mb-0">0</h4>
                        </span>
                        <span class="count-name">Total Purchase</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter danger">
                        <i class="fa fa-database"></i>
                        <span id="totalCustomers" class="count-numbers">
                            <h4 class="mb-0">0</h4>
                        </span>
                        <span class="count-name">Total Customers</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter danger">
                        <i class="fa fa-database"></i>
                        <span id="totalSuppliers" class="count-numbers">
                            <h4 class="mb-0">0</h4>
                        </span>
                        <span class="count-name">Total Suppliers</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter primary">
                        <i class="fa fa-users"></i>
                        <span id="totalInvoices" class="count-numbers">
                            <h4 class="mb-0">0</h4>
                        </span>
                        <span class="count-name">Total Invoices</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter primary">
                        <i class="fa fa-users"></i>
                        <span id="totalBills" class="count-numbers">
                            <h4 class="mb-0">0</h4>
                        </span>
                        <span class="count-name">Total Bills</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4 float-sm-left">Sales Summary</h4>
                            <div class="clearfix"></div>
                            <div id="chartContainer3" style="height: 370px; width: 100%;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4 float-sm-left">Purchase Summary</h4>
                            <div class="clearfix"></div>
                            <div id="chartContainer4" style="height: 370px; width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ url('/assets/admin_panel_assets/js/canvasCharts.min.js') }}"></script>

    <script type="text/javascript">
        $( document ).ready(function() {
            var site_url  = $('.site_url').val();

        });
    
        function pad(number, length)
        {
            var str = '' + number;
            while (str.length < length)
            {
                str = '0' + str;
            }
           
            return str;
        }
    </script>
@endsection