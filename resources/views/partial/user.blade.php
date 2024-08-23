<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('user/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

     {{-- Font Awesome --}}
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">

</head>

<body class="animsition">
       <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">Job</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Portal</span>
                </a>
                {{-- <a href="" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">Job</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Site</span>
                </a> --}}
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Job</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Portal</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                            {{-- <a href="{{ route('home') }}" class="nav-item nav-link">About Us</a> --}}
                        </div>
                        <div class="navbar-nav py-0 d-none d-lg-block mr-0">
                            <div class="btn-group">
                                @if (Auth::check())
                                    <div class="">
                                        <form action="{{ route('auth#logout') }}" method="post" class="d-flex justify-content-center">
                                            @csrf
                                            <input type="submit" value="Logout" class="bg-none" style="background-color: #3d464d;outline: none;border:none;color:#fff;">
                                        </form>
                                    </div>
                                @else
                                    <div class="">

                                        <a href="{{ route('auth#registerPage') }}" class="nav-item nav-link active">Sign Up</a>

                                    </div>
                                    <div class="">
                                        <a href="{{ route('auth#loginPage') }}" class="nav-item nav-link active">Sign In</a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="navbar-nav py-0 d-lg-none mr-0">
                            <div>
                                @if (Auth::check())
                                    <div class="">
                                        <form action="{{ route('auth#logout') }}" method="post" class="nav-item nav-link active">
                                            @csrf
                                            <input type="submit" value="Logout" class="bg-none p-0" style="background-color: #3d464d;outline: none;border:none;color:#fff;">
                                        </form>
                                    </div>
                                @else
                                    <div class="">
                                        <a href="{{ route('auth#registerPage') }}" class="nav-item nav-link active">Sign Up</a>
                                    </div>
                                    <div class="">
                                        <a href="{{ route('auth#loginPage') }}" class="nav-item nav-link active">Sign In</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    @yield('content')

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5">

        <div class="row mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            {{-- <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="#">Domain</a>. All Rights Reserved. Designed
                    by
                    <a class="text-primary" href="https://htmlcodex.com">Khing Zin Min Aung</a>
                </p>
            </div> --}}
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5 pt-4">
                <h5 class="text-secondary text-uppercase mb-4 mt-4">Get In Touch</h5>
                <p class="mb-2"><i class="fa fa-user-alt text-primary" style="margin-right: 12px;"></i>Khaing Zin Min Aung</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary" style="margin-right: 16px;"></i>Kyaukse, Myanmar.</p>
                <a href="mailto:khaingzinminaung99@gmail.com"><p class="mb-2"><i class="fa fa-envelope text-primary" style="margin-right: 12px;"></i>khaingzinminaung99@gmail.com</p></a>
                <a href="tel:+959970222622"><p class="mb-0"><i class="fa fa-phone-alt text-primary" style="margin-right: 12px;"></i>+959970222622</p></a>
            </div>
            {{-- <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div> --}}
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('user/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('user/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('user/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('user/mail/contact.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('user/js/main.js') }}"></script>


</body>

</html>
<!-- end document-->
