<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClaimController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/about', function () {
    return view('about', [
        'name' => 'นางสาวธนภรณ์ พรโคกกรวด',
        'date' => '1 มิถุนายน 2547',
    ]);
})->name('about');

Route::get('/blog', [BlogController::class, 'index'])->name('blog2');
Route::get('/blog2', [AdminController::class, 'blog2'])->name('blog2');

Route::get('/from', [BlogController::class, 'create'])->name('from');

Route::post('/insert', [BlogController::class, 'store'])->name('insert');

Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();

        return "เชื่อมต่อฐานข้อมูลสำเร็จ : "
            . DB::connection()->getDatabaseName();

    } catch (\Exception $e) {

        return "เชื่อมต่อฐานข้อมูลไม่สำเร็จ : "
            . $e->getMessage();
    }
});


Route::get('/student/{id}', function ($id) {
    return view('student', ['id' => $id]);
})->name('student.profile');

Route::get('/claim', [ClaimController::class, 'create'])->name('claim.create');
Route::post('/claim', [ClaimController::class, 'store'])->name('claim.store');




Route::get('/blog/{id}/status', [AdminController::class, 'change'])->name('blog.changeStatus');
Route::get('/change/{id}', [AdminController::class, 'change'])->name('change');

Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');


Route::get('/blog/{id}/delete', [BlogController::class, 'delete'])->name('blog.delete');
Route::get('/delete/{id}', [BlogController::class, 'delete'])->name('delete');



Route::fallback(function () {
    return 'ไม่พบหน้าเว็บ';
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');