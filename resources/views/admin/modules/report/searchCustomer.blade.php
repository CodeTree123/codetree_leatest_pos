<?php
use App\Http\Controllers\report\CustomerReportController;
 $counter=0;?>
@foreach($customers as $customer)
<?php $counter++; 
$totalAmount=CustomerReportController::getTotalAmount($customer->id);
$getTotalShopping=CustomerReportController::getTotalShopping($customer->id);
$getTotalPaid=CustomerReportController::getTotalPaid($customer->id);
$getStartBalance=CustomerReportController::getStartBalance($customer->id);
$balance=$totalAmount-$getTotalPaid;
$totalBalance=$balance+$getStartBalance;
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
</td>
<td style="text-align:right;">{{$getTotalShopping}}</td>
<td style="text-align:right;">{{number_format($totalAmount,2)}}</td>
<td style="text-align:right;">{{number_format($getTotalPaid,2)}}</td>
<td style="text-align:right;">{{number_format($getStartBalance,2)}}</td>
<td style="text-align:right;">{{number_format($totalBalance,2)}}</td>
<td style="width:120px;">
	<div class="dropdown" style="width:90px;float:right;">
		<a href="{{route('admin.customer.customerDetails',$customer->id)}}" class="action-btn p-2" >
			Details
		</a>
	</div>
</td>
</tr>
@endforeach