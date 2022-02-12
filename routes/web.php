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
    return view('welcome');
});*/


Route::get('/', function () {
    return view('auth.login');
});




Auth::routes();

//'isUser' is mentioned in Kernal.php go and check
Route::group(['middleware'=>['auth','isUser']],function(){

Route::get('/home', 'HomeController@index')->name('home');

});//END isUser Middleware


//'isAdmin' is mentioned in Kernal.php go and check
Route::group(['middleware'=>['auth','isAdmin']],function(){
Route::get('/customers','CustomerController@index')->name('customer.index');
Route::post('/customer_add','CustomerController@insert')->name('customer.insert');
Route::get('/customer_edit/{id}','CustomerController@edit')->name('customer.edit');
Route::post('/customer_update','CustomerController@update')->name('customer.update');
Route::get('/customer_delete/{id}','CustomerController@delete')->name('customer.delete');

});//END isAdmin Middleware
