@extends('layouts.template')
<!-- main layout -->

@section('content')

<!-- Single Page Header start -->
<div class="container-fluid py-5">
    <div class="text-center mx-auto" style="max-width: 700px;">
        <h1 class="display-4">About Us</h1>
    </div>
</div>

{{-- Message card --}}
<div class="container pb-4">
    <div class="card" style="max-width: auto; min-height: auto; margin-left: 150px; margin-right: 150px;">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="storage\uploads\about_us\topgun.jpg" class="card-img" alt="Image of a person" style="width:100%; height:100%;">
          </div>
          <div class="col-md-8 p-0">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
          </div>
        </div>
      </div>
</div>


<div class="container-fluid featurs">
    <div class="container py-2">
        <div class="row justify-content-center pb-3">
            <div class="d-flex align-items-center justify-content-center mt-4">
                <h2 class="text-primary pb-1">Who we are</h2>
            </div>
            <div class="text-center mx-auto" style="width: 80%;">
                <p>At Chef's Frozen Food, we are dedicated to revolutionizing the frozen food industry with our unwavering commitment to quality and innovation. Since our founding, we have built a reputation for excellence, driven by our passion for creating delicious and convenient meals. Our team of culinary experts and food technologists work tirelessly to set new benchmarks in quality and taste. Every product we create reflects our dedication to culinary excellence and customer satisfaction, ensuring that our offerings meet the highest standards of the food industry.</p>
            </div>
        </div>
        <div class="row justify-content-center pb-3">
            <div class="d-flex align-items-center justify-content-center mt-4">
                <h2 class="text-primary pb-1">What we offer</h2>
            </div>
            <div class="text-center mx-auto" style="width: 80%;">
                <p>Chef's Frozen Food presents a comprehensive range of frozen food products, tailored to meet the diverse needs of our customers. Our portfolio includes gourmet dishes, indulgent desserts, health-focused meals, and quick snacks, all crafted with premium ingredients. We are committed to providing products that offer exceptional flavor, nutrition, and convenience, making us a trusted choice for discerning consumers. Our products are designed to simplify meal preparation while maintaining high standards of taste and nutrition, allowing you to enjoy quality meals effortlessly.</p>
            </div>
        </div>
        <div class="row justify-content-center pb-3">
            <div class="d-flex align-items-center justify-content-center mt-4">
                <h2 class="text-primary pb-1">Our Vision</h2>
            </div>
            <div class="text-center mx-auto" style="width: 80%;">
                <p>Our vision at Chef's Frozen Food is to become a global leader in the frozen food sector, known for our unwavering quality and culinary excellence. We aspire to change the way consumers perceive and enjoy frozen food by consistently offering innovative and delicious products. Our goal is to set new industry standards, ensuring that our customers always receive the best in taste, nutrition, and convenience. Through continuous improvement and a commitment to excellence, we aim to inspire confidence and satisfaction in every bite, making Chef's Frozen Food a household name worldwide.</p>
            </div>
        </div>
        <div class="row justify-content-center pb-3">
            <div class="d-flex align-items-center justify-content-center mt-4">
                <h2 class="text-primary pb-1">Our Mission</h2>
            </div>
            <div class="text-center mx-auto" style="width: 80%;">
                <p>Chef's Frozen Food's mission is to elevate the frozen food experience by delivering products that combine gourmet quality, nutritional value, and convenience. We are dedicated to making exceptional frozen foods accessible to everyone, regardless of their lifestyle. By sourcing our ingredients responsibly and committing to sustainable practices, we aim to minimize our environmental impact while ensuring the highest standards of quality and taste. Through our relentless pursuit of innovation and excellence, we seek to build lasting trust and satisfaction with our customers, fostering a loyal and delighted customer base.</p>
            </div>
        </div>
    </div>
</div>
@stop