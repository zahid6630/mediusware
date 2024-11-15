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


                <li>
                    <a class="has-arrow waves-effect">
                        <i class="fas fa-users"></i><span>Users</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li> 
                            <a href="{{ route('users_index') }}">User List</a> 
                        </li>

                        <li> 
                            <a href="{{ route('users_create') }}">Add User</a> 
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>