<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PricingTemplateController;
use App\Http\Controllers\Api\AbTestController;
use App\Http\Controllers\Api\AnalyticsDataController;

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

// Public routes for registration and login
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Protected routes using Sanctum middleware
Route::middleware(['auth:sanctum'])->group(function () {
    // Logout route
    Route::post('logout', [AuthController::class, 'logout']);

    // Pricing template management routes
    Route::resource('pricing-templates', PricingTemplateController::class)->except(['create', 'edit']);

    // A/B test management routes
    Route::resource('ab-tests', AbTestController::class)->except(['create', 'edit']);

    // Analytics data management routes
    Route::resource('analytics-data', AnalyticsDataController::class)->except(['create', 'edit']);
});
