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
                    <a class="nav-link-toggle d-none d-sm-inline-block" href="{{ route('login') }}">
                        <img src="{{ asset('assets/img/avatars/LOGIN.png') }}" class="avatar img-fluid rounded mr-1"
                            alt="Login" /> <span class="text-dark" id="loginbutton"></span>
                    </a>
                    <div>

                    </div>
                </li>
            </ul>
        </div>
    </nav>
