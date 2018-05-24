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
    return view('starter');
})->name('landingpage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
  // USER ROUTES
  Route::get('/profile', function () {
      return view('auth.profile');
  })->name('profile');

  Route::put('profile','UserController@updateProfile')->name('profile.update');
  Route::put('security','UserController@updateSecurity')->name('profile.security.update');
  Route::get('users','UserController@all')->name('users');
  Route::put('changeCommittee/{user}','UserController@changeCommittee')->name('user.change.committee');
  Route::post('beCommittee/{user}', 'UserController@beCommittee')->name('user.be.committee');

  // CONTESTS ROUTES
  Route::resource('contest','ContestController');
  Route::put('timeline/{contest}','ContestController@updateTimeline')->name('contest.timeline');
  Route::get('mycontest','ContestController@myContest')->name('contest.mine');
  Route::get('mycommitteecontest','ContestController@myCommitteeContest')->name('contest.committee.mine');

  // Participant Routes
  Route::get('join/{contest}', 'ContestController@join')->name('contest.join');
  Route::post('addMember','ContestController@addMember')->name('contest.addMember');
  Route::post('addBracket','ContestController@addBracket')->name('contest.addBracket');

  // Bracket Route
  ROute::post('changeBracket/{contest}','ContestController@changeBracket')->name('contest.changeBracket');
});
