<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;


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

Route::get('/espace-membre', 'UserController@show')->name('member-area')->middleware('auth');
Route::get('/espace-membre/modification', 'UserController@edit')->name('member-area.edit')->middleware('auth');
Route::patch('/espace-membre/modification/{id}', 'UserController@update')->name('member-area.update')->middleware('auth');

Route::get('/devenir-prestataire', 'ProviderController@show')->name('become-provider');
Route::get('/devenir-prestataire/formulaire', 'ProviderController@showForm')->name('form-provider.show')->middleware('auth');
Route::post('/devenir-prestataire/formulaire', 'ProviderController@applyForm')->name('form-provider.apply')->middleware('auth');


Route::get('/admin', 'AdminController@panel')->name('admin')->middleware('auth');
Route::get('/admin/categories', 'AdminController@showCategories')->name('admin.category')->middleware('auth');
Route::post('/admin/categories/ajout', 'AdminController@storeCategory')->name('admin.category.store')->middleware('auth');
Route::get('/admin/categories/modification/{id}', 'AdminController@editCategory')->name('admin.category.edit')->middleware('auth');
Route::patch('/admin/categories/modification/{id}', 'AdminController@updateCategory')->name('admin.category.update')->middleware('auth');
Route::delete('/admin/categories/suppression/{id}', 'AdminController@deleteCategory')->name('admin.category.delete')->middleware('auth');
Route::get('/admin/prestataires', 'AdminController@showProviders')->name('admin.provider')->middleware('auth');
Route::get('/admin/utilisateurs', 'AdminController@showUsers')->name('admin.user')->middleware('auth');
Route::delete('/admin/utilisateurs/suppression/{id}', 'AdminController@deleteUser')->name('admin.user.delete')->middleware('auth');

Auth::routes(['verify' => true]);
Route::get('/connexion', 'Auth\LoginController@show')->name('show.login')->middleware('guest');
Route::get('/deconnexion', 'Auth\LoginController@logout')->name('logout');
Route::get('/inscription', 'Auth\RegisterController@show')->name('show.register')->middleware('guest');


