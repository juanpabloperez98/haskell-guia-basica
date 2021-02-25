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
            'page' => 'modul'
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
        return view('introhaskell.index', [
            'page' => 'modul'
        ]);
    })->name('introhaskell');

    Route::get('ejemplos/{id}', function () {
        $id = \Request::route('id');
        return view('introhaskell.ejemplos.ejemplo', [
            'page' => 'ejemplo',
            'identity' => $id,
            'dad_page' => 'introduccion-haskell'
        ]);
    })->name('ejemplos2');
});
