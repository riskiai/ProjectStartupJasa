@extends('layouts.app')

@section('content')
<section class="hero-small">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('{{ asset('assets/images/banner1.jpg') }}') ;">
                <div class="hero-background-overlay"></div>
                <div class="container  h-100">
                    <div class="row align-items-center d-flex h-100">
                        <div class="col-md-12">
                            <div class="block text-center">
                                <span class="text-uppercase text-sm letter-spacing"></span>
                                <h1 class="mb-3 mt-3 text-center">Services</h1>        
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>                                                                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                
    </div>
</section>

<section class="section-3 py-5">
    <div class="container">
        <div class="divider mb-3"></div>
        <h2 class="title-color mb-4 h1">Jasa</h2>
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
            </div>
        </div>                
    </div>
</section>

<section class="section-4 py-5 text-center">
    <div class="hero-background-overlay"></div>
    <div class="container">
       <div class="help-container">
            <h1 class="title">Apakah Perlu Bantuan ?</h1>
            <p class="card-text mt-3">Temukan solusi desain yang kreatif dan menginspirasi di PT Cahaya Kreatif. Kami siap membantu mewujudkan ide-ide Anda menjadi kenyataan. Jelajahi penawaran promosi kami dan berikan sentuhan unik pada proyek Anda.</p>
            <a href="{{ route('contact') }}" class="btn btn-primary mt-3">Hubungi Kami <i class="fa-solid fa-angle-right"></i></a>
       </div>
    </div>
</section>


<section class="section-3 py-5">
    <div class="container">
        <div class="divider mb-3"></div>
        <h2 class="title-color mb-4 h1">Artikel</h2>
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

              {{--   <div class="card border-0">
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
@endsection