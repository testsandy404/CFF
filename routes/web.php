<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\FrontEnd\FEController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FEController::class, 'indexPage'])->name('index');
Route::get('/products', [FEController::class, 'productsPage'])->name('products');
Route::post('/products', [FEController::class, 'productsPage'])->name('products');
Route::get('/faqs', [FEController::class, 'faqPage'])->name('faqs');
Route::get('/team', [FEController::class, 'teamPage'])->name('team');
Route::get('/contact-us', [FEController::class, 'contactPage'])->name('contact_us');
Route::post('/contact-us-submit', [FEController::class, 'submitContactForm'])->name('contact_us.submit');

// Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
    // Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
    Route::get('logout', [AdminUserController::class, 'logout'])->name('logout');
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::name('admin.')->group(function () {
        Route::get('/master', [AdminUserController::class, 'master']);
        Route::get('/home', [AdminUserController::class, 'home'])->name('home');

        Route::get('/change-password', [AdminUserController::class, 'changePass']);
        Route::post('/changepassvalid', [AdminUserController::class, 'passValid']);
        Route::get('/edit-profile', [AdminUserController::class, 'editProfile']);
        Route::post('/editprofilevalid', [AdminUserController::class, 'editProfileValid']);

        Route::get('/category', [CategoryController::class, 'category'])->name('category');
        Route::get('/add-category', [CategoryController::class, 'addCategory'])->name('category.add');
        Route::post('/categoryvalid', [CategoryController::class, 'categoryValid'])->name('category.save');
        Route::get('/edit-category/{id}', [CategoryController::class, 'editCategory'])->name('category.edit');
        Route::post('/editcategoryvalid', [CategoryController::class, 'editCatValid'])->name('category.update');
        Route::delete('/deletecat', [CategoryController::class, 'delCategory'])->name('category.delete');

        Route::get('/product/{id?}', [ProductController::class, 'product'])->name('product');
        Route::get('/add-product', [ProductController::class, 'addProduct'])->name('product.add');
        Route::post('/productvalid', [ProductController::class, 'productValid'])->name('product.save');
        Route::get('/edit-product/{id}', [ProductController::class, 'editProduct'])->name('product.edit');
        Route::post('/editproductvalid', [ProductController::class, 'editProValid'])->name('product.update');
        Route::delete('/deleteproduct', [ProductController::class, 'delProduct'])->name('product.delete');

        Route::get('/brand', [BrandController::class, 'brand'])->name('brand');
        Route::get('/add-brand', [BrandController::class, 'addBrand'])->name('brand.add');
        Route::post('/brandvalid', [BrandController::class, 'brandValid'])->name('brand.save');
        Route::get('/edit-brand/{id}', [BrandController::class, 'editBrand'])->name('brand.edit');
        Route::post('/editbrandvalid', [BrandController::class, 'editBrandValid'])->name('brand.update');
        Route::delete('/deletebrand', [BrandController::class, 'delBrand'])->name('brand.delete');

        Route::get('/banner', [BannerController::class, 'banner'])->name('banner');
        Route::get('/add-banner', [BannerController::class, 'addBanner'])->name('banner.add');
        Route::post('/bannervalid', [BannerController::class, 'bannerValid'])->name('banner.save');
        Route::get('/edit-banner-{id}', [BannerController::class, 'editBanner'])->name('banner.edit');
        Route::post('/editbannervalid', [BannerController::class, 'editBannerValid'])->name('banner.update');
        Route::delete('/deletebanner', [BannerController::class, 'delBanner'])->name('banner.delete');

        Route::get('/vendor', [VendorController::class, 'vendor'])->name('vendor');
        Route::get('/add-vendor', [VendorController::class, 'addVendor'])->name('vendor.add');
        Route::post('/vendorvalid', [VendorController::class, 'vendorValid'])->name('vendor.save');
        Route::get('/edit-vendor/{id}', [VendorController::class, 'editVendor'])->name('vendor.edit');
        Route::post('/editvendorvalid', [VendorController::class, 'editVendorValid'])->name('vendor.update');
        Route::delete('/deletevendor', [VendorController::class, 'delVendor'])->name('vendor.delete');


        Route::get('/faqs', [FaqController::class, 'faq'])->name('faq');
        Route::get('/add-faq',[FaqController::class, 'addFaq'])->name('faq.add');
        Route::post('/faqvalid', [FaqController::class, 'faqValid'])->name('faq.save');
        Route::get('/edit-faq/{id}', [FaqController::class, 'editFaq'])->name('faq.edit');
        Route::post('/editfaqvalid', [FaqController::class, 'editFaqValid'])->name('faq.update');
        Route::delete('/deletefaq', [FaqController::class, 'delFaq'])->name('faq.delete');

        Route::get('/contacts', [ContactController::class, 'contact'])->name('contact');
        Route::get('/contact/{id}', [ContactController::class, 'viewContact'])->name('contact.view');
        
    });
});
