@extends('admin.layouts.adminmaster')
@section('adminTitle')
Add New Product- Admin Dashboard
@stop
@section('adminContent')
<style>
	label{
		font-weight: bold;
	}
	input['text']{
		border-radius: 0px;
	}
	#supplierid  + .select2-container .select2-selection {
    height: 38px;
    line-height: 38px;
}

   #categoryid + .select2-container .select2-selection {
    height: 38px;
    line-height: 38px;
}

   #subcategory + .select2-container .select2-selection {
    height: 38px;
    line-height: 38px;
}

#brandid + .select2-container .select2-selection {
    height: 38px;
    line-height: 38px;
}

 
</style>
<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0" >
		<p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="{{route('admin.productList')}}">Products / </a><a class="active-slink">Product Add</a> <span class="top-date">{{date('l, jS F Y')}}</span></p>

	</div>
</div>

<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">
				


				<p class="btn mt-0 task-icon"><i class="fa fa-barcode"></i></p>
				
			</div>
			<h2 class="blue task-label">Add New Product</h2>

			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">
					

					
					<p class="task-btn text_p_primary text_p_primary" title="Actions">
						<i class="fa fa-th-list"></i>
					</button>
					<div class="task-menu p-2">
						<a class="dropdown-item pl-0" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
							<i class="fa-fw fa fa-list"></i> Product list
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
                @if(Session::has('error-message'))
                <p class="alert alert-danger">{{Session::get('error-message')}}</p>
                @endif
				<div class="offset-md-1 col-sm-12 col-md-10 col-xs-10 p-3  border">
					<form method="post" action="{{route('admin.product.productSave')}}" enctype="multipart/form-data">
						@csrf
						<div class="form-row">
							<div class="form-group col-6">
								<!-- <label for="formGroupExampleInput2">Supplier<i class="fa-fw fa fa-plus-circle"></i></label>
								<select class="custom-select" name="supplier">
									@foreach($suppliers as $supplier)
									<option value="{{$supplier->id}}">{{$supplier->company}}({{$supplier->name}})</option>
									@endforeach
								</select> -->


								<div class="form-group">
									<label for="supplierid">Supplier <i class="fa-fw fa fa-plus-circle"></i></label>
									<select class="form-control select2" name="supplier" id="supplierid" >
										<option value="" disabled selected>Select a supplier</option>
									</select>
								</div>

							</div>
							<div class="form-group col-6">
								<label>Product Name *</label>
								<input type="text" class="form-control" name="name" placeholder="Product Name">
							</div>
							<div class="form-group col-6">
							    <label>Product Code *</label>
							    <input type="text" class="form-control" name="code" readonly value="{{$productCode}}-{{$lastId}}">
						    </div>
							<div class="form-group col-6">
								<label>Bar Code </label>
							    <input type="text" class="form-control mb-2" name="bar_code" id="bar_code" placeholder="Product Barcode">
							</div>

							<div class="form-group col-6">
								<label>Starting Inventory</label>
								<input type="number" class="form-control" name="start_inventory" placeholder="Starting Inventory">
							</div>
							<div class="form-group col-6">
								<label for="formGroupExampleInput2">Product Category *</label>
								<select class="select2 form-control" name="category" id="categoryid">
                                    <option selected value="">Select Category</option>
                                </select>

							</div>
							<div class="form-group col-6">
								<label>Product Sub Category</label>

								<select class="select2 form-control" name="subcategory" id="subcategory" >
                                    <option selected value="">Select Subcategory</option>
                                </select>
							</div>
							<div class="form-group col-6">
								<label>Product Band</label>
								<!-- <select class="custom-select" name="brand">
									<option value="">Select Brand</option>
									@foreach($brands as $brand)
									<option value="{{$brand->id}}">{{$brand->name}}</option>
									@endforeach
								</select> -->
								<select class="select2 form-control" name="brand" id="brandid">
								<option value="">Select Brand</option>
								</select>
							</div>
							<div class="form-group col-6">
								<label>Product Unit</label>
								<select class="custom-select" name="unit" id="supplierid">
									@foreach($units as $unit)
									<option value="{{$unit->id}}">{{$unit->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-6">
								<label>Product Cost *</label>
								<input type="text" class="form-control" name="purchase_price" placeholder="Product Puuchase Price">
							</div>

							<div class="form-group col-6">
								<label for="formGroupExampleInput">Product Price *</label>
								<input type="text" class="form-control" name="sell_price" placeholder="Product Sell Price">
							</div>
							<div class="form-group col-6">
								<label for="formGroupExampleInput">wholesell Price </label>
								<input type="text" class="form-control" name="whole_sell" placeholder="Product whole sell Price">
							</div>
							<div class="form-group col-6">
								<label>Alert Quantity</label>
								<input type="text" class="form-control" name="alert_qty" placeholder="Alert Quantity">
							</div>

							<div class="form-group col-12">
								<label>Product Description</label>
								<textarea class="form-control" name="description" rows="3"></textarea>
							</div>
							<div class="form-group col-6">
								<label for="image">Product Image</label>
								<input type="file" class="form-control" name="image">
							</div>
							<div class="form-group col-12">
								<input type="submit" class="btn bg_p_primary col-12" value="Add Product">
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
    $('#categoryid').select2({
        
        ajax: {
            url: '/setting/category2',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    q: params.term // search term
                };
            },
            processResults: function(data) {
                return {
                    results: data // select2 expects an array of {id, text} objects
                };
            },
            cache: true
        },
        minimumInputLength: 0 // start searching after 1 character
    });

    // Initialize subcategory select2 and handle category change
    $('#subcategory').select2({
        
        ajax: {
            url: '/setting/select-sub-Category2',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    q: params.term, // search term
                    category_id: $('#categoryid').val() // Get the current category ID
                };
            },
            processResults: function(data) {
                return {
                    results: data // select2 expects an array of {id, text} objects
                };
            },
            cache: true
        },
        minimumInputLength: 0
    });

    // Handle category change
    $("#categoryid").on('change', function() {
        var categoryId = $(this).val();
        console.log(categoryId);
        
        // Clear and reinitialize subcategory select2
        $('#subcategory').val(null).trigger('change');
        
        // Trigger the opening of the dropdown to refresh the results
        $('#subcategory').select2('open');
        $('#subcategory').select2('close');
    });


	$('#supplierid').select2({
        
        ajax: {
            url: '/people/supplierList2',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    q: params.term // search term
                };
            },
            processResults: function(data) {
                return {
                    results: data // select2 expects an array of {id, text} objects
                };
            },
            cache: true
        },
        minimumInputLength: 0 // start searching after 1 character
    });

	$('#brandid').select2({
        
        ajax: {
            url: '/setting/brands2',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    q: params.term // search term
                };
            },
            processResults: function(data) {
                return {
                    results: data // select2 expects an array of {id, text} objects
                };
            },
            cache: true
        },
        minimumInputLength: 0 // start searching after 1 character
    });

});
</script>
@stop

