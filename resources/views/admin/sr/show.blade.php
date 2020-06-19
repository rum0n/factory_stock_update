@extends('layouts.backend.app')

@section('title', 'Show SR')

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
                        <li class="breadcrumb-item active">Show SR</li>
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
                            <h3 class="card-title">Show SR</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->


                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <p>{{ $sr->employee->name }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <p>{{ $sr->employee->email }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Product</label>
                                        <p>{{ $sr->product->name }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Roads</label>
                                        @foreach($sr->sr_roads as $index => $road)
                                            <p>{{$index+1}}. {{$road->road->road_name}}</p>
                                        @endforeach
                                        {{--<p>{{ $sr->target }}</p>--}}
                                    </div>

                                    <div class="form-group">
                                        <label>Target</label>
                                        <p>{{ $sr->target }}</p>
                                    </div>



                                    <div class="form-group">
                                        <label>Deadline</label>
                                        <p>{{ $sr->target_date }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Achieved</label>
                                        <p>{{ $sr->achieved }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Progress</label>
                                        <p class="text-primary">{{ $a = $sr->achieved*100/$sr->target }}% completed </p>
                                        @if($a!=100)
                                            <p class="text-danger">{{ 100-$a }}% remain </p>
                                        @endif
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