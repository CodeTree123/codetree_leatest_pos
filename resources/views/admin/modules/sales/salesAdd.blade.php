@extends('admin.layouts.adminmaster')
@section('adminTitle')
Add Sale- Admin Dashboard
@stop
@section('adminContent')
<style>
    label {
        font-weight: bold;
    }

    .select2-selection__rendered {
        height: 40px;
        margin-top: -2px;
        border: 1px solid #80808052;
        padding-top: 8px;
    }

    .table th,
    td {
        padding: 10px;
        font-size: 15px;
    }

    input[type=text] {
        border-radius: 0px;
    }

    .select2-container--select2-bootstrap-prepend .select2-dropdown {
        margin-top: 0;
        /* Adjust margin to align with input group */
    }
</style>

<div class="col-md-12 mt-5 pt-3 border-bottom">
    <div class="text-dark px-0">
        <p class="mb-1"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard / </a><a
                href="{{ route('admin.salesList') }}">Sales /</a><a href="{{ route('admin.purchaseAdd') }}"
                class="active-slink">Add Sale</a> <span class="top-date">{{ date('l, jS F Y') }}</span></p>
    </div>
</div>

<div class="container-fluid p-3">
    <div class="box">
        <div class="box-header">
            <div class="box-icon-left border-right" style="height:100%">
                <p class="btn mt-0 task-icon"><i class="fa fa-barcode"></i></p>
            </div>
            <h2 class="blue task-label">Add Sale</h2>
            <div class="box-icon border-left" style="height:100%">
                <div class="dropdown mt-0">
                    <p class="text_p_primary" title="Actions">
                        <i class="fa fa-th-list"></i>
                    </p>
                    <div class="task-menu p-2">
                        <a class="dropdown-item pl-0" type="button" data-toggle="modal"
                            data-target=".bd-example-modal-lg">
                            <i class="fa-fw fa fa-list"></i>Sales list
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-content">
            <div class="row">
                <div class="col-lg-12">
                    <p class="introtext">Please fill in the information below. The field labels marked with * are
                        required input fields.</p>
                </div>
                <div class="col-sm-12 col-md-12 col-xs-12 p-3 border">
                    <!-- <form method="post" action="{{ route('admin.sales.MakeSale') }}">
                                                                                                                          @csrf -->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Sales Type *</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text salesTypeDestoryBtn" id="basic-addon1"><i
                                            class="fa fa-edit"></i></span>
                                </div>
                                @if (Session::has('saleType'))
                                <select class="custom-select" id="saleType" name="sales_type">
                                    <option value="{{ Session::get('saleType') }}">{{ Session::get('saleValue') }}
                                    </option>
                                </select>
                                @else
                                <select class="custom-select" id="saleType" name="sales_type">
                                    <option value="g">General Sale</option>
                                    <option value="w">Wholesale</option>
                                </select>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Customer *</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text customerReset p-0" style="margin-top:-3px;">
                                        <p class="btn bg_p_primary mb-0 py-1 proAddBtn" style="border-radius:0px;font-size:20px;cursor:pointer;">Reset</p>
                                    </div>
                                </div>
                                <select class="custom-select" id="customerId" name="customer_id">
                                    @if (session('customer'))
                                    <option value="{{ session('customer') }}" selected>
                                        {{ session('customerName') }}
                                    </option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Store *</label>
                            <select class="form-control" name="store_id" id="store_id">
                                @foreach ($stores as $store)
                                <option value="{{ $store->id }}">{{ $store->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-12 p-2">
                            <label>Products</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text p-0" style="margin-top:-3px;">
                                        <p class="btn bg_p_primary mb-0 py-1 proAddBtn" style="border-radius:0px;font-size:20px;cursor:pointer;">+</p>
                                    </div>
                                </div>
                                <select class="custom-select" id="pro_id">
                                    <option selected value="">Select Product</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="left-middle" style="max-height:46vh;overflow-y: scroll;min-height: 51vh;">
                        <table class="table table-bordered table-hover table-striped" id="records_table">
                            <thead class="bg_p_primary">
                                <tr>
                                    <th class="font-weight-bold" scope="col">#</th>
                                    <th class="font-weight-bold" scope="col">Product(Code-Name)</th>
                                    <th style="text-align: right;" class="font-weight-bold" scope="col">Unit Cost
                                    </th>
                                    <th style="text-align: center;" class="font-weight-bold" scope="col">Quantity
                                    </th>
                                    <th style="text-align: right;" class="font-weight-bold" scope="col">Subtotal</th>
                                    <th style="text-align: center;" class="font-weight-bold" scope="col"><a
                                            href="{{ route('admin.sales.removeAllItem') }}" class="py-0"
                                            style="color:white;border-radius:0px; "
                                            title="All product remove from list"><i class="fa fa-trash"></i></a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total_price = 0;
                                $total_product = 0;
                                $counter = 0;
                                ?>
                                @foreach (Cart::content() as $product)
                                <?php
                                $counter++;
                                $total_price += $product->subtotal;
                                $total_product += $product->qty;
                                ?>
                                <tr>
                                    <td>{{ $counter }}</td>
                                    <td class="p-2">{{ $product->name }} <i class="fa fa-edit update-product"
                                            data-proid="{{ $product->id }}" data-row="{{ $product->rowId }}"
                                            style="cursor:pointer;color:#007bff;"></i></td>
                                    <td style="text-align: right;">{{ number_format($product->price) }}</td>
                                    <td style="text-align: center;">
                                        <input type="text" style="width:40px;text-align: center"
                                            value="{{ $product->qty }}" class="pro_qty"
                                            data-qty="{{ $product->rowId }}">
                                    </td>
                                    <td style="text-align: right;">{{ number_format($product->subtotal) }}</td>
                                    <td style="text-align: center;">
                                        <a href="{{ route('admin.sales.removeItem', $product->rowId) }}"><i
                                                class="fa fa-times-circle" title="Remove Item"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <table style="width:100%; float:right; padding:5px; color:#000; background: #FFF;"
                        class="mt-1 mb-3">
                        <tr>
                            <td style="padding: 5px 10px;border-top: 1px solid #DDD;">Items</td>
                            <td class="text-right"
                                style="padding: 5px 10px;font-size: 14px; font-weight:bold;border-top: 1px solid #DDD;">
                                <span id="titems">{{ Cart::count() }}</span>
                            </td>
                            <td style="padding: 5px 10px;border-top: 1px solid #DDD;">Total</td>
                            <td class="text-right"
                                style="padding: 5px 10px;font-size: 14px;font-weight:bold;border-top: 1px solid #DDD;">
                                <span id="total">{{ Cart::subtotal() }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 5px 10px;">VAT <a href="#" id="pptax2"><i
                                        class="fa fa-edit" data-toggle="modal" data-target=".tax_modal"></i></a>
                            </td>
                            <td class="text-right" style="padding: 5px 10px;font-size: 14px; font-weight:bold;"><span
                                    id="ttax2">{{ Cart::tax() }}</span>
                            </td>
                            <!-- <td style="padding: 5px 10px;">Discount <a href="#" id="ppdiscount"><i
                                        class="fa fa-edit" data-toggle="modal" data-target=".discount_modal"></i></a>
                            </td>
                            <td class="text-right" style="padding: 5px 10px;font-weight:bold;"><span id="tds">
                                    @if (Session::has('saleDiscount'))
                                    {{ number_format(Session::get('saleDiscount')) }}
                                    @else
                                    {{ Cart::discount() }}
                                    @endif
                                </span>
                            </td> -->
                        </tr>
                        <tr>
                            <td style="padding: 5px 10px; border-top: 1px solid #666;border-bottom: 1px solid #333; font-weight:bold; background:#333; color:#FFF;"
                                colspan="2">Total Payable<a href="#" id="pshipping"></a>
                            </td>
                            <td class="text-right"
                                style="padding:5px 10px 5px 10px; font-size: 14px;border-top: 1px solid #666; border-bottom: 1px solid #333; font-weight:bold; background:#333; color:#FFF;"
                                colspan="2">
                                <span id="gtotal">
                                    <?php
                                    $total = (float) str_replace(',', '', Cart::total());
                                    ?>
                                    @if (Session::has('saleDiscount'))
                                    {{ number_format($total - Session::get('saleDiscount')) }}
                                    @else
                                    {{ Cart::total() }}
                                    @endif
                                </span>
                            </td>
                        </tr>
                    </table>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Payment Type</label>
                            <select class="form-control" id="paymentType">
                                <option value="due">Due</option>
                                <option value="paid">Paid</option>
                            </select>

                        </div>
                        <div class="form-group col-md-4">
                            <label>Biller</label>
                            <select class="custom-select" id="biller_id">
                                    <option selected value="">Select Biller</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Date *</label>
                            <input type="date" value="{{ date('Y-m-d') }}" id="sales_date" name="sales_date" class="form-control" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>

                    <div class="paymentBox" style="display: none;">
                        <div class="form-row p-3" style="background-color: #aaaaaa45;">
                            <div class="form-group col-6">
                                <label>Payment Method</label>
                                <select class="form-control" id="payment_method" name="payment_type">
                                    <option value="cash">Cash</option>
                                    <option value="Cheque">Cheque</option>
                                    <option value="debit_card">Debit Card</option>
                                    <option value="credit_card">Credir Card</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label>Total paid</label>
                                <input type="text" class="form-control" id="paid_amount" value="0">

                            </div>
                            <div class="form-group col-6" id="chequeNumber" style="display:none;">
                                <label>Cheque Number</label>
                                <input type="text" id="cheque_number" name="cheque_number" class="form-control">

                            </div>
                            <div class="form-group col-6" id="bank_name" style="display:none;">
                                <label>Bank Name</label>
                                <input type="text" id="bank_name_input" name="bank_name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label>Note</label>
                            <textarea id="payment_note" name="payment_note" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <input type="submit" id="submit-data" value="Submit" class="btn bg_p_primary col-3">
                    </div>
                    <!-- </form> -->
                </div><!--End left side-->
            </div>
        </div>
    </div>
</div>

</div>
<!--Tax modal-->
<div class="modal fade bd-example-modal-lg tax_modal" tabindex="-1" role="dialog" aria-labelledby="tax_modal"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content p-2">
            <div class="modal-header pt-0 px-0">
                <h2 class="modal-title pt-3" id="exampleModalLabel">Add Order Tax</h2>
                <h1 data-dismiss="modal" class="pt-1 px-2" style="cursor:pointer;">&times;</h1>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="col-form-label">Order Tax</label>
                        <select class="form-control" id="tax_input">
                            <option value="0">No Tax</option>
                            <option value="5">VAT @5%</option>
                            <option value="10">VAT @10%</option>
                            <option value="15">VAT @15%</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <p class="btn btn-primary tax_add_btn" style="border-radius:0px;cursor:pointer;">Update</p>
            </div>
        </div>
    </div>
</div>
<!--Discount modal-->
<!-- <div class="modal fade bd-example-modal-lg discount_modal" tabindex="-1" role="dialog"
    aria-labelledby="discount_modal" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Add Discount</h2>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="col-form-label">Discount Type</label>
                        <select class="form-control" id="discount_type">
                            <option value="persentase">%</option>
                            <option value="total">Total</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Discount</label>
                        <input type="text" class="form-control" id="discount_input">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <p type="button" class="btn btn-primary discount_add_btn">Update</p>
            </div> -->
<!--         </div>
    </div>
</div> -->
<!--Product update modal-->
<div class="modal fade bd-example-modal-lg product_info" tabindex="-1" role="dialog"
    aria-labelledby="payment_modal" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Product Information</h2>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <div class="modal-body" id="product_info">

            </div>

        </div>
    </div>
</div>
<!--End modal-->
<script>
    $(document).ready(function() {

        $('#biller_id').select2({
            theme: "bootstrap",
            ajax: {
                url: '/people/biller-lists2',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term // search term
                    };
                },
                processResults: function(data) {
                    return {
                        results: data // select2 expects an array of {id, text} objects
                    };
                },
                cache: true
            },
            minimumInputLength: 0 // start searching after 1 character
        });

        $('#pro_id').select2({
            theme: "bootstrap",
            ajax: {
                url: '/sales/get-products',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term // search term
                    };
                },
                processResults: function(data) {
                    return {
                        results: data // select2 expects an array of {id, text} objects
                    };
                },
                cache: true
            },
            minimumInputLength: 1 // start searching after 1 character
        });

        $('#customerId').select2({
            theme: "bootstrap",
            ajax: {
                url: '/sales/get-customers',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term // search term
                    };
                },
                processResults: function(data) {
                    return {
                        results: data // select2 expects an array of {id, text} objects
                    };
                },
                cache: true
            },
            minimumInputLength: 1 // start searching after 1 character
        });
        //submit data
        //submit data
        $("#submit-data").click(function() {
            var sales_type = $("#saleType").val();
            var customer_id = $("#customerId").val();
            var store_id = $("#store_id").val();
            var biller_id = $("#biller_id").val();
            var sales_date = $("#sales_date").val();
            var payment_type = $("#payment_method").val();
            var paid_amount = $("#paid_amount").val();
            var cheque_number = $("#cheque_number").val();
            var bank_name = $("#bank_name_input").val();
            var payment_note = $("textarea#payment_note").val();
            $("#loader").show();
            //ajax
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('admin.sales.MakeSale') }}",
                type: "POST",
                data: {
                    'sales_type': sales_type,
                    'customer_id': customer_id,
                    'store_id': store_id,
                    'biller_id': biller_id,
                    'sales_date': sales_date,
                    'payment_type': payment_type,
                    'paid_amount': paid_amount,
                    'cheque_number': cheque_number,
                    'payment_note': payment_note,
                    'bank_name': bank_name
                },
                //dataType:'json',
                success: function(data) {
                    $("#loader").hide();

                    window.location = data.url;


                },
                error: function(err) {
                    // Display error messages
                    $("#loader").hide();

                    if (err.responseJSON.errors) {
                        $.each(err.responseJSON.errors, function(key, value) {
                            toastr.error(value);
                        });
                    } else {
                        toastr.error('Something went wrong. Please try again.');
                    }
                }
            });

            //end ajax

        });

        //tax add function
        $(".tax_add_btn").click(function() {
            var tax = $("#tax_input").val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('admin.sales.updateTax') }}",
                type: "POST",
                data: {
                    'tax': tax
                },
                success: function(data) {
                    $('.tax_modal').modal('hide');
                    if (data == 1) {
                        location.reload(true);
                    } else {
                        alert('Something Went wrong Please Try Again.');
                    }
                },
                error: function() {
                    toastr.error("Something went Wrong, Please Try again.");
                }
            });
        });
        //set dicount
        // $(".discount_add_btn").click(function() {
        //     var discount = $("#discount_input").val();
        //     var discount_type = $("#discount_type").val();
        //     if ($.isNumeric(discount)) {
        //         $.ajax({
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             },
        //             url: "{{ route('admin.sales.SalesDiscount') }}",
        //             type: "POST",
        //             data: {
        //                 'discount': discount,
        //                 'discount_type': discount_type
        //             },
        //             success: function(data) {
        //                 $('.discount_modal').modal('hide');
        //                 if (data == 1) {
        //                     location.reload(true);
        //                 } else {
        //                     alert('Something Went wrong Please Try Again.');
        //                 }
        //             },
        //             error: function() {
        //                 toastr.error("Something went Wrong, Please Try again.");
        //             }
        //         });
        //     } else {
        //         toastr.error("Please Enter a correct number.");

        //     }

        // });

        //update product info
        $(".update-product").click(function() {
            var saleType = $("#saleType").val();
            var rowId = $(this).data('row');
            var proId = $(this).data('proid');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('admin.sales.getProductInfo') }}",
                type: "POST",
                data: {
                    'rowId': rowId,
                    'proId': proId,
                    'saleType': saleType
                },
                //dataType:'json',
                success: function(data) {
                    $('.product_info').modal('show');
                    $("#product_info").html(data);

                },
                error: function() {
                    toastr.error("Something went Wrong, Please Try again.");
                }
            });
        });
        //display payment box
        $("#paymentType").on('change', function() {
            var paymentType = $(this).val();
            if (paymentType == 'paid') {
                $(".paymentBox").css('display', 'block');
            } else {
                $(".paymentBox").css('display', 'none');
            }
        });
        //display cheque number
        $("#payment_method").on('change', function() {
            var payment_method = $(this).val();
            if (payment_method == 'Cheque') {
                $("#chequeNumber").css('display', 'block');
                $("#bank_name").css('display', 'block');
            } else {
                $("#chequeNumber").css('display', 'none');
                $("#bank_name").css('display', 'block');
            }
        })

        //add productr to purchase list 
        $("#pro_id").on('change', function() {
            var pro_id = $("#pro_id").val();
            var saleType = $("#saleType").val();

            //ajax

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('admin.sales.productAddToSale') }}",
                type: "POST",
                data: {
                    'pro_id': pro_id,
                    'saleType': saleType
                },
                //dataType:'json',
                success: function(data) {


                    if (data == 1) {
                        location.reload(true);
                    } else {
                        alert('Something Went wrong Please Try Again.');
                    }

                },
                error: function() {
                    alert("error ase");
                }
            });
            //endajax
        });
        //set sale type
        $("#saleType").on('change', function() {
            var type = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('admin.sales.setSalesType') }}",
                type: "POST",
                data: {
                    'type': type
                },
                //dataType:'json',
                success: function(data) {


                    if (data == 1) {
                        location.reload(true);
                    } else {
                        alert('Something Went wrong Please Try Again.');
                    }

                },
                error: function() {
                    alert("error ase");
                }
            });
            //endajax
        });
        //destory session sale type
        $(".salesTypeDestoryBtn").click(function() {
            var dtype = 1;
            //ajax
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('admin.sales.destorySalesType') }}",
                type: "POST",
                data: {
                    'dtype': dtype
                },
                //dataType:'json',
                success: function(data) {


                    if (data == 1) {
                        location.reload(true);
                    } else {
                        alert('Something Went wrong Please Try Again.');
                    }

                },
                error: function() {
                    alert("error ase");
                }
            });
            //endajax
        });
        //customr customerReset
        $(".customerReset").click(function() {
            var ctype = 1;
            //ajax
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('admin.sales.customerReset') }}",
                type: "POST",
                data: {
                    'ctype': ctype
                },
                //dataType:'json',
                success: function(data) {


                    if (data == 1) {
                        location.reload(true);
                    } else {
                        alert('Something Went wrong Please Try Again.');
                    }

                },
                error: function() {
                    alert("error ase");
                }
            });
            //endajax
        });
        //add customer
        $("#customerId").on('change', function() {
            var customerId = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('admin.sales.setCustomer') }}",
                type: "POST",
                data: {
                    'customerId': customerId
                },
                //dataType:'json',
                success: function(data) {


                    if (data == 1) {
                        location.reload(true);
                    } else {
                        alert('Something Went wrong Please Try Again.');
                    }

                },
                error: function() {
                    alert("error ase");
                }
            });
            //endajax
        });

        //update product qty
        $(".pro_qty").on('change', function() {
            var rowId = $(this).data('qty');
            var qty = $(this).val();

            if ($.isNumeric(qty)) {
                //ajax
                if (qty != 0) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('admin.purchase.updateQty') }}",
                        type: "POST",
                        data: {
                            'rowId': rowId,
                            'qty': qty
                        },
                        //dataType:'json',
                        success: function(data) {
                            location.reload(true);
                        },
                        error: function() {
                            alert("Something Went wrong.Please try again.");
                        }
                    });
                }
                //end ajax
            } else {
                alert('Please Enter Correct Number.');
            }
        });
    });
</script>
@stop