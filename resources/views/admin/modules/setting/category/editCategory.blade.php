    	<div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Update category</h2>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
       <div class="modal-body">
         	@if(!empty($category->image))
    		<img src="{{ asset('/')}}{{$category->image}}" alt="{{$category->name}}" class="img-rounded" style="width:100px;height:100px;">
    		@else
    		<img src="{{ asset('/')}}public/admin/defaultIcon/no_image.png" alt="No-image" class="img-rounded" style="width:100px;height:100px;">
    		@endif

        	<form method="post" action="{{route('admin.category.updateCategory')}}" enctype="multipart/form-data">
					@csrf
				  <div class="form-row">
				   <div class="form-group col-md-12">
				      <label>Change Image</label>
				       <input type="file" class="form-control-file" name="image">
				       <input type="hidden" name="id" value="{{$category->id}}">
				    </div>
				    
				    <div class="form-group col-md-12">
				      <label>Name</label>
				       <input type="text" class="form-control" name="name" value="{{$category->name}}">
				    </div>
				    
				    <div class="form-group col-md-12">
				      <label>Description</label>
				      
				       <textarea class="form-control" name="description" rows="3">{{$category->description}}</textarea>
				    </div>

				  </div>
				  <div class="form-row">
				  	<input type="submit" class="btn btn-primary" style="float:right;" value="Update">
        
				  </div>
				
       </form>
   </div>
        
         
    