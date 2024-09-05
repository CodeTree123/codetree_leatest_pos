<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Category;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
  public function manageCategory()
  {
    $categoryCode = DB::table('systems')->where('id', '1')->value('categoryCode');
    $categories = Category::all();
    return view('admin.modules.setting.category.category')->with(['categories' => $categories, 'categoryCode' => $categoryCode]);
  }
  protected function imageUpload($request)
  {
    $productImage = $request->file('image');

    $imageName = time() . '-' . Str::random(10) . '.' . $productImage->getClientOriginalExtension();
    $directory = public_path('uploads/category_image/');
    $imageUrl = 'uploads/category_image/' . $imageName;

    if (!file_exists($directory)) {
      mkdir($directory, 0755, true);
    }

    Image::make($productImage)->resize(80, 80)->save($directory . $imageName);

    return $imageUrl;
  }
  public function saveCategory(Request $request)
  {
    $validdata = $request->validate([
      'name' => 'required',
      'code' => 'required',
    ]);

    if ($request->file('image') !== null) {
      $image = $this->imageUpload($request);
    } else {
      $image = null;
    }

    $category = new Category;
    $category->name = $request->name;
    $category->code = $request->code;
    $category->description = $request->description;
    $category->image = $image;
    $category->slug = str::slug($request->name);

    try {
      $category->save();
      Toastr::success('New Category Added Successfully.');
      return redirect()->route('admin.category');
    } catch (\Exception $e) {
      session()->flash('error-message', $e->getMessage());
      return redirect()->back();
    }
  }
  //category details
  public function categoryDetails(Request $request)
  {
    $category = DB::table('categories')->where('id', $request->id)->first();
    return view('admin.modules.setting.category.categoryDetails')->with(['category' => $category]);
  }
  //edit category
  public function editCategory(Request $request)
  {
    $category = DB::table('categories')->where('id', $request->id)->first();
    return view('admin.modules.setting.category.editCategory')->with(['category' => $category]);
  }

  //update category
  public function updateCategory(Request $request)
  {
    $request->validate([
      'id' => 'required',

    ]);
    $category_check = DB::table('categories')->where('id', $request->id)->first();
    //   dd($category_check);
    if ($request->file('image') !== null) {
      if (File::exists($category_check->image)) {
        File::delete($category_check->image);
      }
      $image = $this->imageUpload($request);
    } else {
      $image = DB::table('categories')->where('id', $request->id)->value('image');
    }
    try {
      DB::table('categories')->where('id', $request->id)
        ->update([
          'name' => $request->name,
          'image' => $image,
          'description' => $request->description,
        ]);
      Toastr::success('Category updated');
      return redirect()->route('admin.category');
    } catch (\Exception $e) {
      session()->flash('error-message', $e->getMessage());
      return redirect()->back();
    }
  }
  //delete category
  public function deleteCategory(Request $request)
  {
    $category_check = DB::table('categories')->where('id', $request->id)->first();
    if (File::exists($category_check->image)) {
      File::delete($category_check->image);
    }
    DB::table('categories')->where('id', $request->id)
      ->delete();
    Toastr::success('category Deleted');
    return redirect()->route('admin.category');
  }
}
