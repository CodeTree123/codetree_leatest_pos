

<div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Unit Details</h2>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
       <div class="modal-body">                                          
   <div class="row p-1">
    <div class="col-5 col-xs-12">
    	<h3><b>Basic Information</b></h3>
    	<hr class="mt-0">
    	<p class="mb-0">Name: {{$unit->name}}</p>
    	<p class="mb-0">Code: {{$unit->code}}</p>
    	<p class="mb-0">Base unit: {{$unit->base_unit}}</p>
        <p class="mb-0">Operator: {{$unit->operator}}</p>
        <p class="mb-0">Operation value: {{$unit->operation_value}}</p>
    	
    </div>
   

   </div>
</div>
</div>

