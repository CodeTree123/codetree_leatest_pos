			<div class="row">
						<div class="offset-md-4 col-4 p-3" id="salesReport">
							<center>
								<h2>Sales Report</h2>
								<p><b>Sales Date: {{$dat}}</b></p>
							
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
									<td  class="px-2">Total Due</td>
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
							<?php $counter=0;?>
							@foreach($sales as $sale)
							<?php $counter++;?>
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
									<p >Due</p>
									@endif
									
								</td>
								
							</tr>
							@endforeach
							
						</tbody>
					</table>