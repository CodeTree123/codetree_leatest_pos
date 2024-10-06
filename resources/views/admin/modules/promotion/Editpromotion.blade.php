<div class="modal-header">
    <h2 class="modal-title" id="exampleModalLabel">Update Promotion Information</h2>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<div class="modal-body">

    <form method="post" action="{{route('admin.product.updatePromotion')}}">
        @csrf
        <div class="form-row">
            <div class="form-group col-6">
                <label>Promotion Name *</label>
                <input type="text" class="form-control" name="promotion_name" placeholder="promotion Name" value="{{$promotion->promotion_name}}">
            </div>
            <div class="form-group col-6">
                <label for="formGroupExampleInput2">Category Name <i class="fa-fw fa fa-plus-circle"></i></label>
                <select class="custom-select" name="promotion_category_name">
                    <option value="">Please Select Category</option>
                    @foreach($categories as $category)
                    <option @if($promotion->promotion_category_name == $category->name)selected @endif value="{{$category->name}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-6">
                <label for="formGroupExampleInput2">Sub Category Name <i class="fa-fw fa fa-plus-circle"></i></label>
                <select class="custom-select" name="promotion_subcategory_name">
                    <option value="">Please Select Sub Category</option>
                    @foreach($subcategories as $subcategory)
                    <option @if($promotion->promotion_subcategory_name == $subcategory->name)selected @endif value="{{$subcategory->name}}">{{$subcategory->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-6">
                <label for="formGroupExampleInput2">Product Name * <i class="fa-fw fa fa-plus-circle"></i></label>
                <select class="custom-select" name="Promotion_product">
                    <option value="">Please Select product</option>
                    @foreach($products as $product)
                    <option @if($promotion->Promotion_product == $product->name)selected @endif value="{{$product->name}}">{{$product->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-6">
                <label for="formGroupExampleInput2">Product Code * <i class="fa-fw fa fa-plus-circle"></i></label>
                <select class="custom-select" name="Promotion_product_code">
                    <option value="">Please Select Product Code</option>
                    @foreach($products as $product)
                    <option @if($promotion->Promotion_product_code == $product->code)selected @endif value="{{$product->code}}">{{$product->code}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-6">
                <label>Starting Duration</label>
                <input type="date" value="{{ date('Y-m-d') }}" class="form-control" name="promotion_start_duration" placeholder="Starting Time" value="{{$promotion->promotion_start_duration}}">
            </div>
            <div class="form-group col-6">
                <label>Ending Duration</label>
                <input type="date" value="{{ date('Y-m-d') }}" class="form-control" name="promotion_end_duration" placeholder="Ending Time" value="{{$promotion->promotion_end_duration}}">

            </div>
            <div class="form-group col-6">
                <label>Promotion Price*</label>
                <input type="number" class="form-control" name="promotion_ammount" placeholder="promotion  Price" value="{{$promotion->promotion_ammount}}">
            </div>

            <div class="form-group col-6">
                <label for="formGroupExampleInput2">Status <i class="fa-fw fa fa-plus-circle"></i></label>
                <select class="custom-select" name="status">
                    <option @if($promotion->status == Active)selected @endif value="Active" >Active</option>
                    <option @if($promotion->status == Inactive)selected @endif value="Inactive">Inactive</option>
                </select>
            </div>

        </div>
        <div class="form-row">
            <input type="submit" class="btn btn-primary" style="float:right;" value="Update Product">

        </div>

    </form>
</div>