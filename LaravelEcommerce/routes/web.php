<?php

use App\Livewire\CartComponent;
use App\Livewire\HomeComponent;
use App\Livewire\ShopComponent;
use App\Livewire\SearchComponent;
use App\Livewire\DetailsComponent;
use App\Livewire\CategoryComponent;
use App\Livewire\CheckoutComponent;
use App\Livewire\WishlistComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Livewire\Admin\AdminProductComponent;
use App\Livewire\User\UserDashboardComponent;
use App\Livewire\Admin\AdminDashboardComponent;
use App\Livewire\Admin\AdminAddProductComponent;
use App\Livewire\Admin\AdminCategoriesComponent;
use App\Livewire\Admin\AdminHomeSliderComponent;
use App\Livewire\Admin\AdminAddCategoryComponent;
use App\Livewire\Admin\AdminDeleteSliderComponent;
use App\Livewire\Admin\AdminEditCategoryComponent;
use App\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Livewire\Admin\AdminDeleteCategoryComponent;
use App\Livewire\Admin\AdminEditHomeSliderComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeComponent::Class)->name('home.index');

Route::get('/cart', CartComponent::Class)->name('shop.cart');

Route::get('/shop', ShopComponent::Class)->name('shop');

Route::get('/checkout', CheckoutComponent::Class)->name('shop.checkout');

Route::get("/product/{slug}/", DetailsComponent::class)->name('product.detail');

Route::get("/product-category/{slug}/", CategoryComponent::class)->name('product.category');

Route::get('/search', SearchComponent::Class)->name('product.search');


Route::get('wishlist', WishlistComponent::class)->name('whishlist.products');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get("user/dashboard", UserDashboardComponent::class)->name('user.dashboard');
});

Route::middleware('auth', 'authadmin')->group(function () {
    Route::get("admin/dashboard", AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('admin/categories', AdminCategoriesComponent::class)->name('admin.categories');
    Route::get('admin/Editcategory/{category_id}', AdminEditCategoryComponent::class)->name('admin.editcategory');
    Route::get('admin/DeleteCategory/{category_id}', AdminDeleteCategoryComponent::class)->name('admin.deletecategory');
    Route::get('admin/Product', AdminProductComponent::class)->name('admin.product');
    Route::get('admin/add/product', AdminAddProductComponent::class)->name('admin.add.product');
    Route::get('admin/add/category', AdminAddCategoryComponent::class)->name('admin.add.category');
    Route::get('admin/HomeSlider', AdminHomeSliderComponent::class)->name('admin.homeslider');
    Route::get('admin/HomeSlider/add', AdminAddHomeSliderComponent::class)->name('admin.homeslider.add');
    Route::get('admin/HomeSlider/Edit/{slider_id}', AdminEditHomeSliderComponent::class)->name('admin.homeslider.edit');
    Route::get('admin/HomeSlider/Delete/{slider_id}', AdminDeleteSliderComponent::class)->name('admin.homeslider.delete');

});

require __DIR__.'/auth.php';
