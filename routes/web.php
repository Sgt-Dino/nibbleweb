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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('food','FoodController');

Route::get('/edit/{id}',
['as' => 'menu.food.edit',
'uses'=> 'FoodController@edit']);

Route::delete('/delete/{id}', ['uses' => 'FoodController@destroy', 'as' => 'menu.food.destroy']);

Route::put('/update/{id}', ['uses' => 'FoodController@update', 'as' => 'menu.food.update']);

Route::resource('booking','bookingsController');

Route::resource('category','CategoryController');

Route::resource('profile','ProfileController');

//Route::resource('home', 'HomeController@index');
Route::resource('specials','SpecialsController');
//Route::resource('category','CategoryController');

//Route::get('/update', function(){
//    $updated = DB::update('ipdate posts set title')
//})

//Route::get('/delete', function(){
//    $deleted = DB:delete('delete from item where menuitemid = ')
//})