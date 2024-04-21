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