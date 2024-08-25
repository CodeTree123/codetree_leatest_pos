   <div class="modal-content p-3">
   	<div class="modal-header">
   		<h2 class="modal-title" id="exampleModalLabel">Today's Sale #{{$dt}}</h2>
   		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
   	</div>
   	<div class="modal-body ">
	   <input type="text" class="col-5 m-1 mx-0" id="searchKeycode" style="float: right;" placeholder="Search sales by code ">

   		<table class="table table-bordered table-hover">
   			<thead class="bg_p_primary">
   				<tr>
   					<th class="font-weight-bold" scope="col">#</th>
   					<th class="font-weight-bold" scope="col">Customer</th>
   					<th class="font-weight-bold" scope="col">Grand Total</th>
   					<th class="font-weight-bold" scope="col">Paid</th>
   					<th class="font-weight-bold" scope="col">Balance</th>
   					<th class="font-weight-bold" scope="col">Payment Status</th>

   					<th class="font-weight-bold" scope="col">Actions</th>

   				</tr>
   			</thead>
   			<tbody id="#table-content">
   				<?php $counter=0;?>
   				@foreach($salesList as $sale)
   				<?php $counter++;?>
   				<tr>
   					
   					<td>{{$counter}}</td>
   					<td>{{$sale->name}}</td>
   					<td>{{number_format($sale->grand_total)}}</td>

   					<td>{{number_format($sale->paid_amount)}}</td>
   					<td>{{number_format($sale->due)}}</td>

   					<td>
                     @if($sale->due==0)
                     <p class="badge  bg_secondary_teal">Fill paid</p>
                     @else
                     <p class="badge badge-danger">Due</p>
                     @endif
                     
                  </td>
   					<td style="width:120px;">
   						<div class="dropdown" style="width:90px;float:right;">
   							<p class="action-btn dropdown-toggle" data-toggle="dropdown">
   								Action
   							</p>
   							<div class="dropdown-menu action-menu" >
   								
   								<a class="dropdown-item" href="{{route('admin.pos.billView',$sale->id)}}"> <i class="fa-fw fa fa-eye"></i> View</a>
   								<a class="dropdown-item" href="#"> <i class="fa-fw fa fa-edit"></i> Edit</a>
                           <a class="dropdown-item" href="#"> <i class="fa-fw fa fa-trash"></i> Delete</a>
   							</div>
   						</div>
   					</td>
   				</tr>
               @endforeach
   			</tbody>
   		</table>
   	</div>
   	<div class="modal-footer">


   	</div>
   </div>
   <script>
	$(document).ready(function(){
	//search sale
	$("#searchKeycode").on('keyup',function(){
       	var key=$(this).val();
		console.log( key);
       //ajax
       if(key==''){
       	// $("#search_list").html(''); 
       }
	   else{
       	$.ajax({
       		headers: {
       			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       		},
       		url:"{{route('admin.sales.searchSales')}}",
       		type:"POST",
       		data:{'key':key},
		        //dataType:'json',
		        success:function(data){
		        	$("#table-content").html(data);
		        },
		        error:function(){
		         // toastr.error("Something went Wrong, Please Try again.");
		     }
		 });

		  //end ajax
		}
	});
	});
   </script>