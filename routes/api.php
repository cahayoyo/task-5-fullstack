<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ArticleController;

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

Route::post('register',[AuthController::class, "register"]);
Route::post('login',[AuthController::class, "login"]);

Route::group(["middleware" => ["auth:api"]],function(){
    Route::get("profile",[AuthController::class, "profile"]);
    Route::post("logout",[AuthController::class, "logout"]);
});

Route::apiResource('category', CategoryController::class)->middleware('auth:api');
Route::apiResource('article', ArticleController::class)->middleware('auth:api');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
