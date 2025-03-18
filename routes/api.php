<?php

use App\Http\Controllers\articleController;
use App\Http\Controllers\CommentController;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/articles', [articleController::class, 'index']);
    Route::apiResource('/comments', CommentController::class);
});



Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json([
            'Message erreur :' => 'Email ou mot de passe incorrect'
        ]);
    }

    $token = $user->createToken($request->email)->plainTextToken;
    $user->token =$token;

    return response()->json([
        'token' => $user
    ]);
});

