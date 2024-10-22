<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA_Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('frontEnd/images/brac_only_logo.png') }}">

    <!--bootstrap-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/asset/css/all.min.css') }}">
    <!--dropdown plugin-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/asset/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/asset/css/bootnavbar.css') }}">

    <!--fontawesome-->
    <link rel="stylesheet" href="{{ asset('admin/asset/css/font-awesome.min.css') }}">
    <!--customised css file-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/asset/css/style.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/icon/favicon.png') }}" />

    <!--Select 2-->
    <link href="{{ asset('admin/asset/css/select2.min.css') }}" rel="stylesheet" />
    <!--Tostr-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/asset/css/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/asset/css/custom_style.css') }}">
    <title>
        @yield('adminTitle')
    </title>
    <script src="{{ asset('admin/asset/js/jquery-3.4.1.min.js') }}"></script>
    <style>
        @media print {
            @page {
                size: 80mm 297mm;
                margin: -15mm 0mm 0mm 2.5mm;
            }

            body {
                zoom: 137%;
            }

        }

        .go {
            height: auto;
        }

        .go>.row>.col-4>div>.company_name {
            margin-bottom: 0px;
            font-weight: 500;
            font-size: 30px;
        }

        .go>.row>.col-4>div>.bill-p {
            margin-bottom: 0px;
            font-size: 20px;
            font-weight: 500;
        }

        .go>.row>.col-4>.d_class>.d_class1>.bill-p,
        .go>.row>.col-4>.d_class>.d_class2>.bill-p {
            margin-bottom: 0px;
            font-size: 20px;
            font-weight: 500;
        }

        .go>.row>.col-4>div>table {
            border: 1px solid #000 !important;
        }

        .go>.row>.col-4>div>table>thead>tr>th,
        .go>.row>.col-4>div>table>tbody>tr>td {
            font-size: 18px;
        }

        .go>.row>.col-4>div>.bill_p {
            font-size: 16px !important;
        }

        .text_center {
            text-align: center !important;
        }
    </style>
    <script>
        function printContent(el) {
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;


            var print_receipt = document.createElement('div');
            print_receipt.classList.add("col-4");
            print_receipt.innerHTML = printcontent;

            var print_receipt_parent = document.createElement('div');
            print_receipt_parent.classList.add("row");
            print_receipt_parent.appendChild(print_receipt);
            // console.log(print_receipt_parent);


            document.body.innerHTML = print_receipt_parent.outerHTML;
            document.body.classList.add("go");
            var d_class = document.querySelector(".d_class");
            d_class.classList.remove("row", "p-0", "m-0", "mt-2", "mb-2");
            d_class.classList.add("text_center");

            var d_class1 = document.querySelector(".d_class1");
            d_class1.classList.remove("col-6", "pl-0");
            d_class1.classList.add("text_center");

            var d_class2 = document.querySelector(".d_class2");
            d_class2.classList.remove("col-6", "pr-0");
            d_class2.classList.add("text_center");

            // document.body.innerHTML =  print_receipt;
            //  var x=  document.body.appendChild(print_receipt); 
            window.print();
            document.body.innerHTML = restorepage;
            // document.body.classList.remove("go");

        }
    </script>
    <style>
        .leftdiv {
            background-color: #F5f5F5;
            min-height: 85vh;
        }

        .rightdiv {
            background-color: #F5f5F5;
            min-height: 85vh;
            overflow-y: scroll;
        }

        .btn-prni {
            border: 1px solid #eee;
            cursor: pointer;
            height: 140px;
            margin: 0 0 3px 2px;
            padding: 2px;
            width: 10.5%;
            min-width: 100px;
            overflow: hidden;
            display: inline-block;
            font-size: 13px;
        }

        .btn-default {
            color: #333;
            background-color: #fff;

        }

        .btn-prni p {
            display: table-cell;
            height: 30px;
            line-height: 15px;
            vertical-align: middle;
            text-transform: uppercase;
            width: 10.5%;
            min-width: 94px;
            overflow: hidden;
        }

        .btn-prni:hover {
            border: 1px solid gray;
        }

        .input-group {
            position: relative;
            /* display: table; */
            border-collapse: separate;
        }

        .input-group-addon {
            padding: 3px;
            border-radius: 0;
        }

        .input-group .form-control:last-child,
        .input-group-addon:last-child,
        .input-group-btn:last-child>.btn,
        .input-group-btn:last-child>.dropdown-toggle,
        .input-group-btn:first-child>.btn:not(:first-child) {
            border-radius: 0;
        }

        #poscustomer {
            width: 77%;
            float: left;
        }

        .customer_btn {
            padding: 2.3px 6px;
            border: 1px solid #80808047;
            border-left: 0;
            float: right;
            font-size: 18px;
        }

        .customer_btn a i {
            font-size: 1.4em
        }

        #posProduct {
            width: 92%;
            float: left;
        }

        .product_btn {
            padding: 2.3px 7px;
            border: 1px solid #80808047;
            border-left: 0;
            float: left;
            font-size: 18px;
        }

        .product_btn a i {
            font-size: 1.4em;
        }

        #table table,
        th,
        td,
        #table2 table,
        th,
        td {
            border: 1px solid black;
            border-collapse: separate;
            font-size: 14px;
        }

        .side_btn {
            transform: rotate(-90deg);
            border-radius: 0px;
            font-weight: 400;

        }

        #category_area {
            float: right;
            right: 0px;
            min-height: 500px;
            min-width: 700px;
            margin-right: 0px;
            position: fixed;
            margin-top: 0px;
            display: none;
            background-color: #F5f5F5;
            box-shadow: 0 0 10px 3px gray;
            max-width: 700px;
            padding: 7px;
        }

        #subcategory_area {
            float: right;
            right: 0px;
            min-height: 500px;
            min-width: 700px;
            margin-right: 0px;
            position: fixed;
            margin-top: 0px;
            display: none;
            background-color: #F5f5F5;
            box-shadow: 0 0 10px 3px gray;
            max-width: 700px;
            padding: 7px;
        }

        #brands_area {
            float: right;
            right: 0px;
            min-height: 500px;
            min-width: 700px;
            margin-right: 0px;
            position: fixed;
            margin-top: 0px;
            display: none;
            background-color: #F5f5F5;
            box-shadow: 0 0 10px 3px gray;
            max-width: 700px;
            padding: 7px;
        }

        .select2-selection__rendered {
            height: 34px;
            border-left: 0px;
            margin-top: 0px;
            border: 1px solid #80808052;
            padding-top: 6px;
            color: #554;
            font-size: 14px;
        }

        #select2-poscustomer-container {
            height: 34px;
        }

        .select2-results__option {
            color: #6c757d;
            font-size: 14px;
            color: #555;

        }

        .select2-results {
            max-height: 100px;
            overflow-y: scroll;
        }

        .form-group {
            margin-bottom: 5px;
        }

        /* input:focus, input.form-control:focus {
  border-color:gray;
  outline: 0;
  -webkit-box-shadow: inset 0 .1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(102, 175, 233, 0.6);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(102, 175, 233, 0.6);
  } */
        ::-webkit-scrollbar {
            display: none;
        }

        .form-control {
            display: block;
            width: 100%;
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 0px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        }

        .form-group {
            margin-top: 8px;
        }

        label {
            margin-bottom: 2px;
            font-weight: bold;
        }

        td {
            border: 1px solid #0000002b;
        }

        th {
            border: 1px solid #0000002b;
        }

        @media all and (max-width: 1320px) {
            #poscustomer {
                width: 68%;
            }

            #posProduct {
                width: 89%;
            }
        }

        @media all and (max-width: 1320px) {
            #poscustomer {
                width: 55%;
            }

            #posProduct {
                width: 80%;
            }
        }
    </style>
    <style>
        .dropdown-menu>li a:hover,
        .dropdown-menu>li.show {
            background: #343a40 !important;
            color: white;
        }

        .navbar-dark .navbar-nav .nav-link {
            color: #f8f9fa;
        }

        body {
            background-color: white;
        }

        .cal_btn {
            border: 0px;
            width: 100%;
            font-size: 20px;
            height: 100%;
            padding: 10px 15px;
        }

        #result {
            font-size: 20px;
            border-radius: 0px;
            padding: 20px 15px;
        }

        .equal {
            background-color: #228b22f0;
            color: white;
        }

        .clear {
            background-color: #ff0000d1;
            padding: 7px 15px;
            color: white;
        }

        .number {
            background-color: antiquewhite;
        }

        .operator {
            background-color: gold;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg shadow navbar-light bg-light " id="navbar" style="padding:1px;">
        <a class="navbar-brand" style="padding:0px;" href="{{ route('admin.dashboard') }}">
            <img class=" ml-4" src="{{ asset('frontEnd/images/codetree.png') }}" style="width:100px;">
        </a>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarcoll">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarcoll" style="padding-top:10px;">
            <ul class="navbar-nav mr-auto">

                <li title="Dashboard" class="nav-item dropdown p-1 ml-1" style="background:blue !important">
                    <a class="nav-link text-light" href="{{ route('admin.dashboard') }}">
                        <i class="fa fa-desktop"></i>

                    </a>
                </li>

                <li class="nav-item dropdown p-1 ml-2" style="background:#78cd51 !important" title="Pos">
                    <a class="nav-link text-light" href="{{ route('admin.posModule') }}"><i class="fa fa-th-large"></i>
                    </a>
                </li>

                <li class="nav-item dropdown p-1 ml-2" style="background:red !important" title="Add Expense"
                    data-toggle="modal" data-target=".expense_modal">
                    <a class="nav-link text-light" href="#"><i class="fa fa-dollar-sign"></i>

                    </a>
                </li>
                <li class="nav-item dropdown p-1 ml-2 todaySale" style="background:#78cd51 !important"
                    title="Today's Sale" data-toggle="modal" data-target=".todaysale_modal">
                    <a class="nav-link text-light" href="#"><i class="fa fa-heart"></i>

                    </a>
                </li>
                <li class="nav-item dropdown p-1 ml-2" style="background:orange !important" title="List Of Product">
                    <a class="nav-link text-light" href="{{ route('admin.posModule') }}"><i class="fa fa-barcode"></i>

                    </a>
                </li>
                <li class="nav-item dropdown p-1 ml-2" style="background:#78cd51 !important" title="Customer">
                    <a class="nav-link text-light" href="{{ route('admin.posModule') }}"><i class="fa fa-users"></i>

                    </a>
                </li>
                <li class="nav-item dropdown p-1 ml-2" style="background:gray !important" title="Calculator"
                    data-toggle="modal" data-target=".calculator_modal">
                    <a class="nav-link text-light" href="#"><i class="fa fa-calculator"></i>

                    </a>
                </li>
                <li class="nav-item dropdown p-1 ml-2 bill_preview" style="background:#17a2b8 !important"
                    title="Bill Preview" data-toggle="modal" data-target=".bill_modal">
                    <a class="nav-link text-light" href="#"><i class="fa fa-sticky-note"></i>

                    </a>
                </li>
                <li class="nav-item dropdown p-1 ml-2 profitloss" style="background:green !important"
                    title="Today Profit/Loss" data-toggle="modal" data-target=".profit">
                    <a class="nav-link text-light" href="#"><i class="fa fa-hourglass-start"></i></i>

                    </a>
                </li>


            </ul>

            <p style="color:white;margin-right: 180px;float: right;height:20px;padding: 0px;">{{ date('l, jS F Y') }}
            </p>

            <!--user-profile--rightpart-->
            <div class=" ">
                <span class="navbar-text">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" data-toggle="dropdown" id="user-profile">
                                @if (!empty(Auth::user()->image))
                                <img src="{{ asset(Auth::user()->image) }}">
                                @else
                                <img src="{{ asset('admin/defaultIcon/user.png') }}"
                                    style="height: 30px; width:30px;">
                                @endif
                            </a>
                            <ul class="dropdown-menu p-0" id="user-profile-dropdown">
                                <li>
                                    <a class="dropdown-item" href="#">{{ Auth::user()->name }}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}">
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </span>
            </div>
    </nav>
    <style>
        .b-example-divider {
            height: 10px;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }
    </style>
    <div class="b-example-divider"></div>

    <!--Calculator modal-->
    <div class="modal fade bd-example-modal-lg calculator_modal" tabindex="-1" role="dialog"
        aria-labelledby="payment_modal" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Calculator</h2>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                <div class="modal-body">
                    <style>
                        #calculator_table>td {
                            border: 0px;
                        }
                    </style>
                    <div style="text-align: center;">
                        <table class="table">
                            <tr>
                                <td colspan="3"><input class="form-control" type="text" id="result" /
                                        style="text-align:right;" readonly=""></td>
                                <td><input type="button" value="Clear" onclick="clr()" / class="cal_btn clear">
                                </td>
                            </tr>
                            <tr>
                                <td><input type="button" value="1" onclick="dis('1')" / class="cal_btn number">
                                </td>
                                <td>
                                    <input type="button" value="2" onclick="dis('2')" / class="cal_btn number">

                                </td>
                                <td><input type="button" value="3" onclick="dis('3')" / class="cal_btn number">
                                </td>
                                <td><input type="button" value="/" onclick="dis('/')" /
                                        class="cal_btn operator"> </td>
                            </tr>
                            <tr>
                                <td><input type="button" value="4" onclick="dis('4')" / class="cal_btn number">
                                </td>
                                <td><input type="button" value="5" onclick="dis('5')" / class="cal_btn number">
                                </td>
                                <td><input type="button" value="6" onclick="dis('6')" / class="cal_btn number">
                                </td>
                                <td><input type="button" value="-" onclick="dis('-')" /
                                        class="cal_btn operator"> </td>
                            </tr>
                            <tr>
                                <td><input type="button" value="7" onclick="dis('7')" / class="cal_btn number">
                                </td>
                                <td><input type="button" value="8" onclick="dis('8')" / class="cal_btn number">
                                </td>
                                <td><input type="button" value="9" onclick="dis('9')" / class="cal_btn number">
                                </td>
                                <td><input type="button" value="+" onclick="dis('+')" /
                                        class="cal_btn operator"> </td>
                            </tr>
                            <tr>
                                <td><input type="button" value="." onclick="dis('.')" / class="cal_btn number">
                                </td>
                                <td><input type="button" value="0" onclick="dis('0')" / class="cal_btn number">
                                </td>
                                <td><input type="button" value="=" onclick="solve()" / class="cal_btn equal">
                                </td>
                                <td><input type="button" value="*" onclick="dis('*')" /
                                        class="cal_btn operator"> </td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--Profit modal-->
    <div class="modal fade bd-example-modal-lg profit" tabindex="-1" role="dialog" aria-labelledby="payment_modal"
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content p-3 profitlossContainer">


            </div>
        </div>
    </div>

    <!--To day's sale-->
    <div class="modal fade bd-example-modal-lg todaysale_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl todaySalesContainer">

        </div>
    </div>

    <!--Expense modal-->
    <div class="modal fade bd-example-modal-lg expense_modal" tabindex="-1" role="dialog"
        aria-labelledby="payment_modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3">
                <div class="modal-header pb-0">
                    <h2 class="modal-title pt-3" id="exampleModalLabel">Add Expense</h2>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.pos.expenseSave') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Date *</label>
                                <input type="date" value="{{ date('Y-m-d') }}" class="form-control" placeholder="Date" name="eDate">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Reference</label>
                                <input type="Text" class="form-control" name="reference" placeholder="Reference">
                            </div>
                            <div class="form-group col-md-6" name="store_id">
                                <label>Store</label>
                                <select class="custom-select">

                                    @foreach ($stores as $store)
                                    <option value="{{ $store->id }}">{{ $store->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Category *</label>
                                <select class="custom-select" name="category">
                                    <option selected>Select Expense Category</option>
                                    @foreach ($expenseCats as $catlist)
                                    <option value="{{ $catlist->id }}">{{ $catlist->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Amount *</label>
                                <input type="Text" class="form-control" name="cost" placeholder="Amount">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Attatchment</label>
                                <input type="file" class="form-control-file" name="documents">
                            </div>


                            <div class="form-group col-md-12 mt-3">
                                <label>Note</label>
                                <textarea class="form-control" name="note" rows="3"></textarea>
                            </div>


                        </div>


                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Add Expense</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!--table section-->
    @yield('posContent')

    <!--js file-->

    <script src="{{ asset('admin/asset/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/asset/js/bootstrap.min.js') }}"></script>
    <!--dropdown plugin file-->
    <script src="{{ asset('admin/asset/js/bootnavbar.js') }}"></script>
    <script src="{{ asset('admin/asset/js/all.min.js') }}"></script>
    <script src="{{ asset('admin/asset/js/main.js') }}"></script>

    <!--select 2-->
    <script src="{{ asset('admin/asset/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            //today sales list
            $(".todaySale").click(function() {
                //ajax
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('admin.pos.todaySales') }}",
                    type: "GET",

                    success: function(data) {
                        $(".todaySalesContainer").html(data);

                    },
                    error: function() {
                        toastr.error("Something went Wrong, Please Try again.");
                    }
                });

            });
            //today's profit or loss
            $(".profitloss").click(function() {
                //ajax
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('admin.pos.todayprofit') }}",
                    type: "GET",

                    success: function(data) {
                        $(".profitlossContainer").html(data);

                    },
                    error: function() {
                        toastr.error("Something went Wrong, Please Try again.");
                    }
                });

                //end ajax
            });
        });
    </script>
    <!-- <script>
        function printContent(el) {
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
        }
    </script> -->
    <script src="{{ asset('admin/asset/js/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}
    <script>
        @if(count($errors) > 0)
        @foreach($errors -> all() as $error)
        toastr.error("{{ $error }}");
        @endforeach
        @endif
    </script>
</body>

</html>