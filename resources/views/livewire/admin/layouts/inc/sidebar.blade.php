<div>
    <div class="vertical-menu">
        <div data-simplebar class="h-100">
            <div id="sidebar-menu">
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title" key="t-menu">Menu</li>

                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                            <i class="bx bx-home-circle"></i>
                            <span key="t-dashboard">Dashboard</span>
                        </a>
                    </li>

                    @if (isAdminPermitted('settings_manage'))
                        <li class="menu-title" key="t-setting">My Sites</li>
                        <li>
                            <a href="{{ route('admin.mysites') }}" class="waves-effect">
                                <i class="bx bx-wrench"></i>
                                <span key="t-chat">My Sites</span>
                            </a>
                        </li>
                    @endif

                    @if (isAdminPermitted('users_manage') || isAdminPermitted('admins_manage'))
                        <li class="menu-title" key="t-user">User</li>
                    @endif

                    @if (isAdminPermitted('admins_manage'))
                        <li>
                            <a href="{{ route('admin.allAdmins') }}" class="waves-effect">
                                <i class="bx bx-user"></i>
                                <span key="t-chat">All Admins</span>
                            </a>
                        </li>
                    @endif

                    @if (isAdminPermitted('settings_manage'))
                        <li class="menu-title" key="t-setting">Setting</li>
                        <li>
                            <a href="#" class="waves-effect">
                                <i class="bx bx-wrench"></i>
                                <span key="t-chat">Settings</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
