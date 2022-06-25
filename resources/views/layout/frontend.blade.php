<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png') }}" type="image/x-icon">
    <title>E-School | Start Learing With Us</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/fontawesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/feather-icon.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owlcarousel.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{asset('assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css') }}">

    <!-- E-school custom css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/e-school.css') }}">
    <!--toastr notification css-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

</head>

<body class="landing-wrraper">
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper landing-page">
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- header start-->
            <header class="landing-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <nav class="navbar navbar-light p-0" id="navbar-example2"><a class="navbar-brand" href="javascript:void(0)">

                                    <!-- <img class="img-fluid" src="{{asset('assets/images/logo/logo.png') }}" alt=""> -->
                                    <h2 style="color: #0f4129;font-size: 30px;">E-School</h2>
                                </a>
                                <ul class="landing-menu nav nav-pills">
                                    <li class="nav-item menu-back">back<i class="fa fa-angle-right"></i></li>
                                    <li class="nav-item"><a class="nav-link" href="{{route('landing')}}">Home</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{route('chooseSubject')}}">Subject</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('student.profile') }}">My Acount</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{route('mySubjects')}}">My Subject</a></li>
                                </ul>
                                <div class="buy-block user-info-dropdown">
                                    <div class="nav-right col right-menu p-0">
                                        <ul class="nav-menus">
                                            <li class="onhover-dropdown">
                                                <div class="bookmark-box">
                                                    <div class="avatar">

                                                        @if(Auth::user()->image != NULL)
                                                        <img class="img-70 rounded-circle" alt="" src="{{ url('files/students', Auth::user()->image ) }}" />
                                                        @else
                                                        <img class="img-70 rounded-circle" alt="" src="{{ asset('/assets/images/user/eschool.png') }}" />
                                                        @endif
                                                        <span>{{ Auth::user()->first_name .' '. Auth::user()->last_name}}</span>
                                                        <i data-feather="chevron-down"></i>
                                                    </div>
                                                </div>
                                                <div class="bookmark-dropdown onhover-show-div">
                                                    <ul class="m-t-5">
                                                        <li class="add-to-bookmark"><a href="{{route('admin.dashboard')}}"><i class="bookmark-icon" data-feather="home"></i>Dashboard</a></li>
                                                        <li class="add-to-bookmark"><a href="{{route('mySubjects')}}"><i class="bookmark-icon" data-feather="sunrise"></i>My Courses</a></li>
                                                        <li class="add-to-bookmark"><a href="{{route('myMarks')}}"><i class="bookmark-icon" data-feather="award"></i>My Marks</a></li>

                                                        <li class="add-to-bookmark"><a href="{{route('student.profile')}}"><i class="bookmark-icon" data-feather="user"></i>My Account</a></li>

                                                        <li class="add-to-bookmark"><a href="{{route('changePassword')}}"><i class="bookmark-icon" data-feather="lock"></i>Change Password</a></li>
                                                        <li class="add-to-bookmark"><a href="{{ url('logout')}}"><i class="bookmark-icon" data-feather="log-out"></i>Log Out</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="toggle-menu"><i class="fa fa-bars"></i></div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>
            <!-- header end-->
            @yield('content')
            <div class="sub-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-2">
                            <div class="footer-contain">

                                <!-- <img class="img-fluid" src="{{asset('assets/images/logo/logo.png') }}" alt=""> -->
                                <h3 style="color: #0f4129;font-size: 25px;">E-School</h3>

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-10">
                            <div class="footer-contain">
                                <p class="mb-0">Copyright 2021-22 © viho All rights reserved. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer end-->
        </div>
    </div>
    <!-- latest jquery-->
    <script src="{{asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{asset('assets/js/sidebar-menu.js') }}"></script>
    <script src="{{asset('assets/js/config.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('assets/js/bootstrap/popper.min.js') }}"></script>
    <script src="{{asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- Plugins JS start-->
    <script src="{{asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{asset('assets/js/owlcarousel/owl-custom.js') }}"></script>
    <script src="{{asset('assets/js/landing_sticky.js') }}"></script>
    <script src="{{asset('assets/js/landing.js') }}"></script>
    <script src="{{asset('assets/js/jarallax_libs/libs.min.js') }}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{asset('assets/js/script.js') }}"></script>
    <!-- login js-->


    <!-----------------js for toastr notification----------------->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @if(Session::has('success'))
    <script>
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.success('{{ Session::get('success') }}', 'Success')
    </script>
    @endif
    @if(Session::has('error'))
    <script>
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.error('{{ Session::get('error') }}', 'Error')
    </script>
    @endif
    @if(Session::has('info'))
    <script>
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.info('{{ Session::get('info') }}', 'Info')
    </script>
    @endif
    @if(Session::has('warning'))
    <script>
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.warning('{{ Session::get('warning') }}', 'Warning')
    </script>
    @endif
    <!-----------------//----------------->
    <!-- Plugin used-->
    @yield('footer-js')

</body>

</html>