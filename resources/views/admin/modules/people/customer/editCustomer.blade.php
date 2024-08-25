<div class="modal-header">
	<h2 class="modal-title" id="exampleModalLabel">Update Basic Info</h2>
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<div class="modal-body">
	@if(!empty($customerInfos->image))
	<img src="{{ asset($customerInfos->image) }}" alt="{{ $customerInfos->name }}" class="img-rounded" style="width:100px;height:100px;">
	@else
	<img src="{{ asset('admin/defaultIcon/user.png') }}" alt="No-image" class="img-rounded" style="width:100px;height:100px;">
	@endif
	<form method="post" action="{{route('admin.customer.updateCustomer')}}" enctype="multipart/form-data">
	@csrf
		<div class="form-row">
			<div class="form-group col-md-12">
				<label>Change Image</label>
				<input type="file" class="form-control-file" name="image">
			</div>
			<div class="form-group col-md-6">
				<label>Mobile *</label>
				<input type="text" class="form-control" name="mobile" value="{{$customerInfos->mobile}}">
				<input type="hidden" name="id" value="{{$customerInfos->id}}">
			</div>
			<div class="form-group col-md-6">
				<label>Name</label>
				<input type="text" class="form-control" name="name" value="{{$customerInfos->name}}">
			</div>
			<div class="form-group col-md-6">
				<label>Email</label>
				<input type="email" class="form-control" name="email" value="{{$customerInfos->email}}">
			</div>
				<div class="form-group col-md-6">
				<label>Company</label>
				<input type="text" class="form-control" name="company" value="{{$customerInfos->company}}">
			</div>
			<div class="form-group col-md-12">
				<label>Address</label>
				
				<textarea class="form-control" name="address" rows="3">{{$customerInfos->address}}</textarea>
			</div>
			<div class="form-group col-12 text-center">
				<input type="submit" class="btn btn-primary " value="Update Customer">
			</div>
		</div>
	</form>
</div>
        
         
    