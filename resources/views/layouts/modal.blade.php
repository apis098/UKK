	<!-- add class modal content -->
    <div id="add-class-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="text-center mt-2 mb-4">
                        <div class="auth-logo">
                            <a href="#" class="logo logo-dark">
                                <span class="logo-lg">
                                    <h5>Buat kelas</h5>
                                </span>
                            </a>
                        </div>
                    </div>

                    <form class="px-3" method="POST" action="{{route('classes.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama kelas (wajib diisi)</label>
                            <input class="form-control" type="text" id="name" name="name" required="" placeholder="Masukkan nama kelas...">
                        </div>

                        <div class="mb-3">
                            <label for="part" class="form-label">Bagian</label>
                            <input class="form-control" type="text" id="part" name="part" placeholder="Masukkan Bagian...">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Mata Pelajaran</label>
                            <input class="form-control" type="text" required="" id="lesson" name="lesson" placeholder="Masukkan Mata Pelajaran...">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Ruangan (opsional)</label>
                            <input class="form-control" type="text" required="" id="room" name="room" placeholder="Masukkan Nama Ruangan...">
                        </div>

                        <div class="mb-3 text-end">
                            <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Batal</button>
                            <button class="btn btn-primary" type="submit">Tambahkan</button>
                        </div>

                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div id="join-class-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="text-center mt-2 mb-4">
                        <div class="auth-logo">
                            <a href="#" class="logo logo-dark">
                                <span class="logo-lg">
                                    <h5>Gabung kelas</h5>
                                </span>
                            </a>
                        </div>
                    </div>

                    <form class="px-3" method="POST" action="{{route('join.class')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <div class="mb-2">
                                <H5 class="form-label">Kode kelas</H5>
                                <small class="text-secondary">Mintalah kode kelas kepada pengajar, lalu masukkan kode disini</small>
                            </div>
                            <input class="form-control" type="text" id="code" name="code" required="" placeholder="Kode kelas...">
                        </div>
                        <div class="mb-3 text-end">
                            <button class="btn btn-primary" type="submit">Gabung</button>
                        </div>
                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->