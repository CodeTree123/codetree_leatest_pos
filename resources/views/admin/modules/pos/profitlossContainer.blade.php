      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Profit/Loss</h2>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      <div class="modal-body">
       <table class="table">
  <thead>
    
  </thead>
  <tbody>
    <tr>
      
      <td>Total Sales</td>
      <td style="text-align: right;">{{number_format($totalSale)}}</td>
    </tr>
    <tr>
      
      <td>Product's Cost</td>
      <td style="text-align: right;">{{number_format($totalProductCost)}}</td>
    </tr>
    <tr>
     
      <td>Expense</td>
      <td style="text-align: right;">{{number_format($totalExpense)}}</td>
    </tr>
    <tr>
     
      <td><b>Profit</b></td>
      <td style="text-align: right;" ><b>{{number_format($profit)}}</b></td>
    </tr>
  </tbody>
</table>
      </div>