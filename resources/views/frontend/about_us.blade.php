@extends('layouts.template')
<!-- main layout -->

@section('content')

<!-- Single Page Header start -->
<div class="container-fluid py-4" id="about-us-header">
    <div class="text-center mx-auto" style="max-width: 700px;">
        <h1 class="display-4">About Us</h1>
    </div>
</div>

{{-- Message card --}}
<div class="container p-0">  
    <div class="row justify-content-center pb-3 mb-3">
        <div class="col-md-8">
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-md-6">
                        <img src="assets/img/about_us/chefs.jpeg" class="card-img" alt="Image of a person" style="height:100%;">
                    </div>
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="card-body text-center">
                            <blockquote class="blockquote mb-0">
                                <p style="color:rgb(52, 81, 222); font-size:18px;"><em>"Quality is not just a standard, it’s an attitude."</em></p>
                                <footer class="blockquote-footer">
                                    <b style="font-size:20px; color:black;">Pranay Thakker</b>
                                    <br>
                                    <b style="color:black;">(Promoter Chairman Chefs Frozen Foods Pvt. Ltd.)</b>
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid featurs">
    <div class="container pt-0">
        {{-- Our Journey --}}
        <div class="row justify-content-center pb-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body text-center">
                        <h2 class="text-primary pb-1">Our Journey</h2>
                        <hr/>
                        <p style="font-size:18px; color:black;">CFFPL was incorporated in 2006 with a vision to provide top-notch frozen fruits and vegetables to international markets. Over the years, our dedication to quality and customer satisfaction has enabled us to expand our horizons and enter the local market successfully.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sales and Distribution Excellence --}}
        <div class="row justify-content-center pb-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body text-center">
                        <h2 class="text-primary pb-1">Sales and Distribution Excellence</h2>
                        <hr/>
                        <p style="font-size:18px; color:black;">It has been an honor to deliver exceptional sales and distribution services across various sales channels, empowering brands to broaden their market reach and achieve new heights of success. We are relentless in our pursuit to push the boundaries, constantly developing innovative solutions for both brands and customers.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Our Vision --}}
        <div class="row justify-content-center pb-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body text-center">
                        <h2 class="text-primary pb-1">Our Vision</h2>
                        <hr/>
                        <p style="font-size:18px; color:black;">At CFFPL, our vision is to be a leading provider of high-quality food products, trusted by customers and our channel partners. We strive to achieve this through continuous innovation, commitment to quality, and a customer-centric approach. Our goal is not just to meet the expectations of our customers but to exceed them, ensuring that every product we deliver is a testament to our dedication and excellence.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Looking Ahead --}}
        <div class="row justify-content-center pb-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body text-center">
                        <h2 class="text-primary pb-1">Looking Ahead</h2>
                        <hr/>
                        <p style="font-size:18px; color:black;">As we continue to grow, our commitment to quality and innovation remains unwavering. We are excited about the future and the opportunities it holds for us and our partners. Together, we can achieve greater heights and set new standards in the foods industry. Thank you for being a part of our journey. We look forward to serving you with the best frozen foods, backed by our promise of quality and excellence.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.onload = function() {
        document.getElementById('about-us-header').scrollIntoView();
    };
</script>

@stop
