<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\System;
use DB;
use Brian2694\Toastr\Facades\Toastr; 

class SystemController extends Controller
{
  public function __construct()
  {
    $this->middleware('permission:system setting');
  }
  public function systemSettingForm()
  {
   $systemInfo=System::first();

   return view('admin.modules.setting.system.systemSetting')->with(['systemInfo'=>$systemInfo]);
 }

 public function updateSystem(Request $request)
 {
   
   $request->validate([
     'siteName'=>'required',
     'siteEmail'=>'required',
     'sitePhone'=>'required',
     'unitCode'=>'required',
     'brandCode'=>'required',
     'categoryCode'=>'required',
     'expenseCategoryUnit'=>'required',
     'productCode'=>'required',
     'invoiceCode'=>'required',
     'purchaseCode'=>'required',
     'subCategoryCode'=>'required',
     'storeCode'=>'required',
   ]);
   try{
     DB::table('systems')
     ->where('id', 1)
     ->update([
      'siteName'=>$request->siteName,
      'siteEmail'=>$request->siteEmail,
      'sitePhone'=>$request->sitePhone,
      'unitCode'=>$request->unitCode,
      'brandCode'=>$request->brandCode,
      'categoryCode'=>$request->categoryCode,
      'expenseCategoryUnit'=>$request->expenseCategoryUnit,
      'productCode'=>$request->productCode,
      'invoiceCode'=>$request->invoiceCode,
      'purchaseCode'=>$request->purchaseCode,
      'subCategoryCode'=>$request->subCategoryCode,
      'storeCode'=>$request->storeCode,
      'address'=>$request->address,
      'moto'=>$request->moto,
      'mobile'=>$request->mobile,

    ]);
     Toastr::success('system update syccessfully');
     
     return redirect()->route('admin.system.setting');
   }catch(\Exception $e){
    session()->flash('error-message',$e->getMessage());
    return redirect()->back();

  }
}
}
