<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\RequestController;
use App\Http\Controllers\Api\CertificateRequestController;
use App\Http\Controllers\Api\TranscriptRequestController;
use App\Http\Controllers\Api\PauseExamRequestController;
use App\Http\Controllers\Api\ReviewExamRequestController;
use App\Http\Controllers\Api\PauseTuitionRequestController;
use App\Http\Controllers\Api\BorrowFileRequestController;
use App\Http\Controllers\Api\SocialAssistanceRequestController;
use App\Http\Controllers\Api\BankLoanRequestController;
use App\Http\Controllers\Api\StudentCardRequestController;
use App\Http\Controllers\Api\TempCertificateRequestController;
use App\Http\Controllers\Api\TimeLimitedAbsenceRequestController;
use App\Http\Controllers\Api\ContinueStudyRequestController;
use App\Http\Controllers\Api\StopStudyRequestController;
use App\Http\Controllers\Api\GoingAbroadRequestController;
use App\Http\Controllers\Api\NotFinishedSubjectRequestController;
use App\Http\Controllers\Api\TuitionExemptionRequestController;
use App\Http\Controllers\Api\BusCardRequestController;

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
    Route::post('requests/borrow-file', [BorrowFileRequestController::class, 'store']);
    Route::post('requests/social-assistance', [SocialAssistanceRequestController::class, 'store']);
    Route::post('requests/bank-loan', [BankLoanRequestController::class, 'store']);
    Route::post('requests/student-card', [StudentCardRequestController::class, 'store']);
    Route::post('requests/temp-certificate', [TempCertificateRequestController::class, 'store']);
    Route::post('requests/time-limited-absence', [TimeLimitedAbsenceRequestController::class, 'store']);
    Route::post('requests/continue-study', [ContinueStudyRequestController::class, 'store']);
    Route::post('requests/stop-study', [StopStudyRequestController::class, 'store']);
    Route::post('requests/going-abroad', [GoingAbroadRequestController::class, 'store']);
    Route::post('requests/not-finished-subject', [NotFinishedSubjectRequestController::class, 'store']);
    Route::post('requests/tuition-exemption', [TuitionExemptionRequestController::class, 'store']);
    Route::post('requests/bus-card', [BusCardRequestController::class, 'store']);
});
