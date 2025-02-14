<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\TechnologyController;
use App\Http\Controllers\Api\TypeController;

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

Route::get('/project', [ProjectController::class,'index']);
Route::get('/show/{project}', [ProjectController::class,'show']);

route::post('/leads', [LeadController::class, 'store']);

route::get('/types', [TypeController::class,'index']);

route::get('/technologies', [TechnologyController::class,'index']);

