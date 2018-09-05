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

Route::resource('booking','bookingsController');

Route::resource('food','FoodController');

Route::resource('category','CategoryController');

Route::resource('profile','ProfileController');

Route::resource('report', 'ReportController');

Route::resource('questions', 'faqController');

//Route::patch('/report/chart',['uses' => 'ReportController@show', 'as' => 'reports.status.chart.show']);

//Route::get('/report',function(){
//    $bookings = Bookings::all();
//    return view('reports/create');
//});

//Route::resource('home', 'HomeController@index');
Route::resource('specials','SpecialsController');
//Route::resource('category','CategoryController');