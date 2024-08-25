@extends('admin.layouts.adminmaster')
@section('adminTitle')
Expense Category - Admin Dashboard
@stop
@section('adminContent')
<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0" >
		<p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="" class="active-slink">Expenses Categories</a><span class="top-date">{{date('l, jS F Y')}}</span></p>

	</div>
</div>

<div class="container-fluid p-3">
	<div class="box">
		<div class="box-header">
			<div class="box-icon-left border-right" style="height:100%">
				
					

					<p class="btn mt-0 task-icon"><i class="fa fa-folder-open"></i></p>
				
			</div>
			<h2 class="blue task-label">Expense Category</h2>

			<div class="box-icon border-left" style="height:100%">
				<div class="dropdown mt-0">
					

					
						<p class="task-btn text_p_primary" title="Actions">
							<i class="fa fa-th-list"></i>
						</button>
						<div class="task-menu p-2">
							<a class="dropdown-item pl-0" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
							 <i class="fa-fw fa fa-plus-circle"></i> Add Expense Category
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
								<th class="font-weight-bold" scope="col">Categoty Code</th>
								<th class="font-weight-bold" scope="col">Category Name</th>
								<th class="font-weight-bold" scope="col">Description</th>
								<th class="font-weight-bold" scope="col">Actions</th>

							</tr>
						</thead>
						<tbody>
							<?php $counter=0;?>
                           @foreach($expenseCategory as $cat)
                           <?php $counter++;?>
							<tr>
								<td>{{$counter}}</td>
								<td>{{$cat->code}}</td>
								<td>{{$cat->name}}</td>
								<td>{{$cat->description}}</td>
								<td style="width:120px;" >
									
									<p class="btn bg_p_primary p-1 mb-0 px-2 edit" data-eid="{{$cat->id}}" style="font-size: 13px;cursor:pointer;" title="Edit Category"> <i class="fa fa-edit" ></i></p>

									<div class="del-modal <?php echo 'modal'.$counter?>" style="right: 93px;">
										<p><b>Record delete confirmation.</b></p>
										<p>Are you want to really delete ?</p>

										<button class="btn btn-info py-1 del-close" style="background-color: #808080a6;border-color: #808080a6;">Cancel</button>
										<form method="post"  action="{{route('admin.setting.deleteExCat')}}"style="float:right;">
											@csrf
											<input type="hidden" name="id" value="{{$cat->id}}">
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
									<p class="btn bg_secondary_grey mb-0 p-1 px-2 del-btn <?php echo 'btn'.$counter?>"  style="font-size: 13px;relative;cursor:pointer;" title="Delete cstegory"> <i class="fa fa-trash"></i></p>
								</td>
							</tr>
							@endforeach
							</tbody>
						</table>
						{{$expenseCategory->links()}}
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
        <h2 class="modal-title" id="exampleModalLabel">Add New Expense Category</h2>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
       <div class="modal-body">

        <form method="post" action="{{route('admin.expense.ExpenseCategorySave')}}">
        	@csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Code *</label>
            <?php $code=count($expenseCategory)+1;?>
            <input type="text" class="form-control" name="code" value="{{$ExpenseCode}}-{{$code}}" readonly="">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name *</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Description <span class="label-optional">(Optional)</span></label>
            <textarea rows="3" class="form-control" name="description"></textarea>
          </div>
          
       
      </div>
      <div class="modal-footer">
        <input type="submit" value="Add Expense category" class="btn btn-primary">
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
		  url:"{{route('admin.setting.editExCat')}}",
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

