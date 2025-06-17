@php
    $user = auth()->user();
    $userRoleName = $user->roles->pluck('name')->first(); // Get first assigned role name
@endphp

<div id="sidebar-collapse">
    <div class="admin-block d-flex">
        <div>
            <img src="{{ asset('assets/img/admin-avatar.png') }}" width="45px" />
        </div>
        <div class="admin-info">
            <div class="font-strong">{{ auth()->user()->name }}</div>
            <small>{{ strtoupper(str_replace('_', ' ', $userRoleName)) }}</small>
        </div>
    </div>

    {{-- ADMIN SIDEBAR --}}
    @if ($userRoleName === 'admin')
        <ul class="side-menu metismenu">
            <li>
                <a class="{{ request()->routeIs('admin.dashboard') ? 'dashboard_active' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>

            <li class="heading">Admin Department</li>
            <li>
                <a class="{{ request()->routeIs('create-user-department') ? 'dashboard_active' : '' }}"
                    href="{{ url('/admin-department/create-user-department') }}">
                    <i class="sidebar-item-icon fa-solid fa-users"></i>
                    <span class="nav-label">Create User Department</span>
                </a>
            </li>
            <li>
                <a class="{{ request()->routeIs('user-access-control') ? 'dashboard_active' : '' }}"
                    href="{{ url('/admin-department/user-access-control') }}">
                    <i class="sidebar-item-icon fa-solid fa-shield-halved"></i>
                    <span class="nav-label">User Access Control</span>
                </a>
            </li>
            <li>
                <a class="{{ request()->routeIs('letter-box') ? 'dashboard_active' : '' }}"
                    href="{{ url('/admin-department/letter-box') }}">
                    <i class="sidebar-item-icon fas fa-envelope"></i>
                    <span class="nav-label">Letter Box</span>
                </a>
            </li>

            {{-- Program Department --}}
            <li class="heading">Program Department</li>
            <li class="main-dashboard-nav-2-level-last">
                <a class="{{ request()->routeIs('our-program.*') ? 'dashboard_active' : '' }}" href="#">
                    <i class="sidebar-item-icon fa-solid fa-briefcase"></i>
                    <span class="nav-label">Our Program</span><i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li><a href="{{ url('/program-department/add-program') }}">Add Program</a></li>
                    <li><a href="{{ url('/program-department/view-program') }}">View Program</a></li>
                    <li><a href="{{ url('/program-department/deliverabels') }}">Deliverables</a></li>
                </ul>
            </li>

            {{-- HR Department --}}
            <li class="heading">HR Department</li>
            <li>
                <a href="#"><i class="sidebar-item-icon fas fa-hands-helping"></i>
                    <span class="nav-label">Our Team</span><i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li><a href="{{ url('/hr-department/team/team-member-registration') }}">Team Registration</a></li>
                    <li><a href="{{ url('/hr-department/team/all-team-member') }}">All Team</a></li>
                    <li><a href="{{ url('/hr-department/attendance/view-attendance') }}">View Attendance</a></li>
                </ul>
            </li>

            {{-- Finance Department --}}
            <li class="heading">Finance Department</li>
            <li class="main-dashboard-nav-2-level">
                <a href="#"><i class="sidebar-item-icon fa-solid fa-hand-holding-heart"></i>
                    <span class="nav-label">Income</span><i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li><a href="{{ url('/finance-department/income/add-income') }}">Add Income</a></li>
                    <li><a href="{{ url('/finance-department/income/view-income') }}">View Income</a></li>
                </ul>
            </li>
            <li class="main-dashboard-nav-2-level-last">
                <a href="#"><i class="sidebar-item-icon fas fa-wallet"></i>
                    <span class="nav-label">Expenditure</span><i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li><a href="{{ url('/finance-department/expenditure/add-expenditure') }}">Add Expenditure</a></li>
                    <li><a href="{{ url('/finance-department/expenditure/view-expenditure') }}">View Expenditure</a>
                    </li>
                </ul>
            </li>
        </ul>

        {{-- NON-ADMIN SIDEBAR --}}
    @else
        <ul class="side-menu metismenu">
            {{-- Program Department --}}
            @canany(['add', 'view', 'delete', 'edit', 'add_program', 'view_program', 'deliverables'])
                <li class="heading">Program Department</li>
                <li class="main-dashboard-nav-2-level-last">
                    <a class="{{ request()->routeIs('our-program.*') ? 'dashboard_active' : '' }}" href="#">
                        <i class="sidebar-item-icon fa-solid fa-briefcase"></i>
                        <span class="nav-label">Our Program</span><i class="fa fa-angle-left arrow"></i>
                    </a>
                    <ul class="nav-2-level collapse">
                        @canany(['add', 'add_program'])
                            <li><a href="{{ url('/program-department/add-program') }}">Add Program</a></li>
                        @endcanany

                        @canany(['view', 'delete', 'edit', 'view_program'])
                            <li><a href="{{ url('/program-department/view-program') }}">View Program</a></li>
                        @endcanany

                        @can('deliverables')
                            <li><a href="{{ url('/program-department/deliverabels') }}">Deliverables</a></li>
                        @endcan
                    </ul>
                </li>
            @endcanany

            {{-- HR Department --}}
            @canany(['add_team', 'view_team', 'edit_team', 'delete_team', 'attendance'])
                <li class="heading">HR Department</li>
                <li>
                    <a href="#"><i class="sidebar-item-icon fas fa-hands-helping"></i>
                        <span class="nav-label">Our Team</span><i class="fa fa-angle-left arrow"></i>
                    </a>
                    <ul class="nav-2-level collapse">
                        @can('add_team')
                            <li><a href="{{ url('/hr-department/team/team-member-registration') }}">Team Registration</a></li>
                        @endcan
                        @can('view_team')
                            <li><a href="{{ url('/hr-department/team/all-team-member') }}">All Team</a></li>
                        @endcan
                        @can('attendance')
                            <li><a href="{{ url('/hr-department/attendance/view-attendance') }}">View Attendance</a></li>
                        @endcan
                    </ul>
                </li>
            @endcanany

            {{-- Finance Department --}}
            @canany(['add_income', 'view_income'])
                <li class="heading">Finance Department</li>
                <li class="main-dashboard-nav-2-level">
                    <a href="#"><i class="sidebar-item-icon fa-solid fa-hand-holding-heart"></i>
                        <span class="nav-label">Income</span><i class="fa fa-angle-left arrow"></i>
                    </a>
                    <ul class="nav-2-level collapse">
                        @can('add_income')
                            <li><a href="{{ url('/finance-department/income/add-income') }}">Add Income</a></li>
                        @endcan
                        @can('view_income')
                            <li><a href="{{ url('/finance-department/income/view-income') }}">View Income</a></li>
                        @endcan
                    </ul>
                </li>
            @endcanany

            @canany(['add_expenditure', 'view_expenditure'])
                <li class="main-dashboard-nav-2-level-last">
                    <a href="#"><i class="sidebar-item-icon fas fa-wallet"></i>
                        <span class="nav-label">Expenditure</span><i class="fa fa-angle-left arrow"></i>
                    </a>
                    <ul class="nav-2-level collapse">
                        @can('add_expenditure')
                            <li><a href="{{ url('/finance-department/expenditure/add-expenditure') }}">Add Expenditure</a>
                            </li>
                        @endcan
                        @can('view_expenditure')
                            <li><a href="{{ url('/finance-department/expenditure/view-expenditure') }}">View Expenditure</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
        </ul>
    @endif
</div>


{{-- <li>
                    <a href="{{ url('/finance-department/income/invoice-setting') }}" class="has-submenu">
                        <div class="sidebar-sub-icon">
                            <i class="fa-regular fa-circle-check"></i>
                        </div>
                        Invoice Setting
                    </a>
                </li> --}}
{{-- <li>
            <a class="{{ request()->routeIs('view-user') ? 'dashboard_active' : '' }}"
                href="{{ url('/admin-department/view-user') }}"><i class="sidebar-item-icon fa-solid fa-user-plus"></i>
                <span class="nav-label">View User</span>
            </a>
        </li> --}}
