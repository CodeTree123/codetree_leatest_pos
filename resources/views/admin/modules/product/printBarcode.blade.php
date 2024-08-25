@extends('admin.layouts.adminmaster')
@section('adminTitle')
Print barcode- Admin Dashboard
@stop
@section('adminContent')
<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0" >
		<p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="{{route('admin.productList')}}">Products / </a><a class="active-slink">Print Barcode</a> <span class="top-date">{{date('l, jS F Y')}}</span></p>

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
					

					
					<p class="task-btn text_p_primary text_p_primary" title="Actions">
						<i class="fa fa-th-list"></i>
					</p>
					<div class="task-menu p-2">
						<a class="dropdown-item pl-0" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
							<i class="fa-fw fa fa-plus-circle"></i> Print Barcode
						</a>

					</div>
					
				</div>
			</div>
		</div>
		<div class="box-content">
			<div class="row">
				<div class="col-lg-12">
					<p class="introtext">Please fill in the information below. The field labels marked with * are required input fields.</p>


					<form method="post" action="{{route('admin.product.generateBarcode')}}">
						@csrf
						<div class="form-row">

							<div class="form-group col-md-6">
								<label>Select Product *</label>
								<select class="custom-select" name="proid">
									@foreach($products as $product)
									<option value="{{$product->id}}">{{$product->name}}</option>
									@endforeach
								</select>
							</div>

							<div class="form-group col-md-6">
								<label>Enter Barcode Quantity *</label>
								<input type="text" class="form-control" name="qty" placeholder="Enter Quantity">
							</div>
                           <div class="form-group col-md-12">
                              <div class="form-check form-check-inline">
							  <input class="form-check-input" type="checkbox" name="siteName" value="siteName" id="site_name">
							  <label class="form-check-label" for="site_name">Site Name</label>
							</div>
							<div class="form-check form-check-inline">
							  <input class="form-check-input" type="checkbox" name="productname" value="productName" id="product_name">
							  <label class="form-check-label" for="product_name">Product Name</label>
							</div>
							<div class="form-check form-check-inline">
							  <input class="form-check-input" type="checkbox" name="sellPrice" value="sellPrice" id="sell_price">
							  <label class="form-check-label" for="sell_price">Sell Price</label>
							</div>
							<div class="form-check form-check-inline">
							  <input class="form-check-input" type="checkbox" name="label" value="label" id="product_label">
							  <label class="form-check-label" for="product_label">Label</label>
							</div>
						  </div>

							<div class="form-group col-12">
								<input type="submit" class="btn bg_p_primary" value="Generate" style="border-radius:0px;">
							</div>
						</div>
					</form>
					
					
				</div>
			</div>
		</div>
	</div>

</div>
</div>

@stop

