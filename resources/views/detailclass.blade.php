@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="row mb-2">
                <div class="col-md-6">
                    <h4 class="mt-3">Kelas {{ $class->name }}</h4>
                </div>
                <div class="col-md-6 text-end ">
                    @if (auth()->user()->role == 'theacer')
                        <div class="btn-group dropstart">
                            <a data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                class="btn btn-primary rounded-circle p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2" />
                                </svg>
                            </a>
                            <div class="dropdown-menu me-2 pt-2 pb-2 text-center">
                                <a class="dropdown-item align-items-center" href="{{ route('task.form', $class->id) }}"><svg
                                        class="mb-1" xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        viewBox="0 0 14 14">
                                        <g fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path
                                                d="M9.5 1.5H11a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-10a1 1 0 0 1 1-1h1.5" />
                                            <rect width="5" height="2.5" x="4.5" y=".5" rx="1" />
                                            <path d="M7 6v4m2-2H5" />
                                        </g>
                                    </svg> Tambah Tugas</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item align-items-center"
                                    href="{{ route('materials.form', $class->id) }}"><svg class="mb-1"
                                        xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        viewBox="0 0 24 24">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"
                                            d="M8 3H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h6M8 3v9l3-3l3 3V3M8 3h6m0 0h4a2 2 0 0 1 2 2v7m-1 4v3m0 3v-3m0 0h3m-3 0h-3" />
                                    </svg> Tambah Materi</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Overview Section -->
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Tugas</h6>
                                    <h3>{{ $tasks->count() }}</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="{{ asset('/img/icons/student-icon-01.svg') }}" alt="Dashboard Icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Materi</h6>
                                    <h3>{{ $materials->count() }}</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="{{ asset('/img/icons/teacher-icon-02.svg') }}" alt="Dashboard Icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Anggota</h6>
                                    <h3>{{ $member->count() }}</h3>
                                </div>
                                <div class="db-icon">
                                    <img class="img-fluid" src="{{ asset('/img/member.png') }}" alt="Dashboard Icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Belum di nilai</h6>
                                    <h3>{{ $collections->count() }}</h3>
                                </div>
                                <div class="db-icon">
                                    <img class="img-fluid" src="{{ asset('/img/task-value.png') }}" alt="Dashboard Icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Overview Section -->
            {{-- tabs --}}
            <div class="card bg-white">
                <div class="card-header">
                    <h5 class="card-title">Mata Pelajaran : {{ $class->lesson }}</h5>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                        <li class="nav-item"><a class="nav-link active" href="#bottom-justified-tab1"
                                data-bs-toggle="tab"><i class="fa-solid fa-list-check"></i> Tugas</a></li>
                        <li class="nav-item"><a class="nav-link" href="#bottom-justified-tab2" data-bs-toggle="tab"><i
                                    class="fa-solid fa-book"></i> Materi</a></li>
                        <li class="nav-item"><a class="nav-link" href="#bottom-justified-tab4" data-bs-toggle="tab"><svg
                                    class="mb-1" xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                    viewBox="0 0 32 32">
                                    <path fill="currentColor"
                                        d="M30 20a6 6 0 1 0-10 4.46V32l4-1.894L28 32v-7.54A5.98 5.98 0 0 0 30 20m-4 8.84l-2-.947l-2 .947v-3.19a5.888 5.888 0 0 0 4 0ZM24 24a4 4 0 1 1 4-4a4.005 4.005 0 0 1-4 4" />
                                    <path fill="currentColor"
                                        d="M25 5h-3V4a2.006 2.006 0 0 0-2-2h-8a2.006 2.006 0 0 0-2 2v1H7a2.006 2.006 0 0 0-2 2v21a2.006 2.006 0 0 0 2 2h9v-2H7V7h3v3h12V7h3v5h2V7a2.006 2.006 0 0 0-2-2m-5 3h-8V4h8Z" />
                                </svg> {{auth()->user()->role == 'theacer' ? 'Belum di nilai' : 'Belum Dikerjakan'}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#bottom-justified-tab3" data-bs-toggle="tab"><i
                                    class="fa-solid fa-users"></i> Anggota</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="bottom-justified-tab1">
                            <!-- Page Header -->
                            <div class="page-header">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="page-sub-header">
                                            <h3 class="page-title">Daftar Tugas</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="top-nav-search" style="margin-left: -7%;margin-top:-5%;">
                                            <form>
                                                <input type="text" class="form-control task-search"
                                                    placeholder="Cari Tugas..">
                                                <button class="btn" type="submit"><i
                                                        class="fas fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Page Header -->
                            <div class="row pe-3 ps-3" id="task-element">
                                @foreach ($tasks as $task)
                                    <a href="{{ route('task.show', $task->id) }}"
                                        class="custom-card pt-2 pb-2 bg-light mb-2 d-flex align-items-center scale">
                                        <div class="col-lg-9">
                                            <div class="grid-container">
                                                <div class="db-widgets d-flex justify-content-beetwen align-items-center">
                                                    <div class="left-icon p-1 me-3">
                                                        <img class="ms-1"
                                                            src="{{ asset('/img/icons/student-icon-01.svg') }}"
                                                            alt="Dashboard Icon">
                                                    </div>
                                                    <div class="db-info mt-2">
                                                        <h5 style="margin-bottom:0; ">{{ $task->name }}</h5>
                                                        <h6>{{ $task->description }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="grid-container text-end">
                                                <small
                                                    class="text-secondary">{{ \Carbon\Carbon::parse($task->created_at)->locale('id_ID')->diffForHumans() }}</small>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                                @forelse($tasks as $task)
                                    {{--  --}}
                                @empty
                                    <div class="align-items-center text-center mt-2">
                                        <img class="img-fluid" width="230" height="230"
                                            src="{{ asset('/img/nodata.png') }}" alt="">
                                        <p class="text-dark fw-bolder">Belum ada tugas</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="tab-pane" id="bottom-justified-tab2">
                            <!-- Page Header -->
                            <div class="page-header">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="page-sub-header">
                                            <h3 class="page-title">Daftar Materi</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="top-nav-search" style="margin-left: -7%;margin-top:-5%;">
                                            <form>
                                                <input type="text" class="form-control material-search"
                                                    placeholder="Cari Materi..">
                                                <button class="btn" type="submit"><i
                                                        class="fas fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row pe-3 ps-3" id="material-element">
                                @foreach ($materials as $data)
                                    <a href="{{route('materials.show', $data->id)}}"
                                        class="custom-card pt-2 pb-2 bg-light mb-2 d-flex align-items-center scale">
                                        <div class="col-lg-9">
                                            <div class="grid-container">
                                                <div class="db-widgets d-flex justify-content-beetwen align-items-center">
                                                    <div class="left-icon me-3 p-1 text-center  ">
                                                        <img class="ms-1"
                                                            src="{{ asset('/img/icons/teacher-icon-02.svg') }}"
                                                            alt="Dashboard Icon">
                                                    </div>
                                                    <div class="db-info mt-2">
                                                        <h5 style="margin-bottom:0; ">{{ $data->name }}</h5>
                                                        <h6> {{ $data->description }}</span>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="grid-container text-end">
                                                <small
                                                    class="text-secondary">{{ \Carbon\Carbon::parse($data->created_at)->locale('id_ID')->diffForHumans() }}</small>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            @forelse($materials as $data)
                                {{--  --}}
                            @empty
                                <div class="align-items-center text-center mt-2">
                                    <img class="img-fluid" width="230" height="230"
                                        src="{{ asset('/img/nodata.png') }}" alt="">
                                    <p class="text-dark fw-bolder">Belum ada materi</p>
                                </div>
                            @endforelse
                        </div>
                        <div class="tab-pane" id="bottom-justified-tab3">
                            <!-- Page Header -->
                            <div class="page-header">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="page-sub-header">
                                            <h3 class="page-title">Daftar Anggota</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="top-nav-search" style="margin-left: -7%;margin-top:-5%;">
                                            <form>
                                                <input type="text" class="form-control member-search"
                                                    placeholder="Cari anggota..">
                                                <button class="btn" type="submit"><i
                                                        class="fas fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Page Header -->
                            <div class="table-responsive">
                                <table class="table border-0 star-student table-hover table-center mb-0  table-striped">
                                    <thead class="student-thread">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Tanggal lahir</th>
                                            <th>Jenis kelamin</th>
                                            <th class="text-end">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="member-list">
                                        @foreach ($member as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        @if ($row->foto != null && $row->google_id == 1)
                                                            <a href="student-details.html"
                                                                class="avatar avatar-sm me-2"><img
                                                                    class="avatar-img rounded-circle"
                                                                    src="{{ $row->foto }}" alt="User Image">
                                                            </a>
                                                        @elseif($row->foto != null)
                                                            <a href="student-details.html"
                                                                class="avatar avatar-sm me-2"><img
                                                                    class="avatar-img rounded-circle"
                                                                    src="{{ asset('/storage/' . $row->foto) }}"
                                                                    alt="User Image">
                                                            </a>
                                                        @elseif($row->foto == null && $row->gender == 'male')
                                                            <a href="student-details.html"
                                                                class="avatar avatar-sm me-2"><img
                                                                    class="avatar-img rounded-circle"
                                                                    src="{{ asset('/img/male.jpg') }}" alt="User Image">
                                                            </a>
                                                        @elseif($row->foto == null && $row->gender == 'famale')
                                                            <a href="student-details.html"
                                                                class="avatar avatar-sm me-2"><img
                                                                    class="avatar-img rounded-circle"
                                                                    src="{{ asset('/img/famale.jpg') }}"
                                                                    alt="User Image">
                                                            </a>
                                                        @else
                                                            <a href="student-details.html"
                                                                class="avatar avatar-sm me-2"><img
                                                                    class="avatar-img rounded-circle"
                                                                    src="{{ asset('/img/male.jpg') }}" alt="User Image">
                                                            </a>
                                                        @endif
                                                        <a href="student-details.html">{{ $row->name }}</a>
                                                    </h2>
                                                </td>
                                                <td>{{ $row->email }}</td>
                                                <td>{{ $row->dateofbirth }}</td>
                                                <td>
                                                    @if ($row->male)
                                                        Laki-laki
                                                    @else
                                                        Perempuan
                                                    @endif
                                                </td>
                                                <td class="text-end">
                                                    <div class="actions ">
                                                        <a href="javascript:;" class="btn btn-sm bg-success-light me-2">
                                                            <i class="feather-eye"></i>
                                                        </a>
                                                        @if (auth()->user()->role == 'theacer')
                                                            <a href="#" class="btn btn-sm bg-danger-light"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#kick-for-class-modal-{{ $row->id }}"
                                                                title="Keluarkan Murid">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                                    height="25" viewBox="0 0 14 14">
                                                                    <g fill="none" stroke="currentColor"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <circle cx="5" cy="2.75" r="2.25" />
                                                                        <circle cx="10.25" cy="10.25" r="3.25" />
                                                                        <path
                                                                            d="m7.95 12.55l4.6-4.6M6 6.61A4.49 4.49 0 0 0 .5 11v1.5h4" />
                                                                    </g>
                                                                </svg>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="modal fade contentmodal"
                                                id="kick-for-class-modal-{{ $row->id }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content doctor-profile">
                                                        <div
                                                            class="modal-header pb-0 border-bottom-0  justify-content-end">
                                                            <button type="button" class="close-btn"
                                                                data-bs-dismiss="modal" aria-label="Close"><i
                                                                    class="feather-x-circle"></i></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('out.class', ['class_id' => $class->id, 'user_id' => $row->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <div class="delete-wrap text-center">
                                                                    <div class="del-icon"><i class="feather-x-circle"></i>
                                                                    </div>
                                                                    <h2>Apakah anda yakin ingin <br> mengeluarkan
                                                                        {{ $row->name }} dari <br> kelas
                                                                        {{ $class->name }}?</h2>
                                                                    <div class="submit-section">
                                                                        <a href="#" class="btn btn-primary"
                                                                            data-bs-dismiss="modal">Tidak</a>
                                                                        <button type="submit" class="btn btn-dark ">Ya,
                                                                            saya
                                                                            yakin</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @forelse($member as $row)
                                {{--  --}}
                            @empty
                                <div class="align-items-center text-center mt-2">
                                    <img class="img-fluid" width="230" height="230"
                                        src="{{ asset('/img/nodata.png') }}" alt="">
                                    <p class="text-dark fw-bolder">Belum ada anggota</p>
                                </div>
                            @endforelse
                        </div>
                        <div class="tab-pane" id="bottom-justified-tab4">
                            <!-- Page Header -->
                            <div class="page-header">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="page-sub-header">
                                            <h3 class="page-title">Daftar Tugas Yang Belum {{auth()->user()->role == 'theacer' ? 'Dinilai':'Dikerjakan'}}</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="top-nav-search" style="margin-left: -7%;margin-top:-5%;">
                                            <form>
                                                <input type="text" class="form-control not-rated-search"
                                                    placeholder="Cari..">
                                                <button class="btn" type="submit"><i
                                                        class="fas fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row pe-3 ps-3" id="material-not-rated">
                                @foreach ($collections as $data)
                                    <a href="{{ auth()->user()->role === 'student' ? route('task.show', $data->id) : '#' }}"
                                        data-bs-toggle="{{ auth()->user()->role === 'theacer' ? 'modal' : '' }}"
                                        data-bs-target="{{ auth()->user()->role === 'theacer' ? '#notRatedModal' . $data->id : '' }}"
                                        class="custom-card pt-2 pb-2 bg-light mb-2 d-flex align-items-center scale">
                                        <div class="col-lg-9">
                                            <div class="grid-container">
                                                <div class="db-widgets d-flex justify-content-beetwen align-items-center">
                                                    <div class="left-icon me-3 p-1 text-center">
                                                        @if ($data->user->foto != null && $data->user->google_id == 1)
                                                            <img class="img-fluid rounded-3" width="50"
                                                                src="{{ $data->user->foto }}" alt="Dashboard Icon">
                                                        @elseif($data->user->foto != null)
                                                            <img class="img-fluid rounded-3" width="50"
                                                                src="{{ asset('/storage/' . $data->user->foto) }}"
                                                                alt="Dashboard Icon">
                                                        @elseif($data->user->foto == null && $data->user->gender == 'male')
                                                            <img class="img-fluid rounded-3" width="50"
                                                                src="{{ asset('/img/male.jpg') }}" alt="Dashboard Icon">
                                                        @elseif($data->user->foto == null && $data->user->gender == 'famale')
                                                            <img class="img-fluid rounded-3" width="50"
                                                                src="{{ asset('/img/famale.jpg') }}"
                                                                alt="Dashboard Icon">
                                                        @else
                                                            <img class="img-fluid rounded-3" width="50"
                                                                src="{{ asset('/img/male.jpg') }}" alt="Dashboard Icon">
                                                        @endif
                                                    </div>
                                                    <div class="db-info mt-2">
                                                        <h5 style="margin-bottom:0; ">{{ $data->task->name }}
                                                        </h5>
                                                        <h6> {{ $data->user->name }} - {{ $data->user->email }}</span>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="grid-container text-end">
                                                <small
                                                    class="text-secondary">{{ \Carbon\Carbon::parse($data->created_at)->locale('id_ID')->diffForHumans() }}</small>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="modal fade" id="notRatedModal{{ $data->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <img class="modal-title img-thumbnail img-fluid rounded-circle me-2"
                                                        width="50" src="{{ asset('img/famale.jpg') }}"
                                                        alt="">
                                                    <h6 class="modal-title me-2" id="myLargeModalLabel">
                                                        {{ $data->user->name }} -
                                                        <small>{{ \Carbon\Carbon::parse($data->collect_at)->locale('id_ID')->diffForHumans() }}</small>
                                                    </h6>
                                                    @if ($data->status == 'collect' && $data->collect_at < $data->task->deadline)
                                                        <div class="modal-title badge badge-success badge-sm">Diserahkan
                                                        </div>
                                                    @elseif($data->status == 'collect' && $data->collect_at > $data->task->deadline)
                                                        <div class="modal-title badge badge-warning badge-sm"> Terlambat
                                                            Diserahkan</div>
                                                    @endif
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-xl-12 d-flex">
                                                        <!-- Feed Activity -->
                                                        <div class="card flex-fill comman-shadow">
                                                            <div class="card-header d-flex align-items-center">
                                                                <div class="col-lg-8 d-flex flex-column">
                                                                    <h5 class="card-title ">{{ $data->task->name }}</h5>
                                                                    <h6 class="text-success">Point
                                                                        {{ $data->point }}/{{ $data->task->default_point }}
                                                                    </h6>
                                                                    <p class="mt-2 mb-0">Lampiran yang diserahkan : </p>
                                                                </div>
                                                                <form method="POST" action="{{ route('mark.collection', $data->id) }}"enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="d-flex justify-content-end">
                                                                        <input type="number" name="point" class="form-control form-control-sm w-50 me-2">
                                                                        <button type="submit"
                                                                            class="btn btn-primary btn-sm rounded-3"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="18" height="18"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill="currentColor"
                                                                                    d="M21.04 12.13c.14 0 .27.06.38.17l1.28 1.28c.22.21.22.56 0 .77l-1 1l-2.05-2.05l1-1c.11-.11.25-.17.39-.17m-1.97 1.75l2.05 2.05L15.06 22H13v-2.06zM11 19l-2 2H5c-1.1 0-2-.9-2-2V5c0-1.1.9-2 2-2h4.18C9.6 1.84 10.7 1 12 1c1.3 0 2.4.84 2.82 2H19c1.1 0 2 .9 2 2v4l-2 2V5h-2v2H7V5H5v14zm1-16c-.55 0-1 .45-1 1s.45 1 1 1s1-.45 1-1s-.45-1-1-1" />
                                                                            </svg> Nilai</button>

                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="card-body mb-0">
                                                                <div class="activity-groups">
                                                                    @forelse($data->atachments as $file)
                                                                        <div class="activity-awards mb-3">
                                                                            <div class="award-boxs">
                                                                                <img class="img-fluid rounded-3"
                                                                                    src="{{ asset('/img/file-icon.jpg') }}"
                                                                                    alt="Award">
                                                                            </div>
                                                                            <div class="award-list-outs">
                                                                                <h4>{{ strlen($file->original_name) > 55 ? substr($file->original_name, 0, 55) . '...' : $file->original_name }}
                                                                                </h4>
                                                                                <h5>Ditambahkan pada
                                                                                    {{ \Carbon\Carbon::parse($file->created_at)->locale('id_ID')->format('j F Y ') }}
                                                                                    pukul
                                                                                    {{ \Carbon\Carbon::parse($file->created_at)->locale('id_ID')->format(' H:i') }}
                                                                                </h5>
                                                                            </div>
                                                                            <div class="award-time-list">
                                                                                <button type="button"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#preview-file-modal-{{ $file->id }}"
                                                                                    class="btn btn-outline-primary rounded-3"><i
                                                                                        class="fa-solid fa-circle-info"></i></button>
                                                                            </div>
                                                                        </div>

                                                                    @empty
                                                                        <div class="align-items-center text-center mt-2">
                                                                            <img class="img-fluid" width="120"
                                                                                height="120"
                                                                                src="{{ asset('/img/nodata.png') }}"
                                                                                alt="">
                                                                            <p class="text-dark">Tidak ada lampiran yang
                                                                                diserahkan</p>
                                                                        </div>
                                                                    @endforelse
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /Feed Activity -->
                                                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                @endforeach
                            </div>
                            @forelse($collections as $data)
                                @foreach ($data->atachments as $file)
                                    <div class="modal fade" id="preview-file-modal-{{ $file->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myLargeModalLabel">
                                                        Detail {{ $file->original_name }}</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    @if (Str::startsWith(File::mimeType('storage/' . $file->file), 'image/'))
                                                        <img class="img-fluid"
                                                            src="{{ asset('storage/' . $file->file) }}"
                                                            alt="{{ $file->original_name }}">
                                                    @elseif (Str::startsWith(File::mimeType('storage/' . $file->file), 'video/'))
                                                        <video width="100%" controls>
                                                            <source src="{{ asset('storage/' . $dile->file) }}"
                                                                type="{{ File::mimeType('storage/' . $file->file) }}">
                                                        </video>
                                                    @elseif (Str::startsWith(File::mimeType('storage/' . $file->file), 'application/pdf'))
                                                        <embed src="{{ asset('storage/' . $file->file) }}"
                                                            type="application/pdf" width="100%" height="600px">
                                                    @elseif (Str::startsWith(File::mimeType('storage/' . $file->file),
                                                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document'))
                                                        <iframe
                                                            src="https://view.officeapps.live.com/op/view.aspx?src={{ asset('storage/' . $file->file) }}"
                                                            width="100%" height="600px"></iframe>
                                                    @elseif (Str::startsWith(File::mimeType('storage/' . $file->file),
                                                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'))
                                                        <iframe src="{{ asset('storage/' . $dile->file) }}"
                                                            width="100%" height="600px"></iframe>
                                                    @elseif (Str::startsWith(File::mimeType('storage/' . $file->file),
                                                            'application/vnd.openxmlformats-officedocument.presentationml.presentation'))
                                                        <iframe
                                                            src="https://view.officeapps.live.com/op/view.aspx?src={{ asset('storage/' . $dile->file) }}"
                                                            width="100%" height="600px"></iframe>
                                                    @else
                                                        <p>Tidak ada pratinjau yang tersedia untuk
                                                            tipe file ini.</p>
                                                    @endif
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                @endforeach
                            @empty
                                <div class="align-items-center text-center mt-2">
                                    <img class="img-fluid" width="230" height="230"
                                        src="{{ asset('/img/nodata.png') }}" alt="">
                                    <p class="text-dark fw-bolder">Tidak ada tugas yang belum {{auth()->user()->role == 'theacer' ? 'dgitinilai':'dikerjakan'}}</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            {{-- end tabs --}}
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js"
        integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.member-search').on('input', function() {
                var value = $(this).val().toLowerCase();
                $('#member-list tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.task-search').on('input', function() {
                var value = $(this).val().toLowerCase();
                $('#task-element').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.material-search').on('input', function() {
                var value = $(this).val().toLowerCase();
                $('#material-element').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection
