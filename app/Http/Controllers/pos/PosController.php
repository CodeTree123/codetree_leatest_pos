<?php

namespace App\Http\Controllers\pos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Products;
use App\Brands;
use App\Customer;
use App\SubCategory;
use App\CustomerGroup;
use App\ExpenseCategory;
use App\System;
use App\Units;
use App\Supplier;
use App\Biller;
use App\Store;
use App\Sales;
use App\SalesProducts;
use App\Expense;
use Cart;
use Auth;
use Image;
use Session;
use App\admin;
use App\Payment;

class PosController extends Controller
{

  public function __construct()
  {
    $this->middleware('permission:pos module');
  }
  public function index()
  {
    $customers = Customer::all();
    $allProducts = Products::with('promotions')->get();
    $categories = Category::all();
    $brands = Brands::all();
    $expenseCats = ExpenseCategory::all();
    $subcategories = SubCategory::all();
    $customerGroups = CustomerGroup::all();
    $suppliers = Supplier::all();
    $units = Units::all();
    $billers = Biller::all();
    $productCode = DB::table('systems')->where('id', '1')->value('productCode');
    $stores = Store::all();

    
    return view('admin.modules.pos.posScreen')->with([
      'allProducts' => $allProducts,
      'categories' => $categories,
      'brands' => $brands,
      'customers' => $customers,
      'subcategories' => $subcategories,
      'customerGroups' => $customerGroups,
      'expenseCats' => $expenseCats,
      'suppliers' => $suppliers,
      'units' => $units,
      'productCode' => $productCode,
      'billers' => $billers,
      'stores' => $stores,
    ]);
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
  public function searchProduct(Request $request)
  {
    if (!empty($request->key)) {
      $result = DB::table('products')
        ->where('id', 'like', '%' . $request->key . '%')
        ->orWhere('name', 'like', '%' . $request->key . '%')
        ->orWhere('code', 'like', '%' . $request->key . '%')
        ->orWhere('bar_code', 'like', '%' . $request->key . '%')
        ->get();
    } else {
      $result = Products::all();
      return view('admin.modules.pos.searchProduct')->with(['productList' => $result]);
    }
    if (!empty($result)) {
      return view('admin.modules.pos.searchProduct')->with(['productList' => $result]);
    } else {
      echo "No Product Found.";
    }
  }

  public function addToCart(Request $request)
  {
      // Fetch the product with its promotions using Eloquent relationships
      $product = Products::with('promotions')->where('id', $request->pro_id)->first();
  
      // Default to the original price
      $finalPrice = $product->sell_price;
  
      // Check if the product has promotions and calculate the discounted price
      if ($product->promotions->isNotEmpty()) {
          // Get the latest promotion based on the start date (if multiple exist)
          $latestPromotion = $product->promotions
          ->where('status', 'Active')  // Only consider active promotions
          ->sortByDesc('created_at')
          ->first();
  
          if ($latestPromotion) {
              $promotionAmount = $latestPromotion->promotion_ammount; // Get the discount percentage
              $finalPrice = $product->sell_price - ($product->sell_price * ($promotionAmount / 100));
          }
      }
  
      // Add the product to the cart with the discounted price (if applicable)
      Cart::add($product->id, $product->name, 1, $finalPrice);
  
      // Return the updated cart view
      return view('admin.modules.pos.cartProduct');
  }
  



  public function addToCartWithBar(Request $request)
  {
      // Fetch the product by barcode along with its promotions using Eloquent relationships
      $product = Products::with('promotions')->where('bar_code', $request->bar_id)->first();
  
      // Default to the original price
      $finalPrice = $product->sell_price;
  
      // Check if the product has promotions and calculate the discounted price
      if ($product->promotions->isNotEmpty()) {
          // Get the latest promotion based on the start date (if multiple exist)
          $latestPromotion = $product->promotions
          ->where('status', 'Active')  // Only consider active promotions
          ->sortByDesc('created_at')
          ->first();
  
          if ($latestPromotion) {
              $promotionAmount = $latestPromotion->promotion_ammount; // Get the discount percentage
              $finalPrice = $product->sell_price - ($product->sell_price * ($promotionAmount / 100));
          }
      }
  
      // Add the product to the cart with the discounted price (if applicable)
      Cart::add($product->id, $product->name, 1, $finalPrice);
  
      // Return the updated cart view
      return view('admin.modules.pos.cartProduct');
  }
  
  public function removeItem(Request $request)
  {
    $rowId = $request->rowId;
    Cart::remove($rowId);
    //return redirect()->route('admin.posModule');
    return view('admin.modules.pos.cartProduct');
  }

  public function updateTax(Request $request)
  {
    $tax = $request->tax;
    Cart::setGlobalTax($tax);
    return view('admin.modules.pos.cartProduct');
  }

  public function updateDiscount(Request $request)
  {
      Cart::setGlobalDiscount(0);
      $request->session()->forget('saleDiscount');
  
      // Calculate and store the discount in the session
      if ($request->percentage == "true") {
          $total = Cart::subtotal();
          $total = (float) str_replace(',', '', $total);
          $discount = ($total * $request->discount) / 100;
          Session::put('saleDiscount', $discount);
      } elseif ($request->percentage == "false") {
          $discount = $request->discount;
          Session::put('saleDiscount', $discount);
      }
  
      // Save or update promo code usage in the `customer_promocode` table
      $customer_id = session('customer');  // Retrieve the customer ID from the session
      $promocode_id = $request->promocode_id;  // Get the promo code ID from the request
  
      // Check if the customer has already used this promo code
      $existingRecord = DB::table('customer_promocode')
          ->where('customer_id', $customer_id)
          ->where('promocode_id', $promocode_id)
          ->first();
  
      if ($existingRecord) {
          // If record exists, increment the usage count
          DB::table('customer_promocode')
              ->where('id', $existingRecord->id)
              ->increment('usage_count');
      } else {
          // If not, create a new record with usage_count = 1
          DB::table('customer_promocode')->insert([
              'customer_id' => $customer_id,
              'promocode_id' => $promocode_id,
              'usage_count' => 1,
          ]);
      }
  
      // Return the updated cart view
      return view('admin.modules.pos.cartProduct');
  }
  
  public function updateQty(Request $request)
  {
    $rowId = $request->rowId;
    $qty = $request->qty;
    Cart::update($rowId, ['qty' => $qty]);
    return view('admin.modules.pos.cartProduct');
  }
  public function removeAllItem()
  {
    Cart::destroy();
    session()->forget('saleDiscount');
    return redirect()->route('admin.posModule');
  }

  public function CustomerDetails(Request $request)
  {
    if (!empty($request->customer_id)) {
      $totalShopping = DB::table('sales')->where('customer_id', $request->customer_id)->sum('grand_total');
      $totalDue = DB::table('sales')->where('customer_id', $request->customer_id)->sum('due');
      $customerInfo = DB::table('customers')->where('id', $request->customer_id)->first();
      $paymentInfo = "";
      return view('admin.modules.pos.customerInfo')->with(['customerInfo' => $customerInfo, 'paymentInfo' => $paymentInfo, 'totalShopping' => $totalShopping, 'totalDue' => $totalDue]);
    } else {
      echo "Please select a customer.";
    }
  }

  public function addCustomer(Request $request)
  {
    $request->validate([
      'mobile' => 'required|numeric|unique:customers',
    ]);
    $customer = new Customer;
    $customer->mobile = $request->mobile;
    $customer->name = $request->name;
    $customer->group = $request->group;
    $customer->email = $request->email;
    $customer->address = $request->address;
    $customer->company = $request->company;
    try {
      $customer->save();
      Toastr::success('Customer added successfully');
      $id = $customer->id;
      $name = DB::table('customers')->where('id', $id)->value('name');
      $mobile = DB::table('customers')->where('id', $id)->value('mobile');
      Session::put('customer', $id);
      Session::put('customerName', $name . '(' . $mobile . ')');
      return redirect()->route('admin.posModule');
    } catch (\Exception $e) {
      session()->flash('error-message', $e->getMessage());
      return redirect()->back();
    }
  }

  public function searchProductByBrandId(Request $request)
  {
    $productList = DB::table('products')->where('brand', $request->brand_id)->get();
    return view('admin.modules.pos.brandProduct')->with(['productList' => $productList]);
  }

  public function searchProductByCatId(Request $request)
  {

    $productList = DB::table('products')->where('category', $request->cat_id)->get();
    return view('admin.modules.pos.categoryProduct')->with(['productList' => $productList]);
  }

  public function searchProductBySubcatId(Request $request)
  {

    $productList = DB::table('products')->where('subcategory', $request->subcat_id)->get();
    return view('admin.modules.pos.subcategoryProduct')->with(['productList' => $productList]);
  }

  public function billPreview(Request $request)
  {
    $system = System::first();
    $customerInfo = DB::table('customers')->where('id', $request->customer_id)->first();
    return view('admin.modules.pos.billPreview')->with(['customerInfo' => $customerInfo, 'system' => $system]);
  }

  public function paymentScreen(Request $request)
  {
    $stores = Store::all();
    $customerInfo = DB::table('customers')->where('id', $request->customer_id)->first();
    $billers = Biller::all();
    //$totalmsPayable=($total-$tax);
    $id = $request->customer_id;
    if (!empty($id)) {
      return view('admin.modules.pos.paymentScreen')->with(['customerId' => $id, 'billers' => $billers, 'stores' => $stores]);
    } else {
      echo "<center>
  <p class='alert alert-danger'>Please Select A Customer</p>
  </center>";
    }
  }

  //invoice create
  public function makeInvoice(Request $request)
  {
    $request->validate([
      'paid' => 'numeric',
      'customer_id' => 'required|numeric',
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
    $due = $totalAmount - $request->paid;


    $sales = new Sales;
    $sales->sales_date = date('Y-m-d');
    $sales->code = $code;
    $sales->biller_id = $request->biller_id;
    $sales->store_id = $request->store_id;
    $sales->grand_total = $totalAmount;
    $sales->discount = $discount;
    $sales->tax = $tax;
    $sales->paid_amount = $request->paid;
    $sales->due = $due;
    $sales->payment_type = $request->payment_method;
    $sales->payment_note = $request->payment_note;
    $sales->cateated_by = Auth::user()->id;
    $sales->sales_type = 1;
    $sales->customer_id = $request->customer_id;

    $pay = Payment::all();
    $pay = count($pay) + 1;
    $paycode = 'PAY-' . date('Y-m-d') . '/' . $pay;

    $payment = new Payment;
    $payment->reference = $paycode;
    $payment->salereference = $code;
    $payment->type = 'Received';
    $payment->amount = $request->paid;
    $payment->paidBy = $request->payment_method;
    $payment->pDate = date('Y-m-d');
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

        $saleProduct->sales_date = date('Y-m-d');
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

      Toastr::success('Sales  added successfully');
      Cart::destroy();
      $request->session()->forget('saleType');
      $request->session()->forget('customer');
      $request->session()->forget('customerName');
      $request->session()->forget('saleValue');
      $request->session()->forget('saleDiscount');
      return redirect()->route('admin.pos.billView', $sales->id);
    } catch (\Exception $e) {
      session()->flash('error-message', $e->getMessage());
      return redirect()->back();
    }
  }

  //view bill details return to print page
  public function billView($id)
  {
    Sales::findorFail($id);
    $system = System::first();
    $stores = Store::all();
    $expenseCats = ExpenseCategory::all();
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
    return view('admin.modules.pos.layout.billview')->with(['system' => $system, 'billInfo' => $billInfo, 'billProduct' => $billProduct, 'stores' => $stores, 'expenseCats' => $expenseCats]);
  }
  //todays sales list
  public function todaySales()
  {
    $dt = date('Y-m-d');
    $salesList = DB::table('sales')
      ->join('customers', 'customers.id', '=', 'sales.customer_id')
      ->select('sales.*', 'customers.name', 'customers.email', 'customers.address', 'customers.mobile')
      ->where('sales.sales_date', $dt)
      ->get();
    return view('admin.modules.pos.todaysales')->with(['salesList' => $salesList, 'dt' => $dt]);
  }

  //store expense from pos module
  public function expenseSave(Request $request)
  {
    $request->validate([
      'eDate' => 'required',
      'cost' => 'required',

    ]);
    if ($request->hasFile('documents')) {
      $image_name = $request->file('documents');
      $random_name = $image_name->getClientOriginalName();

      $directory = 'public/uploads/expense_document';
      $dbfile = $directory . $random_name;
      $image_name->move($directory, $dbfile);
      $documents = $dbfile;
    } else {
      $documents = null;
    }
    $expense = new Expense;
    $expenses = Expense::all();
    $expenses = count($expenses) + 1;
    $code = "EX-" . $expenses;
    $expense->eDate = $request->eDate;
    $expense->store_id = $request->store_id;
    $expense->reference = $request->reference;
    $expense->category = $request->category;
    $expense->code = $code;
    $expense->note = $request->note;
    $expense->cost = $request->cost;
    $expense->document = $documents;
    $expense->added_by = Auth::user()->id;

    $payment = new Payment;
    $payment->reference = $paycode;
    $payment->purchasereference = 'EXPENSE/' . $code;
    $payment->type = 'paid';
    $payment->amount = $request->cost;
    $payment->paidBy = 'cash';
    $payment->pDate = $request->eDate;
    $payment->transectionBy = Auth::user()->id;
    try {
      $expense->save();
      $payment->save();
      Toastr::success('Expense  added successfully');
      return redirect()->route('admin.posModule');
    } catch (\Exception $e) {
      session()->flash('error-message', $e->getMessage());
      return redirect()->back();
    }
  }
  //add new product from pos module
  protected function imageUpload($request)
  {
    $productImage = $request->file('image');
    $imageName = $productImage->getClientOriginalName();
    $directory = 'public/uploads/product_image/';
    $imageUrl = $directory . $imageName;

    Image::make($productImage)->resize(80, 80)->save($imageUrl);

    return $imageUrl;
  }
  public function productSave(Request $request)
  {

    $request->validate([
      'name' => 'required',
      'code' => 'required|unique:products',
      'purchase_price' => 'required',
      'sell_price' => 'required',
      'unit' => 'required',
    ]);
    if ($request->file('image') !== null) {
      $image = $this->imageUpload($request);
    } else {
      $image = null;
    }
    $product = new Products;
    $product->name = $request->name;
    $product->code = $request->code;
    $product->slug = str_slug($request->name);
    $product->supplier = $request->supplier;
    $product->unit = $request->unit;
    $product->brand = $request->brand;
    $product->category = $request->category;
    $product->subcategory = $request->subcategory;
    $product->purchase_price = $request->purchase_price;
    $product->alert_qty = $request->alert_qty;
    $product->sell_price = $request->sell_price;
    $product->description = $request->description;
    $product->image = $image;
    try {
      $product->save();
      Toastr::success('Product Added Successfully.');
      return redirect()->route('admin.posModule');
    } catch (\Exception $e) {
      session()->flash('error-message', $e->getMessage());
      return redirect()->back();
    }
  }
  //calculate today profit
  public function todayprofit()
  {
    $dt = date('Y-m-d');
    $totalSale = DB::table('sales')->where('sales_date', $dt)->sum('grand_total');
    $totalExpense = DB::table('expenses')->where('eDate', $dt)->sum('cost');
    $totalProductCost = 0;
    $productCosts = DB::table('sales_products')->where('sales_date', $dt)->get();

    foreach ($productCosts as $cost) {
      $unitCost = $cost->unit_cost;
      $qty = $cost->qty;
      $subCost = $unitCost * $qty;
      $totalProductCost += $subCost;
    }

    $profit = $totalSale - ($totalExpense + $totalProductCost);
    return view('admin.modules.pos.profitlossContainer')->with([
      'totalSale' => $totalSale,
      'totalExpense' => $totalExpense,
      'totalProductCost' => $totalProductCost,
      'profit' => $profit,
    ]);
  }

  //get product info 
  public function getProductInfo(Request $request)
  {
    $rowId = $request->rowId;
    $proId = $request->proId;

    $productInfos = DB::table('products')->where('id', $proId)->first();
    return view('admin.modules.pos.layout.productUpdate')->with(['productInfos' => $productInfos, 'rowId' => $rowId]);
  }

  public function productInfoUpdate(Request $request)
  {
    $rowId = $request->rowId;
    // DB::table('products')->where('id',$request->proid)->update(['name'=>$request->name,'purchase_price'=>$request->purchase_price,'sell_price'=>$request->sell_price]);
    Cart::update($rowId, ['price' => $request->sell_price, 'name' => $request->name]);

    Toastr::success('Product Update Successfully');
    return redirect()->route('admin.posModule');
  }
  //delete sale 
  public function deleteSale($id)
  {
    try {
      DB::table('sales')->where('id', $id)->delete();
      DB::table('sales_products')->where('sale_id', $id)->delete();
      Toastr::success('Sale deleted successfully');
      return redirect()->route('admin.posModule');
    } catch (\Exception $e) {
      session()->flash('error-message', $e->getMessage());
      return redirect()->back();
    }
  }

public function promoCodeAvailableList(Request $request) {
  $search = $request->input('q');
  $customer_id = session('customer'); // Retrieve the customer ID from the session
  $cartSubtotal = Cart::subtotal(); // e.g., "24,700.00"
 
  // Convert to a float, removing commas
  $cartSubtotalNumber = floatval(str_replace(',', '', $cartSubtotal));

// Step 1: Fetch all valid promocodes (initially unfiltered)
$allPromocodes = DB::select(
  'SELECT * 
   FROM promocodes  
   WHERE name LIKE :search 
     AND CURDATE() BETWEEN promocode_start_duration AND promocode_end_duration',
  [
      'search' => '%' . $search . '%',
  ]
);


  // Step 2: Check for used promocodes by the customer
  $usedPromocodes = DB::select(
      'SELECT cp.promocode_id, cp.usage_count, p.user_limit
       FROM customer_promocode cp
       JOIN promocodes p ON cp.promocode_id = p.id
       WHERE cp.customer_id = :customer_id',
      [
          'customer_id' => $customer_id,
      ]
  );

  // Convert used promocodes to a map for easy lookup
  $usedPromocodesMap = collect($usedPromocodes)
      ->keyBy('promocode_id')
      ->filter(function ($promo) {
          // Only keep those where usage_count >= user_limit (invalid ones)
          return $promo->usage_count >= $promo->user_limit;
      });

  // Step 3: Filter out invalid promocodes
  $validPromocodes = collect($allPromocodes)
      ->filter(function ($promo) use ($usedPromocodesMap) {
          // Exclude only those that are in the usedPromocodesMap (invalid ones)
          return !$usedPromocodesMap->has($promo->id);
      })
      ->filter(function ($promo) use ($cartSubtotalNumber) {
          // Apply the minimum order amount filter
          $minOrderAmount = floatval($promo->minimum_order_ammount);
          return $minOrderAmount <= $cartSubtotalNumber;
      });


  // Format the valid promocodes for the frontend
  $formattedCategories = $validPromocodes->map(function ($promo) {
      return [
          'id' => $promo->id,
          'text' => $promo->name,
          'discount' => $promo->discount,
          'percentage' => $promo->percentage
      ];
  });

  // Return the result as JSON
  return response()->json($formattedCategories);

  // Uncomment the following line for debugging
  // return compact('allPromocodes', 'usedPromocodes', 'usedPromocodesMap', 'validPromocodes', 'cartSubtotal', 'cartSubtotalNumber');
}

}
