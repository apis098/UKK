@extends('layouts.app')
@section('content')
    <style>
        ::selection {
            color: #fff;
            background: #9FA6B2;
        }

        .wrapper {
            margin: 0;
            border-radius: 5px;
            padding-left: 15px;
            padding-right: 15px; 
        }

        .wrapper header {
            color: #9FA6B2;
            font-size: 27px;
            font-weight: 600;
            text-align: center;
        }

        .wrapper .upload-form {
            height: 167px;
            display: flex;
            cursor: pointer;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border-radius: 5px;
            border: 2px dashed #9FA6B2;
            margin-top: -18px;
        }

        .upload-form :where(i, p) {
            color: #9FA6B2;
        }

        .upload-form i {
            margin-top: 15px;
            font-size: 50px;
        }

        .upload-form p {
            margin-top: 15px;
            font-size: 16px;
        }

        section .row {
            margin-top: 10px;
            background: #E9F0FF;
            list-style: none;
            padding: 15px 20px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        section .row i {
            color: #6990F2;
            font-size: 30px;
        }

        section .details span {
            font-size: 14px;
        }

        .progress-area .row .content {
            width: 100%;
            margin-left: 15px;
        }

        .progress-area .details {
            display: flex;
            align-items: center;
            margin-bottom: 7px;
            justify-content: space-between;
        }

        .progress-area .content .progress-bar {
            height: 6px;
            width: 100%;
            margin-bottom: 4px;
            background: #fff;
            border-radius: 30px;
        }

        .content .progress-bar .progress {
            height: 100%;
            width: 0%;
            background: #6990F2;
            border-radius: inherit;
        }

        .uploaded-area {
            max-height: 232px;
            overflow-y: scroll;
        }

        .uploaded-area.onprogress {
            max-height: 150px;
        }

        .uploaded-area::-webkit-scrollbar {
            width: 0px;
        }

        .uploaded-area .row .content {
            display: flex;
            align-items: center;
        }

        .uploaded-area .row .details {
            display: flex;
            margin-left: 15px;
            flex-direction: column;
        }

        .uploaded-area .row .details .size {
            color: #404040;
            font-size: 11px;
        }

        .uploaded-area i.fa-check {
            font-size: 16px;
        }
    </style>
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-xl-12">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="page-title">Add Post</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <div class="card">
                        <div class="card-body">
                            <div class="bank-inner-details">
                                <div class="row">
                                    <form id="form" method="POST" action="{{route('materials.add',$class->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Judul<span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Petunjuk/Deskripsi</label>
                                                <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Lampiran</label>
                                                <input type="file" name="files[]" class="form-control" multiple>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Kirim</button>
                                    </form>
                                    <div class="wrapper mt-5">
                                        <form class="upload-form" action="#">
                                            <input class="file-input" type="file" name="file" hidden>
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <p>Browse File to Upload</p>
                                        </form>
                                        <section class="rounded progress-area"></section>
                                        <section class="rounded uploaded-area"></section>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" blog-categories-btn pt-0">
                            <div class="bank-details-btn ">
                                <a href="blog.html" class="btn bank-cancel-btn me-2">Tambah Tugas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const form = document.querySelector(".upload-form"),
            fileInput = document.querySelector(".file-input"),
            progressArea = document.querySelector(".progress-area"),
            uploadedArea = document.querySelector(".uploaded-area");

        form.addEventListener("click", () => {
            fileInput.click();
        });

        fileInput.onchange = ({
            target
        }) => {
            let file = target.files[0];
            if (file) {
                let fileName = file.name;
                if (fileName.length >= 12) {
                    let splitName = fileName.split('.');
                    fileName = splitName[0].substring(0, 13) + "... ." + splitName[1];
                }
                uploadFile(fileName);
            }
        }

        function uploadFile(name) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "php/upload.php");
            xhr.upload.addEventListener("progress", ({
                loaded,
                total
            }) => {
                let fileLoaded = Math.floor((loaded / total) * 100);
                let fileTotal = Math.floor(total / 1000);
                let fileSize;
                (fileTotal < 1024) ? fileSize = fileTotal + " KB": fileSize = (loaded / (1024 * 1024)).toFixed(2) +
                    " MB";
                let progressHTML = `<li class="row">
                          <div class="content upload">
                            <i class="fas fa-file-alt"></i>
                            <div class="details">
                              <span class="name">${name} • Mengunggah</span>
                              <span class="percent">${fileLoaded}%</span>
                            </div>
                            <div class="progress-bar">
                              <div class="progress" style="width: ${fileLoaded}%"></div>
                            </div>
                          </div>
                        </li>`;
                uploadedArea.classList.add("onprogress");
                progressArea.innerHTML = progressHTML;
                if (loaded == total) {
                    progressArea.innerHTML = "";
                    let uploadedHTML = `<li class="row">
                            <div class="content upload">
                              <i class="fas fa-file-alt"></i>
                              <div class="details">
                                <span class="name">${name} • Selesai Diunggah <i class="fas fa-check"></i></span>
                                <span class="size">${fileSize}</span>
                              </div>
                            </div>
                          </li>`;
                    uploadedArea.classList.remove("onprogress");
                    uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML);
                }
            });
            let data = new FormData(form);
            xhr.send(data);
        }
    </script>
    <!-- /Page Wrapper -->
@endsection
