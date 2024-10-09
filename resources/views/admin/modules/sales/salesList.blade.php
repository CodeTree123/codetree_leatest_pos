@extends('admin.layouts.adminmaster')
@section('adminTitle')
Sales List- Admin Dashboard
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
		<p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="" class="active-slink">Sales</a><span class="top-date">Total Sales: {{$sales->total()}}</span></p>

	</div>
</div>

<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">



				<p class="btn mt-0 task-icon"><i class="fa fa-heart"></i></p>

			</div>
			<h2 class="blue task-label">Sales</h2>

			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">



					<p class="task-btn text_p_primary text_p_primary" title="Actions">
						<i class="fa fa-th-list"></i>
					</p>
					<div class="task-menu p-2">
						<a href="{{route('admin.salesAdd')}}" class="dropdown-item pl-0" type="button">
							<i class="fa-fw fa fa-plus-circle"></i> Add Sale
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
							<p class="pt-2 mb-0">Showing {{$sales->count()}} of {{$sales->total()}}</p>
						</div>
						<div class="col-7 mt-1">
							<label style="font-weight: normal;">Search by sale date</label>
							<input type="date" value="{{ date('Y-m-d') }}" class="col-4 m-1 mx-0" id="searchKeydate">

							<input type="text" class="col-5 m-1 mx-0" id="searchKeycode" style="float: right;" placeholder="Search sales by code ">
							<div id="search_list" class="col-5 px-0" style="position: absolute; margin-top: 0px;float: right;right:15px;z-index: 1;background: white;box-shadow: 0 0 15px 1px cadetblue;">

							</div>
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
								<th class="font-weight-bold" scope="col">Due Balance</th>
								<th class="font-weight-bold" scope="col">Payment Status</th>

								<th class="font-weight-bold" scope="col">Actions</th>
								<th class="font-weight-bold" scope="col">Print</th>

							</tr>
						</thead>
						<tbody id="table-content">
							<?php $counter = 0; ?>
							@foreach($sales as $sale)
							<?php $counter++; ?>
							<tr>
								<td>{{$counter}}</td>
								<td>{{$sale->sales_date}}</td>
								<td>{{ @$sale->billerInfo['name'] }}</td>
								<td>{{@$sale->customerInfo['name']}}</td>
								<td style="text-align: right;">{{number_format($sale->grand_total)}}</td>

								<td style="text-align: right;">{{number_format($sale->paid_amount)}}</td>
								<td style="text-align: right;">{{number_format($sale->due)}}</td>

								<td style="text-align: center;">
									@if($sale->due==0)
									<p class="badge bg_secondary_teal">Paid</p>
									@elseif($sale->due < 0)
										<p class="badge bg_secondary_teal">Change</p>
										@else
										<p class="badge bg_p_primary">Due</p>
										@endif

								</td>
								<td style="width:120px;">
									<p class="btn bg_secondary_teal p-1 px-2 mb-0 viewSale" data-biller_name="{{@$sale->billerInfo['name']}}" data-sales_id="{{$sale->id}}" style="font-size: 13px;cursor:pointer;" title="Sales Details"> <i class="fa-fw fa fa-eye"></i></p>

									<div class="del-modal <?php echo 'modal' . $counter ?>" style="right: 90px;">
										<p><b>Record delete confirmation.</b></p>
										<p>Are you want to really delete ?</p>

										<button class="btn btn-info py-1 del-close" style="background-color: #808080a6;border-color: #808080a6;">Cancel</button>
										<form method="post" action="{{route('admin.sales.deleteSale')}}" style="float:right;">
											@csrf
											<input type="hidden" name="id" value="{{$sale->id}}">
											<button class="btn bg_p_primary py-1">Confirm</button>
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
									<p class="btn bg_p_primary mb-0 p-1 px-2 del-btn <?php echo 'btn' . $counter ?>" data-store_id="{{$sale->id}}" style="font-size: 13px;relative;cursor:pointer;" title="Delete Sale"> <i class="fa fa-trash"></i></p>
								</td>
								<td style="text-align: center;">
								<p class="badge badge-danger">
									<a href="{{ route('admin.sales.invoiceView', $sale->id) }}" class="text-white">click here</a>
								</p>

								</td>


							</tr>
							@endforeach

						</tbody>
					</table>
					<br>
					{{$sales->links()}}
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
		$(".viewSale").click(function() {
			var saleId = $(this).data('sales_id');
			var billerName = $(this).data('biller_name');

			viewSale(saleId, billerName);
		});

		function viewSale(code, billerName) {
			//ajax
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "{{route('admin.sales.salesDetails')}}",
				type: "POST",
				data: {
					'saleId': code,
					'billerName': billerName
				},
				//dataType:'json',
				success: function(data) {
					$(".modal-data").html(data);
					$('.saleInfoModal').modal('show');
				},
				error: function() {
					toastr.error("Something went Wrong, Please Try again.");
				}
			});

			//end ajax
		} //end view sale function
		$("#searchKeydate").on('change', function() {
			var key = $(this).val();
			//ajax
			if (key == '') {
				// $("#search_list").html('');

			} else {
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: "{{route('admin.sales.searchSaledate')}}",
					type: "POST",
					data: {
						'key': key
					},
					//dataType:'json',
					success: function(data) {
						$("#table-content").html(data);
					},
					error: function() {
						// toastr.error("Something went Wrong, Please Try again.");
					}
				});

				//end ajax
			}

		});
		//search sale
		$("#searchKeycode").on('keyup', function() {
			var key = $(this).val();
			console.log(key);
			//ajax
			if (key == '') {
				// $("#search_list").html(''); 
			} else {
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: "{{route('admin.sales.searchSales')}}",
					type: "POST",
					data: {
						'key': key
					},
					//dataType:'json',
					success: function(data) {
						$("#table-content").html(data);
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