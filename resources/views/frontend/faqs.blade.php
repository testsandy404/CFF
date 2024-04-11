@extends('layouts.template')
<!-- main layout -->

@section('content')

<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">FAQs</h1>
</div>
<!-- Single Page Header End -->
<div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="container-fluid faqs py-2">
                <div id="accordion">
                    @if(count($faqs) > 0)
                    @foreach($faqs as $faq)
                    <div class="card my-1">
                        <div class="card-header" id="faq{{$faq->id}}">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{$faq->id}}" aria-expanded="false" aria-controls="collapse{{$faq->id}}">
                                    Q. {{ $faq->title }}
                                </button>
                            </h5>
                        </div>

                        <div id="collapse{{$faq->id}}" class="collapse" aria-labelledby="faq{{$faq->id}}" data-parent="#accordion">
                            <div class="card-body">
                                {{ $faq->description }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@stop