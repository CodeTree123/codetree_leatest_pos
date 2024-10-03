@extends('admin.layouts.adminmaster')
@section('adminTitle')
Add Purchase- Admin Dashboard
@stop
@section('adminContent')
<style>
	label {
		font-weight: bold;
	}

	.select2-selection__rendered {
		height: 40px;
		margin-top: -2px;
		border: 1px solid #80808052;
		padding-top: 8px;
	}
</style>
<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0">
		<p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="{{route('admin.purchaseList')}}">Purchases /</a><a href="{{route('admin.purchaseAdd')}}" class="active-slink">Add Purchase</a> <span class="top-date">{{date('l, jS F Y')}}</span></p>

	</div>
</div>

<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">
				<p class="btn mt-0 task-icon"><i class="fa fa-barcode"></i></p>
			</div>
			<h2 class="blue task-label">Add Purchase</h2>
			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">
					<p class="task-btn text_p_primary text_p_primary" title="Actions">
						<i class="fa fa-th-list"></i>
					</p>
					<div class="task-menu p-2">
						<a class="dropdown-item pl-0" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
							<i class="fa-fw fa fa-list"></i> Purchase list
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="box-content">
			<div class="row">
				<div class="col-lg-12">
					<p class="introtext">Please fill in the information below. The field labels marked with * are required input fields.</p>
				</div>
				<div class="col-sm-12 col-md-12 col-xs-12">
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="inputPassword4">Products</label>
							<div class="input-group">
								<!-- productAdd Button -->
								<div class="input-group-prepend">
									<div class="input-group-text p-0" style="margin-top:-3px;">
										<p class="btn bg_p_primary mb-0 py-1 proAddBtn" style="border-radius:0px;font-size:20px;cursor:pointer;">+</p>
									</div>
								</div>
								<!-- product select using id="pro_id" -->
								<select class="custom-select" id="pro_id">
									<option selected value="">Select Product</option>
								</select>
							</div>
						</div>
					</div>

					<table class="table table-bordered table-hover table-striped" id="records_table">
						<thead class="bg_p_primary">
							<tr>
								<th class="font-weight-bold" scope="col">#</th>
								<th class="font-weight-bold" scope="col">Product(Code-Name)</th>
								<th class="font-weight-bold" scope="col">Unit Cost</th>
								<th class="font-weight-bold" scope="col">Quantity</th>

								<th class="font-weight-bold" scope="col">Subtotal</th>
								<th class="font-weight-bold" scope="col">Actions</th>

							</tr>
						</thead>
						<tbody>
							<?php
							$total_price = 0;
							$total_product = 0;
							$counter = 0;
							?>
							@foreach(Cart::content() as $product)
							<?php
							$counter++;
							$total_price += $product->subtotal;
							$total_product += $product->qty;
							?>
							<tr>
								<td>{{$counter}}</td>
								<td>{{$product->name}}</td>
								<td>{{number_format($product->price)}}</td>
								<td>
									<input type="text" style="width:40px;" value="{{$product->qty}}" class="pro_qty" data-qty="{{$product->rowId}}">

								</td>

								<td>{{number_format($product->subtotal)}}</td>
								<td>
									<a href="{{route('admin.purchase.removeItem',$product->rowId)}}"><i class="fa fa-times-circle" title="Remove Item"></i></a>
								</td>
							</tr>

							@endforeach
							@if(!Cart::content()->isEmpty())
							<tr style="font-weight:bold;">
								<td colspan="3">TOTAL</td>
								<td>{{$total_product}}</td>
								<td>
									{{number_format($total_price)}}
								</td>
								<td><a href="{{route('admin.purchase.removeAllItem')}}" class="btn btn-danger py-0" style="color:white;border-radius:0px; " title="All product remove from list">All Clear</a></td>


							</tr>

							@endif
						</tbody>
					</table>
					<hr>
					<form method="post" action="{{route('admin.purchase.purchaseSave')}}" enctype="multipart/form-data">
						@csrf
						<div class="form-row pt-2 pb-2 mb-3" style="background:#8080803b;">
							<div class="form-group col-md-4">
								<label>Paying By</label>
								<select name="paidBy" class="form-control">
									<option value="cash">Cash</option>
								</select>
							</div>
							<div class="form-group col-md-4">
								<label>Payment</label>
								<input type="number" class="form-control" name="paid_amount" placeholder="Paid Amount">
								<input type="hidden" name="grand_total" value="{{$total_price}}">
							</div>
							<div class="form-group col-md-4">
								<label>Discount</label>
								<input type="number" class="form-control" name="discount" placeholder="discount">
							</div>
						</div>
						<hr>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label>Date *</label>
								<input type="date" class="form-control" name="purchase_date" placeholder="Date">
							</div>
							<div class="form-group col-md-4">
								<label>Reference</label>
								<input type="Text" class="form-control" name="reference" placeholder="Reference">
							</div>
							<div class="form-group col-md-4">
								<label>Store</label>
								<select class="custom-select" name="store_id">
									@foreach($stores as $store)
									<option value="{{$store->id}}">{{$store->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-md-12">
								<label>Supplier *</label>
								<select class="custom-select" name="supplier_id" id="supplier_id">
									<option selected value="">Select Supplier</option>
									{{-- @foreach($suppliers as $supplier)
								<option value="{{$supplier->id}}">{{$supplier->company}}({{$supplier->name}})</option>
									@endforeach --}}
								</select>
							</div>
							<div class="form-group col-md-6">
								<label>Product Received ?</label>
								<select class="custom-select" name="is_received">
									<option value="1">Received</option>
									<option value="0">Not Received</option>
									<option value="2">Partially Received</option>
								</select>
							</div>                                         
							<div class="form-group col-md-6">
								<label>Document</label>
								<input type="file" class="form-control-file" name="documents">
							</div>
							<div class="form-group col-md-12">
								<label>Note</label>
								<textarea class="form-control" name="note" rows="3"></textarea>
							</div>
							<div class="form-group col-12">
								<button type="submit" class="btn bg_p_primary btn-block">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
<script>
	$(document).ready(function() {
		//add product to purchase list 
		$(".proAddBtn").click(function() {
			var pro_id = $("#pro_id").val();

			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "{{route('admin.purchase.productAddToPurchase')}}",
				type: "POST",
				data: {
					'pro_id': pro_id
				},
				success: function(data) {
					console.log(data);
					if (data == 1) {
						location.reload(true);
					} else {
						alert('Something Went wrong Please Try Again.');
					}
				},
				error: function() {
					alert("Select a product first!");
				}
			});
		});
		//select 2
		$('#pro_id').select2({
			theme: "bootstrap",
			ajax: {
				url: "{{ route('admin.purchase.searchProduct') }}",
				dataType: 'json',
				delay: 250,
				processResults: function(data) {
					return {
						results: $.map(data, function(item) {
							return {
								text: item.name,
								id: item.id
							}
						})
					};
				},
				cache: true
			}
		});

		$('#supplier_id').select2({
			theme: "bootstrap",
			ajax: {
				url: "{{ route('admin.purchase.searchSupplier') }}",
				dataType: 'json',
				delay: 250,
				processResults: function(data) {
					return {
						results: $.map(data, function(item) {
							return {
								text: item.company,
								id: item.id
							}
						})
					};
				},
				cache: true
			}
		});

		//update product qty
		$(".pro_qty").on('change', function() {
			var rowId = $(this).data('qty');
			var qty = $(this).val();

			if ($.isNumeric(qty)) {
				if (qty != 0) {
					$.ajax({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						url: "{{ route('admin.purchase.updateQty') }}",
						type: "POST",
						data: {
							'rowId': rowId,
							'qty': qty
						},
						success: function(data) {
							location.reload(true);
						},
						error: function() {
							alert("Something Went wrong.Please try again.");
						}
					});
				}
			} else {
				alert('Please Enter Correct Number.');
			}
		});
	});
</script>
@stop