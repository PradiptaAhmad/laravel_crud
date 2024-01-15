<?php

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
Route::get('/students/add', [StudentController::class, 'add'])->name('students.add'); // Menambahkan nama rute 'students.store'
Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');
Route::delete('/students/{student}', [StudentController::class, 'delete'])->name('students.delete');
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::patch('/students/{student}', [StudentController::class, 'update'])->name('students.update');
