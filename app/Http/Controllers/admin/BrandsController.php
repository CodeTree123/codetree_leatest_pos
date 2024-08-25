<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Brands;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BrandsController extends Controller
{
  public function brands()
  {
    $brandCode = DB::table('systems')->where('id', '1')->value('brandCode');
    $brands = Brands::all();
    return view('admin.modules.setting.brands.brands')->with(['brands' => $brands, 'brandCode' => $brandCode]);
  }

  //uploads image
  protected function imageUpload($request)
  {
    $productImage = $request->file('image');
    $imageName = $productImage->getClientOriginalName();
    $directory = 'uploads/brand_image/';
    $imageUrl = $directory . $imageName;

    if (!file_exists($directory)) {
      mkdir($directory, 0755, true);
    }

    Image::make($productImage)->resize(80, 80)->save($imageUrl);

    return $imageUrl;
  }
  //save brands info
  public function saveBrand(Request $request)
  {

    $validData = $request->validate([
      'name' => 'required',
      'code' => 'required|unique:brands',
    ]);
    if ($request->file('image') !== null) {
      $image = $this->imageUpload($request);
    } else {
      $image = null;
    }
    $brands = new Brands;
    $brands->name = $request->name;
    $brands->code = $request->code;
    $brands->image = $image;
    $brands->company = $request->company;
    $brands->description = $request->description;
    $brands->slug = str::slug($request->name);
    try {
      $brands->save();
      Toastr::success('New Brand added Successfully.');
      return redirect()->route('admin.brands');
    } catch (\Exception $e) {
      session()->flash('error-message', $e->getMessage());
      return redirect()->back();
    }
  }
  //brands details
  public function brandDetails(Request $request)
  {

    $brand = DB::table('brands')->where('id', $request->id)->first();

    return view('admin.modules.setting.brands.brandDetails')->with(['brand' => $brand]);
  }
  //edit brands 
  public function editBrand(Request $request)
  {
    $brand = DB::table('brands')->where('id', $request->id)->first();

    return view('admin.modules.setting.brands.editBrand')->with(['brand' => $brand]);
  }
  //update brands
  public function updateBrand(Request $request)
  {
    $request->validate([
      'id' => 'required',

    ]);
    $brand_check = DB::table('brands')->where('id', $request->id)->first();
    //   dd($brand_check);
    if ($request->file('image') !== null) {
      if (File::exists($brand_check->image)) {
        File::delete($brand_check->image);
      }
      $image = $this->imageUpload($request);
    } else {
      $image = DB::table('brands')->where('id', $request->id)->value('image');
    }
    try {
      DB::table('brands')->where('id', $request->id)
        ->update([
          'name' => $request->name,
          'image' => $image,
          'company' => $request->company,
          'description' => $request->description,
        ]);
      Toastr::success('Brand updated');
      return redirect()->route('admin.brands');
    } catch (\Exception $e) {
      session()->flash('error-message', $e->getMessage());
      return redirect()->back();
    }
  }
  //delete brand
  public function deleteBrand(Request $request)
  {

    try {
      $brand_check = DB::table('brands')->where('id', $request->id)->first();
      if (File::exists($brand_check->image)) {
        File::delete($brand_check->image);
      }
      DB::table('brands')->where('id', $request->id)->delete();
      Toastr::success('Brand deleted');
      return redirect()->route('amin.brands');
    } catch (\Exception $e) {
      session()->flash('error-message', $e->getMessage());
      return redirect()->back();
    }
  }
}
