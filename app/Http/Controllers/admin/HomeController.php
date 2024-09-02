<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Webcat;
use App\Webpro;
use App\attendence;
use App\Employee;
use App\StoreAttendence;
use DB;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;


class HomeController extends Controller
{

   public function attendence()
   {
      $date = date("d/m/Y");
      $attendance = Employee::where('status', 1)->get();
      return view('admin.modules.attendence', compact('date', 'attendance'));
   }

   public function attendenceData()
   {
      $data = StoreAttendence::orderBy('id', 'DESC')->get();
      return view('admin.modules.attendence_data', compact('data'));
   }
}
