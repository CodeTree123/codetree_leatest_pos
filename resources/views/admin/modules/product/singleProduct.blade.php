@extends('admin.layouts.adminmaster')
@section('adminTitle')
{{ $productInfo->name }}-Dashboard
@endsection
@section('adminContent')
<style>
	p{
		margin-bottom:0px;
	}
	.upper-action-btn{
		 margin-top:-8px;margin-left: 30px;border-radius: 0px;padding: 2px 20px;cursor:pointer;
	}
</style>
<div class="col-md-12 mt-5 pt-3 border-bottom">
	<div class="text-dark px-0" >
		<p class="mb-1"><a href="{{ route('admin.dashboard') }}" ><i class="fa fa-home"></i> Dashboard / </a><a href="{{ route('admin.productList') }}">Products /</a><a class="active-slink">Product Details</a> <span class="top-date">{{ date('l, jS F Y') }}</span></p>

	</div>
</div>

<div class="container-fluid p-3">                                                                    
   <div class="row p-1">
    <div class="col-2">
    	<center>
    		@if(!empty($productInfo->image))
    		<img src="{{ asset($productInfo->image) }}" alt="{{ $productInfo->name }}" class="img-rounded" style="width:100px;height:100px;">
    		@else
    		<img src="{{ asset('admin/defaultIcon/no_image.png') }}" alt="No-image" class="img-rounded" style="width:100px;height:100px;">
    		@endif
      </center>
    </div>
    <div class="col-5 col-xs-12">
    	<h3 style="float: left;margin-bottom: 0px;font-weight:bold">Basic Information</h3>
    	<p class="btn btn-info edit-info upper-action-btn" data-productid="{{ $productInfo->id }}">Edit</p>
    	<hr class="mt-0">
    	<p>Name: {{$productInfo->name}}</p>
    	<p>Code: {{$productInfo->code}}</p>
    	<p>Category: {{$productInfo->catName}}</p>
    	<p>Brand: {{$productInfo->bName}}</p>
    	<p>Alert: {{$productInfo->alert_qty}} {{$productInfo->uName}}</p>
      <hr>
      <p>{{$productInfo->description}}</p>
    	
    </div>
    <div class="col-5 col-xs-12">
    	<h3><b>Purchase / Sales  Information</b></h3>
    	<hr class="mt-0">
    	<p>Purchase Price: ৳{{number_format($productInfo->purchase_price)}}</p>
    	<p>Sell Price: ৳{{number_format($productInfo->sell_price)}}</p>
    	<p>Whole Sell Price: ৳{{number_format($productInfo->whole_sell)}}</p>
    	<p>Start Inventory: {{number_format($productInfo->start_inventory)}} {{$productInfo->uName}}</p>
    	<p>Total Purchase: {{number_format($totalPurchase)}} {{$productInfo->uName}}</p>
    	<p>Total Sale: {{number_format($totalsale)}} {{$productInfo->uName}}</p>
    	<p class="badge  bg_secondary_teal">In Stock: {{number_format($inStock)}} {{$productInfo->uName}}</p>
    </div>
   </div>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg productModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Update Product Information</h2>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
       <div class="modal-body">
          @if(!empty($productInfo->image))
        <img src="{{ asset($productInfo->image) }}" alt="{{ $productInfo->name }}" class="img-rounded" style="width:100px;height:100px;">
        @else
        <img src="{{ asset('admin/defaultIcon/no_image.png') }}" alt="No-image" class="img-rounded" style="width:100px;height:100px;">
        @endif

          <form method="post" action="{{ route('admin.product.updateProduct') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
           <div class="form-group col-md-12">
              <label>Change Image</label>
               <input type="file" class="form-control-file" name="image">
               <input type="hidden" name="id" value="{{$productInfo->id}}">
            </div>
            
            <div class="form-group col-md-6">
              <label>Name</label>
               <input type="text" class="form-control" name="name" value="{{$productInfo->name}}">
            </div>
          <div class="form-group col-md-6">
              <label>Alert Quantity</label>
               <input type="text" class="form-control" name="alert_qty" value="{{$productInfo->alert_qty}}">
            </div>
            <div class="form-group col-md-4">
              <label>Product cost</label>
               <input type="number" class="form-control" name="purchase_price" value="{{$productInfo->purchase_price}}">
            </div>
            <div class="form-group col-md-4">
              <label>Sell Price</label>
               <input type="number" class="form-control" name="sell_price" value="{{$productInfo->sell_price}}">
            </div>
            <div class="form-group col-md-4">
              <label>Wholesell Price</label>
               <input type="number" class="form-control" name="whole_sell" value="{{$productInfo->whole_sell}}">
            </div>
             <div class="form-group col-md-6">
              <label>Unit</label>
              <select class="form-control" name="unit">
                <option value="{{$productInfo->unit}}">{{$productInfo->uName}}</option>
                @foreach($units as $unit)
                <option value="{{$unit->id}}">{{$unit->name}}</option>
              
                @endforeach
              </select>
              
            </div>
            <div class="form-group col-md-6">
              <label>Starting Inventory</label>
               <input type="number" class="form-control" name="start_inventory" value="{{$productInfo->start_inventory}}">
            </div>
            <div class="form-group col-md-12">
              <label>Description</label>
              
               <textarea class="form-control" name="description" rows="3">{{$productInfo->description}}</textarea>
            </div>

          </div>
          <div class="form-row">
            <input type="submit" class="btn btn-primary" style="float:right;" value="Update Product">
        
          </div>
        
       </form>
   </div>
        
         
    
    </div>
  </div>
</div>
<script>
	$(document).ready(function(){
       $(".edit-info").click(function(){
        $(".productModal").modal('show');
     }); 
	});
</script>
@endsection

