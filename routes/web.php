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
    $data = App\Product::all();
    return view('welcome', compact('data'));
});


Route::group(['middleware'=>'auth'], function() {
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('products', 'ProductController');
//Route::resource('orders', 'OrderController');

});

Auth::routes();
Route::get('keluar',function(){
    \Auth::logout();
    return redirect('login');
});

