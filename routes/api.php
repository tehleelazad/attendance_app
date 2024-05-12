<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserProfileController;



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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::put('/user/{id}', function ($id) {
    return  response("put".$id,200);
});
Route::post("login",[UserController::class,'index']);
Route::post("userlogin",[UserProfileController::class,'login']);
Route::put("userprofile/{id}", [UserProfileController::class, 'updateprofile']); // Update a role4
Route::patch("userprofile/{id}", [UserProfileController::class, 'updateprofile']); // Update a role

Route::put("updateuser/{id}", [UserProfileController::class, 'updateuser']); // Update a role
Route::delete('deleteuser/{id}', [UserProfileController::class, 'destroy']); // Delete a role
Route::middleware('auth:sanctum')->get('getUserDetails', [UserProfileController::class, 'getUserDetails']); // Edit a role


use App\Http\Controllers\RoleController;

Route::group(['prefix' => 'roles'], function () {
    Route::get('/', [RoleController::class, 'manageRoles']); // Get all roles

    Route::post('/', [RoleController::class, 'store']); // Create a role

    Route::get('/{role}', [RoleController::class, 'edit']); // Edit a role

    Route::put('/{role}', [RoleController::class, 'update']); // Update a role

    Route::delete('/{role}', [RoleController::class, 'destroy']); // Delete a role
});

Route::post('/register', [UsersController::class,'storeuser'])->name('storeuser');


// Route for deleting a user
// Route::delete('/user/{user}', [UsersController::class, 'delete'])->middleware('admin');

// Route for updating a user
// Route::put('/user/{user}', [UsersController::class, 'update'])->middleware('admin');

// Routes for UserProfilesController

// Route for deleting a user profile
// Route::middleware('auth:sanctum')->delete('/user-profile/{id}',function (Request $request,$id) {
//      $data=$request->user();
//     $user=User::findOrFail($data->id); 
//      if($user->role_id==1){
//        ////
//      }else{
      

//      }


//  });


// Route for updating a user profile
// Route::put('/user-profile/{profile}', [UserProfileController::class, 'update'])->middleware('admin');
Route::post('/create', [UserProfileController::class, 'store']);