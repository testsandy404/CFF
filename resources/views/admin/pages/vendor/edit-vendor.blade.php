@extends('admin.master')
<!-- main layout -->

@section('content')
<!-- yield section start -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    setTimeout(function() {
        $('.alert-div').fadeOut('fast');
    }, 5000); // <-- time in milliseconds
</script>

<!-- Header content -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Vendor</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Edit Vendor</li>
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
                    <form method="post" action="{{route('admin.vendor.update')}}" enctype="multipart/form-data">
                        @csrf()
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Name: *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$vendorData->name}}">
                                    @if($errors->has('name'))
                                    <div class="alert-danger">
                                        <span class="text-white pl-3">{{$errors->first('name')}}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Department: *</label>
                                <div class="col-sm-10">
                                    <select name="dept_id" class="form-control" required>
                                        <option value="">Select Department</option>
                                        @foreach($deptData as $dept)
                                        <option value="{{$dept->id}}" <?php if ($vendorData->dept_id == $dept->id) {
                                                                            echo 'selected';
                                                                        } ?>>{{$dept->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('dept_id'))
                                    <div class="alert-danger">
                                        <span class="text-white pl-3">{{$errors->first('dept_id')}}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label">Image:</label>
                                <div class="col-sm-10">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="inputGroupFile01">Change image</label>
                                    </div>
                                    @if($errors->has('image'))
                                    <div class="alert-danger">
                                        <span class="text-white pl-3">{{$errors->first('image')}}</span>
                                    </div>
                                    @endif
                                    <div>
                                        <img src="{{asset('storage/uploads/vendors/'.$vendorData->image)}}" class="my-2" id="preview-img-tag" alt="Preview" height="200px" width="200px" />
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="img_name" id="img_name" value="{{$vendorData->image}}">
                            <input type="hidden" name="vid" id="vid" value="{{$vendorData->id}}">
                            <input type="submit" class="btn btn-primary btn-large" name="editvendor" value="Update Vendor">

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
<script type="text/javascript">
    $(document).ready(function(e) {

        $('#image').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

    });
</script>

@stop
<!-- yield section end -->
