      
      @if(!empty($customerInfo))
      <style>
        .bill-p{
          margin-bottom: 0px;
          font-size:14px;
          font-weight: 500;
        }
        .company_name{
          margin-bottom: 0px;
          font-weight: 500;
          font-size:25px;
        }
      </style>
       <div style="text-align: center;">
         <h1 class="company_name">{{$system->siteName}}</h1>
         <p class="bill-p">{{$system->siteEmail}}</p>
         <p class="bill-p"><b>{{$system->sitePhone}}</b></p>
         <p class="bill-p">Invoice Id:6751371</p>
       </div>
       <div>
         <p class="bill-p">Customer Name: {{$customerInfo->name}}</p>
         <p class="bill-p">Mobile: {{$customerInfo->mobile}}</p>
         <br>
       </div>
       <div>
         <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Item</th>
      <th scope="col">Qty</th>
      <th scope="col">Price</th>
      <th scope="col">Total</th>
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
      <td>{{$counter}}</td>
      <td>{{$product->name}}</td>
      <td>{{$product->qty}}</td>
      <td>{{number_format($product->price)}}</td>
      <td style="text-align: right;">{{number_format($product->subtotal)}}</td>
    </tr>
    @endforeach
    <tr>
      <td colspan="4"><b>Total</b></td>
      <td style="text-align: right;">{{Cart::subtotal()}}</td>
    </tr>
    <tr>
      <td colspan="4"><b>Discount</b></td>
      <td style="text-align: right;">{{Cart::discount()}}</td>
    </tr>
    <tr>
      <td colspan="4"><b>Tax</b></td>
      <td style="text-align: right;">{{Cart::tax()}}</td>
    </tr>
    <tr>
      <td colspan="4"><b>Grand Total</b></td>
      <td style="text-align: right;"><b>{{Cart::total()}}</b></td>
    </tr>
   
  </tbody>
</table>
<br>
       </div>

       <div>
         <p class="bill_p" style="font-size: 12px;">Thanks for shopping with us</p>
         <br>
       </div>
       <div style="text-align: center;">
         <p class="bill_p" style="font-size: 12px;font-weight: bold;">Pewered By www.codetreebd.com</p>
       </div>
       @else
       <p>Please select a customer</p>
       @endif