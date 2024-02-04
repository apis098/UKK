<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from preschool.dreamstechnologies.com/template/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2024 17:10:51 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Preskool - Register</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" href="{{asset('/img/favicon.png')}}">
	
		<!-- Fontfamily -->
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&amp;display=swap" rel="stylesheet">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{asset('/plugins/feather/feather.css')}}">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{asset('/plugins/fontawesome/css/fontawesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('/plugins/fontawesome/css/all.min.css')}}">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="{{asset('/img/login.png')}}" alt="Logo">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Sign Up</h1>
								<p class="account-subtitle">Enter details to create your account</p>
								
								<!-- Form -->
								<form action="https://preschool.dreamstechnologies.com/template/login.html">
									<div class="form-group">
										<label >Username <span class="login-danger">*</span></label>
										<input class="form-control" type="text" >
										<span class="profile-views"><i class="fas fa-user-circle"></i></span>
									</div>
									<div class="form-group">
										<label >Email <span class="login-danger">*</span></label>
										<input class="form-control" type="text" >
										<span class="profile-views"><i class="fas fa-envelope"></i></span>
									</div>
									<div class="form-group">
										<label >Password <span class="login-danger">*</span></label>
										<input class="form-control pass-input" type="text" >
										<span class="profile-views feather-eye toggle-password"></span>
									</div>
									<div class="form-group">
										<label >Confirm password <span class="login-danger">*</span></label>
										<input class="form-control pass-confirm" type="text" >
										<span class="profile-views feather-eye reg-toggle-password"></span>
									</div>
									<div class=" dont-have">Already Registered?  <a href="/login">Login</a></div>
									<div class="form-group mb-0">
										<button class="btn btn-primary btn-block" type="submit">Register</button>
									</div>
								</form>
								<!-- /Form -->
								
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>
								
								<!-- Social Login -->
								<div class="social-login">
									<a href="#" ><i class="fab fa-google-plus-g"></i></a>
									<a href="#" ><i class="fab fa-facebook-f"></i></a>
									<a href="#" ><i class="fab fa-twitter"></i></a>
									<a href="#" ><i class="fab fa-linkedin-in"></i></a>
								</div>
								<!-- /Social Login -->
								
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="{{asset('/js/jquery-3.7.1.min.js')}}"></script>
		
		<script src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>
		
		<!-- Feather Icon JS -->
		<script src="{{asset('/js/feather.min.js')}}"></script>
		
		<!-- Custom JS -->
		<script src="{{asset('/js/script.js')}}"></script>
		
    </body>

<!-- Mirrored from preschool.dreamstechnologies.com/template/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2024 17:10:51 GMT -->
</html>