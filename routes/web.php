<?php

use App\Http\Controllers\ClassesControlle;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

// Route::get('/', function () {
//     return view('Welcome', [
//         "title" => "Welcome"
//     ]);
// });

// Route::get('/add', function () {
//     return view('students.add');
// });

Route::middleware(['auth'])->group(function () {
    Route::prefix('/dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/about', [DashboardController::class, 'about'])->name('dashboard.about');
        Route::get('/kelas', [DashboardController::class, 'showKelas'])->name('dashboard.kelas');
        Route::post('/logout', [LoginController::class, 'logout'])->name('dashboard.logout');
        Route::prefix('/students')->group(function () {
            Route::get('/all', [DashboardController::class, 'showStudents'])->name('dashboard.students.all');
            Route::get('/add', [DashboardController::class, 'add'])->name('dashboard.students.add');
            Route::post('/store', [DashboardController::class, 'store'])->name('dashboard.students.store');
            Route::delete('/{student}', [DashboardController::class, 'delete'])->name('dashboard.students.delete');
            Route::get('/{student}/edit', [DashboardController::class, 'edit'])->name('dashboard.students.edit');
            Route::patch('/{student}', [DashboardController::class, 'update'])->name('dashboard.students.update');
            Route::get('/{student}', [DashboardController::class, 'show'])->name('dashboard.students.show');
        });
    });
});


Route::group(['/students'], function () {
    Route::get('/', [StudentController::class, 'index'])->name('students.index');
    Route::get('/{student}', [StudentController::class, 'show'])->name('students.show');
});

Route::group(['prefix' => '/classes'], function () {
    Route::get('/all', [ClassesController::class, 'index'])->name('classes.index');
    Route::get('/add', [ClassesController::class, 'add'])->name('classes.add');
    Route::post('/add/store', [ClassesController::class, 'added'])->name('classes.add.store');
});

Route::middleware(['guest'])->group(function () {
    Route::prefix('/login')->group(function () {
        Route::get('/user', [LoginController::class, 'index'])->name('login.index');
        Route::post('/store', [LoginController::class, 'store'])->name('login.store');
    });
    Route::prefix('/register')->group(function () {
        Route::get('/user', [RegisterController::class, 'index'])->name('register.index');
        Route::post('/store', [RegisterController::class, 'store'])->name('register.store');
    });
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
