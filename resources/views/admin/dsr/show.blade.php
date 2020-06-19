@extends('layouts.backend.app')

@section('title', 'Show DSR')

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
                        <li class="breadcrumb-item active">Show DSR</li>
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
                            <h3 class="card-title">Show DSR</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->


                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <p>{{ $dsr->employee->name }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <p>{{ $dsr->employee->email }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <p>{{ $dsr->employee->phone }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Total</label>
                                        <p>{{ $dsr->target }}</p>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Deposited</label>
                                        <p>{{ $dsr->achieved }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Due</label>
                                         <p>{{ $dsr->target - $dsr->achieved }}</p>
                                    </div>


                                </div>

                            </div>

                        </div>
                        <!-- /.card-body -->

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