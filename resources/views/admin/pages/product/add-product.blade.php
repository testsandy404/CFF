@extends('admin.master')
<!-- main layout -->

@section('content')
<!-- yield section start -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    setTimeout(function() {
        $('.alert-div').fadeOut('fast');
    }, 3000); // <-- time in milliseconds
</script>

<!-- Header content -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Product</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="home">Home</a></li>
                    <li class="breadcrumb-item active">Add Product</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- /Header content -->

@if(Session::has('Success'))
<div class="alert alert-success alert-div">
    {{Session::get('Success')}}
</div>
@endif
@if(Session::has('Error'))
<div class="alert alert-danger alert-div">
    {{Session::get('Error')}}
</div>
@endif

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <!-- form start -->
                    <form method="post" action="{{route('admin.product.save')}}" enctype="multipart/form-data">
                        @csrf()
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name: *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Product Name" required>
                                    @if($errors->has('name'))
                                    <div class="alert-danger">
                                        <span class="text-white pl-3">{{$errors->first('name')}}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="desc" class="col-sm-2 col-form-label">Description:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="desc" id="desc" placeholder="Product Description"></textarea>
                                    @if($errors->has('desc'))
                                    <div class="alert-danger">
                                        <span class="text-white pl-3">{{$errors->first('desc')}}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="catid" class="col-sm-2 col-form-label">Category: *</label>
                                <div class="col-sm-4">
                                    <select name="catid" class="form-control" required>
                                        <option value="">Select Category</option>
                                        @foreach($catData as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('catid'))
                                    <div class="alert-danger">
                                        <span class="text-white pl-3">{{$errors->first('catid')}}</span>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-sm-1"></div>
                                <label for="catid" class="col-sm-2 col-form-label">Brand: *</label>
                                <div class="col-sm-3">
                                    <select name="brandid" class="form-control" required>
                                        <option value="">Select Brand</option>
                                        @foreach($brandData as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('brandid'))
                                    <div class="alert-danger">
                                        <span class="text-white pl-3">{{$errors->first('brandid')}}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label">Image: *</label>
                                <div class="col-sm-10">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image" onchange="preview()" required>
                                        <label class="custom-file-label" for="image">Choose image</label>
                                    </div>
                                    @if($errors->has('image'))
                                    <div class="alert-danger">
                                        <span class="text-white pl-3">{{$errors->first('image')}}</span>
                                    </div>
                                    @endif
                                    <img class="my-2" id="frame" src="" alt="preview" width="200px" height="200px" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-sm-2 col-form-label">Type:</label>
                                <div class="col-sm-10">
                                    <select name="type" class="form-control">
                                        <option value="0" selected>None</option>
                                        <option value="1">Featured</option>
                                    </select>
                                    @if($errors->has('type'))
                                    <div class="alert-danger">
                                        <span class="text-white pl-3">{{$errors->first('type')}}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="add_info" class="col-sm-2 col-form-label">Additional Info: *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="add_info" name="add_info" placeholder="Additional Info">
                                    @if($errors->has('add_info'))
                                    <div class="alert-danger">
                                        <span class="text-white pl-3">{{$errors->first('add_info')}}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">

                                <label for="price" class="col-sm-2 col-form-label">Price:</label>

                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rs.</span>
                                        </div>
                                        <input type="number" class="form-control" id="price" name="price" placeholder="Price">
                                    </div>
                                    @if($errors->has('price'))
                                    <div class="alert-danger">
                                        <span class="text-white pl-3">{{$errors->first('price')}}</span>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-sm-2"></div>
                                <label for="quantity" class="col-sm-2 col-form-label">Quantity:</label>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
                                    @if($errors->has('quantity'))
                                    <div class="alert-danger">
                                        <span class="text-white pl-3">{{$errors->first('quantity')}}</span>
                                    </div>
                                    @endif
                                </div>

                            </div>

                            <input type="submit" class="btn btn-primary btn-large" name="addProduct" value="Add Product">

                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function() {
        // Multiple images preview in browser
        var imagesPreview = function(input, placeToInsertImagePreview) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }

        };
        $('#filenames').on('change', function() {
            imagesPreview(this, 'div.gallery');
        });
    });
</script>
<script>
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

@stop
<!-- yield section end -->