@extends('admin.layouts.adminmaster')
@section('adminTitle')
Users List- Admin Dashboard
@stop
@section('adminContent')
<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0" >
		<p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="{{route('admin.userList')}}" class="active-slink">Users</a><span class="top-date">Total Users: {{$users->total()}}</span></p>
	</div>
</div>

<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">
				<p class="btn mt-0 task-icon"><i class="fa fa-users"></i></p>
			</div>
			<h2 class="blue task-label">Users</h2>
			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">
					<p class="task-btn text_p_primary" title="Actions">
						<i class="fa fa-th-list"></i>
					</p>
					<div class="task-menu p-2">
						<a class="dropdown-item pl-0" type="button" data-toggle="modal" data-target="#userModal">
							<i class="fa-fw fa fa-plus-circle"></i> Add New User
						</a>
						<a class="dropdown-item pl-0" type="button" href="{{route('admin.users.roles')}}">
							<i class="fa-fw fa fa-plus-circle"></i> Role List
						</a>
						<a class="dropdown-item pl-0" type="button" href="{{route('admin.users.permissions')}}">
							<i class="fa-fw fa fa-plus-circle"></i> Permission List
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="box-content">
			<div class="row">
				<div class="col-lg-12">
					<p class="introtext">Please use the table below to navigate or filter the results. You can download the table as excel and pdf.</p>
					<table class="table table-bordered table-hover">
						<thead class="bg_p_primary">
							<tr>
								<th class="font-weight-bold" scope="col">#</th>
								<th class="font-weight-bold" scope="col">First Name</th>
								<th class="font-weight-bold" scope="col">Last Name</th>
								<th class="font-weight-bold" scope="col">User Name</th>
								<th class="font-weight-bold" scope="col">Email</th>
								<th class="font-weight-bold" scope="col">Role</th>
								<th class="font-weight-bold" scope="col">Status</th>
								<th class="font-weight-bold" scope="col">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php $counter=0;?>
                            @foreach($users as $user)
                            <?php $counter++;?>
							<tr>
								<td>{{$counter}}</td>
								<td>{{$user->first_name}}</td>
								<td>{{$user->last_name}}</td>
								<td>{{$user->username}}</td>
								<td>{{$user->email}}</td>
								<td>{{$user->name}}</td>
								<td style="text-align: center;">
									@if($user->status==1)
									<p class="badge  bg_secondary_teal">Active</p>
									@else
									<p class="badge badge-danger">Inactive</p>
									@endif
								</td>
								<td style="width:120px;">		
									<button class="btn  bg_secondary_teal p-1 px-2 mb-0 v-btn"  style="font-size: 13px;cursor:pointer;" title="User Details" value="{{$user->id}}"> <i class="fa-fw fa fa-eye"></i></button>
									<button class="btn bg_p_primary p-1 mb-0 px-2 edit-btn" value="{{$user->id}}" style="font-size: 13px;cursor:pointer;" title="Edit User"> <i class="fa fa-edit" ></i></button>
									<div class="del-modal <?php echo 'modal'.$counter?>" >
										<p><b>Record delete confirmation.</b></p>
										<p>Are you want to really delete ?</p>
										<button class="btn btn-info py-1 del-close" style="background-color: #808080a6;border-color: #808080a6;">Cancel</button>
										<form method="post"  action="{{route('admin.people.deleteUser')}}" style="float:right;">
											@csrf
											<input type="hidden" name="id" value="{{$user->id}}">
											<button type="submit" class="btn btn-danger py-1">Confirm</button>
										</form>
									</div>
									<script>
										$(document).ready(function(){
											$(".<?php echo 'btn'.$counter?>").click(function(){
												$(".<?php echo 'modal'.$counter?>").show('fadeOut');

											});
											$(".del-close").click(function(){
												$(".del-modal").hide('fadeIn');

											});
										});
									</script>
									<p class="btn btn-danger mb-0 p-1 px-2 del-btn <?php echo 'btn'.$counter?>" style="font-size: 13px;relative;cursor:pointer;" title="Delete user"> <i class="fa fa-trash"></i></p>
							    </td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<br>
					{{ $users->links() }}
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Add New User</h2>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      <div class="modal-body p-3">
       <form method="post" action="{{route('admin.user.addUser')}}">
       	@csrf
       	 <div class="form-group">
		    <label>User Role</label>
		    <select class="form-control" name="role">
		    	@foreach($roles as $role)
		    	<option value="{{$role->id}}">{{$role->name}}</option>
		    	@endforeach
		    </select>
		  </div>
		  <div class="form-group">
		    <label>First Name</label>
		    <input type="text" class="form-control" placeholder="First Name" name="first_name">
		  </div>
		  <div class="form-group">
		    <label >Last Name</label>
		    <input type="text" class="form-control" placeholder="Last Name" name="last_name">
		  </div>
		  <div class="form-group">
		    <label >User Name</label>
		    <input type="text" class="form-control" placeholder="User Name" name="username">
		  </div>
		  <div class="form-group">
		    <label >Email</label>
		    <input type="email" class="form-control" placeholder="Email Address" name="email">
		  </div>
		  <div class="form-group">
		    <label >Password</label>
		    <input type="password" class="form-control" placeholder="Password" name="password">
		  </div>
		  <div class="form-group">
		    <label >Confirm Password</label>
		    <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
		  </div>
		
      </div>
      <div class="modal-footer">
        
        <input type="submit" class="btn btn-primary" value="Add New User">
        </form>
      </div>
    </div>
  </div>
