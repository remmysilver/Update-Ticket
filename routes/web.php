<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
route::get('/redirect', [HomeController::class, 'redirect']);
route::get('/view_category', [AdminController::class, 'view_category']);
route::post('/add_category', [AdminController::class, 'add_category']);
route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);
route::get('/view_ticket', [AdminController::class, 'view_ticket']);
route::post('/add_ticket', [AdminController::class, 'add_ticket']);
route::get('/vie_ticket', [AdminController::class, 'vie_ticket']);
route::get('/delete_ticket/{id}', [AdminController::class, 'delete_ticket']);
route::get('/edit_ticket/{id}', [AdminController::class, 'edit_ticket']);
route::post('/edit_ticket_confirm/{id}', [AdminController::class, 'edit_ticket_confirm']);