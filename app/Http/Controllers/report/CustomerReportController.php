<?php

namespace App\Http\Controllers\report;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CustomerReportController extends Controller
{
	public function customerReport()
	{
		$customers=DB::table('customers')
		->paginate(15);
		
		return view('admin.modules.report.customerReport')->with(['customers'=>$customers]);
	}

	public static function getTotalAmount($id)
	{
		$totalSale=DB::table('sales')->where('customer_id',$id)->sum('grand_total');
		return $totalSale;
	}
	//total shopping
	public static function getTotalShopping($id)
	{
		$totalSale=DB::table('sales')->where('customer_id',$id)->count();
		return $totalSale;
	}

	public static function getTotalPaid($id)
	{
		$salePaid=DB::table('sales')->where('customer_id',$id)->sum('paid_amount');
		$dueReturn=DB::table('sales_due_returns')->where('customer_id',$id)->sum('paid_amount');
		$totalPaid=$salePaid+$dueReturn;
		return $totalPaid;
	}
	public static function getStartBalance($id)
	{
		$getStartBalance=DB::table('customers')->where('id',$id)->value('start_balance');
		
		return $getStartBalance;
	}
//searchCustomer
	public function searchCustomer(Request $request)
	{
		$key=$request->key;

		$customers=DB::table('customers')
		->where('id','like','%'.$request->key.'%')
		->orWhere('name','like','%'.$request->key.'%')
		->orWhere('mobile','like','%'.$request->key.'%')
		->get();
		return view('admin.modules.report.searchCustomer')->with(['customers'=>$customers]);
		// if(!$customers->isEmpty()){
		// 	foreach($customers as $customer)
		// 	{
		// 		echo "<a href='customer-details/".$customer->id."' class='list-group-item list-group-item-action mx-0 py-2'>".$customer->name."(".$customer->mobile.")</a>";
		// 	}
		// }else{
		// 	echo "<a href='#' class='list-group-item list-group-item-action mx-0 py-2'>No customer found</a>";
		// }

	}

}
