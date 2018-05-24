<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::get('/', function () {
    return response()->json('success');
});
Route::group(['middleware' => 'auth:api'], function(){
  // USER ROUTES
  Route::get('profile', 'API\UserController@details');

  Route::post('profile','API\UserController@updateProfile')->name('profile.update');
  Route::post('security','API\UserController@updateSecurity')->name('profile.security.update');
  Route::get('users','API\UserController@all')->name('users');
  Route::post('changeCommittee/{user}','API\UserController@changeCommittee')->name('user.change.committee');
  Route::post('beCommittee/{user}', 'API\UserController@beCommittee')->name('user.be.committee');

  // CONTESTS ROUTES
  // Route::resource('contest','API\ContestController');
  Route::get('contest', 'API\ContestController@index');
  Route::post('contest', 'API\ContestController@store');
  Route::get('contest/{contest}', 'API\ContestController@show');
  Route::post('updateContest', 'API\ContestController@update');
  Route::get('deleteContest/{contest}', 'API\ContestController@destroy');
  Route::post('timeline','API\ContestController@updateTimeline')->name('contest.timeline');
  Route::get('mycontest','API\ContestController@myContest')->name('contest.mine');
  Route::get('mycommitteecontest','API\ContestController@myCommitteeContest')->name('contest.committee.mine');

  // Participant Routes
  Route::get('join/{contest}', 'API\ContestController@join')->name('contest.join');
  Route::post('addMember','API\ContestController@addMember')->name('contest.addMember');
  Route::post('addBracket','API\ContestController@addBracket')->name('contest.addBracket');

  // Bracket Route
  ROute::post('changeBracket/{contest}','API\ContestController@changeBracket')->name('contest.changeBracket');
});
