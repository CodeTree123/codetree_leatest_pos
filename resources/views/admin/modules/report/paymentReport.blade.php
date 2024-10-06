@extends('admin.layouts.adminmaster')
@section('adminTitle')
Payment Report- Admin Dashboard
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

	p {
		margin-bottom: 0px;
	}
</style>
<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0">
		<p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="" class="active-slink">Payments</a> <span class="top-date"></span></p>

	</div>
</div>


<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">



				<p class="btn mt-0 task-icon"><i class="fa fa-star"></i></p>

			</div>
			<h2 class="blue task-label">Payment Report</h2>

			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">
					<p class="task-btn text_p_primary" title="Print Report" onclick="printContent('paymentReport')">
						<i class="fa fa-print"></i>
					</p>
				</div>
			</div>
		</div>
		<div class="box-content pt-0">
			<div class="row">
				<div class="col-lg-12">
					<div class="col-12 mt-1 px-0 py-1" style="border-bottom: 1px solid #dee2e6">
						<label>Select date</label>
						<input type="date" value="{{ date('Y-m-d') }}" class="mx-0" id="purchaseDate">

						<label class="offset-4">Start date</label>
						<input type="date" value="{{ date('Y-m-d') }}" class="mx-0" id="startDate">
						<label class="ml-5">End date</label>
						<input type="date" value="{{ date('Y-m-d') }}" class="mx-0" id="endDate">
					</div>

				</div>
				<div class="col-lg-12" id="reportArea">

					<div class="row">
						<div class="offset-md-4 col-4 p-3" id="paymentReport">
							<center>
								<h2>Payment Report</h2>

								<table class="table">
									<tr>
										<td class="px-2">Total Paid</td>
										<td style="text-align: right;"><b>
												{{number_format($totalPaid,2)}}
											</b></td>
									</tr>
									<tr>
										<td class="px-2">Total Received</td>
										<td style="text-align: right;"><b>

												{{number_format($totalReceived,2)}}
											</b></td>
									</tr>

								</table>
							</center>

						</div>
					</div>
					<table class="table table-bordered table-hover">
						<thead class="bg_p_primary">
							<tr>
								<th class="font-weight-bold" scope="col">#</th>
								<th class="font-weight-bold" scope="col">Date</th>
								<th class="font-weight-bold" scope="col">Payment Reference</th>
								<th class="font-weight-bold" scope="col">Sale Reference</th>
								<th class="font-weight-bold" scope="col">Purchase Reference</th>
								<th class="font-weight-bold" scope="col">Paid By</th>
								<th class="font-weight-bold" scope="col">Amount</th>
								<th class="font-weight-bold" scope="col">Type</th>




							</tr>
						</thead>
						<tbody id="data-table">
							<?php $counter = 0; ?>
							@foreach($payments as $payment)
							<?php $counter++; ?>
							<tr>
								<td>{{$counter}}</td>
								<td>{{$payment->pDate}}</td>
								<td>{{$payment->reference}}</td>
								<td>{{$payment->salereference}}</td>
								<td>{{$payment->purchasereference}}</td>
								<td>{{$payment->paidBy}}</td>
								<td style="text-align: right;">{{number_format($payment->amount,2)}}</td>
								<td style="text-align: center;">
									@if($payment->type=='Received')
									<p class="badge  bg_secondary_teal">Received</p>
									@else
									<p class="badge bg_p_primary">Paid</p>
									@endif
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
<script>
	$(document).ready(function() {
		$("#purchaseDate").on('change', function() {
			var paymentDate = $(this).val();

			//ajax
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "{{route('admin.report.dateWisePaymentReport')}}",
				type: "POST",
				data: {
					'paymentDate': paymentDate
				},
				//dataType:'json',
				success: function(data) {

					$("#reportArea").html(data);
				},
				error: function() {
					toastr.error("Something went Wrong, Please Try again.");
				}
			});

			//end ajax

		});


		$("#endDate").on('change', function() {
			var endDate = $(this).val();
			var startDate = $("#startDate").val();
			if (startDate == '') {
				toastr.error('Select Start date');
			} else {
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: "{{route('admin.report.paymentBetweenTwoDate')}}",
					type: "POST",
					data: {
						'endDate': endDate,
						'startDate': startDate
					},
					//dataType:'json',
					success: function(data) {
						$("#reportArea").html(data);
					},
					error: function() {
						toastr.error("Something went Wrong, Please Try again.");
					}
				});
			}
		});

	});
</script>
@stop