<div class="modal-header">
	<h2 class="modal-title" id="exampleModalLabel">Update Product Information</h2>
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

<div class="modal-body">
	@php
		$imgUrl = str_replace('public/', '', $product->image) 
	@endphp
	@if(!empty($product->image))
	<img src="{{ asset($imgUrl) }}" alt="{{$product->name}}" class="img-rounded" style="width:100px;height:100px;">
	@else
	<img src="{{ asset('admin/defaultIcon/no_image.png')}}" alt="No-image" class="img-rounded" style="width:100px;height:100px;">
	@endif

	<form method="post" action="{{route('admin.product.updateProduct')}}" enctype="multipart/form-data">
		@csrf
		<div class="form-row">
			<div class="form-group col-md-12">
				<label>Change Image</label>
				<input type="file" class="form-control-file" name="image">
				<input type="hidden" name="id" value="{{ $product->id }}">
			</div>
			<div class="form-group col-md-6">
				<label>Name</label>
				<input type="text" class="form-control" name="name" value="{{ $product->name }}">
			</div>
			<div class="form-group col-md-6">
				<label>Alert Quantity</label>
				<input type="text" class="form-control" name="alert_qty" value="{{ $product->alert_qty }}">
			</div>
			<div class="form-group col-md-4">
				<label>Product cost</label>
				<input type="number" class="form-control" name="purchase_price" value="{{ $product->purchase_price }}">
			</div>
			<div class="form-group col-md-4">
				<label>Sell Price</label>
				<input type="number" class="form-control" name="sell_price" value="{{ $product->sell_price }}">
			</div>
			<div class="form-group col-md-4">
				<label>Wholesell Price</label>
				<input type="number" class="form-control" name="whole_sell" value="{{ $product->whole_sell }}">
			</div>
			<div class="form-group col-md-6">
				<label>Unit</label>
				<select class="form-control" name="unit">
					<option value="{{ $product->unit }}">Change unit</option>
					@foreach($units as $unit)
					<option value="{{ $unit->id }}">{{ $unit->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group col-md-6">
				<label>Starting Inventory</label>
				<input type="number" class="form-control" name="start_inventory" value="{{ $product->start_inventory }}">
			</div>
			<div class="form-group col-md-12">
				<label>Description</label>
				<textarea class="form-control" name="description" rows="3">{{ $product->description }}</textarea>
			</div>
		</div>
		<div class="form-row">
			<input type="submit" class="btn btn-primary" style="float:right;" value="Update Product">
		</div>
	</form>
</div>


