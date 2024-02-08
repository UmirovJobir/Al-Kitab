<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\PublisherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('banner/', [BannerController::class, 'index']);

Route::get('category/{category}/', [CategoryController::class, 'show']);
Route::get('category/', [CategoryController::class, 'index']);

Route::get('author/{author}', [AuthorController::class, 'show']);
Route::get('author/', [AuthorController::class, 'index']);

Route::get('publisher/{publisher}', [PublisherController::class, 'show']);
Route::get('publisher/', [PublisherController::class, 'index']);


Route::get('book', [BookController::class, 'index']);
Route::get('book/{book}', [BookController::class, 'show']);
//Route::get('book/{book}', [BookController::class, 'show']);
//Route::get('book/', [BookController::class, 'index']);


Route::get('category/{category}/book/{book}/ebook', [EbookController::class, 'get']);
