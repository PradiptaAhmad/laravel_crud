<?php

use App\Http\Controllers\ClassesControlle;
use App\Http\Controllers\ClassesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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
//     return view('main');
// });

Route::get('/home', function () {
    return view('Home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('About', [
        "title" => "About",
        "nama" => "Ahmad Pradipta",
        "kelas" => "XI PPLG 2",
        "photo" => "img/adip.jpg"
    ]);
});

Route::get('/students', [StudentController::class, 'index'])->name('students.index');

Route::get('/', function () {
    return view('Welcome', [
        "title" => "Welcome"
    ]);
});

// Route::get('/add', function () {
//     return view('students.add');
// });
Route::group(['prefix' => '/students'], function () {
    Route::get('/add', [StudentController::class, 'add'])->name('students.add');
    Route::post('/store', [StudentController::class, 'store'])->name('students.store');
    Route::delete('/{student}', [StudentController::class, 'delete'])->name('students.delete');
    Route::get('/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::patch('/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::get('/{student}', [StudentController::class, 'show'])->name('students.show');
});

Route::group(['prefix' => '/classes'], function () {
    // Route::get('/', [ClassesController::class, 'index'])->name('classes.index');
    Route::get('/add', [ClassesController::class, 'add'])->name('classes.add');
    Route::post('/add/store', [ClassesController::class, 'added'])->name('classes.add.store');
    // Route::post('/store', [ClassesController::class, 'store'])->name('classes.store');
    // Route::delete('/{class}', [ClassesController::class, 'delete'])->name('classes.delete');
    // Route::get('/{class}/edit', [ClassesController::class, 'edit'])->name('classes.edit');
});
