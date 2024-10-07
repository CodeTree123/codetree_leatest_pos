<div class="modal-header">
  <h2 class="modal-title" id="exampleModalLabel">Purchase Details</h2>
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<div class="modal-body">

  <div class="row p-0 m-0 mt-2">
    <div class="col-6 pl-0">
      <p class="bill-p">Code: {{$billInfo->code}}</p>

    </div>
    <div class="col-6 pr-0" style="text-align: right;">
      <p class="bill-p">Date: {{$billInfo->purchase_date}}</p>
    </div>

  </div>
  <div>

    <p class="bill-p">Supplier Name: {{$billInfo->name}}</p>
    <p class="bill-p">Supplier Mobile: {{$billInfo->mobile}}</p>
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
      $counter = 0;
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
        <td colspan="4">Discount</td>
        <td style="text-align: right;">{{number_format($billInfo->discount)}}</td>
      </tr>
      <tr>
        <td colspan="4">Paid</td>
        <td style="text-align: right;">{{number_format($billInfo->paid_amount)}}</td>
      </tr>
      <tr>
        <td colspan="4">Due</td>
        <td style="text-align: right;">{{number_format($billInfo->due)}}</td>
      </tr>

    </tbody>
  </table>


</div>