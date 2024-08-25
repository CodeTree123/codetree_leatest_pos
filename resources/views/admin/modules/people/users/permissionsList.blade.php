@extends('admin.layouts.adminmaster')
@section('adminTitle')
Permission List- Admin Dashboard
@stop
@section('adminContent')
<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0" >
		<p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="{{route('admin.userList')}}">Users / </a><a  class="active-slink">Permissions</a><span class="top-date">{{date('l, jS F Y')}}</span></p>

	</div>
</div>

<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">
				
					

					<p class="btn mt-0 task-icon"><i class="fa fa-users"></i></p>
				
			</div>
			<h2 class="blue task-label">Permissions</h2>

			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">
					

					
						<p class="task-btn text_p_primary" title="Actions">
							<i class="fa fa-th-list"></i>
						</p>
						<div class="task-menu p-2">
							
							
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
								<th class="font-weight-bold" scope="col">Permission Name</th>
								<th class="font-weight-bold" scope="col">Guard Name</th>
								
								<th class="font-weight-bold" scope="col">Actions</th>

							</tr>
						</thead>
						<tbody>
							<?php $counter=0;?>
                            @foreach($permissions as $permission)
                            <?php $counter++;?>
							<tr>
								<td>{{$counter}}</td>
								<td>{{$permission->name}}</td>
								<td>{{$permission->guard_name}}</td>
								
								<td style="width:120px;">
									<div class="dropdown" style="width:90px;float:right;">
									  <p class="action-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true">
									   Action
									  </button>
									  <div class="dropdown-menu action-menu">
									  	 <a class="dropdown-item" href=""> <i class="fa-fw fa fa-eye"></i> View</a>
									    <a class="dropdown-item" href="#"> <i class="fa-fw fa fa-trash"></i> Delete</a>
									   
									    <a class="dropdown-item" href="#"> <i class="fa-fw fa fa-edit"></i> Edit</a>
									  </div>
									</div>
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

@stop

