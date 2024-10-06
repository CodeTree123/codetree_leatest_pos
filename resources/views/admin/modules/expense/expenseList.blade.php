@extends('admin.layouts.adminmaster')
@section('adminTitle')
Expense List- Admin Dashboard
@stop
@section('adminContent')
<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0">
		<p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="" class="active-slink">Expenses</a><span class="top-date">{{date('l, jS F Y')}}</span></p>

	</div>
</div>


<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">
				<p class="btn mt-0 task-icon"><i class="fa fa-dollar-sign"></i></p>
			</div>
			<h2 class="blue task-label">Expense</h2>

			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">



					<p class="task-btn text_p_primary" title="Actions">
						<i class="fa fa-th-list"></i>
						</button>
					<div class="task-menu p-2">
						<a class="dropdown-item pl-0" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
							<i class="fa-fw fa fa-plus-circle"></i> Add Expense
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
								<th class="font-weight-bold" scope="col">Reference No</th>
								<th class="font-weight-bold" scope="col">Category</th>
								<th class="font-weight-bold" scope="col">Amount</th>
								<th class="font-weight-bold" scope="col">Note</th>
								<th class="font-weight-bold" scope="col">Date</th>
								<th class="font-weight-bold" scope="col">Added By</th>
								<th class="font-weight-bold" scope="col">Actions</th>

							</tr>
						</thead>
						<tbody>
							<?php $counter = 0; ?>
							@foreach($expenses as $expense)
							<?php $counter++; ?>
							<tr>
								<td>{{$counter}}</td>
								<td>{{$expense->reference}}</td>
								<td>{{$expense->categoryInfo['name']}}</td>
								<td>{{number_format($expense->cost)}}</td>
								<td>{{$expense->note}}</td>
								<td>{{$expense->eDate}}</td>
								<td>{{$expense->adminInfo['first_name']}}</td>
								<td style="width:120px;">

									<p class="btn bg_p_primary p-1 mb-0 px-2 edit-btn" data-id="{{$expense->id}}" style="font-size: 13px;cursor:pointer;" title="Edit Expense"> <i class="fa fa-edit"></i></p>

									<div class="del-modal <?php echo 'modal' . $counter ?>" style="right: 93px;">
										<p><b>Record delete confirmation.</b></p>
										<p>Are you want to really delete ?</p>

										<button class="btn btn-info py-1 del-close" style="background-color: #808080a6;border-color: #808080a6;">Cancel</button>
										<form method="post" action="{{route('admin.expense.expenseDelete')}}" style="float:right;">
											@csrf
											<input type="hidden" name="id" value="{{$expense->id}}">
											<button class="btn btn-danger py-1">Confirm</button>
										</form>
									</div>
									<script>
										$(document).ready(function() {
											$(".<?php echo 'btn' . $counter ?>").click(function() {
												$(".<?php echo 'modal' . $counter ?>").show('fadeOut');

											});
											$(".del-close").click(function() {
												$(".del-modal").hide('fadeIn');

											});
										});
									</script>
									<p class="btn bg_secondary_teal mb-0 p-1 px-2 del-btn <?php echo 'btn' . $counter ?>" style="font-size: 13px;relative;cursor:pointer;" title="Delete Expense"> <i class="fa fa-trash"></i></p>
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
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content p-3">
			<div class="modal-header">
				<h2 class="modal-title" id="exampleModalLabel">Add Expense</h2>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
			<div class="modal-body">

				<form method="post" action="{{route('admin.expense.expenseSave')}}" entype="multipart/form-data">
					@csrf
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Date *</label>
							<input type="date" value="{{ date('Y-m-d') }}" class="form-control" placeholder="Date" name="eDate">
						</div>
						<div class="form-group col-md-6">
							<label>Reference</label>
							<input type="Text" class="form-control" name="reference" placeholder="Reference">
						</div>
						<div class="form-group col-md-6" name="store_id">
							<label>Store</label>
							<select class="custom-select">
								@foreach($stores as $store)
								<option value="{{$store->id}}">{{$store->name}}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group col-md-6">
							<label>Category *</label>
							<select class="custom-select" name="category">
								<option selected>Select Expense Category</option>
								@foreach($expenseCats as $catlist)
								<option value="{{$catlist->id}}">{{$catlist->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-md-6">
							<label>Amount *</label>
							<input type="Text" class="form-control" name="cost" placeholder="Amount">
						</div>
						<div class="form-group col-md-6">
							<label>Attatchment</label>
							<input type="file" class="form-control-file" name="documents">
						</div>


						<div class="form-group col-md-12 mt-3">
							<label>Note</label>
							<textarea class="form-control" name="note" rows="3"></textarea>
						</div>


					</div>
			</div>
			<div class="modal-footer">


				<button type="submit" class="btn btn-primary">Add Expense</button>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade expense_details" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content p-3 modal-data">

		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$(".edit-btn").click(function() {
			var id = $(this).data('id');
			//ajax
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "{{route('admin.expense.editExpense')}}",
				type: "POST",
				data: {
					'id': id
				},
				//dataType:'json',
				success: function(data) {
					$(".modal-data").html(data);
					$('.expense_details').modal('show');
				},
				error: function() {
					toastr.error("Something went Wrong, Please Try again.");
				}
			});

			//end ajax
		});


		//search purchase by date
		//       $("#searchKeydate").on('change',function(){
		//       	var key=$(this).val();
		//      	//ajax
		//      	if(key==''){
		//      		$("#data-table").html('');
		//      	}else{
		//      		$.ajax({
		//      			headers: {
		//      				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		//      			},
		//      			url:"{{route('admin.purchase.searchPurchasedate')}}",
		//      			type:"POST",
		//      			data:{'key':key},
		// 	        //dataType:'json',
		// 	        success:function(data){
		// 	        	$("#data-table").html(data);
		// 	        },
		// 	        error:function(){
		// 	         // toastr.error("Something went Wrong, Please Try again.");
		// 	     }
		// 	 });

		// 	  //end ajax
		// 	}

		// });
	});
</script>
@stop