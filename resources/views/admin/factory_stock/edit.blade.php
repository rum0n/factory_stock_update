@extends('layouts.backend.app')

@section('title', 'Update Factory Stock')

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
                        <li class="breadcrumb-item active">Update Factory Stock</li>
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
                            <h3 class="card-title">Add to Factory</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form role="form" action="{{ route('admin.fstock.update', $factoryStock->id) }}" method="post" name="fstock_edit">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select class="form-control" type="text" id="category" name="category_id">
                                                <option value="">Select One</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="qty">Quantity</label>
                                            <input type="number" class="form-control" name="qty" id="qty" value="{{ $factoryStock->qty }}" placeholder="Enter Quantity" min="1">
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="number" class="form-control" name="price" id="price" value="{{ $factoryStock->price }}" placeholder="Enter Price" min="1">
                                        </div>
                                    </div>

                                    {{--<div class="col-md-6">--}}
                                    {{--</div>--}}

                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-md-right">Add</button>
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
    <script type="text/javascript">
        document.forms['fstock_edit'].elements['category_id'].value="{{ $factoryStock->category_id }}"
    </script>
@endpush