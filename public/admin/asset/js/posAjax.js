$(document).ready(function(){
    $(".cat_btn").click(function(){
      $("#category_area").toggle(700);
      $("#subcategory_area").hide('slow');
      $("#brands_area").hide('slow');
    });
  });
  $(document).ready(function(){
    $(".subcat_btn").click(function(){
      $("#subcategory_area").toggle('slow');
      $("#brands_area").hide('slow');
      $("#category_area").hide('slow');
    });
  });
  $(document).ready(function(){
    $(".brands_btn").click(function(){
      $("#brands_area").toggle('slow');
      $("#subcategory_area").hide('slow');
      $("#category_area").hide('slow');
    });
  });
  $(document).ready(function(){
    $(".rightdiv").click(function(){
      $("#brands_area").hide('slow');
      $("#subcategory_area").hide('slow');
      $("#category_area").hide('slow');
    });
  });

  $(document).ready(function(){
    $('#poscustomer').select2({
      theme: "bootstrap"
    });
//tax add function
$(".tax_add_btn").click(function(){
var tax=$("#tax_input").val();
//ajax
  $.ajax({
   headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  url:"{{route('admin.pos.updateTax')}}",
  type:"POST",
  data:{'tax':tax},
        //dataType:'json',
        success:function(data){
          $("#print").html(data);
         //data-dismiss=".tax_modal";
          $('.tax_modal').modal('hide');
        },
        error:function(){
          alert("error ase");
        }
      });

  //end ajax
});
//discount add function
// $(".discount_add_btn").click(function(){
// var discount=$("#discount_input").val();
// if($.isNumeric(discount)){
//   $.ajax({
//    headers: {
//     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//   },
//   url:"{{route('admin.pos.updateDiscount')}}",
//   type:"POST",
//   data:{'discount':discount},
//         //dataType:'json',
//         success:function(data){
//           $("#print").html(data);
//          //data-dismiss=".tax_modal";
//           $('.discount_modal').modal('hide');
//         },
//         error:function(){
//           alert("Something went wrong .Please try again.");
//         }
//       });
// }else{
//   alert('Please Enter Currect Number.');
// }
// //ajax
  

//   //end ajax
// });
//search product by name or id or code
$("#posProduct").keyup(function(){
  var key=$(this).val();
  
  //ajax
  $.ajax({
   headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  url:"{{route('admin.pos.searchProduct')}}",
  type:"POST",
  data:{'key':key},
        //dataType:'json',
        success:function(data){
         // console.log(data);
         $("#product_list").html(data);
          //alert(data);

        },
        error:function(){
          alert("error ase");
        }
      });

  //end ajax

});
// //add product by barcode scaner
// $("#posProduct").on('change',function(){
// var pro_id=$(this).val();

// addToCart(pro_id);
// });
//add product to cart by clicking search option
$(document).on('click','.addToCart',function(){
  var proId=$(this).data('id');
  addToCart(proId);
});

//add product to cart by clicking button
$(".productItem").click(function(){
  var proId=$(this).data('pro_id');
  addToCart(proId);
});

//product add to cart 
function addToCart(proId){
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
        //  console.log(data);
          $("#print").html(data);
        },
        error:function(){
          alert("error ase");
        }
      });

  //end ajax
}
//quantiry update of cart items
$(".qty_update_input").on('change',function(){
 var rowId=$(this).data('qty');
 var qty=$(this).val();
 if($.isNumeric(qty)){
//ajax
 if(qty!=0){
 $.ajax({
   headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  url:"{{route('admin.pos.updateQty')}}",
  type:"POST",
  data:{'rowId':rowId,'qty':qty},
        //dataType:'json',
        success:function(data){
          console.log(data);
           $("#print").html(data);
        },
        error:function(){
          alert("Something Went wrong.Please try again.");
        }
      });
}
  //end ajax
 }else{
  alert('Please Enter Correct Number.');
 }
 
 
});
//view all brands product
$(".brand_btn").click(function(){
  var brand_id=$(this).data('brand_id');
  $('.product_list').html('');
 //ajax
 $.ajax({
   headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  url:"{{route('admin.pos.searchProductByBrandId')}}",
  type:"POST",
  data:{'brand_id':brand_id},
        //dataType:'json',
        success:function(data){
          console.log(data);
          $("#brands_area").hide();
          $('.product_list').html(data);
        },
        error:function(){
          alert("error ase");
        }
      });

  //end ajax

});
//view all categoty product
$(".category_btn").click(function(){
  var cat_id=$(this).data('cat_id');
  $('.product_list').html('');
 //ajax
 $.ajax({
   headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  url:"{{route('admin.pos.searchProductByCatId')}}",
  type:"POST",
  data:{'cat_id':cat_id},
        //dataType:'json',
        success:function(data){
          console.log(data);
          $("#category_area").hide();
          $('.product_list').html(data);
        },
        error:function(){
          alert("error ase");
        }
      });

  //end ajax

});
//view all sub-categoty product
$(".subcategoty_btn").click(function(){
  var subcat_id=$(this).data('subcat_id');
  $('.product_list').html('');
 //ajax
 $.ajax({
   headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  url:"{{route('admin.pos.searchProductBySubcatId')}}",
  type:"POST",
  data:{'subcat_id':subcat_id},
        //dataType:'json',
        success:function(data){
          console.log(data);
          $("#subcategory_area").hide();
          $('.product_list').html(data);
        },
        error:function(){
          alert("error ase");
        }
      });

  //end ajax

});
//payment screen
$(".payment-btn").click(function(){
var customer_id=$("#poscustomer").val();
$(".payment-screen").html(''); 
  //ajax
  $.ajax({
   headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  url:"{{route('admin.pos.paymentScreen')}}",
  type:"POST",
  data:{'customer_id':customer_id},
              //dataType:'json',
              success:function(data){
               $(".payment-screen").html(data); 
                     

             },
             error:function(){
              alert("error ase");
            }
          });

        //end ajax
});
//bill preview
$(".bill_preview").click(function(){
  var customer_id=$("#poscustomer").val();
  //ajax
  $.ajax({
   headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  url:"{{route('admin.pos.billPreview')}}",
  type:"POST",
  data:{'customer_id':customer_id},
              //dataType:'json',
              success:function(data){
               // console.log(data);
               $("#bill_details").html(data);        

             },
             error:function(){
              alert("error ase");
            }
          });

        //end ajax
      })
