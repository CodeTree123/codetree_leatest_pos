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
        $total_price=0;
        $total_product=0;
        $counter=0;
        ?>
        @foreach(Cart::content() as $product)
        <?php
        $counter++;
        $total_price+=$product->subtotal;
        $total_product+=$product->qty;
        ?>
        <tr>
         <td width="40%" class="">{{$product->name}} <i class="fa fa-edit update-product-l " data-proid="{{$product->id}}"
          data-row="{{$product->rowId}}" style="cursor:pointer;color:#007bff;"></i></td>
          <td width="15%" style="text-align: right;">{{number_format($product->price)}}</td>
          <td width="15%"><input type="text" value="{{$product->qty}}" style="width: 100%;" class="qty_update_input" data-qty="{{$product->rowId}}"></td>
          <td width="20%" style="text-align: right;">{{number_format($product->subtotal)}}</td>
          <td style="width: 5%; text-align: center;"><a href="#" title="Remove {{$product->name}}" data-cartrowrd="{{$product->rowId}}" class="removeItemBtn"><i class="fa fa-times-circle" ></i></a></td>
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
    <td style="padding: 5px 10px;">
                <div>Discount 
                    <a href="#" id="ppdiscount2">
                        <i class="fa fa-edit" data-toggle="modal" data-target=".discount_modal2"></i>
                    </a>
                </div>
                <div>Use Promocode 
                    <a href="#" id="ppdiscount">
                        <i class="fa fa-edit" data-toggle="modal" data-target=".discount_modal"></i>
                    </a>
                </div>
    </td>
    <td class="text-right" style="padding: 5px 10px;font-weight:bold;"><span id="tds">
      @if(Session::has('saleDiscount'))
      {{number_format(Session::get('saleDiscount'))}}
      @else
      {{Cart::discount()}}
      @endif

    </span>
  </td>
</tr>
<tr>
 <td style="padding: 5px 10px; border-top: 1px solid #666;border-bottom: 1px solid #333; font-weight:bold; background:#333; color:#FFF;" colspan="2">Total Payable<a href="#" id="pshipping"></a>

 </td>
 <td class="text-right" style="padding:5px 10px 5px 10px; font-size: 14px;border-top: 1px solid #666; border-bottom: 1px solid #333; font-weight:bold; background:#333; color:#FFF;"  colspan="2">
  <span id="gtotal">
    <?php
    $total=(double) str_replace(',', '', Cart::total());
    $discount=Session::get('saleDiscount');
    $gtotal=$total-$discount;
    ?>
    @if(Session::has('saleDiscount'))
    {{number_format($gtotal,2)}}
    @else
    {{Cart::total()}}
    @endif
  </span>
</td>
</tr>
</table>

<div class="clearfix"></div>

<div id="botbuttons" class="col-xs-12 col-md-12 text-center">
  <div class="row">

    <div class="col-xs-4 col-md-4" style="padding: 0;">
      <div class="btn-group-vertical btn-block">
        <a href="{{route('admin.pos.removeAllItem')}}" class="btn btn-danger btn-block btn-flat" style=";border-radius: 0px;"> Cancel</a>
      </div>
    </div>
    <div class="col-xs-4 col-md-4" style="padding: 0;">
      <div class="btn-group-vertical btn-block">
        <p class="btn btn-info btn-block btn-flat payment-btn" style=";border-radius: 0px;cursor:pointer" >Payment</p>
      </div>
    </div>
    <div class="col-xs-4 col-md-4" style="padding: 0;">
      <div class="btn-group-vertical btn-block">
        <button type="button" class="btn  bg_secondary_teal btn-block btn-flat"id="reset" style=";border-radius: 0px;">Bill</button>
      </div>
    </div>


  </div>
</div>


</div>
<script>
  $(document).ready(function(){
//remove item from cart list
$(".removeItemBtn").click(function(){
 var rowId=$(this).data('cartrowrd');
 //ajax
 $.ajax({
   headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  url:"{{route('admin.pos.removeItem')}}",
  type:"POST",
  data:{'rowId':rowId},
        //dataType:'json',
        success:function(data){

         $("#print").html(data);
       },
       error:function(){
         toastr.error("Something went Wrong, Please Try again.");
       }
     });

  //end ajax

});
//payment screen
$(".payment-btn").click(function(){
  var customer_id=$("#poscustomer").val();
  $(".payment-screen").html(''); 
  //ajax
  $.ajax({
   headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  url:"{{route('admin.pos.paymentScreen')}}",
  type:"POST",
  data:{'customer_id':customer_id},
              //dataType:'json',
              success:function(data){
               $(".payment-screen").html(data); 
               $('.payment_modal').modal('show');


             },
             error:function(){
              toastr.error("Something went Wrong, Please Try again.");
            }
          });

        //end ajax
      });


//quantiry update of cart items
$(".qty_update_input").on('change',function(){
 var rowId=$(this).data('qty');
 var qty=$(this).val();
 if($.isNumeric(qty)){
//ajax
if(qty!=0){
 $.ajax({
   headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  url:"{{route('admin.pos.updateQty')}}",
  type:"POST",
  data:{'rowId':rowId,'qty':qty},
        //dataType:'json',
        success:function(data){
          console.log(data);
          $("#print").html(data);
        },
        error:function(){
          toastr.error("Something went Wrong, Please Try again.");
        }
      });
}
  //end ajax
}else{
  toastr.error("Please Enter Correct Number.");
  
}


});
//update product information
$(".update-product-l").click(function(){
  var rowId=$(this).data('row');
  var proId=$(this).data('proid');
  $.ajax({
   headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  url:"{{route('admin.pos.getProductInfo')}}",
  type:"POST",
  data:{'rowId':rowId,'proId':proId},
        //dataType:'json',
        success:function(data){
         $('.product_info').modal('show'); 
         $("#product_info").html(data);

       },
       error:function(){
         toastr.error("Something went Wrong, Please Try again.");
       }
     });
});
});
</script>