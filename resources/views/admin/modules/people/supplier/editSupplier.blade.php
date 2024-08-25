
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Update Supplier Info</h2>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
       <div class="modal-body">
        @if(!empty($supplierInfo->image))
        <img src="{{ asset('/')}}{{$supplierInfo->image}}" alt="{{$supplierInfo->name}}" class="img-rounded" style="width:100px;height:100px;">
        @else
        <img src="{{ asset('/')}}public/admin/defaultIcon/user.png" alt="No-image" class="img-rounded" style="width:100px;height:100px;">
        @endif

        <form method="post" action="{{route('admin.supplier.updateSupplier')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-row pt-0 pb-0 px-2">
              <div class="form-group col-md-12">
              <label>Change Image</label>
               <input type="file" class="form-control-file" name="image">
               <input type="hidden" name="id" value="{{$supplierInfo->id}}">
               
            </div>
             <div class="form-group col-md-6">
              <label for="inputPassword4">Company</label>
               <input type="text" class="form-control" name="company" value="{{$supplierInfo->company}}">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Mobile *</label>
               <input type="text" class="form-control" name="mobile"value="{{$supplierInfo->mobile}}">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Name *</label>
               <input type="text" class="form-control" name="name" value="{{$supplierInfo->name}}">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Email Address</label>
               <input type="email" class="form-control" name="email" value="{{$supplierInfo->email}}">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">City</label>
               <input type="text" class="form-control" name="city" value="{{$supplierInfo->city}}">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Postal Code</label>
               <input type="text" class="form-control" name="postal_code" value="{{$supplierInfo->postal_code}}">
            </div>
            <div class="form-group col-md-12">
              <label for="inputPassword4">Address</label>
               <textarea class="form-control" name="address" rows="3">{{$supplierInfo->address}}</textarea>
            </div>


            <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update Supplier">
          </div>
          </div>
        </form>

        </div>
    
        
      </div>
        
    </div>  
      