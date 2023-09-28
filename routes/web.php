<?php

use Doctrine\DBAL\Schema\Index;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/{any}', function () {
//     return view('welcome');
// })->where('any', '.*');


Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@home')->middleware('auth', 'verified');
Route::get('/catagory', 'AdminCatagoryController@catagory')->name('catagory.index');
Route::get('/catagory/createCatagory', 'AdminCatagoryController@createCatagory');
Route::post('addCatagory', 'AdminCatagoryController@addCatagory')->name('addCatagory');
Route::get('/catagory/edite/{id}', 'AdminCatagoryController@viewEdit')->name('catagory.edit');
Route::get('catagory/delete/{id}', 'AdminCatagoryController@deleteCatagory');
Route::get('/products', 'productController@products')->name('products.Index');
Route::get('/product/view/{id}', 'productController@productsView')->name('product.view');
Route::get('/product/add', 'productController@addProduct');
Route::post('/add/product', 'productController@postProduct')->name('addProduct');
Route::get('/product/edit/{slug}', 'productController@edit_product_view');
Route::post('psaveedite/{slug}', 'productController@saveEdit')->name('psaveedite');
Route::get('product/delete/{id}', 'productController@deletProduct');

//order route
Route::get('order', 'orderController@orderIndex');

//user routing user shoping 
Route::get('shop/{category}', 'HomeController@viewShop')->name('shop.category');
Route::post('add_to_cart/{slug}', 'HomeController@addcart')->name('cart.add');
Route::get('view/cart', 'Homecontroller@viewCart')->name('view.cart');
Route::post('update_cart_amout/{cart_id}', 'HomeController@update_cart_amout')->name('update_cart_amout');
Route::post('decreased_cart_item/{cart_id}', 'HomeController@decreased_cart_item')->name('decreased_cart_item');
Route::get('cart/delet/{cart_id}', 'Homecontroller@deleteCart')->name('cart.delet');
Route::get('view/cart=checkout', 'HomeController@checkout');
Route::post('comfirm_order', 'HomeController@comfirmOrder')->name('comfirm_order');

// Route::get('/about', 'HomeController@about');
// Route::get('/contact', 'HomeController@contact');
// Route::get('/join-us', 'HomeController@joinus');

// // ------------------------------
// Route::get('/privacy-policy', 'HomeController@privacy');
// Route::get('/community-tourism', 'HomeController@communityTourism');
// Route::get('/trust-member', 'HomeController@trustMember');
// Route::get('/ticket', 'HomeController@ticket');
// // ------------------------------

// Route::get('/activity/{slug}', 'HomeController@activity');
// Route::get('/action/{slug}', 'HomeController@action');
// Route::get('/keyword/{slug}', 'HomeController@keyword');

// Route::get('/countries/{slug}', 'HomeController@countries');
// Route::get('/story/{slug}', 'HomeController@story');

// Route::get('/api-countries', 'HomeController@apiCountries');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
