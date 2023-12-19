<footer class="footer section gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mr-auto col-sm-6">
                <div class="widget mb-5 mb-lg-0">
                    <div class="logo mb-4">
                        <a href="{{ url('/') }}"><img src="{{ asset('assets/images/LogoCahaya.png') }}" style alt="" class="img-logo1 img-fluid"></a>
                   
                    </div>                        
                </div>
            </div>    
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="widget mb-5 mb-lg-0">
                    <h4 class="text-capitalize mb-3">Jasa</h4>
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
                        <li><a href="{{ route('about') }}">Tentang Kami</a></li>                            
                        <li><a href="{{ route('blog.front') }}">Artikel</a></li>                            
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="widget widget-contact mb-5 mb-lg-0">
                    <h4 class="text-capitalize mb-3">Hubungi Kami</h4>
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