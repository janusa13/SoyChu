<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\EnvioController;
use App\Http\Controllers\FacturaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('products.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::resource('products', ProductController::class);

Route::resource('sucursals',SucursalController::class);

Route::resource('proveedors',ProveedorController::class);

Route::resource('envios', EnvioController::class);

Route::get('/sucursal',[SucursalController::class,'index'])->name('sucursal.index');

Route::get('/proveedor',[ProveedorController::class,'index']);

Route::get('/factura',[FacturaController::class,'create'])->name('factura.create');

Route::post('/factura/ingreso',[FacturaController::class,'store'])->name('factura.store');

});

require __DIR__.'/auth.php';
