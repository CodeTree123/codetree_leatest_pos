<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Payroll;
use App\Employee;
use App\Bonus;
use App\BasicSalary;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Deduction;
use App\StoreAttendance;
use Yajra\DataTables\DataTables;
use Brian2694\Toastr\Facades\Toastr;

class PayrollController extends Controller
{
    public function calculatePayroll($employeeId, $value)
    {
        $employee = Employee::find($employeeId);

        if (!$employee) {
            return redirect()->back()->with('error', 'Employee not found.');
        }



        $deduction = $employee->deductions;
        $basicSalary = $employee->basic_salary;

        $totalDeductions = ($deduction->tax ?? 0) + ($deduction->social_security ?? 0) + ($deduction->other_deductions ?? 0);
        if ($value->bonus == 1) {
            $latestBonus = $employee->bonuses()->latest()->first();
            $totalBonuses = $latestBonus->amount ?? 0;
        } else {
            $totalBonuses = 0;
        }

        $netSalary = $basicSalary + $totalBonuses - $totalDeductions;

        Payroll::create([
            'employee_id' => $employee->id,
            'basic_salary' => $basicSalary,
            'total_deductions' => $totalDeductions,
            'total_bonuses' => $totalBonuses,
            'net_salary' => $netSalary,
            'pay_date' => now()
        ]);
    }


    public function index()
    {
        $payrolls = Payroll::with('employee')->get();
        return view('admin.payroll.index', compact('payrolls'));
    }

    public function deduction(){
        $pageTitle = "Employee Data Track";
        $employees = Employee::with('basic_salaries')->paginate(10);
        $total = Employee::all()->count();
        return view('admin.payroll.deduction', compact('pageTitle', 'employees', 'total'));
        //return  compact('pageTitle', 'employees', 'total');

    }

    public function employeeWorkingDetails($id)
    {
        // Fetch employee along with related payrolls, deductions, and bonuses
        $employee = Employee::findOrFail($id);

        // Pass the data to the view
        return view('admin.payroll.employeeWorkingDetails', compact('employee'));
    }


    public function payrollData(Request $request)
    {
        $query = Payroll::with('basicSalary')->where('employee_id', $request->employee_id);

        
        if ($request->month) {
            $query->whereRaw('MONTH(created_at) = ?', [$request->month]);
        }
    
        return DataTables::of($query)
            ->editColumn('pay_date', function ($payroll) {
                return $payroll->pay_date==NULL?NULL: Carbon::parse($payroll->pay_date)->format('Y-m-d');
                
            })
            ->editColumn('basic_salary', function ($payroll) {
                return number_format($payroll->basicSalary->basic_salary, 2); 
            })
            ->editColumn('total_deductions', function ($payroll) {
                return number_format($payroll->total_deductions, 2);
            })
            ->editColumn('total_bonuses', function ($payroll) {
                return number_format($payroll->total_bonuses, 2);
            })
            ->editColumn('net_salary', function ($payroll) {
                return number_format($payroll->net_salary, 2);
            })
            ->make(true);
    }
    


    public function markAsPaid(Request $request)
    {
        $payroll = Payroll::find($request->id);
        
        if ($payroll && !$payroll->pay_date) {
            $payroll->pay_date = now(); // Mark it as paid
            $payroll->save();
    
            return response()->json(['success' => true, 'message' => 'Salary marked as paid.']);
        }
        
        return response()->json(['success' => false, 'message' => 'Payroll not found or already paid.']);
    }
    
    public function deductionData(Request $request)
    {
        $query = Deduction::where('employee_id', $request->employee_id);
        
        if ($request->month) {
            $query->whereRaw('MONTH(deduction_date) = ?', [$request->month]);
        }
    
        // Check if payroll is finalized for the employee and month
        $check_payroll = Payroll::where('employee_id', $request->employee_id)
            ->whereNotNull('pay_date')
            ->where('salary_month',$request->month)
            ->first();
    
        return DataTables::of($query)
            ->editColumn('deduction_date', function ($deduction) {
                return Carbon::parse($deduction->deduction_date)->format('Y-m-d');
            })
            ->editColumn('deduction_amount', function ($deduction) {
                return number_format($deduction->deduction_amount, 2);
            })
            ->addColumn('excused_status', function ($deduction) use ($check_payroll) {
                if ($check_payroll) {
                    return $deduction->is_excused 
                    ? '<span class="badge bg-success text-light">Excused</span>' 
                    : '<span class="badge bg-danger text-light">Not Excused</span>';
                } else {
                    // If payroll is not finalized, return the editable checkbox
                    return '<input type="checkbox" class="excuse-check" data-id="' . $deduction->id . '" ' . ($deduction->is_excused ? 'checked' : '') . '>';
                }
            })
            ->rawColumns(['excused_status']) // Enable raw HTML rendering
            ->make(true);
    }
    
