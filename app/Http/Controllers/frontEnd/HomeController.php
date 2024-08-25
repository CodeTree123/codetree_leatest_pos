<?php

namespace App\Http\Controllers\frontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Webcat;
use App\Webpro;

class HomeController extends Controller
{
   public function home()
   {
      $webcats=Webcat::orderBy('id','desc')->get();
      $webpros=Webpro::orderBy('id','desc')->limit(6)->get();
   	return view('frontEnd.home',['webcats'=>$webcats,'webpros'=>$webpros]);
   }

public function shopcat($id){

   $webpros=Webpro::orderBy('id','desc')->where('c_id',$id)->paginate(12);
   $webcats=Webcat::where('id',$id)->value('cname');
   return view('frontEnd.singlacat',['webcats'=>$webcats,'webpros'=>$webpros]);


}

public function shoppro($id){

   $webpros=Webpro::orderBy('id','desc')->where('id',$id)->first();
   
   return view('frontEnd.singlepro',['webpros'=>$webpros]);


}
   public function contactUs()
   {
   		return view('frontEnd.contactUs');
   }

   public function whereToBuy()
   {
   	return view('frontEnd.whereToBuy');
   }

   public function showroom()
   {
   	return view('frontEnd.showroom');
   }

   public function premiumWaxTechnology()
   {
   	return view('frontEnd.premiumWaxTechnology');
   }
   public function carnaubaWaxTechnology()
   {
   	return view('frontEnd.carnaubaWaxTechnology');
   }
   public function carCareTips()
   {
   	return view('frontEnd.carCareTips');
   }
}
