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
    .multipleSelect2{
  width: 300px;
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
                <div class="offset-md-1 col-sm-12 col-md-10 col-xs-10 p-3  border">
                    <form method="post" action="{{route('admin.product.promotionSave')}}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label>Promotion Name *</label>
                                <input type="text" class="form-control" name="promotion_name" placeholder="promotion Name">
                            </div>

                            <div class="form-group col-md-4">
                            <label >Product Name * <i class="fa-fw fa fa-plus-circle"></i></label>

                            <select class="select2 form-control" name="Promotion_product[]" id="promo_product"  multiple = true
                            >
                             <option value="1" disabled>Select Product</option>
                            </select>
                            </div>

                            <div class="form-group col-6">
                                <label>Promotion Discount (%)*</label>
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
<script>


$(document).ready(function() {
    
    $('#promo_product').select2({   
        ajax: {
            url: '/sales/get-products',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term // Search term input
                };
            },
            processResults: function (data) {
                return {
                    results: data // Select2 expects {id, text} objects
                };
            },
            cache: true
        },
        minimumInputLength: 0,  // Start searching from first character
        placeholder: "Select Product", // Placeholder text
    });

});

</script>
@stop