

<div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Category Details</h2>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
       <div class="modal-body">                                          
   <div class="row p-1">
    <div class="col-2">
    	<center>
    		@if(!empty($category->image))
    		<img src="{{ asset('/')}}{{$category->image}}" alt="{{$category->name}}" class="img-rounded" style="width:100px;height:100px;">
    		@else
    		<img src="{{ asset('/')}}public/admin/defaultIcon/no_image.png" alt="No-image" class="img-rounded" style="width:100px;height:100px;">
    		@endif
    	
    </center>
    </div>
    <div class="col-5 col-xs-12">
    	<h3><b>Basic Information</b></h3>
    	<hr class="mt-0">
    	<p class="mb-0">Name: {{$category->name}}</p>
    	<p class="mb-0">Code: {{$category->code}}</p>
    	<p class="mb-0">Description: {{$category->description}}</p>
    	
    </div>
   

   </div>
</div>
</div>

