<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sales;
use App\SalesProducts;
use App\Store;
use App\Customer;
use App\Products;
use App\Biller;
use App\System;
use App\ChequeInfo;
use Illuminate\Support\Facades\DB;
use Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Payment;

class SalesController extends Controller
{
  public function salesList()
  {
    $sales = Sales::paginate(10);

    return view('admin.modules.sales.salesList')->with(['sales' => $sales]);
  }
  public function posSale()
  {
    return view('admin.modules.sales.posSale');
  }

  //sales add from
  public function salesAdd()
  {
    $billers = Biller::all();
    $stores = Store::all();
    $products = Products::all();
    $customers = Customer::limit(10)->get();
    return view('admin.modules.sales.salesAdd')->with([
      'customers' => $customers,
      'products' => $products,
      'stores' => $stores,
      'billers' => $billers,
    ]);
  }

  public function getCustomers(Request $request)
  {
    $search = $request->input('q');
    $customers = Customer::where('name', 'like', "%$search%")
      ->limit(10)
      ->get();

    $formattedCustomers = $customers->map(function ($customer) {
      return ['id' => $customer->id, 'text' => $customer->name . ' (' . $customer->mobile . ')'];
    });

    return response()->json($formattedCustomers);
  }

  public function getProducts(Request $request)
  {
    $search = $request->input('q');
    $products = Products::where('name', 'like', "%$search%")
      ->limit(10)
      ->get();

    $formattedProducts = $products->map(function ($product) {
      return ['id' => $product->id, 'text' => $product->name];
    });

    return response()->json($formattedProducts);
  }


  //set customer
  public function setCustomer(Request $request)
  {
    $id = $request->customerId;
    $name = DB::table('customers')->where('id', $id)->value('name');
    $mobile = DB::table('customers')->where('id', $id)->value('mobile');
    Session::put('customer', $id);
    Session::put('customerName', $name . '(' . $mobile . ')');
    return 1;
  }

  //reset customer
  public function customerReset(Request $request)
  {
    if ($request->ctype == 1) {
      session()->forget('customer');
      session()->forget('customerName');
      return 1;
    }
  }
  //set sales type
  public function setSalesType(Request $request)
  {
    if ($request->type == 'w') {
      Session::put('saleType', $request->type);
      Session::put('saleValue', 'Wholesale');
    } else {
      Session::put('saleType', $request->type);
      Session::put('saleValue', 'General Sale');
    }

    return 1;
  }
  //destory sales type
  public function destorySalesType(Request $request)
  {
    if ($request->dtype == 1) {
      $request->session()->forget('saleType');
      $request->session()->forget('saleValue');
      return 1;
    }
  }
  //product add to sale sales cart
  public function productAddToSale(Request $request)
  {
    if ($request->saleType == 'w') {
      $product_name = DB::table('products')->where('id', $request->pro_id)->value('name');
      $product_id = DB::table('products')->where('id', $request->pro_id)->value('id');
      $whole_sell = DB::table('products')->where('id', $request->pro_id)->value('whole_sell');

      Cart::add($product_id, $product_name, 1, $whole_sell);
      return 1;
    } else {
      $product_name = DB::table('products')->where('id', $request->pro_id)->value('name');
      $product_id = DB::table('products')->where('id', $request->pro_id)->value('id');
      $sell_price = DB::table('products')->where('id', $request->pro_id)->value('sell_price');
      Cart::add($product_id, $product_name, 1, $sell_price);
      return 1;
    }
  }
  //remove item from cart
  public function removeItem($id)
  {
    Cart::remove($id);
    return redirect()->route('admin.salesAdd');
  }
  //remove all item from the cart
  public function removeAllItem()
  {
    Cart::destroy();
    session()->forget('saleDiscount');
    return redirect()->route('admin.salesAdd');
  }

