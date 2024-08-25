@extends('admin.layouts.adminmaster')
@section('adminTitle')
{{$admin->first_name}}-Dashboard
@stop
@section('adminContent')
<style>
	p{
		margin-bottom:0px;
	}
	.upper-action-btn{
		 margin-top:-8px;margin-left: 30px;border-radius: 0px;padding: 2px 20px;cursor:pointer;
	}
</style>
<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0" >
		<p class="mb-1"><a href="{{route('admin.dashboard')}}" ><i class="fa fa-home"></i> Dashboard / </a><a class="active-slink">My Profile</a><span class="top-date">{{date('l, jS F Y')}}</span></p>

	</div>
</div>

<div class="container-fluid p-3">
	                                                                               
   <div class="row p-1">
    <div class="col-2">
    	<center>
    		@if(!empty($admin->image))
    		<img src="{{ asset('/')}}{{$admin->image}}" alt="{{$admin->first_name}}" class="img-rounded" style="width:100px;height:100px;">
    		@else
    		<img src="{{ asset('/')}}public/admin/defaultIcon/user.png" alt="No-image" class="img-rounded" style="width:100px;height:100px;">
    		@endif
    	
    </center>
    </div>
    <div class="col-5 col-xs-12">
    	<h3 style="float: left;margin-bottom: 0px;font-weight: bold;">Basic Information</h3>
    	<p class="btn btn-info edit-info upper-action-btn" data-customerId="{{$admin->id}}">Edit</p>
    	<p class="btn btn-info update-password upper-action-btn" data-customerId="{{$admin->id}}">Update Password</p>
    	<hr class="mt-0">
    	<p>First Name: {{$admin->first_name}}</p>
    	<p>Last Name: {{$admin->last_name}}</p>
    	<p>Email: {{$admin->email}}</p>
    	<p>Mobile: {{$admin->mobile}}</p>
    	<p>Username: {{$admin->username}}</p>
    	
    </div>
    <div class="col-5 col-xs-12">
    	
    </div>

   </div>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg updateModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-3">
    	<div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Update Basic Info</h2>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
       <div class="modal-body">
         	@if(!empty($admin->image))
    		<img src="{{ asset('/')}}{{$admin->image}}" alt="{{$admin->name}}" class="img-rounded" style="width:100px;height:100px;">
    		@else
    		<img src="{{ asset('/')}}public/admin/defaultIcon/user.png" alt="No-image" class="img-rounded" style="width:100px;height:100px;">
    		@endif

        	<form method="post" action="{{route('admin.updateProfile')}}" enctype="multipart/form-data">
					@csrf
				  <div class="form-row">
				   <div class="form-group col-md-12">
				      <label>Change Image</label>
				       <input type="file" class="form-control-file" name="image">
				       
				    </div>
				    <div class="form-group col-md-6">
				      <label>First</label>
				       <input type="text" class="form-control" name="first_name" value="{{$admin->first_name}}">
				      
				    </div>
				    <div class="form-group col-md-6">
				      <label>Last Name</label>
				       <input type="text" class="form-control" name="last_name" value="{{$admin->last_name}}">
				    </div>
				    <div class="form-group col-md-6">
				      <label>Email</label>
				       <input type="email" class="form-control" name="email" value="{{$admin->email}}">
				    </div>
				     <div class="form-group col-md-6">
				      <label>Mobile</label>
				       <input type="text" class="form-control" name="mobile" value="{{$admin->mobile}}">
				    </div>
				     <div class="form-group col-md-6">
				      <label>Username</label>
				       <input type="text" class="form-control" name="username" value="{{$admin->username}}">
				    </div>
				    

				  </div>
				  <div class="form-row">
				  	<input type="submit" class="btn btn-primary" style="float:right;" value="Update Profile">
        
				  </div>
				
       </form>
   </div>
        
         
    
    </div>
  </div>
</div>
<div class="modal fade bd-example-modal-lg updatepassword" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content p-3">
    	<div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Update Password</h2>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
       <div class="modal-body">
         	
        	<form method="post" action="{{route('admin.updatepassword')}}" enctype="multipart/form-data">
					@csrf
				  <div class="form-row">
				   
				    <div class="form-group col-md-12">
				      <label>Old Password</label>
				       <input type="password" class="form-control" name="old_password" >
				    </div>
				     <div class="form-group col-md-12">
				      <label>New Password</label>
				       <input type="password" class="form-control" name="password" >
				    </div>
				     <div class="form-group col-md-12">
				      <label>Confirm Password</label>
				       <input type="password" class="form-control" name="password_confirmation">
				    </div>
				    

				  </div>
				  <div class="form-row">
				  	<input type="submit" class="btn btn-primary" style="float:right;" value="Update Password">
        
				  </div>
				
       </form>
   </div>
        
         
    
    </div>
  </div>
</div>
<script>
	$(document).ready(function(){
      
       //edit customer id
       $(".edit-info").click(function(){
          $('.updateModal').modal('show'); 
        
       });
        //edit customer id
       $(".update-password").click(function(){
          $('.updatepassword').modal('show'); 
        
       });
	});
</script>
@stop

