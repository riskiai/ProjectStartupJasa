<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    @if (!empty(getSettings()) && getSettings()->website_title != '')
    <title>{{ getSettings()->website_title }}</title>
    @else
    <title>Jasa Design || Home Page</title>
    @endif
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <meta name="_token" content="{{ csrf_token() }}">
</head>
<body>
    <header class="sticky-header">
        <div class="header-top-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <ul class="top-bar-info list-inline-item ps-0 mb-0">
                            <li class="list-inline-item">
                                @if (!empty(getSettings()) && getSettings()->email != '')

                                <a href="mailto:{{  getSettings()->email }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                                 </svg>
                                {{  getSettings()->email }}</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-md-end top-right-bar mt-2 mt-lg-0 call-now">
                            @if (!empty(getSettings()) && getSettings()->phone != '')
                            <a href="tel:{{ getSettings()->phone }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                </svg>
                                <span class="h5">{{ getSettings()->phone }}</span>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <nav class="navbar sticky-top navbar-expand-lg navigation" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('assets/images/riski.png') }}" alt="" class="img-logo1 img-fluid">
                </a>

                <div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
                    </button>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
                    </button>
                    
                </div>
                  
                <div class="collapse navbar-collapse" id="navbarmain">
                    <ul class="navbar-nav ms-auto bar">
                        {{-- nav-item active --}}
                        <li class="nav-item "><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                        <li class="nav-item "><a class="nav-link" href="{{ url('/about-us') }}">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Services
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                
                                @if(!empty(getServices()))
                                @foreach (getServices() as $service)
                                <li>
                                    <a class="dropdown-item" href="{{ url("/services/detail/".$service->id) }}">{{ $service->name }}</a>
                                </li>
                                @endforeach
                                @endif
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
                            <a href="{{ url('/') }}"><img src="{{ asset('assets/images/riski.png') }}" style alt="" class="img-logo1 img-fluid"></a>
                       
                        </div>                        
                    </div>
                </div>    
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="widget mb-5 mb-lg-0">
                        <h4 class="text-capitalize mb-3">Services</h4>
                        <div class="divider mb-4"></div>
    
                        <ul class="list-unstyled footer-menu lh-35">
                            @if(!empty(getServices()))
                                @foreach (getServices() as $service)
                                <li>
                                    <a href="{{ url("/services/detail/".$service->id) }}">{{ $service->name }}</a>
                                </li>
                                @endforeach
                            @endif
                            {{-- <li><a href="#!">Digital Marketing</a></li>
                            <li><a href="#!">T-shirt Design</a></li>
                            <li><a href="#!">Book Cover Design</a></li>                             --}}
                        </ul>
                    </div>
                </div>
    
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="widget mb-5 mb-lg-0">
                        <h4 class="text-capitalize mb-3">Quick Links</h4>
                        <div class="divider mb-4"></div>
    
                        <ul class="list-unstyled footer-menu lh-35">
                            <li><a href="{{ route('terms') }}">Terms &amp; Conditions</a></li>
                            <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                            <li><a href="{{ route('about') }}">About Us</a></li>                            
                            <li><a href="{{ route('blog.front') }}">Blog</a></li>                            
                        </ul>
                    </div>
                </div>
    
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="widget widget-contact mb-5 mb-lg-0">
                        <h4 class="text-capitalize mb-3">Get in Touch</h4>
                        <div class="divider mb-4"></div>
    
                        <div class="footer-contact-block mb-4">
                            
                            <h4 class="mt-2">                           
                                @if (!empty(getSettings()) && getSettings()->email != '')
                                <i class="fa-solid fa-envelope"></i>   
                                <a href="mailto:{{ getSettings()->email }}">{{ getSettings()->email }}</a>
                                @endif
                            </h4>
                            <h4 class="mt-2">
                                @if (!empty(getSettings()) && getSettings()->phone != '')
                                <i class="fa-solid fa-phone-square" aria-hidden="true"></i>
                                <a href="tel:{{ getSettings()->phone }}">{{ getSettings()->phone }}</a>
                                @endif
                            </h4>
                        </div>
    
                        <div class="footer-contact-block">
                            
                            <ul class="list-inline footer-socials mt-4">
                                @if (!empty(getSettings()) && getSettings()->facebook_url != '')
                                <li class="list-inline-item">
                                    <a href="{{ getSettings()->facebook_url }}"><i class="fa-brands fa-facebook-f"></i> </a>
                                </li>
                                @endif

                                @if (!empty(getSettings()) && getSettings()->twiter_url != '')
                                <li class="list-inline-item">
                                    <a href="{{ getSettings()->twiter_url }}"><i class="fa-brands fa-twitter"></i></a>
                                </li>
                                @endif

                                @if (!empty(getSettings()) && getSettings()->instagram_url != '')
                                <li class="list-inline-item">
                                    <a href="{{ getSettings()->instagram_url  }}"  target="_blank"><i class="fa-brands fa-instagram" ></i></a>
                                </li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="footer-btm py-4 mt-5">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6">
                        <div class="copyright">
                            @if (!empty(getSettings()) && getSettings()->copy != '')
                            {{ getSettings()->copy }}
                            @endif
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

<script>
    var $ = jQuery.noConflict();
 </script> 





<script>

            $.ajaxSetup({
                headers:  {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

</script>

@yield('extraJs')