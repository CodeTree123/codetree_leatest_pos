        <div class="col-sm-6">
          <h2><b>Basic Info</b></h2>
        <hr>
       <p><b>Name :</b> {{$customerInfo->name}}</p>
       <p><b>Mobile :</b> {{$customerInfo->mobile}}</p>
       <p><b>Email :</b> {{$customerInfo->email}}</p>
       <p><b>Address :</b> {{$customerInfo->address}}</p>
        </div>
        <div class="col-sm-6">
          <h2><b>Shopping Info</b></h2>
        <hr>
        
       <p><b>Total Shopping :</b> {{number_format($totalShopping)}}</p>
       <p><b>Remain Due :</b> {{number_format($totalDue)}}</p>
       <p><b>Deposit :</b> </p>
        </div>