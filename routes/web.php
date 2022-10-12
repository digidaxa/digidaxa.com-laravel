<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// homepage route
Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/faq', [HomeController::class, 'faq']);
Route::get('/career', [HomeController::class, 'career']);
Route::get('/why-digidaxa', [HomeController::class, 'why']);
Route::get('/collab', [HomeController::class, 'collab']);
Route::get('/terms', [HomeController::class, 'terms']);
Route::get('/privacy', [HomeController::class, 'privacy']);

// homepage product detail route
Route::get('/products/{product:slug}', [HomeController::class, 'products']);

// auth route
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginAuthenticate']);
Route::post('/logout', [AuthController::class, 'logoutAuthenticate']);
// Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
// Route::post('/register', [AuthController::class, 'registerStore']);

// admin route
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');
Route::get('/admin/products/checkSlug', [ProductsController::class, 'checkSlug'])->middleware('auth');

// create product route
Route::get('/admin/products/add', [ProductsController::class, 'add'])->middleware('auth');
Route::post('/admin/products/add', [ProductsController::class, 'save'])->middleware('auth');
Route::get('/admin/categories/add', [CategoryController::class, 'add'])->middleware('auth');
Route::post('/admin/categories/add', [CategoryController::class, 'save'])->middleware('auth');

// read product route
Route::get('/admin/products/list', [ProductsController::class, 'index'])->middleware('auth');
Route::get('/admin/products/categories/', [CategoryController::class, 'index'])->middleware('auth');
Route::get('/admin/products/categories/{category:slug}', function(Category $category){
    return view('admin/products/list', [
        'siteName' => 'Decorunic 3D Management',
        'title' => 'Products by Category: ' . $category->name,
        'products' => $category->products->load('category', 'publisher'),
    ]);
})->middleware('auth');
Route::get('/admin/products/publishers/{publisher:username}', function(User $publisher){
    return view('admin/products/list', [
        'siteName' => 'Decorunic 3D Management',
        'title' => 'Products by Publisher: ' . $publisher->name,
        'products' => $publisher->products->load('category', 'publisher'),
    ]);
})->middleware('auth');
Route::get('/admin/products/{product:slug}', [ProductsController::class, 'products'])->middleware('auth');
Route::get('/admin/products/view-3d/{product:slug}', [ProductsController::class, 'view3D']);
Route::get('/admin/products/view-ar/{product:slug}', [ProductsController::class, 'viewAR']);

// update product route
Route::get('/admin/products/{product:slug}/edit', [ProductsController::class, 'edit'])->middleware('auth');
Route::put('/admin/products/{product:slug}', [ProductsController::class, 'update'])->middleware('auth');
Route::get('/admin/categories/{category:slug}/edit', [CategoryController::class, 'edit'])->middleware('auth');
Route::put('/admin/categories/{category:slug}', [CategoryController::class, 'update'])->middleware('auth');

// delete product route
Route::delete('/admin/products/{product:id}', [ProductsController::class, 'delete'])->middleware('auth');
Route::delete('/admin/categories/{category:id}', [CategoryController::class, 'delete'])->middleware('auth');