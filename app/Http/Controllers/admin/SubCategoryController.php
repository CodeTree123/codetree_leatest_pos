<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Category;
use App\SubCategory;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
  public function managesSubCategory()
    {
        $categoryCode = DB::table('systems')->where('id', 1)->value('subCategoryCode');
        $categories = Category::all();
        $subcategories = SubCategory::latest()->paginate(20); // moved latest() before paginate()

        $lastCategory = SubCategory::orderBy('id', 'desc')->first();
        $lastId = $lastCategory ? $lastCategory->id + 1 : 1;  // Extract the 'id' from the object.
    
        // Generate the initial code.
        $code = "{$categoryCode}-{$lastId}";
    
        // Check if the generated code already exists in the 'categories' table.
        while (SubCategory::where('code', $code)->exists()) {
            $lastId++;  // Increment the counter.
            $code = "{$categoryCode}-{$lastId}";  // Generate a new code.
        }
        
        return view('admin.modules.setting.subcategory.subcategory', [
            'categories' => $categories,
            'categoryCode' => $categoryCode,
            'subcategories' => $subcategories,
            'lastId' => $lastId,
            'generatedCode' => $code
        ]);
    }

  protected function imageUpload($request)
  {
    $productImage = $request->file('image');
    $imageName = $productImage->getClientOriginalName();
    $directory = 'uploads/subcategory_image/';
    $imageUrl = $directory . $imageName;

    if (!file_exists($directory)) {
      mkdir($directory, 0755, true);
    }

    Image::make($productImage)->resize(80, 80)->save($imageUrl);

    return $imageUrl;
  }
  public function saveSubCategory(Request $request)
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
    $category = new SubCategory;
    $category->name = $request->name;
    $category->image = $image;
    $category->code = $request->code;
    $category->parentId = $request->parentId;
    $category->description = $request->description;
    $category->slug = str::slug($request->name);

    try {
      $category->save();
      Toastr::success('New Category Added Successfully.');
      return redirect()->route('admin.subcategory');
    } catch (\Exception $e) {
      session()->flash('error-message', $e->getMessage());
      return redirect()->back();
    }
  }

  public function selectSubcategory(Request $request)
  {
    $subcategory = DB::table('sub_categories')->where('parentId', $request->catId)->get();
    return response()->json($subcategory);
  }

  public function selectSubcategory2(Request $request)
  {
      $search = $request->input('q');
      $categoryId = $request->input('category_id');

      $subcategories = SubCategory::where('name', 'like', "%$search%")
          ->where('parentId', $categoryId)
          ->limit(5)
          ->get();

      $formattedSubcategories = $subcategories->map(function ($subcategory) {
          return ['id' => $subcategory->id, 'text' => $subcategory->name];
      });

      return response()->json($formattedSubcategories);
  }

  //sub category details
  public function subcategoryDetails(Request $request)
  {
    $category = DB::table('sub_categories')->where('id', $request->id)->first();
    return view('admin.modules.setting.subcategory.subCategoryDetails')->with(['category' => $category]);
  }
  public function editsubCategory(Request $request)
  {

    $category = DB::table('sub_categories')->where('id', $request->id)->first();

    return view('admin.modules.setting.subcategory.editSubCategory')->with(['category' => $category]);
  }

  //update sub category
  public function updateSubCategory(Request $request)
  {
    $request->validate([
      'id' => 'required',

    ]);
    $subcategory_check = DB::table('sub_categories')->where('id', $request->id)->first();
    // dd($subcategory_check);
    if ($request->file('image') !== null) {
      if (File::exists($subcategory_check->image)) {
        File::delete($subcategory_check->image);
      }
      $image = $this->imageUpload($request);
    } else {
      $image = DB::table('sub_categories')->where('id', $request->id)->value('image');
    }
    try {
      DB::table('sub_categories')->where('id', $request->id)
        ->update([
          'name' => $request->name,
          'image' => $image,
          'description' => $request->description,
        ]);
      Toastr::success('sub Category updated');
      return redirect()->route('admin.subcategory');
    } catch (\Exception $e) {
      session()->flash('error-message', $e->getMessage());
      return redirect()->back();
    }
  }
  //delete sub category
  public function deletesubCategory(Request $request)
  {
    try {
      $subcategory_check = DB::table('sub_categories')->where('id', $request->id)->first();
      if (File::exists($subcategory_check->image)) {
        File::delete($subcategory_check->image);
      }
      DB::table('sub_categories')->where('id', $request->id)
        ->delete();
      Toastr::success('Subcategory Deleted');
      return redirect()->route('admin.subcategory');
    } catch (\Exception $e) {
      session()->flash('error-message', $e->getMessage());
      return redirect()->back();
    }
  }

      //search product
      public function searchsubCategory(Request $request)
      {
          $subCategories = DB::table('sub_categories')
              ->where('id', 'like', '%' . $request->key . '%')
              ->orWhere('name', 'like', '%' . $request->key . '%')
              ->orWhere('code', 'like', '%' . $request->key . '%')
              ->orWhere('description', 'like', '%' . $request->key . '%')
              ->limit(10)
              ->get();
      
          if (!$subCategories->isEmpty()) {
              foreach ($subCategories as $subCategory) {
                  // Render the HTML for each sub-category result.
                  echo '
                      <p class="list-group-item list-group-item-action  mx-0 py-2 view" 
                         style="font-size: 13px; cursor:pointer;" 
                         
                         data-vid="' . $subCategory->id . '">
                          <i class="fa-fw fa fa-eye"></i> ' . htmlspecialchars($subCategory->name) . '
                      </p>
                      
                  ';
              }
          } else {
              echo "<p>No product found.</p>";
          }
      }
      
}
