@extends('admin.layouts.adminmaster')
@section('adminTitle')
Roles List- Admin Dashboard
@stop
@section('adminContent')
<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0" >
		<p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="{{route('admin.userList')}}">Users / </a><a  class="active-slink">Roles</a><span class="top-date">{{date('l, jS F Y')}}</span></p>

	</div>
</div>

<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">
				
					

					<p class="btn mt-0 task-icon"><i class="fa fa-users"></i></p>
				
			</div>
			<h2 class="blue task-label">User's Roles</h2>

			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">
					

					
						<p class="task-btn text_p_primary" title="Actions">
							<i class="fa fa-th-list"></i>
						</p>
						<div class="task-menu p-2">
							<a class="dropdown-item pl-0" type="button" data-toggle="modal" data-target="#exampleModalLong">
							 <i class="fa-fw fa fa-plus-circle"></i> Add New Role
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
								<th class="font-weight-bold" scope="col">Name</th>
								<th class="font-weight-bold" scope="col">Guard Name</th>
								
								<th class="font-weight-bold" scope="col">Actions</th>

							</tr>
						</thead>
						<tbody>
							<?php $counter=0;?>
                            @foreach($roles as $role)
                            <?php $counter++;?>
							<tr>
								<td>{{$counter}}</td>
								<td>{{$role->name}}</td>
								<td>{{$role->guard_name}}</td>
								
								<td style="width:120px;">
									<a href="{{route('admin.role.permissions',$role->id)}}" title="change Permission"><i class="fa fa-th-list"></i></a>
									<a href="" title="Edit Role"><i class="fa fa-edit"></i></a>
									<a href="" title="Delete"><i class="fa fa-trash"></i></a>
							    </td>
							</tr>
							@endforeach
							</tbody>
						</table>
						
				</div>
			</div>
		</div>
	</div>

</div>

</div>
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLongTitle">Add new user role</h2>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      <div class="modal-body">
       <form method="post" action="{{route('admin.user.saveRole')}}">  
       	@csrf
		  <div class="form-group">
		    <label for="formGroupExampleInput">Role Name</label>
		    <input type="text" class="form-control" name="name" placeholder="Role Name">
		  </div>
		  
		
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Save Role">
        </form>
      </div>
    </div>
  </div>
</div>
@stop

