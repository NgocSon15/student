<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\RequestController;
use App\Http\Controllers\Api\CertificateRequestController;
use App\Http\Controllers\Api\TranscriptRequestController;
use App\Http\Controllers\Api\PauseExamRequestController;
use App\Http\Controllers\Api\PauseTuitionRequestController;

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



Route::group([
    'prefix' => 'v1'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('jwt.auth');

    Route::get('requests', [RequestController::class, 'index']);
    Route::post('requests/certificate', [CertificateRequestController::class, 'store']);
    Route::post('requests/transcript', [TranscriptRequestController::class, 'store']);
    Route::post('requests/pause-exam', [PauseExamRequestController::class, 'store']);
    Route::post('requests/review-exam', [ReviewExamRequestController::class, 'store']);
    Route::post('requests/pause-tuition', [PauseTuitionRequestController::class, 'store']);
});