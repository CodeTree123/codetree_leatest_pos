<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use Brian2694\Toastr\Facades\Toastr;
use App\Purchase;
use App\Sales;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Products;
use App\Customer;

class AdminController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }


  public function dashboard()
  {
    $customers = Customer::all();
    $period = CarbonPeriod::create(Carbon::now()->subMonths(5), '1 month', Carbon::now());
    $chartData = array();
    foreach ($period as $dt) {
      $year = $dt->format("Y");
      $month = $dt->format("m");
      $fullMonth = $dt->format("F");

      $purchase = DB::table('purchases')
        ->whereMonth('purchase_date', $month)
        ->whereYear('purchase_date', $year)
        ->sum('grand_total');
      $sell = DB::table('sales')
        ->whereMonth('sales_date', $month)
        ->whereYear('sales_date', $year)
        ->sum('grand_total');

      $expense = DB::table('expenses')
        ->whereMonth('eDate', $month)
        ->whereYear('eDate', $year)
        ->sum('cost');
      array_push($chartData, array('expense' => $expense, 'sell' => $sell, 'purchase' => $purchase, 'year' => $year, 'month' => $fullMonth));
    }
    $startPutchase = DB::table('products')->sum('start_cost');
    $totalSale = DB::table('sales')->sum('grand_total');
    $totalExpense = DB::table('expenses')->sum('cost');
    $numberOfExpense = Expense::count();
    $totalPurchase = DB::table('purchases')->sum('grand_total');
    $grandPurchase = $startPutchase + $totalPurchase;
    $numberOfPurchase = Purchase::count();
    $numberOfSale = Sales::count();

    $salesRevenue = DB::table('sales_products')->sum('product_revenue');
    $totalRevenue = $salesRevenue - $totalExpense;
    return view('admin.dashboard.dashboard')->with([
      'totalExpense' => $totalExpense,
      'numberOfExpense' => $numberOfExpense,
      'totalPurchase' => $grandPurchase,
      'numberOfPurchase' => $numberOfPurchase,
      'totalSale' => $totalSale,
      'numberOfSale' => $numberOfSale,
      'chartData' => $chartData,
      'totalRevenue' => $totalRevenue,
      'customers' => $customers,
    ]);
  }
}
