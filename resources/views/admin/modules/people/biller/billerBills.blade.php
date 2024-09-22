@extends('admin.layouts.adminmaster')

@section('adminTitle')
Billers List - Admin Dashboard
@stop

@section('adminContent')

<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0">
		<p class="mb-1">
			<a href="{{ route('admin.dashboard') }}">
				<i class="fa fa-home"></i> Dashboard /
			</a>
			<a href="" class="active-slink">Biller's Bills</a>
			<span class="top-date">Total Bills : {{ $sales->total() }}</span>
		</p>
	</div>
</div>

<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height: 100%">
				<p class="btn mt-0 task-icon"><i class="fa fa-heart"></i></p>
			</div>
			<h2 class="blue task-label">Bills</h2>

		</div>

		<div class="box-content">
			<div class="row">
				<div class="col-lg-12">
					<p class="introtext mb-0">Please use the table below to navigate or filter the results. You can download the table as Excel and PDF.</p>
					<div class="row">
						<div class="col-5">
							<p class="pt-2 mb-0">Showing {{ $sales->count() }} of {{ $sales->total() }}</p>
						</div>
						<div class="col-7 mt-1">
							<label style="font-weight: normal;">Search by sale date</label>
							<input type="date" class="col-4 m-1 mx-0" id="searchKeydate">
							<input type="text" class="col-5 m-1 mx-0" id="searchKeycode" style="float: right;" placeholder="Search sales by code">
							<div id="search_list" class="col-5 px-0" style="position: absolute; margin-top: 0px; float: right; right: 15px; z-index: 1; background: white; box-shadow: 0 0 15px 1px cadetblue;"></div>
						</div>
					</div>

					<table class="table table-bordered table-hover">
						<thead class="bg_p_primary">
							<tr>
								<th class="font-weight-bold" scope="col">#</th>
								<th class="font-weight-bold" scope="col">Date</th>
								<th class="font-weight-bold" scope="col">Biller</th>
								<th class="font-weight-bold" scope="col">Customer</th>
								<th class="font-weight-bold" scope="col">Grand Total</th>
								<th class="font-weight-bold" scope="col">Paid</th>
								<th class="font-weight-bold" scope="col">Balance</th>
								<th class="font-weight-bold" scope="col">Payment Status</th>
								<th class="font-weight-bold" scope="col">Actions</th>
							</tr>
						</thead>
						<tbody id="table-content">
							<?php $counter = 0; ?>
							@foreach($sales as $sale)
							<?php $counter++; ?>
							<tr>
								<td>{{ $counter }}</td>
								<td>{{ $sale->sales_date }}</td>
								<td>{{ $sale->billerInfo['name'] }}</td>
								<td>{{ $sale->customerInfo['name'] }}</td>
								<td style="text-align: right;">{{ number_format($sale->grand_total) }}</td>
								<td style="text-align: right;">{{ number_format($sale->paid_amount) }}</td>
								<td style="text-align: right;">{{ number_format($sale->due) }}</td>
								<td style="text-align: center;">
									@if($sale->due == 0)
									<p class="badge bg_secondary_teal">Paid</p>
									@elseif($sale->due < 0)
									<p class="badge bg_secondary_teal">Change</p>
									@else
									<p class="badge bg_p_primary">Due</p>
									@endif
								</td>
								<td style="width: 120px;">
									<p class="btn bg_secondary_teal p-1 px-2 mb-0 viewSale" data-biller_name="{{ $sale->billerInfo['name'] }}" data-sales_id="{{ $sale->id }}" style="font-size: 13px; cursor: pointer;" title="Sales Details"><i class="fa-fw fa fa-eye"></i></p>
									
									<!-- Delete Confirmation Modal -->
									<div class="del-modal {{ 'modal' . $counter }}" style="right: 90px;">
										<p><b>Record delete confirmation.</b></p>
										<p>Are you sure you want to delete?</p>
										<button class="btn btn-info py-1 del-close" style="background-color: #808080a6; border-color: #808080a6;">Cancel</button>
										<form method="post" action="{{ route('admin.sales.deleteSale') }}" style="float: right;">
											@csrf
											<input type="hidden" name="id" value="{{ $sale->id }}">
											<button class="btn bg_p_primary py-1">Confirm</button>
										</form>
									</div>
									
									<script>
										$(document).ready(function() {
											$(".{{ 'btn' . $counter }}").click(function() {
												$(".{{ 'modal' . $counter }}").show('fadeOut');
											});
											$(".del-close").click(function() {
												$(".del-modal").hide('fadeIn');
											});
										});
									</script>
									
									<p class="btn bg_p_primary mb-0 p-1 px-2 del-btn {{ 'btn' . $counter }}" data-store_id="{{ $sale->id }}" style="font-size: 13px; cursor: pointer;" title="Delete Sale"><i class="fa fa-trash"></i></p>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<br>
					<div class="d-flex justify-content-center mt-3">
						{{ $sales->links() }} <!-- Pagination links styled consistently -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop
