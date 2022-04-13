<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\DashboardController;
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

Route::get('/admin/dashboard', [DashboardController::class, 'index']);
Route::get('/admin/kategori', [KategoriController::class, 'index']);
Route::get('/admin/kategori/tambah', [KategoriController::class, 'create']);
Route::get('/admin/kategori/{id}/edit', [KategoriController::class, 'edit']);
Auth::routes();

Route::post('/kategori/simpan', [KategoriController::class, 'store']);
Route::post('/kategori/edit', [KategoriController::class, 'update']);

Route::get('/home', 'HomeController@index')->name('home');
