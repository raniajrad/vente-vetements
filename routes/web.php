<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', [HomeController::class,'redirect']);

Route::get('/view_catagory', [AdminController::class,'view_catagory']);
Route::get('/view_user', [UserController::class,'view_user']);

Route::get('/delete_user/{id}', [UserController::class,'delete_user']);

Route::post('/add_catagorie', [AdminController::class,'add_catagorie']);
//add_image: image mhichi ajouter just declaration dun fichier image
Route::get('/add_image', [AdminController::class,'add_image']);
Route::post('/ajout_image', [AdminController::class,'ajout_image']);

Route::get('/show_image', [AdminController::class,'show_image']);
Route::get('/delete_image/{id}', [AdminController::class,'delete_image']);
Route::get('/modfier_image/{id}', [AdminController::class,'modfier_image']);
Route::post('/modfier_image_confirm/{id}', [AdminController::class,'modfier_image_confirm']);


Route::get('/image_detaile/{id}', [HomeController::class,'image_detaile']);
Route::post('/add_cart/{id}', [HomeController::class,'add_cart']);

Route::get('/show_cart', [HomeController::class,'show_cart']);
Route::get('/remove_cart/{id}', [HomeController::class,'remove_cart']);
Route::get('/cash_order', [HomeController::class,'cash_order']);

Route::get('/order', [AdminController::class,'order']);

Route::get('/search', [AdminController::class,'searchdata']);
Route::get('/search_liste_image', [AdminController::class,'search_liste_image']);

Route::get('/search_catagorie', [HomeController::class,'search_catagorie']);

//Route::get('/show_order', [HomeController::class,'show_order']);


//Route::get('/cancel_order/{id}', [HomeController::class,'cancel_order']);

Route::get('/products', [HomeController::class,'products']);
Route::get('/search_product', [HomeController::class,'search_product']);

Route::get('/stripe/{totalprice}', [HomeController::class,'stripe']);
Route::get('/portfolio', [HomeController::class,'portfolio']);


Route::get('/propos', [HomeController::class,'propos']);

Route::get('/contact', [HomeController::class,'contact']);

Route::post('/post_message', [ContactFormController::class,'post_message']);


