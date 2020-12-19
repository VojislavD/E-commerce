<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PagesController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/items', 'ItemsController@index');
Route::get('/items/search', 'ItemsController@search');
Route::get('/items/{item}', 'ItemsController@show');
Route::post('/items/{item}/review', 'ReviewsController@store');

Route::get('/category/new', 'CategoriesController@new');
Route::get('/category/top', 'CategoriesController@top');
Route::get('/category/{category:name}', 'CategoriesController@show');
Route::get('/category/{category:name}/sort', 'CategoriesController@sort');

Route::get('/tags/{tag:name}', 'TagsController@show');
Route::get('/tags/{tag:name}/sort', 'TagsController@sort');

Route::get('/wishlist', 'WishlistController@index')->name('wishlist');
Route::post('/wishlist/add/{item}', 'WishlistController@store');
Route::put('/wishlist/remove/{item}', 'WishlistController@remove');

Route::post('/order/confirm', 'OrdersController@validatePayment');
Route::get('/order/{order}', 'OrdersController@show');
Route::post('/order/{order}/cancel', 'OrdersController@cancel');
Route::get('/order/complete/payed', 'OrdersController@completeOrderPayed');

Route::get('/cart', 'CartController@index')->name('cart');
Route::get('/cart/complete', 'CartController@complete');
Route::post('/cart/add/wishlist/{item}', 'CartController@storeFromWishlist');
Route::post('/cart/add/{item}', 'CartController@store');
Route::put('/cart/remove/{item}', 'CartController@remove');
Route::delete('/cart/destroy', 'CartController@destroy');
Route::post('/cart/update/{item}', 'CartController@update');

Route::get('/user/{user:name}/edit', 'UsersController@edit');
Route::put('/user/{user:name}/update', 'UsersController@update');
Route::delete('/user/{user:name}/delete', 'UsersController@destroy');

Route::middleware('auth','admin')->group(function() {
	Route::get('/admin/users', 'UsersController@index');
	Route::get('/admin/users/search', 'UsersController@search');
	Route::get('/admin/user/{user:name}', 'UsersController@show');

	Route::get('/admin/orders', 'OrdersController@index');
	Route::get('/admin/orders/search', 'OrdersController@search');
	Route::get('/admin/orders/filter', 'OrdersController@filter');
	Route::put('/admin/order/{order}/status', 'OrdersController@status');
	Route::get('/admin/order/{order}/edit', 'OrdersController@edit');
	Route::put('/admin/order/{order}/update', 'OrdersController@update');
	Route::delete('/admin/order/{order}/delete', 'OrdersController@destroy');

	Route::get('/admin/reviews', 'ReviewsController@index');
	Route::get('/admin/reviews/search', 'ReviewsController@search');
	Route::get('/admin/reviews/filter', 'ReviewsController@filter');
	Route::get('/admin/reviews/{review}', 'ReviewsController@show');
	Route::put('/admin/review/{review}/update', 'ReviewsController@update');
	Route::delete('/admin/review/{review}/delete', 'ReviewsController@destroy');

	Route::get('/admin/items', 'ItemsController@adminIndex')->name('admin.items');
	Route::get('/admin/items/search', 'ItemsController@search');
	Route::get('/admin/items/create', 'ItemsController@create');
	Route::get('/admin/items/filter', 'ItemsController@filterByCategory');
	Route::post('/admin/items/create/', 'ItemsController@store');
	Route::get('/admin/items/{item}', 'ItemsController@adminShow');
	Route::get('/admin/items/{item}/edit', 'ItemsController@edit');
	Route::put('/admin/items/{item}/update', 'ItemsController@update');
	Route::delete('/admin/items/{item}/delete', 'ItemsController@destroy');
});


//Display images on production server beacuse Storage::link isn't allowed
Route::get('storage/images/products/{filename}', function ($filename)
{
    return Image::make(storage_path('app/public/images/products/' . $filename))->response();
});