</div>

<!-- view user info -->
<div id="viewUserModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content p-3">
			<div class="modal-header">
				<h2 class="modal-title" id="exampleModalLabel">User Information</h2>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
			<div class="modal-body" id="viewInfo">

			</div>
			<div class="modal-footer">
				<!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>	 -->
			</div>
		</div>
	</div>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Update User</h2>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      <div class="modal-body p-3">
		<!-- <p style="font-weight: bold;">User Role: <span id="user_role_info"></span> </p> -->
       <form method="post" action="{{route('admin.people.userUpdate')}}">
       	@csrf
		@method('PUT')
			<input type="hidden" name="user_id" id="user_id">
       	 <div class="form-group">
		    <label>User Role </label><br>
			<!-- <span class="text-danger">*If You Want To Change User's Role,Then Select The Role.</span> -->
		    <select class="form-control" name="role" id="user_role_info">
				<option value="{{$role->id}}"></option>
		    	@foreach($roles as $role)
		    	<option value="{{$role->id}}">{{$role->name}}</option>
		    	@endforeach
		    </select>
		  </div>
		  <div class="form-group">
		    <label>First Name</label>
		    <input type="text" class="form-control" placeholder="First Name" name="first_name" id="first_name">
		  </div>
		  <div class="form-group">
		    <label >Last Name</label>
		    <input type="text" class="form-control" placeholder="Last Name" name="last_name" id="last_name">
		  </div>
		  <div class="form-group">
		    <label >User Name</label>
		    <input type="text" class="form-control" placeholder="User Name" name="username" id="username">
		  </div>
		  <div class="form-group">
		    <label >Email</label>
		    <input type="email" class="form-control" placeholder="Email Address" name="email" id="email">
		  </div>
		
      </div>
      <div class="modal-footer">
        
        <input type="submit" class="btn btn-primary" value="Update">
        </form>
      </div>
    </div>
  </div>
</div>

<script>
	$(document).ready(function(){
		$(document).on('click','.v-btn',function(){
			var id = $(this).val();
            // console.log(id);
			$("#viewUserModal").modal('show');
			$.ajax({
                    type:"GET",
                    url: "user-view/"+id,
                    success: function(response){
                        // console.log(response.User);
						$("#viewInfo").html(" ");
						$("#viewInfo").append(
							'<p>First Name: '+response.User.first_name+'</p>\
							<p>Last Name: '+response.User.last_name+'</p>\
							<p>User Name: '+response.User.username+'</p>\
							<p>User Id: '+response.User.id+'</p>\
							<p>Email: '+response.User.email+'</p>\
							<p>Mobile: '+response.User.mobile+'</p>\
							'
						);
                        
                    }
                });
			
		});
		$(document).on('click','.edit-btn',function(){
			var id = $(this).val();
            console.log(id);
			$("#editUserModal").modal('show');
			$.ajax({
                    type:"GET",
                    url: "user-edit/"+id,
                    success: function(response){
						var a = response.user;
						// var b = response.user[1];

                        // console.log(b.name);
						$("#user_id").val(id);
						$("#user_role_info").val(a.role);
						$("#first_name").val(a.first_name);
						$("#last_name").val(a.last_name);
						$("#username").val(a.username);
						// $("#phone").val(response.biller_info.phone);
						$("#email").val(a.email);
                    }
                });
		});

	});
</script>

@stop

