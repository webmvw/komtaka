<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\ProductDetailsComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\Slider\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\Slider\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\Slider\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminHomeCategoryComponent;
use App\Http\Livewire\Admin\AdminShowHomeCategoryComponent;


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


Route::get('/', HomeComponent::class)->name('home');
Route::get('/shop', ShopComponent::class)->name('shop');
Route::get('/cart', CartComponent::class)->name('cart');
Route::get('/checkout', CheckoutComponent::class)->name('checkout');
Route::get('/product/details/{slug}', ProductDetailsComponent::class)->name('product.details');
Route::get('/product/category_name/{slug}', CategoryComponent::class)->name('product.category');



/*
|--------------------------------------------------------------------------
| Route group for admin
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum', 'verified', 'authAdmin'])->group(function(){
	Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');

	//for category
	Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
	Route::get('/admin/category/add', AdminAddCategoryComponent::class)->name('admin.add.category');
	Route::get('/admin/category/edit/{slug}', AdminEditCategoryComponent::class)->name('admin.edit.category');

	//for product
	Route::get('/admin/products', AdminProductComponent::class)->name('admin.products');
	Route::get('/admin/product/add', AdminAddProductComponent::class)->name('admin.add.product');
	Route::get('/admin/product/edit/{slug}', AdminEditProductComponent::class)->name('admin.edit.product');

	//for home slider
	Route::get('/admin/homesliders', AdminHomeSliderComponent::class)->name('admin.homesliders');
	Route::get('/admin/homeslider/add', AdminAddHomeSliderComponent::class)->name('admin.add.homeslider');
	Route::get('/admin/homeslider/edit/{id}', AdminEditHomeSliderComponent::class)->name('admin.edit.homeslider');

	//for home category
	Route::get('/admin/homecategory/show', AdminShowHomeCategoryComponent::class)->name('admin.show.homecategory');
	Route::get('/admin/homecategory/add', AdminHomeCategoryComponent::class)->name('admin.add.homecategory');
});



/*
|--------------------------------------------------------------------------
| Route group for admin
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
	Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});