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

Route::prefix('definicion-tipos/')->group(function () {
    Route::get('index/', function () {
        return view('defTipos.index', [
            'page' => 'modul',
            'dad_page' => 'definicion-tipos'
        ]);
    })->name('definicion-tipos');

    Route::get('ejemplos/{id}', function () {
        $id = \Request::route('id');
        return view('defTipos.ejemplos.ejemplo', [
            'page' => 'ejemplo',
            'identity' => $id,
            'dad_page' => 'definicion-tipos'
        ]);
    })->name('ejemplos4');
});

Route::prefix('sistema-clases/')->group(function () {
    Route::get('index/', function () {
        return view('clases.index', [
            'page' => 'modul',
            'dad_page' => 'clases'
        ]);
    })->name('clases');

    Route::get('ejemplos/{id}', function () {
        $id = \Request::route('id');
        return view('clases.ejemplos.ejemplo', [
            'page' => 'ejemplo',
            'identity' => $id,
            'dad_page' => 'clases'
        ]);
    })->name('ejemplos5');
});

Route::prefix('listas/')->group(function () {
    Route::get('index/', function () {
        return view('listas.index', [
            'page' => 'listas',
            'dad_page' => 'listas'
        ]);
    })->name('listas');

    Route::get('ejemplos/{id}', function () {
        $id = \Request::route('id');
        return view('listas.ejemplos.ejemplo', [
            'page' => 'ejemplo',
            'identity' => $id,
            'dad_page' => 'listas'
        ]);
    })->name('ejemplos6');
});


Route::prefix('grafos/')->group(function () {
    Route::get('index/', function () {
        return view('grafos.index', [
            'page' => 'grafos',
            'dad_page' => 'grafos'
        ]);
    })->name('grafos');

    Route::get('ejemplos/{id}', function () {
        $id = \Request::route('id');
        return view('grafos.ejemplos.ejemplo', [
            'page' => 'ejemplo',
            'identity' => $id,
            'dad_page' => 'grafos'
        ]);
    })->name('ejemplos8');
});
