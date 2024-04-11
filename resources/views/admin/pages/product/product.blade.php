@extends('admin.master')
<!-- main layout -->

@section('content')
<!-- yield section start -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".delpro").click(function() {
            var id = $(this).attr('pid')
            if (confirm('Do you want to delete this product?')) {
                $.ajax({
                    url: "{{route('admin.product.delete')}}",
                    method: 'delete',
                    data: {
                        _token: '{{csrf_token()}}',
                        pid: id
                    },
                    success: function(response) {
                        alert(response)
                        window.location.reload();
                    }
                })
            }

        })

    })
</script>
<script>
    setTimeout(function() {
        $('.alert-div').fadeOut('fast');
    }, 5000); // <-- time in milliseconds
</script>

<div class="container">

    <!-- Header content -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

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
    <!-- /Header content -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Products with details.</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        
                            <table id="protable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="7" class="text-center">
                                            <a href="{{route('admin.product.add')}}" class="btn btn-primary btn-large text-white">Add New Product</a>
                                        </th>

                                    </tr>
                                    <tr>
                                        <th class="col-1 text-center">Sr. No.</th>
                                        <th class="col-3 text-center">Name</th>
                                        <th class="col-2 text-center">Brand</th>
                                        <th class="col-2 text-center">Category</th>
                                        <th class="col-2 text-center">Image</th>
                                        <th class="col-2 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $sn = 1;
                                    @endphp
                                    @foreach($proData as $pro)
                                    <tr>
                                        <td class="text-center">{{ $sn }}</td>
                                        <td class="text-center">{{ $pro->name }}</td>
                                        <td class="text-center">{{ $pro->brand->name }}</td>
                                        <td class="text-center">{{ $pro->category->name }}</td>
                                        <td class="text-center">
                                            <img src="{{asset('storage/uploads/products/'.$pro->thumbnail)}}" width="60px" height="60px">
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('admin.product.edit',$pro->id)}}" class="btn btn-warning">Edit</a>
                                            <a href="javascript:void(0)" pid="{{ $pro->id }}" class="btn btn-danger text-white delpro">Delete</a>
                                        </td>
                                    </tr>
                                    @php
                                    $sn++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-foot d-flex justify-content-center">
                            {{ $proData->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>

</div>
<!-- /Main content -->

@stop
<!-- yield section end -->