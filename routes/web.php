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

Route::get('products', ['uses' => 'ProductsController@index', 'as' => 'allProducts']);

Route::get('products/men', ['uses' => 'ProductsController@typeMen', 'as' => 'productsTypeMen']);

Route::get('products/women', ['uses' => 'ProductsController@typeWomen', 'as' => 'productsTypeWomen']);

Route::get('products/search', ['uses' => 'ProductsController@search', 'as' => 'productsSearch']);

Route::get('product/addToCart/{id}', ['uses' => 'ProductsController@addProductToCart', 'as' => 'addToCartProduct']);

Route::get('cart', ['uses' => 'ProductsController@showCart', 'as' => 'cartProducts']);

Route::get('product/deleteFromCart/{id}', ['uses' => 'ProductsController@deleteFromCart', 'as' => 'deleteFromCart']);

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::get('admin', ['uses' => 'Admin\AdminController@index', 'as' => 'admin'])->middleware('restrictToAdmin');

Route::get('admin/products', ['uses' => 'Admin\ProductsController@index', 'as' => 'adminProducts'])->middleware('restrictToAdmin');

Route::get('admin/products/editImage/{id}', ['uses' => 'Admin\ProductsController@editImage', 'as' => 'editProductImage'])->middleware('restrictToAdmin');

Route::get('admin/products/edit/{id}', ['uses' => 'Admin\ProductsController@edit', 'as' => 'editProduct'])->middleware('restrictToAdmin');

Route::get('admin/products/remove/{id}', ['uses' => 'Admin\ProductsController@remove', 'as' => 'removeProduct'])->middleware('restrictToAdmin');

Route::get('admin/products/create', ['uses' => 'Admin\ProductsController@create', 'as' => 'createProduct'])->middleware('restrictToAdmin');

Route::post('admin/products/updateImage/{id}', ['uses' => 'Admin\ProductsController@updateImage', 'as' => 'updateProductImage'])->middleware('restrictToAdmin');

Route::post('admin/products/update/{id}', ['uses' => 'Admin\ProductsController@update', 'as' => 'updateProduct'])->middleware('restrictToAdmin');

Route::post('admin/products/createNew', ['uses' => 'Admin\ProductsController@createAction', 'as' => 'createProductAction'])->middleware('restrictToAdmin');