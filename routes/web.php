<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\AdminProfileController;
use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\frontend\userController;

use App\Http\Controllers\brandContrller;
use App\Http\Controllers\backend\catagoryController;
use App\Http\Controllers\backend\subCataController;
use App\Http\Controllers\backend\subsubcateController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\sliderController;
use App\Http\Controllers\frontend\LanguageController;


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
})->name('admin.dashboard');




//admin route

Route::get('admin/logout',[AdminController::class, 'destroy'])->name('admin.logout');
Route::get('admin/profile',[AdminProfileController::class, 'viewAdminProfile'])->name('admin.profile');


Route::get('admin/edit_profile',[AdminProfileController::class, 'editAdminProfile'])->name('admin.edit_profile');


Route::post('admin/store_profile',[AdminProfileController::class, 'storeAdminProfile'])->name('admin.store_profile');








// Brands Related all Route

Route::prefix('brand')->group(function(){
    Route::get('view', [brandContrller::class, 'ViewAllBrand'])->name('brand.view');
    Route::post('store', [brandContrller::class, 'BrandSotre'])->name('brand.store');
    Route::get('edit/{id}', [brandContrller::class, 'BrandEdit'])->name('brand.edit');
    Route::post('update', [brandContrller::class, 'BrandUpdate'])->name('brand.update');
    Route::get('delete/{id}', [brandContrller::class, 'BrandDelete'])->name('brand.delete');
});

//catagory route

Route::prefix('catagory')->group(function(){
    Route::get('view', [catagoryController::class, 'ViewAllCata'])->name('catagory.view');
    Route::post('store', [catagoryController::class, 'SotreCata'])->name('catagory.store');
    Route::get('edit/{id}', [catagoryController::class, 'EditCata'])->name('catagory.edit');
    Route::post('update', [catagoryController::class, 'UpdateCata'])->name('catagory.update');
    Route::get('delete/{id}', [catagoryController::class, 'DeleteCata'])->name('catagory.delete');
});

//Sub catagory Route

Route::prefix('subcata')->group(function(){
    Route::get('view', [subCataController::class, 'ViewAllSubcata'])->name('subcata.view');
    Route::post('store', [subCataController::class, 'SotreSubcata'])->name('subcata.store');
    Route::get('edit/{id}', [subCataController::class, 'EditSubcata'])->name('subcata.edit');
    Route::post('update', [subCataController::class, 'UpdateSubcata'])->name('subcata.update');
    Route::get('delete/{id}', [subCataController::class, 'DeleteSubcata'])->name('subcata.delete');
});

//Sub sub category
Route::prefix('subsubcata')->group(function(){
    Route::get('view', [subsubcateController::class, 'ViewAllSubsubcate'])->name('subsubcata.view');
    Route::post('store', [subsubcateController::class, 'SotreSubsubcate'])->name('subsubcata.store');
    Route::get('edit/{id}', [subsubcateController::class, 'EditSubsubcate'])->name('subsubcata.edit');
    Route::post('update', [subsubcateController::class, 'UpdateSubsubcate'])->name('subsubcata.update');
    Route::get('delete/{id}', [subsubcateController::class, 'DeleteSubsubcate'])->name('subsubcata.delete');

    //ajax
    Route::get('ajax/{cate_id}', [subsubcateController::class, 'SubcateAjax'])->name('subcata.ajax');
});


//Product Route Backend

Route::prefix('product')->group(function(){


    route::get('create',[ProductController::class, 'ProductCreate'])->name('product.create');
    route::post('store',[ProductController::class, 'ProductStore'])->name('product.store');

    route::get('view',[ProductController::class, 'ProductView'])->name('product.view');

    route::get('edit/{id}',[ProductController::class, 'ProductEdit'])->name('product.edit');
    route::post('update/{id}',[ProductController::class, 'ProductUpdate'])->name('product.update');

    route::post('change/image/',[ProductController::class, 'ProductImgUpdate'])->name('image.update');
    route::get('remove/image/{id}',[ProductController::class, 'ProductImgRemove'])->name('image.remove');

    route::get('inactive/{id}',[ProductController::class, 'productInactive'])->name('product.inactive');
    route::get('active/{id}',[ProductController::class, 'productActive'])->name('product.active');

    route::get('delete/{id}',[ProductController::class, 'ProductDelete'])->name('product.delete');


    // Ajax sub Category
    route::get('subcata/ajax/{cata_id}', [ProductController::class, 'cateToSubCate']);


    // Ajax sub Sub Category
    route::get('sub_sub_cata/ajax/{subcate_id}', [ProductController::class, 'subTosubSubCate']);
});


Route::prefix('slider')->group(function(){
    Route::get('view', [sliderController::class, 'SliderView' ])->name('slider.view');
    Route::post('store', [sliderController::class, 'SliderStore' ])->name('slider.store');
    Route::get('edit/{id}', [sliderController::class, 'SliderEdit' ])->name('slider.edit');
    Route::post('update/{id}', [sliderController::class, 'SliderUpdate' ])->name('slider.update');
    Route::get('delete/{id}', [sliderController::class, 'SliderDelete' ])->name('slider.delete');

    Route::get('active/{id}', [sliderController::class, 'SlideActive' ])->name('slider.active');
    Route::get('inactive/{id}', [sliderController::class, 'SlideInActive' ])->name('slider.inactive');
});



//FrontEnd Route

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', [IndexController::class, 'index']);


Route::get('/user/edit', [userController::class, 'getUserData'])->name('user.edit');


Route::post('/user/update', [userController::class, 'userUpdate'])->name('user.update');


Route::get('/user/change/password', [userController::class, 'userChangePassword'])->name('user.change_passwrod');


Route::post('/user/update/password', [userController::class, 'userUpdatePassword'])->name('user.update_password');

//FrontEnd Language Route
Route::get('/language/hindi', [LanguageController::class, 'Hindi'])->name('hindi.language');

Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');

//FrontEnd prduct details Route

Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);

