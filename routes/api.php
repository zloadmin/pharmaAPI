<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\TeacherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthController::class, 'login']);
    });
    // Auth
    Route::middleware('auth:sanctum')->group(function () {

        // Admin
        Route::prefix('admin')->middleware('role:admin')->group(function () {

            // Teachers
            Route::prefix('teacher')->group(function () {
                Route::get('/', [TeacherController::class, 'list']);
                Route::get('{teacher}', [TeacherController::class, 'show']);
                Route::post('create', [TeacherController::class, 'store']);
                Route::put('update/{teacher}', [TeacherController::class, 'update']);
                Route::delete('delete/{teacher}', [TeacherController::class, 'delete']);
            });
            // Students
            Route::prefix('student')->group(function () {
                Route::get('/', [StudentController::class, 'list']);
                Route::get('{student}', [StudentController::class, 'show']);
                Route::post('create', [StudentController::class, 'store']);
                Route::put('update/{student}', [StudentController::class, 'update']);
                Route::delete('delete/{student}', [StudentController::class, 'delete']);
            });


        });
    });
});