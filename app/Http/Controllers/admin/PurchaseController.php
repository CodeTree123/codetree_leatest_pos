<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Supplier;
use App\Products;
use App\Purchase;
use App\Stock;
use App\System;
use App\Store;
use App\PurchaseProductList;
use Illuminate\Support\Facades\DB;
use Cart;
use Illuminate\Support\Facades\Auth;
use App\Payment;

class PurchaseController extends Controller
{
  public function searchProduct(Request $request)
  {
    $products = Products::select('id', 'name')
      ->where('name', 'like', '%' . $request->term . '%')
      ->limit(10)
      ->get();
    return response()->json($products);
  }

  public function searchSupplier(Request $request)
  {
    $suppliers = Supplier::select('id', 'company', 'name')
      ->where('company', 'like', '%' . $request->term . '%')
      ->limit(5)
      ->get();

    return response()->json($suppliers);
  }
  public function purchaseAdd()
  {
    $stores = Store::all();
    $suppliers = Supplier::all();
    return view('admin.modules.purchase.purchaseAdd')->with([
      'suppliers' => $suppliers,
      'stores' => $stores,
    ]);
  }

  public function productAddTopurchase(Request $request)
  {
    $product = DB::table('products')
      ->select('id', 'name', 'purchase_price')
      ->where('id', $request->pro_id)
      ->first();
    Cart::add($product->id, $product->name, 1, $product->purchase_price);
    return 1;
  }

  public function removeItem($rowId)
  {
    Cart::remove($rowId);
    return redirect()->route('admin.purchaseAdd');
  }
  public function updateQty(Request $request)
  {
    $rowId = $request->rowId;
    $qty = $request->qty;
    Cart::update($rowId, ['qty' => $qty]);
  }

  public function removeAllItem()
  {
    Cart::destroy();
    return redirect()->route('admin.purchaseAdd');
  }

  public function updateProductQuantity(Request $request)
  {
    $request->validate([
      'rowId' => 'required',
      'quantity' => 'required',
    ]);
    Cart::update($request->rowId, 2);
    //Cart::update($request->rowId, ['qty' =>$request->quantity]);
    return 1;
  }

  public function purchaseSave(Request $request)
  {
    if (Cart::content()->isEmpty()) {
      return redirect()->back()->withErrors(['message' => 'Have you forgotten to select the product or click on the + button? ']);
    }
    $request->validate([
      'purchase_date' => 'required',
      'supplier_id' => 'required',
      'grand_total' => 'required|numeric|gt:0',

    ], [
      'supplier_id.required' => 'Please select a Supplier for the Products',
    ]);

    //generate purchase code
    $purchases = Purchase::all();
    $total_purchase = count($purchases) + 1;
    $codePrefix = DB::table('systems')->where('id', 1)->value('purchaseCode');
    $code = $codePrefix . '-' . $total_purchase;
    //uploads file
    if ($request->hasFile('documents')) {
      $image_name = $request->file('documents');
      $random_name = $image_name->getClientOriginalName();

      $directory = 'public/uploads/purchase_document';
      $dbfile = $directory . $random_name;
      $image_name->move($directory, $dbfile);
      $documents = $dbfile;
    } else {
      $documents = null;
    }

    $due = $request->grand_total - ($request->paid_amount + $request->discount);

    $purchaseProduct = new PurchaseProductList;
    $purchase = new Purchase;
    $purchase->code = $code;
    $purchase->grand_total = $request->grand_total;
    $purchase->paid_amount = $request->paid_amount;
    $purchase->due = $due;
    $purchase->discount = $request->discount;
    $purchase->purchase_date = $request->purchase_date;
    $purchase->reference = $request->reference;
    $purchase->store_id = $request->store_id;
    $purchase->supplier_id = $request->supplier_id;
    $purchase->is_received = $request->is_received;
    $purchase->note = $request->note;
    $purchase->documents = $documents;
    $purchase->import_by = Auth::user()->id;

    $pay = Payment::all();
    $pay = count($pay) + 1;
    $paycode = 'PAY-' . date('Y-m-d') . '/' . $pay;

    $payment = new Payment;
    $payment->reference = $paycode;
    $payment->purchasereference = $code;
    $payment->type = 'paid';
    $payment->amount = $request->paid_amount;
    $payment->paidBy = $request->paidBy;
    $payment->pDate = $request->purchase_date;
    $payment->transectionBy = Auth::user()->id;


    try {
      $purchase->save();
      $payment->save();
      $purchase_id = $purchase->id;


      foreach (Cart::content() as $product) {
        $purchaseProduct = new PurchaseProductList;
        $pro_id = $product->id;
        $pro_qty = $product->qty;

        // $stock=DB::table('stocks')->where('pro_id',$pro_id)->value('stock');
        // $update_stock=$stock+$pro_qty;

        $purchaseProduct->purchase_id = $purchase_id;
        $purchaseProduct->pro_id = $pro_id;
        $purchaseProduct->qty = $pro_qty;
        $purchaseProduct->unit_price = $product->price;
        $purchaseProduct->subtotal = $product->subtotal;
        $purchaseProduct->store_id = $request->store_id;

        try {
          $purchaseProduct->save();

          // DB::table('stocks')->where('pro_id',$pro_id)->update(['stock'=>$update_stock,'last_import'=>$pro_qty]);
        } catch (\Exception $e) {
          session()->flash('error-message', $e->getMessage());
          return redirect()->back();
        }
      } //end foreach loop

      Toastr::success('Purchase added Successfully.');
      Cart::destroy();

      return redirect()->route('admin.modules.purchase.purchaseView', $purchase_id);
    } catch (\Exception $e) {
      session()->flash('error-message', $e->getMessage());
      return redirect()->back();
    }
  }
  public function purchaseList()
  {

    $purchaseLists = Purchase::paginate(10);
    return view('admin.modules.purchase.purchaseList')->with([
      'purchaseLists' => $purchaseLists,
    ]);
  }

