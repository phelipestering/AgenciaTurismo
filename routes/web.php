<?php

use App\Http\Controllers\Panel\BrandController;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

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


// site routes

Route::get('/', function () {
    return view('welcome');
});
// promocoes
Route::get('/promotion', [SiteController::class, 'promotion'])->name('site.promotion');

//agrupando as rotas do painel

Route::group(['prefix' => 'panel', 'namespace' => 'panel'], function () {

    Route::resource('/brands', '\App\Http\Controllers\Panel\BrandController');

    Route::get('/', [SiteController::class, 'panel'])->name('site.panel');

});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
