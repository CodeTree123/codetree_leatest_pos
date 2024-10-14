<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sales;
use App\Biller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class BillerController extends Controller
{
    public function addBiller()
    {
        return view('admin.modules.people.biller.billerAdd');
    }
    public function billerSave(Request $request)
    {
      $request->validate([
         'name'=>'required',
         'phone'=>'required|unique:billers,phone',
     ]);

      $biller=new Biller;
      $biller->phone=$request->phone;
      $biller->name=$request->name;
      $biller->email=$request->email;
      $biller->address=$request->address;
      $biller->city=$request->city;
      $biller->postal_code=$request->postal_code;
      $biller->invoice_footer=$request->invoice_footer;
      try{
         $biller->save();
         Toastr::success('New Biller Added Successfully');
         return redirect()->route('admin.people.listBiller');
     }catch(\Exception $e)
     {
        session()->flash('error-message',$e->getMessage());
        return redirect()->back();

    }
}


public function billerDelete(Request $request){
    try{
       DB::table('billers')->where('id',$request->id)->delete();
       Toastr::success('Biller Deleted');
       return redirect()->route('admin.people.listBiller');
     }catch(\Exception $e)
     {
       session()->flash('error-message',$e->getMessage());
           return redirect()->back();
     }
 }

public function listBiller()
{
   $billers=Biller::all();
   return view('admin.modules.people.biller.billerList')->with(['billers'=>$billers]);
}


public function listBiller2(Request $request)
{
    $search = $request->input('q');
    $products = Biller::where('name', 'like', "%$search%")
      ->limit(5)
      ->get();

    $formattedProducts = $products->map(function ($product) {
      return ['id' => $product->id, 'text' => $product->name];
    });

    return response()->json($formattedProducts);
  
}
public function billerBills($id)
{
    
   // Get the specific biller and its sales records
   $biller = Biller::findOrFail($id); // Find the biller by ID
   $sales = Sales::where('biller_id', $id)->paginate(10); // Fetch sales by biller ID

   return view('admin.modules.people.biller.billerBills')->with([
      'biller' => $biller, // Pass the biller info
      'sales' => $sales     // Pass the filtered sales
   ]);
}




public function viewBiller($id)
{
   $billers=Biller::find($id);
//    return view('admin.modules.people.biller.billerList')->with(['billers'=>$billers]);
    return response()->json([
        'status'=>200,
        'biller' => $billers,
    ]);
}
public function editBiller($id)
{
   $billers=Biller::find($id);
//    return view('admin.modules.people.biller.billerList')->with(['billers'=>$billers]);
    return response()->json([
        'status'=>200,
        'biller_info' => $billers,
    ]);
}

public function billerUpdate(Request $request)
{
      $request->validate([
     'name'=>'required',
     'phone'=>'required|unique:billers,phone,' .$request->biller_ids,
     'email'=>'nullable|unique:billers,email,' .$request->biller_ids,
 ]);
    $biller_id = $request->biller_ids;
    // dd($biller_id);
    $biller = Biller::find($biller_id);

//   $biller=new Biller;
  $biller->phone=$request->phone;
  $biller->name=$request->name;
  $biller->email=$request->email;
  $biller->address=$request->address;
  $biller->city=$request->city;
  $biller->postal_code=$request->postal_code;
  $biller->invoice_footer=$request->invoice_footer;
  try{
     $biller->update();
     Toastr::success('Biller Update Successfully');
     return redirect()->route('admin.people.listBiller');
 }catch(\Exception $e)
 {
    session()->flash('error-message',$e->getMessage());
    return redirect()->back();

}
}
}
