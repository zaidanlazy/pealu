    <?php

use App\Http\Controllers\AlumniController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('beranda');
    });
    Route::get('/tentangsmkn1', function () {
        return view('tentangsmkn1');
    });

    Route::get('/welcome', function () {
        return view('welcome');
    });

    Route::get('/alumni', function () {
        return view('alumni');
    });

    Route::get('/home', function () {
        return view('home');
    });

    Route::get('/app', function () {
        return view('layouts.app');
    });

    Route::get('/berita', function () {
        return view('layouts.berita');
    });
    

    Auth::routes();

        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('alumni', App\Http\Controllers\AlumniController::class);

    Route::get('/alumni/pdf/{id}', [AlumniController::class, 'create'])->name('alumni.create');


    //Route::get('/alumni', [AlumniController::class, 'index']);

    //Route::get('/alumni/create', [AlumniController::class, 'create'])->name('alumni.create');
   