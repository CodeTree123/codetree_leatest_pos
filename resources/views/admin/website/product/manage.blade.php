@extends('admin.layouts.adminmaster')
@section('adminTitle')
Product
@stop
@section('adminContent')
<style>
	input[type=text]:focus {
		border-color: inherit;
		-webkit-box-shadow: none;
		box-shadow: none;
		height:28px;
		font-size: inherit;
		border-color: rgba(229, 103, 23, 0.8);
		outline-color: gray;
		font-size: 15px;
		text-transform: none;

	}
	.table td{
		padding-bottom: 0px;
		vertical-align: middle;
	}

</style>
<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0" >
		<p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="" class="active-slink">Website / </a> <a href="" class="active-slink">Product List</a> <span class="top-date">Total Products: </span></p>

	</div>
</div>
<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">
				<p class="btn mt-0 task-icon"><i class="fa fa-barcode"></i></p>
			</div>
			<h2 class="blue task-label">All Products</h2>

			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">
					

					
					<p class="task-btn text_p_primary" title="Actions">
						<i class="fa fa-th-list"></i>
					</button>
					<div class="task-menu p-2">
						<a class="dropdown-item pl-0" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
							<i class="fa-fw fa fa-plus-circle"></i> Add New Product
						</a>
                        
					</div>
					
				</div>
			</div>
		</div>
		<div class="box-content">
			<div class="row">
				<div class="col-lg-12">
					
					<div class="row">
						@if(Session::has('error-message'))
						<p class="alert alert-danger">{{Session::get('error-message')}}</p>
						@endif
						<div class="col-8">
							<p class="pt-2 mb-0">Showing </p>
						</div>
						<div class="col-4 mt-1">
							
						</div>
					</div>
					<table class="table table-bordered table-hover">
						<thead class="bg_p_primary">
							<tr>
								<th class="font-weight-bold" scope="col">id</th>
								<th class="font-weight-bold" scope="col">Image</th>
								<th class="font-weight-bold" scope="col"> Category Name</th>
								<th class="font-weight-bold" scope="col">Name</th>
								<th class="font-weight-bold" scope="col">Brand</th>
								<th class="font-weight-bold" scope="col">Condition</th>
								<th class="font-weight-bold" scope="col">Status</th>
								<th class="font-weight-bold" scope="col">Actions</th>

							</tr>
						</thead>
						<tbody id="table-data">
							
                                @foreach($webpros as $key=>$web)
                                <tr>
                                	<td>{{ $key+1 }}</td>
                                	<td> <img src="{{asset('/')}}{{$web->image}}" width="70px" height="70px"></td>
                                	
									<td>
										@foreach($webcats as $web1)
										@if($web1->id == $web->c_id)
										{{ $web1->cname }}
										@endif
										@endforeach
									</td>
									<td>{{ $web->name }}</td>
									<td>{{ $web->brand }}</td>
									<td>{{ $web->condition }}</td>
									<td>
										@if($web->status == 1)
										<span class="badge bg_secondary_teal">Active</span>
											
										@else
										<span class="badge bg_secondary_teal">Inactive</span>
										@endif
									</td>
									<td>
										<button class="btn bg_secondary_teal p-1 px-2 mb-0 v-btn"  style="font-size: 13px;cursor:pointer;" title="User Details" value="{{$web->id}}"> <i class="fa-fw fa fa-eye"></i></button>
										
										<button class="btn bg_p_primary p-1 mb-0 px-2 edit-btn" value="{{$web->id}}" style="font-size: 13px;cursor:pointer;" title="Edit User"> <i class="fa fa-edit" ></i></button>

									<div class="del-modal <?php echo 'modal'.$key?>" style="right: 80px;">
										<p><b>Record delete confirmation.</b></p>
										<p>Are you want to really delete ?</p>

										<button class="btn bg_p_primary py-1 del-close" style="background-color: #808080a6;border-color: #808080a6;">Cancel</button>
										<form method="post"  action="{{ route('admin.webpro.deleteProduct') }}" style="float:right;">
											@csrf
											<input type="hidden" name="id" value="{{$web->id}}">
											<button type="submit" class="btn bg_secondary_grey py-1">Confirm</button>
										</form>
									</div>
									<script>
										$(document).ready(function(){
											$(".<?php echo 'btn'.$key?>").click(function(){
												$(".<?php echo 'modal'.$key?>").show('fadeOut');

											});
											$(".del-close").click(function(){
												$(".del-modal").hide('fadeIn');

											});
										});
									</script>
									<p class="btn bg_secondary_grey mb-0 p-1 px-2 del-btn <?php echo 'btn'.$key?>" style="font-size: 13px;relative;cursor:pointer;" title="Delete user"> <i class="fa fa-trash"></i></p>
									</td>
                                </tr>
							@endforeach
						</tbody>
					</table>
					<br>
					
				</div>
			</div>
		</div>
	</div>

