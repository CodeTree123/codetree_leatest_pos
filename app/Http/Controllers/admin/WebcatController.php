<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Webcat;
use Image;
use DB;
use File;

class WebcatController extends Controller
{
  public function index()
  {

    $webcats = Webcat::all();

    return view('admin.website.category.manage', ['webcats' => $webcats]);
  }


  protected function imageUpload($request)
  {
    $productImage = $request->file('image');
    $imageName = $productImage->getClientOriginalName();
    $directory = 'public/uploads/web_catagory_image/';
    $imageUrl = $directory . $imageName;

    Image::make($productImage)->resize(960, 540)->save($imageUrl);

    return $imageUrl;
  }

  protected function saveProductInfo($request, $imageUrl)
  {
    $client = new Webcat();
    $client->cname = $request->cname;
    $client->status = $request->status;
    $client->description = $request->description;
    $client->image = $imageUrl;
    if ($client->save()) {
      Toastr::success('Successully Added :)', 'Success');
      return redirect('admin/website/category')->with('message', 'Added Successfully');
    }
  }

  public function store(Request $request)
  {
    $request->validate([
      'cname' => 'required',
    ]);
    //$this->validateproduct($request);
    $imageUrl = $this->imageUpload($request);
    $this->saveProductInfo($request, $imageUrl);

    return redirect('admin/website/category')->with('error', 'There have an error !!');
  }

  public function editCatagory($id)
  {
    $webcats = Webcat::find($id);
    //   $webpros=Webpro::leftJoin('Webcats','Webpros.c_id','=','Webcats.id')->where('Webpros.id','=',$id)->first(['Webpros.*','webcats.cname']);
    return response()->json([
      'status' => 200,
      'webcat_info' => $webcats,
    ]);
  }

  public function updateCatagory(Request $request)
  {
    // dd($request->all());
    $request->validate([
      'cname' => 'required',
    ]);

    $web_catagory_info = DB::table('webcats')->where('id', '=', $request->webcat_id)->first();
    // dd($catagory_info);
    if ($request->file('image') !== null) {
      if (File::exists($web_catagory_info->image)) {
        File::delete($web_catagory_info->image);
      }
      $image = $this->imageUpload($request);
    } else {
      $image = DB::table('webcats')->where('id', $request->webcat_id)->value('image');
    }

    try {
      DB::table('webcats')->where('id', '=', $request->webcat_id)
        ->update([
          'cname' => $request->cname,
          'description' => $request->description,
          'status' => $request->status,
          'image' => $image,
        ]);
      Toastr::success('Catagory  Updated Successfully.');
      return redirect()->back();
    } catch (\Exception $e) {
      Toastr::error('something wrong.');
      return redirect()->back();
    }
  }

  public function deleteCatagory(Request $request)
  {
    $request->validate(
      [
        'id' => 'required|numeric'
      ]
    );

    try {
      $c = Webcat::where('id', $request->id)->first();
      if (File::exists($c->image)) {
        File::delete($c->image);
      }
      $c->delete();
      Toastr::success('Catagory deleted successfully');
      return redirect()->back();
    } catch (\Exception $e) {
      session()->flash('error-message', $e->getMessage());
      return redirect()->back();
    }
  }
}