<?php


use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function () {
    // Control panel.
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('clients', ClientController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('products', ProductController::class);
    Route::resource('providers', ProviderController::class);

    Route::get('changeproducturl', [ProductController::class, 'changeproducturl'])->name('changeproducturl');
    Route::get('changeclienturl', [ClientController::class, 'changeclienturl'])->name('changeclienturl');
    Route::get("changeorderurl", [OrderController::class, "changeorderurl"])->name("changeorderurl");


    Route::get('/401', function () {
        abort(401);
    });
    
    Route::get('/402', function () {
        abort(402);
    });
    
    Route::get('/403', function () {
        abort(403);
    });
    
    Route::get('/404', function () {
        abort(404);
    });
    
    Route::get('/419', function () {
        abort(419);
    });
    
    Route::get('/429', function () {
        abort(429);
    });
    
    Route::get('/500', function () {
        abort(500);
    });
    
    Route::get('/503', function () {
        abort(503);
    });
});
