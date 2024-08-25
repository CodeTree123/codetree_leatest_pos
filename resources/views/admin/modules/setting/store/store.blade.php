@extends('admin.layouts.adminmaster')
@section('adminTitle')
Stores -Admin Dashboard
@stop
@section('adminContent')
<style>
	
</style>
<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0" >
		<p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="" class="active-slink">Stories</a><span class="top-date">{{date('l, jS F Y')}}</span></p>

	</div>
</div>

<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">
				


				<p class="btn mt-0 task-icon"><i class="fa fa-building"></i></p>
				
			</div>
			<h2 class="blue task-label">Store</h2>

			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">
					

					
					<p  class="task-btn text_p_primary" title="Actions">
						<i class="fa fa-th-list"></i>
					</p>
					<div class="task-menu p-2">
						<a class="dropdown-item pl-0" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
							<i class="fa-fw fa fa-plus-circle"></i> Add New Store
						</a>
						<a class="dropdown-item pl-1" type="button">
							<i class="fa fa-file"></i> Export To Excel File
						</a>
						<a class="dropdown-item pl-1" type="button">
							<i class="fa fa-file"></i> Export To PDF File
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
								<th class="font-weight-bold" scope="col">Name</th>
								<th class="font-weight-bold" scope="col">Code</th>
								<th class="font-weight-bold" scope="col">Email</th>
								<th class="font-weight-bold" scope="col">Mobile</th>
								<th class="font-weight-bold" scope="col">Address</th>
								<th class="font-weight-bold" scope="col">Status</th>
								<th class="font-weight-bold" scope="col">Actions</th>

							</tr>
						</thead>
						<tbody>
							<?php $counter=0;?>
							@foreach($stores as $store)
							<?php $counter++;?>
							<tr>
								<td>{{$counter}}</td>
								<td>{{$store->name}}</td>
								<td>{{$store->code}}</td>
								<td>{{$store->email}}</td>
								<td>{{$store->phone}}</td>
								<td>{{$store->address}}</td>
								<td>
									@if($store->status==1)
									<p class="badge  bg_secondary_teal">active</p>
									@else
									<p class="badge badge-danger">inactive</p>
									@endif
								</td>
								<td style="width:120px;">
									<a href="#" class="btn  bg_secondary_teal p-1 px-2 view-btn" data-store_id="{{$store->id}}" style="font-size: 13px;"> <i class="fa-fw fa fa-eye"></i></a>
									<a href="#" class="btn bg_p_primary p-1 px-2 edit-btn" data-store_id="{{$store->id}}" style="font-size: 13px;"> <i class="fa fa-edit" ></i></a>
									<div class="del-modal <?php echo 'modal'.$counter?>" >
										<p>Record delete confirmation</p>
										<p>Are you want to really delete ?</p>

										<button class="btn btn-info py-1 del-close" style="background-color: #808080a6;border-color: #808080a6;">Cancel</button>
										<form method="post"  action="{{route('admin.store.StoreDelete')}}"style="float:right;">
											@csrf
											<input type="hidden" name="id" value="{{$store->id}}">
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
									<a href="#" class="btn bg_secondary_grey p-1 px-2 del-btn <?php echo 'btn'.$counter?>" data-store_id="{{$store->id}}" style="font-size: 13px;relative"> <i class="fa fa-trash"></i></a>
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
<!--store add modal-->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content p-3">
			<div class="modal-header">
				<h2 class="modal-title" id="exampleModalLabel">Add New Store</h2>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
			<div class="modal-body">

				<form method="POST" action="{{route('admin.store.storeSave')}}" entype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>Store Name *</label>
						<input type="text" class="form-control" placeholder="Store Name" name="name">
					</div>
					<div class="form-group">
						<label>Email</label>

						<input type="email" class="form-control" name="email" placeholder="store Email">
					</div>
					<div class="form-group">
						<label>Mobile</label>

						<input type="text" class="form-control" name="mobile" placeholder="Store phone">
					</div>

					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" rows="3" name="address"></textarea>
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput">Documents</label>
						<div class="custom-file">

							<input type="file" class="custom-file-input" id="customFile" name="documents">
							<label class="custom-file-label" for="customFile">Choose file</label>
						</div>
					</div>

				</div>
				<div class="modal-footer">

					<input type="submit" class="btn btn-primary" value="Submit">
				</div>
			</form>
		</div>
	</div>
</div>
</div>
<div class="modal fade store_modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content p-3  store-content ">


			
			
		</div>
	</div>
</div>
</div>
<script>
	$(document).ready(function(){
 //view Store Details
 $(".view-btn").click(function(){
 	var vStoreId=$(this).data('store_id');
 	//ajax
 	$.ajax({
 		headers: {
 			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 		},
 		url:"{{route('admin.store.StoreDetails')}}",
 		method:"POST",
 		data:{'vStoreId':vStoreId},
 		success:function(data){
 			$(".store_modal").modal('show');
 			$(".store-content").html(data);
 		},
 		error:function(){
 			toastr.error("Something went Wrong, Please Try again.");
 		},
 	});
 	//end ajax
 });
 //edit Store 
 $(".edit-btn").click(function(){
 	var vStoreId=$(this).data('store_id');
 	//ajax
 	$.ajax({
 		headers: {
 			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 		},
 		url:"{{route('admin.store.StoreEdit')}}",
 		method:"POST",
 		data:{'vStoreId':vStoreId},
 		success:function(data){
 			$(".store_modal").modal('show');
 			$(".store-content").html(data);
 		},
 		error:function(){
 			toastr.error("Something went Wrong, Please Try again.");
 		},
 	});
 	//end ajax
 });
});
</script>
@stop

