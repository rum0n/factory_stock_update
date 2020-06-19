@extends('layouts.backend.app')

@section('title', 'Garden Stock')

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
                        <li class="breadcrumb-item active">Reduce Garden Stock</li>
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
                        <div class="card-header">Reduce Garden Stock</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form role="form" action="{{ route('admin.reduced') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <label for="name">Garden Stock Name</label>
                                            <select class="form-control" type="text" id="name" name="garden_id">
                                                <option value="">Select One</option>
                                                @foreach($gardenStocks as $gardenStock)
                                                    <option value="{{ $gardenStock->id }}">{{ $gardenStock->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="qty">Quantity</label>
                                            <input type="number" class="form-control" name="qty" id="qty" value="{{ old('qty') }}" placeholder="Enter used Quantity " min="1">
                                        </div>

                                    </div>

                                    {{--<div class="col-md-6">--}}
                                    {{--</div>--}}

                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-md-right">Save</button>
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


@endpush