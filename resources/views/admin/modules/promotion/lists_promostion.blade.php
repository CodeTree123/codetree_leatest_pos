@extends('admin.layouts.adminmaster')
@section('adminTitle')
All Promotions- Admin Dashboard
@stop
@section('adminContent')

<style>
    input[type=text]:focus {
        border-color: inherit;
        -webkit-box-shadow: none;
        box-shadow: none;
        height: 28px;
        font-size: inherit;
        border-color: rgba(229, 103, 23, 0.8);
        outline-color: gray;
        font-size: 15px;
        text-transform: none;

    }

    .table td {
        padding-bottom: 0px;
        vertical-align: middle;
    }
</style>
<div class="col-md-12 mt-5 pt-3 border-bottom">
    <div class="text-dark px-0">
        <p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="" class="active-slink">Promotions List</a> <span class="top-date">Total Promotions : {{$promotions->count()}}</span></p>
    </div>
</div>

<div class="container-fluid p-3">
    <div class="box">
        <div class="box-header">
            <div class="box-icon-left border-right" style="height:100%">
                <p class="btn mt-0 task-icon"><i class="fa fa-barcode"></i></p>
            </div>
            <h2 class="blue task-label">All Promotions List</h2>

            <div class="box-icon border-left" style="height:100%">
                <div class="dropdown mt-0">



                    <p class="task-btn text_p_primary" title="Actions">
                        <i class="fa fa-th-list"></i>
                        </button>
                    <div class="task-menu p-2">
                        <a href="{{route('admin.productAdd')}}" class="dropdown-item pl-0" type="button">
                            <i class="fa-fw fa fa-plus-circle"></i> Add New Product
                        </a>
                        <a href="{{route('admin.product.export.excel')}}" class="dropdown-item pl-1" type="button">
                            <i class="fa fa-file-excel"></i> Export Excel
                        </a>
                        <a class="dropdown-item pl-1" type="button">
                            <i class="fa fa-file-pdf"></i> Export PDF
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
                        @if(Session::has('error-message'))
                        <p class="alert alert-danger">{{Session::get('error-message')}}</p>
                        @endif

                        <div class="col-4 mt-1">
                            <input type="text" class="col-10 m-1 mx-0" id="searchKey" placeholder="Search promotions by name or code ">
                            <div id="search_list" class="col-10 px-0" style="position: absolute; margin-top: 35px;float: right;right:0px;z-index: 1;background: white;box-shadow: 0 0 15px 1px #dee2e6;display: none;">

                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead class="bg_p_primary">
                            <tr>
                                <th class="font-weight-bold" scope="col">#</th>
                                <th class="font-weight-bold" scope="col">Name</th>
                                <th class="font-weight-bold" scope="col">Product Name</th>
                                <th class="font-weight-bold" scope="col">Start Date</th>
                                <th class="font-weight-bold" scope="col">End Date</th>
                                <th class="font-weight-bold" scope="col">Status</th>
                                <th class="font-weight-bold" scope="col">Actions</th>

                            </tr>
                        </thead>
                        <tbody id="table-data">
                            <?php $counter = 0; ?>
                            @foreach($promotions as $key=>$promotion)
                            <?php $counter++; ?>
                            <tr>
                                <td>{{$counter}}</td>
                                <td>{{$promotion->promotion_name}}</td>
                                <td>{{$promotion->promotion_category_name}}</td>
                                <td>{{$promotion->promotion_subcategory_name}}</td>
                                <td>{{$promotion->Promotion_product}}</td>
                                <td>{{$promotion->Promotion_product_code}}</td>
                                <td>{{$promotion->promotion_start_duration}}</td>
                                <td>{{$promotion->promotion_end_duration}}</td>
                                <td>{{$promotion->status}}</td>
                                <td style="width:120px;">
                                    <p class="btn bg_p_primary p-1 mb-0 px-2 edit-promotion" data-promotionid="{{$promotion->id}}" style="font-size: 13px;cursor:pointer;" title="Edit promotion"> <i class="fa fa-edit"></i></p>
                                    <div class="del-modal <?php echo 'modal' . $counter ?>">
                                        <p><b>Record delete confirmation.</b></p>
                                        <p>Are you want to really delete ?</p>

                                        <button class="btn bg_p_primary py-1 del-close" style="background-color: #808080a6;border-color: #808080a6;">Cancel</button>
                                        <form method="post" action="{{route('admin.product.promotionDelete')}}" style="float:right;">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$promotion->id}}">
                                            <button class="btn bg_secondary_grey py-1">Confirm</button>
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
                                    <p class="btn bg_secondary_grey mb-0 p-1 px-2 del-btn <?php echo 'btn' . $counter ?>" data-store_id="{{$promotion->id}}" style="font-size: 13px;relative;cursor:pointer;" title="Delete product"> <i class="fa fa-trash"></i></p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg promotionModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-3 modal-data">
    </div>
  </div>
</div>
<script>
    //edit promotion
       $(".edit-promotion").click(function(){
         var promotionid=$(this).data('promotionid');
        //ajax
		 $.ajax({
		   headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  },
		  url:"{{route('admin.product.PromotionEdit')}}",
		  type:"POST",
		  data:{'promotionid':promotionid},
		        //dataType:'json',
		        success:function(data){
		        	$(".modal-data").html(data);
		          $('.promotionModal').modal('show');
		        },
		        error:function(){
		          toastr.error("Something went Wrong, Please Try again.");
		        }
		      });

		  //end ajax
       });



</script>
@stop
