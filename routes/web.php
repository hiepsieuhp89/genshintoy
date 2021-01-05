<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\genshintoy\indexController;
use App\Http\Controllers\genshintoy\apiController;

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

Route::get('/',[indexController::class,"index"])->name('genshintoy.index');
Route::get('/weapons',[indexController::class,"weapons"])->name('genshintoy.weapons');
Route::get('/artifacts',[indexController::class,"artifacts"])->name('genshintoy.artifacts');
Route::get('/character/{id}',[indexController::class,"character_information"])->name('genshintoy.character_information');

Route::get('/calculate',[indexController::class,"calculateDamage"])->name('genshintoy.calculateDamage');
Route::get('/wish',[indexController::class,"wish"])->name('genshintoy.wish');
Route::post('/wish',[indexController::class,"wishExtract"])->name('wish.extract');

//Route::get('/insertbucutung',[apiController::class,"insertDTB"]);
