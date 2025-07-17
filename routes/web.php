<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

/*
|
|-------------------------------
| Web Routes
|-------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* ----------------- Web Route User Portal ----------------- */

Route::get('/email-template', [AppController::class, 'emailTemplate']);

Route::middleware('adminLoginCheck')->get('/admin/auth/{any}', [AppController::class, 'admin'])->where('any', '.*')->name('lvs.admin.auth.any');
Route::middleware('adminLoginCheck')->get('/admin/auth', function () { return redirect()->route('lvs.admin.auth.any', 'login'); });
Route::middleware('adminLoginCheck')->get('/admin', [AppController::class, 'admin'])->where('any', '.*')->name('lvs.admin');
Route::middleware('adminLoginCheck')->get('/admin/{any}', [AppController::class, 'admin'])->where('any', '.*')->name('lvs.admin.any');

Route::get('{any}', [AppController::class, 'user'])->where('any', '.*')->name('lvs.user.any');
Route::get('/auth', function () { return redirect()->route('lvs.user.auth.any', 'sign-in'); });
Route::get('/auth/{any}', [AppController::class, 'user'])->where('any', '.*')->name('lvs.user.auth.any');
