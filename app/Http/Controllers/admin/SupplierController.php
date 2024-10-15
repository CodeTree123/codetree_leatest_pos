<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Supplier;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class SupplierController extends Controller
{
  public function supplierList()
  {
    $suppliers = Supplier::paginate(10);
    return view('admin.modules.people.supplier.supplierList')->with(['suppliers' => $suppliers]);
  }


  public function supplierList2(Request $request)
  {
      $search = $request->input('q');
      $suppliers = Supplier::where('name', 'like', "%$search%")
          ->orWhere('company', 'like', "%$search%")
          ->limit(5)
          ->get();
  
      $formattedSuppliers = $suppliers->map(function ($supplier) {
          return [
              'id' => $supplier->id,
              'text' => "{$supplier->company} ({$supplier->name})"
          ];
      });
  
      return response()->json($formattedSuppliers);
  }

  public function supplierAdd()
  {
    return view('admin.modules.people.supplier.supplierAdd');
  }

  public function supplierSave(Request $request)
  {
    $request->validate([
      'name' => 'required|unique:suppliers,name',
      'mobile' => 'required|numeric',
    ]);
    $supplier = new Supplier;
    $supplier->name = $request->name;
    $supplier->mobile = $request->mobile;
    $supplier->company = $request->company;
    $supplier->email = $request->email;
    $supplier->address = $request->address;
    $supplier->city = $request->city;
    $supplier->country = $request->country;
    $supplier->start_balance = $request->start_balance;
    $supplier->postal_code = $request->postal_code;

    try {
      $supplier->save();
      Toastr::success('A supplier Added Successfully');
      return redirect()->route('admin.supplierList');
    } catch (\Exception $e) {
      session()->flash('error-message', $e->getMessage());
      return redirect()->back();
    }
  }


  public function supplierDelete(Request $request)
  {
      try {
          // Check if the supplier has any associated products
          $productCount = DB::table('products')->where('supplier', $request->id)->count();
  
          if ($productCount > 0) {
              // If products exist, don't allow deletion
              Toastr::error('Supplier cannot be deleted. Products are associated with this supplier.');
              return redirect()->back();
          }
  
          // If no products found, proceed with deletion
          DB::table('suppliers')->where('id', $request->id)->delete();
          Toastr::success('Supplier Deleted');
          return redirect()->route('admin.supplierList');
      } catch (\Exception $e) {
          // Handle any unexpected errors
          session()->flash('error-message', $e->getMessage());
          return redirect()->back();
      }
  }
  

  //supplier details
  public function supplierDetails($id)
  {

    $supplierrInfo = DB::table('suppliers')->where('id', $id)->first();
    $purchaseHistory = DB::table('purchases')->where('supplier_id', $id)->get();
    $totalpurchase = DB::table('purchases')->where('supplier_id', $id)->sum('grand_total');
    $totalDue = DB::table('purchases')->where('supplier_id', $id)->sum('due');
    $totalDiscount = DB::table('purchases')->where('supplier_id', $id)->sum('discount');
    return view('admin.modules.people.supplier.supplierDetails')->with(['supplierrInfo' => $supplierrInfo, 'purchaseHistory' => $purchaseHistory, 'totalpurchase' => $totalpurchase, 'totalDue' => $totalDue, 'totalDiscount' => $totalDiscount]);
  }
  protected function imageUpload($request)
  {
    $productImage = $request->file('image');
    $imageName = $productImage->getClientOriginalName();
    $directory = 'uploads/supplier_image/';
    $imageUrl = $directory . $imageName;

    if (!file_exists($directory)) {
      mkdir($directory, 0755, true);
    }

    Image::make($productImage)->resize(80, 80)->save($imageUrl);

    return $imageUrl;
  }

  //supplier infomation 
  public function supplierInfo(Request $request)
  {
    $supplierInfo = DB::table('suppliers')->where('id', $request->supplierid)->first();
    return view('admin.modules.people.supplier.editSupplier')->with(['supplierInfo' => $supplierInfo]);
  }
  //update supplier
  public function updateSupplier(Request $request)
  {
    $request->validate([
      'name' => 'required|unique:suppliers,name,'.$request->id,
      'id' => 'required',
    ]);

    $supplier_check = DB::table('suppliers')->where('id', $request->id)->first();
    // dd($supplier_check);
    if ($request->file('image') !== null) {
      if (File::exists($supplier_check->image)) {
        File::delete($supplier_check->image);
      }
      $image = $this->imageUpload($request);
    } else {
      $image = DB::table('suppliers')->where('id', $request->id)->value('image');
    }
    try {
      DB::table('suppliers')->where('id', $request->id)
        ->update([
          'name' => $request->name,
          'email' => $request->email,
          'mobile' => $request->mobile,
          'address' => $request->address,
          'image' => $image,
          'company' => $request->company,
          'postal_code' => $request->postal_code,
          'city' => $request->city,

        ]);
      Toastr::success('Supplier Basic Info Updated Successfully.');
      return redirect()->route('admin.supplier.supplierDetails', $request->id);
    } catch (\Exception $e) {
      session()->flash('error-message', $e->getMessage());
      return redirect()->back();
    }
  }
}
