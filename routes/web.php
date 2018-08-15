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
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function(){
    echo "Hello Admin";
})->middleware('auth','admin');

Route::get('/operator', function(){
    echo "Hello operator";
})->middleware('auth','operator');

Route::get('/hard', function(){
    echo "Hello hard";
})->middleware('auth','hard');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/changepassword','HomeController@showChangePasswordForm');
Route::post('/changepassword','HomeController@changePassword')->name('changePassword');
Route::post('profile', 'UserController@update_avatar');
Route::get('profile', 'UserController@profile');
Route::get('/home', function () {
    $links = \App\Link::all();

    return view('home', ['links' => $links]);

});
Route::get('/changepassword', function () {
    $links = \App\Link::all();

    return view('auth.changepassword', ['links' => $links]);

});



