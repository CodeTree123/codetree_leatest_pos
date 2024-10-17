@extends('admin.modules.pos.layout.posMaster')
@section('adminTitle')
POS Module
@stop
@section('posContent')
<?php

use App\Http\Controllers\admin\StockController;


?>

<style>
.productItem {
    display: flex; /* Use flexbox to align content */
    flex-direction: column; /* Stack items vertically */
    justify-content: space-between; /* Ensure even spacing */
    min-height: 300px; /* Set a consistent height */
    padding: 20px; /* Padding inside the product item */
    margin: 0 5px; /* Adjust side margins */
    text-align: center; /* Center text */
    border: 1px solid #ddd; /* Optional: Add a border for better visibility */
    border-radius: 5px; /* Optional: Rounded corners */
    background-color: #f9f9f9; /* Optional: Background color */
}

.product_list {
    display: flex;                /* Use flexbox layout */
    flex-wrap: wrap;             /* Allow items to wrap to the next line */
    justify-content: flex-start;  /* Align items to the start */
}
</style>
<script>
  function dis(val) {
    document.getElementById("result").value += val
  }

  function solve() {
    let x = document.getElementById("result").value
    let y = eval(x)
    document.getElementById("result").value = y
  }

  function clr() {
    document.getElementById("result").value = ""
  }
</script>
<div class="col-md-12 mt-5 pt-3">

