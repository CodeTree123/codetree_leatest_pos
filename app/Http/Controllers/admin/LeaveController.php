<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Leave;
use App\Employee;
use Brian2694\Toastr\Facades\Toastr;

class LeaveController extends Controller
{
    public function create()
    {
        $employees = Employee::where('status', 1)->get();
        return view('leave.create', compact('employees'));
    }

    // Store the leave request
    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string|max:255',
        ]);

        Leave::create([
            'emp_id' => $request->emp_id,  // Assuming the user is logged in
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->reason,
            'status' => 0,
        ]);

        Toastr::success('Leave request submitted successfully.');
        return redirect()->back();
    }

    // Admin: List all leave requests
    public function index()
    {
        $leaves = Leave::with('employee')->orderBy('created_at', 'desc')->get();
        return view('leave.index', compact('leaves'));
    }

    // Admin: Approve/Reject leave request
    public function update(Request $request, $id)
    {
        $leave = Leave::findOrFail($id);

        $request->validate([
            'status' => 'required|in:1,0',
        ]);

        $leave->status = $request->status;
        $leave->save();

        Toastr::success('Leave request updated successfully.');
        return redirect()->back();
    }
}
