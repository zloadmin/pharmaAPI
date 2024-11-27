<?php

use App\Livewire\Admin\Pages\DashboardPage;
use App\Livewire\Admin\Pages\Laboratory\LaboratoryCreatePage;
use App\Livewire\Admin\Pages\Laboratory\LaboratoryEditPage;
use App\Livewire\Admin\Pages\Laboratory\LaboratoriesPage;
use App\Livewire\Admin\Pages\StorageComponent\StorageComponentCreatePage;
use App\Livewire\Admin\Pages\StorageComponent\StorageComponentEditPage;
use App\Livewire\Admin\Pages\StorageComponent\StorageComponentsPage;
use App\Livewire\Stages\IndexStage;
use App\Livewire\Stages\StorageStage\StorageStage;
use App\Livewire\Stages\WeightingStage\WeightingStage;
use App\Models\LaboratorySession;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('index', [
//        'session' => LaboratorySession::start(),
//    ]);
//    return view('welcome');
//});
Route::get('/', function () {
    return redirect()->route('index-stage', LaboratorySession::start());
})->name('start-index-stage');


//Route::get('/', IndexStage::class)->name('index-storage');
Route::get('/stage/index/{session}', IndexStage::class)->name('index-stage');
Route::get('/stage/storage/{session}', StorageStage::class)->name('storage-stage');
Route::get('/stage/weighting/{session}', WeightingStage::class)->name('weighting-stage');

Route::prefix('admin')->group(function () {
    Route::get('/', DashboardPage::class)->name('admin.dashboard-page');

    Route::prefix('components')->group(function () {
        Route::get('/', StorageComponentsPage::class)->name('admin.components-page');
        Route::get('/create', StorageComponentCreatePage::class)->name('admin.component-create-page');
        Route::get('/edit/{storageComponent}', StorageComponentEditPage::class)->name('admin.component-edit-page');
    });
    Route::prefix('laboratories')->group(function () {
        Route::get('/', LaboratoriesPage::class)->name('admin.laboratories-page');
        Route::get('/create', LaboratoryCreatePage::class)->name('admin.laboratory-create-page');
        Route::get('/edit/{laboratory}', LaboratoryEditPage::class)->name('admin.laboratory-edit-page');
    });


});