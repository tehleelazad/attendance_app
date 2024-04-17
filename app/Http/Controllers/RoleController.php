<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Http\JsonResponse; // Import JsonResponse

class RoleController extends Controller
{
    public function createForm()
    {
        // You can return a JSON response if needed, but typically forms are rendered in views
        return response()->json(['message' => 'This is the create form for roles']);
    }

    public function manageRoles()
    {
        // Fetch all roles from the database
        $roles = Role::all();

        // Return JSON response with roles data
        return response()->json(['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:roles,title',
        ]);

        Role::create([
            'title' => $request->input('title'),
        ]);

        return response()->json(['message' => 'Role added successfully']);
    }

    public function edit(Role $role)
    {
        // Assuming you have an 'editrole' view, but for JSON response, return role data
        return response()->json(['role' => $role]);
    }

    public function destroy(Role $role)
    {
        // Delete the role
        $role->delete();

        // Return JSON response with success message
        return response()->json(['message' => 'Role deleted successfully']);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $existingRole = Role::where('title', $request->title)->first();

        if ($existingRole) {
            return response()->json(['error' => 'Role already exists'], 400);
        }

        $role->update([
            'title' => $request->title,
        ]);

        return response()->json(['message' => 'Role updated successfully']);
    }
}