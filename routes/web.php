<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\halamanController;
use App\Http\Controllers\newsController;
use App\Http\Controllers\UserController;

route::middleware([])->group(function () {
    Route::get('/index', [halamanController::class, 'index'])->name('halaman.index');
    Route::get('/about', [halamanController::class, 'about'])->name('halaman.about');
    Route::get('/research', [halamanController::class, 'research'])->name('halaman.research');
    Route::get('/documents', [halamanController::class, 'documents'])->name('halaman.documents');
    Route::get('/lecturers', [halamanController::class, 'lecturers'])->name('halaman.lecturers');
    Route::get('/students', [halamanController::class, 'students'])->name('halaman.students');
    Route::get('/news', [halamanController::class, 'news'])->name('halaman.news');
    Route::get('/contacts', [halamanController::class, 'contacts'])->name('halaman.contacts');
    Route::get('/admin', [halamanController::class, 'admin'])->name('halaman.admin');
    Route::get('/edit', [halamanController::class, 'edit'])->name('halaman.edit');
    Route::get('/delete', [halamanController::class, 'delete'])->name('halaman.delete');
    Route::get('/headadmin', [halamanController::class, 'headadmin'])->name('halaman.headadmin');

    //CRUD
    Route::get('/create', [halamanController::class, 'create'])->name('halaman.create');
    Route::get('/edit/{id}', [halamanController::class, 'edit'])->name('edit');
    Route::post('/edit/{id}', [halamanController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [halamanController::class, 'delete'])->name('delete');

    // Route untuk store news
    Route::post('/news/store', [newsController::class, 'store'])->name('news.store');

    // Route reggister
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/register', [UserController::class, 'doRegister']);

    // LOGIN & LOGOUT
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'doLogin'])->name('doLogin');
    Route::post('/logout', [UserController::class, 'doLogout'])->name('logout');

    // SAMPLE
    Route::get('/create-sample', [UserController::class, 'createSample']);
});
