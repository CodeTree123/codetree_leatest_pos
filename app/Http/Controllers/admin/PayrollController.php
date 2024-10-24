<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Payroll;
use App\Employee;
use App\Bonus;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Deduction;
use App\StoreAttendence;
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
        $employees = Employee::paginate(10);
        $total = Employee::all()->count();
        return view('admin.payroll.deduction', compact('pageTitle', 'employees', 'total'));
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
        $query = Payroll::where('employee_id', $request->employee_id);
        
        if ($request->month) {
            $query->whereRaw('MONTH(pay_date) = ?', [$request->month]);
        }
    
        return DataTables::of($query)
            ->editColumn('pay_date', function ($payroll) {
                return Carbon::parse($payroll->pay_date)->format('Y-m-d');
            })
            ->editColumn('basic_salary', function ($payroll) {
                return number_format($payroll->basic_salary, 2);
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
    
    public function deductionData(Request $request)
    {
        $query = Deduction::where('employee_id', $request->employee_id);
        
        if ($request->month) {
            $query->whereRaw('MONTH(deduction_date) = ?', [$request->month]);
        }
    
        return DataTables::of($query)
            ->editColumn('deduction_date', function ($deduction) {
                return Carbon::parse($deduction->deduction_date)->format('Y-m-d');
            })
            ->editColumn('tax', function ($deduction) {
                return number_format($deduction->tax, 2);
            })
            ->editColumn('social_security', function ($deduction) {
                return number_format($deduction->social_security, 2);
            })
            ->editColumn('other_deductions', function ($deduction) {
                return number_format($deduction->other_deductions, 2);
            })
            ->make(true);
    }
    
    public function bonusData(Request $request)
    {
        $query = Bonus::where('employee_id', $request->employee_id);
        
        if ($request->month) {
            $query->whereRaw('MONTH(date_given) = ?', [$request->month]);
        }
    
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
            ->make(true);
    }
    
    public function attendanceData(Request $request)
    {
        $query = StoreAttendence::where('employee_id', $request->employee_id);
    
        if ($request->month) {
            $query->whereRaw('MONTH(STR_TO_DATE(date, "%d/%m/%Y")) = ?', [$request->month]);
        }
    
        // Log the query with bindings for debugging
        Log::info($query->toSql(), $query->getBindings());
    
        return DataTables::of($query)
            ->editColumn('date', function ($attendance) {
                try {
                    // Try to parse the date assuming it might be in different formats
                    $date = Carbon::createFromFormat('d/m/Y', $attendance->date);
                } catch (\Exception $e) {
                    try {
                        // Fallback to the standard format 'Y-m-d'
                        $date = Carbon::createFromFormat('Y-m-d', $attendance->date);
                    } catch (\Exception $ex) {
                        // If parsing fails, return the raw date as-is
                        Log::warning("Invalid date format for attendance ID {$attendance->id}: {$attendance->date}");
                        return $attendance->date;
                    }
                }
                return $date->format('Y-m-d');
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

public function deductionsStore(Request $request)
{
    $request->validate([
        'employee_id' => 'required|exists:employees,id',
        'tax' => 'nullable|numeric|min:0',
        'social_security' => 'nullable|numeric|min:0',
        'other_deductions' => 'nullable|numeric|min:0',
        'deduction_date' => 'required|date'
    ]);

    // Ensure at least one field has a value
    if (
        is_null($request->tax) &&
        is_null($request->social_security) &&
        is_null($request->other_deductions)
    ) {
        Toastr::error('You must provide at least one deduction value.');
        return redirect()->back();
    }

    try {
        // Store the deduction in the database
        $deduction=Deduction::create([
            'employee_id' => $request->employee_id,
            'tax' => $request->tax ?? 0,
            'social_security' => $request->social_security ?? 0,
            'other_deductions' => $request->other_deductions ?? 0,
            'deduction_date' => $request->deduction_date,
        ]);



        // Success message using Toastr
        Toastr::success('Deduction added successfully.');
        return redirect()->route('admin.payroll.employeeWorkingDetails',$request->employee_id);

    } catch (\Exception $e) {
        // Error handling
        Toastr::error('Something went wrong. Please try again.');
        return redirect()->back();
    }
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
