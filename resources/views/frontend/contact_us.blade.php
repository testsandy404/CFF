@extends('layouts.template')
<!-- main layout -->

@section('content')
<!-- Single Page Header start -->
<!-- <div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Contact Us</h1>
</div> -->
<div class="container-fluid pt-5 pb-3">
    <div class="text-center mx-auto" style="max-width: 700px;">
        <h1 class="display-4">Contact Us</h1>
    </div>
</div>
<!-- Single Page Header End -->

<!-- Contact Start -->
<div class="container-fluid contact py-2">
    <div class="container py-2">
        <div class="p-5 bg-light rounded">
            <div class="row g-4">
                <div class="col-12">
                    <div class="text-center mx-auto" style="max-width: 700px;">
                        <h1 class="text-primary">Get in touch</h1>
                        <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes.</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="h-100 rounded">
                        <img class="rounded w-100" style="height: 400px;" src="assets/img/location.jpg" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></img>
                    </div>
                </div>
                <div class="col-lg-7">
                    <form method="post" action="{{route('contact_us.submit')}}" class="">
                        @csrf
                        <input type="text" class="w-100 form-control border-0 py-3 mb-4" name="name" id="name" placeholder="Your Name" required>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="email" class="w-100 form-control border-0 py-3 mb-4" name="email" id="email" placeholder="Enter Your Email" required>
                        <input type="number" class="w-100 form-control border-0 py-3 mb-4" name="contact_no" id="contact_no" placeholder="Enter Your Contact No." required>
                        @error('contact_no')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <textarea class="w-100 form-control border-0 mb-4" rows="5" cols="10" name="message" id="message" placeholder="Your Message" required></textarea>
                        @error('message')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary " type="submit">Submit</button>
                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="d-flex p-4 rounded mb-4 bg-white">
                        <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                        <div>
                            <h4>Address</h4>
                            <p class="mb-2">123 Street New York.USA</p>
                        </div>
                    </div>
                    <div class="d-flex p-4 rounded mb-4 bg-white">
                        <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                        <div>
                            <h4>Mail Us</h4>
                            <p class="mb-2">info@example.com</p>
                        </div>
                    </div>
                    <div class="d-flex p-4 rounded bg-white">
                        <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                        <div>
                            <h4>Telephone</h4>
                            <p class="mb-2">(+012) 3456 7890</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

@section('styles')
<!-- Additional CSS specific to this view -->
<style>
    /* Hide spinner for number input */
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
        /* Optional */
    }
</style>
@endsection

@stop