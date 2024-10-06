@extends('admin.layouts.adminmaster')
@section('adminTitle')
Sales Report- Admin Dashboard
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
		<p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="" class="active-slink">Sales</a><span class="top-date">Total Sales:</span></p>

	</div>
</div>

<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">



				<p class="btn mt-0 task-icon"><i class="fa fa-heart"></i></p>

			</div>
			<h2 class="blue task-label">Sales Report</h2>

			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">
					<p class="task-btn text_p_primary" title="Print Report" onclick="printContent('salesReport')">
						<i class="fa fa-print"></i>
					</p>
				</div>
			</div>
		</div>
		<div class="box-content pt-0">
			<div class="row">

				<div class="col-12 mt-1 px-0 py-1" style="border-bottom: 1px solid #dee2e6">
					<label>Select date</label>
					<input type="date" value="{{ date('Y-m-d') }}" class="mx-0" id="salesDate">

					<label class="offset-5">Start date</label>
					<input type="date" value="{{ date('Y-m-d') }}" class="mx-0" id="startDate">
					<label>End date</label>
					<input type="date" value="{{ date('Y-m-d') }}" class="mx-0" id="endDate">
				</div>

				<div class="col-lg-12" id="reportArea">

					<div class="row">
						<div class="offset-md-4 col-4 p-3" id="salesReport">
							<center>
								<h2>Sales Report</h2>
								<p><b>Sales Date: {{date('Y-m-d')}}</b></p>

								<table class="table">
									<tr>
										<td class="px-2">Total Sale</td>
										<td style="text-align: right;"><b>{{number_format($totalSale,2)}}</b></td>
									</tr>
									<tr>
										<td class="px-2">Total Discount</td>
										<td style="text-align: right;"><b>{{number_format($totalDiscount,2)}}</b></td>
									</tr>
									<tr>
										<td class="px-2">Total payemnt</td>
										<td style="text-align: right;"><b>{{number_format($paid_amount,2)}}</b></td>
									</tr>
									<tr>
										<td class="px-2">Total Due</td>
										<td style="text-align: right;"><b>{{number_format($due,2)}}</b></td>
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
								<th class="font-weight-bold" scope="col">Code</th>
								<th class="font-weight-bold" scope="col">Biller</th>
								<th class="font-weight-bold" scope="col">Customer</th>

								<th class="font-weight-bold" scope="col">Grand Total</th>
								<th class="font-weight-bold" scope="col">Paid</th>
								<th class="font-weight-bold" scope="col">Balance</th>
								<th class="font-weight-bold" scope="col">Payment Status</th>
							</tr>
						</thead>
						<tbody id="table-content">
							<?php $counter = 0; ?>
							@foreach($sales as $sale)
							<?php $counter++; ?>
							<tr>
								<td>{{$counter}}</td>
								<td>{{$sale->sales_date}}</td>
								<td>{{$sale->code}}</td>
								<td>{{$sale->billerInfo['name']}}</td>
								<td>{{$sale->customerInfo['name']}}</td>
								<td style="text-align: right;">{{number_format($sale->grand_total,2)}}</td>

								<td style="text-align: right;">{{number_format($sale->paid_amount,2)}}</td>
								<td style="text-align: right;">{{number_format($sale->due,2)}}</td>

								<td style="text-align: center;">
									@if($sale->due==0)
									<p>Paid</p>
									@else
									<p>Due</p>
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
<div class="modal fade  saleInfoModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content p-3 modal-data">

		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$("#salesDate").on('change', function() {
			var saleDate = $(this).val();

			//ajax
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "{{route('admin.report.sateWiseSalesReport')}}",
				type: "POST",
				data: {
					'saleDate': saleDate
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
					url: "{{route('admin.report.salesBetweenTwoDate')}}",
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