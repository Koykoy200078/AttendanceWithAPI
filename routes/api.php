<?php

use App\Http\Controllers\Attendance\AllSections;
use App\Http\Controllers\Attendance\AllSectionsAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/all', [AllSectionsAPI::class, 'all']);
Route::get('/student/{search}', [AllSectionsAPI::class, 'search']);
Route::get('/students', [AllSectionsAPI::class, 'searchDate']);

// Route::get('/getGroups', [AllSectionsAPI::class, 'getGroups']);

// Route::post('/attendance/{section}', [AllSectionsAPI::class, 'storeSection'])->name('attendance.storeSection');
// Route::post('/create', [AllSectionsAPI::class, 'create']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
