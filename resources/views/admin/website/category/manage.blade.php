@extends('admin.layouts.adminmaster')
@section('adminTitle')
Category
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
		<p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="" class="active-slink">Website / </a> <a href="" class="active-slink">Category List</a> <span class="top-date">Total Categories: </span></p>

	</div>
</div>
<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">
				<p class="btn mt-0 task-icon"><i class="fa fa-barcode"></i></p>
			</div>
			<h2 class="blue task-label">All Categories</h2>

			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">
					

					
					<p class="task-btn text_p_primary" title="Actions">
						<i class="fa fa-th-list"></i>
					</button>
					<div class="task-menu p-2">
						<a class="dropdown-item pl-0" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
							<i class="fa-fw fa fa-plus-circle"></i> Add New Category
						</a>
                        
					</div>
					
				</div>
			</div>
		</div>
		<div class="box-content">
			<div class="row">
				<div class="col-lg-12">
					<p class="introtext mb-0">Please use the table below to navigate or filter the results. You can download the table as excel and pdf.</p>
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
								<th class="font-weight-bold" scope="col">Name</th>
								<th class="font-weight-bold" scope="col">Description</th>
								
								<th class="font-weight-bold" scope="col">Status</th>
								
								<th class="font-weight-bold" scope="col">Actions</th>

							</tr>
						</thead>
						<tbody id="table-data">
							
                                @foreach($webcats as $key=>$web)
                                <tr>
                                	<td>{{ $key+1 }}</td>
                                	<td> <img src="{{asset('/')}}{{$web->image}}" width="70px" height="70px"></td>
                                	
									<td>{{ $web->cname }}</td>
									<td>{{ $web->description }}</td>
									<td>
											@if($web->status == 1)
											<span class="badge bg_secondary_teal">Active</span>
											
										@else
										<span class="badge badge-danger">Inactive</span>
										@endif
									</td>
              						<td>
										
									<!-- <button class="btn  bg_secondary_teal p-1 px-2 mb-0 v-btn"  style="font-size: 13px;cursor:pointer;" title="User Details" value="{{$web->id}}"> <i class="fa-fw fa fa-eye"></i></button> -->
									<button class="btn bg_p_primary p-1 mb-0 px-2 edit-btn" value="{{$web->id}}" style="font-size: 13px;cursor:pointer;" title="Edit User"> <i class="fa fa-edit" ></i></button>

									<div class="del-modal <?php echo 'modal'.$key?>" style="right: 165px;">
										<p><b>Record delete confirmation.</b></p>
										<p>Are you want to really delete ?</p>

										<button class="btn btn-info py-1 del-close" style="background-color: #808080a6;border-color: #808080a6;">Cancel</button>
										<form method="post"  action="{{route('admin.webcat.deleteCatagory')}}" style="float:right;">
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
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content p-3">
			<div class="modal-header">
				<h2 class="modal-title" id="exampleModalLabel">Add New Category</h2>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
			<div class="modal-body">

				<form action="{{ route('admin.webcat.store') }}" id="form_validation" method="POST" enctype="multipart/form-data">
					@csrf
				
					<div class="form-group">
						<label>Category Name *</label>
						<input type="text" class="form-control" name="cname" placeholder="Product Name">
					</div>
					
					

					<div class="form-group">
						<label>Category Description</label>
						<textarea class="form-control" name="description" rows="3"></textarea>
					</div>
					<div class="form-group">
						<label>Category Image</label>
						<input type="file" name="image" class="form-control" >
					</div>
					
					</div>
				<div class="form-group">
						<label>Product Status</label>
						<select class="custom-select" name="status">
							
						
							<option value="1">Active</option>
								<option value="0">Inactive</option>
					
						</select>
					</div>
				<div class="modal-footer">

					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Add Category">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<!-- Modal -->


<!-- edit web Catagory Modal -->
<div id="editCatagoryModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content p-3">
			<div class="modal-header">
				<h2 class="modal-title" id="exampleModalLabel">Update Product</h2>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
			<div class="modal-body">

 				<form action="{{route('admin.webcat.updateCatagory')}}" id="form_validation" method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')

					<input type="text" name="webcat_id" id="webcat_id">
					
					<div class="form-group">
						<label>Category Name *</label>
						<input type="text" class="form-control" name="cname" id="cname" placeholder="Product Name">
					</div>

					<div class="form-group">
						<label>Category Description</label>
						<textarea class="form-control" name="description" id="description" rows="3"></textarea>
					</div>

					<div class="form-group">
						<label>Category Image</label>
						<input type="file" name="image" class="form-control" >
					</div>

					<div id="editImg" class="d-flex">

					</div>

					<p>Category Status: <span id="webpro_cat_status"></span></p>

					<div class="form-group">
						<label>Product Status</label>
						<select class="custom-select" name="status" id="test">
							<option value="1">Active</option>
							<option value="0">Inactive</option>
						</select>
					</div>
					
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
		
		$(document).on('click','.edit-btn',function(){
			var id = $(this).val();
            console.log(id);
			$("#editCatagoryModal").modal('show');
			$.ajax({
                    type:"GET",
                    url: "catagory-edit/"+id,
                    success: function(response){
						console.log(response.webcat_info.description);
						$("#webcat_id").val(id);
						$("#cname").val(response.webcat_info.cname);
						$("#description").val(response.webcat_info.description);
						// if(response.webcat_info.status == 0){
						// $("#webpro_cat_status").text("Inactive");
						// }else{
						// 	$("#webpro_cat_status").text("Active");
						// }
						$("#test").val(response.webcat_info.status);

						$("#editImg").html(" ");
						$("#editImg").append(
							'<p class="d-flex">Product Image: <img src="{{asset('/')}}'+response.webcat_info.image+'" style="width:90px;height:90px;"></p>\
							'
						);

                    }
                });
		});

	});
</script>
@stop