<div id="sidebar-collapse">
    <div class="admin-block d-flex">
        <div>
            <img src="{{ asset('/assets/img/admin-avatar.png') }}" width="45px" />
        </div>
        <div class="admin-info">
            <div class="font-strong">Finance Depart...</div><small>Administrator</small>
        </div>
    </div>
    <ul class="side-menu metismenu">
        <li>
            <a class="{{ request()->routeIs('auth-finance.dashboard') ? 'dashboard_active' : '' }}"
                href="{{ url('/auth/finance/dashboard') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                <span class="nav-label">Dashboard</span>
            </a>
        </li>
        <li class="heading">Finance Department</li>
        <li>
            <a class="{{ request()->routeIs('auth-finance.expenditure*') ? 'dashboard_active' : '' }}" href=""><i
                    class="sidebar-item-icon fas  fa-hands-helping"></i>
                <span class="nav-label">Expenditure</span><i class="fa fa-angle-left arrow"></i></a>
            <ul class="nav-2-level collapse">
                <li>
                    <a href="{{ url('/auth/finance/expenditure/add-expenditure') }}">
                        <div class="sidebar-sub-icon">
                            <i class="fa-regular fa-circle-check"></i>
                        </div>
                        Add Expenditure
                    </a>
                </li>
                <li>
                    <a href="{{ url('/auth/finance/expenditure/view-expenditure') }}">
                        <div class="sidebar-sub-icon">
                            <i class="fa-regular fa-circle-check"></i>
                        </div>
                        View Expenditure
                    </a>
                </li>

            </ul>
        </li>


    </ul>
    </ul>
</div>
