<div>
    <header id="page-topbar" style="background: #0F1932; color: white;">
        <div class="container">
            <div class="navbar-header">
                <div class="d-flex">
                    <span class="ms-3">
                        <a href="/" class="d-block text-center">
                            <img src="{{ asset(setting()->logo) }}" alt="" height="18" class="auth-logo-dark">
                        </a>
                    </span>
                </div>

                <div class="d-flex">
                    @if (user())
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" style="background: #0F1932; color: white;" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="{{ asset(user()->avatar) }}" style="height: 27px; width: 27px;" alt="Header Avatar">
                            <span class="ms-1" key="t-henry">{{ user()->first_name }} {{ user()->last_name }}</span>
                            <i class="mdi mdi-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" style="">
                            <a class="dropdown-item" href="{{ route('user.dashboard') }}"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">My Account</span></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{ route('user.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                            <form id="logout-form" style="display: none;" method="POST" action="{{ route('user.logout') }}">
                                @csrf
                            </form>
                        </div>
                    </div>
                    @else
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" style="background: #0F1932; color: white;" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="ms-1" key="t-henry">Account</span>
                                <i class="mdi mdi-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" style="">
                                <a class="dropdown-item" href="{{ route('login') }}">Sign In</span></a>
                                <a class="dropdown-item" href="{{ route('register') }}">Sign Up</span></a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </header>
</div>
