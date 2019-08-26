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
Route::get('/login', function () {
    return view('auth.login')->name('login');
});
Auth::routes();
// Route::get('/search', function () {
//     return view('search');
// });
Route::get('/create', function () {
    return view('restaurants.create')->name('create');
});

Route::get('/', function () {
    return view('restaurants.landing');
})->name('landing');
// Route::get('/viewer', function () {
//     return view('restaurants.viewer');
// });
Route::get('/index',function(){
    return view('restaurants.index');
});
Route::get('/searchq',function(){
    return view('restaurants.search');
});
Route::get('/restaurants/{restaurant_id}/review', ['as' => 'restaurants.review', 'uses' => 'ReviewsController@show']);
Route::get('/restaurants/{restaurant_id}/food', ['as' => 'restaurants.menu', 'uses' => 'FoodsController@show']);
Route::get('/restaurants/profile/{restaurant_id}/', 'RestaurantsController@profile');
Route::resource('restaurants','RestaurantsController');
Route::resource('menu','FoodsController');
Route::resource('foodcategory','FoodCategoryController');
Route::resource('reviews','ReviewsController');
Route::get('search','FoodsController@search')->name('search');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/map',function(){
    return view('restaurants.map');
})->name('maps');
Route::get('/searchInput',function(){
    return view('restaurants.searchInput');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/searchq', 'SearchController@search')->name('searchq');


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});


//This is the places route 
Route::get('/map2',function(){
    return view('restaurants.map2');
});

Route::get('/admin', function(){
    echo "Hello Admin";
})->middleware('admin');
 
Route::get('/vendor', function(){
    echo "Hello Vendor";
})->middleware('vendor');
 
Route::get('/customer', function(){
    echo "Hello Customer";
})->middleware('customer');
// Route::get('/', 'FoodsController@index');
 
Route::get('cart', 'FoodsController@cart');
 
Route::get('add-to-cart/{id}', 'FoodsController@addToCart');

Route::patch('update-cart', 'FoodsController@update');
Route::delete('remove-from-cart', 'FoodsController@remove');
Route::get('/cart',function(){
    return view('restaurants.cart');
});
Route::get('/restaurants/{restaurant_id}/cart', ['as' => 'restaurants.cart', 'uses' => 'FoodsController@show']);
 
