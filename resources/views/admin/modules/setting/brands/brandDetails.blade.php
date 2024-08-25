<div class="modal-header">
    <h2 class="modal-title" id="exampleModalLabel">Brand Information</h2>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<div class="modal-body">
    <div class="row p-1">
        <div class="col-2">
            <center>
                @if (!empty($brand->image))
                    <img src="{{ asset($brand->image) }}" alt="{{ $brand->name }}" class="img-rounded"
                        style="width:100px;height:100px;">
                @else
                    <img src="{{ asset('admin/defaultIcon/no_image.png') }}" alt="No-image" class="img-rounded"
                        style="width:100px;height:100px;">
                @endif
            </center>
        </div>
        <div class="col-5 col-xs-12">
            <h3><b>Basic Information</b></h3>
            <hr class="mt-0">
            <p class="mb-0">Name: {{ $brand->name }}</p>
            <p class="mb-0">Code: {{ $brand->code }}</p>
            <p class="mb-0">Company: {{ $brand->company }}</p>
            <p class="mb-0">Description: {{ $brand->description }}</p>
        </div>
    </div>
</div>
