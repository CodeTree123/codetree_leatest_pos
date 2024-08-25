<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Store;
use App\System;
use DB;

class StoreController extends Controller
{
 public function store()
 {
  $stores=Store::all();
  return view('admin.modules.setting.store.store')->with(['stores'=>$stores]);
}

public function storeSave(Request $request)
{
  $stores=Store::all();
  $total=count($stores)+1;
  $storePrefix=DB::table('systems')->where('id',1)->value('storeCode');
  $code=$storePrefix."-".$total;

  $request->validate([
   'name'=>'required',
 ]);
  $store=new Store;
  $store->name=$request->name;
  $store->email=$request->email;
  $store->phone=$request->mobile;
  $store->code=$code;
  $store->address=$request->address;
  
  try{
   $store->save();
   Toastr::success('A new Store Addred Successfully');
   return redirect()->route('admin.store');
 }catch(\Exception $e){
  session()->flash('error-message',$e->getMessage());
  return redirect()->back();

}
}

//get te store details
public function StoreDetails(Request $request)
{
  $id=$request->vStoreId;
  $store=Store::where('id',$id)->first();
  return view('admin.modules.setting.store.storeDetails')->with(['store'=>$store]);
}
//edit store info
public function StoreEdit(Request $request)
{
  $id=$request->vStoreId;
  $store=Store::where('id',$id)->first();
  return view('admin.modules.setting.store.storeEdit')->with(['store'=>$store]);
}
//update store information
public function storeUpdate(Request $request)
{
  try{
    DB::table('stores')->where('id',$request->id)->update(
    [
      'name'=>$request->name,
      'email'=>$request->email,
      'phone'=>$request->phone,
      'address'=>$request->address,
    ]
    );
    Toastr::success('Store updated');
    return 1;

  }catch(\Exception $e){
    Toastr::error('Store not updated');
    return 0;
  }
}
//delete store
public function StoreDelete(Request $request)
{
  try{
    DB::table('stores')->where('id',$request->id)->delete();
    Toastr::success('Store deleted');
    return redirect()->route('admin.store');
  }catch(\Exception $e){
    Toastr::error('Store not deleted');
    return redirect()->back();
  }
}
}
