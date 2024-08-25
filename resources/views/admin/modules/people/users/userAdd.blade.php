@extends('admin.layouts.adminmaster')
@section('adminTitle')
Add New User- Admin Dashboard
@stop
@section('adminContent')
<style>
	label{
		font-weight: bold;
	}
</style>
<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-3" >
		<p class="mb-1"><a href="{{route('admin.dashboard')}}">Home</a>/<a href="">Add User</a></p>

	</div>
</div>

<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">
				
					

					<p class="btn mt-0"><i class="fa fa-user"></i></p>
				
			</div>
			<h2 class="blue">Add New User</h2>

			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">
					

					
						<button type="button" class="btn" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" title="Actions">
							<i class="fa-fw fa fa-tasks"></i>
						</button>
						<div class="dropdown-menu" style="margin-right:105px;margin-top:2px;">
							<a class="dropdown-item pl-0" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
							 <i class="fa-fw fa fa-plus"></i> User List
							</a>
							
						</div>
					
				</div>
			</div>
		</div>
		<div class="box-content">
			<div class="row">
				<div class="col-lg-12">
					<p class="introtext">Please fill in the information below. The field labels marked with * are required input fields.</p>
					</div>
	
				<div class="col-sm-5 col-md-5 col-xs-12">
					<form>
				  <div class="form-group">
				    <label for="formGroupExampleInput">First Name *</label>
				    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="First Name">
				  </div>
				  <div class="form-group">
				    <label for="formGroupExampleInput">Last Name *</label>
				    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Last Name">
				  </div>
				  <div class="form-group">
				    <label for="formGroupExampleInput">Email</label>
				    <input type="email" class="form-control" id="formGroupExampleInput" placeholder="Email">
				  </div>
				    <div class="form-group">
				    <label for="formGroupExampleInput">Phone</label>
				    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Phone">
				  </div>
				
				   <div class="form-group">
				    <label for="formGroupExampleInput2">Gender</label>
				    <select class="custom-select">
					  <option selected>Open this select menu</option>
					  <option value="1">Male</option>
					  <option value="2">Female</option>
					  <option value="3">Common Gender</option>
					</select>
				  </div>
                 <div class="form-group">
				    <label for="formGroupExampleInput">Username</label>
				    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="username">
				  </div>

				  <div class="form-group">
				    <label for="formGroupExampleInput">Password</label>
				    <input type="password" class="form-control" id="formGroupExampleInput" placeholder="*******">
				  </div>
				  <div class="form-group">
				    <label for="formGroupExampleInput">Confirm Password</label>
				    <input type="password" class="form-control" id="formGroupExampleInput" placeholder="********">
				  </div>

				  <div class="form-group">
				    <label for="formGroupExampleInput">User Image</label>
				     <div class="custom-file">
				  
				  <input type="file" class="custom-file-input" id="customFile">
				  <label class="custom-file-label" for="customFile">Choose file</label>
				</div>
				  </div>
				 <div class="form-group">
				    <button type="submit" class="btn btn-primary">Add User</button>
				  </div>
				</form>

				</div>

				<div class=" offset-md-1 col-sm-6 col-md-6 col-xs-12">
					<form>
				  <div class="form-group">
				    <label for="formGroupExampleInput2">Status</label>
				    <select class="custom-select">
					  <option selected>Open this select menu</option>
					  <option value="1">Active</option>
					  <option value="2">Inactive</option>
					</select>
				  </div>
				   <div class="form-group">
				    <label for="formGroupExampleInput2">Group</label>
				    <select class="custom-select">
					  <option selected>Open this select menu</option>
					  <option value="1">manager</option>
					  <option value="2">Sales</option>
					  <option value="3">super_user</option>
					</select>
				  </div>
				 
				</form>

				</div>
		
				
			</div>
		</div>
	</div>

</div>

@stop

