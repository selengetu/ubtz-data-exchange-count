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
Route::get('/', function () {
    return redirect('login');
})->name('/');
Route::post('/request', 'HomeController@request')->name('request');
Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::post('/addherd', 'HomeController@add')->name('addherd');
Route::post('/createcount', 'HomeController@createcount')->name('createcount');
Route::post('/updateherd', 'HomeController@update')->name('updateherd');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/getherd/{id?}',function($id = 0){	
    $dt=DB::table('CONST_HERD')
    ->where('herd_id','=',$id)->get();
    return $dt;
});	
Route::get('/getcountherd/{id?}',function($id = 0){	
    $dt=DB::table('V_COUNT_HERD')
    ->where('count_id','=',$id)->get();
    return $dt;
});
Route::post('/updatecount', 'HomeController@updatecount')->name('updatecount');	
Route::get('/count', 'HomeController@count')->name('count');
Route::get('/herd/{herd}/delete', ['as' => 'herd.delete', 'uses' => 'HomeController@del']);
Route::get('/filter_countyear/{date}', 'HomeController@filter_countyear');
Route::get('/filter_type/{date}', 'HomeController@filter_type');
Route::get('/filter_owner/{date}', 'HomeController@filter_owner');