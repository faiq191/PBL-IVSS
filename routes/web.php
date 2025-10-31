<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\halamanController;

route::middleware([])->group(function () {
    Route::get('/index', [halamanController::class, 'index'])->name('halaman.index');
});
