<?php

use App\Livewire\Stages\StorageStage\StorageStage;
use App\Models\LaboratorySession;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/start-stage-storage', function () {
    return redirect()->route('stage-storage', LaboratorySession::start());
});
Route::get('stage/storage/{session}', StorageStage::class)->name('stage-storage');

