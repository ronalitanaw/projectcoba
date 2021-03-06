<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\DetaildosenController;
use App\Http\Controllers\ProfildosenController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [ApiController::class, 'authenticate']);
Route::post('created', [ApiController::class, 'insertmitra']);
Route::post('updated/{id}', [ApiController::class, 'editmitra']);
Route::post('delete/{id}', [ApiController::class, 'deletemitra']);

Route::post('create_kjs', [ApiController::class, 'insertkerjasama']);
Route::post('update_kjs/{id}', [ApiController::class, 'editkerjasama']);
Route::post('delete_kjs/{id}', [ApiController::class, 'delete_kjs']);


Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('testmid', [ApiController::class, 'tester']);
});

Route::group(['middleware' => ['adminonly']], function () {
    Route::get('testadmin', [ApiController::class, 'tester']);
    Route::post('profildosens', [ProfildosenController::class, 'store']);
});

Route::group(['middleware' => ['dosenonly']], function () {
    Route::post('detildosens', [DetaildosenController::class, 'store']);
});
