<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ItemAddController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemEditController;
use App\Http\Controllers\ItemViewController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\TransactionController;
// added 0927
use App\Http\Controllers\UserlistController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryItemListController;




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


Route::get('/userlist', function () {
    return view('userlist');
});

Route::get('userlist', [UserlistController::class, 'index']);


Auth::routes();

// ログアウトルート（コメントアウト解除）
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Route::get('/register',[RegisterController::class, 'register'])->name('register');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');


Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction.index');


Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');

Route::get('/item/edit', [ItemEditController::class, 'index'])->name('item.edit.index');


Route::get('/category/edit', [CategoryController::class, 'index'])->name('category.edit');

Route::get('/userlist', [UserController::class, 'index'])->name('userlist.index');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


Route::get('/category/itemcategories', [CategoryItemListController::class, 'index'])->name('category.itemcategories');

Route::get('/items', [ItemsController::class, 'index'])->name('items.index');
Route::get('/item-view', [ItemViewController::class, 'index'])->name('item-view.index');
Route::get('/item-add', [ItemAddController::class, 'index'])->name('item-add.index');





// dashboardのcontroller
Route::post('/getTotalPrice', [DashboardController::class, 'getTotalPrice']);








// login-forget.blade.phpのback to loginのroute
Route::get('/login',[UserController::class, 'login'])->name('login');
Route::get('/item-view/{item}', [ItemViewController::class, 'addOrder'])->name('item-view.add-order');
