@extends('admin.layouts.adminmaster')

@section('adminTitle')
Category -Admin Dashboard
@endsection

@section('adminContent')
<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0" >
		<p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="" class="active-slink">Categories</a><span class="top-date">{{date('l, jS F Y')}}</span></p>
	</div>
</div>

<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">
				<p class="btn mt-0 task-icon"><i class="fa fa-folder-open"></i></p>
			</div>
			<h2 class="blue task-label">Categories</h2>
			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">
					<p  class="task-btn text_p_primary" title="Actions">
						<i class="fa fa-th-list"></i>
					</p>
					<div class="task-menu p-2">
						<a class="dropdown-item pl-0" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
							<i class="fa-fw fa fa-plus-circle"></i> Add Category
						</a>
						<a class="dropdown-item pl-0" type="button">
							<i class="fa fa-file"></i> Export To Excel File
						</a>
						<a class="dropdown-item pl-0" type="button">
							<i class="fa fa-trash"></i> Delete Category
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="box-content">
			<div class="row">
				<div class="col-lg-12">
					<p class="introtext">Please use the table below to navigate or filter the results. You can download the table as excel and pdf.</p>
					<table class="table table-bordered table-hover">
						<thead class="bg_p_primary">
							<tr>
								<th class="font-weight-bold" scope="col">#</th>
								<th class="font-weight-bold" scope="col">Image</th>
								<th class="font-weight-bold" scope="col">Name</th>
								<th class="font-weight-bold" scope="col">Code</th>
								<th class="font-weight-bold" scope="col">Status</th>
								<th class="font-weight-bold" scope="col">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$counter=0;
							?>
							@foreach($categories as $categoty)
							<?php
							$counter++;
							?>
							<tr>
								<td>{{$counter}}</td>
								<td>
									@if(!empty($categoty->image))
									<img src="{{ asset($categoty->image) }}" alt="No-image" class="img-rounded" style="width:35px;height:35px;">
									@else
									
									<img src="{{ asset('admin/defaultIcon/no_image.png') }}" alt="No-image" class="img-rounded" style="width:35px;height:35px;">
									
									@endif
								</td>
								<td>{{$categoty->name}}</td>
								<td>{{$categoty->code}}</td>
								<td>
									@if($categoty->status==1)
									<p class="badge  bg_secondary_teal">Active</p>
									@else
									<p class="badge badge-danger">Inactive</p>
									@endif
								</td>
								<td style="width:120px;" >
									
									<p class="btn  bg_secondary_teal p-1 px-2 mb-0 view"  style="font-size: 13px;cursor:pointer;" title="Category Details" data-vid="{{$categoty->id}}"> <i class="fa-fw fa fa-eye"></i></p>
									<p class="btn bg_p_primary p-1 mb-0 px-2 edit" data-eid="{{$categoty->id}}" style="font-size: 13px;cursor:pointer;" title="Edit Category"> <i class="fa fa-edit" ></i></p>

									<div class="del-modal <?php echo 'modal'.$counter?>" >
										<p><b>Record delete confirmation.</b></p>
										<p>Are you want to really delete ?</p>

										<button class="btn btn-info py-1 del-close" style="background-color: #808080a6;border-color: #808080a6;">Cancel</button>
										<form method="post"  action="{{route('admin.setting.deleteCategory')}}"style="float:right;">
											@csrf
											<input type="hidden" name="id" value="{{$categoty->id}}">
											<button class="btn btn-danger py-1">Confirm</button>
										</form>
									</div>
									<script>
										$(document).ready(function(){
											$(".<?php echo 'btn'.$counter?>").click(function(){
												$(".<?php echo 'modal'.$counter?>").show('fadeOut');

											});
											$(".del-close").click(function(){
												$(".del-modal").hide('fadeIn');

											});
										});
									</script>
									<p class="btn bg_secondary_grey mb-0 p-1 px-2 del-btn <?php echo 'btn'.$counter?>"  style="font-size: 13px;relative;cursor:pointer;" title="Delete Category"> <i class="fa fa-trash"></i></p>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content p-3">
			<div class="modal-header">
				<h2 class="modal-title" id="exampleModalLabel">Add New Category</h2>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="{{route('admin.category.categorySave')}}" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>Category Name *</label>
						<input type="text" class="form-control" placeholder="Category Name" name="name">
					</div>
					<div class="form-group">
						<label>Category Code *</label>
						<input type="text" class="form-control" name="code" value="{{$generatedCode}}" readonly="">
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control" rows="3" name="description"></textarea>
					</div>
					<div class="form-group col-md-12">
				       	<label> Image</label>
				       	<input type="file" class="form-control-file" name="image">
				    </div>
				</div>

				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" value="Submit">
				</div>
			</form>
		</div>
	</div>
</div>

<!--categoty modal-->
<div class="modal fade category-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content p-3 modal-data"></div>
	</div>
</div>

<script>
	$(document).ready(function(){

    	//edit product
       	$(".edit").click(function(){
         	var id=$(this).data('eid');

		 	$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url:"{{route('admin.setting.editCategory')}}",
				type:"POST",
				data:{'id':id},
		        success:function(data){
		        	$(".modal-data").html(data);
		          	$('.category-modal').modal('show'); 
		        },
		        error:function(){
		          	toastr.error("Something went Wrong, Please Try again.");
		        }
		    });
       	}); 

       //product details
       	$(".view").click(function(){
        	var id=$(this).data('vid');
		 	$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url:"{{route('admin.setting.categoryDetails')}}",
				type:"POST",
				data:{'id':id},
		        success:function(data){
		        	$(".modal-data").html(data);
					$('.category-modal').modal('show'); 
				},
		        error:function(){
		          	toastr.error("Something went Wrong, Please Try again.");
		        }
		    });
       });  
   });
</script>
@stop

