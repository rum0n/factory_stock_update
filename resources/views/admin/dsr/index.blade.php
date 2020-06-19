@extends('layouts.backend.app')

@section('title', 'DSR')

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
                        <li class="breadcrumb-item active">DSR</li>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DSR LISTS</h3>
                            <small class="text-danger pull-right">Total DSr's Due : {{ $dsrs->sum('target')-$dsrs->sum('achieved') }} Taka</small>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table  style="table-layout: fixed;type : text;width : 100%;word-break: keep-all;" id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Total</th>
                                    <th>Deposit</th>
                                    <th>Due</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Serial</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Total</th>
                                    <th>Deposit</th>
                                    <th>Due</th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($dsrs as $key => $dsr)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $dsr->employee->name }}</td>

                                        <td>{{ $dsr->employee->email }}</td>
                                        <td>{{ $dsr->employee->phone }}</td>
                                        <td>{{ $dsr->target }}</td>
                                        
                                        <td>{{ $dsr->achieved }}</td>
                                        <td>
                                           {{ $dsr->target - $dsr->achieved }}
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.dsr.show', $dsr->id) }}" class="btn btn-success">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('admin.dsr.edit', $dsr->id) }}" class="btn
													btn-info">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                            <button class="btn btn-danger" type="button" onclick="deleteItem({{ $dsr->id }})">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                            <form id="delete-form-{{ $dsr->id }}" action="{{ route('admin.dsr.destroy', $dsr->id) }}" method="post"
                                                  style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
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