</div>
<div class="row m-0">
  <div class="col-sm-4 com-md-4 ml-3 leftdiv">
    <div id="left-top" class="mt-2">


      <div class="form-group">
        <div class="input-group" style="z-index:1;">
          @if(Session::has('customer'))
          <select class="form-control pos-input-tip" name="customer" value="" id="poscustomer">
            <option value="{{Session::get('customer')}}">{{ Session::get('customerName') }}</option>
          </select>
          @else
          <select class="form-control pos-input-tip " name="customer" value="" id="poscustomer" style="width: 320px;">
            <option value="" readonly="">Select customer or search by mobile</option>
            @foreach($customers as $customer)
            <option value="{{$customer->id}}">{{$customer->name}}({{$customer->mobile}})</option>
            @endforeach
          </select>
          @endif
          <div class="input-group-addon no-print customer_btn">
            <a href="#"><i class="fa fa-plus-circle" id="addIcon" data-toggle="modal" data-target=".customer_modal" title="Add new Customer"></i></a>
          </div>

          <div class="input-group-addon no-print customer_btn">
            <a href="#" class="view_customer"><i class="fa fa-eye" id="addIcon" data-toggle="modal" data-target=".customer_details_modal" title="Customer Details"></i></a>
          </div>
          <div class="input-group-addon no-print customer_btn customerReset" id="toogle-customer-read-attr">
            <a href="#"><i class="fa fa-edit" id="addIcon"></i></a>
          </div>





        </div>
        <div style="clear:both;"></div>
      </div>

      <div class="no-print">
        <div class="form-group" id="ui">
          <div class="input-group" style="z-index:1;">
            <input type="text" name="customer" value="" id="posProduct" required="required" class="form-control pos-input-tip barcode" placeholder="Scan/search product name/code" title="Scan/Search product name/code" />

            <div class="input-group-addon no-print product_btn">
              <a href="#" id="view-customer"><i class="fa fa-plus-circle" id="addIcon" data-toggle="modal" data-target=".product_modal" title="Add new Product"></i></a>
            </div>


          </div>
          <div style="clear:both;"></div>
        </div>
      </div>
    </div>
    <!--End left top-->
    <div id="print">
      <div id="left-middle" style="max-height:46vh;overflow-y: scroll;min-height: 51vh;">
        <div id="product-list">
          <table class="table items table-striped table-bordered table-condensed table-hover sortable_table" id="posTable" style="margin-bottom: 0;">
            <thead class="bg_p_primary">
              <tr>
                <th width="40%">Product</th>
                <th width="15%">Price</th>
                <th width="15%">Qty</th>
                <th width="20%">Subtotal</th>
                <th style="width: 5%; text-align: center;"><a href="{{route('admin.pos.removeAllItem')}}" style="color:white;" title="Clear Cart"><i class="fa fa-trash"></i></a>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
              $total_price = 0;
              $total_product = 0;
              $counter = 0;
              ?>
              @foreach(Cart::content() as $product)
              <?php
              $counter++;
              $total_price += $product->subtotal;
              $total_product += $product->qty;
              ?>
              <tr>
                <td width="40%">{{$product->name}} <i class="fa fa-edit update-product text_p_primary" data-proid="{{$product->id}}"
                    data-row="{{$product->rowId}}" style="cursor:pointer;"></i></td>
                <td width="15%" style="text-align: right;">{{number_format($product->price)}}</td>
                <td width="15%"><input type="text" value="{{$product->qty}}" style="width: 100%;" class="qty_update_input" data-qty="{{$product->rowId}}"></td>
                <td width="20%" style="text-align: right;">{{number_format($product->subtotal)}}</td>
                <td style="width: 5%; text-align: center;"><a href="#" title="Remove {{$product->name}}" data-cartrowrd="{{$product->rowId}}" class="removeItemBtn"><i class="fa fa-times-circle"></i></a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div style="clear:both;"></div>
        </div>
      </div>

      <div style="clear:both;"></div>
      <div id="left-bottom">
        <table id="totalTable" style="width:100%; float:right; padding:5px; color:#000; background: #FFF;">
          <tr>
            <td style="padding: 5px 10px;border-top: 1px solid #DDD;">Items</td>
            <td class="text-right" style="padding: 5px 10px;font-size: 14px; font-weight:bold;border-top: 1px solid #DDD;"><span id="titems">{{Cart::count()}}</span>
            </td>
            <td style="padding: 5px 10px;border-top: 1px solid #DDD;">Total</td>
            <td class="text-right" style="padding: 5px 10px;font-size: 14px;font-weight:bold;border-top: 1px solid #DDD;"><span id="total">{{Cart::subtotal()}}</span>
            </td>
          </tr>
          <tr>
            <td style="padding: 5px 10px;">VAT <a href="#" id="pptax2"><i class="fa fa-edit" data-toggle="modal" data-target=".tax_modal"></i></a>
            </td>
            <td class="text-right" style="padding: 5px 10px;font-size: 14px; font-weight:bold;"><span id="ttax2">{{Cart::tax()}}</span>
            </td>
            <!-- <td style="padding: 5px 10px;">Discount <a href="#" id="ppdiscount"><i class="fa fa-edit" data-toggle="modal" data-target=".discount_modal"></i></a>
            </td> -->
            <!-- <td class="text-right" style="padding: 5px 10px;font-weight:bold;"><span id="tds">
                @if(Session::has('saleDiscount'))
                {{number_format(Session::get('saleDiscount'))}}
                @else
                {{Cart::discount()}}
                @endif

              </span>
            </td> -->
          </tr>
          <tr>
            <td style="padding: 5px 10px; border-top: 1px solid #666;border-bottom: 1px solid #333; font-weight:bold; background:#333; color:#FFF;" colspan="2">Total Payable<a href="#" id="pshipping"></a>

            </td>
            <td class="text-right" style="padding:5px 10px 5px 10px; font-size: 14px;border-top: 1px solid #666; border-bottom: 1px solid #333; font-weight:bold; background:#333; color:#FFF;" colspan="2">
              <span id="gtotal">
                <?php
                $total = (float) str_replace(',', '', Cart::total());
                $discount = Session::get('saleDiscount');
                $gtotal = $total - $discount;
                ?>
                @if(Session::has('saleDiscount'))
                {{number_format($gtotal,2)}}
                @else
                {{Cart::total()}}
                @endif</span>
            </td>
          </tr>
        </table>

        <div class="clearfix"></div>

        <div id="botbuttons" class="col-xs-12 col-md-12 text-center">
          <div class="row">

            <div class="col-xs-6 col-md-6" style="padding: 0;">
              <div class="btn-group-vertical btn-block">
                <a href="{{route('admin.pos.removeAllItem')}}" class="btn bg_secondary_grey btn-block btn-flat" style=";border-radius: 0px;"> Cancel</a>
              </div>
            </div>
            <div class="col-xs-6 col-md-6" style="padding: 0;">
              <div class="btn-group-vertical btn-block">
                <p class="btn bg_p_primary btn-block btn-flat payment-btn" style=";border-radius: 0px;cursor:pointer">Payment</p>
              </div>
            </div>
            <!-- <div class="col-xs-4 col-md-4" style="padding: 0;">
      <div class="btn-group-vertical btn-block">
        <button type="button" class="btn bg_secondary_teal btn-block btn-flat"id="reset" style=";border-radius: 0px;">Bill</button>
      </div>
    </div> -->


          </div>
        </div>


      </div>
    </div>
    <!--End left-->

  </div>
