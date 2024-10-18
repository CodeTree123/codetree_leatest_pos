<div class="modal-header">
    <h2 class="modal-title" id="exampleModalLabel">Update Promo Code Information</h2>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<div class="modal-body">

    <form method="post" action="{{route('admin.product.updatepromoCode')}}">
          @csrf
        <div class="form-row">
            <input type="hidden" name="id" value="{{ $promoCode->id }}"> 
            <div class="form-group col-6">
                <label>Promo Code Name *</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Promo Code Name" value="{{$promoCode->name}}">
            </div>
            <div class="form-group col-6">
                <label>Promo Code Price / Discount*</label>
                <input type="number" class="form-control" name="discount" placeholder="Enter Discount  Price" value="{{$promoCode->discount}}">
            </div>
            <div class="form-group col-6">
                <label>Starting Duration</label>
                <input type="date"  class="form-control" name="promocode_start_duration" placeholder="Starting Time" value="{{$promoCode->promocode_start_duration}}">
            </div>
            <div class="form-group col-6">
                <label>Ending Duration</label>
                <input type="date"  class="form-control" name="promocode_end_duration" placeholder="Ending Time" value="{{$promoCode->promocode_end_duration}}">
            </div>
            <div class="form-group col-6">
                <label>User Limit*</label>
                <input type="number" class="form-control" name="user_limit" placeholder="Enter User Limit" value="{{$promoCode->user_limit}}">
            </div>
            <div class="form-group col-6">
                <label>Minimum Order Ammount(bill)*</label>
                <input type="number" class="form-control" name="minimum_order_ammount" placeholder="Enter Minimum Order Ammount" value="{{$promoCode->minimum_order_ammount}}">
            </div>

        </div>
        <div class="form-row">
            <input type="submit" class="btn btn-primary" style="float:right;" value="Update Promocode">

        </div>

    </form>
</div>