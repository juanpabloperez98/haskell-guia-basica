<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('programacion-funcional/')->group(function () {
    Route::get('index/', function () {
        return view('funcional.index', [
            'page' => 'modul'
        ]);
    })->name('funcional');

    Route::get('ejemplo1/', function () {
        return view('funcional.ejemplos.ejemplo', [
            'page' => 'ejemplo',
            'identity' => 1
        ]);
    })->name('ejemplo1');

    Route::get('ejemplo2/', function () {
        return view('funcional.ejemplos.ejemplo', [
            'page' => 'ejemplo',
            'identity' => 2
        ]);
    })->name('ejemplo2');

    Route::get('ejemplo3/', function () {
        return view('funcional.ejemplos.ejemplo', [
            'page' => 'ejemplo',
            'identity' => 3
        ]);
    })->name('ejemplo3');

    Route::get('ejemplo4/', function () {
        return view('funcional.ejemplos.ejemplo', [
            'page' => 'ejemplo',
            'identity' => 4
        ]);
    })->name('ejemplo4');

    Route::get('ejemplo5/', function () {
        return view('funcional.ejemplos.ejemplo', [
            'page' => 'ejemplo',
            'identity' => 5
        ]);
    })->name('ejemplo5');

    Route::get('ejemplo6/', function () {
        return view('funcional.ejemplos.ejemplo', [
            'page' => 'ejemplo',
            'identity' => 6
        ]);
    })->name('ejemplo6');
});
