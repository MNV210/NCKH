<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\HeadContentsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HistoryMakeTestController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('/categories',CategoryController::class);
Route::apiResource('/contents',ContentController::class);
Route::apiResource('/users',UserController::class);
Route::apiResource('/exercises',ExerciseController::class);
Route::apiResource('/question',QuestionController::class);
Route::apiResource('/head_contents',HeadContentsController::class);
Route::post('/login',[UserController::class,'login']);
Route::apiResource('/blogs',BlogController::class);
Route::apiResource('/history_test',HistoryMakeTestController::class);
Route::post('/history_make_test', [HistoryMakeTestController::class, 'getHistoryByUserId']);

Route::post('/contents/import', [ContentController::class, 'import']);