  //make sale
  public function MakeSale(Request $request)
  {

    $request->validate([
      'paid_amount' => 'numeric',
      'customer_id' => 'required|numeric',
      'sales_date' => 'required',

    ]);

    $last_sale = count(Sales::all()) + 1;
    $prefix = System::where('id', 1)->value('invoiceCode');
    $code = $prefix . '-' . sprintf("%08d", $last_sale);

    if (Session::has('saleDiscount')) {
      $totalAmount = Cart::total();
      $totalAmount = (float) str_replace(',', '', $totalAmount);
      $tax = Cart::tax();
      $tax = (float) str_replace(',', '', $tax);
      $discount = Session::get('saleDiscount');
      $totalAmount = ($totalAmount - $discount);
    } else {
      $discount = Cart::discount();
      $discount = (float) str_replace(',', '', $discount);
      $totalAmount = Cart::total();
      $tax = Cart::tax();
      $tax = (float) str_replace(',', '', $tax);
      $totalAmount = (float) str_replace(',', '', $totalAmount);
    }
    $due = $totalAmount - $request->paid_amount;

    $sales = new Sales;
    $sales->sales_date = $request->sales_date;
    $sales->code = $code;
    $sales->biller_id = $request->biller_id;
    $sales->store_id = $request->store_id;
    $sales->grand_total = $totalAmount;
    $sales->discount = $discount;
    $sales->tax = $tax;
    $sales->paid_amount = $request->paid_amount;
    $sales->due = $due;
    $sales->payment_type = $request->payment_type;
    $sales->payment_note = $request->payment_note;
    $sales->cateated_by = Auth::user()->id;
    $sales->sales_type = $request->sales_type;
    $sales->customer_id = $request->customer_id;

    $pay = Payment::all();
    $pay = count($pay) + 1;
    $paycode = 'PAY-' . date('Y-m-d') . '/' . $pay;

    $payment = new Payment;
    $payment->reference = $paycode;
    $payment->salereference = $code;
    $payment->type = 'Received';
    $payment->amount = $request->paid_amount;
    $payment->paidBy = $request->payment_type;
    $payment->pDate = $request->sales_date;
    $payment->transectionBy = Auth::user()->id;

    try {
      $sales->save();
      $payment->save();

      foreach (Cart::content() as $product) {
        $saleProduct = new SalesProducts;
        $proCost = DB::table('products')->where('id', $product->id)->value('purchase_price');
        $totalCost = $proCost * $product->qty;
        $totalSale = $product->subtotal;
        $revenue = $totalSale - $totalCost;

        $saleProduct->sales_date = $request->sales_date;
        $saleProduct->sale_id = $sales->id;
        $saleProduct->pro_id = $product->id;
        $saleProduct->unit_cost = $proCost;
        $saleProduct->unit_price = $product->price;
        $saleProduct->qty = $product->qty;
        $saleProduct->subtotal = $product->subtotal;
        $saleProduct->product_revenue = $revenue;
        $saleProduct->store_id = $request->store_id;
        $saleProduct->save();
      }
      $cheque = new ChequeInfo;
      if ($request->payment_type == 'Cheque') {
        $cheque->reference = $sales->id;
        $cheque->cheque_number = $request->cheque_number;
        $cheque->user_id = $request->customer_id;
        $cheque->type = 'sale';
        $cheque->bank_name = $request->bank_name;
        $cheque->save();
      }

      Toastr::success('Sales  added successfully');
      Cart::destroy();
      $request->session()->forget('saleType');
      $request->session()->forget('customer');
      $request->session()->forget('customerName');
      $request->session()->forget('saleValue');
      $request->session()->forget('saleDiscount');

      return route('admin.sales.invoiceView', $sales->id);
    } catch (\Exception $e) {

      return 1;
    }
  }
  //view the invoice details after make a sell
  public function invoiceView($id)
  {
    Sales::findorFail($id);
    $system = System::first();
    $billInfo = DB::table('sales')
      ->join('customers', 'customers.id', '=', 'sales.customer_id')
      ->select('sales.*', 'customers.name', 'customers.email', 'customers.address', 'customers.mobile')
      ->where('sales.id', $id)
      ->first();
    $billProduct = DB::table('sales_products')
      ->join('products', 'products.id', '=', 'sales_products.pro_id')
      ->select('sales_products.*', 'products.name')
      ->where('sales_products.sale_id', $id)
      ->get();
    return view('admin.modules.sales.invoiceView')->with(['billProduct' => $billProduct, 'billInfo' => $billInfo, 'system' => $system]);
  }
  //sales details of a single sale
  public function salesDetails(Request $request)
  {
    $id = $request->saleId;
    $billInfo = DB::table('sales')
      ->join('customers', 'customers.id', '=', 'sales.customer_id')
      ->select('sales.*', 'customers.name', 'customers.email', 'customers.address', 'customers.mobile')
      ->where('sales.id', $id)
      ->first();
    $billProduct = DB::table('sales_products')
      ->join('products', 'products.id', '=', 'sales_products.pro_id')
      ->select('sales_products.*', 'products.name')
      ->where('sales_products.sale_id', $id)
      ->get();
    return view('admin.modules.sales.salesDetails')->with(['billInfo' => $billInfo, 'billProduct' => $billProduct, 'billerName' =>$request->billerName]);
  }
  public function updateTax(Request $request)
  {
    $tax = $request->tax;
    Cart::setGlobalTax($tax);
    return 1;
  }

