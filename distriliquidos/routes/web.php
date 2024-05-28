<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SigninController;
use App\Models\Producto;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    // return view('welcome');
    return 'Hola mundo';
});
// http://localhost/project/distriliquidos/public/

Route::get('/catalog', [CatalogController::class, 'catalog'])->name('catalog');
Route::get('/catalog/marcas', [CatalogController::class, 'getMarcas'])->name('catalog.marcas');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/signin', [SigninController::class, 'signin'])->name('signin');
Route::get('/carrito', [CartController::class, 'viewCart'])->name('carrito');
Route::get('/carrito', [CartController::class, 'showCart'])->name('carrito');


Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'removeItem'])->name('cart.remove');
