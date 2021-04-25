<?php

use Illuminate\Support\Facades\Route;
use Jiminny\Solution\Controller\SolutionController;

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

Route::get('/solution', [SolutionController::class, 'calculateActiveAudioDuration']);
