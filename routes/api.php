<?php

use App\Http\Controllers\api\AccountController;
use App\Http\Controllers\api\WalletController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/account', [AccountController::class, 'index']);
Route::post('/account/save', [AccountController::class, 'save']);
Route::post('/account/update', [AccountController::class, 'update']);

Route::get('/wallet', [WalletController::class, 'index']);
Route::post('/wallet/save', [WalletController::class, 'save']);
Route::get('/chooseAccount', [WalletController::class, 'chooseAccount']);
Route::get('/chooseAccount2', [WalletController::class, 'chooseAccount2']);
