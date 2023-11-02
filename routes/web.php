<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PublicController::class, 'welcome'])->name('welcome');

Route::get('/article/create', [PublicController::class, 'create'])->name('article.form-create');

Route::get('/category/show/{category}', [PublicController::class, 'categoryShow'])->name('categoryShow');

Route::get('/article/detail/{article}', [PublicController::class, 'articleDetail'])->name('article.detail');


