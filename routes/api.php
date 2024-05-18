<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;

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

Route::post('login', [UserController::class, 'authorization'])->withoutMiddleware(['auth:sanctum']);
Route::post('register', [UserController::class, 'registration'])->withoutMiddleware(['auth:sanctum']);

Route::prefix('payments')->group(function () {
    Route::get('/', [PaymentController::class, 'show']);
    Route::get('/my', [PaymentController::class, 'my']);
    Route::post('/add', [PaymentController::class, 'store']);
});
