@extends('admin.layouts.adminmaster')
@section('adminTitle')
Add New Promotion- Admin Dashboard
@stop
@section('adminContent')
<style>
    label {
        font-weight: bold;
    }

    input['text'] {
        border-radius: 0px;
    }
</style>
<!-- date time picker -->

<div class="col-md-12 mt-5 pt-3 border-bottom">
    <div class="text-dark px-0">
        <p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="{{route('admin.product.promotionlist')}}">Promotion / </a><a class="active-slink">Promotion Add</a> <span class="top-date">{{date('l, jS F Y')}}</span></p>

    </div>
</div>

<div class="container-fluid p-3">
    <div class="box">
        <div class="box-header">
            <div class="box-icon-left border-right" style="height:100%">



                <p class="btn mt-0 task-icon"><i class="fa fa-barcode"></i></p>

            </div>
            <h2 class="blue task-label">Add New Promotion</h2>

            <div class="box-icon border-left" style="height:100%">
                <div class="dropdown mt-0">



                    <p class="task-btn text_p_primary text_p_primary" title="Actions">
                        <i class="fa fa-th-list"></i>
                        </button>
                    <div class="task-menu p-2">
                        <a class="dropdown-item pl-0" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
                            <i class="fa-fw fa fa-list"></i> Promotion list
                        </a>

                    </div>

                </div>
            </div>
        </div>
        <div class="box-content">
            <div class="row">
                <div class="col-lg-12">
                    <p class="introtext">Please fill in the information below. The field labels marked with * are required input fields.</p>
                </div>
                @if(Session::has('error-message'))
                <p class="alert alert-danger">{{Session::get('error-message')}}</p>
                @endif
                <div class="offset-md-1 col-sm-12 col-md-10 col-xs-10 p-3  border">
                    <form method="post" action="{{route('admin.product.promotionSave')}}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label>Promotion Name *</label>
                                <input type="text" class="form-control" name="promotion_name" placeholder="promotion Name">
                            </div>
                            <div class="form-group col-6">
                                <label for="formGroupExampleInput2">Category Name <i class="fa-fw fa fa-plus-circle"></i></label>
                                <select class="custom-select" name="promotion_category_name">
                                    <option value="">Please Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->name}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="formGroupExampleInput2">Sub Category Name <i class="fa-fw fa fa-plus-circle"></i></label>
                                <select class="custom-select" name="promotion_subcategory_name">
                                    <option value="">Please Select Sub Category</option>
                                    @foreach($subcategories as $subcategory)
                                    <option value="{{$subcategory->name}}">{{$subcategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="formGroupExampleInput2">Product Name * <i class="fa-fw fa fa-plus-circle"></i></label>
                                <select class="custom-select" name="Promotion_product">
                                    <option value="">Please Select product</option>
                                    @foreach($products as $product)
                                    <option value="{{$product->name}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="formGroupExampleInput2">Product Code * <i class="fa-fw fa fa-plus-circle"></i></label>
                                <select class="custom-select" name="Promotion_product_code">
                                    <option value="">Please Select Product Code</option>
                                    @foreach($products as $product)
                                    <option value="{{$product->code}}">{{$product->code}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6" >
                                <label>Starting Duration</label>
                                <input type="date" class="form-control" name="promotion_start_duration" placeholder="Starting Time">
                            </div>
                            <div class="form-group col-6">
                                <label>Ending Duration</label>
                                <input type="date" class="form-control" name="promotion_end_duration" placeholder="Ending Time">

                            </div>
                            <div class="form-group col-6">
                                <label>Promotion Price*</label>
                                <input type="number" class="form-control" name="promotion_ammount" placeholder="promotion  Price">
                            </div>

                            <div class="form-group col-6">
                                <label for="formGroupExampleInput2">Status <i class="fa-fw fa fa-plus-circle"></i></label>
                                <select class="custom-select" name="status">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <input type="submit" class="btn bg_p_primary col-12" value="Add Product">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- <script type="text/javascript">
$(function(){
$('#datetimepicker').datetimepicker();
});
</script> -->
@stop
