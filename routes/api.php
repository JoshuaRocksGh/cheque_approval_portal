<?php

use App\Http\Controllers\ApiApprovedController;
use App\Http\Controllers\ApiPendingController;
use App\Http\Controllers\ApiRejectedController;
use App\Http\Controllers\Bog\ReturnsController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/test-bog', [ReturnsController::class, 'index']);


Route::get('/pending-uploaded-cheques', [ApiPendingController::class, 'pending_uploaded_cheques'])->name('pending-uploaded-cheques');

Route::get('/approve-cheque-list', [ApiApprovedController::class, 'index'])->name('approve-cheque-list');

// Route::get('/approved-cheque', [ApprovedController::class, 'index'])->name('approved-cheque');

Route::get('/reject-cheque-list', [ApiRejectedController::class, 'index'])->name('reject-cheque-list');



