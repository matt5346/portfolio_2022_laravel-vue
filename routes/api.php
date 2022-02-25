<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\PortfolioController;
use App\Http\Controllers\API\PortfolioRuController;
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

//PORTFOLIO
//PORTFOLIO
//PORTFOLIO
Route::post('/portfolio', [PortfolioController::class, 'store']);
Route::get('/portfolio', [PortfolioController::class, 'index']);
Route::get('/portfolio/{id}', [PortfolioController::class, 'getPortfolioById']);
Route::put('/portfolio/{id}', [PortfolioController::class, 'update']);
Route::delete('/portfolio/{id}', [PortfolioController::class, 'destroy']);

//PORTFOLIO RU
//PORTFOLIO RU
//PORTFOLIO RU
Route::post('/ru/portfolio', [PortfolioRuController::class, 'store']);
Route::get('/ru/portfolio', [PortfolioRuController::class, 'index']);
Route::get('/ru/portfolio/{id}', [PortfolioRuController::class, 'getPortfolioById']);
Route::put('/ru/portfolio/{id}', [PortfolioRuController::class, 'update']);
Route::delete('/ru/portfolio/{id}', [PortfolioRuController::class, 'destroy']);