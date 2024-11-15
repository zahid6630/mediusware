<div style="background-color: #1A237E !important" class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ url('/home') }}" class="waves-effect">
                        <i class="fa fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="">
                    <a class="has-arrow waves-effect">
                        <i class="fas fa-shopping-basket"></i><span>Purchases</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li class=""> 
                            <a class="" href="{{ route('purchases_orders_index') }}"> Purchase List</a> 
                        </li>

                        <li class=""> 
                            <a class="" href="{{ route('sales_return_index') }}"> Return List</a> 
                        </li>
                    </ul>
                </li>

                <li class="">
                    <a class="has-arrow waves-effect">
                        <i class="fas fa-shopping-basket"></i><span>Orders</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li class=""> 
                            <a class="" href="{{ route('pending_orders_index') }}"> Order List</a> 
                        </li>

                        <li class=""> 
                            <a class="" href="{{ route('sales_return_index') }}"> Return List</a> 
                        </li>
                    </ul>
                </li>

                <li class="">
                    <a class="has-arrow waves-effect">
                        <i class="fas fa-money-bill"></i><span> Accounts</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li> 
                            <a class="" href="{{ route('vouchers_index') }}">Voucher List</a> 
                        </li>

                        <li> 
                            <a class="" href="{{ route('voucher_posting_index') }}">Voucher Posting</a> 
                        </li>










                        <li> 
                            <a class="" href="{{ route('cash_payment_voucher_index') }}">Cash Payment Voucher</a> 
                        </li>

                        <li> 
                            <a class="" href="{{ route('cash_receipt_voucher_index') }}">Cash Receipt Voucher</a> 
                        </li>

                        <li> 
                            <a class="" href="{{ route('bank_payment_voucher_index') }}">Bank Payment Voucher</a> 
                        </li>

                        <li> 
                            <a class="" href="{{ route('bank_receipt_voucher_index') }}">Bank Receipt Voucher</a> 
                        </li>

                        <li> 
                            <a class="" href="{{ route('journal_voucher_index') }}">Journal Voucher</a> 
                        </li>

                        <li> 
                            <a class="" href="{{ route('contra_voucher_index') }}">Contra Voucher</a> 
                        </li>
                    </ul>
                </li>

                <li class="{{ (Route::currentRouteName() == 'products_index' ? 'mm-active' : '') ||
                              (Route::currentRouteName() == 'products_edit' ? 'mm-active' : '') }}">
                    <a class="{{ (Route::currentRouteName() == 'products_index' ? 'mm-active' : '') ||
                                 (Route::currentRouteName() == 'products_edit' ? 'mm-active' : '') }} has-arrow waves-effect">
                        <i class="fas fa-list"></i><span>Products</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li> 
                            <a class="" href="{{ route('products_index') }}">
                                Products
                            </a> 
                        </li>

                        <li> 
                            <a class="{{ Route::currentRouteName() == 'categories_index' ? 'mm-active' : '' }}" href="{{ route('categories_index') }}">Categories</a> 
                        </li>

                        <li> 
                            <a class="{{ Route::currentRouteName() == 'brands_index' ? 'mm-active' : '' }}" href="{{ route('brands_index') }}">Brands</a> 
                        </li>

                        <li> 
                            <a class="{{ Route::currentRouteName() == 'variations_index' ? 'mm-active' : '' }}" href="{{ route('variations_index') }}">Variations</a> 
                        </li>

                        <li> 
                            <a class="" href="#">Reviews</a> 
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('customers_index') }}" class="waves-effect">
                        <i class="fa fa-user"></i>
                        <span>Contacts</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('discounts_index') }}" class="waves-effect">
                        <i class="fa fa-coins"></i>
                        <span>Discounts</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('campaigns_index') }}" class="waves-effect">
                        <i class="fa fa-coins"></i>
                        <span>Campaigns</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <i class="fa fa-file"></i>
                        <span>Reports</span>
                    </a>
                </li>

                <li class="{{ (Route::currentRouteName() == 'users_edit' ? 'mm-active' : '') || 
                              (Route::currentRouteName() == 'users_index' ? 'mm-active' : '') || 
                              (Route::currentRouteName() == 'set_access_index' ? 'mm-active' : '') }}">
                    <a class="{{ (Route::currentRouteName() == 'users_edit' ? 'mm-active' : '') || 
                                 (Route::currentRouteName() == 'users_index' ? 'mm-active' : '') ||
                                 (Route::currentRouteName() == 'set_access_index' ? 'mm-active' : '') }} has-arrow waves-effect">
                        <i class="fas fa-users"></i><span>Users</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li class="{{ (Route::currentRouteName() == 'users_edit' ? 'mm-active' : '') || 
                                      (Route::currentRouteName() == 'set_access_index' ? 'mm-active' : '') }}"> 
                            <a class="{{ (Route::currentRouteName() == 'users_edit' ? 'mm-active' : '') ||
                                         (Route::currentRouteName() == 'set_access_index' ? 'mm-active' : '') }}" href="{{ route('users_index_all') }}">User List</a> 
                        </li>

                        <li class="{{ Route::currentRouteName() == 'users_index' ? 'mm-active' : '' }}"> 
                            <a class="{{ Route::currentRouteName() == 'users_index' ? 'mm-active' : '' }}" href="{{ route('users_index') }}">Add User</a> 
                        </li>
                    </ul>
                </li>

                <li class="{{ (Route::currentRouteName() == 'basic_settings_index' ? 'mm-active' : '') }}">
                    <a class="{{ (Route::currentRouteName() == 'users_edit' ? 'mm-active' : '') }} has-arrow waves-effect">
                        <i class="fas fa-wrench"></i><span>Settings</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li class="{{ Route::currentRouteName() == 'basic_settings_index' ? 'mm-active' : '' }}"> 
                            <a class="{{ Route::currentRouteName() == 'basic_settings_index' ? 'mm-active' : '' }}" href="{{ route('basic_settings_index') }}">Basic Information</a> 
                        </li>

                        <li class="{{ Route::currentRouteName() == 'delivery_policy_index' ? 'mm-active' : '' }}"> 
                            <a class="{{ Route::currentRouteName() == 'delivery_policy_index' ? 'mm-active' : '' }}" href="{{ route('delivery_policy_index') }}">Delivery Policies</a> 
                        </li>

                        <li class=""> 
                            <a class="" href="{{ route('chart_of_accounts_index') }}"> Accounts Head</a> 
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>