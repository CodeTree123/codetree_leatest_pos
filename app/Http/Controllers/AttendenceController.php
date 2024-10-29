<?php

namespace App\Http\Controllers;

use App\StoreAttendance;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Deduction;
use App\Payroll;
use App\BasicSalary;


class AttendenceController extends Controller
{
    //
    public function storeAttendence(Request $request)
    {

        $count = count($request->employee_id);
        $date = date("Y-m-d");
        $check = StoreAttendance::where('date', $date)->first();

        if ($check) {
            return back()->with('error', 'data update already!');
        } else {
            for ($i = 0; $i < $count; $i++) {
                $attend = new StoreAttendance();

                $attend->attendence_owner = auth()->guard('admin')->id();
                $attend->employee_name = $request->employee_name[$i];
                $attend->employee_id = $request->employee_id[$i];
                $attend->status = $request->status[$i];
                $attend->date = $date;

                $attend->save();

                if($request->status[$i] ==0){
                  
                    $basic_salary = BasicSalary::where('employee_id', $request->employee_id[$i])->value('basic_salary');
                    $daily_salary = $basic_salary / 30;
                    $deduction = new Deduction();
                    $deduction->employee_id = $request->employee_id[$i];
                    $deduction->deduction_amount = $daily_salary;
                    $deduction->description="Deduction for absence";
                    $deduction->deduction_date = Carbon::now()->toDateString();
                    $deduction->save();

                }
            }

            return back()->with('Success', 'data update successfully!');
        }
    }

    public function toggleStatus(Request $request)
    {
        $attendanceId = $request->input('attendanceId');
        $empId = $request->input('empId');
        $attendance = StoreAttendance::find($attendanceId);
    
        if ($attendance) {
            $basic_salary = BasicSalary::where('employee_id', $empId)->value('basic_salary');
            $daily_salary = $basic_salary / 30;
    
            // Get the current time and threshold (9:00 AM)
            $currentTime = Carbon::now();
            $lateThreshold = Carbon::createFromTime(9, 0, 0); // 9:00 AM
    
            // Check if current time is after 9:00 AM to calculate late time
            if ($currentTime->greaterThan($lateThreshold)) {
                $lateMinutes = $lateThreshold->diffInMinutes($currentTime);
                $lateHours = $lateMinutes / 60; // Convert to decimal hours
                $attendance->late_time = round($lateHours, 2); // Store late time
            }
    
            // Toggle attendance status
            $attendance->status = $attendance->status == 1 ? 0 : 1;
            $attendance->save();
    
            // Check if a deduction for this employee and today already exists
            $existingDeduction = Deduction::where('employee_id', $empId)
                ->whereDate('created_at', Carbon::today())
                ->first();
    
            if ($attendance->status == 1) {
                // If attendance is marked as present, delete today's deduction if it exists
                if ($existingDeduction) {
                    $existingDeduction->delete();
                }
            } else {
                // If marked as absent, add a deduction only if none exists for today
                if (!$existingDeduction) {
                    $deduction = new Deduction();
                    $deduction->employee_id = $empId;
                    $deduction->deduction_amount = $daily_salary;
                    $deduction->description="Deduction for absence";
                    $deduction->deduction_date = Carbon::now()->toDateString();
                    $deduction->save();
                }
            }

            
            return response()->json(['status' => 'success', 'newStatus' => $attendance->status]);
    
            // return response()->json(['status' => 'success', 'newStatus' => $attendance->status]);
        }
    
        return response()->json(['status' => 'error', 'message' => 'Attendance record not found'], 404);
    }
    
}
