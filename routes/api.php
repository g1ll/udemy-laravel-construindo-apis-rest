<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\Api\Test;

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

Route::get('test',[Test::class,'test']);

Route::get('/teste',function(Request $request){
//    dd($request->headers->all());//Mostrando o cabeçalho
    dd($request->headers->get('Authorization')); //Mostrando uma chave específica do cabeçalho
    $response = new \Illuminate\Http\Response(json_encode(['msg'=>'Minha primeira resposta de api!']));
    $response->header('Content-Type','application/json');//MymeType JSON
    return $response;
});
