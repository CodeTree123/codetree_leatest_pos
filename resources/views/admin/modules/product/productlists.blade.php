@extends('admin.layouts.adminmaster')
@section('adminTitle')
    All Products- Admin Dashboard
@endsection
@section('adminContent')
    @php
        use App\Http\Controllers\admin\StockController;
    @endphp
    <style>
        input[type=text]:focus {
            border-color: inherit;
            -webkit-box-shadow: none;
            box-shadow: none;
            height: 28px;
            font-size: inherit;
            border-color: rgba(229, 103, 23, 0.8);
            outline-color: gray;
            font-size: 15px;
            text-transform: none;

        }

        .table td {
            padding-bottom: 0px;
            vertical-align: middle;
        }
    </style>
    <div class="col-md-12 mt-5 pt-3 border-bottom">
        <div class="text-dark px-0">
            <p class="mb-1"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard / </a><a
                    href="" class="active-slink">Product List</a> <span class="top-date">Total Products:
                    {{ $products->total() }}</span></p>

        </div>
    </div>

    <div class="container-fluid p-3">
        <div class="box">
            <div class="box-header">
                <div class="box-icon-left border-right" style="height:100%">
                    <p class="btn mt-0 task-icon"><i class="fa fa-barcode"></i></p>
                </div>
                <h2 class="blue task-label">All Products</h2>
                <div class="box-icon border-left" style="height:100%">
                    <div class="dropdown mt-0">
                        <p class="task-btn text_p_primary" title="Actions">
                            <i class="fa fa-th-list"></i>
                            </button>
                        <div class="task-menu p-2">
                            <a href="{{ route('admin.productAdd') }}" class="dropdown-item pl-0" type="button">
                                <i class="fa-fw fa fa-plus-circle"></i> Add New Product
                            </a>
                            <a href="{{ route('admin.product.export.excel') }}" class="dropdown-item pl-1" type="button">
                                <i class="fa fa-file-excel"></i> Export Excel
                            </a>
                            <a class="dropdown-item pl-1" type="button">
                                <i class="fa fa-file-pdf"></i> Export PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext mb-0">Please use the table below to navigate or filter the results. You can
                            download the table as excel and pdf.</p>
                        <div class="row">
                            @if (Session::has('error-message'))
                                <p class="alert alert-danger">{{ Session::get('error-message') }}</p>
                            @endif
                            <div class="col-8">
                                <p class="pt-2 mb-0">Showing {{ $products->count() }} of {{ $products->total() }}</p>
                            </div>
                            <div class="col-4 mt-1">
                                <input type="text" class="col-10 m-1 mx-0" id="searchKey" style="float: right;"
                                    placeholder="Search product by name or code ">
                                <div id="search_list" class="col-10 px-0"
                                    style="position: absolute; margin-top: 35px;float: right;right:0px;z-index: 1;background: white;box-shadow: 0 0 15px 1px #dee2e6;display: none;">
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-hover">
                            <thead class="bg_p_primary">
                                <tr>
                                    <th class="font-weight-bold" scope="col">#</th>
                                    <th class="font-weight-bold" scope="col">Image</th>
                                    <th class="font-weight-bold" scope="col">Name</th>
                                    <th class="font-weight-bold" scope="col">Code</th>
                                    <th class="font-weight-bold" scope="col">Brand</th>
                                    <th class="font-weight-bold" scope="col">Category</th>
                                    <th class="font-weight-bold" scope="col">Cost</th>
                                    <th class="font-weight-bold" scope="col">Price</th>
                                    <th class="font-weight-bold" scope="col">Unit</th>
                                    <th class="font-weight-bold" scope="col">Alert Quantity</th>
                                    <th class="font-weight-bold" scope="col">Stock</th>
                                    <th class="font-weight-bold" scope="col">Actions</th>

                                </tr>
                            </thead>
                            <tbody id="table-data">
                                <?php $counter = 0; ?>
                                @foreach ($products as $product)
                                    <?php
                                    $counter++;
                                    $stock = StockController::stock($product->id);
                                    $imageUrl = str_replace('public/', '', $product->image);
                                    ?>
                                    <tr>
                                        <td>{{ $counter }}</td>
                                        <td>
                                            @if (!empty(@$product->image))
                                                <img src="{{ asset($imageUrl) }}" alt="{{ @$product->name }}"
                                                    class="img-rounded" style="width:35px;height:35px;">
                                            @else
                                                <img src="{{ asset('admin/defaultIcon/no_image.png') }}" alt="No-image"
                                                    class="img-rounded" style="width:35px;height:35px;">
                                            @endif
                                        </td>
                                        <td>{{ @$product->name }}</td>
                                        <td>{{ @$product->code }}</td>
                                        <td>{{ @$product->brandInfo['name'] }}</td>
                                        <td>{{ @$product->categoryInfo['name'] }}</td>
                                        <td style="text-align: right;">{{ number_format(@$product->purchase_price) }}</td>
                                        <td style="text-align: right;">{{ number_format(@$product->sell_price) }}</td>
                                        <td>{{ @$product->unitInfo['name'] }}</td>

                                        <td style="text-align: right;">{{ @$product->alert_qty }}</td>
                                        <td style="text-align:center;">
                                            @if ($stock < @$product->alert_qty && $stock > 0)
                                                <p class="badge badge-warning">{{ $stock }}</p>
                                            @elseif($stock <= 0)
                                                <p class="badge badge-danger">{{ $stock }}</p>
                                            @else
                                                <p class="badge bg_secondary_teal">{{ $stock }}</p>
                                            @endif
                                        </td>
                                        <td style="width:120px;">
                                            <!-- <p class="btn bg_secondary_teal p-1 px-2 mb-0" href="{{ route('admin.product.productDetails', $product->id) }}" style="font-size: 13px;cursor:pointer;" title="product Details"> <i class="fa-fw fa fa-eye"></i></p> -->
                                            <p class="btn bg_secondary_teal p-1 px-2 mb-0 productDetails"
                                                style="font-size: 13px;cursor:pointer;" title="product Details"
                                                data-pro_id="{{ @$product->id }}"> <i class="fa-fw fa fa-eye"></i></p>
                                            <p class="btn bg_p_primary p-1 mb-0 px-2 edit-product"
                                                data-productid="{{ @$product->id }}"
                                                style="font-size: 13px;cursor:pointer;" title="Edit product"> <i
                                                    class="fa fa-edit"></i></p>

                                            <div class="del-modal <?php echo 'modal' . $counter; ?>">
                                                <p><b>Record delete confirmation.</b></p>
                                                <p>Are you want to really delete ?</p>

                                                <button class="btn bg_p_primary py-1 del-close"
                                                    style="background-color: #808080a6;border-color: #808080a6;">Cancel</button>
                                                <form method="post" action="{{ route('admin.product.deleteProduct') }}"
                                                    style="float:right;">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ @$product->id }}">
                                                    <button class="btn bg_secondary_grey py-1">Confirm</button>
                                                </form>
                                            </div>
                                            <script>
                                                $(document).ready(function() {
                                                    $(".<?php echo 'btn' . $counter; ?>").click(function() {
                                                        $(".<?php echo 'modal' . $counter; ?>").show('fadeOut');

                                                    });

                                                    $(".del-close").click(function() {
                                                        $(".del-modal").hide('fadeIn');
                                                    });
                                                });
                                            </script>
                                            <p class="btn bg_secondary_grey mb-0 p-1 px-2 del-btn <?php echo 'btn' . $counter; ?>"
                                                data-store_id="{{ $product->id }}"
                                                style="font-size: 13px;relative;cursor:pointer;" title="Delete product">
                                                <i class="fa fa-trash"></i>
                                            </p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{ @$products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Add New Product</h2>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                <div class="modal-body">

                    <form method="post" action="#" entype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Supplier<i class="fa-fw fa fa-plus-circle"></i></label>
                            <select class="custom-select" name="supplier">
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->company }}({{ $supplier->name }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Product Name *</label>
                            <input type="text" class="form-control" name="name" placeholder="Product Name">
                        </div>
                        <div class="form-group">
                            <label>Product Code *</label>

                            <input type="text" class="form-control" name="code" readonly=""
                                value="{{ $productCode }}-{{ $lastId }}">
                        </div>
                        <div class="form-group">
                            <label>Starting Inventory</label>
                            <input type="number" class="form-control" name="start_inventory"
                                placeholder="Starting Inventory">
                        </div>
                        <div class="form-group">
                            <label>Product Category</label>
                            <select class="custom-select" name="category" id="category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Product Sub Category</label>
                            <select class="custom-select" name="subcategory" id="subcategory">
                                <option value="">Select Subcategory</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Product Band</label>
                            <select class="custom-select" name="btand">
                                <option value="">Select Brand</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Product Unit</label>
                            <select class="custom-select" name="unit">
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Product Cost *</label>
                            <input type="text" class="form-control" name="purchase_price"
                                placeholder="Product Puuchase Price">
                        </div>

                        <div class="form-group">
                            <label>Product Price *</label>
                            <input type="text" class="form-control" name="sell_price"
                                placeholder="Product Sell Price">
                        </div>
                        <div class="form-group">
                            <label>whole sell Price </label>
                            <input type="text" class="form-control" name="whole_sell"
                                placeholder="Product whole sell Price">
                        </div>
                        <div class="form-group">
                            <label>Alert Quantity</label>
                            <input type="text" class="form-control" name="alert_qty" placeholder="Alert Quantity">
                        </div>

                        <div class="form-group">
                            <label>Product Description</label>
                            <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Product Image</label>
                            <input type="file" class="form-control-file" name="image1">
                        </div>

                </div>
                <div class="modal-footer">

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Add Product">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg productModal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3 modal-data">

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#category").on('change', function() {
                var catId = $(this).val();
                //ajax

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('admin.subcategory.selectSubcategory') }}",
                    type: "POST",
                    data: {
                        'catId': catId
                    },
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#subcategory').empty();
                        $.each(data, function(index, subcatObj) {

                            $("#subcategory").append('<option value ="' + subcatObj.id +
                                '">' + subcatObj.name + '</option>');
                        });

                    },
                    error: function() {
                        alert("error ase");
                    }
                });
                //endajax
            });
            //search product
            $("#searchKey").on('keyup', function() {
                var key = $(this).val();
                //ajax
                if (key == '') {
                    $("#search_list").html('');
                } else {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('admin.product.searchProducts') }}",
                        type: "POST",
                        data: {
                            'key': key
                        },
                        //dataType:'json',
                        success: function(data) {
                            $("#search_list").css('display', 'block');
                            $("#search_list").html(data);
                        },
                        error: function() {
                            // toastr.error("Something went Wrong, Please Try again.");
                        }
                    });

                    //end ajax
                }
            });


            //edit product
            $(".edit-product").click(function() {
                var productid = $(this).data('productid');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('admin.product.productEdit') }}",
                    type: "POST",
                    data: {
                        'productid': productid
                    },
                    success: function(data) {
                        $(".modal-data").html(data);
                        $('.productModal').modal('show');
                    },
                    error: function() {
                        toastr.error("Something went Wrong, Please Try again.");
                    }
                });
            });

            //product details
            $(".productDetails").click(function() {
                var pro_id = $(this).data('pro_id');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('admin.product.productDetails') }}",
                    type: "POST",
                    data: {
                        'pro_id': pro_id
                    },
                    success: function(data) {
                        console.log(data);
                        $(".modal-data").html(data);
                        $('.productModal').modal('show');
                    },
                    error: function() {
                        toastr.error("Something went Wrong, Please Try again.");
                    }
                });
            });
        });
    </script>
@endsection
