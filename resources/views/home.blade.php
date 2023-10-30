@extends('layouts.app')

@section('content')

<section class="hero">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('{{ asset('assets/images/banner.jpg') }}') ;">
                <div class="hero-background-overlay"></div>
                <div class="container h-100">
                    <div class="row align-items-center d-flex h-100">
                        <div class="col-md-7">
                            <div class="block" >
                                <div class="divider mb-3"></div>
                                <span class="text-uppercase text-sm letter-spacing">Bruce Lee
                                </span>
                                <h1 class="mb-3 mt-3">If you love life, don’t waste time, for time is what life is made up of</h1>                                        
                                <p class="mb-4 pr-5">A repudiandae ipsam labore ipsa voluptatum quidem quae laudantium quisquam aperiam maiores sunt fugit, deserunt rem suscipit placeat.</p>
                                <div class="btn-container ">
                                    <a href="appoinment.html" target="_blank" class="btn btn-primary">Contact Now <i class="icofont-simple-right ml-2  "></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
            <div class="carousel-item " style="background-image: url('{{ asset('assets/images/banner1.jpg') }}') ;">
                <div class="hero-background-overlay"></div>
                <div class="container h-100">
                    <div class="row align-items-center d-flex h-100">
                        <div class="col-md-7">
                            <div class="block" >
                                <div class="divider mb-3"></div>
                                <span class="text-uppercase text-sm letter-spacing">Leo Tolstoy, War and Peace</span>
                                <h1 class="mb-3 mt-3">The two most powerful warriors are patience and time.</h1>
                                
                                <p class="mb-4 pr-5">A repudiandae ipsam labore ipsa voluptatum quidem quae laudantium quisquam aperiam maiores sunt fugit, deserunt rem suscipit placeat.</p>
                                <div class="btn-container ">
                                    <a href="appoinment.html" target="_blank" class="btn btn-primary">Contact Now <i class="icofont-simple-right ml-2  "></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                            
            <div class="carousel-item" style="background-image: url('{{ asset('assets/images/banner24.jpg') }}') ;">
                <div class="hero-background-overlay"></div>
                <div class="container align-items-center d-flex h-100">
                    <div class="container h-100">
                        <div class="row align-items-center d-flex h-100">
                            <div  class="col-md-7">
                                <div class="block" >
                                    <div class="divider mb-3"></div>
                                    <span class="text-uppercase text-sm letter-spacing">Stephen R. Covey</span>
                                    <h1 class="mb-3 mt-3">The key is in not spending time, but in investing it.</h1>
                                    
                                    <p class="mb-4 pr-5">A repudiandae ipsam labore ipsa voluptatum quidem quae laudantium quisquam aperiam maiores sunt fugit, deserunt rem suscipit placeat.</p>
                                    <div class="btn-container ">
                                        <a href="appoinment.html" target="_blank" class="btn btn-primary">Contact Now <i class="icofont-simple-right ml-2  "></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                    
                          
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<section class="section-2  py-5">
    <div class="container py-2">
        <div class="row">
            @if(!empty($welcomes))
            @foreach ($welcomes as $welcome)
            <div class="col-md-6 align-items-center d-flex">
                <div class="about-block">
                    <h2 style="font-size: 35px" class="title-color">{{ $welcome->name }}</h2>
                    <div class="mt-2 mb-3 text-muted">{{ $welcome->short_desc }}</div>
                    <p>{!! $welcome->description !!}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="image-red-background">
                    {{-- <img src="{{ asset('assets/images/about-us.jpg') }}" alt="" class="w-100"> --}}
                    @if(!empty($welcome->image))
                    <img src="{{ asset('uploads/welcomes/thumb/small/'.$welcome->image) }}" class="card-img-top" alt="">
                   @else
                   <img src="{{ asset('uploads/placeholder.png') }}" class="card-img-top" alt="">
                   @endif
                </div>
                
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>

