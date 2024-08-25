<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Units;
use DB;
class UnitsController extends Controller
{
    public function units()
    {
        $unitCode=DB::table('systems')->where('id','1')->value('unitCode');
        $units=Units::paginate(10);
        return view('admin.modules.setting.units.units')->with(['units'=>$units,'unitCode'=>$unitCode]);
    }

    public function unitSave(Request $request)
    {
    	$request->validate([
           'name'=>'required',
           'code'=>'required|unique:units',
       ]);

    	$unit=new Units;
    	$unit->code=$request->code;
    	$unit->name=$request->name;
    	$unit->base_unit=$request->base_unit;
    	$unit->operator=$request->operator;
    	$unit->operation_value=$request->operation_value;
    	try{
    		$unit->save();
    		Toastr::success('Unit added successfully');
    		return redirect()->route('admin.units');
    	}catch(\Exception $e){
            session()->flash('error-message',$e->getMessage());
            return redirect()->back();

        }
    }

  //unit details
  public function unitDetails(Request $request)
  {
    $unit=DB::table('units')->where('id',$request->id)->first();
    return view('admin.modules.setting.units.unitDetails')->with(['unit'=>$unit]);
  }  

  //edit unit
  public function editUnit(Request $request)
  { 
    $units=Units::all();
     $unit=DB::table('units')->where('id',$request->id)->first();
    return view('admin.modules.setting.units.editUnit')->with(['unit'=>$unit,'units'=>$units]);
  }
  //update unit 
  public function updateUnit(Request $request)
  {
    DB::table('units')->where('id',$request->id)->update([
     'name'=>$request->name,
     'base_unit'=>$request->base_unit,
     'operator'=>$request->operator,
     'operation_value'=>$request->operation_value,
    ]);
    Toastr::success('Unit updated','success');
    return redirect()->route('admin.units');
  }
  //delete unit
  public function deleteUnit(Request $request)
  {
    DB::table('units')->where('id',$request->id)->delete();
    Toastr::success('Unit deleted');
    return redirect()->route('admin.units');
  }
}
