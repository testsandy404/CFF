@extends('layouts.template')
<!-- main layout -->

@section('content')

<!-- Single Page Header start -->
<div class="container-fluid py-5">
    <div class="text-center mx-auto" style="max-width: 700px;">
        <h1 class="display-4">Our Products</h1>
        <p>Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
    </div>
</div>
<!-- Single Page Header End -->

<!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <div class="row g-4">
                            <form method="post" action="{{route('products.search')}}">
                                @csrf
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Brands</h4>
                                        @if(count($brands)> 0)
                                        @foreach($brands as $brand)
                                        <div class="mb-2">
                                            <input type="checkbox" class="me-2" id="brand-{{$brand->id}}" name="brands[]" value="{{$brand->id}}" {{in_array($brand->id, $requestBrands) ? 'checked' : ''}}>
                                            <label for="brand-{{$brand->id}}">{{$brand->name}}</label>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Categories</h4>
                                        @if(count($categories)> 0)
                                        @foreach($categories as $category)
                                        <div class="mb-2">
                                            <input type="checkbox" class="me-2" id="category-{{$category->id}}" name="category[]" value="{{$category->id}}" {{in_array($category->id, $requestCategory) ? 'checked' : ''}}>
                                            <label for="categories-{{$category->id}}">{{$category->name}}</label>
                                        </div>
                                        @endforeach
                                        <input class="btn btn-primary rounded-pill text-white" type="submit" value="Apply Filter">

                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row g-4 justify-content-center">
                            @if(count($productData) > 0)
                            @foreach($productData as $product)
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="rounded position-relative fruite-item">
                                    <div class="fruite-img">
                                        <img src="{{asset('storage/uploads/products/'.$product->thumbnail)}}" class="img-fluid w-100 rounded-top" alt="{{$product->name}}">
                                    </div>
                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{$product->brand->name}}</div>
                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                        <h4>{{$product->name}}</h4>
                                        <p>{{$product->category->name}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            <div class="col-12">
                                <div class="pagination d-flex justify-content-center mt-5 flex-wrap">
                                    {{ $productData->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fruits Shop End-->

@stop