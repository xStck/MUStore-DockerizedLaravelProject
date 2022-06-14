<?php

use App\Http\Controllers\OrdersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();
//Wyświetlanie produktów
Route::get('/', [App\Http\Controllers\ProductController::class, 'getRecommendations'])->name('product.recommendations');
Route::get('/guitars', [App\Http\Controllers\ProductController::class, 'getGuitars'])->name('product.guitars');
Route::get('/softwares', [App\Http\Controllers\ProductController::class, 'getSoftwares'])->name('product.softwares');
Route::get('/vinyls', [App\Http\Controllers\ProductController::class, 'getVinyls'])->name('product.vinyls');
Route::get('/keyboards', [App\Http\Controllers\ProductController::class, 'getKeyboards'])->name('product.keyboards');
Route::get('/basses', [App\Http\Controllers\ProductController::class, 'getBasses'])->name('product.basses');
//Wyświetlanie informacji kontaktowych 
Route::get('/contact', [App\Http\Controllers\PageController::class, 'showContact'])->name('contact');
//Wyświetlanie koszyka
Route::get('/cart/{user}', [App\Http\Controllers\PageController::class, 'showCart'])->name('cart');
//Edycja danych użytkownika
Route::get('/editMenu/{user}', [App\Http\Controllers\UserController::class, 'showEditMenu'])->name('editMenu');
Route::get('/editBasicData/{user}', [App\Http\Controllers\UserController::class, 'edit'])->name('editBasicUserData');
Route::put('/updateBasicData/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('updateBasicUserData');
Route::get('/editUserPassword/{user}', [App\Http\Controllers\UserController::class, 'editPassword'])->name('editUserPassword');
Route::put('/updateUserPassword/{user}', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('updateUserPassword');
Route::get('/editUserEmail/{user}', [App\Http\Controllers\UserController::class, 'editEmail'])->name('editUserEmail');
Route::put('/updateUserEmail/{user}', [App\Http\Controllers\UserController::class, 'updateEmail'])->name('updateUserEmail');
//Dodanie produktu do koszyka
Route::get('/{url}/{prod}/{user}', [App\Http\Controllers\ProductController::class, 'addToCart'])->name('addToCart');
//Usuwanie produktu z koszyka
Route::get('/delete/{productId}/{userId}/{idInCart}', [App\Http\Controllers\ProductController::class, 'deleteFromCart'])->name('deleteFromCart');
//Składanie zamówienia (wypełnienie formularza -> zamówienie znajduje się teraz w encji "orders")
Route::post('/create', [App\Http\Controllers\OrdersController::class, 'store'])->name('store');
