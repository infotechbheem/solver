<div id="sidebar-collapse">
    <div class="admin-block d-flex">
        <div>
            <img src="{{ asset('../assets/img/admin-avatar.png') }}" width="45px" />
        </div>
        <div class="admin-info">
            <div class="font-strong">Human Resource</div><small>Administrator</small>
        </div>
    </div>
    <ul class="side-menu metismenu">
        <li>
            <a class="{{ request()->routeIs('auth-human-resource.dashboard') ? 'dashboard_active' : '' }}"
                href="{{ url('/auth/human-resource/dashboard') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                <span class="nav-label">Dashboard</span>
            </a>
        </li>

        <li class="heading">HR Department</li>
        <li>
            <a class="{{ request()->routeIs('auth-human-resource.our-team*') ? 'dashboard_active' : '' }}"
                href=""><i class="sidebar-item-icon fas  fa-hands-helping"></i>
                <span class="nav-label">Our Team</span><i class="fa fa-angle-left arrow"></i></a>
            <ul class="nav-2-level collapse">
                <li>
                    <a href="{{ url('/auth/human-resource/team/team-member-registration') }}">
                        <div class="sidebar-sub-icon">
                            <i class="fa-regular fa-circle-check"></i>
                        </div>
                        Team Registration
                    </a>
                </li>
                <li>
                    <a href="{{ url('/auth/human-resource/team/all-team-member') }}">
                        <div class="sidebar-sub-icon">
                            <i class="fa-regular fa-circle-check"></i>
                        </div>
                        All Team Member
                    </a>
                </li>
                <li>
                    <a href="{{ url('/auth/human-resource/team/view-attendance') }}">
                        <div class="sidebar-sub-icon">
                            <i class="fa-regular fa-circle-check"></i>
                        </div>
                        View Attendance
                    </a>
                </li>
            </ul>
        </li>


    </ul>
</div>
