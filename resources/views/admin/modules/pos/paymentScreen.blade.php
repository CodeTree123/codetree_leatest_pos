     <div class="row">
       <div class="col-10 p-0">
        <form method="post" action="{{route('admin.pos.makeInvoice')}}">
          @csrf

          <div class="from-row row">
            <div class="form-group col-6">
              <label class="col-form-label">Biller</label>
              <input type="hidden" name="customer_id" value="{{$customerId}}">
              <select class="form-control" name="biller_id">
                @foreach($billers as $biller)
                <option value="{{$biller->id}}">{{$biller->name}}</option>
                @endforeach  
              </select>
            </div>
            <div class="form-group col-6">
              <label class="col-form-label">Store</label>
              <select class="form-control" name="store_id">
                @foreach($stores as $store)
                <option value="{{$store->id}}">{{$store->name}}</option>
                @endforeach  
              </select>
            </div>
          </div>

          <div class="form-row p-3 m-0 mt-2" style="background: #80808017;">
            <div class="form-group col-6">
              <label class="col-form-label">Amount</label>
              <input type="text" class="form-control" id="amount" name="paid">
            </div>
            <div class="form-group col-6">
              <label for="recipient-name" class="col-form-label">Paying By</label>
              <select class="form-control" name="payment_method">
                <option value="cash">Cash</option>
                <option value="card">Card</option>

              </select>
            </div>
            <div class="form-group col-12">
              <label>Payment Note</label>
              <textarea class="form-control" name="payment_note" rows="3"></textarea>
            </div>
          </div>
          <table class="table mt-5 border">
            <tr>
              <th>Total Items</th>
              <th style="text-align:right;">

                {{Cart::count()}}
              </th>
              <th>Total Payable</th>
              <th id="total_payable" style="text-align:right;">
                <?php
                $total=(double) str_replace(',', '', Cart::total());
                $discount=Session::get('saleDiscount');
                $gtotal=$total-$discount;
                ?>
                @if(Session::has('saleDiscount'))
                {{number_format($gtotal,2)}}
                @else
                {{Cart::total()}}
              @endif</th>
            </tr>
            <tr>
              <th>Total Paying</th>
              <th id="total_pay" style="text-align:right;">0</th>
              <th>Balance</th>
              <th id="balance" style="text-align:right;"> 
                <?php
                $total=(double) str_replace(',', '', Cart::total());
                $discount=Session::get('saleDiscount');
                $gtotal=$total-$discount;
                ?>
                @if(Session::has('saleDiscount'))
                {{number_format($gtotal,2)}}
                @else
                {{Cart::total()}}
                @endif
              </th>
            </tr>

          </table>

          <div class="col-12 p-0">
            <hr>
            <input type="submit" class="btn bg_p_primary col-12 py-3" style="border-radius:0px;" value="SUBMIT" >
          </form>
        </div>
      </div>

      <div class="col-2 pr-0 mt-4">
        <style>
          .cash-span{
            position: absolute;
            right: 0px;
            font-size: 10px;
            float: right;
            margin-top: -3px;
            color: black;
            background: white;
            padding: 5px;
            border-radius: 50%;

          }
          .cash-btn{
            width: 100%;border-radius: 0px;color:white;cursor:pointer;font-weight:bold;border-color:#ff8d0040;font-size: 20px;
          }
          .total-btn{
            width: 100%;border-radius: 0px;color:white;cursor:pointer;font-weight:bold;border-color:#ff8d0040;
          }
          .clear-btn{
            width: 100%;border-radius: 0px;color:white;cursor:pointer;font-weight:bold;border-color:#ff8d0040;
          }
        </style>
        <center>
          <h2>QUICK CASH</h2>
        </center>
        <p class="btn btn-danger mb-0 total-btn">
          <?php
          $total=(double) str_replace(',', '', Cart::total());
          $discount=Session::get('saleDiscount');
          $gtotal=$total-$discount;
          ?>
          @if(Session::has('saleDiscount'))
          {{number_format($gtotal,2)}}
          @else
          {{Cart::total()}}
          @endif
        </p>
        <p class="btn btn-warning mb-0 cash-btn one" data-note="1">1</p>
        <p class="btn btn-warning mb-0 cash-btn two" data-note="2">2</p>
        <p class="btn btn-warning mb-0 cash-btn five" data-note="5">5</p>
        <p class="btn btn-warning mb-0 cash-btn ten" data-note="10">10</p>
        <p class="btn btn-warning mb-0 cash-btn twenty" data-note="20">20</p>
        <p class="btn btn-warning mb-0 cash-btn fifty" data-note="50">50</p>
        <p class="btn btn-warning mb-0 cash-btn onehn" data-note="100">100</p>
        <p class="btn btn-warning mb-0 cash-btn fivrhn" data-note="500">500</p>
        <p class="btn btn-warning mb-0 cash-btn onek" data-note="1000">1000</p>
        <p class="btn btn-danger mb-0 clear-btn">CLEAR</p>

      </div>


      

    </div>


    <script>
      $(document).ready(function(){
        var amount=0;
        var one=0;
        var two=0;
        var ten=0;
        var five=0;
        var twenty=0;
        var fifty=0;
        var onehn=0;
        var fivrhn=0;
        var onek=0;
        $("#amount").val(amount);

        $(".cash-btn").click(function(){
          var val=$(this).data('note');
          amount+=val;
          $("#amount").val(amount);
          $("#total_pay").html(amount);
          var payable=$("#total_payable").html();
          payable =payable.split(',').join('');
          var balance=payable-amount;
          $("#balance").html(balance);

          if(val==10){
            ten+=1;
            $(".ten").html(10);
            $(".ten").append("<span class='cash-span'>"+ten+'</span>');
          }
          if(val==1){
            one+=1;
            $(".one").html(1);
            $(".one").append("<span class='cash-span'>"+one+'</span>');
          }
          if(val==2){
            two+=1;
            $(".two").html(2);
            $(".two").append("<span class='cash-span'>"+two+'</span>');
          }
          if(val==5){
            five+=1;
            $(".five").html(5);
            $(".five").append("<span class='cash-span'>"+five+'</span>');
          }
          if(val==20){
            twenty+=1;
            $(".twenty").html(20);
            $(".twenty").append("<span class='cash-span'>"+twenty+'</span>');
          }
          if(val==50){
            fifty+=1;
            $(".fifty").html(50);
            $(".fifty").append("<span class='cash-span'>"+fifty+'</span>');
          }
          if(val==100){
            onehn+=1;
            $(".onehn").html(100);
            $(".onehn").append("<span class='cash-span'>"+onehn+'</span>');
          }
          if(val==500){
            fivrhn+=1;
            $(".fivrhn").html(500);
            $(".fivrhn").append("<span class='cash-span'>"+fivrhn+'</span>');
          }
          if(val==1000){
            onek+=1;
            $(".onek").html(1000);
            $(".onek").append("<span class='cash-span'>"+onek+'</span>');
          }

          


        });
//clear payment 
$(".clear-btn").click(function(){
  amount=0;
  one=0;
  two=0;
  ten=0;
  five=0;
  twenty=0;
  fifty=0;
  onehn=0;
  fivrhn=0;
  onek=0;
  $("#amount").val(amount);
  $("#total_pay").html(amount);
  var balance=$("#total_payable").html()-amount;
  $("#balance").html(balance);
  $(".ten").html(10);
  $(".one").html(1);
  $(".two").html(2);
  $(".five").html(5);
  $(".twenty").html(20);
  $(".fifty").html(50); 
  $(".onehn").html(100);
  $(".fivrhn").html(500);
  $(".onek").html(1000);
});

        //add payment
        $("#amount").keyup(function(){
         var inputAmount=$(this).val();
         if(inputAmount==''){
             //for null value
           }else{
             if($.isNumeric(inputAmount))
             {
               var remainBalance=0;
               var payable=$("#total_payable").html();
               payable =payable.split(',').join('');

               remainBalance=payable-inputAmount;
               $("#total_pay").html(inputAmount);
               $("#balance").html(remainBalance);
             }else{
               toastr.error("Please Enter Correct Number.");
             }
           }

         });

      });

    </script>


