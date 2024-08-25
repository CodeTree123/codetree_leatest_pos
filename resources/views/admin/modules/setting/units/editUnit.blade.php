    	<div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Update unit</h2>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
       <div class="modal-body">

        	<form method="post" action="{{route('admin.setting.updateUnit')}}" enctype="multipart/form-data">
					@csrf
				  <div class="form-row">
				   
				    
				    <div class="form-group col-md-12">
				      <label>Name</label>
				       <input type="text" class="form-control" name="name" value="{{$unit->name}}">
				       <input type="hidden" name="id" value="{{$unit->id}}">
				    </div>
				    <div class="form-group col-md-12">
				      <label>Base Unit</label>
				       <select class="form-control" name="base_unit">
				       	<option value="{{$unit->base_unit}}">{{$unit->base_unit}}</option>
                      <!--  @foreach($units as $u)
				       	<option value="{{$u->name}}">{{$u->name}}</option>
				       	@endforeach -->
				       </select>
				    </div>

				    <div class="form-group col-md-12">
				      <label>Operator</label>
				       <input type="text" class="form-control" name="operator" value="{{$unit->operator}}">
				    </div>
				     <div class="form-group col-md-12">
				      <label>Operation value</label>
				       <input type="text" class="form-control" name="operation_value" value="{{$unit->operation_value}}">
				    </div>
				    
				    
				  </div>
				  <div class="form-row">
				  	<input type="submit" class="btn btn-primary" style="float:right;" value="Update">
        
				  </div>
				
       </form>
   </div>
        
         
    