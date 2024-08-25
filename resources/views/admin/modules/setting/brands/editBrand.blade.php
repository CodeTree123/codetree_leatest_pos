<div class="modal-header">
    <h2 class="modal-title" id="exampleModalLabel">Update Brand</h2>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<div class="modal-body">
    @if (!empty($brand->image))
        <img src="{{ asset($brand->image) }}" alt="{{ $brand->name }}" class="img-rounded"
            style="width:100px;height:100px;">
    @else
        <img src="{{ asset('admin/defaultIcon/no_image.png') }}" alt="No-image" class="img-rounded"
            style="width:100px;height:100px;">
    @endif

    <form method="post" action="{{ route('admin.brand.updateBrand') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Change Image</label>
                <input type="file" class="form-control-file" name="image">
                <input type="hidden" name="id" value="{{ $brand->id }}">
            </div>
            <div class="form-group col-md-12">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{ $brand->name }}">
            </div>
            <div class="form-group col-md-12">
                <label>Company</label>
                <input type="text" class="form-control" name="company" value="{{ $brand->company }}">
            </div>
            <div class="form-group col-md-12">
                <label>Description</label>

                <textarea class="form-control" name="description" rows="3">{{ $brand->description }}</textarea>
            </div>
        </div>
        <div class="form-row">
            <input type="submit" class="btn btn-primary" style="float:right;" value="Update">

        </div>
    </form>
</div>
