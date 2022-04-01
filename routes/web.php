<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect('/login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::get('/admin/funcionarios/novo',[App\Http\Controllers\FuncionariosController::class,'new'])->name('funcionario_new');
    Route::get('/admin/funcionarios',[App\Http\Controllers\FuncionariosController::class,'index'])->name('funcionario_index');
    Route::post('/admin/funcionarios',[App\Http\Controllers\FuncionariosController::class,'store'])->name('funcionario_store');
    Route::put('/admin/funcionarios/{id}',[App\Http\Controllers\FuncionariosController::class,'edit'])->name('funcionario_edit');
    Route::get('/admin/funcionarios/show/{id}',[App\Http\Controllers\FuncionariosController::class,'show'])->name('funcionario_show');
    Route::delete('/funcionarios/del/{id}',[App\Http\Controllers\FuncionariosController::class,'destroy'])->name('funcionario_destroy');

    Route::get('/admin/empresas/novo',[App\Http\Controllers\EmpresasController::class,'new'])->name('empresa_new');
    Route::get('/admin/empresas',[App\Http\Controllers\EmpresasController::class,'index'])->name('empresa_index');
    Route::post('/admin/empresas',[App\Http\Controllers\EmpresasController::class,'store'])->name('empresa_store');
    Route::put('/admin/empresas/{id}',[App\Http\Controllers\EmpresasController::class,'update'])->name('empresa_edit');
    Route::get('/admin/empresas/show/{id}',[App\Http\Controllers\EmpresasController::class,'show'])->name('empresa_show');
    Route::delete('/empresas/del/{id}',[App\Http\Controllers\EmpresasController::class,'destroy'])->name('empresa_destroy');
});


