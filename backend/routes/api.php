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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth0.authorize.optional')->get('public', fn() => [
    'message' => 'Hello from a public endpoint! You don\'t need to be authenticated to see this.',
    'authorized' => auth()->check(),
    'user' => (array)auth()->user(),
]);

Route::middleware('auth0.authorize')->get('private', fn() => [
    'message' => 'Hello from a private endpoint! You need to be authenticated to see this.',
    'authorized' => auth()->check(),
    'user' => (array)auth()->user(),
]);

Route::middleware('auth0.authorize:read:messages')->get('private-scoped', fn() => [
    'message' => 'Hello from a private endpoint! You need to be authenticated and have a scope of read:messages to see this.',
    'authorized' => auth()->check(),
    'user' => (array)auth()->user(),
]);
