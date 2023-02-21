<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

Route::middleware('auth.basic')->group(function () {
    Route::apiResource('user', UserController::class);
});
//Route::middleware(['cors'])->group(function () {
//    Route::post('/editProduct', 'ProductController@editProduct');
//}); // enable cors aici si in app/Http/Middleware/Cors.php

Route::get('/', function () {
    return response()->json([
        'message' => 'This is a simple example of item returned by your APIs. Everyone can see it.'
    ]);
});

Route::get('products', 'App\Http\Controllers\ProductController@index');
Route::get('products/{id}',[ProductController::class,'show']);
Route::post('products', [ProductController::class,'store']);
Route::patch('products/{id}',[ProductController::class,'update']);
Route::delete('products/{id}',[ProductController::class,'delete']);

Route::post('login', [AuthController::class,'login']);
Route::post('logout', [AuthController::class,'logout']);
Route::post('refresh', [AuthController::class,'refresh']);
Route::get('me', [AuthController::class,'me']);

