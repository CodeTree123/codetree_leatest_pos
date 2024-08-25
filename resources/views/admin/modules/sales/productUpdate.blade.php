 <form method="post" action="{{route('admin.sales.productPriceUpdate')}}">
 	@csrf
 <div class="form-row">
  <div class="form-group col-12">
     <label for="recipient-name" class="col-form-label">Product name</label>
     <input type="text" class="form-control" name="name" value="{{$productInfos->name}}" readonly="">
     <input type="hidden" name="rowId" value="{{$rowId}}">
     <input type="hidden" name="proid" value="{{$productInfos->id}}">
  </div>
  <div class="form-group col-12">
     <label for="recipient-name" class="col-form-label">Purchase Price</label>
     <input type="number" class="form-control" name="purchase_price" value="{{$productInfos->purchase_price}}" readonly="">
  </div>
  @if($saleType=='w')
  <div class="form-group col-12">
     <label for="recipient-name" class="col-form-label">Wholesale Price</label>
     <input type="number" class="form-control" name="sell_price" value="{{$productInfos->whole_sell}}">
  </div>
  @else
   <div class="form-group col-12">
     <label for="recipient-name" class="col-form-label">Sale Price</label>
     <input type="number" class="form-control" name="sell_price" value="{{$productInfos->sell_price}}">
  </div>
  @endif
</div>
<hr>
<div class="form-row">
	<div class="form-group col-12">
     
     <input type="submit" class="btn btn-primary col-3" value="Update">
  </div>
</div>
          
</form>
