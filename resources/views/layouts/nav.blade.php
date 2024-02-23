<!-- Header -->
<div class="header">
    <style>
    .transition { 
    transition: opacity 1s; 
    } 
    .removed { 
    opacity: 0; 
    }
    .added{
    opacity: 1; 
    }
    </style>
    <!-- Logo -->
    <div class="header-left ">
        <a href="index.html" class="logo">
            <img class="ms-4" src="{{ asset('/img/logo.png') }}" alt="Logo">
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
    {{-- <div class="top-nav-search">
        <form>
            <input type="text" class="form-control" placeholder="Search here">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div> --}}
    <!-- /Search Bar -->

    <!-- Mobile Menu Toggle -->
    <a class="mobile_btn" id="mobile_btn">
        <i class="fas fa-bars"></i>
    </a>
    <!-- /Mobile Menu Toggle -->

    <!-- Header Right Menu -->
    <ul class="nav user-menu">
        <!-- Notifications -->
        <li class="nav-item dropdown noti-dropdown me-2 btn-group dropstart">
            <a href="#" id="notification-icon" class=" nav-link header-nav-list" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-regular fa-bell"></i>
                @if ($unreadNotificationCount > 0)
                    <span id="notification-badge" style="top: 10%;"
                        class="badge rounded-pill badge-notification bg-danger toggle-badge">{{ $unreadNotificationCount }}</span>
                @endif
            </a>
            <div class="dropdown-menu animated notifications rounded-3 mt-4" id="notificationModal"
                data-popper-placement="bottom-start">
                <div class="topnav-dropdown-header">
                    <span class="notification-title fw-bolder"><i class="fa-regular fa-bell fa-lg"></i> Notifikasi
                    </span>
                    <button type="button" id="notification-button" class="clear-noti btn btn-link mt-1"> Bersihkan </button>
                </div>
                <div class="noti-content">
                    <div id="no-data-element" class="align-items-center text-center mt-5 transition d-none">
                        <img class="img-fluid" width="130" height="130"
                            src="{{ asset('/img/nodata.png') }}" alt="">
                        <p class="text-dark ">Belum ada notifikasi terbaru</p>
                    </div>
                    <ul class="notification-list transition">
                        @forelse($notifications as $notification)
                            <li class="notification-message" id="notification-list">
                                <form action="{{route('notification.update',$notification->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="none-button text-start p-1" type="submit" >
                                        <div class="media d-flex ms-2">
                                            <span class="avatar avatar-sm flex-shrink-0">
                                                @if ($notification->sender->google_id == 1 && $notification->sender->foto != null)
                                                    <img class="avatar-img rounded-circle" alt="User Image"
                                                        src="{{ $notification->sender->foto }}">
                                                @elseif($notification->sender->foto != null)
                                                    <img class="avatar-img rounded-circle" alt="User Image"
                                                        src="{{ asset('storage/' . $notification->sender->foto) }}">
                                                @elseif($notification->sender->foto == null && $notification->sender->gender == 'male')
                                                    <img class="avatar-img rounded-circle" alt="User Image"
                                                        src="{{ asset('img/male.jpg') }}">
                                                @elseif($notification->sender->foto == null && $notification->sender->gender == 'famale')
                                                    <img class="avatar-img rounded-circle" alt="User Image"
                                                        src="{{ asset('img/famale.jpg') }}">
                                                @else
                                                    <img class="avatar-img rounded-circle" alt="User Image"
                                                        src="{{ asset('img/male.jpg') }}">
                                                @endif
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span
                                                        class="noti-title fw-bolder">{{ $notification->sender->name }}</span>
                                                    {{ $notification->message }}</p>
                                                <p class="noti-time"><span
                                                        class="notification-time">{{ \Carbon\Carbon::parse($notification->created_at)->locale('id_ID')->diffForHumans() }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </button>
                                </form>
                            </li>
                        @empty
                            <div class="align-items-center text-center mt-5">
                                <img class="img-fluid" width="130" height="130"
                                    src="{{ asset('/img/nodata.png') }}" alt="">
                                <p class="text-dark ">Belum ada notifikasi terbaru</p>
                            </div>
                        @endforelse
                    </ul>
                </div>
                {{-- <div class="topnav-dropdown-footer">
                    <a href="#">View all Notifications</a>
                </div> --}}
            </div>
        </li>
        <!-- /Notifications -->
        <li class="nav-item zoom-screen me-2">
            <a href="#" class="nav-link header-nav-list win-maximize">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="m15 3l2.3 2.3l-2.89 2.87l1.42 1.42L18.7 6.7L21 9V3zM3 9l2.3-2.3l2.87 2.89l1.42-1.42L6.7 5.3L9 3H3zm6 12l-2.3-2.3l2.89-2.87l-1.42-1.42L5.3 17.3L3 15v6zm12-6l-2.3 2.3l-2.87-2.89l-1.42 1.42l2.89 2.87L15 21h6z" />
                </svg>
            </a>
        </li>
        <!-- User Menu -->
        <li class="nav-item dropdown has-arrow new-user-menus">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <div class="user-img">
                    @if (Auth::user()->foto != null && Auth::user()->google_id == 1)
                        <img class="rounded-circle" src="{{ auth()->user()->foto }}" width="31" alt="1">
                    @elseif(Auth::user()->foto != null)
                        <img class="rounded-circle" src="{{ asset('/storage/' . auth()->user()->foto) }}"
                            width="31" alt="2">
                    @elseif(auth()->user()->foto == null && auth()->user()->gender == 'male')
                        <img class="rounded-circle" src="{{ asset('/img/male.jpg') }}" width="31" alt="3">
                    @elseif(auth()->user()->foto == null && auth()->user()->gender == 'famale')
                        <img class="rounded-circle" src="{{ asset('/img/famale.jpg') }}" width="31"
                            alt="3">
                    @else
                        <img class="rounded-circle" src="{{ asset('/img/male.jpg') }}" width="31"
                            alt="3">
                    @endif
                    <div class="user-text">
                        <h6>{{ auth()->user()->name }}</h6>
                        <p class="text-muted mb-0">
                            @if (auth()->user()->role == 'theacer')
                                Pengajar
                            @else
                                Murid
                            @endif
                        </p>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm">
                        @if (Auth::user()->foto != null && Auth::user()->google_id == 1)
                            <img src="{{ auth()->user()->foto }}" alt="User Image"class="avatar-img rounded-circle">
                        @elseif(Auth::user()->foto != null)
                            <img src="{{ asset('/storage/' . auth()->user()->foto) }}"
                                alt="User Image"class="avatar-img rounded-circle">
                        @elseif(auth()->user()->foto == null && auth()->user()->gender == 'male')
                            <img src="{{ asset('/img/male.jpg') }}"
                                alt="User Image"class="avatar-img rounded-circle">
                        @elseif(auth()->user()->foto == null && auth()->user()->gender == 'famale')
                            <img src="{{ asset('/img/famale.jpg') }}"
                                alt="User Image"class="avatar-img rounded-circle">
                        @else
                            <img src="{{ asset('/img/male.jpg') }}"
                                alt="User Image"class="avatar-img rounded-circle">
                        @endif
                    </div>
                    <div class="user-text">
                        <h6>{{ auth()->user()->name }}</h6>
                        <p class="text-muted mb-0">
                            @if (auth()->user()->role == 'theacer')
                                Pengajar
                            @else
                                Murid
                            @endif
                        </p>
                    </div>
                </div>
                <a class="dropdown-item" href="profile.html">Profile</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </div>
        </li>
        <!-- /User Menu -->

    </ul>
    <!-- /Header Right Menu -->

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- jQuery -->
<script src="{{ asset('/js/jquery-3.7.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $("#notification-button").click(function() {
            const badge = document.getElementById('notification-badge');
            var icon = document.querySelector('#notification-icon');
            var notificationList = document.querySelector('#notification-list');
            var noDataElement = document.querySelector('#no-data-element');
            $.ajax({
                type: "PATCH",
                url: "{{ route('read.all.notification') }}",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.success) {
                        icon.click();
                        notificationList.classList.add("d-none"); 
                        noDataElement.classList.remove('d-none');
                        noDataElement.classList.add('added');
                        badge.style.display = "none";
                    }
                },
                error: function(xhr, status, error) {
                    badge.style.display = "block";
                }
            });
        });
    });
</script>
<!-- /Header -->
