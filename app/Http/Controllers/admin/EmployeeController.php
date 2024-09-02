<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use Brian2694\Toastr\Facades\Toastr;

class EmployeeController extends Controller
{
    public function employeeList()
    {
        $pageTitle = "Employee List";
        $employees = Employee::paginate(10);
        $total = Employee::all()->count();
        return view('admin.modules.people.employees.employeeList', compact('pageTitle', 'employees', 'total'));
    }
    public function employeeAdd(Request $data)
    {
        $data->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'position' => 'required',
            'hire_date' => 'required',
        ]);
        $unique_emp_id = random_int(100000, 999999);

        $employee = new Employee();
        $employee->em_id = $unique_emp_id;
        $employee->name = $data->name;
        $employee->email = $data->email;
        $employee->position = $data->position;
        $employee->hire_date = $data->hire_date;
        $employee->status = 1;
        $employee->save();
        return redirect()->route('admin.employeeList')
            ->with('success', 'Employee added successfully.');
    }

    public function viewEmployee($id)
    {
        $user = Employee::find($id);
        return response()->json([
            'status' => 200,
            'Employee' => $user,
        ]);
    }

    public function editEmployee($id)
    {
        $users = Employee::find($id);
        return response()->json([
            'status' => 200,
            'employee' => $users,
        ]);
    }

    public function employeeUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'position' => 'required',
            'hire_date' => 'required',
            'status' => 'required',
        ]);
        $id = $request->emp_id;
        $admin = Employee::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->position = $request->position;
        $admin->hire_date = $request->hire_date;
        $admin->status = $request->status;
        try {
            $admin->update();
            Toastr::success('Employee Updated successfully.');
            return redirect()->route('admin.employeeList');
        } catch (\Exception $e) {
            session()->flash('error-message', $e->getMessage());
            return redirect()->back();
        }
    }

    public function deleteEmployee(Request $request)
    {
        $request->validate(
            [
                'id' => 'required|numeric'
            ]
        );
        try {
            $employee = Employee::where('id', $request->id);
            $employee->delete();
            Toastr::success('Employee deleted successfully');
            return redirect()->route('admin.employeeList');
        } catch (\Exception $e) {
            session()->flash('error-message', $e->getMessage());
            return redirect()->back();
        }
    }
}
