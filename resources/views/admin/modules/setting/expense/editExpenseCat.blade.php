    	<div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Update expense category</h2>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
       <div class="modal-body">
        
        	<form method="post" action="{{route('admin.category.updateExCategory')}}" enctype="multipart/form-data">
					@csrf
				  <div class="form-row">
				  
				    <div class="form-group col-md-12">
				      <label>Name</label>
				       <input type="text" class="form-control" name="name" value="{{$cat->name}}">
				        <input type="hidden" name="id" value="{{$cat->id}}">
				    </div>
				    
				    <div class="form-group col-md-12">
				      <label>Description</label>
				      
				       <textarea class="form-control" name="description" rows="3">{{$cat->description}}</textarea>
				    </div>

				  </div>
				  <div class="form-row">
				  	<input type="submit" class="btn btn-primary" style="float:right;" value="Update">
        
				  </div>
				
       </form>
   </div>
        
         
    