<?php

use App\Http\Controllers\api\CartSession;
use App\Http\Controllers\api\Category;
use App\Http\Controllers\api\Login;
use App\Http\Controllers\api\LoginGoogle;
use App\Http\Controllers\api\Order;
use App\Http\Controllers\api\Property;
use App\Http\Controllers\api\Register;
use App\Http\Controllers\api\Webhook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('webhook', Webhook::class)->only('store');
Route::apiResource('properties', Property::class)->only('index', 'show');
Route::apiResource('register', Register::class)->only('store');
Route::apiResource('login', Login::class)->only('store');
Route::apiResource('login-google', LoginGoogle::class)->only('show');
Route::apiResource('categories', Category::class)->only('index', 'show');
Route::apiResource('cart-session', CartSession::class)->only('show')->middleware('auth:sanctum');
Route::apiResource('order', Order::class)->only('store', 'show', 'index')->middleware('auth:sanctum');