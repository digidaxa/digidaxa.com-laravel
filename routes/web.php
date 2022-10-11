<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/dasbor', [DashboardController::class, 'index']);
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginAuthenticate']);
Route::post('/logout', [AuthController::class, 'logoutAuthenticate']);
// Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
// Route::post('/register', [AuthController::class, 'registerStore']);

Route::get('/products/checkSlug', [ProductsController::class, 'checkSlug'])->middleware('auth');

// create
Route::get('/products/add', [ProductsController::class, 'add'])->middleware('auth');
Route::post('/products/add', [ProductsController::class, 'save'])->middleware('auth');
Route::get('/categories/add', [CategoryController::class, 'add'])->middleware('auth');
Route::post('/categories/add', [CategoryController::class, 'save'])->middleware('auth');

// read
Route::get('/products/list', [ProductsController::class, 'index'])->middleware('auth');
Route::get('/products/categories/', [CategoryController::class, 'index'])->middleware('auth');
Route::get('/products/categories/{category:slug}', function(Category $category){
    return view('products/list', [
        'siteName' => 'Decorunic 3D Management',
        'title' => 'Products by Category: ' . $category->name,
        'products' => $category->products->load('category', 'publisher'),
    ]);
})->middleware('auth');
Route::get('/products/publishers/{publisher:username}', function(User $publisher){
    return view('products/list', [
        'siteName' => 'Decorunic 3D Management',
        'title' => 'Products by Publisher: ' . $publisher->name,
        'products' => $publisher->products->load('category', 'publisher'),
    ]);
})->middleware('auth');
Route::get('/products/{product:slug}', [ProductsController::class, 'products'])->middleware('auth');
Route::get('/products/view-3d/{product:slug}', [ProductsController::class, 'view3D']);
Route::get('/products/view-ar/{product:slug}', [ProductsController::class, 'viewAR']);

// update
Route::get('/products/{product:slug}/edit', [ProductsController::class, 'edit'])->middleware('auth');
Route::put('/products/{product:slug}', [ProductsController::class, 'update'])->middleware('auth');
Route::get('/categories/{category:slug}/edit', [CategoryController::class, 'edit'])->middleware('auth');
Route::put('/categories/{category:slug}', [CategoryController::class, 'update'])->middleware('auth');

// delete
Route::delete('/products/{product:id}', [ProductsController::class, 'delete'])->middleware('auth');
Route::delete('/categories/{category:id}', [CategoryController::class, 'delete'])->middleware('auth');