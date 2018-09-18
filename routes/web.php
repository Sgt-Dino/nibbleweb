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


Route::patch('/updateTodayC/{id}', ['uses' => 'bookingsTodayController@updateC', 'as' => 'home.updateC']);
Route::patch('/updateTodayM/{id}', ['uses' => 'bookingsTodayController@updateM', 'as' => 'home.updateM']);



Route::get('/edit/{id}',
['as' => 'menu.food.edit',
'uses'=> 'FoodController@edit']);
Route::get('/categoryedit/{id}',
['as' => 'menu.category.edit',
'uses'=> 'CategoryController@edit']);
Route::get('/cat/{id}',['as' => 'menu.food.cat','uses'=> 'FoodController@catchange']);
Route::delete('/delete/{id}', ['uses' => 'FoodController@destroy', 'as' => 'menu.food.destroy']);
Route::patch('/update/{id}', ['uses' => 'FoodController@update', 'as' => 'menu.food.update']);

Route::patch('/updateRemove/{id}', ['uses' => 'CategoryController@updateRemove', 'as' => 'menu.Category.Remove']);

Route::patch('/updateBookingA/{id}', ['uses' => 'bookingsController@updateA', 'as' => 'bookings.index.updateA']);
Route::patch('/updateBookingD/{id}', ['uses' => 'bookingsController@updateD', 'as' => 'bookings.index.updateD']);

Route::patch('/updateprofile/{id}', ['uses' => 'profileController@update', 'as' => 'profile.profile.update']);

Route::get('/reportbymonthD/{startDate,endDate}',['as' => 'reportbymonth.datechange','uses'=> 'ReportController@datechange']);
Route::get('/dummydate',['as' => 'reportbymonth.dummydate','uses'=> 'ReportController@dummydate']);
Route::get('/statusbymonth', ['uses' =>'ReportController@show', 'as' => 'reports.status.chart']);

Route::get('/report/pdf', 'reports\ReportController@fun_pdf');

Route::resource('questions', 'faqController');
Route::resource('reportbymonth', 'ReportController');
Route::resource('category','CategoryController');
Route::resource('booking','bookingsController');
Route::resource('food','FoodController');
Route::resource('home','bookingsTodayController');
Route::resource('profile','ProfileController');

//Route::patch('/report/chart',['uses' => 'ReportController@show', 'as' => 'reports.status.chart.show']);

//Route::get('/report',function(){
//    $bookings = Bookings::all();
//    return view('reports/create');
//});

//Route::resource('home', 'HomeController@index');
Route::resource('specials','SpecialsController');
//Route::resource('category','CategoryController');

//Route::get('/update', function(){
//    $updated = DB::update('ipdate posts set title')
//})

//Route::get('/delete', function(){
//    $deleted = DB:delete('delete from item where menuitemid = ')
//})