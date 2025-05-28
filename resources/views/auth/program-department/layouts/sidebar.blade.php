<div id="sidebar-collapse">
    <div class="admin-block d-flex">
        <div>
            <img src="{{ asset('/assets/img/admin-avatar.png') }}" width="45px" />
        </div>
        <div class="admin-info">
            <div class="font-strong">Programer</div><small>Administrator</small>
        </div>
    </div>
    <ul class="side-menu metismenu">
        <li>
            <a class="{{ request()->routeIs('auth-program-department.dashboard') ? 'dashboard_active' : '' }}"
                href="{{ url('/auth/program-department/dashboard') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                <span class="nav-label">Dashboard</span>
            </a>
        </li>
        <li class="heading">Program Department</li>

        <li class="main-dashboard-nav-2-level-last">
            <a class="{{ request()->routeIs('auth-program-department.our-program*') ? 'dashboard_active' : '' }}"
                href=""> <i class="sidebar-item-icon fa-solid fa-briefcase"></i>
                <span class="nav-label">Our program</span><i class="fa fa-angle-left arrow"></i></a>
            <ul class="nav-2-level collapse">
                <li>
                    <a href="{{ url('/auth/program-department/add-program') }}">
                        <div class="sidebar-sub-icon">
                            <i class="fa-regular fa-circle-check"></i>
                        </div>
                        Add Program
                    </a>
                </li>
                <li>
                    <a href="{{ url('/auth/program-department/view-program') }}">
                        <div class="sidebar-sub-icon">
                            <i class="fa-regular fa-circle-check"></i>
                        </div>
                        View Program
                    </a>
                </li>
                <li>
                    <a href="{{ url('/auth/program-department/deliverabels') }}">
                        <div class="sidebar-sub-icon">
                            <i class="fa-regular fa-circle-check"></i>
                        </div>
                        Deliverabels
                    </a>
                </li>
            </ul>
        </li>


    </ul>
    </ul>
</div>
