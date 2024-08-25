<div class="modal-header">
        <h2 class="modal-title">Return due</h2>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
       <div class="modal-body">

               
          @csrf
          <input type="hidden" name="customer_id" value="{{$customerInfo->id}}">
          <div class="form-row">
            <div class="form-group col-12">
            <label>Paid Date</label>
            <input type="date" class="form-control" name="paid_date">
            <input type="hidden" name="customer_id" value="{{$customerInfo->id}}">
           </div>
           <div class="form-group col-12">
            <label>Current Due</label>
            <input type="text" class="form-control" name="current_due" value="{{$currentDue}}" readonly="">
            <input type="hidden" name="customer_id" value="{{$customerInfo->id}}">
           </div>
            <div class="form-group col-md-12">
              <label>Payment Method</label>
               <select class="custom-select" name="payment_method">
                
           <option value="cash">Cash</option>
           
          </select>
            </div>
             <div class="form-group col-md-12">
              <label>Amount</label>
               <input type="number" class="form-control" name="amount" placeholder="Paid Cash">
            </div>
            <div class="form-group col-md-12">
              <label>Payment Note</label>
               <textarea class="form-control" rows="3" name="paymentNote"></textarea> 
            </div>
          </div>
        
      </div>
      <div class="modal-footer">
        
         <input type="submit" class="btn btn-primary" value="Payment">
        
      </div>
