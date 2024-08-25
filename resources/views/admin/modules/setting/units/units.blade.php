@extends('admin.layouts.adminmaster')
@section('adminTitle')
Units - Admin Dashboard
@stop
@section('adminContent')
<style>
	
</style>
<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0" >
		<p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="" class="active-slink">Units</a><span class="top-date">{{date('l, jS F Y')}}</span></p>

	</div>
</div>

<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">
				


				<p class="btn mt-0 task-icon"><i class="fa fa-folder-open"></i></p>
				
			</div>
			<h2 class="blue task-label">Units</h2>

			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">
					

					
					<p class="task-btn text_p_primary" title="Actions">
						<i class="fa fa-th-list"></i>
					</p>
					<div class="task-menu p-2">
						<a class="dropdown-item pl-0" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
							<i class="fa-fw fa fa-plus-circle"></i> Add Units
						</a>
						<a class="dropdown-item pl-0" type="button">
							<i class="fa fa-file"></i> Export To Excel File
						</a>

						<a class="dropdown-item pl-0" type="button">
							<i class="fa fa-trash"></i> Delete Unit
						</a>

					</div>
					
				</div>
			</div>
		</div>
		<div class="box-content">
			<div class="row">
				<div class="col-lg-12">
					<p class="introtext">Please use the table below to navigate or filter the results. You can download the table as excel and pdf.</p>
					<table class="table table-bordered table-hover">
						<thead class="bg_p_primary">
							<tr>
								<th class="font-weight-bold" scope="col">#</th>
								<th class="font-weight-bold" scope="col">Unit Code</th>
								<th class="font-weight-bold" scope="col">Unit Name</th>
								<th class="font-weight-bold" scope="col">Base Unit</th>
								<th class="font-weight-bold" scope="col">Operator</th>
								<th class="font-weight-bold" scope="col">Operation Value</th>
								<th class="font-weight-bold" scope="col">Actions</th>

							</tr>
						</thead>
						<tbody>
							<?php
                              $counter=0;
							?>
                          @foreach($units as $unit)
                          <?php $counter++;?>
							<tr>
								<td>{{$counter}}</td>
								<td>{{$unit->code}}</td>
								<td>{{$unit->name}}</td>
								<td>{{$unit->base_unit}}</td>
								<td>{{$unit->operator}}</td>
								<td>{{$unit->operation_value}}</td>
							<td style="width:120px;" >
									
									<p class="btn  bg_secondary_teal p-1 px-2 mb-0 view"  style="font-size: 13px;cursor:pointer;" title="Unit Details" data-vid="{{$unit->id}}"> <i class="fa-fw fa fa-eye"></i></p>
									<p class="btn bg_p_primary p-1 mb-0 px-2 edit" data-eid="{{$unit->id}}" style="font-size: 13px;cursor:pointer;" title="Edit unit"> <i class="fa fa-edit" ></i></p>

									<div class="del-modal <?php echo 'modal'.$counter?>">
										<p><b>Record delete confirmation.</b></p>
										<p>Are you want to really delete ?</p>

										<button class="btn btn-info py-1 del-close" style="background-color: #808080a6;border-color: #808080a6;">Cancel</button>
										<form method="post"  action="{{route('admin.setting.deleteUnit')}}"style="float:right;">
											@csrf
											<input type="hidden" name="id" value="{{$unit->id}}">
											<button class="btn btn-danger py-1">Confirm</button>
										</form>
									</div>
									<script>
										$(document).ready(function(){
											$(".<?php echo 'btn'.$counter?>").click(function(){
												$(".<?php echo 'modal'.$counter?>").show('fadeOut');

											});
											$(".del-close").click(function(){
												$(".del-modal").hide('fadeIn');

											});
										});
									</script>
									<p class="btn bg_secondary_grey mb-0 p-1 px-2 del-btn <?php echo 'btn'.$counter?>"  style="font-size: 13px;relative;cursor:pointer;" title="Delete unit"> <i class="fa fa-trash"></i></p>
								</td>
							</tr>
							</tr>
							@endforeach
							
						</tbody>
					</table>
					{{$units->links()}}
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
				<h2 class="modal-title" id="exampleModalLabel">Add New Units</h2>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
			<div class="modal-body">

				<form method="post" action="{{route('admin.unit.unitSave')}}">
					@csrf
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Unit Code *</label>
						<?php
                         $code=count($units)+1;
						?>
						<input type="text" class="form-control" value="{{$unitCode}}-{{$code}}" readonly="" name="code">
					</div>
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Unit Name *</label>
						<input type="text" class="form-control" placeholder="Unit name" name="name">
					</div>
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Base Unit <span class="label-optional">(Optional)</span></label>
						<select class="custom-select" name="base_unit">
							<<option value="">Select Base Unit</option>
							@foreach($units as $unit)
							<option value="{{$unit->name}}">{{$unit->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Operator <span class="label-optional">(Optional)</span></label>
						<select class="custom-select" name="operator">
							<option value="">Select Operator</option>
							<option value="+">Plus(+)</option>
							<option value="-">Minus(-)</option>
                            <option value="*">Multiple(*)</option>
							<option value="/">Divide(/)</option>
						</select>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Operation Value</label>
						<input type="text" class="form-control" placeholder="Operation Value" name="operation_value">
					</div>

				</div>
				<div class="modal-footer">

					<input type="submit" class="btn btn-primary" value="Add Unit">
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<!--unit modal-->
<div class="modal fade unit-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content p-3 modal-data">
			
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
    //edit product
       $(".edit").click(function(){
         var id=$(this).data('eid');
        //ajax
		 $.ajax({
		   headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  },
		  url:"{{route('admin.setting.editUnit')}}",
		  type:"POST",
		  data:{'id':id},
		        //dataType:'json',
		        success:function(data){
		        	$(".modal-data").html(data);
		          $('.unit-modal').modal('show'); 
		        },
		        error:function(){
		          toastr.error("Something went Wrong, Please Try again.");
		        }
		      });

		  //end ajax
       }); 

       //product details
       $(".view").click(function(){
        var id=$(this).data('vid');
        //ajax
		 $.ajax({
		   headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  },
		  url:"{{route('admin.setting.unitDetails')}}",
		  type:"POST",
		  data:{'id':id},
		        //dataType:'json',
		        success:function(data){
		        	$(".modal-data").html(data);
		          $('.unit-modal').modal('show'); 
		        },
		        error:function(){
		          toastr.error("Something went Wrong, Please Try again.");
		        }
		      });

		  //end ajax

       });  
   });
</script>
@stop

