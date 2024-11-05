<?php

use App\Livewire\Admin\Pages\DashboardPage;

use App\Livewire\Admin\Pages\StorageComponent\StorageComponentCreatePage;
use App\Livewire\Admin\Pages\StorageComponent\StorageComponentEditPage;
use App\Livewire\Admin\Pages\StorageComponent\StorageComponentsPage;
use App\Livewire\Stages\IndexStage;
use App\Livewire\Stages\StorageStage\StorageStage;
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

Route::prefix('admin')->group(function () {
    Route::get('/', DashboardPage::class)->name('admin.dashboard-page');
    Route::get('/storage-components', StorageComponentsPage::class)->name('admin.storage-components-page');
    Route::get('/storage-components/create', StorageComponentCreatePage::class)->name('admin.storage-component-create-page');
    Route::get('/storage-components/edit/{storageComponent}', StorageComponentEditPage::class)->name('admin.storage-component-edit-page');

});