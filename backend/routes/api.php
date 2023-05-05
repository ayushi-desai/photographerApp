<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PhotographerController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// ========== JWT Auth =========
Route::group([
    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers\API',
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('register','AuthController@register');
    Route::post('resetpassword', 'PasswordResetController@passwordReset');
    Route::post('changePassword', 'PasswordResetController@resetConfirm');
    Route::get('getUser','AuthController@userData');
    Route::get('getalbums','AlbumController@getAlbums');
    Route::get('sendtestemail','MailController@senMail');
});