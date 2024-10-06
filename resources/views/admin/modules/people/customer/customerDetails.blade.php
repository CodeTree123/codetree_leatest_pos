@extends('admin.layouts.adminmaster')
@section('adminTitle')
{{$customerInfo->name}}-Dashboard
@stop
@section('adminContent')
<style>
	p {
		margin-bottom: 0px;

	}

	.upper-action-btn {
		margin-top: -8px;
		margin-left: 30px;
		border-radius: 0px;
		padding: 2px 20px;
		cursor: pointer;
	}
</style>
<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0">
		<p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="{{route('admin.customerList')}}">Customers /</a><a class="active-slink">Customer Details</a><span class="top-date">{{date('l, jS F Y')}}</span></p>
	</div>
</div>

<div class="container-fluid p-3">
	<div class="row p-1">
		<div class="col-2">
			<center>
				@if(!empty($customerInfo->image))
				<img src="{{ asset($customerInfo->image) }}" alt="{{ $customerInfo->name }}" class="img-rounded" style="width:100px;height:100px;">
				@else
				<img src="{{ asset('admin/defaultIcon/user.png') }}" alt="No-image" class="img-rounded" style="width:100px;height:100px;">
				@endif
			</center>
		</div>
		<div class="col-4 col-xs-12">
			<h3 style="float: left;margin-bottom: 0px;font-weight: bold;">Basic Information</h3>
			<p class="btn btn-info edit-info upper-action-btn" data-customerId="{{$customerInfo->id}}">Edit</p>
			<hr class="mt-0">
			<p>Name: {{$customerInfo->name}}</p>
			<p>Mobile: {{$customerInfo->mobile}}</p>
			<p>Email: {{$customerInfo->email}}</p>
			<p>Company: {{$customerInfo->company}}</p>
			<p>Address: {{$customerInfo->address}}</p>
		</div>
		<div class="col-6 col-xs-12">
			<h3 style="float: left;margin-bottom: 0px;font-weight: bold;">Shopping Information</h3>
			<!-- <p class="btn btn-info upper-action-btn">Deposit</p>
			<p class="btn btn-info upper-action-btn">Add Deposit</p> -->
			@if($currentDue>0)
			<p class="btn btn-info upper-action-btn dueReturnBtn">Add Payment</p>
			@endif
			<p class="btn btn-info upper-action-btn payHisBtn">Payment History</p>
			<hr class="mt-0">
			<div class="col-8">
				<p>Starting Balance: ৳{{number_format($customerInfo->start_balance)}}</p>
				<p>Total Buy: ৳{{number_format($totalShopping)}}</p>
				<p>Total Due: ৳{{number_format($totalDue)}}</p>
				<p>Due Return: ৳{{number_format($totalDueReturn)}}</p>
				@if($currentDue<=0)
					<p class="badge  bg_secondary_teal">Current Due: ৳{{number_format($currentDue,2)}}</p>
					@else
					<p class="badge badge-danger">Current Due: ৳{{number_format($currentDue,2)}}</p>
					@endif
					<!-- <p>Deposit: </p> -->
			</div>
		</div>
		<div class="col-12 mt-3">
			<h3 class="mb-0"><b>Shopping History</b></h3>
			<hr class="mt-0">
			<table class="table table-bordered table-hover">
				<thead class="bg_p_primary">
					<tr>
						<th class="font-weight-bold" scope="col">#</th>
						<th class="font-weight-bold" scope="col">Date</th>
						<th class="font-weight-bold" scope="col">Biller</th>
						<th class="font-weight-bold" scope="col">Grand Total</th>
						<th class="font-weight-bold" scope="col">Paid</th>
						<th class="font-weight-bold" scope="col">Balance</th>
						<th class="font-weight-bold" scope="col">Payment Status</th>
						<th class="font-weight-bold" scope="col">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $counter = 0; ?>
					@foreach($shoppingHistory as $sale)
					<?php $counter++; ?>
					<tr>
						<td>{{$counter}}</td>
						<td>{{$sale->sales_date}}</td>
						<td>{{$sale->name}}</td>
						<td style="text-align: right;">{{number_format($sale->grand_total)}}</td>
						<td style="text-align: right;">{{number_format($sale->paid_amount+$sale->due_return)}}</td>
						<td style="text-align: right;">{{number_format($sale->due-$sale->due_return)}}</td>
						<td style="text-align:center;">
							@if(($sale->due-$sale->due_return)<=0)
								<p class="badge  bg_secondary_teal">Paid</p>
								@else
								<p class="badge badge-danger">Due</p>
								@endif
						</td>
						<td style="width:120px;">
							<div class="dropdown" style="width:90px;float:right;">
								<p class="btn btn-danger sale_details" data-salesid="{{$sale->id}}">
									Details
								</p>
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="d-flex justify-content-right my-4">
				{{ $shoppingHistory->links() }}
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade saleInfoModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content p-3 saleContent">

		</div>
	</div>
