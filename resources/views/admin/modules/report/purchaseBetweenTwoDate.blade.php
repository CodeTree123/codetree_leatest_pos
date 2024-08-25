					
					<div class="row">
						<div class="offset-md-4 col-4 p-3" id="purchaseReport">
							<center>
								<h2>Purchase Report</h2>
								<p><b>Purchase from {{$startDate}} To {{$endDate}}</b></p>
                             <table class="table">
								<tr>
									<td class="px-2">Total Purchase</td>
									<td style="text-align: right;"><b>{{number_format($totalPurchae+$totalDiscount,2)}}৳</b></td>
								</tr>
								<tr>
									<td class="px-2">Total Discount</td>
									<td style="text-align: right;"><b>{{number_format($totalDiscount,2)}}৳</b></td>
								</tr>
								<tr>
									<td class="px-2">Total payemnt</td>
									<td style="text-align: right;"><b>{{number_format($paid_amount,2)}}৳</b></td>
								</tr>
								<tr>
									<td  class="px-2">Total Due</td>
									<td style="text-align: right;"><b>{{number_format($due,2)}}৳</b></td>
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
								<th class="font-weight-bold" scope="col">Reference No</th>
								<th class="font-weight-bold" scope="col">Supplier</th>
								<th class="font-weight-bold" scope="col">Purchase Status</th>
								<th class="font-weight-bold" scope="col">Grand Total</th>
								<th class="font-weight-bold" scope="col">Paid</th>
								<th class="font-weight-bold" scope="col">Discount</th>
								<th class="font-weight-bold" scope="col">Balance</th>
								<th class="font-weight-bold" scope="col">Payment Status</th>
								
								

							</tr>
						</thead>
						<tbody id="data-table">
							<?php $counter=0;?>
							@foreach($purchaseLists as $purchase)
							<?php $counter++;?>
							<tr>
								<td>{{$counter}}</td>
								<td>{{$purchase->purchase_date}}</td>
								<td>{{$purchase->reference}}</td>
								<td>{{$purchase->supplier['name']}}</td>
								<td style="text-align: center;">
									@if($purchase->is_received==1)
									<p class="badge  bg_secondary_teal">Received</p>
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
									<p>Due</p>
									@else
									<p>Paid</p>
									@endif
								</td>
								
								
							</tr>
							@endforeach
							
						</tbody>
					</table>