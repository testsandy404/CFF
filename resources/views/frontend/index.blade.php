@extends('layouts.template')
<!-- main layout -->

@section('content')

<!-- Brands Start -->
<div class="container-fluid brands py-2">
  <div class="container py-5">
    <div class="brands-header text-center">
      <h4 class="display-5 text-primary mb-5">Brands</h4>
    </div>
    <div class="owl-carousel brands-carousel">
      @if(count($brandData) > 0)
      @foreach($brandData as $brand)
      <div class="brands-item img-border-radius bg-light rounded p-4">
        <img src="{{asset('storage/app/public/uploads/brands/'.$brand->logo)}}" class="" alt="{{$brand->name}}">
      </div>
      @endforeach
      @endif
    </div>
  </div>
</div>
<!-- Brands End -->

<!-- Features (Our Achievements) Section Start -->
<div class="container-fluid">
  <div class="container pb-6">
    <div class="brands-header text-center">
      <h4 class="display-5 text-primary mb-4">Our Achievements</h4>
    </div>

    {{-- Certificate cards --}}
    <div class="container py-5  justify-content-center">
      <div class="row">
        <div class="col-md-3">
          <img src="assets\img\certificates\fsda_certificate.jpg" class="card-img" alt="Image of a person">
        </div>
    {{-- <div class="container pb-5"> --}}
        {{-- <div class="row"> --}}
          <div class="col-md-3">
            <img src="assets\img\certificates\fsda_certificate.jpg" class="card-img" alt="Image of a person">
          </div>
          <div class="col-md-3">
            <img src="assets\img\certificates\fsda_certificate.jpg" class="card-img" alt="Image of a person">
          </div>
          <div class="col-md-3">
            <img src="assets\img\certificates\fsda_certificate.jpg" class="card-img" alt="Image of a person">
          </div>
        </div>
      </div>
          {{-- <div class="col-md-3">
            <img src="storage\uploads\about_us\topgun.jpg" class="card-img" alt="Image of a person">
          </div>
        </div> --}}
        {{-- <div class="col-md-3">
          <img src="storage\uploads\about_us\topgun.jpg" class="card-img" alt="Image of a person">
        </div>
        <div class="col-md-3">
          <img src="storage\uploads\about_us\topgun.jpg" class="card-img" alt="Image of a person">
        </div>
        <div class="col-md-3">
          <img src="storage\uploads\about_us\topgun.jpg" class="card-img" alt="Image of a person">
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-3 offset-md-2">
          <img src="storage\uploads\about_us\topgun.jpg" class="card-img" alt="Image of a person">
        </div>
        <div class="col-md-3 offset-md-2">
          <img src="storage\uploads\about_us\topgun.jpg" class="card-img" alt="Image of a person">
        </div>
      </div>
    </div> --}}


    {{-- Statistics section start --}}

    <div class="container-fluid my-5 p-5" style="background-image: linear-gradient(to right,#1d5167,#238868);">
      <ul class="count-list d-flex flex-wrap justify-content-around" style="padding: 0;">
        <ul style="padding-left: 0;">
          <div class="divider">
            <div class="d-flex justify-content-center" style="font-size: 40px; color:white;">
              <span>10000</span>
              <span>+</span>
            </div>
            <strong class="d-block" style="font-size: 18px; color:white;">Deliveries per Month</strong>
          </div>
          <hr style="border: 1px solid white; margin-top: 40px;">
        </ul>
        <ul style="padding-left: 0;">
          <div class="divider">
            <div class="d-flex justify-content-center" style="font-size: 40px; color:white;">
              <span>50</span>
              <span>+</span>
            </div>
            <strong class="d-block" style="font-size: 18px; color:white;">Sourcing Locations</strong>
          </div>
          <hr style="border: 1px solid white; margin-top: 40px;">
        </ul>
        <ul style="padding-left: 0;">
          <div class="divider">
            <div class="d-flex justify-content-center" style="font-size: 40px; color:white;">
              <span>1000</span>
              <span>+</span>
            </div>
            <strong class="d-block" style="font-size: 18px; color:white;">Outlets Serviced </strong>
          </div>
          <hr style="border: 1px solid white; margin-top: 40px;">
        </ul>
      </ul>
      <ul class="count-list d-flex flex-wrap justify-content-around" style="padding: 0;">
        <ul style="padding-left: 0;">
          <div class="text-center">
            <div class="d-flex justify-content-center" style="font-size: 40px; color:white;">
              <span>99.5</span>
              <span>%</span>
            </div>
            <strong class="d-block" style="font-size: 18px; color:white;">Successfull Order Fill <br>Rate</strong>
          </div>
        </ul>
        <ul style="padding-left: 0;">
          <div class="text-center">
            <div class="d-flex justify-content-center" style="font-size: 40px; color:white;">
              <span class="counter-count">75</span>
              <span>+</span>
            </div>
            <strong class="d-block" style="font-size: 18px; color:white;">GPS Enabled Multi-<br>temperature Vehicles</strong>
          </div>
        </ul>
        <ul style="padding-left: 0;">
          <div class="text-center">
            <div class="d-flex justify-content-center" style="font-size: 40px; color:white;">
              <span class="counter-count">50</span>
              <span>+</span>
            </div>
            <strong class="d-block" style="font-size: 18px; color:white;">Million <br>Cases Handled</strong>
          </div>
        </ul>
      </ul>
    </div>


    <!-- Featurs (How we work) Section End -->

    <!-- Our Products-->
    <div class="container-fluid vesitable py-3">
      <div class="container">
        <div class="text-center mx-auto mb-2" style="max-width: 700px;">
          <h1 class="display-4">Popular Products</h1>
          <!-- <p>Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p> -->
        </div>
        <div class="owl-carousel vegetable-carousel justify-content-center">
          @if(count($productData) > 0)
          @foreach($productData as $product)
          <div class="border border-primary rounded position-relative vesitable-item">
            <div class="vesitable-img">
              <img src="{{asset('storage/app/public/uploads/products/'.$product->thumbnail)}}" class="img-fluid w-100 rounded-top" alt="{{$product->name}}">
            </div>
            <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">{{$product->brand->name}}</div>
            <div class="p-4 rounded-bottom text-center">
                <h4>{{$product->name}}</h4>
                <p class="text-primary">{{$product->category->name}}</p>
                <p>{{$product->add_info}}</p>
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
          <h4 class="display-5 text-primary mb-5">Our Partners</h4>
        </div>
        <div class="accordion" id="departmentsAccordion">
          <div class="row justify-content-center">
            @foreach($deptData as $sr => $department)
            <button type="button" class="btn btn-outline-secondary btn-lg col-sm-6 col-md-3 col-lg-5 mx-4 my-1 {{ $sr == 0 ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#collapse{{ $department->id }}" aria-expanded="{{ $sr == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $department->id }}">
              {{ $department->name }}
            </button>
            @endforeach
          </div>

          @foreach($deptData as $sr => $department)
          <div id="collapse{{ $department->id }}" class="collapse {{ $sr == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $department->id }}" data-bs-parent="#departmentsAccordion">
            <div class="card">
              <div class="card-body">
                <div class="row justify-content-center">
                  @foreach($department->vendors as $vendor)
                  <div class="col-md-2 col-sm-4 col-6 mb-4 img-border-radius bg-light rounded p-2 mx-2">
                    <img src="{{ asset('storage/app/public/uploads/vendors/'.$vendor->image) }}" class="img-fluid" alt="{{ $vendor->name }}">
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>




      </div>
    </div>
    <!-- Our Customers Section End -->

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Highlight the button when the collapse is shown
        document.querySelectorAll('#departmentsAccordion .collapse').forEach(function(collapse) {
          collapse.addEventListener('show.bs.collapse', function() {
            let button = collapse.parentElement.querySelector('button');
            button.classList.add('active');
          });

          collapse.addEventListener('hide.bs.collapse', function() {
            let button = collapse.parentElement.querySelector('button');
            button.classList.remove('active');
          });
        });
      });
    </script>

    @stop