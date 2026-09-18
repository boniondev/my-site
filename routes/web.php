<?php

/**
 * This Source Code does not contain AI generated code.
 * If downstream edits involve AI generated code, please update or remove this header.
 * 
 * Copyright © 2026 boniondev
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\QAController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('landing'); })->name('landing');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/qa', [QAController::class, 'index'])->name('qa.index');
Route::post('/qa', [QAController::class, 'store'])->name('qa.store');
Route::get('/pgp', function () { return view('pgp'); })->name('pgp');
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->name('login.store')->middleware('throttle:3,1');
Route::delete('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('login.destroy');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () { return view('admin.dashboard'); })->name('dashboard');
    Route::get('/projects', [ProjectController::class, 'adminIndex'])->name('projects.index');
    //Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    //Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
    //Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    Route::get('/qa', [QAController::class, 'adminIndex'])->name('qa.index');
    Route::put('/qa/{qa}', [QAController::class, 'update'])->name('qa.update');
    Route::delete('/qa/{qa}', [QAController::class, 'destroy'])->name('qa.destroy');
});