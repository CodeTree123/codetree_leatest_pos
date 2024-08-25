@extends('admin.layouts.adminmaster')
@section('adminTitle')
Barcode- Admin Dashboard
@stop
@section('adminContent')
<style>
	.barcode-p{
		text-transform: uppercase;
	}
</style>
<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0" >
		<p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="{{route('admin.productList')}}">Products / </a><a href="{{route('admin.printBarcode')}}">Print Barcode / </a><a>Barcode</a> <span class="top-date">{{date('l, jS F Y')}}</span></p>

	</div>
</div>

<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">
				


				<p class="btn mt-0 task-icon"><i class="fa fa-barcode"></i></p>
				
			</div>
			<h2 class="blue task-label">Print Barcode/Label</h2>

			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">
					

					
					<p class="task-btn text_p_primary" title="Actions">
						<i class="fa fa-th-list"></i>
					</p>
					
					
				</div>
			</div>
		</div>
		 <style>
			 @media print {
				.pbr{
					page-break-after: always;
				}
				
			}
		 </style>
		<div class="box-content">
			<div class="row">
				<div class="col-lg-12">
					<p class="introtext">Please use the table below to navigate or filter the results. You can download the table as excel and pdf.</p>
					<p class="col-12 btn btn-primary" style="border-radius:0px;cursor:pointer;" onclick="printContent('barcode')">Print</p>

					<div class="barcode-print" id="barcode">
						<div class="row mb-3 testt"> 
							@for($i=0;$i<$qty;$i++)
							<div class="barcode col-4 p-2 px-3 barcode_boxes_parent">
								<div class="p-2 barcode_boxes" style="text-align:center;  height:auto;margin:2px;">
									<h4 class="mb-0 barcode-p"><b>{{$siteName}}</b></h4>
									<h4 class="mb-0 barcode-p">{{$productName}}</h4>
									<h4 class="mb-0">{{$productPrice}}</h4>
									<img src="data:image/png;base64,{{base64_encode($barcode)}}">
									<h4 class="mb-0"><b>{{$proid}}</b></h4>

								</div>
							</div>
							@endfor
							
						</div>
					</div>
					
					
				</div>
			</div>
		</div>
	</div>

</div>
</div>

@stop

