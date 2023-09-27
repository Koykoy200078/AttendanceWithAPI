<?php

use App\Http\Controllers\Attendance\AllSections;
use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });

Route::get('/', [AllSections::class, 'attendanceFormWeb'])->name('attendance.formWeb');
Route::post('/attendance/web', [AllSections::class, 'storeSectionWeb'])->name('attendance.storeSectionWeb');

Route::get('/register', [AllSections::class, 'registerFormWeb'])->name('attendance.registerFormWeb');
Route::post('/register/web', [AllSections::class, 'registerSectionWeb'])->name('attendance.registerSectionWeb');

Route::get('/09755571948/export', [AllSections::class, 'exportData'])->name('attendance.exportData');