<!-- Product list start -->
<div class="col-sm-7 col-md-7 ml-4 rightdiv">
    <div class="product_list pt-3">
        @foreach($allProducts as $products)
        <?php
        $counter++;
        $stock = StockController::stock($products->id);
        $imgUrl = str_replace('public/', '', $products->image);
        $discountedPrice = $products->sell_price; // Initialize with the original price
        $promotionAmount = 0; // Initialize promotion amount

        // Check if promotions exist and get the latest promotion amount if any
        if ($products->promotions->isNotEmpty()) {
            // Assuming you want to consider the latest promotion (if there are multiple)
            $latestPromotion = $products->promotions
            ->where('status', 'Active')  // Only consider active promotions
            ->sortByDesc('created_at')
            ->first();
            if ($latestPromotion) {
                $promotionAmount = $latestPromotion->promotion_ammount; // Get the discount percentage
                // Calculate the discounted price
                $discountedPrice = $products->sell_price - ($products->sell_price * ($promotionAmount / 100));
            }
        }
        ?>
        <button class="btn-prni btn-default product pos-tip productItem m-1 p-1" title="{{$products->name}}" data-pro_id="{{$products->id}}" data-stock="{{$stock}}">
            @if(!empty($products->image))
            <img src="{{ asset($imgUrl) }}" alt="{{$products->name}}" class="img-rounded">
            @else
            <img src="{{ asset('admin/defaultIcon/no_image.png')}}" alt="{{$products->name}}" class="img-rounded">
            @endif
            <p class="">{{$products->name}}</p>
            <div class="">
                @if($stock <= 0)
                    <span class="badge badge-danger">Out Of Stock</span>
                @else
                    Stock : {{ $stock }}
                @endif
            </div>

            @if($promotionAmount > 0)
                <div>
                    <span style="color: green;">Discounted Price: {{ number_format($discountedPrice, 2) }} (Original: {{ number_format($products->sell_price, 2) }})</span>
                    <span class="badge badge-primary">(Discount: {{ $promotionAmount }}%)</span>
                </div>
            @else
                <div>
                    <span>Price: {{ number_format($products->sell_price, 2) }}</span>
                </div>
            @endif
        </button>
        @endforeach
    </div>
</div>

    <!--End product list-->
    <div id="category_area">
      @foreach($categories as $category)
      <button class="btn-prni btn-default product pos-tip category_btn" title="{{$category->name}}" data-cat_id="{{$category->id}}">
        <img src="{{ asset($category->image) }}" alt="acifix 250mg" class="img-rounded">
        <p class="">{{$category->name}}</p>
      </button>
      @endforeach
    </div>

    <div id="subcategory_area">
      @foreach($subcategories as $subcat)
      <button class="btn-prni btn-default product pos-tip subcategoty_btn" title="{{$subcat->name}}" data-subcat_id="{{$subcat->id}}">
        <img src="{{ asset($subcat->image) }}" alt="acifix 250mg" class="img-rounded">
        <p class="">{{$subcat->name}}</p>
      </button>
      @endforeach
    </div>

    <div id="brands_area">
      @foreach($brands as $brand)
      <button class="btn-prni btn-default product pos-tip brand_btn" title="{{$brand->name}}" data-brand_id="{{$brand->id}}">
        <img src="{{ asset($brand->image) }}" alt="acifix 250mg" class="img-rounded">
        <p class="">{{$brand->name}}</p>
      </button>
      @endforeach
    </div>

    <div style="float: right;right:0px;min-height:500px;min-width: 40px;margin-right: 0px;position: fixed;margin-top:50px;">
      <div class="btn-group-vertical mt-5" style="margin-right:-40px;">
        <button class="btn bg_p_primary side_btn cat_btn" style="margin-bottom:28px">
          Category
        </button>
        <button class="btn bg_secondary_cyan mt-5 side_btn subcat_btn">
          SubCategory
        </button>
        <button class="btn bg_secondary_orange side_btn brands_btn" style="margin-top:76px">
          Brands
        </button>
      </div>

    </div>
