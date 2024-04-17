<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\role;

class UsersController extends Controller
{
    public function createuser()
    {
        $role = role::all();
        return view('role.attendanceuser', compact('role'));
    }

    public function storeuser(Request $request)
    {
        $request->validate([
            // 'email' => 'required|email|unique:user,email',
            // 'password' => 'required|min:6',
            // 'is_active' => 'required',
            // 'role_id' => 'required|exists:role,id',
        
        ]);
        

        User::create($request->all());

        return redirect()->route('attendanceuser')
            ->with('success', 'User created successfully.');
    }
}