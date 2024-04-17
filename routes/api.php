<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RoleController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// Route::apiResource("member",MemberController::class);
Route::post("login",[UserController::class,'index']);


Route::get('/roles/create', [RoleController::class, 'createForm']);
Route::get('/roles', [RoleController::class, 'manageRoles']);
Route::post('/roles', [RoleController::class, 'store']);
Route::get('/roles/{role}/edit', [RoleController::class, 'edit']);
Route::put('/roles/{role}', [RoleController::class, 'update']);
Route::delete('/roles/{role}', [RoleController::class, 'destroy']);