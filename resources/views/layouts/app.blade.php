<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel WEB APP</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    <header>
        <div class="header-top-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <ul class="top-bar-info list-inline-item ps-0 mb-0">
                            <li class="list-inline-item"><a href="mailto:example@example.com">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
      <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
    </svg>
                                rzkcode@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-md-end top-right-bar mt-2 mt-lg-0 call-now">
                            <a href="tel:+23-345-67890">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                </svg>
                                <!-- <span class="support-icon">Call Now : </span> -->
                                <span class="h5">+628-992-1899</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <nav class="navbar  sticky-top navbar-expand-lg navigation" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="" class="img-fluid">
                </a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icofont-navigation-menu"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarmain">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item active"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/about-us') }}">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Services
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ url('/services') }}">Web Design</a></li>
                                <li><a class="dropdown-item" href="{{ url('/services') }}">Logo Design</a></li>
                                <li><a class="dropdown-item" href="{{ url('/services') }}">T-shirt Design</a></li>
                                <li><a class="dropdown-item" href="{{ url('/services') }}">Book Cover Design</a></li>
                                <li><a class="dropdown-item" href="{{ url('/services') }}">View All</a></li>
                            </ul>
                            </li>                        
                        <li class="nav-item"><a class="nav-link" href="{{ url('/faq') }}">FAQ</a></li>
                        <li class="nav-item ">
                            <a class="nav-link " href="{{ url('/blog') }}">Blog</a>                            
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <main>

       @yield('content')
        
    </main>

    <footer class="footer section gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 mr-auto col-sm-6">
                    <div class="widget mb-5 mb-lg-0">
                        <div class="logo mb-4">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="" class="img-fluid">
                        </div>                        
                    </div>
                </div>    
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="widget mb-5 mb-lg-0">
                        <h4 class="text-capitalize mb-3">Services</h4>
                        <div class="divider mb-4"></div>
    
                        <ul class="list-unstyled footer-menu lh-35">
                            <li><a href="#!">Logo Design</a></li>
                            <li><a href="#!">Digital Marketing</a></li>
                            <li><a href="#!">T-shirt Design</a></li>
                            <li><a href="#!">Book Cover Design</a></li>                            
                        </ul>
                    </div>
                </div>
    
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="widget mb-5 mb-lg-0">
                        <h4 class="text-capitalize mb-3">Quick Links</h4>
                        <div class="divider mb-4"></div>
    
                        <ul class="list-unstyled footer-menu lh-35">
                            <li><a href="#!">Terms &amp; Conditions</a></li>
                            <li><a href="#!">Privacy Policy</a></li>
                            <li><a href="#!">About Us</a></li>                            
                            <li><a href="#!">Blog</a></li>                            
                        </ul>
                    </div>
                </div>
    
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="widget widget-contact mb-5 mb-lg-0">
                        <h4 class="text-capitalize mb-3">Get in Touch</h4>
                        <div class="divider mb-4"></div>
    
                        <div class="footer-contact-block mb-4">
                            
                            <h4 class="mt-2"><i class="fa-solid fa-envelope"></i> <a href="mailto:example@example.com">example@example.com</a></h4>
                            <h4 class="mt-2"><i class="fa-solid fa-phone-square" aria-hidden="true"></i> <a href="tel:+00-000-0000"> +XX-XXX-XXXX</a></h4>
                        </div>
    
                        <div class="footer-contact-block">
                            
                            <ul class="list-inline footer-socials mt-4">
                                <li class="list-inline-item">
                                    <a href="#"><i class="fa-brands fa-facebook-f"></i> </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="footer-btm py-4 mt-5">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6">
                        <div class="copyright">
                            Copyright © 2023 RZK CODE
                        </div>
                    </div>
                    
                </div>
    
                <div class="row">
                    <div class="col-lg-4">
                        <a class="backtop scroll-top-to reveal" href="#top">
                            <i class="icofont-long-arrow-up"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
</html>