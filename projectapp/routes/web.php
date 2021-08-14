<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AllProductsController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CommandeClientController;
// use App\Http\Controllers\CartController

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

Route::get('/produits/{order?}',[AllProductsController::class,'index'])->name('produits');



Route::get('panier/{id}/{qty}',[CardController::class,'card'])->name('panier.card');

Route::get('panier',[CardController::class,'index'])->name('panier');

// Route::get('/', function(){
//     return view('projects.view');
// });

Route::resource('abouts', AboutController::class);

Route::resource('offers', OfferController::class);

Route::post('commande',[CommandeController::class,'save'])->name('commande')->middleware('auth');

// Route::get('commande',[CommandeController::class,'save'])->name('commande');


Route::get('is_login',[ViewController::class,'isLogin'])->name('is_login')->middleware('auth');


// Route::resource('Orders', CommandeClientController::class);
