<?php

use App\Http\Controllers\Apps\AbstractAPIController;
use App\Http\Controllers\Apps\AiSensyController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return "This is Test Api from api.php";
});

// Routes for AiSensy
Route::prefix('abstract-api')->controller(AbstractAPIController::class)->group(function () {
    Route::get('/email-validation', 'validateEmail');
    Route::get('/holidays', 'getHolidays');

});

// Routes for AiSensy
Route::prefix('ai-sensy')->controller(AiSensyController::class)->group(function () {
    Route::post('send-template-message', 'sendTemplateMessage');
});
