<?php

namespace App\Http\Controllers\report;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Purchase;

class PurchaseReportController extends Controller
{
    public function dailyPurchaseReport()
    {
     $dat=date('Y-m-d');
     $purchaseLists=Purchase::where('purchase_date',$dat)->get();
     $totalPurchae=Purchase::where('purchase_date',$dat)->sum('grand_total');
     $totalDiscount=Purchase::where('purchase_date',$dat)->sum('discount');
     $paid_amount=Purchase::where('purchase_date',$dat)->sum('paid_amount');
     $due=Purchase::where('purchase_date',$dat)->sum('due');
  return view('admin.modules.report.dailyPurchaseReport')->with([
   'purchaseLists'=>$purchaseLists,
   'totalPurchae'=>$totalPurchae,
   'totalDiscount'=>$totalDiscount,
   'paid_amount'=>$paid_amount,
   'due'=>$due,
 ]);
    }
    //dateWisePurchaseReport

   public function dateWisePurchaseReport(Request $request)
   {
    $dat=$request->purchaseDate;
     $purchaseLists=Purchase::where('purchase_date',$dat)->get();
     $totalPurchae=Purchase::where('purchase_date',$dat)->sum('grand_total');
     $totalDiscount=Purchase::where('purchase_date',$dat)->sum('discount');
     $paid_amount=Purchase::where('purchase_date',$dat)->sum('paid_amount');
     $due=Purchase::where('purchase_date',$dat)->sum('due');
  return view('admin.modules.report.dateWisePurchaseReport')->with([
   'purchaseLists'=>$purchaseLists,
   'totalPurchae'=>$totalPurchae,
   'totalDiscount'=>$totalDiscount,
   'paid_amount'=>$paid_amount,
   'due'=>$due,
   'dat'=>$dat,
 ]);
   } 

   //
public function purchaseBetweenTwoDate(Request $request)
{
     $startDate=$request->startDate;
     $endDate=$request->endDate;
     $purchaseLists=Purchase::whereBetween('purchase_date',[$startDate, $endDate])->get();
     $totalPurchae=Purchase::whereBetween('purchase_date',[$startDate, $endDate])->sum('grand_total');
     $totalDiscount=Purchase::whereBetween('purchase_date',[$startDate, $endDate])->sum('discount');
     $paid_amount=Purchase::whereBetween('purchase_date',[$startDate, $endDate])->sum('paid_amount');
     $due=Purchase::whereBetween('purchase_date',[$startDate, $endDate])->sum('due');
    
  return view('admin.modules.report.purchaseBetweenTwoDate')->with([
   'purchaseLists'=>$purchaseLists,
   'totalPurchae'=>$totalPurchae,
   'totalDiscount'=>$totalDiscount,
   'paid_amount'=>$paid_amount,
   'due'=>$due,
   'startDate'=>$startDate,
   'endDate'=>$endDate,
 ]);
}
}