</div>
<!-- add web Products Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content p-3">
			<div class="modal-header">
				<h2 class="modal-title" id="exampleModalLabel">Add New Product</h2>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
			<div class="modal-body">

 <form action="{{ route('admin.webpro.store') }}" id="form_validation" method="POST" enctype="multipart/form-data">
					@csrf
				
					<div class="form-group">
						<label>Category Name *</label>
						<select class="custom-select" name="c_id">
							
						
							@foreach($webcats as $key=>$web1)
								<option value="{{ $web1->id }}">{{ $web1->cname }}</option>
					         @endforeach
						</select>
					</div>
					
					<div class="form-group">
						<label>Product name</label>
						<input type="text" name="name" class="form-control" >
					</div>

					<div class="form-group">
						<label>Product Brand</label>
						<input type="text" name="brand" class="form-control" >
					</div>

					<div class="form-group">
						<label>Product Condition</label>
						<input type="text" name="condition" class="form-control" >
					</div>

					<div class="form-group">
						<label>Product Price</label>
						<input type="number" name="price" class="form-control" >
					</div>

					<div class="form-group">
						<label>Product Description</label>
						<textarea class="form-control" name="description" rows="3"></textarea>
					</div>
					<div class="form-group">
						<label>Product Image</label>
						<input type="file" name="image" class="form-control" >
					</div>
					<div class="form-group">
						<label>Product Image1</label>
						<input type="file" name="image1" class="form-control" >
					</div>
					<div class="form-group">
						<label>Product Image2</label>
						<input type="file" name="image2" class="form-control" >
					</div>
					
				</div>
				<div class="form-group">
						<label>Product Status</label>
						<select class="custom-select" name="status">
							
						
							<option value="1">Available</option>
								<option value="0">Not Availabale</option>
					
						</select>
					</div>
				<div class="modal-footer">

					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Add Product">
					</div>
				</form>
			</div>
		</div>
	</div>
 </div>
</div>
<!-- Modal -->

<!-- view products info -->
<div id="viewProductModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content p-3">
			<div class="modal-header">
				<h2 class="modal-title" id="exampleModalLabel">Website Product Information</h2>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
			<div class="modal-body" id="viewInfo">

			</div>
			<div class="modal-footer">
				<!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>	 -->
			</div>
		</div>
	</div>
</div>


