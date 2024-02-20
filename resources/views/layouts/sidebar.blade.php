<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Selamat Datang di Educlass!</span>
                </li>
                <li class="{{ request()->is('home') ? 'active' : '' }}">
                    <a href="/home"><i class="fa-solid fa-house"></i> <span> Beranda</span></a>
                </li>
                <li class="submenu">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256"><path fill="currentColor" d="m231.65 194.55l-33.19-157.8a16 16 0 0 0-19-12.39l-46.81 10.06a16.08 16.08 0 0 0-12.3 19l33.19 157.8A16 16 0 0 0 169.16 224a16.25 16.25 0 0 0 3.38-.36l46.81-10.06a16.09 16.09 0 0 0 12.3-19.03M136 50.15v-.09l46.8-10l3.33 15.87L139.33 66Zm6.62 31.47l46.82-10.05l3.34 15.9L146 97.53Zm6.64 31.57l46.82-10.06l13.3 63.24l-46.82 10.06ZM216 197.94l-46.8 10l-3.33-15.87l46.8-10.07l3.33 15.85zM104 32H56a16 16 0 0 0-16 16v160a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16M56 48h48v16H56Zm0 32h48v96H56Zm48 128H56v-16h48z"/></svg>
                        <span> Materi</span> <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        @forelse ($materials as $materi)
                            <li><a href="blog.html">{{ $materi->name }}</a></li>
                        @empty
                        <div class="align-items-center text-center me-2">
                            <img class="img-fluid"
                                src="{{ asset('/img/nodata.png') }}" width="80" alt="">
                            <p class="text-secondary">Belum ada materi</p>
                        </div>
                        @endforelse
                    </ul>
                </li>
                <li class="submenu {{ request()->routeIs('task.show') ? 'active' : '' }}">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16"><g fill="currentColor"><path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5zM3 3H2v1h1z"/><path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1z"/><path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5zM2 7h1v1H2zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm1 .5H2v1h1z"/></g></svg>
                        <span> Tugas</span> <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        @forelse ($tasks as $task)
                            <li><a href="{{route('task.show',$task->id)}}" class="{{ request()->is('task/'.$task->id) ? 'active' : '' }}">{{ $task->name }}</a></li>
                        @empty
                        <div class="align-items-center text-center me-2">
                            <img class="img-fluid"
                                src="{{ asset('/img/nodata.png') }}" width="80" alt="">
                            <p class="text-secondary">Belum ada tugas</p>
                        </div>
                        @endforelse
                    </ul>
                </li>
                @if (Auth::check() && auth()->user()->role == 'theacer')
                    <li class="submenu">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 14 14"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M9.5 1.5H11a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-10a1 1 0 0 1 1-1h1.5"/><rect width="5" height="2.5" x="4.5" y=".5" rx="1"/><path d="m5.5 6.5l3 3m0-3l-3 3"/></g></svg>
                            <span> Belum dinilai </span> <span class="menu-arrow"></span>
                        </a>
                        <ul>
                            @forelse ($notRated as $n)
                                <li><a href="blog.html">{{ $n->user->name }}</a></li>
                            @empty
                            <div class="align-items-center text-center me-2">
                                <img class="img-fluid"
                                    src="{{ asset('/img/nodata.png') }}" width="80" alt="">
                                <p class="text-secondary">Tidak ada tugas yang belum dinilai</p>
                            </div>
                            @endforelse
                        </ul>
                    </li>
                @elseif(Auth::check() && auth()->user()->role == 'student')
                    <li class="submenu {{ request()->routeIs('task.show') ? 'active' : '' }}">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 14 14"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M9.5 1.5H11a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-10a1 1 0 0 1 1-1h1.5"/><rect width="5" height="2.5" x="4.5" y=".5" rx="1"/><path d="m5.5 6.5l3 3m0-3l-3 3"/></g></svg>
                            <span> Belum dikumpulkan </span> <span class="menu-arrow"></span>
                        </a>
                        <ul>
                            @forelse ($notCollect as $n)
                                <li><a class="{{ request()->is('task/'.$n->task->id) ? 'active' : '' }}" href="{{route('task.show',$n->task->id)}}">{{ $n->task->name }}</a></li>
                            @empty
                            <div class="align-items-center text-center me-2">
                                <img class="img-fluid"
                                    src="{{ asset('/img/nodata.png') }}" width="80" alt="">
                                <p class="text-secondary">Tidak ada tugas yang belum dikumpulkan</p>
                            </div>
                            @endforelse
                        </ul>
                    </li>
                @endif
                <li class="submenu {{ request()->routeIs('classes.show') ? 'active' : '' }}">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M1.637 1.637C.732 1.637 0 2.369 0 3.273v17.454c0 .904.732 1.636 1.637 1.636h20.726c.905 0 1.637-.732 1.637-1.636V3.273c0-.904-.732-1.636-1.637-1.636zm.545 2.181h19.636v16.364h-2.726v-1.09h-4.91v1.09h-12zM12 8.182a1.636 1.636 0 1 0 0 3.273a1.636 1.636 0 1 0 0-3.273m-4.363 1.91c-.678 0-1.229.55-1.229 1.226a1.228 1.228 0 0 0 2.455 0c0-.677-.549-1.226-1.226-1.226m8.726 0a1.227 1.227 0 1 0 0 2.453a1.227 1.227 0 0 0 0-2.453M12 12.545c-1.179 0-2.413.401-3.148 1.006a4.136 4.136 0 0 0-1.215-.188c-1.314 0-2.729.695-2.729 1.559v.896h14.184v-.896c0-.864-1.415-1.559-2.729-1.559c-.41 0-.83.068-1.215.188c-.735-.605-1.969-1.006-3.148-1.006" />
                        </svg>
                        <span> Kelas</span> <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        @forelse ($classes as $class)
                            <li><a href="{{route('classes.show',$class->id)}}" class="{{ request()->is('classes/'.$class->id) ? 'active' : '' }}">{{ $class->name }}</a></li>
                        @empty
                        <div class="align-items-center text-center me-2">
                            <img class="img-fluid"
                                src="{{ asset('/img/nodata.png') }}" width="80" alt="">
                            <p class="text-secondary">Belum ada kelas</p>
                        </div>
                        @endforelse
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
