<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrutaController;

Route::get('frutas', [FrutaController::class, 'index']);
Route::post('frutas', [FrutaController::class, 'store']);
Route::get('frutas/{id}', [FrutaController::class, 'show']);
Route::put('frutas/{id}', [FrutaController::class, 'update']);
Route::delete('frutas/{id}', [FrutaController::class, 'destroy']);

Route::get('ping', function () {
    return response()->json(['message' => 'pong']);
});
