<?php

use App\Livewire\Stages\StorageStage\StorageStage;
use App\Models\LaboratorySession;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('stage-store', LaboratorySession::start());
});
Route::get('stage/storage/{session}', StorageStage::class)->name('stage-store');