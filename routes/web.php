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
Route::get('/test','TestingController@index');
Route::get('/collection', function () {
   $user=User::all();
   foreach ($user as $u){
       echo '<ol>';
       echo  '<li>'.$u->email.'</li>';

       echo '<li>'.$u->password.'</li>';
       echo '</ol>';
   }
});
Route::get('/rep','testingcontroller@replicate');
Route::get('/soft','testingcontroller@softdelete');
Route::get('/ssoft','testingcontroller@showsoft');
Route::get('/restore','testingcontroller@restore');
Route::get('/unit','testingcontroller@search');
Route::get('/t/{id}/t',function (){
    return 'ghreg';
});
Route::get('/login','ProjectController@index');
Route::post('/verify',[
    'uses'=>'projectcontroller@store',
    'middleware'=>'web'
]);
Route::group(['prefix'=>'articles'],function (){
    Route::get('','articlecontroller@index');
    Route::get('/{id}','articlecontroller@show');
    Route::get('/create','articlecontroller@create');
    Route::post('/','articlecontroller@store');
    Route::post('/{id}/comments','articlecontroller@storecomment');
    Route::get('/{id}/edit','articlecontroller@edit');
    Route::put('/{id}','articlecontroller@update');
    Route::delete('/{id}','articlecontroller@delete');
});
