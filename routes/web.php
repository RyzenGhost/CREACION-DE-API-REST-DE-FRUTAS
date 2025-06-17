<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/db-test', function () {
    try {
        DB::connection()->getPdo();
        return '✅ Conexión exitosa a la base de datos: ' . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        return '❌ Error de conexión: ' . $e->getMessage();
    }
});

