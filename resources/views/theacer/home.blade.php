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
                    <a data-bs-toggle="modal" data-bs-target="#add-class-modal" class="btn btn-primary btn-blog mb-3">
                        <i class="feather-plus-circle me-1"></i>
                        Tambah kelas
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
                                                @if ($row->user->google_id != null && $row->user->foto != null)
                                                    <img src="{{ $row->user->foto }}" alt="3">
                                                @elseif($row->user->foto != null && $row->google_id == null)
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
                                <div class="edit-options">
                                    <div class= "edit-delete-btn ">
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#edit-class-modal-{{ $row->id }}" class="text-success"><i
                                                class="feather-edit-3 me-1"></i>
                                            Edit</a>
                                        <a href="#" class="text-danger" data-bs-toggle="modal"
                                            data-bs-target="#class-delete-modal-{{ $row->id }}"><i
                                                class="feather-trash-2 me-1"></i> Hapus</a>
                                    </div>
                                    <div class="text-end edit-delete-btn">
                                        <a href="#" class="text-primary" data-bs-toggle="modal"
                                            data-bs-target="#classCodeModal{{ $row->id }}"><i
                                                class="fa-solid fa-share-nodes"></i></i>
                                            Bagikan</a>
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
                    <!-- edit class modal content -->
                    <div id="edit-class-modal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <div class="text-center mt-2 mb-4">
                                        <div class="auth-logo">
                                            <a href="#" class="logo logo-dark">
                                                <span class="logo-lg">
                                                    <h5>Edit kelas</h5>
                                                </span>
                                            </a>
                                        </div>
                                    </div>

                                    <form class="px-3" method="POST"
                                        action="{{ route('classes.update', $row->id) }}"enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama kelas</label>
                                            <input class="form-control" type="text" id="name" name="name"
                                                value="{{ $row->name }}" required=""
                                                placeholder="Masukkan nama kelas...">
                                        </div>

                                        <div class="mb-3">
                                            <label for="part" class="form-label">Bagian</label>
                                            <input class="form-control" type="text" id="part" name="part"
                                                value="{{ $row->part }}" placeholder="Masukkan Bagian...">
                                        </div>

                                        <div class="mb-3">
                                            <label for="password" class="form-label">Mata Pelajaran</label>
                                            <input class="form-control" type="text" required="" id="lesson"
                                                value="{{ $row->lesson }}" name="lesson"
                                                placeholder="Masukkan Mata Pelajaran...">
                                        </div>

                                        <div class="mb-3">
                                            <label for="password" class="form-label">Ruangan</label>
                                            <input class="form-control" type="text" required="" id="room"
                                                value="{{ $row->room }}" name="room"
                                                placeholder="Masukkan Nama Ruangan...">
                                        </div>

                                        <div class="mb-3 text-end">
                                            <button class="btn btn-secondary" data-bs-dismiss="modal"
                                                type="button">Batal</button>
                                            <button class="btn btn-primary" type="submit">Simpan</button>
                                        </div>

                                    </form>

                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <!-- Modal -->
                    <div class="modal fade contentmodal" id="class-delete-modal-{{ $row->id }}" tabindex="-1"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content doctor-profile">
                                <div class="modal-header pb-0 border-bottom-0  justify-content-end">
                                    <button type="button" class="close-btn" data-bs-dismiss="modal"
                                        aria-label="Close"><i class="feather-x-circle"></i></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('classes.destroy', $row->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="delete-wrap text-center">
                                            <div class="del-icon"><i class="feather-x-circle"></i></div>
                                            <h2>Apakah anda yakin ingin menghapus kelas {{ $row->name }}?</h2>
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
                    <!-- /Modal -->
                    <!-- /Blog Post -->
                @empty
                    <div class="align-items-center text-center">
                        <img class="img-fluid" width="230" height="230" src="{{ asset('/img/nodata.png') }}"
                            alt="">
                        <p class="text-dark fw-bolder">Belum ada kelas</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <script>
        function copyToClipBoard(id) {
            // Pilih elemen dengan ID yang diberikan
            var textElement = document.getElementById('text-copy-' + id);

            // Buat rangkaian pemilihan dan salin teks ke clipboard
            var range = document.createRange();
            range.selectNode(textElement);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();

            // Tampilkan pesan atau lakukan tindakan lain jika diperlukan
            iziToast.info({
                title: 'Info',
                message: 'Kode telah di salin',
                position: 'topRight'
            });
        }
    </script>

    <!-- /Page Wrapper -->
@endsection