</div>
<!--return due madal-->
<div class="modal fade returnDuteModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content p-3">
			<div class="modal-header">
				<h2 class="modal-title" id="exampleModalLabel">Return due</h2>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
			<div class="modal-body">
				<form method="post" action="{{route('admin.customerdue.returnSalesDue')}}">
					@csrf
					<input type="hidden" name="customer_id" value="{{$customerInfo->id}}">
					<div class="form-row">
						<div class="form-group col-12">
							<label>Paid Date</label>
							<input type="date" value="{{ date('Y-m-d') }}" class="form-control" name="paid_date">
							<input type="hidden" name="customer_id" value="{{$customerInfo->id}}">
						</div>
						<div class="form-group col-12">
							<label>Current Due</label>
							<input type="text" class="form-control" name="current_due" value="{{$currentDue}}" readonly="">
							<input type="hidden" name="customer_id" value="{{$customerInfo->id}}">
						</div>
						<div class="form-group col-md-12">
							<label>Payment Method</label>
							<select class="custom-select" name="payment_method">
								<option value="cash">Cash</option>
							</select>
						</div>
						<div class="form-group col-md-12">
							<label>Amount</label>
							<input type="number" class="form-control" name="amount" placeholder="Paid Cash">
						</div>
						<div class="form-group col-md-12">
							<label>Payment Note</label>
							<textarea class="form-control" rows="3" name="paymentNote"></textarea>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<input type="submit" class="btn btn-primary" value="Return Due">
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<!--Paymrnt history model-->
<div class="modal fade payHisModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content p-3">
			<div class="modal-header">
				<h2 class="modal-title" id="exampleModalLabel">Payment History</h2>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
			<div class="modal-body">
				<table class="table table-bordered table-hover">
					<thead class="bg_p_primary">
						<tr>
							<th class="font-weight-bold" scope="col">#</th>
							<th class="font-weight-bold" scope="col">Date</th>
							<th class="font-weight-bold" scope="col">Amount</th>
							<th class="font-weight-bold" scope="col">Balance Before Pay</th>
							<th class="font-weight-bold" scope="col">Balance After Pay</th>
							<th class="font-weight-bold" scope="col">Payment Note</th>
						</tr>
					</thead>
					<tbody>
						<?php $counter = 0; ?>
						@foreach($duePaymentHistory as $payhis)
						<?php $counter++; ?>
						<tr>
							<td>{{$counter}}</td>
							<td>{{$payhis->paid_date}}</td>
							<td style="text-align: right;">{{number_format($payhis->paid_amount,2)}}</td>
							<td style="text-align: right;">{{number_format($payhis->current_due,2)}}</td>
							<td style="text-align: right;">{{number_format($payhis->balance,2)}}</td>
							<td>{{$payhis->payment_note}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="modal-footer">


			</div>
		</div>
	</div>
</div>
</div>
<script>
	$(document).ready(function() {
		$(".sale_details").click(function() {
			var shoppingid = $(this).data('salesid');

			//ajax
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "{{route('admin.sales.salesDetails')}}",
				type: "POST",
				data: {
					'saleId': shoppingid
				},
				//dataType:'json',
				success: function(data) {
					$(".saleContent").html(data);
					$('.saleInfoModal').modal('show');
				},
				error: function() {
					toastr.error("Something went Wrong, Please Try again.");
				}
			});

			//end ajax
		});
		//edit customer id
		$(".edit-info").click(function() {
			var customerId = $(this).data('customerid');
			//ajax
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "{{route('admin.customer.customerInfo')}}",
				type: "POST",
				data: {
					'customerId': customerId
				},
				//dataType:'json',
				success: function(data) {
					$(".saleContent").html(data);
					$('.saleInfoModal').modal('show');
				},
				error: function() {
					toastr.error("Something went Wrong, Please Try again.");
				}
			});

			//end ajax
		});
		//due redurn 
		$(".dueReturnBtn").click(function() {
			$(".returnDuteModal").modal('show');
		});
		//payHisBtn
		$(".payHisBtn").click(function() {
			$(".payHisModal").modal('show');
		});

	});
</script>
@stop