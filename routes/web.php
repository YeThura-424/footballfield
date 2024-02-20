<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/home', 'HomeController@index')->name('home');

//frontend
Route::get('/','FrontendController@index')->name('index');
Route::get('available','FrontendController@available')->name('available');
Route::get('pitch/{id}','FrontendController@pitch')->name('pitch');
Route::get('bookingdetail/{id}','FrontendController@bookingdetail')->name('bookingdetail');
Route::get('price/{id}','FrontendController@price')->name('price');
Route::get('rentdetail/{id}','FrontendController@rentdetail')->name('rentdetail');
Route::get('success','FrontendController@success')->name('success');
Route::get('event/{id}','FrontendController@event')->name('event');
Route::get('eventbooking/{id}','FrontendController@eventbooking')->name('eventbooking');
Route::get('eventsuccess','FrontendController@eventsuccess')->name('eventsuccess');
Route::get('about','FrontendController@about')->name('about');
Route::get('contact','FrontendController@contact')->name('contact');
Route::get('bookinglist/{id}','FrontendController@bookinglist')->name('bookinglist');
Route::resource('profile','ProfileController');

//email
Route::post('sendmail', 'MailController@basic_email')->name('confirm');
Route::post('sendhtmlemail', 'MailController@html_email')->name('cancel');

//backend



Route::group(['middleware' => 'role:admin','prefix' => 'backside', 'as' => 'backside.'], function(){

	Route::resource('stadium','StadiumController');
	Route::resource('pitch','PitchController');
	Route::resource('dashboard','DashboardController');
	Route::resource('memberlist','MemberListController');
	Route::resource('eventdetail','EventDetailController');
	Route::resource('rentdetail','RentDetailController');
	Route::resource('event','EventController');
	Route::resource('price','PriceController');
	Route::resource('time','TimeController');
	Route::resource('userprofile','UserprofileController');


	
});