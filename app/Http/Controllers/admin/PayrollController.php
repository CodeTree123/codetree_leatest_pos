<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Payroll;
use App\Employee;
use App\Bonus;
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
