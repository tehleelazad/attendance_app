<?php

namespace App\Http\Controllers;
use App\Models\leavemodel;
use Illuminate\Http\Request;
class leavecontroller extends Controller
{
    public function create()
    {
        $leaves = leavemodel::all(); // Fetch all leaves
        return view('role.leave', compact('leaves'));
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'description' => 'required|description|:leave',
        //     'leavetype' => 'required',
        //     'is_approved' => 'required',
        //     'userprofile_id' => 'required|exists:userprofile,id',
        // ]);

        leavemodel::create($request->all());

        return redirect()->route('leave')
            ->with('success', 'User created successfully.');
    }

    public function index()
    {
        $leaves = leavemodel::all(); // Fetch all leaves
        return view('role.leave', compact('leaves'));
    }

    public function edit($id)
    {
        $leave = leavemodel::findOrFail($id); // Find the leave by ID
        return view('role.leave_edit', compact('leave'));
    }

    public function update(Request $request, $id)
    {
        $leave = leavemodel::findOrFail($id); // Find the leave by ID
        $leave->update($request->all());

        return redirect()->route('leave')->with('success', 'Leave updated successfully.');
    }

    public function destroy($id)
    {
        $leave = leavemodel::findOrFail($id); // Find the leave by ID
        $leave->delete();

        return redirect()->route('leave')->with('success', 'Leave deleted successfully.');
    }


}