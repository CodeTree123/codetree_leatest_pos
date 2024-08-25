<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Webcat;
use App\Webpro;
use Image;
use DB;
use File;

class WebproController extends Controller
{
    public function index(){

	$webcats=Webcat::all();
	$webpros=Webpro::all();

    	return view('admin.website.product.manage',['webcats'=>$webcats,'webpros'=>$webpros]);
    }


    protected function imageUpload($request){
        $productImage = $request->file('image');
        $imageName = $productImage->getClientOriginalName();
        $directory = 'public/uploads/web_product_image/';
        $imageUrl = $directory.$imageName;
    
        Image::make($productImage)->resize(500,500)->save($imageUrl);

        return $imageUrl;
    }

    protected function imageUpload1($request){
        $productImage = $request->file('image1');
        $imageName = $productImage->getClientOriginalName();
        $directory = 'public/uploads/web_product_image/';
        $imageUrl1 = $directory.$imageName;
    
        Image::make($productImage)->resize(500,500)->save($imageUrl1);

        return $imageUrl1;
    }
protected function imageUpload2($request){
        $productImage = $request->file('image2');
        $imageName = $productImage->getClientOriginalName();
        $directory = 'public/uploads/web_product_image/';
        $imageUrl2 = $directory.$imageName;
    
        Image::make($productImage)->resize(500,500)->save($imageUrl2);

        return $imageUrl2;
    }


    public function store(Request $request)
    {
        // dd($request->all());
     

       $request->validate([
        'name'=>'required',
        'status'=>'required',
        ]);

        if($request->file('image')!==null){
        $image=$this->imageUpload($request);
      }else{
         $image=null;
      }

       if($request->file('image1')!==null){
        $image1=$this->imageUpload1($request);
      }else{
         $image1=null;
      }

       if($request->file('image2')!==null){
        $image2=$this->imageUpload2($request);
      }else{
         $image2=null;
      }

     
        
        $post=new Webpro;
        $post->name=$request->name;
        $post->description =$request->description;
        $post->c_id=$request->c_id;
        $post->brand=$request->brand;
        $post->price=$request->price;
        $post->condition=$request->condition;
        $post->status=$request->status;	
        $post->image=$image;
        $post->image1=$image1;
        $post->image2=$image2;
        $post->save();
       
        Toastr::success('Successully Added :)' ,'Success');
        return redirect()->route('admin.webpro');
    }

    public function viewProduct($id){
	    // $webpros=Webpro::find($id);
	    $webpros=Webpro::leftJoin('Webcats','Webpros.c_id','=','Webcats.id')->where('Webpros.id','=',$id)->first(['Webpros.*','webcats.cname']);
        return response()->json([
            'status'=>200,
            'webpro' => $webpros,
          ]);
        
    }
    public function editProduct($id){
	    // $webpros=Webpro::find($id);
      $webpros=Webpro::leftJoin('Webcats','Webpros.c_id','=','Webcats.id')->where('Webpros.id','=',$id)->first(['Webpros.*','webcats.cname']);
        return response()->json([
            'status'=>200,
            'webpro_info' => $webpros,
          ]);
        
    }

    public function updateProduct(Request $request)
    {


       $request->validate([
        'name'=>'required',
        'status'=>'required',
        ]);

        $web_product_info = DB::table('webpros')->where('id',$request->webpro_id)->first();
        // dd($product_info);

        if($request->file('image')!==null){
          if(File::exists($web_product_info->image)){
            File::delete($web_product_info->image);
          }
        $image=$this->imageUpload($request);
      }else{
         $image=DB::table('webpros')->where('id',$request->webpro_id)->value('image');
      }

       if($request->file('image1')!==null){
        if(File::exists($web_product_info->image1)){
          File::delete($web_product_info->image1);
        }
        $image1=$this->imageUpload1($request);
      }else{
         $image1=DB::table('webpros')->where('id',$request->webpro_id)->value('image1');
      }

       if($request->file('image2')!==null){
        $image2=$this->imageUpload2($request);
        if(File::exists($web_product_info->image2)){
          File::delete($web_product_info->image2);
        }
      }else{
         $image2=DB::table('webpros')->where('id',$request->webpro_id)->value('image2');
      }

      try{
        DB::table('webpros')->where('id',$request->webpro_id)
        ->update([
          'name'=> $request->name,
          'description' => $request->description,
          'c_id'=> $request->c_id,
          'brand'=> $request->brand,
          'price'=> $request->price,
          'condition'=> $request->condition,
          'status'=>$request->status,	
          'image'=> $image,
          'image1'=>$image1,
          'image2'=>$image2,
        ]);
        Toastr::success('Product  Updated Successfully.');
        return redirect()->back();
     }catch(\Exception $e)
     {
        Toastr::error('something wrong.');
        return redirect()->back();
     }
    
    }

    public function deleteProduct(Request $request){
      $request->validate(
        [
          'id'=>'required|numeric'
        ]);
      
      try{
        // DB::table('webpros')->where('id',$request->id)->delete();
        $d = Webpro::where('id',$request->id)->first();
        if(File::exists($d->image)){
          File::delete($d->image);
        }
        if(File::exists($d->image1)){
          File::delete($d->image1);
        }
        if(File::exists($d->image2)){
          
          File::delete($d->image2);
        }
        $d ->delete();
        Toastr::success('product deleted successfully');
        return redirect()->back();
      }catch(\Exception $e)
      {
        session()->flash('error-message',$e->getMessage());
        return redirect()->back();
      }
    }

}
