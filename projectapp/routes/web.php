<?php

use App\Http\Controllers\AllProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\CategoryController;

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
Route::get('/', [ViewController::class, 'index'])->name('home');

// Route::get('/', [ProjectController::class,'index']);
// Route::get('/home', function () {
//     return view('Projects.view');
// })->name('home');
Route::resource('projects', ProjectController::class);
// Route::get('/home', [ViewController::class, 'home']);

// Route::get('home', [ViewController::class, 'index']);

Route::resource('categorys', CategoryController::class);

Route::get('/produits',[AllProductsController::class,'index'])->name('produits');
