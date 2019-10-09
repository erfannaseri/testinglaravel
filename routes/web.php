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

//Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
//    Route::get('/dashboard','HomeController@index')->name('home');
//});
//Route::namespace('Auth')->group(function(){
//
//    //Login Routes
//    Route::get('/login','LoginController@showLoginForm')->name('login');
//    Route::post('/login','LoginController@login');
//    Route::post('/logout','LoginController@logout')->name('logout');
//    //Forgot Password Routes
//    Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
//    Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//    //Reset Password Routes
//    Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
//    Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');
//});

Auth::routes();
    Route::get('/home','HomeController@index')->name('home');
/**************************************************************/
    Route::get('admin/home','AdminController@index');
    Route::get('admin/editor','EditorController@index');
    Route::get('admin/producer','ProducerController@index');
    /******** LOG IN *****************/
    Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin','Admin\LoginController@login');
    Route::post('logout','Admin\logincontroller@logout')->name('admin.logout');
    /*************** REGISTER ********************/
    Route::get('admin-register','Admin\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('admin-register','Admin\RegisterController@register')->name('admin.create');
    /*************** FOTGOT PASSWORD ************/
    Route::post('admin-password/email','Admin\forgotpasswordcontroller@sendResetLinkemail')->name('admin.password.email');
    Route::get('admin-password/reset','Admin\forgotpasswordcontroller@showlinkrequestform')->name('admin.password.request');
    /************** RESET PASSWORD **************/
    Route::post('admin-password/reset','Admin\ResetPasswordController@reset')->name('admin.password.update');
    Route::get('admin-password/reset/{token}','Admin\resetpasswordcontroller@showresetform')->name('admin.password.reset');;

    Route::get('/deleting','userController@delete');
