 @if(!$productList->isEmpty())
 @foreach($productList as $products)
   <button class="btn-prni btn-default product pos-tip brandItem" title="{{$products->name}}" data-pro_id_brand="{{$products->id}}">
   @if(!empty($products->image))
    <img src="{{ asset('/')}}{{$products->image}}" alt="{{$products->name}}" class="img-rounded">
    @else
    <img src="{{ asset('/')}}public/admin/defaultIcon/no_image.png" alt="{{$products->name}}" class="img-rounded">
    @endif
    <p class="">{{$products->name}}</p>
  </button>
  @endforeach 
  @else
  <p>No Product Avaiable</p>
  @endif
  <script>
  	$(document).ready(function(){
      $(".brandItem").click(function(){
      	var proId=$(this).data('pro_id_brand');
      $("#posProduct").val('');
  $("#product_list").html('');
 //ajax
 $.ajax({
   headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  url:"{{route('admin.pos.addToCart')}}",
  type:"POST",
  data:{'pro_id':proId},
        //dataType:'json',
        success:function(data){
          console.log(data);
         $("#print").html(data);

        },
        error:function(){
          toastr.error("Something went Wrong, Please Try again.");
        }
      });

  //end ajax
  	});
  });

  </script>