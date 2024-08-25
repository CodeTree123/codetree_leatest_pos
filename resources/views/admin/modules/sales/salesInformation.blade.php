@extends('admin.layouts.adminmaster')
@section('adminTitle')
Dashboard
@stop
@section('adminContent')
<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0" >
    <p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="{{route('admin.salesList')}}" >Sales / </a><a class="active-slink">Sales Details</a> <span class="top-date">{{date('l, jS F Y')}}</span></p>

  </div>
</div>

<div class="container-fluid p-3">
	                                                                               
   <div class="row p-3">
    <div class="offset-md-3 col-sm-5 p-5 border">
             <style>
       p{
        margin-bottom:0px;
       }
     </style>
       <div class="row p-0 m-0 mt-2">
        <div class="col-6 pl-0">
          <p class="bill-p">Invoice: {{$billInfo->code}}</p>
        
        </div>
        <div class="col-6 pr-0" style="text-align: right;">
          <p class="bill-p">Date: {{$billInfo->sales_date}}</p>
        </div>
         
       </div>
       <div>
        
         <p class="bill-p">Customer Name: {{$billInfo->name}}</p>
         <p class="bill-p">Customer Mobile: {{$billInfo->mobile}}</p>
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
      <td colspan="4">Due</td>
      <td style="text-align: right;">{{number_format($billInfo->due)}}</td>
    </tr>
   
  </tbody>
</table>
       </div>
   	
   </div>
</div>

@stop

