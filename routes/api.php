<?php

use App\Http\Controllers\articleController;
use App\Http\Controllers\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/pays', function(){

    //$tb = array("RDC", "Bresil", "France", "Chine", "canada");
    //return $tb;

    $pays = [
       ["nom"=>"RDC", "capital"=>"kinshasa"],
       ["nom"=>"Gabon", "Capitale"=>"Libreville"],
       ["nom"=>"Angola", "Capitale"=>"Luanda"]
    ];

    return $pays;
    
});


Route::apiResource('/articles', articleController::class);
Route::apiResource('/comments', CommentController::class);



