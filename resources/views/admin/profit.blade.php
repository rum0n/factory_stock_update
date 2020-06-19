@extends('layouts.backend.app')

@section('title', 'Profit')

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
                        <li class="breadcrumb-item active">Profit</li>
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
                            <h3 class="card-title">Profit of Order Lists</h3>
                        </div>

                        <h3 class="card-title mr-5">
                            <strong class="text-primary pull-right">Total Income : {{ $total_income }}Tk</strong>
                        </h3>
                        <h3 class="card-title mr-5">
                            <strong class="text-danger pull-right">Total Expense : {{ $total_expense }} Tk</strong>
                        </h3>
                        <h3 class="card-title mr-5">
                            <strong class="text-success pull-right">Profit : {{ round($total_profit, 2) }} Tk</strong>
                        </h3>

                        <!-- /.card-header -->

                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Product Name</th>
                                    <th>Qty</th>
                                    <th>Total Buying Price</th>
                                    <th>Total Selling Price</th>
                                    <th>Discount</th>
                                    <th>Selling Price(- Discount)</th>
                                    <th>Profit Tk</th>
                                    <th>Purchase Date</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Serial</th>
                                    <th>Product Name</th>
                                    <th>Qty</th>
                                    <th>Total Buying Price</th>
                                    <th>Total Selling Price</th>
                                    <th>Discount</th>
                                    <th>Selling Price(- Discount)</th>
                                    <th>Profit Tk</th>
                                    <th>Purchase Date</th>
                                </tr>
                                </tfoot>
                                <tbody>

                                @forelse($order_details as $key => $order_detail)

                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $order_detail->product->name }}</td>
                                        <td>{{ $qty = $order_detail->quantity }}</td>
                                        <td>{{ $order_detail->product->buying_price * $qty }}</td>
                                        <td>{{ $order_detail->product->selling_price * $qty }}</td>
                                        <td>{{ $order_detail->order->discount_total }} ({{$order_detail->order->discount}}%)</td>
                                        <td>{{ $selling_price = $order_detail->total}}</td>
                                        <td>{{ $order_detail->profit }}</td>
                                        <td>{{ $order_detail->created_at }}</td>

                                        {{--<td>--}}

                                            {{--<button class="btn btn-success" type="button" onclick="deleteItem({{ $order_details->id }})">--}}
                                                {{--Pay Now--}}
                                            {{--</button>--}}
                                            {{--<form id="delete-form-{{ $order_details->id }}" action="{{ route('admin.pay_due', $order_details->id) }}" method="post"--}}
                                                  {{--style="display:none;">--}}
                                                {{--@csrf--}}

                                            {{--</form>--}}



                                        {{--</td>--}}
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No Data found !</td>
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

@endpush