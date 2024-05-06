<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;
use App\Events\LeaveStatusChanged;
use Illuminate\Support\Facades\Log;

class LeaveController extends Controller
{
    public function leaveList()
    {
        $leavelist = Leave::orderBy('leave_id', 'desc')->get();
        return view('leavelist', compact('leavelist'));
    }

    public function approve($leaveId)
    {
        Leave::find($leaveId)->update(['status' => 'Approved']);
        $leave = Leave::find($leaveId);
        LeaveStatusChanged::dispatch($leave);
        return redirect()->route('leave.list')->with('message', 'Leave Approved Successfully..!');
    }

    public function reject($leaveId)
    {
        Leave::find($leaveId)->update(['status' => 'Rejected']);
        $leave = Leave::find($leaveId);

        LeaveStatusChanged::dispatch($leave);
        return redirect()->route('leave.list')->with('message', 'Leave Rejected Successfully..!');
    }
    public function delete($leaveId)
    {
        Leave::find($leaveId)->delete();
        return redirect()->route('leave.list')->with('message', 'Leave Deleted Successfully..!');
    }

    public function UserLeaveList($leaveId)
    {
        $leavelist = DB::table('leavelist')
            ->where('user_id', $leaveId)->orderBy('leave_id', 'desc')
            ->get();
        $user = User::find($leaveId);
        if ($leavelist->isNotEmpty()) {
            $userId = $leavelist->first()->user_id;
            $user = User::find($userId);
            return view('userleave', compact('user', 'leavelist'));
        }
        return view('userleave', compact('user', 'leavelist'));
    }
    public function submitLeave($id)
    {
        $startDate = Carbon::parse(request('start_date'));
        $endDate = Carbon::parse(request('end_date'));
        $user = User::find($id);
        Leave::create([
            'name' => $user->name,
            'user_id' => $user->id,
            'designation' => $user->designation,
            'reason' => request('reason'),
            'content' => request('content'),
            'start_date' => request('start_date'),
            'end_date' => request('end_date'),
            'no_of_days' => $startDate->diffInDays($endDate),
        ]);
        return redirect()->route('user.leave.list', ['leave' => $user->id])->with('message', 'Leave Request Submitted Successfully..!');
    }
    public function leaveForm($id)
    {
        $user = User::find($id);
        return view('leaveForm', compact('user'));

    }

    public function viewLeaveDetails($leaveId)
    {
        $leaveDetails = Leave::find($leaveId);

        return view('userleavemodal', compact('leaveDetails'));
    }
    public function viewLeaveDetailsAdmin($leaveId)
    {
        $leave = Leave::find($leaveId);
        $id = $leave->user_id;
        $user = User::find($id);
        return view('adminleavemodal', compact('leave', 'user'));
    }

    public function searchLeave(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $leavelist = DB::table('leavelist')
            ->whereBetween('start_date', [$start_date, $end_date])
            ->whereBetween('end_date', [$start_date, $end_date])
            ->get();

        return view('leavelist', compact('leavelist'));
    }

}