  public function SalesDiscount(Request $request)
  {
    Cart::setGlobalDiscount(0);
    $request->session()->forget('saleDiscount');

    if ($request->discount_type == 'persentase') {
      $total = Cart::subtotal();
      $total = (float) str_replace(',', '', $total);
      $discount = ($total * $request->discount) / 100;
      Session::put('saleDiscount', $discount);

      return 1;
    } elseif ($request->discount_type == 'total') {
      $discount = $request->discount;
      Session::put('saleDiscount', $discount);
      return 1;
    } else {
      return 0;
    }
  }
  //get product details
  public function getProductInfo(Request $request)
  {
    $rowId = $request->rowId;
    $proId = $request->proId;
    $saleType = $request->saleType;
    $productInfos = DB::table('products')->where('id', $proId)->first();
    return view('admin.modules.sales.productUpdate')->with(['productInfos' => $productInfos, 'rowId' => $rowId, 'saleType' => $saleType]);
  }
  //update product price
  public function productPriceUpdate(Request $request)
  {
    $request->validate([
      'rowId' => 'required',
      'sell_price' => 'required',
      'name' => 'required',
    ]);
    $rowId = $request->rowId;
    Cart::update($rowId, ['price' => $request->sell_price, 'name' => $request->name]);

    Toastr::success('Product Update Successfully');
    return redirect()->route('admin.salesAdd');
  }
  //search sale by sale code or id
  public function searchSalesByCode(Request $request)
  {
    $key = $request->key;

    $sales = Sales::where('id', 'like', '%' . $request->key . '%')
      ->orWhere('code', 'like', '%' . $request->key . '%')
      ->get();
    return view('admin.modules.sales.saleSearch')->with(['sales' => $sales]);
  }

  public function searchSalesByDate(Request $request)
  {
    $key = $request->key;

    $sales = Sales::where('sales_date', $key)
      ->get();

    return view('admin.modules.sales.saleSearch')->with(['sales' => $sales]);
  }
  //salesView
  public function salesView($id)
  {
    $billInfo = DB::table('sales')
      ->join('customers', 'customers.id', '=', 'sales.customer_id')
      ->select('sales.*', 'customers.name', 'customers.email', 'customers.address', 'customers.mobile')
      ->where('sales.id', $id)
      ->first();
    $billProduct = DB::table('sales_products')
      ->join('products', 'products.id', '=', 'sales_products.pro_id')
      ->select('sales_products.*', 'products.name')
      ->where('sales_products.sale_id', $id)
      ->get();
    return view('admin.modules.sales.salesInformation')->with(['billInfo' => $billInfo, 'billProduct' => $billProduct]);
  }
  //delete sale
  public function deleteSale(Request $request)
  {
    try {
      $code = DB::table('sales')->where('id', $request->id)->value('code');

      DB::table('payments')->where('salereference', $code)->delete();
      DB::table('sales')->where('id', $request->id)->delete();
      DB::table('sales_products')->where('sale_id', $request->id)->delete();

      Toastr::success('Sale deleted successfully');
      return redirect()->route('admin.salesList');
    } catch (\Exception $e) {
      session()->flash('error-message', $e->getMessage());
      return redirect()->back();
    }
  }
}
