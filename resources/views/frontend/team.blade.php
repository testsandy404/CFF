@extends('layouts.template')
<!-- main layout -->

@section('content')

<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Our Team</h1>
</div>
<!-- Single Page Header End -->

<div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="row g-4 justify-content-center">
            <div class="col-12 col-md-6 col-lg-3 d-flex align-items-center justify-content-center">
                <div class="card border-0 border-bottom border-primary shadow-sm overflow-hidden bg-light" style="padding: 20px;">
                    <div class="card-body p-0">
                        <figure class="m-0 p-1">
                            <img class="img-fluid mx-auto d-block rounded" loading="lazy" src="assets/img/best-product-1.jpg" alt="">
                            <div class="featurs-content text-center">
                                <figcaption class="m-0 p-4">
                                    <h4 class="mb-1">Evander Mac</h4>
                                    <p class="text-secondary mb-0">Art Director</p>
                                </figcaption>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 d-flex align-items-center justify-content-center">
                <div class="card border-0 border-bottom border-primary shadow-sm overflow-hidden bg-light" style="padding: 20px;">
                    <div class="card-body p-0">
                        <figure class="m-0 p-1">
                            <img class="img-fluid mx-auto d-block rounded" loading="lazy" src="assets/img/best-product-1.jpg" alt="">
                            <div class="featurs-content text-center">
                                <figcaption class="m-0 p-4">
                                    <h4 class="mb-1">Evander Mac</h4>
                                    <p class="text-secondary mb-0">Art Director</p>
                                </figcaption>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 d-flex align-items-center justify-content-center">
                <div class="card border-0 border-bottom border-primary shadow-sm overflow-hidden bg-light" style="padding: 20px;">
                    <div class="card-body p-0">
                        <figure class="m-0 p-1">
                            <img class="img-fluid mx-auto d-block rounded" loading="lazy" src="assets/img/best-product-1.jpg" alt="">
                            <div class="featurs-content text-center">
                                <figcaption class="m-0 p-4">
                                    <h4 class="mb-1">Evander Mac</h4>
                                    <p class="text-secondary mb-0">Art Director</p>
                                </figcaption>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Video Element --}}
    <div class="row justify-content-center">
        <div class="d-flex align-items-center justify-content-center mt-5">
            <div class="card border-0 border-bottom border-primary shadow-sm overflow-hidden bg-light" style="padding: 20px;">
                <div class="card-body p-0">
                    <figure class="m-0 p-1">
                        <video width="920" height="480" style="max-width: 100%;" controls>
                            <source src="{{ asset('storage/video/docking.mp4') }}" type="video/mp4">
                          Your browser does not support the video tag.
                          </video>
                           <div class="featurs-content text-center">
                            <figcaption class="m-1 p-1 mb-n1">
                                <h4 class="mb-1 mt-3">Video Title</h4>
                                <p class="text-secondary mb-0">Video Caption</p>
                            </figcaption>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </div>

        
        
    </div>
</div>
@stop