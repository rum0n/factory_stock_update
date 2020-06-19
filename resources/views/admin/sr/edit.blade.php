@extends('layouts.backend.app')

@section('title', 'Update SR')

@push('css')
{{--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">--}}
<link rel="stylesheet" href="{{asset('assets/backend/css/js-datepicker.css')}}">
{{--<link rel="stylesheet" href="/resources/demos/style.css">--}}
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
                            <li class="breadcrumb-item active">Update SR</li>
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
                                <h3 class="card-title">Update SR</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form role="form" action="{{ route('admin.sr.update',$sr->id) }}" method="post" enctype="multipart/form-data" name="sr_edit">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8 offset-md-2">
                                            <div class="form-group">
                                                <label for="sr_name">Name</label>
                                                <select class="form-control" type="text" id="sr_name" name="employee_id">
                                                    <option value="">Select One</option>
                                                    @foreach($employees as $employee)
                                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="pro_id">Product</label>
                                                <select class="form-control" type="text" id="pro_id" name="product_id">
                                                    <option value="">Select One</option>
                                                    @foreach($products as $product)
                                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <label>Check Roads</label>
                                            @foreach($roads as $road)
                                                <div class="custom-control custom-checkbox mb-1">
                                                    <input class="custom-control-input" type="checkbox" id="customCheckbox{{ $road->id }}" name="roads[]" value="{{ $road->id }}">
                                                    <label for="customCheckbox{{ $road->id }}" class="custom-control-label">{{ $road->road_name }}</label>
                                                </div>
                                            @endforeach

                                            <div class="form-group mt-1">
                                                <label for="target">Target</label>
                                                <input type="number" class="form-control" name="target" id="target" value="{{ $sr->target }}" placeholder="Target in Number" min="1">
                                            </div>

                                            <div class="form-group">
                                                <label for="datepicker">Target Date</label>
                                                <input type="text" class="form-control" name="target_date" id="datepicker" value="{{ $sr->target_date }}" placeholder="Enter Deadline">
                                            </div>

                                            <div class="form-group">
                                                <label for="achieved">Achieved</label>
                                                <input type="number" class="form-control" name="achieved" id="achieved" value="{{ $sr->achieved }}" placeholder="Achieved in Number" min="0" max="">
                                            </div>

                                        </div>

                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-md-right">Update SR</button>
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
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
        $( "#datepicker" ).datepicker();
    } );
</script>
<script type="text/javascript">
    document.forms['sr_edit'].elements['employee_id'].value="{{ $sr->employee_id }}"
    document.forms['sr_edit'].elements['product_id'].value="{{ $sr->product_id }}"

</script>
@endpush