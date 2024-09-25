@extends('admin.layouts.adminmaster')
@section('adminTitle')
Customer List- Admin Dashboard
@endsection
@section('adminContent')
<style>
	.search_link{
		padding:5px;
		border-bottom: 1px solid gray;
	}

input[type=text]:focus {
 border-color: inherit;
  -webkit-box-shadow: none;
  box-shadow: none;
  height:28px;
  font-size: inherit;
  border-color: rgba(229, 103, 23, 0.8);
 outline-color: gray;
 font-size: 15px;
 text-transform: none;
}
a:hover{
	text-decoration: none;
	color:white;
}
</style>

<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0" >
		<p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="" class="active-slink">Customer list</a><span class="top-date">Total Customers : {{$customers->total()}}</span></p>
	</div>
</div>

<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">
				<p class="btn mt-0 task-icon"><i class="fa fa-users"></i></p>
			</div>
			<h2 class="blue task-label">Customers</h2>
			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">
					<p class="task-btn text_p_primary" title="Actions">
						<i class="fa fa-th-list"></i>
					</p>
					<div class="task-menu p-2">
						<a class="dropdown-item pl-0" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
							<i class="fa-fw fa fa-plus-circle"></i> Add Customer
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
								<th class="font-weight-bold" scope="col">Email Address</th>
								<th class="font-weight-bold" scope="col">Phone</th>
								<th class="font-weight-bold" scope="col">Group</th>
								<th class="font-weight-bold" scope="col">Deposit</th>
								<th class="font-weight-bold" scope="col">Nominee Name</th>
								<th class="font-weight-bold" scope="col">Nominee Email</th>
								<th class="font-weight-bold" scope="col">Nominee address</th>
								<th class="font-weight-bold" scope="col">Nominee Phone</th>
								<th class="font-weight-bold" scope="col">Actions</th>
							</tr>
						</thead>
						<tbody id="table-date">
							<?php $counter=0;?>
                            @foreach($customers as $customer)
                            <?php $counter++; ?>
							<tr>
								<td>{{$counter}}</td>
								<td>
								@if(!empty($customer->image))
								<img src="{{ asset($customer->image) }}" alt="{{ $customer->name }}" class="img-rounded" style="width:35px;height:35px;">
								@else
								<img src="{{ asset('admin/defaultIcon/user.png')}}" alt="No-image" class="img-rounded" style="width:35px;height:35px;">
								@endif
								</td>
								<td>{{ $customer->name }}</td>
								<td>{{ $customer->company }}</td>
								<td>{{ $customer->email }}</td>
								<td><p class="badge  bg_secondary_teal">{{ $customer->mobile }}</p></td>
								<td><p class="badge badge-info">{{ $customer->groupName['name'] }}</p></td>
								<td></td>
								<td>{{ $customer->nominee ? $customer->nominee->name : '' }}</td>
                                <td>{{ $customer->nominee ? $customer->nominee->email : '' }}</td>
                                <td>{{ $customer->nominee ? $customer->nominee->phone : '' }}</td>
                                <td>{{ $customer->nominee ? $customer->nominee->address : '' }}</td>
								<td style="width:120px;">
									<div class="dropdown" style="width:90px;float:right;">
									  <a href="{{ route('admin.customer.customerDetails', $customer->id) }}" class="action-btn bg_p_primary p-2">
									   Details
									  </a>
									</div>
							    </td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<br>
					{{ $customers->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
  <div class="modal-content p-3">
    <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Add New Customer</h2>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
    <div class="modal-body">
        <form method="post" action="{{ route('admin.customer.customerSave') }}">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Customer Group</label>
                    <select class="custom-select" name="group">
                        @foreach($customerGroups as $customerGroup)
                        <option value="{{ $customerGroup->id }}">{{ $customerGroup->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Mobile *</label>
                    <input type="text" class="form-control" name="mobile" placeholder="Enter Customer Mobile">
                </div>
                <div class="form-group col-md-6">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Customer Name">
                </div>
                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Customer Email Address">
                </div>
                <div class="form-group col-md-6">
                    <label>Company</label>
                    <input type="text" class="form-control" name="company" placeholder="Enter Customer Company Name">
                </div>
                <div class="form-group col-md-6">
                    <label>Starting Balance</label>
                    <input type="number" class="form-control" name="start_balance" placeholder="Starting balance">
                </div>
            </div>
			<div class="form-row">
                <div class="form-group col-md-12">
                    <label>Address</label>
                    <textarea name="address" class="form-control" rows="3" placeholder="Enter Customer Address"></textarea>
                </div>
            </div>

            <!-- New Section: Nominee Information -->
           
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nominee Name *</label>
                    <input type="text" class="form-control" name="nominee_name" placeholder="Enter Nominee Name">
                </div>
                <div class="form-group col-md-6">
                    <label>Nominee Email </label>
                    <input type="email" class="form-control" name="nominee_email" placeholder="Enter Nominee Email">
                </div>
                <div class="form-group col-md-6">
                    <label>Nominee Phone *</label>
                    <input type="text" class="form-control" name="nominee_phone" placeholder="Enter Nominee Phone">
                </div>
            </div>
			<div class="form-row">
                <div class="form-group col-md-12">
                    <label>Nominee Address *</label>
                    <textarea name="nominee_address" class="form-control" rows="3" placeholder="Enter Nominee Address"></textarea>
                </div>
            </div>


    </div>
    <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Add Customer">
        </form>
    </div>
</div>

</div>
</div>

<script>
	$(document).ready(function(){
     $("#customerSearchKey").on('keyup',function(){
      var key=$(this).val();
       //ajax
       if(key==''){
        $("#customer_list").html('');
       }else{
		 $.ajax({
		   headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  },
		  url:"{{route('admin.customer.searchCustomer')}}",
		  type:"POST",
		  data:{'key':key},
		        //dataType:'json',
		        success:function(data){
		        	$("#customer_list").css('display','block');
		        	$("#customer_list").html(data);
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
@endsection

