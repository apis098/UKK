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
            margin-top: -65px;
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
                                <h3 class="page-title">Tambah tugas di kelas {{ $class->name }}</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <div class="card">
                        <div class="card-body">
                            <div class="bank-inner-details">
                                <div class="row">
                                    <form id="form" method="POST" action="{{ route('task.add', $class->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Judul<span class="text-danger">*</span></label>
                                                <input type="text" name="name" id="name"
                                                    value="{{ old('name') }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Petunjuk/Deskripsi</label>
                                                <textarea class="form-control" name="description" id="description" value="{{ old('description') }}" id=""
                                                    cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Point<span class="text-danger">*</span></label>
                                                <input type="number" name="point" id="point"
                                                    value="{{ old('point') }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Tenggat<span class="text-danger">*</span></label>
                                                <input type="datetime-local" name="deadline" id="deadline"
                                                    value="{{ old('deadline') }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Lampiran</label>
                                                <input type="file" name="files[]" class="file-input form-control" hidden
                                                    multiple>
                                                <div class="element"></div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" hidden id="real-button"
                                            type="submit">Kirim</button>
                                    </form>
                                    <div class="wrapper mt-5">
                                        <form class="upload-form" action="#">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <p>Unggah File</p>
                                        </form>
                                        <section class="rounded progress-area"></section>
                                        <section class="rounded uploaded-area"></section>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class=" blog-categories-btn pt-0">
                            <div class="bank-details-btn ">
                                <a class="btn bank-cancel-btn me-2" id="fake-button" onclick="submitUploadForm()">Tambah
                                    Tugas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript -->
    <script>
        // JavaScript
        const form = document.querySelector(".upload-form"),
            elementContainer = document.querySelector(".element"),
            progressArea = document.querySelector(".progress-area"),
            fakeButton = document.querySelector('#fake-button'),
            uploadedArea = document.querySelector(".uploaded-area");

        let uploadedFiles = []; // Array untuk menyimpan informasi file yang diunggah
        num = 1;
        form.addEventListener("click", () => {
            num++;
            if (elementContainer.children.length === 0) {
                // Jika belum ada input file, buat dynamic input
                createNewInput();
            } else {
                // Jika sudah ada input file, tunggu sampai upload selesai baru buat dynamic input
                checkUploadCompletion();
            }
        });

        function checkUploadCompletion() {
            if (!uploadedArea.classList.contains("onprogress")) {
                // Jika tidak ada proses upload berlangsung
                createNewInput();
            } else {
                // Jika masih ada proses upload, tunggu sebentar dan cek lagi
                setTimeout(checkUploadCompletion, 1000);
            }
        }

        function createNewInput() {
            let newInput = document.createElement("input");
            newInput.type = "file";
            newInput.name = "files[]";
            newInput.classList.add("file-input", "form-control");
            newInput.setAttribute("id",'input-file-'+num);
            newInput.setAttribute("hidden", true);

            // Append new input to the element container
            elementContainer.appendChild(newInput);

            // Add onchange event to the new input
            newInput.onchange = ({
                target
            }) => {
                let files = target.files;
                if (files.length > 0) {
                    for (let i = 0; i < files.length; i++) {
                        let file = files[i];
                        let fileName = file.name;
                        if (fileName.length >= 12) {
                            let splitName = fileName.split('.');
                            fileName = splitName[0].substring(0, 13) + "... ." + splitName[1];
                        }
                        uploadFile(file, fileName);
                    }
                }
            };

            // Trigger click event on the new input to open file dialog
            newInput.click();
        }

        function uploadFile(file, name) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "php/upload.php");
            xhr.upload.addEventListener("progress", ({
                loaded,
                total
            }) => {
                fakeButton.classList.add('disabled');
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
                    fakeButton.classList.remove('disabled');
                    progressArea.innerHTML = "";
                    let uploadedHTML = `<li class="row" id="detail-element-${num}">
                        <div class="content upload col-lg-10">
                            <i class="fas fa-file-alt"></i>
                            <div class="details">
                                <span class="name">${name} • Selesai Diunggah <i class="fas fa-check"></i></span>
                                <span class="size">${fileSize}</span>
                            </div>
                        </div>
                        <div class="col-lg-2 text-end">
                            <button type="button" class="align-items-center btn btn-link" onclick="closeAtachment(${num})" ><p class="text-danger mt-3 fa-solid fa-circle-xmark"></p></button>
                        </div>
                    </li>`;
                    uploadedArea.classList.remove("onprogress");
                    uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML);

                    // Simpan informasi file yang diunggah ke dalam array
                    uploadedFiles.push({
                        name,
                        size: fileSize
                    });
                }
            });
            let data = new FormData();
            data.append('file', file);
            xhr.send(data);
        }

        function submitUploadForm() {
            const button = document.getElementById('real-button');
            button.click();
        }
        function closeAtachment(num){
            const card = document.getElementById('detail-element-'+num);
            const fileInput = document.getElementById('input-file-'+num);
            card.remove();
            fileInput.remove();
        }
    </script>

    <!-- /Page Wrapper -->
@endsection
