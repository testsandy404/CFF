@extends('layouts.template')
<!-- main layout -->

@section('content')
<!-- Hero Start -->
<div class="container-fluid mb-5 hero-header">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-md-12 col-lg-5">
                <h4 class="mb-3 text-secondary">100% Organic Foods</h4>
                <h1 class="mb-5 display-3 text-primary">Chef's Frozen<br />Foods</h1>
            </div>
            <div class="col-md-12 col-lg-7">
                <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        @if(count($bannerData) > 0)
                        @foreach($bannerData as $sr => $banner)
                        @if($sr == 1)
                        <div class="carousel-item active rounded">
                            <img src="{{asset('storage/uploads/banners/'.$banner->image)}}" class="img-fluid w-100 h-100 bg-secondary rounded" alt="{{$banner->title}}">
                        </div>
                        @else
                        <div class="carousel-item rounded">
                            <img src="{{asset('storage/uploads/banners/'.$banner->image)}}" class="img-fluid w-100 h-100 bg-secondary rounded" alt="{{$banner->title}}">
                        </div>
                        @endif
                        @endforeach
                        @endif
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- Brands Start -->
<div class="container-fluid brands py-2">
    <div class="container py-5">
        <div class="brands-header text-center">
            <h4 class="display-5 text-primary mb-5">Our Brands</h4>
        </div>
        <div class="owl-carousel brands-carousel">
            @if(count($brandData) > 0)
            @foreach($brandData as $brand)
            <div class="brands-item img-border-radius bg-light rounded p-4">
                <img src="{{asset('storage/uploads/brands/'.$brand->logo)}}" class="" alt="{{$brand->name}}">
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
<!-- Brands End -->

<!-- Featurs (How we work) Section Start -->
<div class="container-fluid featurs pb-5">
    <div class="container py-5">
        <div class="brands-header text-center">
            <h4 class="display-5 text-primary mb-5">How we work</h4>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-car-side fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>Free Shipping</h5>
                        <p class="mb-0">Free on order over $300</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-user-shield fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>Security Payment</h5>
                        <p class="mb-0">100% security payment</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-exchange-alt fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>30 Day Return</h5>
                        <p class="mb-0">30 day money guarantee</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fa fa-phone-alt fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>24/7 Support</h5>
                        <p class="mb-0">Support every time fast</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Featurs (How we work) Section End -->

<!-- Our Products-->
<div class="container-fluid vesitable py-3">
    <div class="container">
        <div class="text-center mx-auto mb-2" style="max-width: 700px;">
            <h1 class="display-4">Popular Products</h1>
            <p>Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
        </div>
        <div class="owl-carousel vegetable-carousel justify-content-center">
            @if(count($productData) > 0)
            @foreach($productData as $product)
            <div class="border border-primary rounded position-relative vesitable-item">
                <div class="vesitable-img">
                    <img src="{{asset('storage/uploads/products/'.$product->thumbnail)}}" class="img-fluid w-100 rounded-top" alt="{{$product->name}}">
                </div>
                <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">{{$product->brand->name}}</div>
                <div class="p-4 rounded-bottom">
                    <h4>{{$product->name}}</h4>
                    <p>{{$product->category->name}}</p>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
<!-- Vesitable Shop End -->

<!-- Our Customers-->
<div class="container-fluid featurs pb-5">
    <div class="container py-5">
        <div class="brands-header text-center">
            <h4 class="display-5 text-primary mb-5">Our Customers</h4>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 justify-content-center">
            <div class="col mb-4">
                <img src="{{asset('storage/uploads/brands/'.$brand->logo)}}" class="img-fluid" alt="Image 2">
            </div>
            <div class="col mb-4">
                <img src="{{asset('storage/uploads/brands/'.$brand->logo)}}" class="img-fluid" alt="Image 3">
            </div>
            <div class="col mb-4">
                <img src="{{asset('storage/uploads/brands/'.$brand->logo)}}" class="img-fluid" alt="Image 4">
            </div>
            <div class="col mb-4">
                <img src="{{asset('storage/uploads/brands/'.$brand->logo)}}" class="img-fluid" alt="Image 5">
            </div>
            <div class="col mb-4">
                <img src="{{asset('storage/uploads/brands/'.$brand->logo)}}" class="img-fluid" alt="Image 6">
            </div>
        </div>
    </div>
</div>
<!-- Our Customers Section End -->

@stop