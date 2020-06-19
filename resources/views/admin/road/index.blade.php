@extends('layouts.backend.app')

@section('title', 'Roads')

@push('css')
        <!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.css') }}">
@endpush

@section('content')

        <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 offset-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Roads</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8 col-lg-10 offset-md-2 offset-lg-1">
                    <div class="mt-3 mb-3">
                        <form role="form" class="form-horizontal style-form" method="post" action="{{route('admin.road.store')}}">
                            @csrf
                            <div class="form-group has-success">
                                <div class="col-lg-offset-1 col-lg-10">
                                    <input type="text" placeholder="Add New Road" id="f-name" class="form-control" name="road_name" >
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-1 col-lg-10">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-plus"> Add Road</i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ROADS LIST</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Road Name</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Serial</th>
                                    <th>Road Name</th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @forelse($roads as $key => $road)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $road->road_name }}</td>
                                        <td>
                                            <button class="btn btn-danger" type="button" onclick="deleteItem({{ $road->id }})">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                            <form id="delete-form-{{ $road->id }}" action="{{ route('admin.road.destroy', $road->id) }}" method="post"
                                                  style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No Roads Available Insert One</td>

                                    </tr>
                                @endforelse
                                </tbody>

                            </table>
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
</div> <!-- Content Wrapper end -->
@endsection




@push('js')

        <!-- DataTables -->
<script src="{{ asset('assets/backend/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('assets/backend/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('assets/backend/plugins/fastclick/fastclick.js') }}"></script>

<!-- Sweet Alert Js -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.1/dist/sweetalert2.all.min.js"></script>


<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>


<script type="text/javascript">
    function deleteItem(id) {
        const swalWithBootstrapButtons = swal.mixin({
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
        })

        swalWithBootstrapButtons({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
            event.preventDefault();
            document.getElementById('delete-form-'+id).submit();
        } else if (
                // Read more about handling dismissals
        result.dismiss === swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
            )
        }
    })
    }
</script>



@endpush