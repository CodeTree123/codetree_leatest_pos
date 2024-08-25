@extends('admin.layouts.adminmaster')

@section('adminTitle')
{{$supplierrInfo->name}} -Supplier Details
@endsection

@section('adminContent')
<style>
	p{
		margin-bottom:0px;
	}
	.upper-action-btn{
		 margin-top:-8px;margin-left: 30px;border-radius: 0px;padding: 2px 20px;cursor:pointer;
	}
</style>

<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0" >
		<p class="mb-1"><a href="{{route('admin.dashboard')}}" ><i class="fa fa-home"></i> Dashboard /</a><a href="{{route('admin.supplierList')}}">Suppliers /</a><a class="active-slink">Supplier Details</a><span class="top-date">{{date('l, jS F Y')}}</span></p>
	</div>
</div>

<div class="container-fluid p-3">                                                               
   <div class="row p-1">
		<div class="col-2">
			<center>
				@if(!empty($supplierrInfo->image))
				<img src="{{ asset($supplierrInfo->image) }}" alt="{{ $supplierrInfo->name }}" class="img-rounded" style="width:100px;height:100px;">
				@else
				<img src="{{ asset('admin/defaultIcon/user.png') }}" alt="No-image" class="img-rounded" style="width:100px;height:100px;">
				@endif
			</center>
		</div>
			<div class="col-5 col-xs-12">
			<h3 style="float: left;margin-bottom: 0px;font-weight:bold">Basic Information</h3>
			<p class="btn btn-info edit-info" style=" margin-top:-8px;margin-left: 30px;border-radius: 0px;padding: 2px 20px;cursor:pointer;" data-supplierid="{{ $supplierrInfo->id }}">Edit</p>
			<hr class="mt-0">
			<p>Name: {{ $supplierrInfo->name }}</p>
			<p>Mobile: {{ $supplierrInfo->mobile }}</p>
			@if(!empty($supplierrInfo->email ))
			<p>Email: {{ $supplierrInfo->email }}</p>
			@endif
			<p>Company: {{ $supplierrInfo->company }}</p>
		</div>
		<div class="col-5 col-xs-12">
			<h3><b>Purchase Information</b></h3>
			<hr class="mt-0">
			<p>Starting Balance: ৳{{number_format($supplierrInfo->start_balance)}}</p>
			<p>Total Purchase: ৳{{number_format($totalpurchase)}}</p>
			<p>Total Discount: ৳{{number_format($totalDiscount)}}</p>
			<p>Total Due: ৳{{number_format($totalDue+$supplierrInfo->start_balance)}}</p>
		</div>
		<div class="col-12 mt-3">
			<h3 class="mb-0"><b>Purchase History</b></h3>
			<hr class="mt-0">
			<table class="table table-bordered table-hover">
				<thead class="bg_p_primary">
					<tr>
						<th class="font-weight-bold" scope="col">#</th>
						<th class="font-weight-bold" scope="col">Date</th>
						<th class="font-weight-bold" scope="col">Reference No</th>
						<th class="font-weight-bold" scope="col">Purchase Status</th>
						<th class="font-weight-bold" scope="col">Grand Total</th>
						<th class="font-weight-bold" scope="col">Paid</th>
						<th class="font-weight-bold" scope="col">Discount</th>
						<th class="font-weight-bold" scope="col">Balance</th>
						<th class="font-weight-bold" scope="col">Payment Status</th>
						<th class="font-weight-bold" scope="col">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $counter=0;?>
					@foreach($purchaseHistory as $purchase)
					<?php $counter++;?>
					<tr>
						<td>{{$counter}}</td>
						<td>{{$purchase->purchase_date}}</td>
						<td>{{$purchase->reference}}</td>
						<td>
							@if($purchase->is_received==1)
							<p class="badge bg_secondary_teal">Received</p>
							@else
							<p class="badge badge-danger">Pending</p>
							@endif
						</td>
						<td>{{ number_format($purchase->grand_total) }}</td>
						<td>{{ number_format($purchase->paid_amount) }}</td>
						<td>{{ number_format($purchase->discount) }}</td>
						<td>{{ number_format($purchase->due) }}</td>
						<td>
							@if($purchase->due >0)
							<p class="badge badge-danger">Due</p>
							@else
							<p class="badge  bg_secondary_teal">Paid</p>
							@endif
						</td>
						<td style="width:120px;">
							<div class="dropdown" style="width:90px;float:right;">
								<p class="action-btn  purchaseDetails"  data-purchase_id="{{$purchase->id}}">
								Details
								</p>
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
   </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg purchase_details" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-3"></div>
  </div>
</div>

<script>
	$(document).ready(function(){
       $(".purchaseDetails").click(function(){
      		var purchase_id=$(this).data('purchase_id');
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "{{ route('admin.purchase.purchaseDetails') }}",
				type: "POST",
				data:{ 'purchase_id' : purchase_id },
				success:function(data){
					$(".modal-content").html(data);
					$('.purchase_details').modal('show'); 
				},
				error:function(){
					toastr.error("Something went Wrong, Please Try again.");
				}
			});
		});

       //edit supplier  infomation
       $(".edit-info").click(function(){
    		var supplierid = $(this).data('supplierid');
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "{{route('admin.supplier.supplierInfo')}}",
				type: "POST",
				data: { 'supplierid' : supplierid },
				success:function(data){
					$(".modal-content").html(data);
					$('.purchase_details').modal('show'); 
				},
				error:function(){
					toastr.error("Something went Wrong, Please Try again.");
				}
			});
		});
	});
</script>
@endsection

