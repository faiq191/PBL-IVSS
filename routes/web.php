<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\halamanController;

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
    Route::get('/create', [halamanController::class, 'create'])->name('halaman.create');
    Route::get('/edit', [halamanController::class, 'edit'])->name('halaman.edit');
    Route::get('/delete', [halamanController::class, 'delete'])->name('halaman.delete');
    Route::get('/headadmin', [halamanController::class, 'headadmin'])->name('halaman.headadmin');
    Route::get('/login', [halamanController::class, 'login'])->name('halaman.login');
});
