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
    return view('auth.login');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Property Routes
// Route::get('/property', 'PropertyController@propertyView')->name('property');
Route::resource('property', 'PropertiesController');
Route::get('/property/edit/{id}', 'PropertiesController@editForm');
Route::post('/property/editSubmit/{id}', 'PropertiesController@editSubmit');
Route::post('/property/delete/{id}', 'PropertiesController@deleteProperties');
Route::get('/calendar/getDate', 'HomeController@getPropertiesDate');


// Route::get('/addProperty', function () {
//     return view('property');
// });