  //purchase details of single purchasaae
  public function purchaseDetails(Request $request)
  {
    $id = $request->purchase_id;
    $billInfo = DB::table('purchases')
      ->leftjoin('suppliers', 'suppliers.id', '=', 'purchases.supplier_id')
      ->select('purchases.*', 'suppliers.name', 'suppliers.email', 'suppliers.address', 'suppliers.mobile')
      ->where('purchases.id', $id)
      ->first();
    $billProduct = DB::table('purchase_product_lists')
      ->join('products', 'products.id', '=', 'purchase_product_lists.pro_id')
      ->select('purchase_product_lists.*', 'products.name')
      ->where('purchase_product_lists.purchase_id', $id)
      ->get();
    return view('admin.modules.purchase.purchaseDetails')->with(['billInfo' => $billInfo, 'billProduct' => $billProduct]);
  }


  //view the invoice details after make a sell
  public function purchaseView($id)
  {

    $system = System::first();
    $billInfo = DB::table('purchases')
      ->leftJoin('suppliers', 'suppliers.id', '=', 'purchases.supplier_id')
      ->join('stores', 'stores.id', '=', 'purchases.store_id')
      ->select(
        'purchases.*',
        'suppliers.name as supplier_name',
        'suppliers.email',
        'suppliers.address',
        'suppliers.mobile',
        'stores.name as store_name'  // Alias to avoid conflict
      )
      ->where('purchases.id', $id)
      ->first();


    $billProduct = DB::table('purchase_product_lists')
      ->join('products', 'products.id', '=', 'purchase_product_lists.pro_id')
      ->select('purchase_product_lists.*', 'products.name')
      ->where('purchase_product_lists.purchase_id', $id)
      ->get();

    // return compact('system', 'billInfo', 'billProduct');
    return view('admin.modules.purchase.purchaseView')->with(['system' => $system, 'billInfo' => $billInfo, 'billProduct' => $billProduct]);
  }

  public function updatePurchase(Request $request)
  {
    // Validate the request
    $request->validate([
      'purchase_id' => 'required',
      'newly_paid_amount' => 'required|numeric|min:0',
    ]);

    // Find the purchase record
    $purchase = Purchase::findOrFail($request->purchase_id);
    // Add the newly paid amount to the existing paid_amount
    $purchase->paid_amount += $request->newly_paid_amount;

    // Check if the total paid amount + discount equals grand_total
    $total_paid = $purchase->paid_amount + $purchase->discount;


    if ($total_paid >= $purchase->grand_total) {
      $purchase->is_received = 1;  // Set status to 'Received'
      $purchase->due = 0; // No due balance
    } else {
      $purchase->is_received = 2;  // Set status to 'Pending'
      $purchase->due = $purchase->grand_total - $total_paid; // Calculate remaining due balance
    }
    try {
      // Save the updated purchase
      $purchase->save();

      Toastr::success('Purchase bill updated successfully.');
      return redirect()->route('admin.purchaseList');
    } catch (\Exception $e) {

      dd($e);
      session()->flash('error-message', $e->getMessage());
      return redirect()->back();
    }
  }



  //search sale by sale code or id
  public function searchPurchaseByCode(Request $request)
  {
    $key = $request->key;

    $purchases = Purchase::where('id', 'like', '%' . $request->key . '%')
      ->orWhere('code', 'like', '%' . $request->key . '%')
      ->get();

    return view('admin.modules.purchase.searchPurchase')->with(['purchaseLists' => $purchases]);
  }
  //purchase details
  public function purchaseDetailsById($id)
  {
    $billInfo = DB::table('purchases')
      ->join('suppliers', 'suppliers.id', '=', 'purchases.supplier_id')
      ->select('purchases.*', 'suppliers.name', 'suppliers.email', 'suppliers.address', 'suppliers.mobile')
      ->where('purchases.id', $id)
      ->first();
    $billProduct = DB::table('purchase_product_lists')
      ->join('products', 'products.id', '=', 'purchase_product_lists.pro_id')
      ->select('purchase_product_lists.*', 'products.name')
      ->where('purchase_product_lists.purchase_id', $id)
      ->get();
    return view('admin.modules.purchase.purchaseInformation')->with(['billInfo' => $billInfo, 'billProduct' => $billProduct]);
  }
  //purchase search by purchase date
  public function searchPurchasedate(Request $request)
  {

    $purchases = Purchase::where('purchase_date', $request->key)
      ->get();
    return view('admin.modules.purchase.searchPurchase')->with(['purchaseLists' => $purchases]);
  }
  //delete purchase
  public function purchaseDelete(Request $request)
  {
    $request->validate([
      'id' => 'required|numeric',
    ]);
    try {
      $code = DB::table('purchases')->where('id', $request->id)->value('code');
      DB::table('payments')->where('purchasereference', $code)->delete();
      DB::table('purchases')->where('id', $request->id)->delete();
      DB::table('purchase_product_lists')->where('purchase_id', $request->id)->delete();
      Toastr::success('Purchase deleted');
      return redirect()->back();
    } catch (\Exception $e) {
      session()->flash('error-message', $e->getMessage());
      return redirect()->back();
    }
  }
}
