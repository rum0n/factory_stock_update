@extends('layouts.backend.app')

@section('title', 'Update DSR')

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
                        <li class="breadcrumb-item active">Update DSR</li>
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
                            <h3 class="card-title">Update DSR</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form role="form" action="{{ route('admin.dsr.update', $dsr->id) }}" method="post" enctype="multipart/form-data" name="dsr_edit">
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
                                            <label for="target">Total</label>
                                            <input type="number" class="form-control" name="target" id="target" value="{{ $dsr->target }}" placeholder="Target in Number" min="1">
                                        </div>

                                        {{--<div class="form-group">--}}
                                            {{--<label for="datepicker">Target Date</label>--}}
                                            {{--<input type="text" class="form-control" name="target_date" id="datepicker" value="{{ $dsr->target_date }}" placeholder="Enter Deadline">--}}
                                        {{--</div>--}}

                                        <div class="form-group">
                                            <label for="achieved">Deposited</label>
                                            <input type="number" class="form-control" name="achieved" id="achieved" value="{{ $dsr->achieved }}" placeholder="Achieved in Number" min="0" max="">
                                        </div>

                                    </div>

                                    {{--<div class="col-md-6">--}}
                                    {{--</div>--}}

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
    document.forms['dsr_edit'].elements['employee_id'].value="{{ $dsr->employee_id }}"
</script>
@endpush