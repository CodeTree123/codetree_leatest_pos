    	<div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Update Expense Info</h2>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
       <div class="modal-body">
         	
        	<form method="post" action="{{route('admin.expense.updateExpense')}}" enctype="multipart/form-data">
					@csrf
				  <div class="form-row">
				  
				    <div class="form-group col-md-6">
				      <label>Rreference</label>
				       <input type="text" class="form-control" name="reference" value="{{$expense->reference}}">
				       <input type="hidden" name="id" value="{{$expense->id}}">
				    </div>
				    <div class="form-group col-md-6">
				      <label>Category</label>
				      <select name="category" class="form-control">
				      	<option value="{{$expense->categoryInfo['id']}}">{{$expense->categoryInfo['name']}}</option>
				      </select>
				      
				    </div>
				    <div class="form-group col-md-6">
				      <label>Date</label>
				       <input type="date" class="form-control" name="eDate" value="{{$expense->eDate}}">
				    </div>
				    <div class="form-group col-md-6">
				      <label>Amount</label>
				       <input type="number" class="form-control" name="cost" value="{{$expense->cost}}">
				    </div>
				    
				    <div class="form-group col-md-12">
				      <label>Note</label>
				      
				       <textarea class="form-control" name="note" rows="3">{{$expense->note}}</textarea>
				    </div>

				  </div>
				  <div class="form-row">
				  	<input type="submit" class="btn btn-primary" style="float:right;" value="Update">
        
				  </div>
				
       </form>
   </div>
        
         
    