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



use Illuminate\Support\Facades\Route;
use App\User;
Route::get('/', function () {
    return view('welcome');
});
Route::resource('posts','PostsController');

Route::group(['prefix'=>'articles'],function (){
    Route::get('','articlecontroller@index')->name('articles.index');
    Route::get('/{id}','articlecontroller@show')->name('articles.show');
    Route::get('/create','articlecontroller@create')->name('articles.create');
    Route::post('/','articlecontroller@store')->name('articles.store');
    Route::post('/{id}/comments','articlecontroller@storecomment')->name('articles.comments');
    Route::get('/{id}/edit','articlecontroller@edit')->name('articles.edit');
    Route::put('/{id}','articlecontroller@update')->name('articles.update');
    Route::delete('/{id}','articlecontroller@delete')->name('articles.destroy');
});
Route::group(['prefix'=>'categories'],function (){
   Route::get('/','categorycontroller@index');
   Route::get('/create','categorycontroller@create');
   Route::post('/','categorycontroller@store');
   Route::get('{id}/edit','categorycontroller@edit');
   Route::put('/{id}','categorycontroller@update');
   Route::delete('/{id}','categorycontroller@destroy');
});
Route::get('/test','categorycontroller@test');
