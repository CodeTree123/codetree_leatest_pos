<div class="row">
						<div class="offset-md-4 col-4 p-3" id="paymentReport">
							<center>
								<h2>Payment Report</h2>
								<p>{{$pDate}}</p>
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
							<?php $counter=0;?>
							@foreach($payments as $payment)
							<?php $counter++;?>
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
									<p class="badge badge-danger">Paid</p>
									@endif
								</td>
								
							</tr>
							@endforeach
							
						</tbody>
					</table>