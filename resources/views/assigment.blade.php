@extends('layouts.app')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Blog List -->
            <div class="row">
                <div class="col-md-9">
                    <ul class="list-links mb-4">
                        <li class="active"><a href="blog.html">Active Blog</a></li>
                        <li><a href="pending-blog.html">Pending Blog</a></li>
                    </ul>
                </div>
                <div class="col-md-3 text-md-end">
                    <a href="add-blog.html" class="btn btn-primary btn-blog mb-3"><i class="feather-plus-circle me-1"></i>
                        Add New</a>
                </div>
            </div>

            <div class="row">

                <!-- Blog Post -->
                <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
                    <div class="blog grid-blog flex-fill">
                        <div class="blog-image">
                            <a href="blog-details.html"><img class="img-fluid" src="{{asset('/img/class1.jpg')}}"
                                    alt="Post Image"></a>
                            <div class="blog-views">
                                <i class="feather-eye me-1"></i> 225
                            </div>

                        </div>
                        <div class="blog-content">
                            <ul class="entry-meta meta-item">
                                <li>
                                    <div class="post-author">
                                        <a href="profile.html">
                                            <img src="{{asset('/img/profiles/avatar-01.jpg')}}" alt="Post Author">
                                            <span>
                                                <span class="post-title">Vincent</span>
                                                <span class="post-date"><i class="far fa-clock"></i> 4 Dec 2022</span>
                                            </span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            <h3 class="blog-title"><a href="blog-details.html">Learning is an objective, Lorem Ipsum is not
                                </a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>
                        </div>
                        <div class="row">
                            <div class="edit-options">
                                <div class= "edit-delete-btn">
                                    <a href="edit-blog.html" class="text-success"><i class="feather-edit-3 me-1"></i>
                                        Edit</a>
                                    <a href="#" class="text-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"><i class="feather-trash-2 me-1"></i> Delete</a>
                                </div>
                                <div class="text-end inactive-style">
                                    <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteNotConfirmModal"><i class="feather-eye-off me-1"></i>
                                        Inactive</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Blog Post -->

                <!-- Blog Post -->
                <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
                    <div class="blog grid-blog flex-fill">
                        <div class="blog-image">
                            <a href="blog-details.html"><img class="img-fluid" src="{{asset('/img/class2.jpg')}}"
                                    alt="Post Image"></a>
                            <div class="blog-views">
                                <i class="feather-eye me-1"></i> 132
                            </div>

                        </div>
                        <div class="blog-content">
                            <ul class="entry-meta meta-item">
                                <li>
                                    <div class="post-author">
                                        <a href="profile.html">
                                            <img src="{{asset('/img/profiles/avatar-02.jpg')}}" alt="Post Author">
                                            <span>
                                                <span class="post-title">Lois A</span>
                                                <span class="post-date"><i class="far fa-clock"></i> 4 Dec 2022</span>
                                            </span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            <h3 class="blog-title"><a href="blog-details.html">Discussion Increase student learning</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>
                        </div>
                        <div class="row">
                            <div class="edit-options">
                                <div class= "edit-delete-btn">
                                    <a href="edit-blog.html" class="text-success"><i class="feather-edit-3 me-1"></i>
                                        Edit</a>
                                    <a href="edit-blog.html" class="text-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"><i class="feather-trash-2 me-1"></i></i> Delete</a>
                                </div>
                                <div class="text-end inactive-style">
                                    <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteNotConfirmModal"><i class="feather-eye-off me-1"></i>
                                        Inactive</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Blog Post -->

                <!-- Blog Post -->
                <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
                    <div class="blog grid-blog flex-fill">
                        <div class="blog-image">
                            <a href="blog-details.html"><img class="img-fluid" src="{{asset('/img/class3.jpg')}}"
                                    alt="Post Image"></a>
                            <div class="blog-views">
                                <i class="feather-eye me-1"></i> 344
                            </div>

                        </div>
                        <div class="blog-content">
                            <ul class="entry-meta meta-item">
                                <li>
                                    <div class="post-author">
                                        <a href="profile.html">
                                            <img src="{{asset('/img/profiles/avatar-03.jpg')}}" alt="Post Author">
                                            <span>
                                                <span class="post-title">Levell Scott</span>
                                                <span class="post-date"><i class="far fa-clock"></i> 4 Dec 2022</span>
                                            </span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            <h3 class="blog-title"><a href="blog-details.html">Music reduces stress,Lorem Ipsum is not
                                </a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>
                        </div>
                        <div class="row">
                            <div class="edit-options">
                                <div class= "edit-delete-btn">
                                    <a href="edit-blog.html" class="text-success"><i class="feather-edit-3 me-1"></i>
                                        Edit</a>
                                    <a href="edit-blog.html" class="text-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"><i class="feather-trash-2 me-1"></i></i> Delete</a>
                                </div>
                                <div class="text-end inactive-style">
                                    <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteNotConfirmModal"><i class="feather-eye-off me-1"></i>
                                        Inactive</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Blog Post -->

                <!-- Blog Post -->
                <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
                    <div class="blog grid-blog flex-fill">
                        <div class="blog-image">
                            <a href="blog-details.html"><img class="img-fluid" src="{{asset('/img/class4.jpg')}}"
                                    alt="Post Image"></a>
                            <div class="blog-views">
                                <i class="feather-eye me-1"></i> 215
                            </div>

                        </div>
                        <div class="blog-content">
                            <ul class="entry-meta meta-item">
                                <li>
                                    <div class="post-author">
                                        <a href="profile.html">
                                            <img src="{{asset('/img/profiles/avatar-04.jpg')}}" alt="Post Author">
                                            <span>
                                                <span class="post-title">Calvin</span>
                                                <span class="post-date"><i class="far fa-clock"></i> 4 Dec 2022</span>
                                            </span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            <h3 class="blog-title"><a href="blog-details.html">Sports reduced risk of obesity, Lorem Ipsum
                                    is not </a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>
                        </div>
                        <div class="row">
                            <div class="edit-options">
                                <div class= "edit-delete-btn">
                                    <a href="edit-blog.html" class="text-success"><i class="feather-edit-3 me-1"></i>
                                        Edit</a>
                                    <a href="edit-blog.html" class="text-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"><i class="feather-trash-2 me-1"></i></i> Delete</a>
                                </div>
                                <div class="text-end inactive-style">
                                    <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteNotConfirmModal"><i class="feather-eye-off me-1"></i>
                                        Inactive</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Blog Post -->

                <!-- Blog Post -->
                <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
                    <div class="blog grid-blog flex-fill">
                        <div class="blog-image">
                            <a href="blog-details.html"><img class="img-fluid" src="{{asset('/img/class5.jpg')}}"
                                    alt="Post Image"></a>
                            <div class="blog-views">
                                <i class="feather-eye me-1"></i> 285
                            </div>

                        </div>
                        <div class="blog-content">
                            <ul class="entry-meta meta-item">
                                <li>
                                    <div class="post-author">
                                        <a href="profile.html">
                                            <img src="{{asset('/img/profiles/avatar-05.jpg')}}" alt="Post Author">
                                            <span>
                                                <span class="post-title">Aaliyah </span>
                                                <span class="post-date"><i class="far fa-clock"></i> 4 Dec 2022</span>
                                            </span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            <h3 class="blog-title"><a href="blog-details.html">Yoga can ease arthritis symptoms</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>
                        </div>
                        <div class="row">
                            <div class="edit-options">
                                <div class= "edit-delete-btn">
                                    <a href="edit-blog.html" class="text-success"><i class="feather-edit-3 me-1"></i>
                                        Edit</a>
                                    <a href="edit-blog.html" class="text-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"><i class="feather-trash-2 me-1"></i></i> Delete</a>
                                </div>
                                <div class="text-end inactive-style">
                                    <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteNotConfirmModal"><i class="feather-eye-off me-1"></i>
                                        Inactive</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Blog Post -->

                <!-- Blog Post -->
                <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
                    <div class="blog grid-blog flex-fill">
                        <div class="blog-image">
                            <a href="blog-details.html"><img class="img-fluid" src="{{asset('/img/class6.jpg')}}"
                                    alt="Post Image"></a>
                            <div class="blog-views">
                                <i class="feather-eye me-1"></i> 654
                            </div>

                        </div>
                        <div class="blog-content">
                            <ul class="entry-meta meta-item">
                                <li>
                                    <div class="post-author">
                                        <a href="profile.html">
                                            <img src="{{asset('/img/profiles/avatar-06.jpg')}}" alt="Post Author">
                                            <span>
                                                <span class="post-title">Malynne</span>
                                                <span class="post-date"><i class="far fa-clock"></i> 4 Dec 2022</span>
                                            </span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            <h3 class="blog-title"><a href="blog-details.html">Education gives Greater Sense of
                                    Disciplinet</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>
                        </div>
                        <div class="row">
                            <div class="edit-options">
                                <div class= "edit-delete-btn">
                                    <a href="edit-blog.html" class="text-success"><i class="feather-edit-3 me-1"></i>
                                        Edit</a>
                                    <a href="edit-blog.html" class="text-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"><i class="feather-trash-2 me-1"></i> Delete</a>
                                </div>
                                <div class="text-end inactive-style">
                                    <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteNotConfirmModal"><i class="feather-eye-off me-1"></i>
                                        Inactive</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Blog Post -->


            </div>
            <!-- Pagination -->
            <div class="row ">
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
            </div>
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
