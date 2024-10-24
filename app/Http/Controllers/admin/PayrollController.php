<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Payroll;
use App\Employee;
use App\Bonus;
use App\Deduction;
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
        $employee = Employee::with(['payrolls', 'deductions', 'bonuses','store_attendances'])->findOrFail($id);

        //HERE WE HAVE TO ADD deduction and bonuses calculation and show total deduction, total bonus .
    
        // return compact('employee');
        // Pass the data to the view
        return view('admin.payroll.employeeWorkingDetails', compact('employee'));
    }
    

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
