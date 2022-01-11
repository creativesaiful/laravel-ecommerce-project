<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\AdminProfileController;
use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\frontend\userController;

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



Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});




Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');




//admin route

Route::get('admin/logout',[AdminController::class, 'destroy'])->name('admin.logout');
Route::get('admin/profile',[AdminProfileController::class, 'viewAdminProfile'])->name('admin.profile');


Route::get('admin/edit_profile',[AdminProfileController::class, 'editAdminProfile'])->name('admin.edit_profile');


Route::post('admin/store_profile',[AdminProfileController::class, 'storeAdminProfile'])->name('admin.store_profile');





//FrontEnd Route

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', [IndexController::class, 'index']);


Route::get('/user/edit', [userController::class, 'getUserData'])->name('user.edit');


Route::post('/user/update', [userController::class, 'userUpdate'])->name('user.update');


Route::get('/user/change/password', [userController::class, 'userChangePassword'])->name('user.change_passwrod');


Route::post('/user/update/password', [userController::class, 'userUpdatePassword'])->name('user.update_password');
