<div id="sidebar-collapse">
    <div class="admin-block d-flex">
        <div>
            <img src="{{ asset('assets/img/admin-avatar.png') }}" width="45px" />
        </div>
        <div class="admin-info">
            <div class="font-strong">Admin</div><small>Administrator</small>
        </div>
    </div>
    <ul class="side-menu metismenu">
        <li>
            <a class="{{ request()->routeIs('admin.dashboard') ? 'dashboard_active' : '' }}"
                href="{{ route('admin.dashboard') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                <span class="nav-label">Dashboard</span>
            </a>
        </li>
        <li class="heading">Admin Department</li>
        <li>
            <a class="{{ request()->routeIs('create-user-department') ? 'dashboard_active' : '' }}"
                href="{{ url('/admin-department/create-user-department') }}"><i
                    class="sidebar-item-icon fa-solid fa-users"></i>
                <span class="nav-label">Create User Department</span>
            </a>
        </li>
        {{-- <li>
            <a class="{{ request()->routeIs('view-user') ? 'dashboard_active' : '' }}"
                href="{{ url('/admin-department/view-user') }}"><i class="sidebar-item-icon fa-solid fa-user-plus"></i>
                <span class="nav-label">View User</span>
            </a>
        </li> --}}
        <li>
            <a class="{{ request()->routeIs('user-access-control') ? 'dashboard_active' : '' }}"
                href="{{ url('/admin-department/user-access-control') }}"><i
                    class="sidebar-item-icon fa-solid fa-shield-halved"></i>
                <span class="nav-label">User Access Control</span>
            </a>
        </li>
        <li>
            <a class="{{ request()->routeIs('letter-box') ? 'dashboard_active' : '' }}"
                href="{{ url('/admin-department/letter-box') }}">
                <i class=" sidebar-item-icon fas fa-envelope"></i>

                <span class="nav-label">Letter Box</span>
            </a>
        </li>
        <li class="heading">Program Department</li>

        <li class="main-dashboard-nav-2-level-last">
            <a class="{{ request()->routeIs('our-program.*') ? 'dashboard_active' : '' }}" href=""> <i
                    class="sidebar-item-icon fa-solid fa-briefcase"></i>
                <span class="nav-label">Our program</span><i class="fa fa-angle-left arrow"></i></a>
            <ul class="nav-2-level collapse">
                <li>
                    <a href="{{ url('/program-department/add-program') }}">
                        <div class="sidebar-sub-icon">
                            <i class="fa-regular fa-circle-check"></i>
                        </div>
                        Add Program
                    </a>
                </li>
                <li>
                    <a href="{{ url('/program-department/view-program') }}">
                        <div class="sidebar-sub-icon">
                            <i class="fa-regular fa-circle-check"></i>
                        </div>
                        View Program
                    </a>
                </li>
                <li>
                    <a href="{{ url('/program-department/deliverabels') }}">
                        <div class="sidebar-sub-icon">
                            <i class="fa-regular fa-circle-check"></i>
                        </div>
                        Deliverabels
                    </a>
                </li>
            </ul>
        </li>

        <li class="heading">HR Department</li>
        <li>
            <a class="{{ request()->routeIs('our-team*') ? 'dashboard_active' : '' }}" href=""><i
                    class="sidebar-item-icon fas  fa-hands-helping"></i>
                <span class="nav-label">Our Team</span><i class="fa fa-angle-left arrow"></i></a>
            <ul class="nav-2-level collapse">
                <li>
                    <a href="{{ url('/hr-department/team/team-member-registration') }}">
                        <div class="sidebar-sub-icon">
                            <i class="fa-regular fa-circle-check"></i>
                        </div>
                        Team Registration
                    </a>
                </li>
                <li>
                    <a href="{{ url('/hr-department/team/all-team-member') }}">
                        <div class="sidebar-sub-icon">
                            <i class="fa-regular fa-circle-check"></i>
                        </div>
                        All Team
                    </a>
                </li>
                <li>
                    <a href="{{ url('/hr-department/attendance/view-attendance') }}">
                        <div class="sidebar-sub-icon">
                            <i class="fa-regular fa-circle-check"></i>
                        </div>
                        View Attendance
                    </a>
                </li>
            </ul>
        </li>

        <li class="heading">Finance Department</li>

        <li class="main-dashboard-nav-2-level">
            <a class="{{ request()->routeIs('income*') ? 'dashboard_active' : '' }}" href=""><i
                    class="sidebar-item-icon fa-solid fa-hand-holding-heart"></i>
                <span class="nav-label">Income</span><i class="fa fa-angle-left arrow"></i></a>
            <ul class="nav-2-level collapse">
                <li>
                    <a href="{{ url('/finance-department/income/add-income') }}" class="has-submenu">
                        <div class="sidebar-sub-icon">
                            <i class="fa-regular fa-circle-check"></i>
                        </div>
                        Add Income
                    </a>
                </li>
                <li>
                    <a href="{{ url('/finance-department/income/view-income') }}" class="has-submenu">
                        <div class="sidebar-sub-icon">
                            <i class="fa-regular fa-circle-check"></i>
                        </div>
                        View Income
                    </a>
                </li>
                <li>
                    <a href="{{ url('/finance-department/income/invoice-setting') }}" class="has-submenu">
                        <div class="sidebar-sub-icon">
                            <i class="fa-regular fa-circle-check"></i>
                        </div>
                        Invoice Setting
                    </a>
                </li>
            </ul>
        </li>



        <li class="main-dashboard-nav-2-level-last">
            <a class="{{ request()->routeIs('expenditure*') ? 'dashboard_active' : '' }}" href=""><i
                    class="sidebar-item-icon fas fa-wallet"></i>
                <span class="nav-label">Expenditure</span><i class="fa fa-angle-left arrow"></i></a>
            <ul class="nav-2-level collapse">
                <li>
                    <a href="{{ url('/finance-department/expenditure/add-expenditure') }}">
                        <div class="sidebar-sub-icon">
                            <i class="fa-regular fa-circle-check"></i>
                        </div>
                        Add Expenditure
                    </a>
                </li>
                <li>
                    <a href="{{ url('/finance-department/expenditure/view-expenditure') }}">
                        <div class="sidebar-sub-icon">
                            <i class="fa-regular fa-circle-check"></i>
                        </div>
                        View Expenditure
                    </a>
                </li>


            </ul>

        </li>

    </ul>

</div>