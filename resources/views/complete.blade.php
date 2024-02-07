@extends('layouts.app')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">

                <!-- Lightbox -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Kelengkapan Data Diri</h4>
                        </div>
                        <div class="card-body">
                            <div id="basic-pills-wizard" class="twitter-bs-wizard">
                                <ul class="twitter-bs-wizard-nav">
                                    <li class="nav-item active">
                                        <a href="#seller-details" class="nav-link" data-toggle="tab">
                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Lengkapi Data diri">
                                                <i class="far fa-user"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#company-document" class="nav-link" data-toggle="tab">
                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Status">
                                                <i class="fas fa-map-pin"></i>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#bank-detail" class="nav-link" data-toggle="tab">
                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Kebijakan Privasi">
                                                <i class="fa-solid fa-shield-halved"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <!-- wizard-nav -->
                                <form id="myForm" action="{{route('completeness.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="tab-content twitter-bs-wizard-tab-content">
                                        <div class="tab-pane active" id="seller-details">
                                            <div class="mb-4">
                                                <h5>Lengkapi Data Diri Anda</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-firstname-input" class="form-label">Nama
                                                            lengkap <span class="text-danger">*</span><small
                                                                class="text-secondary">wajib di isi</small></label>
                                                        <input type="text" class="form-control"  name="name" value="{{auth()->user()->name}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-lastname-input" class="form-label">Tanggal
                                                            lahir <span class="text-danger">*</span><small
                                                                class="text-secondary">wajib di isi</small></label>
                                                        <input type="date" class="form-control" name="dateofbirth" value="{{old('date')}}" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-phoneno-input" class="form-label">Jenis
                                                            Kelamin <span class="text-danger">*</span><small
                                                                class="text-secondary">wajib di isi</small></label>
                                                        <select class="form-control form-select" name="gender">
                                                            <option value="male">Laki-laki</option>
                                                            <option value="famale">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-email-input" class="form-label">Nama Instansi
                                                            <span class="text-danger">*</span><small
                                                                class="text-secondary">opsional</small></label>
                                                        <input type="text" name="institute" value="{{old('institute')}}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-email-input" class="form-label">Foto Profile
                                                            <span class="text-danger">*</span><small
                                                                class="text-secondary">opsional</small></label>
                                                        <input type="file" name="foto" value="{{old('foto')}}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                <li class="next"><a href="javascript: void(0);"
                                                        class="btn btn-primary seller-next-btn">Selanjutnya <i
                                                            class="fa-solid fa-arrow-right"></i></a></li>
                                            </ul>
                                        </div>
                                        <!-- tab pane -->
                                        <div class="tab-pane" id="company-document">
                                            <div>
                                                <h6 class="d-flex justify-content-center">Status <span
                                                        class="text-danger">*</span><small class="text-secondary">pilih
                                                        salah satu</small></h6>
                                                <div class="row">
                                                    <div class="radio-tile-group">
                                                        <div class="input-container">
                                                            <input id="walk" class="radio-button" value="theacer" type="radio"
                                                                name="role" />
                                                            <div for="walk" class="radio-tile">
                                                                <div class="icon walk-icon">
                                                                    <svg class="radio-tile-label"
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24">
                                                                        <path fill="currentColor"
                                                                            d="M12 2q1.25 0 2.125.875T15 5q0 1.25-.875 2.125T12 8q-1.25 0-2.125-.875T9 5q0-1.25.875-2.125T12 2m0 7q1.175 0 2.325.275t2.075.775q.95.475 1.525 1.125T18.5 12.6v5.8q0 .425-.2.838t-.55.762q-.35.35-.812.65t-1.038.55v-2.25q0-.95-1.312-1.55T12 16.8q-1.25 0-2.412.513T8.15 18.65q.95.375 1.95.525t2.05.175H13v2.6q-.175.05-.362.05h-.388q-.9 0-2.062-.2t-2.213-.625q-1.05-.425-1.762-1.112T5.5 18.4v-5.8q0-.775.575-1.425t1.5-1.125q.95-.5 2.1-.775T12 9m0 6q.825 0 1.413-.587T14 13q0-.825-.587-1.412T12 11q-.825 0-1.412.588T10 13q0 .825.588 1.413T12 15" />
                                                                    </svg>
                                                                </div>
                                                                <h4 class="radio-tile-label">Pengajar</h4>
                                                            </div>
                                                        </div>

                                                        <div class="input-container">
                                                            <input id="bike" class="radio-button" value="student" type="radio"
                                                                name="role" />
                                                            <label for="bike" class="radio-tile">
                                                                <div class="icon bike-icon ">
                                                                    <svg class="radio-tile-label"
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24">
                                                                        <path fill="currentColor"
                                                                            d="M3 23q-.425 0-.712-.288T2 22q0-.425.288-.712T3 21h18q.425 0 .713.288T22 22q0 .425-.288.713T21 23zm2-3q-.425 0-.712-.288T4 19v-5q-.825-1.35-1.275-2.863t-.45-3.087q0-1.525.388-3t.912-2.9q.2-.525.65-.837t1-.313Q6 1 6.55 1.525T7 2.775L6.725 5.05q-.15 1.2.213 2.275t1.087 1.887q.725.813 1.75 1.3T12 11q1.5 0 3.013.313t2.637.887q1.125.575 1.738 1.463T20 15.85V19q0 .425-.288.713T19 20zm1-2h12v-2.15q0-.6-.3-1.062t-.85-.738q-1.025-.5-2.375-.775T12 13q-1.65 0-3.062-.675t-2.4-1.812Q5.55 9.375 5.05 7.887T4.75 4.8q-.25.75-.363 1.6t-.112 1.65q0 1.45.513 2.788T6 13.45zm6-8q-1.65 0-2.825-1.175T8 6q0-1.65 1.175-2.825T12 2q1.65 0 2.825 1.175T16 6q0 1.65-1.175 2.825T12 10m0-2q.825 0 1.413-.587T14 6q0-.825-.587-1.412T12 4q-.825 0-1.412.588T10 6q0 .825.588 1.413T12 8M8 20v-.925Q8 17.4 9.163 16.2T12 15h3q.425 0 .713.288T16 16q0 .425-.288.713T15 17h-3q-.85 0-1.425.613T10 19.075V20zm4-14" />
                                                                    </svg>
                                                                </div>
                                                                <h4 class="radio-tile-label">Murid</h4>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                    <li class="previous"><a href="javascript: void(0);"
                                                            class="btn btn-secondary seller-previous-btn"><i
                                                                class="fa-solid fa-arrow-left"></i> Sebelumnya</a></li>
                                                    <li class="next"><a href="javascript: void(0);"
                                                            class="btn btn-primary seller-next-btn">Selanjutnya <i
                                                                class="fa-solid fa-arrow-right"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- tab pane -->
                                        <div class="tab-pane" id="bank-detail">
                                            <div>
                                                <b>-Kebijakan Privasi - Educlass</b>
                                                <br>
                                                <p>Kebijakan Privasi ini menjelaskan bagaimana Educlass situs kami
                                                    mengumpulkan, menggunakan, dan
                                                    melindungi informasi pribadi Anda
                                                    saat Anda menggunakan situs web kami. Kami sangat menghargai privasi
                                                    Anda dan berkomitmen untuk
                                                    melindungi data pribadi Anda. Dengan menggunakan situs kami,
                                                    Anda setuju dengan praktik yang dijelaskan dalam kebijakan privasi ini.
                                                </p>
                                                <br>
                                                <p>
                                                    <b>Informasi yang Kami Kumpulkan</b>
                                                    <br>
                                                <p>
                                                    <b>-Informasi Pribadi</b><br>
                                                    Kami dapat mengumpulkan informasi pribadi yang Anda berikan kepada kami
                                                    saat mendaftar
                                                    atau menggunakan layanan kami, seperti nama, alamat email, alamat fisik,
                                                    nomor telepon, dan
                                                    informasi identifikasi lainnya.
                                                    Kami hanya akan menggunakan informasi pribadi ini untuk tujuan yang
                                                    relevan dan legal yang telah
                                                    dijelaskan kepada Anda pada saat pengumpulan data.
                                                </p>
                                                <br>
                                                <p>
                                                    <b>-Informasi Otomatis</b><br>
                                                    Kami juga dapat mengumpulkan informasi otomatis saat Anda mengakses
                                                    situs kami, termasuk
                                                    informasi seperti alamat IP Anda, jenis perangkat yang Anda gunakan,
                                                    browser web Anda, dan
                                                    aktivitas yang Anda lakukan di situs kami.
                                                    Informasi ini membantu kami memahami bagaimana pengguna menggunakan
                                                    situs kami dan dapat
                                                    digunakan untuk mengoptimalkan pengalaman pengguna dan keamanan.
                                                </p>
                                                <br>
                                                <p>
                                                    <b>-Penggunaan Informasi</b><br>
                                                    Kami dapat menggunakan informasi yang kami kumpulkan untuk beberapa
                                                    tujuan, termasuk:
                                                    <br>
                                                    1. Memberikan layanan kami, seperti memungkinkan Anda untuk membuat
                                                    resep, berbagi feed, dan
                                                    mengikuti kursus koki.
                                                    <br>
                                                    2. Mengirimkan email dan komunikasi lainnya terkait dengan akun Anda.
                                                    <br>
                                                    3. Memahami bagaimana Anda menggunakan situs kami untuk meningkatkan
                                                    pengalaman pengguna.
                                                    <br>
                                                    4. Melindungi keamanan dan integritas situs kami.
                                                    <br>
                                                </p>
                                                <p>
                                                    <br>
                                                    <b>-Berbagi Informasi</b><br>
                                                    Kami dapat berbagi informasi Anda hanya dalam situasi tertentu,
                                                    termasuk: <br>
                                                    1. Dengan pengguna lain sesuai dengan fitur situs kami yang Anda
                                                    gunakan, seperti berbagi feed.
                                                    <br>
                                                    2. Dengan pihak ketiga yang kami rekrut untuk membantu kami dalam
                                                    penyediaan layanan, seperti
                                                    penyedia hosting dan pembayaran.
                                                    <br>
                                                    3. Dalam situasi hukum yang diperlukan, seperti pematuhan terhadap
                                                    undang-undang yang berlaku.
                                                </p>
                                                <br>
                                                <p>
                                                    <b>-Keamanan Data</b><br>
                                                    Kami sangat memprioritaskan keamanan data Anda.
                                                    Kami akan mengambil tindakan yang sesuai untuk melindungi data pribadi
                                                    Anda dari akses yang
                                                    tidak sah, penyalahgunaan, perubahan, atau pengungkapan yang tidak sah.
                                                </p>
                                                <br>
                                                <p>
                                                    <b>-Akses dan Kontrol atas Informasi Anda</b><br>
                                                    Anda memiliki hak untuk mengakses dan mengontrol informasi pribadi Anda
                                                    yang kami simpan.
                                                    Jika Anda ingin mengakses, mengoreksi, atau menghapus data pribadi Anda
                                                    yang kami simpan, Anda
                                                    dapat menghubungi kami melalui kontak kami->(Educlass@gmail.com).
                                                </p>
                                                <br>
                                                <p>
                                                    <b>-Perubahan pada Kebijakan Privasi</b><br>
                                                    Kebijakan Privasi ini mungkin diperbarui dari waktu ke waktu untuk
                                                    mencerminkan perubahan dalam
                                                    praktik kami atau persyaratan hukum yang berlaku.
                                                    Perubahan penting akan diinformasikan kepada Anda melalui email atau
                                                    pemberitahuan di situs web
                                                    kami.
                                                </p>
                                                <br>
                                                <p>
                                                    <b>-Hubungi Kami</b><br>
                                                    Jika Anda memiliki pertanyaan tentang Kebijakan Privasi kami atau ingin
                                                    mengajukan permintaan
                                                    terkait privasi Anda, Anda dapat menghubungi kami melalui kontak
                                                    kami->(Educlass@gmail.com).
                                                    Kami berterima kasih atas kepercayaan Anda kepada kami dan berkomitmen
                                                    untuk melindungi privasi
                                                    Anda dengan baik.
                                                </p>
                                                <br>
                                                <p class="text-center"><b><i>Terima kasih telah menggunakan
                                                            Educlass.</i></b></p>
                                                <div class="d-flex gap-2 pl-2 mt-3 mb-2">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        name="kebijakanPrivasi" id="kebijakanPrivasi">
                                                    <label for="kebijakanPrivasi" type="button"
                                                        class="form-check-label">
                                                        <i>Dengan ini saya menyatakan bahwa saya telah membaca, memahami,
                                                            dan menyetujui kebijakan privasi dari <span
                                                                class="text-primary">Educlass</span>.</i>
                                                    </label>
                                                </div>
                                                <div id="kebijakanPrivasiError" class="text-danger"></div>
                                                <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                    <li class="previous"><a href="javascript: void(0);"
                                                            class="btn btn-secondary seller-previous-btn"><i
                                                                class="fa-solid fa-arrow-left"></i> Previous</a></li>
                                                    <li class="float-end"><button type="button" onclick="validateForm()"
                                                            class="btn btn-primary"><i
                                                                class="fa-solid fa-floppy-disk"></i> Simpan</button></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- tab pane -->
                                    </div>
                                </form>
                                <!-- end tab content -->
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                </div>
                <!-- /Wizard -->
            </div>

        </div>

    </div>
    <script>
        function validateForm() {
            const checkbox = document.getElementById('kebijakanPrivasi');
            const errorDiv = document.getElementById('kebijakanPrivasiError');
            const form = document.getElementById('myForm');
            if (!checkbox.checked) {
                errorDiv.textContent = 'Anda harus menyetujui kebijakan privasi';
                return false;
            } else {
                errorDiv.textContent = '';
                form.submit();
            }
        }
    </script>
    <!-- /Page Wrapper -->
@endsection
