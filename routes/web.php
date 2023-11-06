<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;

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

Route::get('/revisor/home/', [RevisorController::class, 'index'])->name('revisor.index');

Route::patch('/accetta/annuncio/{article}', [RevisorController::class, 'acceptArticle'])->name('revisor.accept_article');

Route::patch('/rifiuta/annuncio/{article}', [RevisorController::class, 'rejectArticle'])->name('revisor.reject_article');


