@extends('layouts.backend.app')

@section('title', 'Stock')

@push('css')
<link rel="stylesheet" href="{{asset('assets/backend/css/js-datepicker.css')}}">
@endpush

@section('content')

        <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 offset-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add to Stock</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add to Stock</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form role="form" action="{{ route('admin.stock.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <label for="product_name">Product Name</label>
                                            <select class="form-control" type="text" id="product_name" name="product_id">
                                                <option value="">Select One</option>
                                                @foreach($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="qty">Quantity</label>
                                            <input type="number" class="form-control" name="qty" id="qty" value="{{ old('qty') }}" placeholder="Enter Quantity" min="1">
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Selling Price</label>
                                            <input type="number" class="form-control" name="price" id="price" value="{{ old('price') }}" placeholder="Enter Price" min="1">
                                        </div>
                                        <div class="form-group">
                                            <label for="datepicker">Expiry Date</label>
                                            <input type="date" class="form-control" name="expiry_date" id="datepicker" value="{{ old('expiry_date') }}" placeholder="Enter Expiry Date">
                                        </div>
                                    </div>

                                    {{--<div class="col-md-6">--}}
                                    {{--</div>--}}

                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-md-right">Add To Stock</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@push('js')
{{--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>--}}
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
        $( "#datepicker" ).datepicker();
    } );

</script>
@endpush