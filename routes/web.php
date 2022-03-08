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

use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\WishlistController;

use App\Http\Controllers\backend\CouponController;
use App\Http\Controllers\backend\ShippingAreaController;

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



Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});




Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard');




//admin route

Route::get('admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('admin/profile', [AdminProfileController::class, 'viewAdminProfile'])->name('admin.profile');


Route::get('admin/edit_profile', [AdminProfileController::class, 'editAdminProfile'])->name('admin.edit_profile');


Route::post('admin/store_profile', [AdminProfileController::class, 'storeAdminProfile'])->name('admin.store_profile');








// Brands Related all Route

Route::prefix('brand')->group(function () {
    Route::get('view', [brandContrller::class, 'ViewAllBrand'])->name('brand.view');
    Route::post('store', [brandContrller::class, 'BrandSotre'])->name('brand.store');
    Route::get('edit/{id}', [brandContrller::class, 'BrandEdit'])->name('brand.edit');
    Route::post('update', [brandContrller::class, 'BrandUpdate'])->name('brand.update');
    Route::get('delete/{id}', [brandContrller::class, 'BrandDelete'])->name('brand.delete');
});

//catagory route

Route::prefix('catagory')->group(function () {
    Route::get('view', [catagoryController::class, 'ViewAllCata'])->name('catagory.view');
    Route::post('store', [catagoryController::class, 'SotreCata'])->name('catagory.store');
    Route::get('edit/{id}', [catagoryController::class, 'EditCata'])->name('catagory.edit');
    Route::post('update', [catagoryController::class, 'UpdateCata'])->name('catagory.update');
    Route::get('delete/{id}', [catagoryController::class, 'DeleteCata'])->name('catagory.delete');
});

//Sub catagory Route

Route::prefix('subcata')->group(function () {
    Route::get('view', [subCataController::class, 'ViewAllSubcata'])->name('subcata.view');
    Route::post('store', [subCataController::class, 'SotreSubcata'])->name('subcata.store');
    Route::get('edit/{id}', [subCataController::class, 'EditSubcata'])->name('subcata.edit');
    Route::post('update', [subCataController::class, 'UpdateSubcata'])->name('subcata.update');
    Route::get('delete/{id}', [subCataController::class, 'DeleteSubcata'])->name('subcata.delete');
});

//Sub sub category
Route::prefix('subsubcata')->group(function () {
    Route::get('view', [subsubcateController::class, 'ViewAllSubsubcate'])->name('subsubcata.view');
    Route::post('store', [subsubcateController::class, 'SotreSubsubcate'])->name('subsubcata.store');
    Route::get('edit/{id}', [subsubcateController::class, 'EditSubsubcate'])->name('subsubcata.edit');
    Route::post('update', [subsubcateController::class, 'UpdateSubsubcate'])->name('subsubcata.update');
    Route::get('delete/{id}', [subsubcateController::class, 'DeleteSubsubcate'])->name('subsubcata.delete');

    //ajax
    Route::get('ajax/{cate_id}', [subsubcateController::class, 'SubcateAjax'])->name('subcata.ajax');
});


//Product Route Backend

Route::prefix('product')->group(function () {


    route::get('create', [ProductController::class, 'ProductCreate'])->name('product.create');
    route::post('store', [ProductController::class, 'ProductStore'])->name('product.store');

    route::get('view', [ProductController::class, 'ProductView'])->name('product.view');

    route::get('edit/{id}', [ProductController::class, 'ProductEdit'])->name('product.edit');
    route::post('update/{id}', [ProductController::class, 'ProductUpdate'])->name('product.update');

    route::post('change/image/', [ProductController::class, 'ProductImgUpdate'])->name('image.update');
    route::get('remove/image/{id}', [ProductController::class, 'ProductImgRemove'])->name('image.remove');

    route::get('inactive/{id}', [ProductController::class, 'productInactive'])->name('product.inactive');
    route::get('active/{id}', [ProductController::class, 'productActive'])->name('product.active');

    route::get('delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');


    // Ajax sub Category
    route::get('subcata/ajax/{cata_id}', [ProductController::class, 'cateToSubCate']);


    // Ajax sub Sub Category
    route::get('sub_sub_cata/ajax/{subcate_id}', [ProductController::class, 'subTosubSubCate']);
});


Route::prefix('slider')->group(function () {
    Route::get('view', [sliderController::class, 'SliderView'])->name('slider.view');
    Route::post('store', [sliderController::class, 'SliderStore'])->name('slider.store');
    Route::get('edit/{id}', [sliderController::class, 'SliderEdit'])->name('slider.edit');
    Route::post('update/{id}', [sliderController::class, 'SliderUpdate'])->name('slider.update');
    Route::get('delete/{id}', [sliderController::class, 'SliderDelete'])->name('slider.delete');

    Route::get('active/{id}', [sliderController::class, 'SlideActive'])->name('slider.active');
    Route::get('inactive/{id}', [sliderController::class, 'SlideInActive'])->name('slider.inactive');
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

//FrontEnd Tags details Route

Route::get('/product/tag/{tag_text}', [IndexController::class, 'TagwiseProduct'])->name('tag.product');

//FrontEnd Sub Catagory wise product Route

Route::get('/product/subcategory/{sub_id}/{slug}', [IndexController::class, 'SubCateWiseProduct'])->name('subcategory.product');

//FrontEnd Sub Sub Catagory wise product Route

Route::get('/product/subsubcategory/{sub_sub_id}/{slug}', [IndexController::class, 'SubSubCateWiseProduct'])->name('sub.subcategory.product');


// Product View Modal with Ajax
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);

//Add to cart data store
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);

//Mini Cart data
Route::get('/cart/data/mini', [CartController::class, 'MiniCartData']);

//Mini Cart data remove
Route::get('/mini/data/remove/{rowID}', [CartController::class, 'MiniCartDataRemove']);



//Cart page view

Route::get('/cart/page', [CartController::class, 'CartPageView'])->name('cart.page');

Route::get('/cart/page/data', [CartController::class, 'CartPageData']);

//Cart Item remove from cart page

Route::get('/remove/item/cart/{id}',  [CartController::class, 'RemoveCartItemFromCartPage']);

//Cart Item Increment from cart page

Route::get('/cart/increment/{id}',  [CartController::class, 'CartIncrement']);
//Cart Item Decrement from cart page
Route::get('/cart/decrement/{id}',  [CartController::class, 'CartDecrement']);


//Wishlist data store
Route::get('/wishlist/data/add/{id}', [WishlistController::class, 'AddToWishlist']);

Route::get('/wishlist/view', [WishlistController::class, 'WishlistView'])->name('wishlist.view');

Route::get('/wishlist/data/remove/{id}', [WishlistController::class, 'WishlistRemove']);


//Coupon Code generate Route

Route::prefix("coupon")->group(function () {
    Route::get('manage', [CouponController::class, 'CouponView'])->name('manage.coupon');
    Route::post('/store', [CouponController::class, 'CouponStore'])->name('coupon.store');
    Route::get('/edit/{id}', [CouponController::class, 'CouponEdit'])->name('coupon.edit');
    Route::post('/update/{id}', [CouponController::class, 'CouponUpdate'])->name('coupon.update');

    Route::get('/delete/{id}', [CouponController::class, 'CouponDelete'])->name('coupon.delete');

});



// Admin Shipping All Routes

Route::prefix('shipping')->group(function () {

    Route::get('/division/view', [ShippingAreaController::class, 'DivisionView'])->name('manage-division');

    Route::post('/division/store', [ShippingAreaController::class, 'DivisionStore'])->name('division.store');

    Route::get('/division/edit/{id}', [ShippingAreaController::class, 'DivisionEdit'])->name('division.edit');

    Route::post('/division/update/{id}', [ShippingAreaController::class, 'DivisionUpdate'])->name('division.update');

    Route::get('/division/delete/{id}', [ShippingAreaController::class, 'DivisionDelete'])->name('division.delete');


    // Ship District
    Route::get('/district/view', [ShippingAreaController::class, 'DistrictView'])->name('manage-district');

    Route::post('/district/store', [ShippingAreaController::class, 'DistrictStore'])->name('district.store');

    Route::get('/district/edit/{id}', [ShippingAreaController::class, 'DistrictEdit'])->name('district.edit');

    Route::post('/district/update/{id}', [ShippingAreaController::class, 'DistrictUpdate'])->name('district.update');

    Route::get('/district/delete/{id}', [ShippingAreaController::class, 'DistrictDelete'])->name('district.delete');

    // Ship State
Route::get('/state/view', [ShippingAreaController::class, 'StateView'])->name('manage-state');

Route::post('/state/store', [ShippingAreaController::class, 'StateStore'])->name('state.store');

Route::get('/state/edit/{id}', [ShippingAreaController::class, 'StateEdit'])->name('state.edit');

Route::post('/state/update/{id}', [ShippingAreaController::class, 'StateUpdate'])->name('state.update');

Route::get('/state/delete/{id}', [ShippingAreaController::class, 'StateDelete'])->name('state.delete');
});


//Coupon Code Applu Route

Route::post('coupon-apply', [CartController::class, 'couponApply']);

Route::get('coupon-calculation', [CartController::class, 'CouponCalculation']);
Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);
