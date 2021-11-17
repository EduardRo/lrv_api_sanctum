<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
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

Route::get('/products', [ProductController::class,'index']);


Route::get('/products/{id}', [ProductController::class,'show']);
Route::post('/products',[ProductController::class, 'store'])->middleware('auth:sanctum');
Route::put('/products/{id}', [ProductController::class,'update']);
Route::delete('/products/{id}', [ProductController::class,'destroy']);
//Route::get('/product/search/{name}', [ProductController::class, 'search']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    //Route::get('/product/search/{name}', [ProductController::class, 'search']);
});

Route::get('/product/search/{name}', [ProductController::class, 'search'])
->middleware('auth:sanctum');


// Auth

Route::post('/register', [AuthController::class,'register']);