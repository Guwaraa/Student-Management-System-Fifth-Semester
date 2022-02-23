<div class="main">
    <nav class="navbar navbar-expand navbar-light navbar-bg" id="navbar">
        <a class="sidebar-toggle d-flex">
            <i class="hamburger align-self-center"></i>
        </a>
        <form class="d-none d-sm-inline-block">
            <div class="input-group input-group-navbar">
                <input type="text" class="form-control" placeholder="Search…" aria-label="Search">
                <button class="btn" type="button">
                    <i class="align-middle" data-feather="search"></i>
                </button>
            </div>
        </form>

        <div class="navbar-collapse collapse">
            <ul class="navbar-nav navbar-align">
                <li class="nav-item dropdown">

                    <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown">
                        <div class="position-relative">
                            <i class="align-middle" data-feather="bell"></i>
                            <span class="indicator" style="background-color:orangered">!</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-toggle="dropdown">
                        <div class="position-relative">
                            <i class="align-middle" data-feather="message-square"></i>
                            <span class="indicator" style="background-color:orangered">!</span>

                        </div>
                    </a>

                </li>
                <li class="nav-item dropdown">
                    @if (auth()->check())
                        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                            <img src="{{ asset('profileimage/' . auth()->user()->image) }}"
                                class="avatar img-fluid rounded mr-1"
                                alt="UserPic" /><span>{{ auth()->user()->full_name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item fas fa-id-card"><i class="align-middle mr-1"></i>
                                <span>{{ auth()->user()->Std_Id }}</span></a>
                            <a class="dropdown-item far fa-envelope"><i class="align-middle mr-1"></i>
                                <span>{{ auth()->user()->email }}</span></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('Profile.index') }}"><i class="align-middle mr-1"
                                    data-feather="user"></i>
                                Profile</a>
                            <a class="dropdown-item" href="{{ route('Setting.index') }}"><i class="align-middle mr-1"
                                    data-feather="settings"></i>
                                Settings & Privacy</a>
                            <a class="dropdown-item" href="#"><i class="align-middle mr-1"
                                    data-feather="help-circle"></i> Help Center</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('auth.logout') }}">Log out</a>
                        </div>
                    @endif
                </li>
            </ul>
        </div>
    </nav>