//view customer details
$(".view_customer").click(function(){
  var customer_id=$("#poscustomer").val();

       //ajax
       $.ajax({
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:"{{route('admin.pos.CustomerDetails')}}",
        type:"POST",
        data:{'customer_id':customer_id},
              //dataType:'json',
              success:function(data){
               // console.log(data);
               $("#customer_details").html(data);        

             },
             error:function(){
              alert("error ase");
            }
          });

        //end ajax
      });
//remove item from cart list
$(".removeItemBtn").click(function(){
 var rowId=$(this).data('cartrowrd');
 //ajax
 $.ajax({
   headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  url:"{{route('admin.pos.removeItem')}}",
  type:"POST",
  data:{'rowId':rowId},
        //dataType:'json',
        success:function(data){

         $("#print").html(data);
       },
       error:function(){
        alert("error ase");
      }
    });

  //end ajax

});
//readonly
$('#toogle-customer-read-attr').click(function() {
  var nst = $('#poscustomer').is('[readonly]') ? false : true;
  $('#poscustomer').select2('readonly', nst);
  return false;
});
});

//category change dropdown
$(document).ready(function(){
   $("#category").on('change',function(){
    var catId=$(this).val();
         //ajax

         $.ajax({
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url:"{{route('admin.subcategory.selectSubcategory')}}",
          type:"POST",
          data:{'catId':catId},
          dataType:'json',
          success:function(data){
            console.log(data);
            $('#subcategory').empty();
            $.each(data,function(index,subcatObj){

              $("#subcategory").append('<option value ="'+subcatObj.id+'">'+subcatObj.name+'</option>');
            });

          },
          error:function(){
            alert("error ase");
          }
        });
     //endajax
   });
 });