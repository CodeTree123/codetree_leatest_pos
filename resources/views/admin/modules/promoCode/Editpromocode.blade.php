<div class="modal-header">
    <h2 class="modal-title" id="exampleModalLabel">Update Promo Code Information</h2>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<div class="modal-body">

    <form method="post" action="{{route('admin.product.updatePromotion')}}">

        <div class="form-row">
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
                <input type="date" value="{{ date('Y-m-d') }}" class="form-control" name="promocode_start_duration" placeholder="Starting Time" value="{{$promoCode->promocode_start_duration}}">
            </div>
            <div class="form-group col-6">
                <label>Ending Duration</label>
                <input type="date" value="{{ date('Y-m-d') }}" class="form-control" name="promocode_end_duration" placeholder="Ending Time" value="{{$promoCode->promocode_end_duration}}">
            </div>
            <div class="form-group col-6">
                <label for="formGroupExampleInput2">Status <i class="fa-fw fa fa-plus-circle"></i></label>
                <select class="custom-select" name="status">
                    <option @if($promoCode->status == Active) selected @endif value="Active" >Active</option>
                    <option @if($promoCode->status == Inactive) selected @endif value="Inactive">Inactive</option>
                </select>
            </div>

        </div>
        <div class="form-row">
            <input type="submit" class="btn btn-primary" style="float:right;" value="Update Product">

        </div>

    </form>
</div>