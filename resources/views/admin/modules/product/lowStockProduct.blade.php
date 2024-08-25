@extends('admin.layouts.adminmaster')
@section('adminTitle')
Low Stock Products- Admin Dashboard
@stop
@section('adminContent')
@php
	use App\Http\Controllers\admin\StockController;
@endphp

<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0" >
		<p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="{{route('admin.productList')}}">Products /</a> <a href="" class="active-slink">Low Stock Products</a><span class="top-date">{{date('l, jS F Y')}}</span></p>
	</div>
</div>
<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">
				<p class="btn mt-0 task-icon"><i class="fa fa-barcode"></i></p>
			</div>
			<h2 class="blue task-label">Low Stock Products</h2>
			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">
					<p class="task-btn text_p_primary" title="Actions">
						<i class="fa fa-th-list"></i>
					</button>
				</div>
			</div>
		</div>
		<div class="box-content">
			<div class="row">
				<div class="col-lg-12">
					<p class="introtext mb-0">Please use the table below to navigate or filter the results. You can download the table as excel and pdf.</p>
					<table class="table table-bordered table-hover">
						<thead class="bg_p_primary">
							<tr>
								<th class="font-weight-bold" scope="col">#</th>
								<th class="font-weight-bold" scope="col">Image</th>
								<th class="font-weight-bold" scope="col">Name</th>
								<th class="font-weight-bold" scope="col">Code</th>
								<th class="font-weight-bold" scope="col">Brand</th>
								<th class="font-weight-bold" scope="col">Supplier</th>
								<th class="font-weight-bold" scope="col">Cost</th>
								<th class="font-weight-bold" scope="col">Price</th>
								<th class="font-weight-bold" scope="col">Unit</th>
								<th class="font-weight-bold" scope="col">Alert Quantity</th>
								<th class="font-weight-bold" scope="col">Stock</th>
								<th class="font-weight-bold" scope="col">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php $counter=0;?>
							@foreach($products as $product)
							<?php 
							$stock=StockController::stock($product->id);
							?>
							@if($stock<$product->alert_qty)
							<?php $counter++;?>
							<tr>
								<td>{{$counter}}</td>
								<td>
									@if(!empty($product->image))
									<img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="img-rounded" style="width:35px;height:35px;">
									@else
									<img src="{{ asset('admin/defaultIcon/no_image.png') }}" alt="No-image" class="img-rounded" style="width:35px;height:35px;">
									@endif
								</td>
								<td>{{$product->name}}</td>
								<td>{{$product->code}}</td>
								<td>{{$product->brandInfo['name']}}</td>
								<td title="Company-{{$product->supplierInfo['company']}}, Mobile- {{$product->supplierInfo['mobile']}}">{{$product->supplierInfo['name']}}</td>
								<td style="text-align: right;">{{number_format($product->purchase_price)}}</td>
								<td style="text-align: right;">{{number_format($product->sell_price)}}</td>
								<td>{{$product->unitInfo['name']}}</td>
								
								<td style="text-align: right;">{{$product->alert_qty}}</td>
								<td style="text-align: right;">
									@if($stock<$product->alert_qty && $stock >0)
									<p class="badge badge-warning">{{$stock}}</p>
									@elseif($stock <=0)
									<p class="badge badge-danger">{{$stock}}</p>
									@else
									<p class="badge  bg_secondary_teal">{{$stock}}</p>
									@endif
								</td>
								<td style="width:120px;">
									<div class="dropdown" style="width:90px;float:right;">
										<a href="{{route('admin.stock.lowStock.addStock',$product->id)}}" class="action-btn px-1">
											Add Stock
										</a>
									</div>
								</td>
							</tr>
							@endif
							@endforeach
						</tbody>
					</table>
					<br>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