<!-- edit web Products Modal -->
<div id="editProductModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content p-3">
			<div class="modal-header">
				<h2 class="modal-title" id="exampleModalLabel">Update Product</h2>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
			<div class="modal-body">

 				<form action="{{ route('admin.webpro.updateProduct') }}" id="form_validation" method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')

					<input type="hidden" name="webpro_id" id="webpro_id">
					
					<!-- <p>Category Name: <span id="webpro_cat"></span></p> -->
					<div class="form-group">
						<label>Category Name *</label>
						<select class="custom-select" name="c_id" id="webpro_cat">
							@foreach($webcats as $key=>$web1)
								<option value="{{ $web1->id }}">{{ $web1->cname }}</option>
					         @endforeach
						</select>
					</div>
					
					<div class="form-group">
						<label>Product name</label>
						<input type="text" name="name" id="name"  class="form-control" >
					</div>

					<div class="form-group">
						<label>Product Brand</label>
						<input type="text" name="brand" id="brand" class="form-control" >
					</div>

					<div class="form-group">
						<label>Product Condition</label>
						<input type="text" name="condition" id="condition" class="form-control" >
					</div>

					<div class="form-group">
						<label>Product Price</label>
						<input type="number" name="price" id="price" class="form-control" >
					</div>

					<div class="form-group">
						<label>Product Description</label>
						<textarea class="form-control" name="description" id="description" rows="3"></textarea>
					</div>

					<div id="editImg" class="d-flex">

					</div>

					<div class="form-group">
						<label>Product Image</label>
						<input type="file" name="image" class="form-control" >
					</div>
					<div class="form-group">
						<label>Product Image1</label>
						<input type="file" name="image1" class="form-control" >
					</div>
					<div class="form-group">
						<label>Product Image2</label>
						<input type="file" name="image2" class="form-control" >
					</div>
					
				</div>
				<div class="form-group">
						<label>Product Status</label>
						<select class="custom-select" name="status" id="status">
							<option value="1">Available</option>
							<option value="0">Not Availabale</option>
						</select>
					</div>
				
				<div class="modal-footer">

					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Update">
					</div>
				</form>
			</div>
		</div>
	</div>
 </div>
</div>
<!-- Modal -->


<script>
	$(document).ready(function(){
		$(document).on('click','.v-btn',function(){
			var id = $(this).val();
            console.log(id);
			$("#viewProductModal").modal('show');
			$.ajax({
                    type:"GET",
                    url: "product-view/"+id,
                    success: function(response){
                        console.log(response.webpro);
						$("#viewInfo").html(" ");
						$("#viewInfo").append(
							'<p>Category Name: '+response.webpro.cname+'</p>\
							<p>Product Name: '+response.webpro.name+'</p>\
							<p>Brand: '+response.webpro.brand+'</p>\
							<p>Condition: '+response.webpro.condition+'</p>\
							<p>Price: '+response.webpro.price+'</p>\
							<p>Status: '+response.webpro.status+'</p>\
							<p>Description: '+response.webpro.description+'</p>\
							<div class="d-flex">\
							<p class="p-2">Image 1: <img src="{{asset('/')}}'+response.webpro.image+'" style="width:90px;height:90px;"></p>\
							<p class="p-2">Image 2: <img src="{{asset('/')}}'+response.webpro.image1+'" style="width:90px;height:90px;"></p>\
							<p class="p-2">Image 3: <img src="{{asset('/')}}'+response.webpro.image2+'" style="width:90px;height:90px;"></p>\
							</div>\
							'
						);
                        
                    }
                });
			
		});
		$(document).on('click','.edit-btn',function(){
			var id = $(this).val();
            console.log(id);
			$("#editProductModal").modal('show');
			$.ajax({
                    type:"GET",
                    url: "product-edit/"+id,
                    success: function(response){
						// var a = response.user[0];
						// var b = response.user[1];

						console.log(response.webpro_info);
						$("#webpro_id").val(id);
						$("#webpro_cat").val(response.webpro_info.c_id);
						$("#name").val(response.webpro_info.name);
						$("#brand").val(response.webpro_info.brand);
						$("#condition").val(response.webpro_info.condition);
						$("#price").val(response.webpro_info.price);
						$("#description").val(response.webpro_info.description);
						$("#status").val(response.webpro_info.status);

						$("#editImg").html(" ");
						$("#editImg").append(
							'<p class="d-flex">Product Image: <img src="{{asset('/')}}'+response.webpro_info.image+'" style="width:90px;height:90px;"></p>\
							<p class="d-flex">Product Image 1: <img src="{{asset('/')}}'+response.webpro_info.image1+'" style="width:90px;height:90px;"></p>\
							<p class="d-flex">Product Image 2: <img src="{{asset('/')}}'+response.webpro_info.image2+'" style="width:90px;height:90px;"></p>\
							'
						);

                    }
                });
		});

	});
</script>
@stop