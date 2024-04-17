<!-- Navbar start -->
<div class="container-fluid fixed-top">
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="{{route('index')}}" class="navbar-brand py-2">
                <img src="assets/img/logo.jpg" width="150" height="80" alt="">
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto" >
                    <a href="{{route('index')}}" class="nav-item nav-link @if(Route::currentRouteName() =='index') active @endif">Home</a>
                    {{-- <a href="{{route('about_us')}}" class="nav-item nav-link {{ request()->is('/about-us') ? 'active' : ''}}">About Us</a> --}}
                    <a href="{{route('about_us')}}" class="nav-item nav-link @if(Route::currentRouteName() =='products') active @endif">About Us</a>
                    <a href="{{route('products')}}" class="nav-item nav-link @if(Route::currentRouteName() =='products') active @endif">Our Products</a>
                    <a href="{{route('team')}}" class="nav-item nav-link @if(Route::currentRouteName() =='team') active @endif">Our Team</a>
                    <a href="{{route('faqs')}}" class="nav-item nav-link @if(Route::currentRouteName() =='faqs') active @endif">FAQs</a>
                    <a href="{{route('contact_us')}}" class="nav-item nav-link @if(Route::currentRouteName() =='contact_us') active @endif">Contact Us</a>
                </div>
                {{-- <div class="d-flex m-3 me-0">
                    <a href="#" class="position-relative me-4 my-auto">
                        <i class="fa fa-shopping-bag fa-2x"></i>
                    </a>
                    <a href="#" class="my-auto">
                        <i class="fas fa-user fa-2x"></i>
                    </a>
                </div> --}}
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->