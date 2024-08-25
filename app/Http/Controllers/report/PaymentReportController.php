<?php

namespace App\Http\Controllers\report;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Payment;

class PaymentReportController extends Controller
{
    public function paymentReport()
    {
    	$payments=Payment::paginate(10);
         $totalPaid=Payment::where('type','paid')->sum('amount');
         $totalReceived=Payment::where('type','Received')->sum('amount');
    	return view('admin.modules.report.paymentReport')->with([
        'payments'=>$payments,
        'totalReceived'=>$totalReceived,
        'totalPaid'=>$totalPaid,
    	]);
    }
    //dateWisePaymentReport
    public function dateWisePaymentReport(Request $request)
    { 
        $pDate=$request->paymentDate;
        $payments=Payment::where('pDate',$pDate)->get();
         $totalPaid=Payment::where('type','paid')->where('pDate',$pDate)->sum('amount');
         $totalReceived=Payment::where('type','Received')->where('pDate',$pDate)->sum('amount');

         return view('admin.modules.report.dateWisePaymentReport')->with([
        'payments'=>$payments,
        'totalReceived'=>$totalReceived,
        'totalPaid'=>$totalPaid,
        'pDate'=>$pDate,
        ]);
    }


    public function paymentBetweenTwoDate(Request $request){

         $startDate=$request->startDate;
         $endDate=$request->endDate;
         $payments=Payment::whereBetween('pDate', [$startDate, $endDate])->get();
         $totalPaid=Payment::where('type','paid')->whereBetween('pDate', [$startDate, $endDate])->sum('amount');
         $totalReceived=Payment::where('type','Received')->whereBetween('pDate', [$startDate, $endDate])->sum('amount');

         return view('admin.modules.report.paymentBetweenTwoDate')->with([
        'payments'=>$payments,
        'totalReceived'=>$totalReceived,
        'totalPaid'=>$totalPaid,
        'startDate'=>$startDate,
        'endDate'=>$endDate,
        ]);


    }
}
