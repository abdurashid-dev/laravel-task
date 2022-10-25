<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Jetstream
Route::middleware([
    'auth:sanctum',
    'admin',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Cookies
Route::get('/set-cookie/{cookie}', [AdminController::class, 'setCookie'])->name('setCookie')->middleware('auth');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
//Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('index');
//Profile
    Route::get('/profile', \App\Http\Livewire\Admin\UserProfile::class)->name('profile');
    Route::post('/changeData', [AdminController::class, 'data'])->name('data');
    Route::get('/password/index', [AdminController::class, 'password'])->name('profile.password');
    Route::post('/password/index', [AdminController::class, 'passwordChange'])->name('password.change.index');
//Roles
    Route::resource('/roles', RoleController::class);
    Route::get('/roles/edit-permissions/{role}', [RoleController::class, 'givePermissions'])->name('roles.give-permissions');
    Route::post('/roles/sync-permissions/{role}', [RoleController::class, 'syncPermissions'])->name('roles.sync-permissions');
//Permissions
    Route::resource('/permissions', PermissionController::class);
//Users
    Route::resource('/users', UserController::class);
    Route::get('/users/change-password/{user}', [UserController::class, 'changePassword'])->name('users.change-password');
    Route::post('/users/change-password/{user}', [UserController::class, 'updatePassword'])->name('users.update-password');
//Teacher
    Route::resource('/teachers', TeacherController::class);
//Subjects
    Route::resource('/subjects', SubjectController::class);
});