    public function bonusData(Request $request)
    {
        $query = Bonus::where('employee_id', $request->employee_id);
        
        if ($request->month) {
            $query->whereRaw('MONTH(date_given) = ?', [$request->month]);
        }

        // Check if payroll is finalized for the employee and month
        $check_payroll = Payroll::where('employee_id', $request->employee_id)
        ->whereNotNull('pay_date')
        ->where('salary_month',$request->month)
        ->first();

        return DataTables::of($query)
            ->editColumn('date_given', function ($bonus) {
                return Carbon::parse($bonus->date_given)->format('Y-m-d');
            })
            ->editColumn('amount', function ($bonus) {
                return number_format($bonus->amount, 2);
            })
            ->editColumn('description', function ($bonus) {
                return $bonus->description;
            })
            ->addColumn('canceled_status', function ($deduction) use ($check_payroll) {
                if ($check_payroll) {
                    return $deduction->is_canceled 
                    ? '<span class="badge bg-success text-light">Canceled</span>' 
                    : '<span class="badge bg-danger text-light">Not Canceled</span>';
                } else {
                    // If payroll is not finalized, return the editable checkbox
                    return '<input type="checkbox" class="cancel-check" data-id="' . $deduction->id . '" ' . ($deduction->is_canceled ? 'checked' : '') . '>';
                }
            })
            ->rawColumns(['canceled_status']) // Enable raw HTML rendering
            ->make(true);
    }
    
    public function attendanceData(Request $request)
    {
        $query = StoreAttendance::where('employee_id', $request->employee_id);
        
    
        if ($request->month) {
            $query->whereRaw('MONTH(date) = ?', [$request->month]);
        }
 

    
        return DataTables::of($query)
            ->editColumn('date', function ($attendance) {
                return Carbon::parse($attendance->date)->format('Y-m-d');
            })
            ->editColumn('late_time', function ($attendance) {
                return number_format($attendance->late_time, 2);
            })
            ->editColumn('status', function ($attendance) {
                return $attendance->status;
            })
            ->make(true);
    }
    

    // Repeat similar methods for deductions, bonuses, and attendances
    
    

    public function bonusesStore(Request $request)
{

    try{
        $request->validate([
            'employee_id2' => 'required|exists:employees,id',
            'amount' => 'required',
            'date_given' => 'required|date',
            'description' => 'nullable',
        ]);
    
        Bonus::create([
            'employee_id' => $request->employee_id2,
            'amount' => $request->amount,
            'date_given' => $request->date_given,
            'description' => $request->description,
        ]);
    
        Toastr::success('Employee Bonus Updated successfully.');
        return redirect()->route('admin.payroll.employeeWorkingDetails',$request->employee_id2);
    }catch (\Exception $e) {
        // Error handling

        Toastr::error('Something went wrong. Please try again.'.$e->getMessage());
        return redirect()->back();
    }
   
}

public function toggleCancel(Request $request){

    $id=$request->bonus_id;
    $is_canceled=$request->is_canceled;
    $bonus=Bonus::find($id);
    $bonus->is_canceled=$is_canceled==1?1:0;
    $bonus->save();
    return response()->json(['status' => 'success', 'newStatus' => $bonus->is_canceled]);
}

public function deductionsStore(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'employee_id' => 'required|exists:employees,id',
        'deduction_amount' => 'required|numeric|min:1',
        'deduction_description' => 'required',
        'deduction_date' => 'required|date'
    ]);

    // Get the month from the deduction date
    $deductionMonth = date('m', strtotime($request->deduction_date));

    // Check if payroll is finalized for the employee and the month of the deduction date
    $check_payroll = Payroll::where('employee_id', $request->employee_id)
        ->whereNotNull('pay_date')
        ->where('salary_month', $deductionMonth)
        ->first();
    // If payroll is finalized, do not allow adding a new deduction
    if ($check_payroll) {
        Toastr::error('Cannot add a new deduction. Payroll for this month is finalized.');
        return redirect()->back();
    }

    try {
        // Store the deduction in the database
        $deduction = Deduction::create([
            'employee_id' => $request->employee_id,
            'deduction_amount' => $request->deduction_amount ?? 0,
            'description' => $request->deduction_description ?? "",
            'deduction_date' => $request->deduction_date,
        ]);

        // Success message using Toastr
        Toastr::success('Deduction added successfully.');
        return redirect()->route('admin.payroll.employeeWorkingDetails', $request->employee_id);
    } catch (\Exception $e) {
        // Error handling
        Toastr::error('Something went wrong. Please try again.');
        return redirect()->back();
    }
}


