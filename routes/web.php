<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestimonialController;

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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [TestimonialController::class, 'dashboard'])->name('testimonial.dashboard');
Route::get('/', [TestimonialController::class, 'list']);
Route::post('testimonial', [TestimonialController::class, 'store'])->name('testimonial.store');
Route::get('dashboard/{testimonial}', [TestimonialController::class, 'edit'])->name('testimonial.edit');
Route::put('dashboard/{testimonial}', [TestimonialController::class, 'update'])->name('testimonial.update');



