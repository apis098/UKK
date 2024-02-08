@extends('layouts.app')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="row">
                <div class="col-md-6">
                    <h4 class="mt-3">Kelas {{ $class->name }}</h4>
                </div>
                <div class="col-md-6 text-end ">
                    <a data-bs-toggle="modal" data-bs-target="#join-class-modal" class="btn btn-primary btn-blog mb-3">
                        <i class="feather-plus-circle me-1"></i>
                        Tambah Materi
                    </a>
                    <a data-bs-toggle="modal" data-bs-target="#join-class-modal" class="btn btn-primary btn-blog mb-3">
                        <i class="feather-plus-circle me-1"></i>
                        Tambah Tugas
                    </a>
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
                    <h5 class="card-title">{{$class->lesson}}</h5>
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
                            Tab content 1
                        </div>
                        <div class="tab-pane" id="bottom-justified-tab2">
                            Tab content 2
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
                                <table
                                    class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread">
                                        <tr>
                                            <th>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </th>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Tanggal lahir</th>
                                            <th>Jenis kelamin</th>
                                            <th class="text-end">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($member as $row)
                                        <tr>
                                            <td>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    @if($row->foto != null && $row->google_id == 1)
                                                        <a href="student-details.html" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="{{$row->foto}}"
                                                                alt="User Image">
                                                        </a>
                                                    @elseif($row->foto != null)
                                                        <a href="student-details.html" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="{{ asset('/storage/'.$row->foto) }}"
                                                                alt="User Image">
                                                        </a>
                                                    @else
                                                        <a href="student-details.html" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="{{ asset('/img/male.jpg') }}"
                                                                alt="User Image">
                                                        </a>
                                                    @endif
                                                    <a href="student-details.html">{{$row->name}}</a>
                                                </h2>
                                            </td>
                                            <td>{{$row->email}}</td>
                                            <td>{{$row->dateofbirth}}</td>
                                            <td>
                                                @if($row->male)
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
                                        @empty
                                        <div class="align-items-center text-center">
                                            <img class="img-fluid" width="230" height="230" src="{{ asset('/img/nodata.png') }}"
                                                alt="">
                                            <p class="text-dark fw-bolder">Belum ada anggota</p>
                                        </div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end tabs --}}
        </div>
    </div>
@section('content')
