<?php

use App\Http\Controllers\MaklerCrawlerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MaklerCrawlerController::class, 'index']);
Route::get('/full', [MaklerCrawlerController::class, 'fullDescriptions']);
