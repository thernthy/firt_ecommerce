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
Route::get('/product/view', 'productController@productsView')->name('product.view');
Route::get('/product/add', 'productController@addProduct');

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
