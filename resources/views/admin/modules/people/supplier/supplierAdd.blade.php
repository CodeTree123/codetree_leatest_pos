@extends('admin.layouts.adminmaster')
@section('adminTitle')
Add Supplier- Admin Dashboard
@endsection
@section('adminContent')

<style>
	label{
		font-weight: bold;
	}
</style>

<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-3" >
		<p class="mb-1"><a href="{{route('admin.dashboard')}}">Home / </a><a href="{{route('admin.supplierList')}}">Suppliers / </a><a href="#" class="active-slink">Add Supplier</a></p>
	</div>
</div>

<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">
				<p class="btn mt-0 task-icon"><i class="fa fa-user"></i></p>
			</div>

			<h2 class="blue task-label">Add Supplier</h2>
			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">
					<p class="task-btn text_p_primary" title="Actions">
						<i class="fa fa-th-list"></i>
					</p>
					<div class="task-menu p-2">
						<a class="dropdown-item pl-0" href="{{route('admin.supplierList')}}">
							<i class="fa fa-list"></i> Supplier List
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
				<form method="post" action="{{ route('admin.supplier.supplierSave') }}">
					@csrf
					<div class="form-row pt-0 pb-0 px-2">
						<div class="form-group col-md-6">
							<label for="inputPassword4">Company</label>
							<input type="text" class="form-control" name="company" placeholder="Company">
						</div>
						<div class="form-group col-md-6">
							<label for="inputPassword4">Starting Balance</label>
							<input type="text" class="form-control" name="start_balance" placeholder="starting balance	">
						</div>
						<div class="form-group col-md-6">
							<label for="inputPassword4">Mobile *</label>
							<input type="text" class="form-control" name="mobile" placeholder="Mobile">
						</div>
						<div class="form-group col-md-6">
							<label for="inputPassword4">Name *</label>
							<input type="text" class="form-control" name="name" placeholder="Name">
						</div>
						<div class="form-group col-md-6">
							<label for="inputPassword4">Email Address</label>
							<input type="email" class="form-control" name="email" placeholder="Email">
						</div>
						<div class="form-group col-md-6">
							<label for="inputPassword4">City</label>
							<input type="text" class="form-control" name="city" placeholder="City">
						</div>
						<div class="form-group col-md-6">
							<label for="inputPassword4">Country</label>
							<input type="text" class="form-control" name="country" placeholder="Country">
						</div>
						<div class="form-group col-md-6">
							<label for="inputPassword4">Postal Code</label>
							<input type="text" class="form-control" name="postal_code" placeholder="Postal Code">
						</div>
						<div class="form-group col-md-6">
							<label for="inputPassword4">Address</label>
							<input type="text" class="form-control" name="address" placeholder="Address">
						</div>
						<div class="form-group col-md-6">
							<label for="inputPassword4">Custom Filed 1</label>
							<input type="text" class="form-control" name="custom1" placeholder="Custom Field">
						</div>
						<div class="form-group col-12">
							<input type="submit" class="btn btn-primary col-12" value="Save">
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

