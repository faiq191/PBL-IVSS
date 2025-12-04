<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\halamanController;
use App\Http\Controllers\UserController;

 //PUBLIC ROUTES

Route::get('/index', [halamanController::class, 'index'])->name('halaman.index');
Route::get('/about', [halamanController::class, 'about'])->name('halaman.about');
Route::get('/research', [halamanController::class, 'research'])->name('halaman.research');
Route::get('/documents', [halamanController::class, 'documents'])->name('halaman.documents');
Route::get('/lecturers', [halamanController::class, 'lecturers'])->name('halaman.lecturers');
Route::get('/students', [halamanController::class, 'students'])->name('halaman.students');
Route::get('/news', [halamanController::class, 'news'])->name('halaman.news');
Route::get('/contacts', [halamanController::class, 'contacts'])->name('halaman.contacts');

// ROUTE UNTUK BERITA, RESEARCH DAN DOKUMENTASI

Route::get('/research/{id}', [halamanController::class, 'researchDetail'])
    ->name('research.detail');

Route::get('/documents/{id}', [halamanController::class, 'documentDetail'])
    ->name('documents.detail');

Route::get('/news/{id}', [halamanController::class, 'newsDetail'])
    ->name('news.detail');


//AUTH ROUTES (Login & Register)

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'doRegister']);

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'doLogin'])->name('doLogin');
Route::post('/logout', [UserController::class, 'doLogout'])->name('logout');

Route::get('/create-sample', [UserController::class, 'createSample']);

// PROTECTED ROUTES (Only logged-in users)
Route::middleware(['auth', 'role:admin_berita,admin_kepala'])->group(function () {

    Route::get('/admin', [halamanController::class, 'admin'])->name('halaman.admin');

    Route::get('/create', [halamanController::class, 'create'])->name('halaman.create');
    Route::post('/store', [halamanController::class, 'store'])->name('halaman.store');

    Route::get('/edit/{type}/{id}', [halamanController::class, 'edit'])->name('halaman.edit');
    Route::put('/update/{id}/{type}', [halamanController::class, 'update'])->name('halaman.update');
    Route::delete('/delete/{id}/{type}', [halamanController::class, 'delete'])->name('halaman.delete');
});

// HEADADMIN ONLY

Route::middleware(['auth', 'role:admin_kepala'])->group(function () {
    Route::get('/headadmin', [halamanController::class, 'headadmin'])->name('halaman.headadmin');

    // APPROVE user
    Route::post('/approve/{id}', [UserController::class, 'approve'])->name('user.approve');

    // REJECT user
    Route::post('/reject/{id}', [UserController::class, 'reject'])->name('user.reject');


    Route::delete('/members/{id}', [UserController::class, 'destroy'])->name('members.destroy');
});

