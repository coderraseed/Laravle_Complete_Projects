<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
    return view('welcome');
});
 */

Route::get('/', [ProductsController::class, 'index'])->name('products.index');

Route::get('/create', [ProductsController::class, 'createProducts'])->name('products.create');

Route::post('/', [ProductsController::class, 'storeProducts'])->name('products.store');


Route::get('/{id}/edit', [ProductsController::class, 'editProducts'])->name('products.edit');

Route::put('/{id}/update', [ProductsController::class, 'updateProducts'])->name('products.update');


Route::get('/{id}/delete', [ProductsController::class, 'deleteProducts'])->name('products.delete');
