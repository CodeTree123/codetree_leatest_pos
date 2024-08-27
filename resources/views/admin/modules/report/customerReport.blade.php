@extends('admin.layouts.adminmaster')
@section('adminTitle')
Customer report- Admin Dashboard
@endsection
@section('adminContent')
<style>
	.search_link {
		padding: 5px;
		border-bottom: 1px solid gray;
	}

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

	a:hover {
		text-decoration: none;
		color: white;
	}
</style>
<?php

use App\Http\Controllers\report\CustomerReportController;
?>
<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0">
		<p class="mb-1"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard / </a><a href="" class="active-slink">Customer Report</a><span class="top-date">Total Customers : {{$customers->total()}}</span></p>

	</div>
</div>

<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">
				<p class="btn mt-0 task-icon"><i class="fa fa-users"></i></p>
			</div>
			<h2 class="blue task-label">Customers Report</h2>
			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">
					<p class="task-btn text_p_primary" title="Actions">
						<i class="fa fa-th-list"></i>
					</p>
				</div>
			</div>
		</div>
		<div class="box-content">
			<div class="row">
				<div class="col-lg-12">
					<p class="introtext mb-0">Please use the table below to navigate or filter the results. You can download the table as excel and pdf.</p>
					<div class="row">
						<div class="col-8">
							<p class="pt-2 mb-0">Showing {{$customers->count()}} of {{$customers->total()}}</p>
						</div>
						<div class="col-4 mt-1">
							<input type="text" class="col-11 m-1 mx-0" id="customerSearchKey" style="float: right;" placeholder="Search customer by name or mobile ">
							<div id="customer_list" class="col-10 px-0" style="position: absolute; margin-top: 35px;float: right;right:20px;z-index: 1;background: white;box-shadow: 0 0 15px 1px #dee2e6;display: none;">

							</div>
						</div>
					</div>
					<table class="table table-bordered table-hover">
						<thead class="bg_p_primary">
							<tr>
								<th class="font-weight-bold" scope="col">#</th>
								<th class="font-weight-bold" scope="col">Image</th>
								<th class="font-weight-bold" scope="col">Name</th>
								<th class="font-weight-bold" scope="col">Company</th>
								<th class="font-weight-bold" scope="col">Phone</th>
								<th class="font-weight-bold" scope="col">Total Sale</th>
								<th class="font-weight-bold" scope="col">Total Amount</th>
								<th class="font-weight-bold" scope="col">Paid</th>
								<th class="font-weight-bold" scope="col">Start Balance</th>
								<th class="font-weight-bold" scope="col">Balance</th>
								<th class="font-weight-bold" scope="col">Actions</th>
							</tr>
						</thead>
						<tbody id="table-data">
							<?php $counter = 0; ?>
							@foreach($customers as $customer)
							<?php $counter++;
							$totalAmount = CustomerReportController::getTotalAmount($customer->id);
							$getTotalShopping = CustomerReportController::getTotalShopping($customer->id);
							$getTotalPaid = CustomerReportController::getTotalPaid($customer->id);
							$getStartBalance = CustomerReportController::getStartBalance($customer->id);
							$balance = $totalAmount - $getTotalPaid;
							$totalBalance = $balance + $getStartBalance;
							?>
							<tr>
								<td>{{$counter}}</td>
								<td>
									@if(!empty($customer->image))
									<img src="{{ asset($customer->image) }}" alt="{{ $customer->name }}" class="img-rounded" style="width:35px;height:35px;">
									@else
									<img src="{{ asset('admin/defaultIcon/no_image.png') }}" alt="No-image" class="img-rounded" style="width:35px;height:35px;">
									@endif
								</td>
								<td>{{$customer->name}}</td>
								<td>{{$customer->company}}</td>
								<td>{{$customer->mobile}}</td>
								<td style="text-align:right;">{{$getTotalShopping}}</td>
								<td style="text-align:right;">{{number_format($totalAmount,2)}}</td>
								<td style="text-align:right;">{{number_format($getTotalPaid,2)}}</td>
								<td style="text-align:right;">{{number_format($getStartBalance,2)}}</td>
								<td style="text-align:right;">{{number_format($totalBalance,2)}}</td>
								<td style="width:120px;">
									<div class="dropdown" style="width:90px;float:right;">
										<a href="{{route('admin.customer.customerDetails',$customer->id)}}" class="btn btn-danger p-2">
											Details
										</a>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<br>
					<div class="p-link">
						{{$customers->links()}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$("#customerSearchKey").on('keyup', function() {
			var key = $(this).val();

			if (key == '') {
				$("#customer_list").html('');
			} else {
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: "{{route('admin.report.searchCustomer')}}",
					type: "POST",
					data: {
						'key': key
					},
					//dataType:'json',
					success: function(data) {
						$("#table-data").html(data);
						$(".p-link").css('display', 'none');
					},
					error: function() {
						// toastr.error("Something went Wrong, Please Try again.");
					}
				});
			}
		});
	});
</script>
@endsection