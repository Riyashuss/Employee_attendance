<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Attendance;
use App\Models\Leave;

class LeaveController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
           
            'date' => 'required|date',
        ]);

        try {
            DB::beginTransaction();

            // Insert into the 'leaves' table
            $leave = new Leave();
            $leave->user_id = $request->user_id;
            $leave->date = $request->date;
            $leave->save();

            // Insert into the 'attendances' table
            $attendance = new Attendance();
            $attendance->leave_date = $leave->date; // Use the date from the leave
            $attendance->user_id = $leave->user_id; // Use the user_id from the leave
            $attendance->checkin =0;
            $attendance->checkout = 0;
            $attendance->leave_id = 1; // Link attendance to the created leave
            $attendance->location_id = 0; // Hardcoded location_id (for example, 1)


            $attendance->save();

            DB::commit();

            return response()->json([
                'message' => 'Leave and Attendance records created successfully.',
                'data' => [
                    'leave' => $leave,
                    'attendance' => $attendance,
                ],
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'An error occurred while creating records.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function index()
    {
        // $leaves = Leave::all();
        $leaves = Leave::where('user_id', Auth::id()) // Fetch leaves for the authenticated user
        ->select('id', 'date')
        ->get();
        Log::info($leaves);
        return response()->json($leaves);
    }

    
public function getLeaves()
{
    $leaves = Leave::where('user_id', Auth::id()) // Fetch leaves for the authenticated user
        ->select('id', 'date as start', 'date as end', DB::raw('"Leave" as title'))
        ->get();

    return response()->json($leaves);
}

public function deleteLeave(Request $request)
{
    $userId = $request->user_id;
    $date = $request->date;

    // Delete leave record
    $leave = Leave::where('user_id', $userId)->where('date', $date)->first();

    if ($leave) {
        // Delete attendance record
        $attendance = Attendance::where('user_id', $userId)
                                ->whereDate('leave_date', $date) // Ensure it matches the leave date
                                ->first();
            Log::info( $attendance);
        // if ($attendance) {
        //     Log::info( $attendance." Log::info( attendance);");
            // Delete the attendance record (checkin/checkout)
            $attendance->delete();
        // }

        // Now delete the leave
        $leave->delete();

        return response()->json(['success' => true, 'message' => 'Leave and attendance successfully deleted.']);
    } else {
        return response()->json(['success' => false, 'message' => 'Leave not found.']);
    }
}

public function Attendanceindex()
{
    $userId = Auth::id(); // Get authenticated user's ID

    // Get today's date in 'Y-m-d' format
    $today = Carbon::today()->format('Y-m-d');

    // Count present and absent records for today's date based on leave_id
    $attendances = DB::table('attendance')
        ->select(
            'leave_date',
            DB::raw('SUM(CASE WHEN leave_id = 0 THEN 1 ELSE 0 END) as present_count'),
            DB::raw('SUM(CASE WHEN leave_id = 1 THEN 1 ELSE 0 END) as absent_count')
        )
        ->where('user_id', $userId) // Filter by logged-in user
        ->where('leave_date', $today) // Filter for today's leave_date
        ->groupBy('leave_date') // Group by leave_date
        ->get();

    return view('attendance.index', compact('attendances'));
}


    // public function getAttendanceByDate($date)
    // {
    //     $userId = auth()->id(); // Assuming you have user authentication
    //     $attendance = Attendance::where('user_id', $userId)
    //                             ->where(function ($query) use ($date) {
    //                                 $query// ->whereDate('checkin', $date)
    //                                 //     ->WhereDate('checkout', $date)
    //                                     ->WhereDate('leave_date', $date);
    //                             })
    //                             ->first();
    //     if ($attendance) {
    //         return response()->json([
    //             'success' => true,
    //             'data' => [
    //                 'checkin' => $attendance->checkin,
    //                 'checkout' => $attendance->checkout,
    //             ]
    //         ]);
    //     }

    //     return response()->json([
    //         'success' => false,
    //         'message' => 'No attendance record found for this date.'
    //     ]);
    // }

    public function getAttendanceByDate($date)
    {
        $userId = auth()->id(); // Assuming user authentication
        $attendance = Attendance::with('location') // Load related location data
                                ->where('user_id', $userId)
                                ->whereDate('leave_date', $date) // Filter by leave_date
                                ->first();
    
        if ($attendance) {
            return response()->json([
                'success' => true,
                'data' => [
                    'checkin' => $attendance->checkin,
                    'checkout' => $attendance->checkout,
                    'location_id' => $attendance->location_id,
                    'location_name' => $attendance->location_id == 0 ? 'absent' : ($attendance->location->location_name ?? 'Unknown'), // Handle location_id = 0
                ]
            ]);
        }
    
        return response()->json([
            'success' => false,
            'message' => 'No attendance record found for this date.'
        ]);
    }
}
