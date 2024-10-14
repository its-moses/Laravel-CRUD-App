<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\relationCOntroller;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('postapidata', [relationCOntroller::class , 'addDBdata']);

Route::put('putapidata/{id?}' , [relationCOntroller::class , 'updateDBdata']);

Route::get('getapidata/{id?}' , [relationCOntroller::class , 'getDBdata']);

Route::delete('deleteapidata/{id?}' , [relationCOntroller::class , 'deleteDBdata']);

Route::get('searchapidata/{name}' , [relationCOntroller::class , 'searchDBdata']);