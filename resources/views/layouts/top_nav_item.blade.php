<header style="background-color: #d7d7e8 !important" id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div style="padding: 0rem !important;background-color: #283593 !important" style="padding: 0rem !important" class="navbar-brand-box">
                <a href="{{ url('/home') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <!-- <img style="width: 40;height: 30px;margin-top: 15px" src="" alt=""> -->
                    </span>
                    <span class="logo-lg">
                        <img style="width: 50px;height: 50px;margin-top: 15px" src="" alt="">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button style="font-size: 0.8125rem !important" type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src=""
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ml-1">{{ Auth()->user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</a> 
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>