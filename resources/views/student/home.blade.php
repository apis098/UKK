@extends('layouts.app')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Blog List -->
            <div class="row">
                <div class="col-md-9">
                    <h4 class="mt-3">Daftar Kelas</h4>
                </div>
                <div class="col-md-3 text-md-end">
                    <a data-bs-toggle="modal" data-bs-target="#join-class-modal" class="btn btn-primary btn-blog mb-3">
                        <i class="feather-plus-circle me-1"></i>
                        Gabung kelas
                    </a>
                </div>
            </div>

            <div class="row">
                @forelse($classes as $row)
                    <!-- Blog Post -->
                    <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
                        <div class="blog grid-blog flex-fill">
                            <div class="blog-image">
                                <a href="{{ route('classes.show', $row->id) }}"><img class="img-fluid"
                                        src="{{ asset('/img/' . $row->image) }}" alt="Post Image"></a>
                                <div class="blog-views">
                                    <i class="fa-solid fa-users me-1"></i> {{ $row->memberCount() }}
                                </div>

                            </div>
                            <div class="blog-content">
                                <ul class="entry-meta meta-item">
                                    <li>
                                        <div class="post-author">
                                            <a href="#">
                                                @if ($row->user->google_id == 1 && $row->user->foto != null)
                                                    <img src="{{ $row->user->foto }}" alt="3">
                                                @elseif($row->user->foto != null)
                                                    <img src="{{ asset('storage/' . $row->user->foto) }}" alt="1">
                                                @elseif($row->user->foto == null && $row->user->gender == 'male')
                                                    <img src="{{ asset('img/male.jpg') }}" alt="2">
                                                @elseif($row->user->foto == null && $row->user->gender == 'famale')
                                                    <img src="{{ asset('img/famale.jpg') }}" alt="2">
                                                @else
                                                    <img src="{{ asset('img/male.jpg') }}" alt="2">
                                                @endif
                                                <span>
                                                    <span class="post-title">{{ $row->user->name }}</span>
                                                    <span class="post-date"><i class="far fa-clock"></i>
                                                        {{ \Carbon\Carbon::parse($row->created_at)->locale('id_ID')->diffForHumans() }}</span>
                                                </span>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                                <h3 class="blog-title"><a
                                        href="{{ route('classes.show', $row->id) }}">{{ $row->name }}</a></h3>
                                <p>{{ $row->lesson }}</p>
                            </div>
                            <div class="row">
                                <div class= "d-flex justify-content-center ms-1">
                                    <a href="#" class="button-custom text-primary"><i
                                            class="fa-solid fa-list-check"></i></i>
                                        0 Tugas</a>
                                    <a href="#" class="button-custom text-primary"><i class="fa-solid fa-book"></i> 0
                                        Materi</a>
                                    <a href="#" class="button-custom-danger text-danger" data-bs-toggle="modal"
                                        data-bs-target="#out-class-modal-{{ $row->id }}"><i
                                            class="fa-solid fa-door-open"></i> Keluar</a>
                                </div>
                            </div>
                            <div class="modal fade contentmodal" id="out-class-modal-{{ $row->id }}" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content doctor-profile">
                                        <div class="modal-header pb-0 border-bottom-0  justify-content-end">
                                            <button type="button" class="close-btn" data-bs-dismiss="modal"
                                                aria-label="Close"><i class="feather-x-circle"></i></button>
                                        </div>
                                        <div class="modal-body">
                                            <form
                                                action="{{ route('out.class', ['class_id' => $row->id, 'user_id' => Auth::user()->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="delete-wrap text-center">
                                                    <div class="del-icon"><i class="feather-x-circle"></i></div>
                                                    <h2>Apakah anda yakin ingin keluar dari kelas {{ $row->name }}?</h2>
                                                    <div class="submit-section">
                                                        <a href="#" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Tidak</a>
                                                        <button type="submit" class="btn btn-secondary me-2">Ya, saya
                                                            yakin</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="classCodeModal{{ $row->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="mySmallModalLabel">Kode kelas</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="card-body d-flex justify-content-center align-items-center">
                                            <h4 class="card-title me-2" id="text-copy-{{ $row->id }}">
                                                {{ $row->code }}</h4>
                                            <a onclick="copyToClipBoard({{ $row->id }})"
                                                class="btn clip-btn btn-primary btn-sm"><i class="far fa-copy"></i></a>
                                        </div>
                                        <small class="text-secondary">Berikan kode ini kepada anggota kelas yang ingin anda
                                            undang.</small>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <!-- /Blog Post -->
                @empty
                    <div class="align-items-center text-center">
                        <img class="img-fluid" width="230" height="230" src="{{ asset('/img/nodata.png') }}"
                            alt="">
                        <p class="text-dark fw-bolder">Belum ada kelas</p>
                    </div>
                @endforelse
            </div>
            <!-- Pagination -->
            {{-- <div class="row ">
                <div class="col-md-12">
                    <div class="pagination-tab  d-flex justify-content-center">
                        <ul class="pagination mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1"><i
                                        class="feather-chevron-left mr-2"></i>Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next<i class="feather-chevron-right ml-2"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> --}}
            <!-- /Pagination -->
            <!-- Modal -->
            <div class="modal fade contentmodal" id="deleteModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content doctor-profile">
                        <div class="modal-header pb-0 border-bottom-0  justify-content-end">
                            <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close"><i
                                    class="feather-x-circle"></i></button>
                        </div>
                        <div class="modal-body">
                            <div class="delete-wrap text-center">
                                <div class="del-icon"><i class="feather-x-circle"></i></div>
                                <h2>Sure you want to delete</h2>
                                <div class="submit-section">
                                    <a href="blog.html" class="btn btn-success me-2">Yes</a>
                                    <a href="#" class="btn btn-danger" data-bs-dismiss="modal">No</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Modal -->
        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection
