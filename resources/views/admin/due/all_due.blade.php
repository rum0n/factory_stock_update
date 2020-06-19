@extends('layouts.backend.app')

@section('title', 'All Due')

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
                        <li class="breadcrumb-item active">Dues</li>
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
                            <h3 class="card-title">Due Lists</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Customer Name</th>
                                    <th>Due</th>
                                    <th>Purchase Date</th>
                                    <th>Pay</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Serial</th>
                                    <th>Customer Name</th>
                                    <th>Due</th>
                                    <th>Purchase Date</th>
                                    <th>Pay</th>
                                </tr>
                                </tfoot>
                                <tbody>

                                @forelse($orders as $key => $order)

                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $order->customer->name }}</td>
                                        <td>{{ $order->due }}</td>
                                        <td>{{ $order->created_at }}</td>

                                        <td>
                                            {{--Clear Payment--}}

                                            {{--<a href="{{ route('admin.fstock.edit', $f_stock->id) }}" class="btn--}}
													{{--btn-info">--}}
                                                {{--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--}}
                                            {{--</a>--}}
                                            <button class="btn btn-success" type="button" onclick="deleteItem({{ $order->id }})">
                                                Pay Now
                                            </button>
                                            <form id="delete-form-{{ $order->id }}" action="{{ route('admin.pay_due', $order->id) }}" method="post"
                                                  style="display:none;">
                                                @csrf

                                            </form>



                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No Due</td>
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
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Pay!',
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

        }
    })
    }
</script>



@endpush