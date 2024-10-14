@extends('admin.layouts.adminmaster')

@section('adminTitle')
Sub category -Admin Dashboard
@endsection

@section('adminContent')
<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0" >
		<p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="" class="active-slink">Sub Categories</a><span class="top-date">{{date('l, jS F Y')}}</span></p>
	</div>
</div>

<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">
				<p class="btn mt-0 task-icon"><i class="fa fa-folder-open"></i></p>
			</div>
			<h2 class="blue task-label">Sub-Categories</h2>
			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">
					<p  class="task-btn text_p_primary" title="Actions">
						<i class="fa fa-th-list"></i>
					</p>
					<div class="task-menu p-2">
						<a class="dropdown-item pl-0" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
							<i class="fa-fw fa fa-plus-circle"></i> Add Sub Category
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
								<th class="font-weight-bold" scope="col">Parent Category</th>
								<th class="font-weight-bold" scope="col">Status</th>
								<th class="font-weight-bold" scope="col">Actions</th>

							</tr>
						</thead>
						<tbody>
                    	@foreach($subcategories as $index => $category)
                    	<tr>
                    		<td>{{ $subcategories->firstItem() + $index }}</td>
                    		<td>
                    			@if(!empty($category->image))
                    				<img src="{{ asset($category->image) }}" alt="No-image" class="img-rounded" style="width:35px;height:35px;">
                    			@else
                    				<img src="{{ asset('admin/defaultIcon/no_image.png') }}" alt="No-image" class="img-rounded" style="width:35px;height:35px;">
                    			@endif
                    		</td>
                    		<td>{{ $category->name }}</td>
                    		<td>{{ $category->code }}</td>
                    		<td>{{ $category->category['name'] ?? 'N/A' }}</td> <!-- Handles if 'category' is null -->
                    		<td>
                    			@if($category->status == 1)
                    				<p class="badge bg_secondary_teal">Active</p>
                    			@else
                    				<p class="badge badge-danger">Inactive</p>
                    			@endif
                    		</td>
                    		<td style="width:120px;">
                    			<!-- View Button -->
                    			<p class="btn bg_secondary_teal p-1 px-2 mb-0 view" style="font-size: 13px; cursor:pointer;" title="Category Details" data-vid="{{ $category->id }}">
                    				<i class="fa-fw fa fa-eye"></i>
                    			</p>
                    			
                    			<!-- Edit Button -->
                    			<p class="btn bg_p_primary p-1 mb-0 px-2 edit" data-eid="{{ $category->id }}" style="font-size: 13px; cursor:pointer;" title="Edit Category">
                    				<i class="fa fa-edit"></i>
                    			</p>
                    
                    			<!-- Delete Confirmation Modal -->
                    			<div class="del-modal modal{{ $index + 1 }}" style="right: 55px;">
                    				<p><b>Record delete confirmation.</b></p>
                    				<p>Are you sure you want to delete?</p>
                    
                    				<button class="btn btn-info py-1 del-close" style="background-color: #808080a6; border-color: #808080a6;">Cancel</button>
                    				<form method="post" action="{{ route('admin.setting.deletesubCategory') }}" style="float:right;">
                    					@csrf
                    					<input type="hidden" name="id" value="{{ $category->id }}">
                    					<button class="btn btn-danger py-1">Confirm</button>
                    				</form>
                    			</div>
                    
                    			<!-- Delete Button -->
                    			<p class="btn bg_secondary_grey mb-0 p-1 px-2 del-btn btn{{ $index + 1 }}" style="font-size: 13px; cursor:pointer;" title="Delete Category">
                    				<i class="fa fa-trash"></i>
                    			</p>
                    		</td>
                    	</tr>
                    	@endforeach
                    </tbody>
                    
                    <script>
                    	$(document).ready(function() {
                    		@foreach($subcategories as $index => $category)
                    			$(".btn{{ $index + 1 }}").click(function() {
                    				$(".modal{{ $index + 1 }}").show('fadeOut');
                    			});
                    			$(".del-close").click(function() {
                    				$(".del-modal").hide('fadeIn');
                    			});
                    		@endforeach
                    	});
                    </script>

					</table>
					<div class="d-flex justify-content-end mt-2">
                        <p class="m-1">Click here to go to the next page:</p> {{ $subcategories->links() }}
                    </div>

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
				<h2 class="modal-title" id="exampleModalLabel">Add New Sub-Category</h2>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
			<div class="modal-body">
			<form method="POST" action="{{route('admin.subcategory.subcategorySave')}}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label>Parent Category</label>
					<select class="custom-select" name="parentId">
						<option selected value="NULL">Select Parent category</option>
						@foreach($categories as $category)
						<option value="{{$category->id}}">{{$category->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label>Category Name *</label>
					<input type="text" class="form-control" placeholder="Category Name" name="name">
				</div>
				<div class="form-group">
					<label>Category Code *</label>
					@php
                        $count = str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);  // Generates a 3-digit random number
                    @endphp
					<input type="text" class="form-control" name="code" value="{{$categoryCode}}-{{$count}}" readonly="">
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" rows="3" name="description"></textarea>
				</div>
				<div class="form-group">
					<label>Change Image</label>
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
{{-- category modal --}}
<div class="modal fade category-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content p-3 modal-data">
			
		</div>
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
				url:"{{route('admin.setting.editsubCategory')}}",
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
				url:"{{route('admin.setting.subcategoryDetails')}}",
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
@endsection

