@if(!$purchaseLists->isEmpty())
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
		<p class="btn  bg_secondary_teal p-1 px-2 mb-0 purchaseD" data-purchase_id="{{$purchase->id}}" style="font-size: 13px;cursor:pointer;" title="Purchase Details"> <i class="fa-fw fa fa-eye"></i></p>
		<p class="btn bg_p_primary p-1 mb-0 px-2 edit-btn" data-store_id="{{$purchase->id}}" style="font-size: 13px;" title="Edit Purchase"> <i class="fa fa-edit"></i></p>

		<div class="del-modal <?php echo 'modal' . $counter ?>">
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
		<p class="btn btn-danger mb-0 p-1 px-2 del-btn <?php echo 'btn' . $counter ?>" data-store_id="{{$purchase->id}}" style="font-size: 13px;relative;cursor:pointer;" title="Delete Purchase"> <i class="fa fa-trash"></i></p>
	</td>

</tr>
@endforeach
@else
<center>
	<p>No result Found</p>
</center>

@endif
<script>
	$(document).ready(function() {
		$(".purchaseD").click(function() {
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


	});
</script>