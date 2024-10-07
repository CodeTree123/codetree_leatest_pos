@extends('admin.layouts.adminmaster')
@section('adminTitle')
Purchase List- Admin Dashboard
@stop
@section('adminContent')
<style>
	input[type=text]:focus {
		border-color: inherit;
		-webkit-box-shadow: none;
		box-shadow: none;
		height: 28px;
		font-size: inherit;
		border-color: rgba(229, 103, 23, 0.8);
		outline-color: gray;
		font-size: 15px;
		text-transform: none;
	}
</style>
<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0">
		<p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="" class="active-slink">Purchases</a> <span class="top-date">Total Purchase: {{$purchaseLists->count()}}</span></p>

	</div>
</div>


<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">



				<p class="btn mt-0 task-icon"><i class="fa fa-star"></i></p>

			</div>
			<h2 class="blue task-label">Purchases</h2>

			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">



					<p class="task-btn text_p_primary text_p_primary" title="Actions">
						<i class="fa fa-th-list"></i>
					</p>
					<div class="task-menu p-2">
						<a class="dropdown-item pl-0" href="{{route('admin.purchaseAdd')}}">
							<i class="fa-fw fa fa-plus-circle"></i> Add Purchase
						</a>

					</div>

				</div>
			</div>
		</div>
		<div class="box-content">
			<div class="row">
				<div class="col-lg-12">
					<p class="introtext mb-0">Please use the table below to navigate or filter the results. You can download the table as excel and pdf.</p>
					<div class="row">
						<div class="col-5">
							<p class="pt-2 mb-0">Showing {{$purchaseLists->count()}} of {{$purchaseLists->total()}}</p>
						</div>
						<div class="col-7 mt-1">
							<label style="font-weight: normal;">Search by purchase date</label>
							<input type="date" value="{{ date('Y-m-d') }}" class="col-3 m-1 mx-0" id="searchKeydate">

							<input type="text" class="col-5 m-1 mx-0" id="searchKeycode" style="float: right;" placeholder="Search purchase by code ">
							<div id="search_list" class="col-4 px-0" style="position: absolute; margin-top: 0px;float: right;right:15px;z-index: 1;background: white;box-shadow: 0 0 15px 1px cadetblue;">

							</div>
						</div>
					</div>
					<table class="table table-bordered table-hover">
						<thead class="bg_p_primary">
							<tr>
								<th class="font-weight-bold" scope="col">#</th>
								<th class="font-weight-bold" scope="col">Date</th>
								<th class="font-weight-bold" scope="col">Reference No</th>
								<th class="font-weight-bold" scope="col">Supplier</th>
								<th class="font-weight-bold" scope="col">Purchase Status</th>
								<th class="font-weight-bold" scope="col">Total Products Price</th>
								<th class="font-weight-bold" scope="col">Paid</th>
								<th class="font-weight-bold" scope="col">Discount</th>
								<th class="font-weight-bold" scope="col">Due Balance</th>
								<th class="font-weight-bold" scope="col">Payment Status</th>

								<th class="font-weight-bold" scope="col">Actions</th>

							</tr>
						</thead>
						<tbody id="data-table">
							<?php $counter = 0; ?>
							@foreach($purchaseLists as $purchase)
							<?php $counter++; ?>
							<tr>
								<td>{{$counter}}</td>
								<td>{{$purchase->purchase_date}}</td>
								<td>{{$purchase->reference}}</td>
								<td>{{$purchase->supplier['name']}}</td>
								<td style="text-align: center;">
									@if($purchase->is_received==1)
									<p class="badge  bg_secondary_teal">Received</p>
									@elseif($purchase->is_received==2)
									<p class="badge badge-danger">Partially received</p>
									@else
									<p class="badge badge-danger">Pending</p>
									@endif
								</td>
								<td style="text-align: right;">{{number_format($purchase->grand_total)}}</td>

								<td style="text-align: right;">{{number_format($purchase->paid_amount)}}</td>
								<td style="text-align: right;">{{number_format($purchase->discount)}}</td>
								<td style="text-align: right;">

									{{number_format($purchase->due)}}
								</td>

								<td style="text-align: center;">
									@if($purchase->due >0)
									<p class="badge badge-danger">Due</p>
									@else
									<p class="badge  bg_secondary_teal">Paid</p>
									@endif
								</td>
								<td style="width:120px;">
									<p class="btn  bg_secondary_teal p-1 px-2 mb-0 purchaseDetails" data-purchase_id="{{$purchase->id}}" style="font-size: 13px;cursor:pointer;" title="Purchase Details"> <i class="fa-fw fa fa-eye"></i></p>

									<p class="btn bg_secondary_teal p-1 px-2 mb-0 editPurchase" data-purchase_id="{{$purchase->id}}" style="font-size: 13px; cursor: pointer;" title="Edit Purchase">
										<i class="fa-fw fa fa-edit"></i> <!-- Edit icon -->
									</p>

									<div class="del-modal <?php echo 'modal' . $counter ?>" style="right: 90px;">
										<p><b>Record delete confirmation.</b></p>
										<p>Are you want to really delete ?</p>

										<button class="btn btn-info py-1 del-close" style="background-color: #808080a6;border-color: #808080a6;">Cancel</button>
										<form method="post" action="{{route('admin.purchase.purchaseDelete')}}" style="float:right;">
											@csrf
											<input type="hidden" name="id" value="{{$purchase->id}}">
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
									<p class="btn bg_p_primary mb-0 p-1 px-2 del-btn <?php echo 'btn' . $counter ?>" data-store_id="{{$purchase->id}}" style="font-size: 13px;relative;cursor:pointer;" title="Delete Purchase"> <i class="fa fa-trash"></i></p>
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
<div class="modal fade purchase_details" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content p-3 modal-data">

		</div>
	</div>
