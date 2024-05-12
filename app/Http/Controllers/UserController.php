<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usermodel; // Adjusted model import
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = usermodel::where('username', $request->username)->first(); // Adjusted model usage

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'credentials does not match'
            ], 404);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }
}