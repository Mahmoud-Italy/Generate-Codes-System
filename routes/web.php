<?php

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


#Auth
Route::get('login','MainCtrl@login')->name('login');
Route::post('login','MainCtrl@doLogin');
Route::get('signup','MainCtrl@signup')->name('register');
Route::post('signup','MainCtrl@doSignup');
Route::get('logout','MainCtrl@logout')->name('logout');



Route::group(['middleware' => 'auth'],function(){
#Dashboard
Route::get('/','MainCtrl@index');

#Scope
Route::get('scopes','ScopeCtrl@create');
Route::post('scopes','ScopeCtrl@store');
Route::get('scopes/edit/{id}','ScopeCtrl@edit');
Route::post('scopes/edit/{id}','ScopeCtrl@update');
Route::post('scopes/destroy/{id}','ScopeCtrl@destroy');

#Services
Route::get('services/{scope_id}','ServiceCtrl@create');
Route::post('services/{scope_id}','ServiceCtrl@store');
Route::get('services/edit/{id}','ServiceCtrl@edit');
Route::post('services/edit/{id}','ServiceCtrl@update');
Route::post('services/destroy/{id}','ServiceCtrl@destroy');

#Generate
Route::get('generate','GenerateCtrl@create');
Route::post('generate','GenerateCtrl@store');
Route::post('generate/destroy/{id}','GenerateCtrl@destroy');
});
