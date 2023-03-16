<?php

// use App\Http\Controllers\Api\ApiController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::namespace('Api')->controller(ApiController::class)->prefix('v_1')->group(function(){
    Route::get('service-categories', 'serviceCategories');
    Route::get('service-details', 'serviceDetails');
    //user login and registration routes
    Route::post('user-registration', 'userRegistration');
    Route::post('/user-login', 'userLogin');
    Route::post('/reset-password', 'resetPasswordUrl');
    //only authenticated user can access these routes
    Route::middleware('auth:api')->group(function(){
        Route::get('/verify-otp', 'verifyEmail');
        Route::get('/resend-otp', 'resendOtp');
        Route::get('/logout', 'userLogout');
    });
    
});
