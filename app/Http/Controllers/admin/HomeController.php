<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Webcat;
use App\Webpro;
use App\attendence;
use App\StoreAttendence;
use DB;
use Brian2694\Toastr\Facades\Toastr;


class HomeController extends Controller
{

   public function attendence()
   {
      $date = date("d/m/Y");
      $attendence = attendence::all();
      // dd($attendence);
      // dd($date);
      return view('admin.modules.attendence', compact('date', 'attendence'));
      // return "hello";
   }
   public function attendence_list()
   {
      $date = date("d/m/Y");
      $attendence = attendence::all();
      // dd($attendence);
      // dd($date);
      return view('admin.modules.attendence_list', compact('date', 'attendence'));
      // return "hello";
   }
   public function attendenceData()
   {
      $data = StoreAttendence::orderBy('id', 'DESC')->get();
      return view('admin.modules.attendence_data', compact('data'));
   }
   public function add_attendence(Request $res)
   {
      $status = 1;
      $attendence = new attendence;
      $attendence->name = $res->ename;
      $attendence->emp_id = $res->eID;
      $attendence->starting_date = $res->e_S_Date;
      $attendence->status = $status;

      try {
         $attendence->save();
         Toastr::success('Added Successfully.');
         return redirect()->back();
      } catch (\Exception $e) {
         session()->flash('error-message', $e->getMessage());
         return redirect()->back();
      }
   }
}
