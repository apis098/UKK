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
                    <div class="btn-group dropstart">
                        <a data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            class="btn btn-primary rounded-circle p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2" />
                            </svg>
                        </a>
                        <div class="dropdown-menu me-2 pt-2 pb-2 text-center">
                            <a class="dropdown-item align-items-center" href="profile.html"><svg class="mb-1"
                                    xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 14 14">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                        <path
                                            d="M9.5 1.5H11a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-10a1 1 0 0 1 1-1h1.5" />
                                        <rect width="5" height="2.5" x="4.5" y=".5" rx="1" />
                                        <path d="M7 6v4m2-2H5" />
                                    </g>
                                </svg> Tambah Tugas</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item align-items-center" href="{{route('materials.create')}}"><svg class="mb-1"
                                    xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"
                                        d="M8 3H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h6M8 3v9l3-3l3 3V3M8 3h6m0 0h4a2 2 0 0 1 2 2v7m-1 4v3m0 3v-3m0 0h3m-3 0h-3" />
                                </svg> Tambah Materi</a>
                        </div>
                    </div>
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
                                    <h6>All Courses</h6>
                                    <h3>04/06</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="{{ asset('/img/icons/teacher-icon-01.svg') }}" alt="Dashboard Icon">
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
                                    <h6>All Projects</h6>
                                    <h3>40/60</h3>
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
                                    <h6>Test Attended</h6>
                                    <h3>30/50</h3>
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
                                    <h6>Test Passed</h6>
                                    <h3>15/20</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="{{ asset('/img/icons/student-icon-02.svg') }}" alt="Dashboard Icon">
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
                    <h5 class="card-title">{{ $class->lesson }}</h5>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                        <li class="nav-item"><a class="nav-link active" href="#bottom-justified-tab1"
                                data-bs-toggle="tab"><i class="fa-solid fa-list-check"></i> Tugas</a></li>
                        <li class="nav-item"><a class="nav-link" href="#bottom-justified-tab2" data-bs-toggle="tab"><i
                                    class="fa-solid fa-book"></i> Materi</a></li>
                        <li class="nav-item"><a class="nav-link" href="#bottom-justified-tab3" data-bs-toggle="tab"><i
                                    class="fa-solid fa-users"></i> Anggota</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="bottom-justified-tab1">
                            <div class="row pe-3 ps-3">
                                <div class="custom-card pt-2 pb-2 bg-light mb-2 d-flex align-items-center">
                                    <div class="col-lg-9">
                                        <div class="grid-container">
                                            <div class="db-widgets d-flex justify-content-beetwen align-items-center">
                                                <div class="left-icon p-1 me-3">
                                                    <img class="ms-1"
                                                        src="{{ asset('/img/icons/student-icon-01.svg') }}"
                                                        alt="Dashboard Icon">
                                                </div>
                                                <div class="db-info mt-2">
                                                    <h5 style="margin-bottom:0; ">Hukum Kekekalan</h5>
                                                    <h6>1 jam yang lalu</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="grid-container text-end">
                                            <small>tidak ada batas waktu</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="bottom-justified-tab2">
                            <div class="row pe-3 ps-3">
                                <div class="custom-card pt-2 pb-2 bg-light mb-2 d-flex align-items-center">
                                    <div class="col-lg-9">
                                        <div class="grid-container">
                                            <div class="db-widgets d-flex justify-content-beetwen align-items-center">
                                                <div class="left-icon me-3 p-1 text-center  ">
                                                    <img class="ms-1"
                                                        src="{{ asset('/img/icons/teacher-icon-02.svg') }}"
                                                        alt="Dashboard Icon">
                                                </div>
                                                <div class="db-info mt-2">
                                                    <h5 style="margin-bottom:0; ">Materi Hukum Kekekalan</h5>
                                                    <h6>1 jam yang lalu</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="grid-container text-end">
                                            <small>tidak ada batas waktu</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="bottom-justified-tab3">
                            <!-- Page Header -->
                            <div class="page-header">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="page-sub-header">
                                            <h3 class="page-title">Daftar Murid</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Page Header -->
                            <div class="student-group-form">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Search by ID ...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Search by Name ...">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Search by Phone ...">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="search-student-btn">
                                            <button type="btn" class="btn btn-primary">Cari</button>
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
                                    <tbody>
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
                                                        <a href="javascript:;" class="btn btn-sm bg-success-light me-2 ">
                                                            <i class="feather-eye"></i>
                                                        </a>
                                                        <a href="edit-student.html" class="btn btn-sm bg-danger-light">
                                                            <i class="feather-edit"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
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
                    </div>
                </div>
            </div>
            {{-- end tabs --}}
        </div>
    </div>
@endsection
