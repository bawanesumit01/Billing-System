<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function clockIn()
    {
        $staffId = session('user_id');

        $exists = Attendance::where('staff_id', $staffId)
            ->whereDate('attendance_date', today())
            ->first();

        if (!$exists) {
            Attendance::create([
                'staff_id' => $staffId,
                'attendance_date' => today(),
                'clock_in' => now()->format('H:i:s'),
                'status' => 'Present'
            ]);
        }

        return back()->with('success', 'Clock In Successful');
    }

    public function clockOut()
    {
        $staffId = session('user_id');

        $attendance = Attendance::where('staff_id', $staffId)
            ->whereDate('attendance_date', today())
            ->first();

        if ($attendance && !$attendance->clock_out) {
            $attendance->update([
                'clock_out' => now()->format('H:i:s')
            ]);
        }

        return back()->with('success', 'Clock Out Successful');
    }

    public function attendanceList()
    {
        $attendance = Attendance::with('user')
            ->latest()
            ->get();

        return view('attendance.index', compact('attendance'));
    }
}