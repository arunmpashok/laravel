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

/*Route::get('/', function () {
    return view('books/layout');
});*/
// Route::get('/product', 'ProductController@index')->name('product');
// Route::post('/product/create', 'ProductController@create')->name('product/create');
// Route::get('/product/updateform/{id}', 'ProductController@update_form')->name('product/edit');
// Route::get('/product/update/{id}', 'ProductController@update')->name('product/update');
// Route::get('/product/delete/{id}', 'ProductController@delete')->name('product/delete');



$router->get('/', function () {
    return redirect('/product');
});

$router->group(['prefix' => 'product'], function () use ($router) {
    $router->get('', 'ProductController@index');
    $router->get('/delete/{id}', 'ProductController@delete');
    $router->get('/edit/{id}', 'ProductController@update_form');
    $router->get('/update/{id}', 'ProductController@update');
    $router->post('/create', 'ProductController@create');
});
$router->group(['prefix' => 'order'], function () use ($router) {
    $router->get('/list', 'OrderController@index');
    $router->get('/delete/{id}', 'OrderController@delete');
    $router->get('/actions', 'OrderController@add');
    $router->get('/edit/{id}', 'OrderController@edit');
    $router->get('/invoice/{id}', 'OrderController@invoice');
    $router->post('/store', 'OrderController@store');
});

