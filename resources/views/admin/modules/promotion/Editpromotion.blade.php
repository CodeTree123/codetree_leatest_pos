<div class="modal-header">
    <h2 class="modal-title" id="exampleModalLabel">Update Promotion Information</h2>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<div class="modal-body">

    <form method="post" action="{{route('admin.product.updatePromotion')}}">
        @csrf
        <input type="hidden" name="id" value="{{ $promotion->id }}"> 
        <div class="form-row">
            <div class="form-group col-6">
                <label>Promotion Name *</label>
                <input type="text" class="form-control" name="promotion_name" placeholder="promotion Name" value="{{$promotion->promotion_name}}">
            </div>

            <div class="form-group col-md-4">
                <label >Product Name * <i class="fa-fw fa fa-plus-circle"></i></label>
                <select class="select2 form-control" name="Promotion_product[]" id="promo_product"  multiple = true>
                    @foreach($products as $product)
                    <option value="{{ $product->id }}" selected>
                    {{$product->name}}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-6">
                <label>Promotion Discount (%)*</label>
                <input type="number" class="form-control" name="promotion_ammount" placeholder="promotion  Price" value="{{$promotion->promotion_ammount}}">
            </div>

            <div class="form-group col-6">
                <label for="formGroupExampleInput2">Status <i class="fa-fw fa fa-plus-circle"></i></label>
                <select class="custom-select" name="status">
                    <option @if($promotion->status == 'Active')selected @endif value="Active" >Active</option>
                    <option @if($promotion->status == 'Inactive')selected @endif value="Inactive">Inactive</option>
                </select>
            </div>

        </div>
        <div class="form-row">
            <input type="submit" class="btn btn-primary" style="float:right;" value="Update Promotion">

        </div>

    </form>
</div>
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