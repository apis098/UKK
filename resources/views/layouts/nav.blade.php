<!-- Header -->
<div class="header">

    <!-- Logo -->
    <div class="header-left ">
        <a href="index.html" class="logo">
            <img class="ms-5" src="{{ asset('/img/logo.png') }}"  alt="Logo">
        </a>
        <a href="index.html" class="logo logo-small">
            <img src="{{ asset('/img/logo-small.png') }}" alt="Logo" width="30" height="30">
        </a>
    </div>
    <!-- /Logo -->

    <div class="menu-toggle">
        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fas fa-bars"></i>
        </a>
    </div>

    <!-- Search Bar -->
    <div class="top-nav-search">
        <form>
            <input type="text" class="form-control" placeholder="Search here">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <!-- /Search Bar -->

    <!-- Mobile Menu Toggle -->
    <a class="mobile_btn" id="mobile_btn">
        <i class="fas fa-bars"></i>
    </a>
    <!-- /Mobile Menu Toggle -->

    <!-- Header Right Menu -->
    <ul class="nav user-menu">
        <!-- Notifications -->
        <li class="nav-item dropdown noti-dropdown me-2">
            <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown" data-bs-target="#notificationModal" aria-haspopup="true" aria-expanded="false">
                <i class="fa-regular fa-bell"></i>
            </a>
            <div class="dropdown-menu animated notifications" id="notificationModal" style="position: absolute; inset: 0px 0px auto auto; margin:0px; transform:translate3d(0px,42px,0px);" data-popper-placement="bottom-start">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                    <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        <li class="notification-message">
                            <a href="#">
                                <div class="media d-flex">
                                    <span class="avatar avatar-sm flex-shrink-0">
                                        <img class="avatar-img rounded-circle" alt="User Image"
                                            src="{{ asset('/img/profiles/avatar-02.jpg') }}">
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">Carlson Tech</span> has
                                            approved <span class="noti-title">your estimate</span></p>
                                        <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="#">
                                <div class="media d-flex">
                                    <span class="avatar avatar-sm flex-shrink-0">
                                        <img class="avatar-img rounded-circle" alt="User Image"
                                            src="{{ asset('/img/profiles/avatar-11.jpg') }}">
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">International Software
                                                Inc</span> has sent you a invoice in the amount of <span
                                                class="noti-title">$218</span></p>
                                        <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="#">
                                <div class="media d-flex">
                                    <span class="avatar avatar-sm flex-shrink-0">
                                        <img class="avatar-img rounded-circle" alt="User Image"
                                            src="{{ asset('/img/profiles/avatar-17.jpg') }}">
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">John Hendry</span> sent a
                                            cancellation request <span class="noti-title">Apple iPhone XR</span></p>
                                        <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="#">
                                <div class="media d-flex">
                                    <span class="avatar avatar-sm flex-shrink-0">
                                        <img class="avatar-img rounded-circle" alt="User Image"
                                            src="{{ asset('/img/profiles/avatar-13.jpg') }}">
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">Mercury Software Inc</span>
                                            added a new product <span class="noti-title">Apple MacBook Pro</span></p>
                                        <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="#">View all Notifications</a>
                </div>
            </div>
        </li>
        <!-- /Notifications -->
        <li class="nav-item zoom-screen me-2">
            <a href="#" class="nav-link header-nav-list win-maximize">
                <i class="fa-solid fa-clipboard-list"></i>
            </a>
        </li>
        <li class="nav-item zoom-screen me-2">
            <a href="#" class="nav-link header-nav-list win-maximize">
                <i class="fa-solid fa-book-bookmark"></i>
            </a>
        </li>
        <li class="nav-item zoom-screen me-2">
            <a href="#" class="nav-link header-nav-list win-maximize">
                <i class="fa-solid fa-link"></i>
            </a>
        </li>
        <!-- User Menu -->
        <li class="nav-item dropdown has-arrow new-user-menus">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <div class="user-img">
                    @if(Auth::user()->foto != null && Auth::user()->google_id == 1)
                        <img class="rounded-circle" src="{{auth()->user()->foto}}" width="31" alt="profile">
                    @elseif(Auth::user()->foto != null && Auth::user()->google_id == 0)
                        <img class="rounded-circle" src="{{ asset('/storage'. auth()->user()->foto) }}" width="31" alt="Ryan Taylor">
                    @else
                        <img class="rounded-circle" src="{{ asset('/img/male.jpg') }}" width="31" alt="Ryan Taylor">
                    @endif
                    <div class="user-text">
                        <h6>{{auth()->user()->name}}</h6>
                        <p class="text-muted mb-0">{{auth()->user()->role}}</p>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm">
                        @if(Auth::user()->foto != null && Auth::user()->google_id == 1)
                            <img src="{{ auth()->user()->foto }}" alt="User Image"class="avatar-img rounded-circle">
                        @elseif(Auth::user()->foto != null && Auth::user()->google_id == 0)
                            <img src="{{ asset('/storage'.auth()->user()->foto) }}" alt="User Image"class="avatar-img rounded-circle">
                        @else
                            <img src="{{ asset('/img/male.jpg') }}" alt="User Image"class="avatar-img rounded-circle">
                        @endif
                    </div>
                    <div class="user-text">
                        <h6>{{auth()->user()->name}}</h6>
                        <p class="text-muted mb-0">{{auth()->user()->role}}</p>
                    </div>
                </div>
                <a class="dropdown-item" href="profile.html">My Profile</a>
                <a class="dropdown-item" href="inbox.html">Inbox</a>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </div>
        </li>
        <!-- /User Menu -->

    </ul>
    <!-- /Header Right Menu -->
    
</div>
<!-- /Header -->