</div>
<!--Customer Modal -->
<div class="modal fade bd-example-modal-lg customer_modal" tabindex="-1" role="dialog" aria-labelledby="customer_modal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Add New Customer</h2>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      <div class="modal-body">

        <form id="customerForm" method="post" action="{{route('admin.pos.addCustomer')}}">
          @csrf
          <div class="form-row">

            <div class="form-group col-md-6">
              <label>Customer Group</label>
              <select class="custom-select form-control" name="group">
                @foreach($customerGroups as $customerGroup)
                <option value="{{$customerGroup->id}}">{{$customerGroup->name}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group col-md-6">
              <label>Mobile *</label>
              <input type="text" class="form-control" name="mobile" placeholder="Enter Customer Mobile">
            </div>
            <div class="form-group col-md-6">
              <label>Name</label>
              <input type="text" class="form-control" name="name" placeholder="Enter Customer Name">
            </div>
            <div class="form-group col-md-6">
              <label>Email</label>
              <input type="email" class="form-control" name="email" placeholder="Enter Customer Email Address">
            </div>
            <div class="form-group col-md-6">
              <label>Company</label>
              <input type="text" class="form-control" name="company" placeholder="Enter Customer Company Name">
            </div>
            <div class="form-group col-md-6">
              <label>Address</label>
              <input type="text" class="form-control" name="address" placeholder="Enter Customer Address">
            </div>



          </div>

      </div>
      <div class="modal-footer">


        <input type="submit" class="btn btn-primary" value="Add Customer" id="saveCustomer" style="border-radius: 0px;">
        </form>

      </div>
    </div>
  </div>
</div>
<!--Customer details modal-->
<div class="modal fade bd-example-modal-lg customer_details_modal" tabindex="-1" role="dialog" aria-labelledby="customer_details_modal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Customer Details</h2>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      <div class="modal-body row" id="customer_details">


      </div>

    </div>
  </div>
</div>
<!--Product modal-->
<div class="modal fade bd-example-modal-lg product_modal" tabindex="-1" role="dialog" aria-labelledby="product_modal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Add New Product</h2>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      <div class="modal-body">

        <form method="post" action="{{route('admin.pos.productSave')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="formGroupExampleInput2">Supplier<i class="fa-fw fa fa-plus-circle"></i></label>
              <select class="custom-select" name="supplier">
                @foreach($suppliers as $supplier)
                <option value="{{$supplier->id}}">{{$supplier->company}}({{$supplier->name}})</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-6">
              <label>Product Name *</label>
              <input type="text" class="form-control" name="name" placeholder="Product Name">
            </div>
            <div class="form-group col-md-6">
              <label>Product Code *</label>
              <?php $code = count($allProducts) + 1; ?>
              <input type="text" class="form-control" name="code" readonly="" value="{{$productCode}}-{{$code}}">
            </div>

            <div class="form-group col-md-6">
              <label for="formGroupExampleInput2">Product Category</label>
              <select class="custom-select" name="category" id="category">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach

              </select>
            </div>
            <div class="form-group col-md-6">
              <label>Product Sub Category</label>
              <select class="custom-select" name="subcategory" id="subcategory">
                <option value="">Select Subcategory</option>

              </select>
            </div>
            <div class="form-group col-md-6">
              <label>Product Band</label>
              <select class="custom-select" name="btand">
                <option value="">Select Brand</option>
                @foreach($brands as $brand)
                <option value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group col-md-6">
              <label>Product Cost *</label>
              <input type="text" class="form-control" name="purchase_price" placeholder="Product Puuchase Price">
            </div>

            <div class="form-group col-md-6">
              <label for="formGroupExampleInput">Product Price *</label>
              <input type="text" class="form-control" name="sell_price" placeholder="Product Sell Price">
            </div>
            <div class="form-group col-md-6">
              <label>Product Unit</label>
              <select class="custom-select" name="unit">
                @foreach($units as $unit)
                <option value="{{$unit->id}}">{{$unit->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-6">
              <label>Alert Quantity</label>
              <input type="text" class="form-control" name="alert_qty" placeholder="Alert Quantity">
            </div>

            <div class="form-group col-12">
              <label>Product Description</label>
              <textarea class="form-control" name="description" rows="3"></textarea>
            </div>
            <div class="form-group col-12">
              <label for="formGroupExampleInput">Product Image</label>
              <input type="file" class="form-control-file" name="image">
            </div>
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
<!--Tax modal-->
<div class="modal fade bd-example-modal-lg tax_modal" tabindex="-1" role="dialog" aria-labelledby="tax_modal" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content p-2">
      <div class="modal-header pt-0 px-0">
        <h2 class="modal-title pt-3" id="exampleModalLabel">Add Order Tax</h2>
        <h1 data-dismiss="modal" class="pt-1 px-2" style="cursor:pointer;">&times;</h1>
      </div>
      <div class="modal-body">

        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Order Tax</label>

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
<!-- <div class="modal fade bd-example-modal-lg discount_modal" tabindex="-1" role="dialog" aria-labelledby="discount_modal" aria-hidden="true">
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
      </div>
    </div>
  </div>
</div> -->
<!--Payment modal-->
<div class="modal fade bd-example-modal-lg payment_modal" tabindex="-1" role="dialog" aria-labelledby="payment_modal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-3">
      <div class="modal-header pb-1 pt-1 px-0">
        <h2 class="modal-title" id="exampleModalLabel">Add Payment</h2>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      <div class="modal-body payment-screen">


      </div>

    </div>
  </div>
</div>

<!--Bill modal-->
<div class="modal fade bd-example-modal-lg bill_modal" tabindex="-1" role="dialog" aria-labelledby="payment_modal" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Bill Preview</h2>
        <button type="button" class="btn btn-primary" onclick="printContent('bill_details')">Print</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      <div class="modal-body" id="bill_details">

      </div>

    </div>
  </div>
</div>
<!--Product update modal-->
<div class="modal fade bd-example-modal-lg product_info" tabindex="-1" role="dialog" aria-labelledby="payment_modal" aria-hidden="true">
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
</div>

<script>
  $(document).ready(function() {
    $(".cat_btn").click(function() {
      $("#category_area").toggle(700);
      $("#subcategory_area").hide('slow');
      $("#brands_area").hide('slow');
    });
  });
  $(document).ready(function() {
    $(".subcat_btn").click(function() {
      $("#subcategory_area").toggle('slow');
      $("#brands_area").hide('slow');
      $("#category_area").hide('slow');
    });
  });
  $(document).ready(function() {
    $(".brands_btn").click(function() {
      $("#brands_area").toggle('slow');
      $("#subcategory_area").hide('slow');
      $("#category_area").hide('slow');
    });
  });
  $(document).ready(function() {
    $(".rightdiv").click(function() {
      $("#brands_area").hide('slow');
      $("#subcategory_area").hide('slow');
      $("#category_area").hide('slow');
    });
  });

  $(document).ready(function() {
    $('#poscustomer').select2({
      theme: "bootstrap",
      width: 320
    });
    //set customer
    $("#poscustomer").on('change', function() {
      var customerId = $(this).val();
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{route('admin.pos.setCustomer')}}",
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
    //customr customerReset
    $(".customerReset").click(function() {
      var ctype = 1;
      //ajax
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{route('admin.pos.customerReset')}}",
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
    //tax add function
    $(".tax_add_btn").click(function() {
      var tax = $("#tax_input").val();
      //ajax
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{route('admin.pos.updateTax')}}",
        type: "POST",
        data: {
          'tax': tax
        },
        //dataType:'json',
        success: function(data) {
          $("#print").html(data);
          //data-dismiss=".tax_modal";
          $('.tax_modal').modal('hide');
        },
        error: function() {
          toastr.error("Something went Wrong, Please Try again.");
        }
      });

      //end ajax
    });
    //discount add function
    // $(".discount_add_btn").click(function() {
    //   var discount = $("#discount_input").val();
    //   var discount_type = $("#discount_type").val();
    //   if ($.isNumeric(discount)) {
    //     $.ajax({
    //       headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //       },
    //       url: "{{route('admin.pos.updateDiscount')}}",
    //       type: "POST",
    //       data: {
    //         'discount': discount,
    //         'discount_type': discount_type
    //       },
    //       //dataType:'json',
    //       success: function(data) {
    //         $("#print").html(data);
    //         $('.discount_modal').modal('hide');
    //       },
    //       error: function() {
    //         toastr.error("Something went Wrong, Please Try again.");
    //       }
    //     });
    //   } else {
    //     toastr.error("Please Enter a correct number.");

    //   }
    //   //ajax


    //   //end ajax
    // });
    //search product by name or id or code
    $("#posProduct").keyup(function() {
      var key = $(this).val();

      //ajax
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{route('admin.pos.searchProduct')}}",
        type: "POST",
        data: {
          'key': key
        },

        success: function(data) {

          $('.product_list').html(data);
        },
        error: function() {
          toastr.error("Something went Wrong, Please Try again.");
        }
      });

      //end ajax

    });
    //add product by barcode scaner
    // $(".barcode").keypress(function(e){
    //   if(e.which == 13) {
    //     var pro_id=$(this).val();
    //     $(this).val('');
    //     addToCart(pro_id);
    //   }

    // });
    // $(document).ready(function() 
    // {
    var barcode = "";
    $(document).keydown(function(e) {
      var code = (e.keyCode ? e.keyCode : e.which);
      if (code == 13) // Enter key hit
      {
        // alert(barcode);
        var bar_id = (barcode);

        // $(this).val('');
        // alert(pro_id);
        addToCartWithBar(bar_id);
        barcode = "";
      }
      // else if(code==9)// Tab key hit
      // {
      //     alert(barcode);
      // }
      else {
        barcode = barcode + String.fromCharCode(code);
      }
    });
    // });


    //add product to cart by clicking button
    $(".productItem").click(function() {
      var proId = $(this).data('pro_id');
      var stock = $(this).data('stock');
      if(stock>0){
        addToCart(proId);
      }else{
        toastr.error("Selected Product is out of stock.");
      }
    });

    //product add to cart 
    function addToCart(proId) {
      // $("#posProduct").val('');
      var barcode = "";
      //ajax
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{route('admin.pos.addToCart')}}",
        type: "POST",
        data: {
          'pro_id': proId
        },
        //dataType:'json',
        success: function(data) {
          //  console.log(data);
          $("#print").html(data);
        },
        error: function() {
          toastr.error("Something went Wrong, Please Try again.");
        }
      });

      //end ajax
    }

      //product add to cart 
      function addToCartWithBar(bar_id) {
      // $("#posProduct").val('');
      var barcode = "";
      //ajax
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{route('admin.pos.addToCartWithBar')}}",
        type: "POST",
        data: {
          'bar_id': bar_id
        },
        //dataType:'json',
        success: function(data) {
          //  console.log(data);
          $("#print").html(data);
        },
        error: function() {
          toastr.error("Something went Wrong, Please Try again.");
        }
      });

      //end ajax
    }


    //quantiry update of cart items
    $(".qty_update_input").on('change', function() {
      var rowId = $(this).data('qty');
      var qty = $(this).val();
      if ($.isNumeric(qty)) {
        //ajax
        if (qty != 0) {
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('admin.pos.updateQty')}}",
            type: "POST",
            data: {
              'rowId': rowId,
              'qty': qty
            },
            //dataType:'json',
            success: function(data) {
              console.log(data);
              $("#print").html(data);
            },
            error: function() {
              toastr.error("Something went Wrong, Please Try again.");
            }
          });
        }
        //end ajax
      } else {
        toastr.error("Please Enter Correct Number");

      }


    });
    //update product information
    $(".update-product").click(function() {
      var rowId = $(this).data('row');
      var proId = $(this).data('proid');
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{route('admin.pos.getProductInfo')}}",
        type: "POST",
        data: {
          'rowId': rowId,
          'proId': proId
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
    //view all brands product
    $(".brand_btn").click(function() {
      var brand_id = $(this).data('brand_id');
      $('.product_list').html('');
      //ajax
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{route('admin.pos.searchProductByBrandId')}}",
        type: "POST",
        data: {
          'brand_id': brand_id
        },
        //dataType:'json',
        success: function(data) {
          console.log(data);
          $("#brands_area").hide();
          $('.product_list').html(data);
        },
        error: function() {
          toastr.error("Something went Wrong, Please Try again.");
        }
      });

      //end ajax

    });
    //view all categoty product
    $(".category_btn").click(function() {
      var cat_id = $(this).data('cat_id');
      $('.product_list').html('');
      //ajax
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{route('admin.pos.searchProductByCatId')}}",
        type: "POST",
        data: {
          'cat_id': cat_id
        },
        //dataType:'json',
        success: function(data) {
          console.log(data);
          $("#category_area").hide();
          $('.product_list').html(data);
        },
        error: function() {
          toastr.error("Something went Wrong, Please Try again.");
        }
      });

      //end ajax

    });
    //view all sub-categoty product
    $(".subcategoty_btn").click(function() {
      var subcat_id = $(this).data('subcat_id');
      $('.product_list').html('');
      //ajax
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{route('admin.pos.searchProductBySubcatId')}}",
        type: "POST",
        data: {
          'subcat_id': subcat_id
        },
        //dataType:'json',
        success: function(data) {
          console.log(data);
          $("#subcategory_area").hide();
          $('.product_list').html(data);
        },
        error: function() {
          toastr.error("Something went Wrong, Please Try again.");
        }
      });

      //end ajax

    });
    //payment screen
    $(".payment-btn").click(function() {
      var customer_id = $("#poscustomer").val();
      $(".payment-screen").html('');
      //ajax
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{route('admin.pos.paymentScreen')}}",
        type: "POST",
        data: {
          'customer_id': customer_id
        },
        //dataType:'json',
        success: function(data) {
          $(".payment-screen").html(data);
          $('.payment_modal').modal('show');

        },
        error: function() {
          toastr.error("Something went Wrong, Please Try again.");
        }
      });

      //end ajax
    });
    //bill preview
    $(".bill_preview").click(function() {
      var customer_id = $("#poscustomer").val();
      //ajax
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{route('admin.pos.billPreview')}}",
        type: "POST",
        data: {
          'customer_id': customer_id
        },
        //dataType:'json',
        success: function(data) {
          // console.log(data);
          $("#bill_details").html(data);

        },
        error: function() {
          toastr.error("Something went Wrong, Please Try again.");
        }
      });

      //end ajax
    })
    //view customer details
    $(".view_customer").click(function() {
      var customer_id = $("#poscustomer").val();

      //ajax
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{route('admin.pos.CustomerDetails')}}",
        type: "POST",
        data: {
          'customer_id': customer_id
        },
        //dataType:'json',
        success: function(data) {
          // console.log(data);
          $("#customer_details").html(data);

        },
        error: function() {
          toastr.error("Something went Wrong, Please Try again.");
        }
      });

      //end ajax
    });
    //remove item from cart list
    $(".removeItemBtn").click(function() {
      var rowId = $(this).data('cartrowrd');
      //ajax
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{route('admin.pos.removeItem')}}",
        type: "POST",
        data: {
          'rowId': rowId
        },
        //dataType:'json',
        success: function(data) {

          $("#print").html(data);
        },
        error: function() {
          toastr.error("Something went Wrong, Please Try again.");
        }
      });

      //end ajax

    });
    //readonly
    $('#toogle-customer-read-attr').click(function() {
      var nst = $('#poscustomer').is('[readonly]') ? false : true;
      $('#poscustomer').select2('readonly', nst);
      return false;
    });
  });
</script>
<script>
  $(document).ready(function() {
    $("#category").on('change', function() {
      var catId = $(this).val();
      //ajax

      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{route('admin.subcategory.selectSubcategory')}}",
        type: "POST",
        data: {
          'catId': catId
        },
        dataType: 'json',
        success: function(data) {
          console.log(data);
          $('#subcategory').empty();
          $.each(data, function(index, subcatObj) {

            $("#subcategory").append('<option value ="' + subcatObj.id + '">' + subcatObj.name + '</option>');
          });

        },
        error: function() {
          toastr.error("Something went Wrong, Please Try again.");
        }
      });
      //endajax
    });
  });
</script>
@stop