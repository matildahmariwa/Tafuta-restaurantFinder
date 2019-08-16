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

Route::get('/homescreen', function () {
    return view('homescreen');
});
Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();
// Route::get('/search', function () {
//     return view('search');
// });
Route::get('/create', function () {
    return view('restaurants.create');
});
// Route::get('/viewer', function () {
//     return view('restaurants.viewer');
// });
Route::get('/index',function(){
    return view('restaurants.index');
});
Route::get('/restaurants/{restaurant_id}/review', ['as' => 'restaurants.review', 'uses' => 'ReviewsController@show']);
Route::get('/restaurants/profile/{restaurant_id}/', 'RestaurantsController@profile');

Route::resource('restaurants','RestaurantsController');
Route::resource('reviews','ReviewsController');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/map',function(){
    return view('map');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