<section class="section-3 py-5">
    <div class="container">
        <div class="divider mb-3"></div>
        <h2 class="title-color mb-4 h1">Services</h2>
        <div class="cards">
            <div class="services-slider">
                
                @if(!empty($services))
                @foreach ($services as $service)
                <div class="card border-0 ">

                    @if(!empty($service->image))
                        <img src="{{ asset('uploads/services/thumb/small/'.$service->image) }}" class="card-img-top" alt="">
                       @else
                       <img src="{{ asset('uploads/placeholder.png') }}" class="card-img-top" alt="">
                       @endif

                    <div class="card-body p-3">
                        <h1 class="card-title mt-2"><a href="{{ url('/services/detail/'.$service->id) }}">{{ $service->name }}</a></h1>
                        <div class="content pt-2">
                            <p class="card-text">{{ $service->short_desc }}</p>
                        </div>
                        <a href="{{ url('/services/detail/'.$service->id) }}" class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
                @endforeach
                @endif
                
               {{--  <div class="card border-0">
                    <img src="{{ asset('assets/images/digital-marketing.jpg') }}" class="card-img-top" alt="">
                    <div class="card-body p-3">
                        <h1 class="card-title mt-2"><a href="#">Digital Marketing</a></h1>
                        <div class="content pt-2">
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum, odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque? Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?</p>
                        </div>                                
                        <a href="#" class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div> 
                <div class="card border-0">
                    <img src="{{ asset('assets/images/t-shirt-design.jpg') }}" class="card-img-top" alt="">
                    <div class="card-body p-3">
                        <h1 class="card-title mt-2"><a href="#">T-shirt Design</a></h1>
                        <div class="content pt-2">
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum, odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque? Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?</p>
                        </div>                                
                        <a href="#" class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>  

                <div class="card border-0">
                    <img src="{{ asset('assets/images/book-cover-design.jpg') }}" class="card-img-top" alt="">
                    <div class="card-body p-3">
                        <h1 class="card-title mt-2"><a href="#">Book Cover Design</a></h1>
                        <div class="content pt-2">
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum, odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque? Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?</p>
                        </div>                                
                        <a href="#" class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>  --}}
                
            </div>
        </div>                
    </div>
</section>

<section class="section-4 py-5 text-center">
    <div class="hero-background-overlay"></div>
    <div class="container">
       <div class="help-container">
            <h1 class="title">Do you need help?</h1>
            <p class="card-text mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum, odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque? Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?</p>
            <a href="{{ url('/contact') }}" class="btn btn-primary mt-3">Call Us Now <i class="fa-solid fa-angle-right"></i></a>
       </div>
    </div>
</section>


<section class="section-3 py-5">
    <div class="container">
        <div class="divider mb-3"></div>
        <h2 class="title-color mb-4 h1">Blog & News</h2>
        <div class="cards">
            <div class="services-slider">
                
                @if(!empty($blogs))
                @foreach ($blogs as $blog)
                    
                <div class="col-md-4 mb-4">
                    <div class="card border-0">
                        
                        @if(!empty($blog->image))
                        <img src="{{ asset('uploads/blogs/thumb/small/'.$blog->image) }}" class="card-img-top" alt="">
                        @else

                        @endif
                        
                        <div class="card-body p-3">
                            <h1 class="card-title mt-2"><a href="{{ route('blog-detail', $blog->id) }}">{{ $blog->name }} </a></h1>
                            <div class="content pt-2">
                                <p class="card-text">{{ $blog->short_desc }}</p>
                            </div>
                            <a href="{{ route('blog-detail', $blog->id) }}" class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div> 
                </div> 
                @endforeach
                @endif
            </div>
        </div>                
    </div>
</section>


{{-- <section class="section-3 py-5">
    <div class="container">
        <div class="divider mb-3"></div>
        <h2 class="title-color mb-4 h1">Blog & News</h2>
        <div class="cards">
            <div class="services-slider">
                <div class="card border-0 ">
                    <img src="{{ asset('assets/images/logo-design.jpg') }}" class="card-img-top" alt="">
                    <div class="card-body p-3">
                        <h1 class="card-title mt-2"><a href="#">Dummy Heading</a></h1>
                        <div class="content pt-2">
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum, odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque? Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?</p>
                        </div>
                        <a href="#" class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>   
                <div class="card border-0">
                    <img src="{{ asset('assets/images/digital-marketing.jpg') }}" class="card-img-top" alt="">
                    <div class="card-body p-3">
                        <h1 class="card-title mt-2"><a href="#">Dummy Heading</a></h1>
                        <div class="content pt-2">
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum, odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque? Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?</p>
                        </div>                                
                        <a href="#" class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div> 
                <div class="card border-0">
                    <img src="{{ asset('assets/images/t-shirt-design.jpg') }}" class="card-img-top" alt="">
                    <div class="card-body p-3">
                        <h1 class="card-title mt-2"><a href="#">Dummy Heading</a></h1>
                        <div class="content pt-2">
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum, odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque? Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?</p>
                        </div>                                
                        <a href="#" class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>  

                <div class="card border-0">
                    <img src="{{ asset('assets/images/book-cover-design.jpg') }}" class="card-img-top" alt="">
                    <div class="card-body p-3">
                        <h1 class="card-title mt-2"><a href="#">Book Cover Design</a></h1>
                        <div class="content pt-2">
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum, odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque? Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?</p>
                        </div>                                
                        <a href="#" class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div> 
            </div>
        </div>                
    </div>
</section> --}}

@endsection