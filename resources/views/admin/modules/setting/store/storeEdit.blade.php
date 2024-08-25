<div class="modal-header">
	<h2 class="modal-title" id="exampleModalLabel">Update Store Information</h2>
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<div class="modal-body">
	
		<div class="form-group">
			<label>Store Name *</label>
			<input type="text" class="form-control" id="name" value="{{$store->name}}">
			<input type="hidden" id="id" value="{{$store->id}}">
		</div>
		<div class="form-group">
			<label>Email</label>

			<input type="email" class="form-control" id="email" value="{{$store->email}}">
		</div>
		<div class="form-group">
			<label>Mobile</label>

			<input type="text" class="form-control" id="phone" value="{{$store->phone}}">
		</div>

		<div class="form-group">
			<label>Address</label>
			<textarea class="form-control" rows="3" id="address">{{$store->address}}</textarea>
		</div>

	</div>
	<div class="modal-footer">

		<button  class="btn btn-primary update-btn">Update</button>
	</div>
<script>
	$(document).ready(function(){
 //view Store Details
 $(".update-btn").click(function(){
 	var id=$("#id").val();
 	var name=$("#name").val();
 	var email=$("#email").val();
 	var phone=$("#phone").val();
 	var address=$("#address").val();
 	//ajax
 	$.ajax({
 		headers: {
 			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 		},
 		url:"{{route('admin.store.storeUpdate')}}",
 		method:"POST",
 		data:{'id':id,'name':name,'email':email,'phone':phone,'address':address},
 		success:function(data){

 			if(data==1){
 				
 				location.reload();

 			}
 		},
 		error:function(){
 			toastr.error("Something went Wrong, Please Try again.");
 		},
 	});
 	//end ajax
 });
});
</script>