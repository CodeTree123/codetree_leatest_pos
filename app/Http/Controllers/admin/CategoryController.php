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
      // Get the category code from the 'systems' table.
      $categoryCode = DB::table('systems')->where('id', '1')->value('categoryCode');
  
      // Fetch all categories with pagination.
      $categories = Category::paginate(20); // Correctly use paginate here
  
      // Get the last ID from the 'categories' table. Handle the case where the table is empty.
      $lastCategory = Category::orderBy('id', 'desc')->first();
      $lastId = $lastCategory ? $lastCategory->id + 1 : 1;  // Extract the 'id' from the object.
  
      // Generate the initial code.
      $code = "{$categoryCode}-{$lastId}";
  
      // Check if the generated code already exists in the 'categories' table.
      while (Category::where('code', $code)->exists()) {
          $lastId++;  // Increment the counter.
          $code = "{$categoryCode}-{$lastId}";  // Generate a new code.
      }
  
      // Pass the data to the view.
      return view('admin.modules.setting.category.category')->with([
          'categories' => $categories,
          'categoryCode' => $categoryCode,
          'lastId' => $lastId,  // The last ID for display or further use.
          'generatedCode' => $code  // The unique code to display in the input field.
      ]);
  }
  
  

  public function manageCategory2(Request $request)
  {
    $search = $request->input('q');
    $categories  = Category::where('name', 'like', "%$search%")
      ->limit(5)
      ->get();

    $formattedCategories = $categories->map(function ($category) {
      return ['id' => $category->id, 'text' => $category->name];
    });

    return response()->json($formattedCategories);

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


  //search product
  public function searchCategory(Request $request)
  {
      $Categories = DB::table('categories')
          ->where('id', 'like', '%' . $request->key . '%')
          ->orWhere('name', 'like', '%' . $request->key . '%')
          ->orWhere('code', 'like', '%' . $request->key . '%')
          ->orWhere('description', 'like', '%' . $request->key . '%')
          ->limit(10)
          ->get();
  
      if (!$Categories->isEmpty()) {
          foreach ($Categories as $Category) {
              // Render the HTML for each sub-category result.
              echo '
                  <p class="list-group-item list-group-item-action  mx-0 py-2 view" 
                    style="font-size: 13px; cursor:pointer;" 
                    
                    data-vid="' . $Category->id . '">
                      <i class="fa-fw fa fa-eye"></i> ' . htmlspecialchars($Category->name) . '
                  </p>
                  
              ';
          }
      } else {
          echo "<p>No  Category found.</p>";
      }
  }
}
