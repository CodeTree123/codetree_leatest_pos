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
        <p class="mb-1"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard / </a><a href="{{route('admin.product.promoCodelist')}}">Promo Code / </a><a class="active-slink">Promotion Add</a> <span class="top-date">{{date('l, jS F Y')}}</span></p>

    </div>
</div>

<div class="container-fluid p-3">
    <div class="box">
        <div class="box-header">
            <div class="box-icon-left border-right" style="height:100%">



                <p class="btn mt-0 task-icon"><i class="fa fa-barcode"></i></p>

            </div>
            <h2 class="blue task-label">Add New Promo Code</h2>

            <div class="box-icon border-left" style="height:100%">
                <div class="dropdown mt-0">



                    <p class="task-btn text_p_primary text_p_primary" title="Actions">
                        <i class="fa fa-th-list"></i>
                        </button>
                    <div class="task-menu p-2">
                        <a class="dropdown-item pl-0" type="button" href="{{route('admin.product.promoCodelist')}}" data-toggle="modal" data-target=".bd-example-modal-lg">
                            <i class="fa-fw fa fa-list"></i> Promo Code list
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
                    <form method="post" action="{{route('admin.product.promoCodeSave')}}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label>Promo Code Name *</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Promo Code Name">
                            </div>
                            <div class="form-group col-6">
                                <label for="discount_type">Discount Type*</label>
                                <select class="form-control" id="percentage" name="percentage" required>
                                    <option value="">Select Discount Type</option>
                                    <option value="true">Percentage (%)</option>
                                    <option value="false">On Total</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label>Promo Code Discount*</label>
                                <input type="number" class="form-control" name="discount" placeholder="Enter Discount  Price">
                            </div>
                            <div class="form-group col-6">
                                <label>User Limit*</label>
                                <input type="number" class="form-control" name="user_limit" placeholder="Enter User Limit">
                            </div>
                            <div class="form-group col-6">
                                <label>Minimum Order Ammount(bill)*</label>
                                <input type="number" class="form-control" name="minimum_order_ammount" placeholder="Enter Minimum Order Ammount">
                            </div>

                            <div class="form-group col-6">
                                <label>Starting Duration</label>
                                <input type="date" value="{{ date('Y-m-d') }}" class="form-control" name="promocode_start_duration" placeholder="Starting Time">
                            </div>
                            <div class="form-group col-6">
                                <label>Ending Duration</label>
                                <input type="date" value="{{ date('Y-m-d') }}" class="form-control" name="promocode_end_duration" placeholder="Ending Time">
                            </div>
                            <div class="form-group col-12">
                                <input type="submit" class="btn bg_p_primary col-12" value="Add Promo Code">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@stop