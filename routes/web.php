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
Route::get('/liste/{id}', 'ListController@index')->name('list');
Route::get('/prestataire/{id}', 'ProviderController@showProvider')->name('provider.show');

Route::get('/espace-membre', 'MemberAreaController@show')->name('member-area')->middleware('auth');
Route::get('/espace-membre/modification', 'MemberAreaController@editPersonnal')->name('member-area.edit')->middleware('auth');
Route::patch('/espace-membre/modification/{id}', 'MemberAreaController@updatePersonnal')->name('member-area.update')->middleware('auth');
Route::get('/espace-membre/{id}/prestataires/', 'MemberAreaController@showProviders')->name('member-area.providers.show')->middleware('auth');
Route::get('/espace-membre/{id}/prestataires/modification/{id_provider}', 'MemberAreaController@editProvider')->name('member-area.provider.edit')->middleware('auth');
Route::patch('/espace-membre/{id}/prestataire/modifcation/{id_provider}', 'MemberAreaController@updateProvider')->name('member-area.provider.update')->middleware('auth');
Route::delete('/espace-membre/{id}/prestataire/suppression/{id_provider}', 'MemberAreaController@deleteProvider')->name('member-area.provider.delete')->middleware('auth');

Route::get('/devenir-prestataire', 'ProviderController@show')->name('become-provider');
Route::get('/devenir-prestataire/formulaire', 'ProviderController@showForm')->name('form-provider.show')->middleware('auth');
Route::post('/devenir-prestataire/formulaire/{id}', 'ProviderController@applyForm')->name('form-provider.apply')->middleware('auth');


Route::get('/admin', 'AdminController@panel')->name('admin')->middleware('auth.admin');
Route::get('/admin/categories', 'AdminController@showCategories')->name('admin.category')->middleware('auth.admin');
Route::post('/admin/categories/ajout', 'AdminController@storeCategory')->name('admin.category.store')->middleware('auth.admin');
Route::get('/admin/categories/modification/{id}', 'AdminController@editCategory')->name('admin.category.edit')->middleware('auth.admin');
Route::patch('/admin/categories/modification/{id}', 'AdminController@updateCategory')->name('admin.category.update')->middleware('auth.admin');
Route::delete('/admin/categories/suppression/{id}', 'AdminController@deleteCategory')->name('admin.category.delete')->middleware('auth.admin');
Route::get('/admin/prestataires', 'AdminController@showProviders')->name('admin.provider')->middleware('auth.admin');
Route::post('/admin/prestataires/ajout', 'AdminController@storeProvider')->name('admin.provider.store')->middleware('auth.admin');
Route::delete('/admin/prestataires/suppression/{id}', 'AdminController@deleteProvider')->name('admin.provider.delete')->middleware('auth.admin');
Route::get('/admin/utilisateurs', 'AdminController@showUsers')->name('admin.user')->middleware('auth.admin');
Route::delete('/admin/utilisateurs/suppression/{id}', 'AdminController@deleteUser')->name('admin.user.delete')->middleware('auth.admin');

Auth::routes(['verify' => true]);
Route::get('/connexion', 'Auth\LoginController@show')->name('show.login')->middleware('guest');
Route::get('/deconnexion', 'Auth\LoginController@logout')->name('logout');
Route::get('/inscription', 'Auth\RegisterController@show')->name('show.register')->middleware('guest');


