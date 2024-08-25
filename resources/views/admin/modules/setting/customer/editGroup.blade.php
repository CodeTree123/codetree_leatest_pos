    	<div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Update Customer Group</h2>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
       <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name *</label>
            <input type="text" class="form-control" id="name" value="{{$group->name}}">
            <input type="hidden" class="form-control" id="id" value="{{$group->id}}">
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Percentage</label>
            
            <input type="text" class="form-control" id="percentage" value="{{$group->percentage}}">
          </div>
          
       
      </div>
      <div class="modal-footer">
        <input type="submit" value="Update" id="submit" class="btn btn-primary">
        
      </div>
   
    <script>
  $(document).ready(function(){
    //edit product
       $("#submit").click(function(){
         var id=$("#id").val();
         var name=$("#name").val();
         var percentage=$("#percentage").val();
        
        //ajax
     $.ajax({
       headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url:"{{route('admin.customerGroup.customerGroupUpdate')}}",
      type:"POST",
      data:{'id':id,'name':name,'percentage':percentage},
            //dataType:'json',
            success:function(data){
             if(data==1){
              location.reload();
             }
            },
            error:function(){
              toastr.error("Something went Wrong, Please Try again.");
            }
          });

      //end ajax
       }); 
     });