<?php

namespace App\Http\Controllers\report;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sales;

class SalesReportController extends Controller
{
   public function dailySalesReport()
   {
   	$dat=date('Y-m-d');
   	 $sales=Sales::where('sales_date',$dat)->get();
     $totalSale=Sales::where('sales_date',$dat)->sum('grand_total');
     $totalDiscount=Sales::where('sales_date',$dat)->sum('discount');
     $paid_amount=Sales::where('sales_date',$dat)->sum('paid_amount');
     $due=Sales::where('sales_date',$dat)->sum('due');
   	 
   	 return view('admin.modules.report.dailySalesReport')->with([
   	 	'sales'=>$sales,
   	 	'totalSale'=>$totalSale,
   	 	'totalDiscount'=>$totalDiscount,
   	 	'paid_amount'=>$paid_amount,
   	 	'due'=>$due,
   	 ]);
   }

   //date wise sales report
   public function sateWiseSalesReport(Request $request)
   {
    $dat=$request->saleDate;
     $sales=Sales::where('sales_date',$dat)->get();
     $totalSale=Sales::where('sales_date',$dat)->sum('grand_total');
     $totalDiscount=Sales::where('sales_date',$dat)->sum('discount');
     $paid_amount=Sales::where('sales_date',$dat)->sum('paid_amount');
     $due=Sales::where('sales_date',$dat)->sum('due');
     
     return view('admin.modules.report.dailyWiseSalesReport')->with([
      'sales'=>$sales,
      'totalSale'=>$totalSale,
      'totalDiscount'=>$totalDiscount,
      'paid_amount'=>$paid_amount,
      'due'=>$due,
      'dat'=>$dat,
     ]);
   }

   //salesBetweenTwoDate
   public function salesBetweenTwoDate(Request $request)
   {
    $startDate=$request->startDate;
    $endDate=$request->endDate;
    $sales=Sales::whereBetween('sales_date', [$startDate, $endDate])->get();
     $totalSale=Sales::whereBetween('sales_date', [$startDate, $endDate])->sum('grand_total');
     $totalDiscount=Sales::whereBetween('sales_date', [$startDate, $endDate])->sum('discount');
     $paid_amount=Sales::whereBetween('sales_date', [$startDate, $endDate])->sum('paid_amount');
     $due=Sales::whereBetween('sales_date', [$startDate, $endDate])->sum('due');
     
     return view('admin.modules.report.salesBetweenTwoDate')->with([
      'sales'=>$sales,
      'totalSale'=>$totalSale,
      'totalDiscount'=>$totalDiscount,
      'paid_amount'=>$paid_amount,
      'due'=>$due,
      'startDate'=>$startDate,
      'endDate'=>$endDate,
     ]);
   }
}
