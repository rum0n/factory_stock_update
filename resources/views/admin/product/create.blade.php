@extends('layouts.backend.app')

@section('title', 'Add Product')

@push('css')

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
                            <li class="breadcrumb-item active">Add Product</li>
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
                                <h3 class="card-title">Add Product</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form role="form" action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Product Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Product Name">
                                            </div>
                                            <div class="form-group">
                                                <label>Product Category</label>
                                                <select name="category_id" class="form-control">
                                                    <option value="" disabled selected>Select a Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Supplier Name</label>
                                                <select name="supplier_id" class="form-control">
                                                    <option value="" disabled selected>Select a Supplier</option>
                                                    @foreach($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Product Code</label>
                                                <input type="text" class="form-control" name="code" value="{{ old('code') }}" placeholder="Enter Product Code">
                                            </div>
                                            <div class="form-group">
                                                <label>Garage</label>
                                                <select name="garage" class="form-control">
                                                    <option value="" disabled selected>Select a Garage</option>
                                                    <option value="A">Garage A</option>
                                                    <option value="B">Garage B</option>
                                                    <option value="C">Garage C</option>
                                                    <option value="D">Garage D</option>
                                                    <option value="E">Garage E</option>
                                                    <option value="F">Garage F</option>
                                                    <option value="G">Garage G</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Qty</label>
                                                <input type="number" class="form-control" name="qty" value="{{ old('qty') }}" placeholder="Enter Product Qty" min="1">
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>Buying Date</label>
                                                <input   placeholder="dd-mm-yy" type="date" class="form-control" name="buying_date" value="{{ old('buying_date') }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Expire Date</label>
                                                <input type="date" class="form-control" name="expire_date" value="{{ old('expire_date') }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Buying Price</label>
                                                <input type="text" class="form-control" name="buying_price" value="{{ old('buying_price') }}" placeholder="Enter Buying Price">
                                            </div>
                                            <div class="form-group">
                                                <label>Selling Price</label>
                                                <input type="text" class="form-control" name="selling_price" value="{{ old('selling_price') }}" placeholder="Enter Selling Price">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-md-right">Add Product</button>
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
    <!-- bs-custom-file-input -->
    <script src="{{ asset('assets/backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script type="text/javascript">
        // $(document).ready(function () {
        //     bsCustomFileInput.init();

        // });
         $('.datepicker').datetimepicker({
         format: 'DD-MM-YYYY HH:mm:ss'
            });
    </script>
@endpush