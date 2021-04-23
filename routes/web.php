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
	Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
	Route::get('/admin/category/add', AdminAddCategoryComponent::class)->name('admin.add.category');
});



/*
|--------------------------------------------------------------------------
| Route group for admin
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
	Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});