<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\login;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UsersController;

use Illuminate\Http\Request;

    Route::view('userform', 'attendancelogin')->name('userform');
    Route::view('dashboard2', 'dashboard2')->middleware('checklogin'); 
    Route::view('contact', 'contact');
    Route ::get('logout',[login::class,'logout']);
    // Route ::post('processform',[login::class,'login'] );
    Route::post('/processform', [login::class, 'login']);
    // Applying middleware to a single route

Route::view('dashboard1', 'dashboard1')->middleware('checklogin');

Route::view('userform', 'attendancelogin')->name('userform');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/role/create', [RoleController::class,'createForm'])->name('role.create');
Route::post('role/store', [RoleController::class,'store'])->name('role.store');
Route::post('/roles', [RoleController::class,'storeRoles'])->name('role.storeRoles');
// Define the 'roles' route here
Route::get('/roles', [RoleController::class, 'manageRoles'])->name('roles');
Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
// Define the 'users' route here
Route::get('/role/attendanceuser', [UsersController::class,'createuser'])->name('attendanceuser');
Route::post('/role/attendanceuser', [UsersController::class,'storeuser'])->name('storeuser');


Route::get('/users', [UsersController::class, 'index'])->name('users.index');
// Route to show the leave creation form

use App\Http\Controllers\leavecontroller;


Route::get('/role/leave', [leavecontroller::class,'create'])->name('leave');
Route::post('/role/leave', [leavecontroller::class,'store'])->name('store');

Route::get('/leave/{id}/edit', [leavecontroller::class, 'edit'])->name('edit');
Route::put('/leave/{id}', [leavecontroller::class, 'update'])->name('update');
Route::delete('/leave/{id}', [leavecontroller::class, 'destroy'])->name('delete');






Route::get('/role/userprofile', [UserProfileController::class,'create'])->name('userprofile')->middleware('checklogin');



// Route to show the user profile creation form
Route::get('/userprofile/create', [UserProfileController::class, 'create'])->name('userprofile.create');

// Route to store user profile data in the database
Route::post('/userprofile', [UserProfileController::class, 'store'])->name('userprofile.store');

Route::get('/userprofile', [UserProfileController::class, 'index'])->name('userprofile.index');

Route::post('/userprofile/store', [UserProfileController::class, 'store'])->name('userprofile.store');

// Route for displaying the form to edit a user profile
Route::get('/userprofile/{id}/edit', [UserProfileController::class, 'edit'])->name('userprofile.edit');

// Route for updating a user profile
Route::put('/userprofile/{id}/update', [UserProfileController::class, 'update'])->name('userprofile.update');

// Route for deleting a user profile
Route::delete('/userprofile/{id}/destroy', [UserProfileController::class, 'destroy'])->name('userprofile.destroy');
Route::get('/storage/{filename}', function ($filename) {
    $path = storage_path('app/public/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    $file = file_get_contents($path);

    return response($file, 200)->header('Content-Type', 'image/jpeg'); // Adjust the Content-Type based on your file type
})->where('filename', '.*');




