

<div class="modal-header">
	<h2 class="modal-title" id="exampleModalLabel">Product Information</h2>
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<div class="modal-body">                                          
   <div class="row p-1">
		<div class="col-2">
			<center>
				@php
					$imgUrl = str_replace('public/', '', $productInfo->image);
				@endphp
				@if(!empty($productInfo->image))
				<img src="{{ asset($imgUrl) }}" alt="{{$productInfo->name}}" class="img-rounded" style="width:100px;height:100px;">
				@else
				<img src="{{ asset('admin/defaultIcon/no_image.png') }}" alt="No-image" class="img-rounded" style="width:100px;height:100px;">
				@endif
			</center>
		</div>
		<div class="col-5 col-xs-12">
			<h3><b>Basic Information</b></h3>
			<hr class="mt-0">
			<p class="mb-0">Name: {{$productInfo->name}}</p>
			<p class="mb-0">Code: {{$productInfo->code}}</p>
			<p class="mb-0">Category: {{$productInfo->catName}}</p>
			<p class="mb-0">Brand: {{$productInfo->bName}}</p>
			<p class="mb-0">Alert Quantity: {{$productInfo->alert_qty}} {{$productInfo->uName}}</p>
			<hr>
			<p>{{$productInfo->description}}</p>
		</div>
		<div class="col-5 col-xs-12">
			<h3><b>Purchase / Sales  Information</b></h3>
			<hr class="mt-0">
			<p class="mb-0">Purchase Price: ৳{{number_format($productInfo->purchase_price)}}</p>
			<p class="mb-0">Sell Price: ৳{{number_format($productInfo->sell_price)}}</p>
			<p class="mb-0">Whole Sell Price: ৳{{number_format($productInfo->whole_sell)}}</p>
			<p class="mb-0">Start Inventory: {{number_format($productInfo->start_inventory)}} {{$productInfo->uName}}</p>
			<p class="mb-0">Total Purchase: {{number_format($totalPurchase)}} {{$productInfo->uName}}</p>
			<p class="mb-0">Total Sale: {{number_format($totalsale)}} {{$productInfo->uName}}</p>
			<p class="mb-0 badge  bg_secondary_teal">In Stock: {{number_format($inStock)}} {{$productInfo->uName}}</p>
		</div>
   </div>
</div>


