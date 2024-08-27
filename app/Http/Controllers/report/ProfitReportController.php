<?php

namespace App\Http\Controllers\report;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SalesProducts;
use DB;
use Illuminate\Support\Carbon;

class ProfitReportController extends Controller
{
    public function profitReport()
    {
        $today = Carbon::today();
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $startOfWeek = Carbon::now()->startOfWeek(); // Start of the week (Monday)
        $endOfWeek = Carbon::now()->endOfWeek();
        $weeklyRevenue = SalesProducts::whereBetween('sales_date', [$startOfWeek, $endOfWeek])
        ->sum('product_revenue');
        $todayRevenue = SalesProducts::whereDate('sales_date', $today)->sum('product_revenue');

        $monthRevenue = SalesProducts::whereMonth('sales_date', $currentMonth)
            ->whereYear('sales_date', $currentYear)
            ->sum('product_revenue');

        $yearRevenue = SalesProducts::whereYear('sales_date', $currentYear)
            ->sum('product_revenue');

        $profits = SalesProducts::with('products')->paginate(15);


        return view('admin.modules.report.profitReport')->with([
            'profits' => $profits,
            'todayRevenue' => $todayRevenue,
            'monthRevenue' => $monthRevenue,
            'yearRevenue' => $yearRevenue,
            'weeklyRevenue' => $weeklyRevenue,
        ]);
    }
}