public function toggleExcuse(Request $request){

    $id=$request->deduction_id;
    $is_excused=$request->is_excused;
    $deduction=Deduction::find($id);
    $deduction->is_excused=$is_excused==1?1:0;
    $deduction->save();
    return response()->json(['status' => 'success', 'newStatus' => $deduction->is_excused]);
}

public function deductionFinalize(Request $request)
{
    // Validate if the month is provided
    if (!$request->month) {
        return response()->json([
            'success' => false,
            'message' => 'Please select both the employee and the month.'
        ]);
    }

    if($request->month){
        $check_payroll = Payroll::where('employee_id', $request->employee_id)
        ->whereNotNull('pay_date')
        ->first();
        if($check_payroll){
            return response()->json([
                'success' => false,
                'message' => 'The salary for this month has already been finalized and Paid'
            ]);
        }
    }
    // Fetch individual totals for each deduction column, excluding excused deductions
    $deduction_total = Deduction::where('employee_id', $request->employee_id)
        ->whereRaw('MONTH(deduction_date) = ?', [$request->month])
        ->where('is_excused', 0) // Only include non-excused deductions
        ->sum('deduction_amount');

        
    // Calculate the total deductions for the month
    $total_deductions = $deduction_total;

    // Fetch total bonuses for the given employee and month
    $total_bonuses = Bonus::where('employee_id', $request->employee_id)
        ->where('bonus_month', $request->month)
        ->where('is_canceled',0)
        ->sum('amount');

    // Get the employee's basic salary
    $basic_salary = BasicSalary::where('employee_id', $request->employee_id)->value('basic_salary');

    if (!$basic_salary) {
        return response()->json([
            'success' => false,
            'message' => 'No basic salary found for this employee.'
        ]);
    }

    // Calculate the net salary
    $net_salary = $basic_salary + $total_bonuses - $total_deductions;



    // Check if a payroll entry already exists for the employee and month
    $payroll = Payroll::where('employee_id', $request->employee_id)
        ->where('salary_month', $request->month)
        ->first();

    if ($payroll) {
        // Update the existing payroll record
        $payroll->total_deductions = $total_deductions;
        $payroll->total_bonuses = $total_bonuses;
        $payroll->net_salary = $net_salary;
        
        $payroll->save();
    } else {
        // Create a new payroll record
        $newPayroll = new Payroll;
        $newPayroll->employee_id = $request->employee_id;
        $newPayroll->total_deductions = $total_deductions;
        $newPayroll->total_bonuses = $total_bonuses;
        $newPayroll->net_salary = $net_salary;
        $newPayroll->salary_month = $request->month;
        $newPayroll->save();
    }

    return response()->json([
        'success' => true,
        'message' => 'Payroll has been finalized successfully.'
    ]);
}



    public function generatePayrollForAllEmployees(Request $value)
    {
        $employees = Employee::all();
        foreach ($employees as $employee) {
            $this->calculatePayroll($employee->id, $value);
        }
        return redirect()->back()->with('success', 'Payroll calculated successfully.');
    }

    public function generatePayrollForEmployee($employeeId)
    {
        $value = (object) ['bonus' => 0];
        $this->calculatePayroll($employeeId, $value);
        return redirect()->back()->with('success', 'Payroll generated successfully.');
    }

    public function bonus()
    {
        $bonuses = Bonus::with('employee')->get();
        $employees = Employee::where('status', 1)->get();
        return view('admin.payroll.bonus', compact('bonuses', 'employees'));
    }

    public function addBonus(Request $data)
    {
        $bonus = new Bonus();
        $bonus->employee_id = $data->employee_id;
        $bonus->amount = $data->amount;
        $bonus->description = $data->description;
        $bonus->date_given = $data->date_given;
        $bonus->save();
        Toastr::success('Employee Bonus Updated successfully.');
        return redirect()->route('admin.payroll.bonus');
    }
}
