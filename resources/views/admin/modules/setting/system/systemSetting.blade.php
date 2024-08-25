@extends('admin.layouts.adminmaster')
@section('adminTitle')
System Setting- Admin Dashboard
@endsection
@section('adminContent')
<style>
	hr{
		margin-top:0px;
	}
</style>

<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0" >
		<p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="" class="active-slink">System Setting</a><span class="top-date">{{date('l, jS F Y')}}</span></p>
	</div>
</div>

<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">
				<p class="btn mt-0 task-icon"><i class="fa-fw fa fa-cog"></i></p>
			</div>
			<h2 class="blue task-label">System Setting</h2>
			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">
					<p class="task-btn text_p_primary" title="Actions">
						<i class="fa fa-th-list"></i>
					</button>
				</div>
			</div>
		</div>
		<div class="box-content">
			<div class="row">
				<div class="col-lg-12">
					<p class="introtext">Please fill in the information below. The field labels marked with * are required input fields.</p>
					</div>
				<div class="col-sm-12 col-md-12 col-xs-12">
					<form action="{{route('admin.system.updateSystem')}}" method="post">
						@csrf
						<h2 class="task-label">Site Configuration</h2>
						<hr>
						<div class="form-row">
			        		<div class="form-group col-md-4">
					      	<label>Site Name *</label>
					      	<input type="text" class="form-control" name="siteName" value="{{$systemInfo->siteName}}">
					    </div>
					    <div class="form-group col-md-4">
					      	<label>Site Email *</label>
					      	<input type="text" class="form-control" name="siteEmail" value="{{$systemInfo->siteEmail}}">
					    </div>
					    <div class="form-group col-md-4">
					      	<label>Site Phone *</label>
					      	<input type="text" class="form-control" name="sitePhone" value="{{$systemInfo->sitePhone}}">
					    </div>
					    <div class="form-group col-md-4">
					      	<label>Site Mobile *</label>
					      	<input type="text" class="form-control" name="mobile" value="{{$systemInfo->mobile}}">
					    </div>
					    <div class="form-group col-md-4">
					      	<label>Site Moto *</label>
					      	<input type="text" class="form-control" name="moto" value="{{$systemInfo->moto}}">
					    </div>
					    <div class="form-group col-md-4">
					      	<label>Address *</label>
					      	<textarea name="address" class="form-control" rows="1">{{$systemInfo->address}}</textarea>
					    </div>
					  </div>
					  <h2 class="task-label">Prefix</h2>
						<hr>
					   <div class="form-row">
			        	    <div class="form-group col-md-4">
					      		<label>Unit Code *</label>
					      		<input type="text" class="form-control" name="unitCode" value="{{$systemInfo->unitCode}}">
					    	</div>
							<div class="form-group col-md-4">
								<label>Brand Code *</label>
								<input type="text" class="form-control" name="brandCode" value="{{$systemInfo->brandCode}}">
							</div>
							<div class="form-group col-md-4">
								<label for="inputPassword4">Category Code *</label>
								<input type="text" class="form-control" name="categoryCode" value="{{$systemInfo->categoryCode}}">
							</div>
					  </div>
					  <div class="form-row">
			        	  <div class="form-group col-md-4">
							<label>Expense Category *</label>
							<input type="text" class="form-control" name="expenseCategoryUnit" value="{{$systemInfo->expenseCategoryUnit}}">
					      </div>
					    <div class="form-group col-md-4">
					      	<label>Product Code *</label>
					      	<input type="text" class="form-control" name="productCode" value="{{$systemInfo->productCode}}">
					    </div>
					    <div class="form-group col-md-4">
					      	<label>Invoice Code *</label>
					      	<input type="text" class="form-control" name="invoiceCode" value="{{$systemInfo->invoiceCode}}">
					    </div>
					  </div>
					  <div class="form-row">
			        	  	<div class="form-group col-md-4">
					      	<label>Purchase Code *</label>
					      	<input type="text" class="form-control" name="purchaseCode" value="{{$systemInfo->purchaseCode}}">
					   </div>
					   <div class="form-group col-md-4">
							<label>Sub Category Code *</label>
							<input type="text" class="form-control" name="subCategoryCode" value="{{$systemInfo->subCategoryCode}}">
					   </div>
					   <div class="form-group col-md-4">
					      	<label>Store Code *</label>
					      	<input type="text" class="form-control" name="storeCode" value="{{$systemInfo->storeCode}}">
					    </div>
					  </div>

					  <div class="form-row">
			        	    <div class="form-group col-md-4">
					      		<input type="submit" class="btn bg_p_primary" value="Update System">
					  		</div>
					  </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

