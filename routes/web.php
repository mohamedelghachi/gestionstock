<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\isFatima;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/wfs', function () {
    $username = Auth::user()->name;
    return view('wfs',['username'=>$username]);
})->middleware('auth');

Auth::routes();

Route::get('/home', [UserController::class, 'check'])->name('home');

Route::get('addarticle',[ArticleController::class, 'addarticle'])->name('addarticle');
Route::post('storearticle',[ArticleController::class, 'storearticle'])->name('storearticle');
Route::post('updatearticle',[ArticleController::class, 'updatearticle'])->name('updatearticle');
Route::post('deletearticle',[ArticleController::class, 'deletearticle'])->name('deletearticle');
Route::get('showarticle',[ArticleController::class, 'showarticle'])->name('showarticle');