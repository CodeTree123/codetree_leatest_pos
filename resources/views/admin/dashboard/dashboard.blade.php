@extends('admin.layouts.adminmaster')
@section('adminTitle')
    Dashboard
@stop
@section('adminContent')
    <style>
        .bold {
            font-weight: bold;
        }

        .chart-bottom-lebel {
            float: left;
            font-weight: 600;
            font-size: 15px;
            margin-left: 20px;
        }

        .quick-link {
            border-radius: 15px;
            height: 30px;
            padding-top: 5px;
            font-size: 14px;
            min-width: 200px;
            font-weight: 600;
        }

        .select2-selection__rendered {
            height: 36px;
            margin-top: -2px;
            border: 1px solid #80808052;
            padding-top: 5px;
            width: 400%;
        }
    </style>
    <div class="col-md-12 mt-2  border-bottom">
        <div class="text-dark px-0">
            <p class="mb-1"><a href="{{ route('admin.dashboard') }}" class="active-slink"><i class="fa fa-home"></i>
                    Dashboard</a><span class="top-date">{{ date('l, jS F Y') }}</span></p>
        </div>
    </div>

    <div class="container-fluid p-3">

        <div class="row p-1 col-xs-12">
            <div class="col-sm-3">
                <div class="small-box padding1010 bg_secondary_teal" style="padding:10px !important;height:140px;">
                    <h4 class="bold">Purchases</h4>
                    <i class="icon fa fa-star"></i>

                    <h3 class="bold mt-4">৳{{ number_format($totalPurchase) }}</h3>

                    <p class="bold">{{ $numberOfPurchase }} Purchases </p>
                </div>
            </div>
            <div class="col-sm-3 col-xs-12">
                <div class="small-box padding1010 bg_secondary_cyan" style="padding:10px !important;height:140px;">
                    <h4 class="bold">Sales</h4>
                    <i class="icon fa fa-heart"></i>

                    <h3 class="bold mt-4">৳{{ number_format($totalSale) }}</h3>

                    <p class="bold">{{ $numberOfSale }} Sales </p>
                </div>
            </div>
            <div class="col-sm-3 col-xs-12">
                <div class="small-box padding1010 bg_secondary_plum" style="padding:10px !important;height:140px;">
                    <h4 class="bold">Expenses</h4>
                    <i class="icon fa fa-dollar-sign"></i>

                    <h3 class="bold mt-4">৳{{ number_format($totalExpense) }}</h3>

                    <p class="bold">{{ $numberOfExpense }}Expenses</p>
                </div>
            </div>
            <div class="col-sm-3 col-xs-12">
                <div class="small-box padding1010 bg_secondary_yellow" style="padding:10px !important;height:140px;">
                    <h4 class="bold">Profit Loss</h4>
                    <i class="icon fa fa-dollar-sign"></i>

                    <h3 class="bold mt-4">৳{{ number_format($totalRevenue) }}</h3>
                    <p>
                        &nbsp;
                        &nbsp;
                    </p>
                </div>

            </div>

        </div>
    </div>

    <!--Important link-->
    <div class="container-fluid p-3">
        <div class="box">
            <div class="box-header">
                <div class="box-icon-left border-right" style="height:100%">
                    <p class="btn mt-0 task-icon"><i class="fa fa-star"></i></p>
                </div>
                <h2 class="blue task-label">Quick Links</h2>
                <div class="box-icon border-left" style="height:100%">
                    <div class="dropdown mt-0">
                    </div>
                </div>
            </div>
            <div class="box-content">

                <div class="row">

                    <div class="col-3 col-xs-12 p-2">
                        <center>
                            <a href="{{ route('admin.customerAdd') }}" class="btn bg_p_primary quick-link">Add Customer</a>
                        </center>
                    </div>
                    <div class="col-3 col-xs-12 p-2">
                        <center>
                            <a href="{{ route('admin.supplierAdd') }}" class="btn bg_secondary_yellow quick-link">Add
                                Supplier</a>
                        </center>
                    </div>
                    <div class="col-3 col-xs-12 p-2">
                        <center>
                            <a href="{{ route('admin.productAdd') }}" class="btn  bg_secondary_violet quick-link"
                                style="color:white">Add Product</a>
                        </center>
                    </div>
                    <div class="col-3 col-xs-12 p-2">
                        <center>
                            <a href="{{ route('admin.purchaseAdd') }}" class="btn bg_secondary_orange quick-link">Add
                                Purchase</a>
                        </center>
                    </div>
                    <div class="col-3 col-xs-12 p-2">
                        <center>
                            <a href="{{ route('admin.salesAdd') }}" class="btn bg_secondary_cyan quick-link">Add Sell</a>
                        </center>
                    </div>
                    <div class="col-3 col-xs-12 p-2">
                        <center>
                            <a href="{{ route('admin.expenseAdd') }}" class="btn  bg_secondary_grey quick-link">Add
                                Expense</a>
                        </center>
                    </div>

                    <div class="col-3 col-xs-12 p-2">
                        <center>
                            <a href="#" class="btn bg_secondary_lime quick-link payment-btn">Add Payment</a>
                        </center>
                    </div>
                    <div class="col-3 col-xs-12 p-2">
                        <center>
                            <a href="{{ route('admin.attendence') }}"
                                class="btn bg_secondary_grey quick-link">Attendence</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--End importand link-->

    <!--Chart overview-->
    <div class="container-fluid p-3">
        <div class="box">
            <div class="box-header">
                <div class="box-icon-left border-right" style="height:100%">
                    <p class="btn mt-0 task-icon"><i class="fa fa-star"></i></p>
                </div>
                <h2 class="blue task-label">Overview Chart</h2>
                <div class="box-icon border-left" style="height:100%">
                    <div class="dropdown mt-0">
                    </div>
                </div>
            </div>
            <div class="box-content">
                <p class="introtext mb-0">Overview Chart including last six month's sales (green columns), purchases (blue
                    columns) and expense (gray columns) .</p>
                <div class="row">
                    <div class="col-lg-12">
                        <div id="chart" style="height:320px;"></div>
                        <div class="offset-md-5 col-6 mt-3">
                            <center>
                                <p class="chart-bottom-lebel"><i class="fa fa-square" style="color:rgb(11, 98, 164);"></i>
                                    Purchase</p>
                                <p class="chart-bottom-lebel"><i class="fa fa-square" style="color:rgb(122, 146, 163);"></i>
                                    Expense</p>
                                <p class="chart-bottom-lebel"><i class="fa fa-square" style="color:rgb(77, 167, 77);"
                                        style="color:rgb(11, 98, 164);"></i> Sales</p>

                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--End chart overview-->
    <!--Payment modal-->
    <div class="modal fade payment-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h2 class="modal-title">Payment</h2>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('admin.customer.duePayment') }}" method="post">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-12 pl-0">
                                <label class="col-12 pl-0">Select Customer</label>
                                <select class="custom-select col-12" name="customer_id" id="customer_id">
                                    <option>Select Customer</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}" class="col-12">
                                            {{ $customer->name }}-{{ $customer->mobile }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12" id="due" style="display: none">
                                <label>Total Due</label>
                                <input type="text" class="form-control" id="dueInput" name="total_due"
                                    readonly="">
                            </div>
                            <div class="form-group col-12">
                                <label>Payment Date</label>
                                <input type="date" class="form-control" name="paid_date">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Payment Method</label>
                                <select class="custom-select" name="payment_method">

                                    <option value="cash">Cash</option>

                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Amount</label>
                                <input type="number" class="form-control" name="amount" placeholder="Paid Cash">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Payment Note</label>
                                <textarea class="form-control" rows="3" name="paymentNote"></textarea>
                            </div>
                        </div>

                </div>
                <div class="modal-footer payBtn">

                    <input type="submit" class="btn btn-primary" value="Payment">

                </div>
                </form>

            </div>
        </div>
    </div>
    </div>
    <?php
    $chart_data = '';
    foreach ($chartData as $row) {
        $chart_data .=
            "{ year:'" .
            $row['month'] .
            '-' .
            $row['year'] .
            "',
          purchase:'" .
            $row['purchase'] .
            "',
          sell:'" .
            $row['sell'] .
            "',
          expense:'" .
            $row['expense'] .
            "'}, ";
    }
    $chart_data = substr($chart_data, 0, -2);
    ?>
    <!--Morris chart js-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="{{ asset('/') }}public/admin/asset/js/raphael-min.js"></script>
    <script src="{{ asset('/') }}public/admin/asset/js/morris.min.js"></script>
    <script>
        new Morris.Bar({
            // ID of the element in which to draw the chart.
            element: 'chart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [<?php echo $chart_data; ?>],

            xkey: 'year',

            ykeys: ['purchase', 'expense', 'sell'],

            labels: ['purchase', 'expense', 'sell']

        });

        $(document).ready(function() {
            $(".payment-btn").click(function() {
                $(".payment-modal").modal('show');
            });

            //get customer due
            $("#customer_id").on('change', function() {
                var customer_id = $(this).val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('admin.customer.customerTotalDue') }}",
                    type: "POST",
                    data: {
                        'customer_id': customer_id
                    },
                    //dataType:'json',
                    success: function(data) {
                        $("#dueInput").val(data);
                        $("#due").css('display', 'block');
                        if (data < 1) {
                            $(".payBtn").css('display', 'none');
                        }
                    },
                    error: function(err) {
                        $.each(err.responseJSON.errors, function(key, value) {
                            toastr.error(value);
                        });

                    }
                });

                //end ajax
            });

            // $('#customer_id').select2({
            //   theme: "bootstrap"
            // });
        });
    </script>
@stop
