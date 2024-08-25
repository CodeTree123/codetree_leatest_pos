 @if(!$productList->isEmpty())
 @foreach($productList as $products)
   <button class="btn-prni btn-default product pos-tip search_item" title="{{$products->name}}" data-searech_pro_id_="{{$products->id}}">
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
      $(".search_item").click(function(){
      	
      	var search_id=$(this).data('searech_pro_id_');
     
 //ajax
 $.ajax({
   headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  url:"{{route('admin.pos.addToCart')}}",
  type:"POST",
  data:{'pro_id':search_id},
        //dataType:'json',
        success:function(data){
          $("#posProduct").val('');
          $("#print").html(data);
        },
        error:function(){
          toastr.error("Something went Wrong, Please Try again.");
        }
      })
  //end ajax
  	});
  });

  </script>