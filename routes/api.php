<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'Api\UserApiController@login');
    Route::post('signup', 'Api\UserApiController@signup');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', 'Api\UserApiController@logout');
        Route::get('user', 'Api\UserApiController@user');
    });
});
//User
Route::post('/user', 'Api\UserApiController@createOrUpdate');
Route::get('/user/datatable', 'Api\UserApiController@index');
Route::post('/user/listuser', 'Api\UserApiController@userDatatable');
Route::post('/user/delete/{id}', 'Api\UserApiController@delete');
Route::get('/user/detail/{id}', 'Api\UserApiController@detail');
Route::post('/roles', 'Api\UserApiController@getRoles');

//DPS
Route::post('/dps', 'Api\DpsApiController@createOrUpdate');
Route::post('/dps/datatable', 'Api\DpsApiController@dpsDatatable');
Route::get('/dps/detail/{id}', 'Api\DpsApiController@detail');
Route::post('/dps/delete/{id}', 'Api\DpsApiController@delete');

//Absence
Route::post('/absence', 'Api\AbsenceApiController@save');
Route::post('/listabsence', 'Api\AbsenceApiController@getListDataAbsence');
