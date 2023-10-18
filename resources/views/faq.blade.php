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
                            <div class="block text-center">
                                <span class="text-uppercase text-sm letter-spacing"></span>
                                <h1 class="mb-3 mt-3 text-center">FAQ</h1>        
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>                                                                        
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
            <div class="col-md-12 py-4">
                <div class="accordion" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                What does LOREM mean?
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum vitae, doloremque quaerat atque libero possimus veniam labore nam sint, expedita autem eius in? Perferendis, commodi reprehenderit eaque porro magnam similique! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias in quisquam dignissimos omnis a perferendis, animi, eligendi quo labore rem quas. Accusamus quidem rem consequatur vero culpa nostrum, assumenda exercitationem. </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Where can I subscribe to your newsletter?
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum vitae, doloremque quaerat atque libero possimus veniam labore nam sint, expedita autem eius in? Perferendis, commodi reprehenderit eaque porro magnam similique! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias in quisquam dignissimos omnis a perferendis, animi, eligendi quo labore rem quas. Accusamus quidem rem consequatur vero culpa nostrum, assumenda exercitationem. </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Can I order a free copy of a magazine to sample?
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum vitae, doloremque quaerat atque libero possimus veniam labore nam sint, expedita autem eius in? Perferendis, commodi reprehenderit eaque porro magnam similique! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias in quisquam dignissimos omnis a perferendis, animi, eligendi quo labore rem quas. Accusamus quidem rem consequatur vero culpa nostrum, assumenda exercitationem. </div>                                
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-headingFour">
                                Are you on Twitter, Facebook and other social media platforms?
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum vitae, doloremque quaerat atque libero possimus veniam labore nam sint, expedita autem eius in? Perferendis, commodi reprehenderit eaque porro magnam similique!</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-headingFour">
                                Do I need to create an account to make an order?
                            </button>
                        </h2>
                        <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum vitae, doloremque quaerat atque libero possimus veniam labore nam sint, expedita autem eius in? Perferendis, commodi reprehenderit eaque porro magnam similique!</div>
                        </div>
                    </div>
                </div>
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
                <div class="card border-0 ">
                    <img src="{{ asset('assets/images/logo-design.jpg') }}" class="card-img-top" alt="">
                    <div class="card-body p-3">
                        <h1 class="card-title mt-2"><a href="#">Logo Design</a></h1>
                        <div class="content pt-2">
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum, odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque? Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?</p>
                        </div>
                        <a href="#" class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>   
                <div class="card border-0">
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
                </div> 
            </div>
        </div>                
    </div>
</section>

@endsection