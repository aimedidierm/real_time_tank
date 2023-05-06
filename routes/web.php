<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TankController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\StatusController;
use Illuminate\Auth\Events\Login;
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

Route::get('/', function () {
    return view('index');
})->name('login');

Route::post('/', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(["prefix" => "admin", "middleware" => ["auth", "isAdmin"], "as" => "admin."], function () {
    Route::resource('/managers', ManagerController::class)->only('index', 'store', 'update', 'destroy');
    Route::resource('/tanks', TankController::class)->only('index', 'store', 'update', 'destroy');
});

Route::group(["prefix" => "manager", "middleware" => ["auth:manager", "isManager"], "as" => "manager."], function () {
    Route::get('/dashboard', [StatusController::class, 'index']);
});
