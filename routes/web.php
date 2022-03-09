<?php

use App\Http\Controllers\DropdownController;
use App\Http\Controllers\SubscriptionController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DropdownController::class, 'index']);
Route::get('/index/getkota/{nama_provinsi}', [DropdownController::class, 'getKota']);
Route::get('/index/getkecamatan/{nama_city}', [DropdownController::class, 'getDistrict']);
Route::get('/index/getdesa/{nama_district}', [DropdownController::class, 'getSubdistrict']);
Route::post('/index', [SubscriptionController::class, 'store']);
