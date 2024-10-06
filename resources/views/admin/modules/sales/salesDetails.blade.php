
      <div class="modal-header">



        <h2 class="modal-title" id="exampleModalLabel">Sale Details</h2>
        <div class="row">
        <p class="task-btn text_p_primary ml-2" title="Print Report" onclick="printContent('saleDetailsModal')">
        <i class="fa fa-print"></i> <!-- Print Icon -->
        </p>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>

      </div>
<div class="modal-body" id="saleDetailsModal">
     
       <div class="row p-0 m-0 mt-2">
        <div class="col-6 pl-0">
          <p class="bill-p mb-0">Invoice: {{$billInfo->code}}</p>
        
        </div>
        <div class="col-6 pr-0" style="text-align: right;">
          <p class="bill-p mb-0">Date: {{$billInfo->sales_date}}</p>
        </div>
         
       </div>
       <div>
        
         <p class="bill-p mb-0">Customer Name: {{$billInfo->name}}</p>
         <p class="bill-p mb-0">Customer Mobile: {{$billInfo->mobile}}</p>
         <p class="bill-p">Biller: {{$billerName}}</p>
         <br>
       </div>
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
        $counter=0;
        ?>
        @foreach($billProduct as $product)
        <?php
        $counter++;
       
        ?>
    <tr>
      <td>{{$counter}}</td>
      <td>{{$product->name}}</td>
      <td>{{$product->qty}}</td>
      <td>{{$product->unit_price}}</td>
      <td style="text-align: right;">{{number_format($product->subtotal)}}</td>
    </tr>
    @endforeach
    <tr>
      <td colspan="4">Total</td>
      <td style="text-align: right;">{{number_format($billInfo->grand_total-$billInfo->tax)}}</td>
    </tr>
    <tr>
      <td colspan="4">Tax</td>
      <td style="text-align: right;">{{number_format($billInfo->tax)}}</td>
    </tr>
    <tr>
      <td colspan="4">Grand Total</td>
      <td style="text-align: right;">{{number_format($billInfo->grand_total)}}</td>
    </tr>
    
     <tr>
      <td colspan="4">Paid</td>
      <td style="text-align: right;">{{number_format($billInfo->paid_amount)}}</td>
    </tr>
     <tr>
     @if($billInfo->due < 0)
      <td colspan="4">Change</td>
      @php 
      $b = $billInfo->due;
      $b = -1 * $b;
      @endphp
      <td style="text-align: right;">{{number_format($b)}}</td>
      @else
      <td colspan="4">Due</td>
      <td style="text-align: right;">{{number_format($billInfo->due)}}</td>
      @endif
      <!-- <td colspan="4">Due</td>
      <td style="text-align: right;">{{number_format($billInfo->due)}}</td> -->
    </tr>
   
  </tbody>
</table>
       
    </div>