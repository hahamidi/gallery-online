<?php
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

Route::get('/', 'user@indexpage')->middleware('auth');


Route::get('/upload', function () {
    return view('create');
});

/*Route::get('/selectFollower/{pName}', function () {
    return view('selectFollower');
})->name('selectFollower');*/
Route::get('/editprofile', 'user@edit');


Route::get('/selectFollower/{id}','user@select')->name('selectFollower');
Route::post('addFollower','user@addpicture');
Route::post('edit','user@editprofile');
Route::post('/getsearch','user@search');


Route::get('form','pictureController@create');
Route::post('form','pictureController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/deletepicture','user@deletepic');
Route::post('/unfollow','user@unfollow');
Route::post('/userfollow','user@follow');
Route::get('/getallfollower','user@getAllfollower');
Route::get('/shownotification','user@shownotification');
Route::post('/acceptfollow','user@acceptfollow');
