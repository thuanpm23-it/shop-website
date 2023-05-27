<?php

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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");
Route::get('/contact', 'App\Http\Controllers\ContactController@index')->name("contact.index");
Route::post('/postcontact', 'App\Http\Controllers\ContactController@contact')->name('contact');

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/products/desc', 'App\Http\Controllers\ProductController@desc')->name("product.desc");
Route::get('/products/asc', 'App\Http\Controllers\ProductController@asc')->name("product.asc");
Route::get('/products/newness', 'App\Http\Controllers\ProductController@newness')->name("product.newness");
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");
Route::get('/search', 'App\Http\Controllers\ProductController@search')->name('product.search');

Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");
Route::get('/cart/delete', 'App\Http\Controllers\CartController@delete')->name("cart.delete");
Route::get('cart/delete/{id}', 'App\Http\Controllers\CartController@deleteById')->name('cart.deleteById');
// Route::put('/cart/{id}', 'App\Http\Controllers\CartController@update')->name('cart.update');

Route::post('/news', 'App\Http\Controllers\NewsletterController@newsletter')->name('newsletter');
Route::get('/blogs', 'App\Http\Controllers\BlogController@index')->name("blog.index");
Route::get('/blogs/{id}', 'App\Http\Controllers\BlogController@show')->name("blog.show");


Route::middleware('auth')->group(function () {
    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name("cart.purchase");
    Route::get('/my-account/orders', 'App\Http\Controllers\MyAccountController@orders')->name("myaccount.orders");
});

Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name("admin.product");
    Route::get('/admin/products/new', 'App\Http\Controllers\Admin\AdminProductController@new')->name("admin.new");
    Route::post('/admin/products/add', 'App\Http\Controllers\Admin\AdminProductController@add')->name("admin.add");
    Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name("admin.product.delete");
    Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name("admin.edit");
    Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name("admin.update");

    Route::get('/admin/users', 'App\Http\Controllers\Admin\AdminUserController@index')->name("admin.user.index");
    Route::get('/admin/contact', 'App\Http\Controllers\Admin\AdminContactController@index')->name("admin.contact.index");
    Route::delete('/admin/contact/{id}/delete', 'App\Http\Controllers\Admin\AdminContactController@delete')->name("admin.contact.delete");

    Route::get('/admin/newsletter', 'App\Http\Controllers\Admin\AdminNewsletterController@index')->name("admin.news.index");

    Route::get('/admin/order', 'App\Http\Controllers\Admin\AdminOrderController@index')->name("admin.order.index");

    Route::get('/admin/item', 'App\Http\Controllers\Admin\AdminItemController@index')->name("admin.item.index");


    Route::get('/admin/blogs', 'App\Http\Controllers\Admin\AdminBlogController@index')->name("admin.blog.index");
    Route::get('/admin/blogs/new', 'App\Http\Controllers\Admin\AdminBlogController@new')->name("admin.blog.new");
    Route::post('/admin/blogs/add', 'App\Http\Controllers\Admin\AdminBlogController@add')->name("admin.blog.add");
    Route::get('/admin/blogs/{id}/edit', 'App\Http\Controllers\Admin\AdminBlogController@edit')->name("admin.blog.edit");
    Route::put('/admin/blogs/{id}/update', 'App\Http\Controllers\Admin\AdminBlogController@update')->name("admin.blog.update");
    Route::delete('/admin/blogs/{id}/delete', 'App\Http\Controllers\Admin\AdminBlogController@delete')->name("admin.blog.delete");
});

Auth::routes();
