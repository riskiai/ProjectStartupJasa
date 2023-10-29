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
                                <h1 class="mb-3 mt-3 text-center">Contact us</h1>        
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>                                                                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                
    </div>
</section>

<section class="pt-5 pb-0" >
    <div class="container contact-box">
        <div class="row">
            <div class="col-lg-8 col-xl-6 text-center mx-auto">
                <h1 class="mb-4 text-black">We're here to help!</h1>
            </div>
        </div>

        <!-- Contact info box -->
        <div class="row g-4 g-md-5 mt-0 mt-lg-3">
            <!-- Box item -->
            @if(!empty($settings) && $settings->contact_card_one != '')
            <div class="col-lg-4 mt-lg-0">
                <div class="card card-body bg-primary shadow py-5 text-center h-100 border-0 text-white card-one">
                    <!-- Title -->
                    {!!  $settings->contact_card_one !!}
                   {{--  <h5 class="text-white mb-3">Customer Support</h5>
                    <ul class="list-inline mb-0">
                        <!-- Address -->
                        <li class="list-item mb-3">
                            <a href="#" class="text-white"> <i class="fas fa-fw fa-map-marker-alt me-2 mt-1"></i>Example Cop.  Park Street, MI 22222</a>
                        </li>
                        <!-- Phone number -->
                        <li class="list-item mb-3">
                            <a href="#" class="text-white"> <i class="fas fa-fw fa-phone-alt me-2"></i>(XXX) XXX-XXXX </a>
                        </li>
                        <!-- Email id -->
                        <li class="list-item mb-0">
                            <a href="#" class="text-white"> <i class="far fa-fw fa-envelope me-2"></i>example@email.com </a>
                        </li>
                    </ul> --}}
                </div>
            </div>
            @endif

            <!-- Box item -->
            @if(!empty($settings) && $settings->contact_card_two != '')
            <div class="col-lg-4 mt-lg-0">
                <div class="card card-body shadow py-5 text-center h-100 border-0">
                    <!-- Title -->
                    {!!  $settings->contact_card_two !!}
                </div>
            </div>
            @endif

            <!-- Box item -->
            @if(!empty($settings) && $settings->contact_card_three != '')
            <div class="col-lg-4 mt-lg-0">
                <div class="card card-body shadow py-5 text-center h-100 border-0">
                    <!-- Title -->
                    {!!  $settings->contact_card_three !!}
                </div>
            </div>
            @endif

        </div>
    </div>
</section>

<section>
    <div class="container my-5">
        <div class="row g-4 g-lg-0 align-items-center">                   

            <!-- Contact form START -->
            <div class="col-md-12">
                <!-- Title -->
                <h2 class="mt-4 mt-md-0">Let's talk</h2>
                <p>To request a quote or want to meet up for coffee, contact us directly or fill out the form and we will get back to you promptly</p>
                    
                <form>
                    <!-- Name -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4 bg-light-input">
                                <label for="yourName" class="form-label">Your name *</label>
                                <input type="text" class="form-control form-control-lg" id="yourName">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4 bg-light-input">
                                <label for="emailInput" class="form-label">Email address *</label>
                                <input type="email" class="form-control form-control-lg" id="emailInput">
                            </div>
                        </div>
                    </div>

                    <!-- Message -->
                    <div class="mb-4 bg-light-input">
                        <label for="textareaBox" class="form-label">Message *</label>
                        <textarea class="form-control" id="textareaBox" rows="4"></textarea>
                    </div>
                    <!-- Button -->
                    <div class="d-grid">
                        <button class="btn btn-lg btn-primary mb-0" type="button">Send Message</button>
                    </div>	
                </form>
            </div>
            <!-- Contact form END -->
        </div>
    </div>
</section>

<section class="pt-0 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <iframe class="w-100 h-400px grayscale rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.9663095343008!2d-74.00425878428698!3d40.74076684379132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259bf5c1654f3%3A0xc80f9cfce5383d5d!2sGoogle!5e0!3m2!1sen!2sin!4v1586000412513!5m2!1sen!2sin" height="500" style="border:0;" aria-hidden="false" tabindex="0"></iframe>	
            </div>
        </div>
    </div>
</section>

@endsection