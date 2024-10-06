@extends('admin.layouts.adminmaster')
@section('adminTitle')
Add Purchase- Admin Dashboard
@stop
@section('adminContent')
<style>
	label {
		font-weight: bold;
	}
</style>
<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0">
		<p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="{{route('admin.expenseList')}}">Expenses / </a><a class="active-slink">Add Expense</a><span class="top-date">{{date('l, jS F Y')}}</span></p>

	</div>
</div>

<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">



				<p class="btn mt-0 task-icon"><i class="fa fa-dollar-sign"></i></p>

			</div>
			<h2 class="blue task-label">Add Expense</h2>

			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">



					<p class="task-btn text_p_primary" title="Actions">
						<i class="fa fa-th-list"></i>
					</p>
					<div class="task-menu p-2">
						<a class="dropdown-item pl-0" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
							<i class="fa-fw fa fa-list"></i>Expense List
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
					<form method="post" action="{{route('admin.expense.expenseSave')}}" entype="multipart/form-data">
						@csrf
						<div class="form-row">
							<div class="form-group col-md-4">
								<label>Date *</label>
								<input type="date" value="{{ date('Y-m-d') }}" class="form-control" placeholder="Date" name="eDate" value="{{ date('Y-m-d') }}"> <!-- Set today's date -->

							</div>
							<div class=" form-group col-md-4">
								<label>Reference</label>
								<input type="Text" class="form-control" name="reference" placeholder="Reference">
							</div>
							<div class="form-group col-md-4" name="store_id">
								<label>Store</label>
								<select class="custom-select">
									@foreach($stores as $store)
									<option value="{{$store->id}}">{{$store->name}}</option>
									@endforeach
								</select>
							</div>

							<div class="form-group col-md-4">
								<label>Category *</label>
								<select class="custom-select" name="category">

									@foreach($expenseLists as $catlist)
									<option value="{{$catlist->id}}">{{$catlist->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-md-4">
								<label>Amount *</label>
								<input type="number" class="form-control" name="cost" placeholder="Amount">
							</div>
							<div class="form-group col-md-4">
								<label>Attatchment</label>
								<input type="file" class="form-control-file" name="documents">
							</div>


							<div class="form-group col-md-12 mt-3">
								<label>Note</label>
								<textarea class="form-control" name="note" rows="3"></textarea>
							</div>

							<div class="form-group">
								<button type="submit" class="btn bg_p_primary">Add Expense</button>
							</div>
						</div>
					</form>

				</div>


			</div>
		</div>
	</div>

</div>

@stop