@extends('layouts.template')
<!-- main layout -->

@section('content')

<!-- Single Page Header start -->
<div class="container-fluid pt-5" id="faqs-header">
    <div class="text-center mx-auto" style="max-width: 700px;">
        <h1 class="display-4">FAQs</h1>
        <p>Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
    </div>
</div>
<!-- Single Page Header End -->
<div class="container-fluid contact py-2">
    <div class="container py-2">
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


<script>
    window.onload = function() {
        document.getElementById('faqs-header').scrollIntoView();
    };
</script>
@stop