</div>


<!-- Modal for Edit Purchase -->
<!-- Modal for Edit Purchase -->
<div class="modal fade edit_purchase_modal" tabindex="-1" role="dialog" aria-labelledby="editPurchaseModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content p-3 modal-data">
			<h5>Edit Purchase</h5>
			<form method="post" action="{{route('admin.purchase.updatePurchase')}}" enctype="multipart/form-data">
				@csrf
				@method('PUT')

				<input type="hidden" name="purchase_id" id="editPurchaseId">
				<div class="form-group">
					<label for="newlyPaidAmount">Newly Paid Amount</label>
					<input type="number" class="form-control" id="newlyPaidAmount" name="newly_paid_amount" placeholder="Enter Newly Paid Amount" required>
				</div>
				<!-- Add other fields as necessary -->
				<button type="submit" class="btn btn-primary">Save Changes</button>
			</form>
		</div>
	</div>
</div>


<script>
	$(document).ready(function() {
		$(".purchaseDetails").click(function() {
			var purchase_id = $(this).data('purchase_id');
			//ajax
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "{{route('admin.purchase.purchaseDetails')}}",
				type: "POST",
				data: {
					'purchase_id': purchase_id
				},
				//dataType:'json',
				success: function(data) {
					$(".modal-data").html(data);
					$('.purchase_details').modal('show');
				},
				error: function() {
					toastr.error("Something went Wrong, Please Try again.");
				}
			});

			//end ajax
		});

		$(".editPurchase").click(function() {
			var purchase_id = $(this).data('purchase_id');

			// AJAX call to fetch the purchase details
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "{{route('admin.purchase.purchaseDetails')}}", // Adjust to your route for fetching edit data
				type: "POST",
				data: {
					'purchase_id': purchase_id
				},
				success: function(data) {
					console.log(data);
					// Assuming `data` contains purchase details
					$("#editPurchaseId").val(purchase_id);

					// Show the edit modal
					$('.edit_purchase_modal').modal('show');
				},
				error: function() {
					toastr.error("Something went wrong, please try again.");
				}
			});
		});




		//search purchase by code
		$("#searchKeycode").on('keyup', function() {
			var key = $(this).val();
			//ajax
			if (key == '') {
				$("#search_list").html('');
			} else {
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: "{{route('admin.purchase.searchPurchase')}}",
					type: "POST",
					data: {
						'key': key
					},
					//dataType:'json',
					success: function(data) {
						$("#data-table").html(data);
					},
					error: function() {
						// toastr.error("Something went Wrong, Please Try again.");
					}
				});

				//end ajax
			}
		});

		//search purchase by date
		$("#searchKeydate").on('change', function() {
			var key = $(this).val();
			//ajax
			if (key == '') {
				$("#data-table").html('');
			} else {
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: "{{route('admin.purchase.searchPurchasedate')}}",
					type: "POST",
					data: {
						'key': key
					},
					//dataType:'json',
					success: function(data) {
						$("#data-table").html(data);
					},
					error: function() {
						// toastr.error("Something went Wrong, Please Try again.");
					}
				});

				//end ajax
			}

		});
	});
</script>
@stop