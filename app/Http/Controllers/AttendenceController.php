<?php

namespace App\Http\Controllers;

use App\StoreAttendence;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    //
    public function storeAttendence(Request $request)
    {

        $count = count($request->employee_id);
        $date = date("d/m/Y");
        $check = StoreAttendence::where('date', $date)->first();

        if ($check) {
            return back()->with('error', 'data update already!');
        } else {
            for ($i = 0; $i < $count; $i++) {
                $attend = new StoreAttendence();

                $attend->attendence_owner = auth()->guard('admin')->id();
                $attend->employee_name = $request->employee_name[$i];
                $attend->employee_id = $request->employee_id[$i];
                $attend->status = $request->status[$i];
                $attend->date = $date;

                $attend->save();
            }

            return back()->with('Success', 'data update successfully!');
        }
    }
    public function toggleStatus($id)
    {
        $attendance = StoreAttendence::find($id);

        if ($attendance) {
            $attendance->status = $attendance->status == 1 ? 0 : 1;
            $attendance->save();

            return response()->json(['status' => 'success', 'newStatus' => $attendance->status]);
        }

        return response()->json(['status' => 'error', 'message' => 'Attendance record not found'], 404);
    }
}
