<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\Contact;

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

Route::get('/', 'PagesController@home')->name('home');

Route::get('/services', 'CategoryController@showServices')->name('services');

Route::get('/artisans', 'CategoryController@showArtisans')->name('artisans');

Route::get('/logements', 'CategoryController@showHousings')->name('housings');

Route::get('/test/list', 'ListController@index')->name('list');

Route::get('/admin', 'AdminController@panel')->name('admin');
Route::get('/admin/categories', 'AdminController@showCategories')->name('admin-categories');
Route::post('/admin/categories/store', 'AdminController@storeCategory')->name('admin.category.store');
Route::get('/admin/prestataires', 'AdminController@showProviders')->name('admin-providers');
Route::get('/admin/utilisateurs', 'AdminController@showUsers')->name('admin-users');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
