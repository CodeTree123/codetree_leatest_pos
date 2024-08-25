@extends('admin.layouts.adminmaster')
@section('adminTitle')
{{$billInfo->code}}
@stop
@section('adminContent')
<style>
	label{
		font-weight: bold;
	}
	.select2-selection__rendered{
		height: 40px;
		margin-top: -2px;
		border: 1px solid #80808052;
		padding-top: 8px;
	}
	.table th,td{
		padding:10px;
		font-size: 18px;
	}
	input[type=text]{
		border-radius: 0px;
	}
</style>
<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0" >
		<p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="{{route('admin.salesList')}}">Sales /</a><a href="{{route('admin.purchaseAdd')}}" class="active-slink">Invoice Details</a> <span class="top-date">{{date('l, jS F Y')}}</span></p>

	</div>
</div>

<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">
				


				<p class="btn mt-0 task-icon"><i class="fa fa-barcode"></i></p>
				
			</div>
			<h2 class="blue task-label">Invoice Details</h2>

			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">
					<p class="task-btn text_p_primary" title="Print Invoice" onclick="printContent('invoice_print')">
						<i class="fa fa-print"></i>
					</p>
					
					
				</div>
			</div>
		</div>
		<div class="box-content">
			<div class="row">
				<div class="col-lg-12">
					
				</div>

				
				<div class="offset-md-3 col-sm-6 col-md-6 col-xs-12 p-3 border" id="invoice_print">
		<style>
        .bill-p{
          margin-bottom: 0px;
          font-size:18px;
          font-weight: 500;
        }
        .company_name{
          margin-bottom: 0px;
          font-weight: 600;
          font-size:26px;
        }
        .table td{
        	padding:5px;
        }
      </style>
      
        <div class="row p-0 m-0 mt-2">
        <div class="col-6 pl-0">
          <h1 class="company_name">{{$system->siteName}}</h1>
        
        </div>
        <div class="col-6 pr-0" style="text-align: right;">
          <p class="bill-p">Invoice# {{$billInfo->code}}</p>
          <p class="bill-p">Date# {{$billInfo->sales_date}}</p>
          <p class="bill-p">Payment# {{$billInfo->payment_type}}</p>
          <p class="bill-p">Due#{{number_format($billInfo->due)}}</p>
        </div>
         
       </div>
       <div class="row p-0 m-0 mt-2">
        <div class="col-6 pl-0">
          <p class="bill-p"><b>BILL TO</b></p>
         <p class="bill-p">{{$billInfo->name}}</p>
         <p class="bill-p">{{$billInfo->address}}</p>
         <p class="bill-p">{{$billInfo->mobile}}</p>
         <br>
        
        </div>
        <div class="col-6 pr-0">
          <p class="bill-p"><b>NOTE</b></p>
          <p class="bill-p">{{$billInfo->payment_note}}</p>
        </div>
         
       </div>
       
       <div>
         <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Item</th>
      <th scope="col">Qty</th>
      <th scope="col">Price</th>
      <th scope="col"style="text-align: right;">Total</th>
    </tr>
  </thead>
  <tbody>
     <?php
        $counter=0;
        $subtotal=0;
        ?>
        @foreach($billProduct as $product)
        <?php
        $counter++;
       $subtotal+=$product->subtotal;
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
      <td colspan="4" style="text-align: right;">Total</td>
      <td style="text-align: right;">{{number_format($subtotal)}}</td>
    </tr>
    <tr>
      <td colspan="4" style="text-align: right;">Discount </td>
      <td style="text-align: right;">{{number_format($billInfo->discount)}}</td>
    </tr>
    <tr>
      <td colspan="4" style="text-align: right;">VAT</td>
      <td style="text-align: right;">{{number_format($billInfo->tax)}}</td>
    </tr>
    <tr>
      <td colspan="4" style="text-align: right;">Grand Total</td>
      <td style="text-align: right;">{{number_format($billInfo->grand_total)}}</td>
    </tr>
     <tr>
      <td colspan="4" style="text-align: right;">Paid</td>
      <td style="text-align: right;">{{number_format($billInfo->paid_amount)}}</td>
    </tr>
     <tr>
      @if($billInfo->due < 0)
      <td colspan="4" style="text-align: right;">Change</td>
      @php 
      $b = $billInfo->due;
      $b = -1 * $b;
      @endphp
      <td style="text-align: right;">{{number_format($b)}}</td>
      @else
      <td colspan="4" style="text-align: right;">Due</td>
      <td style="text-align: right;">{{number_format($billInfo->due)}}</td>
      @endif
      
    </tr>
   
  </tbody>
</table>
<br>
       </div>

      <div class="row">
        <div class="col-12">
          <center>
          <p><b>THANK YOU</b></p>
        </center>
        </div>
        <div class="col-6" style="border-right:1px solid gray;text-align: right;">
          <p class="bill-p">{{$system->siteName}}</p>
          <p class="bill-p">{{$system->address}}</p>
          <p class="bill-p">{{$system->mobile}}</p>
          <p class="bill-p">{{$system->sitePhone}}</p>
        </div>
         <div class="col-6" style="text-align: left;">
          <p class="bill_p" style="font-size: 16px;font-weight: bold;margin-bottom:1px;">{{$system->siteEmail}}</p>
          <p class="bill_p" style="font-size: 16px;font-weight: bold;">www.formula1waxbd.com</p>
        </div>
      </div>
       <div style="text-align: center;">
         <p class="bill_p" style="font-size: 16px;font-weight: bold;">Pewered By www.codetreebd.com</p>
       </div>
				</div>

			</div>

			
		</div>
	</div>
</div>

</div>


@stop

