@extends('layouts.app')
@section('content')
    <style>
        .card {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: 1rem;
        }

        .text-reset {
            --bs-text-opacity: 1;
            color: inherit !important;
        }

        a {
            color: #5465ff;
            text-decoration: none;
        }
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
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="container">
                <!-- Title -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> {{$task->name}} - kelas {{$task->classes->name}}</h2>
                </div>
    
                <!-- Main content -->
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Details -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <table class="table table-borderless  align-items-center">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex mb-2">
                                                    <div class="flex-shrink-0">
                                                        <img  src="{{ asset('/img/icons/student-icon-01.svg') }}"alt="" width="35" class="img-fluid bg-primary rounded-circle">
                                                    </div>
                                                    <div class="flex-lg-grow-1 ms-3 align-items-center">
                                                        <h6 class="mb-0 fw-bolder"><a href="#" class="text-reset">{{$task->name}}</a></h6>
                                                        <small>{{$task->user->name}} - {{ \Carbon\Carbon::parse($task->created_at)->locale('id_ID')->diffForHumans() }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td class="text-end">
                                                <div class="btn-group dropstart">
                                                    <a class="text-dark" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu me-2 pt-2 pb-2 text-start">
                                                        <a class="dropdown-item align-items-center" href="#">
                                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item align-items-center"
                                                            href="#">
                                                            <i class="fa-solid fa-trash-can"></i> Tambah Materi
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2">
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-0">100 Point</h6>
                                                    <small>
                                                        {{$task->description}}
                                                    </small>
                                                </div>
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="d-flex">
                                                    <div class="col-lg-12">
                                                        <div class="card p-2 border border-secondary">
                                                            <div class="d-flex align-items-center">
                                                                <div class="col-lg-9 d-flex align-items-center">
                                                                    <img src="{{ asset('/img/icons/student-icon-01.svg') }}" class="img-fluid" alt="">
                                                                <p class="mb-0">halo</p>
                                                                </div>
                                                                <div class="col-lg-3 text-end">
                                                                    <button class="btn btn-primary mr-auto btn-sm rounded-3 p-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                                                                            <path fill="currentColor" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-6.5a6.5 6.5 0 1 0 0 13a6.5 6.5 0 0 0 0-13M6.5 7.75A.75.75 0 0 1 7.25 7h1a.75.75 0 0 1 .75.75v2.75h.25a.75.75 0 0 1 0 1.5h-2a.75.75 0 0 1 0-1.5h.25v-2h-.25a.75.75 0 0 1-.75-.75M8 6a1 1 0 1 1 0-2a1 1 0 0 1 0 2"/>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Customer Notes -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6">Tugas</h3>
                                <button class="btn btn-outline-primary rounded-3 w-100 mb-3 upload-button">
                                    <i class="fa-solid fa-plus"></i> Kumpulkan tugas
                                </button>
                                <div class="element"></div>
                                <section class="rounded progress-area"></section>
                                <section class="rounded uploaded-area"></section>
                                <button class="btn btn-primary rounded-3 w-100">
                                    Tandai sebagai selesai
                                </button>
                                <button id="submitButton" class="btn btn-warning text-light rounded-3 w-100 mt-2 d-none">
                                    Serahkan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // JavaScript
        const uploadButton = document.querySelector(".upload-button"),
            elementContainer = document.querySelector(".element"),
            progressArea = document.querySelector(".progress-area"),
            submit_button = document.querySelector('#submitButton'),
            // fakeButton = document.querySelector('#fake-button'),
            uploadedArea = document.querySelector(".uploaded-area");

        let uploadedFiles = []; // Array untuk menyimpan informasi file yang diunggah

        uploadButton.addEventListener("click", () => {
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
            newInput.setAttribute("multiple", true);
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
                // fakeButton.classList.add('disabled');
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
                    // fakeButton.classList.remove('disabled');
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

                    submit_button.classList.remove('d-none');
                    
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
    </script>
@endsection
