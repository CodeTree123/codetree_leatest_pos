@extends('admin.layouts.adminmaster')
@section('adminTitle')
Add Customer- Admin Dashboard
@stop
@section('adminContent')
<style>
	label{
		font-weight: bold;
	}
</style>
<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-3" >
		<p class="mb-1"><a href="{{route('admin.dashboard')}}">Home /</a> <a href="{{route('admin.customerList')}}">Customers / </a><a href="#" class="active-slink">Add New Customer</a> <span class="top-date">{{date('l, jS F Y')}}</span></p>

	</div>
</div>

<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">
				
					

					<p class="btn mt-0 task-icon"><i class="fa fa-user"></i></p>
				
			</div>
			<h2 class="blue task-label">Add Customer</h2>

			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">
					

					
						<p class="task-btn text_p_primary" title="Actions">
							<i class="fa fa-th-list"></i>
						</p>
						<div class="task-menu p-2">
							<a class="dropdown-item pl-0" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
							 <i class="fa-fw fa fa-plus-circle"></i> Customer List
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
	
				
				<div class="col-sm-12 col-md-12 col-xs-12">
				<form method="post" action="{{route('admin.customer.customerSave')}}">
					@csrf
				  <div class="form-row">
				   
				    <div class="form-group col-md-6">
				      <label>Customer Group</label>
				       <select class="custom-select" name="group">
				       	@foreach($customerGroups as $customerGroup)
					 <option value="{{$customerGroup->id}}">{{$customerGroup->name}}</option>
					  @endforeach
					</select>
				    </div>
                     <div class="form-group col-md-6">
				      <label>Stating Balance</label>
				       <input type="number" class="form-control" name="start_balance" placeholder="Starting balance">
				    </div>
				    <div class="form-group col-md-6">
				      <label>Mobile *</label>
				       <input type="text" class="form-control" name="mobile" placeholder="Enter Customer Mobile">
				    </div>
				    <div class="form-group col-md-6">
				      <label>Name</label>
				       <input type="text" class="form-control" name="name" placeholder="Enter Customer Name">
				    </div>
				    <div class="form-group col-md-6">
				      <label>Email</label>
				       <input type="email" class="form-control" name="email" placeholder="Enter Customer Email Address">
				    </div>
				     <div class="form-group col-md-6">
				      <label>Company</label>
				       <input type="text" class="form-control" name="company" placeholder="Enter Customer Company Name">
				    </div>
				    <div class="form-group col-md-12">
				      <label>Address</label>
				       <textarea class="form-control" rows="3" name="address" placeholder="Enter Customer Address"></textarea>
				    </div>
				    

				    <div class="form-group">
				    <input type="submit" class="btn btn-primary" value="Add Customer">
				  </div>
				  </div>
				</form>

				</div>
		
				
			</div>
		</div>
	</div>

</div>

@stop

