@extends('admin.layouts.adminmaster')
@section('adminTitle')
Roles List- Admin Dashboard
@stop
@section('adminContent')
<?php
use App\Http\Controllers\admin\UserController;
$userCtr=new UserController()
?>
<style>
	.chackbox_style{
		height: 25px;
		width:25px;
	}
</style>
<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0" >
		<p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="{{route('admin.userList')}}">Users / </a><a href="{{route('admin.users.roles')}}">Roles / </a><a href="#" class="active-slink">Change Permission</a><span class="top-date">{{date('l, jS F Y')}}</span></p>

	</div>
</div>

<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">
				
					

					<p class="btn mt-0 task-icon"><i class="fa fa-users"></i></p>
				
			</div>
			<h2 class="blue task-label">Change Permission</h2>

			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">
					

					
						<p class="task-btn text_p_primary" title="Actions">
							<i class="fa fa-th-list"></i>
						</p>
						
					
				</div>
			</div>
		</div>
		<div class="box-content">
			<div class="row">
				<div class="col-lg-12">
					<p class="introtext">Please use the table below to navigate or filter the results. You can download the table as excel and pdf.</p>
                   <div class="col-12">
                   	<center>
                   		
                   		<h1>{{$roleInfo->name}}</h1>
                   	</center>
                   	
                   </div>
                   <form method="post" action="{{route('admin.user.role.updatepermission')}}">
                    <div class="row">       	
                    		@csrf
                    	<p class="btn btn-primary col-12 mt-4" style="border-radius: 0px;">Permissions List</p>
                    	<input type="hidden" name="role_id" value="{{$roleInfo->id}}">
                    	
                    	@foreach($allPermission as $all_permission)                    	
                    	<?php
                        $permission=$userCtr->getpermission($roleInfo->id,$all_permission->id);
                    	?>
                    	@if($permission==1)
                    	<div class="col-3">
						<div class="form-check">
						  <input class="form-check-input chackbox_style" type="checkbox" value="{{$all_permission->id}}" name="permission[]" checked="">
						  <label class="form-check-label ml-2 mt-0" style="font-weight: normal;font-size: 20px;">{{$all_permission->name}}</label>
						</div>
                    	</div>
                    	@else
                       <div class="col-3">
						<div class="form-check">
						  <input class="form-check-input chackbox_style" type="checkbox" value="{{$all_permission->id}}" name="permission[]">
						  <label class="form-check-label ml-2 mt-0" style="font-weight: normal;font-size: 20px;">{{$all_permission->name}}</label>
						</div>
                    	</div>                    	
                    	@endif
                    	@endforeach
                    	
                   	  <input type="submit" class="btn  bg_secondary_teal col-12 mt-3" value="Update Permission" style="border-radius: 0px;">
                   	
                   </div>
					</form>	
				</div>
			</div>
		</div>
	</div>

</div>

</div>

@stop

