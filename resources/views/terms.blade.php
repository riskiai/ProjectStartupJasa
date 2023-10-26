@extends('layouts.app')

@section('content')
<section class="hero-small">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('{{ asset('assets/images/banner1.jpg') }}') ;">
                <div class="hero-small-background-overlay"></div>
                <div class="container  h-100">
                    <div class="row align-items-center d-flex h-100">
                        <div class="col-md-12">
                            <div class="block">
                                <span class="text-uppercase text-sm letter-spacing"></span>
                                <h1 class="mb-3 mt-3 text-center">{{ $page->name }}</h1>                                                                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                
    </div>
</section>

<section class="section-2  py-5">
    <div class="container py-2">
        <div class="row">
            <div class="col-md-6 align-items-center d-flex">
                <div class="about-block">
                    <h1 class="title-color mb-3">{{ $page->name }}</h1>
                    {!! $page->content !!}

                    {{-- <p>This is a great space to write long text about your company and your services. You can use this space to go into a little more detail about your company. Talk about your team and what services you provide. Tell your visitors the story of how you came up with the idea for your business and what makes you different from your competitors. Make your company stand out and show your visitors who you are.</p>
                    <p>This is a great space to write long text about your company and your services. You can use this space to go into a little more detail about your company. Talk about your team and what services you provide. Tell your visitors the story of how you came up with the idea for your business and what makes you different from your competitors. Make your company stand out and show your visitors who you are.</p> --}}
                </div>
            </div>

            @if ($page->image != null)
             
                    <div class="col-md-6">
                        <div class="image-red-background">
                            {{-- <img src="{{ asset('assets/images/about-us.jpg') }}" alt="" class="w-100"> --}}

                            <img src="{{ asset('uploads/pages/thumb/large/'.$page->image) }}" alt="" class="w-100">

                        </div>
                    </div>

            @endif


        </div>
    </div>
</section>


<section class="section-4 py-5 text-center">
    <div class="hero-background-overlay"></div>
    <div class="container">
       <div class="help-container">
            <h1 class="title">Do you need help?</h1>
            <p class="card-text mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum, odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque? Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?</p>
            <a href="#" class="btn btn-primary mt-3">Call Us Now <i class="fa-solid fa-angle-right"></i></a>
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


@endsection