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

use App\Custom\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('programacion-funcional/')->group(function () {
    Route::get('index/', function () {
        return view('funcional.index', [
            'page' => 'modul',
            'dad_page' => 'programacion-funcional'
        ]);
    })->name('funcional');

    Route::get('ejemplos/{id}', function () {
        $id = \Request::route('id');
        return view('funcional.ejemplos.ejemplo', [
            'page' => 'ejemplo',
            'identity' => $id,
            'dad_page' => 'programacion-funcional'
        ]);
    })->name('ejemplos');
});

Route::prefix('introduccion-haskell/')->group(function () {
    Route::get('index/', function () {
        return view('intro.index', [
            'page' => 'modul',
            'dad_page' => 'introduccion-haskell'
        ]);
    })->name('introhaskell');

    Route::get('ejemplos/{id}', function () {
        $id = \Request::route('id');
        return view('intro.ejemplos.ejemplo', [
            'page' => 'ejemplo',
            'identity' => $id,
            'dad_page' => 'introduccion-haskell'
        ]);
    })->name('ejemplos2');
});

Route::prefix('funciones-orden-superior/')->group(function () {
    Route::get('index/', function () {
        return view('orden.index', [
            'page' => 'modul',
            'dad_page' => 'funciones-orden-superior'
        ]);
    })->name('orden-superior');

    Route::get('ejemplos/{id}', function () {
        $id = \Request::route('id');
        return view('orden.ejemplos.ejemplo', [
            'page' => 'ejemplo',
            'identity' => $id,
            'dad_page' => 'funciones-orden-superior'
        ]);
    })->name('ejemplos3');
});
