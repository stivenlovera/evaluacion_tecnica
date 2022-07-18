<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
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
    return view('panel.auth.login');
});
Route::get('/login', function () {
    return view('panel.auth.login');
})->name('login');
Route::post('/auth', [AuthController::class, 'auth'])->name('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('usuario')->group(function () {
    Route::get('/', [UsuarioController::class, 'index'])->name('usuario.list');
    Route::get('/data-table', [UsuarioController::class, 'datatable'])->name('usuario.datatable');
    Route::post('/store', [UsuarioController::class, 'store'])->name('usuario.store');
    Route::get('/edit/{id}', [UsuarioController::class, 'edit'])->name('usuario.edit');
    Route::put('/update/{id}', [UsuarioController::class, 'update'])->name('usuario.update');
    Route::delete('/delete/{id}', [UsuarioController::class, 'destroy'])->name('usuario.delete');
});
