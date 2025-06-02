<?php

use App\Livewire\Admin\Pages\DashboardPage;
use App\Livewire\Admin\Pages\Laboratory\LaboratoryCreatePage;
use App\Livewire\Admin\Pages\Laboratory\LaboratoryEditPage;
use App\Livewire\Admin\Pages\Laboratory\LaboratoriesPage;
use App\Livewire\Admin\Pages\Laboratory\LaboratoryStepCreatePage;
use App\Livewire\Admin\Pages\Laboratory\LaboratoryStepEditPage;
use App\Livewire\Admin\Pages\Laboratory\LaboratoryStepsPage;
use App\Livewire\Admin\Pages\PharmacologicalArticle\PharmacologicalArticleCreatePage;
use App\Livewire\Admin\Pages\PharmacologicalArticle\PharmacologicalArticleEditPage;
use App\Livewire\Admin\Pages\PharmacologicalArticle\PharmacologicalArticlesPage;
use App\Livewire\Admin\Pages\StorageComponent\StorageComponentCreatePage;
use App\Livewire\Admin\Pages\StorageComponent\StorageComponentEditPage;
use App\Livewire\Admin\Pages\StorageComponent\StorageComponentsPage;
use App\Livewire\Admin\Pages\Group\GroupsPage;
use App\Livewire\Admin\Pages\Student\StudentsPage;
use App\Livewire\Admin\Pages\Teacher\TeachersPage;
use App\Livewire\Admin\Pages\Video\VideoCreatePage;
use App\Livewire\Admin\Pages\Video\VideoEditPage;
use App\Livewire\Admin\Pages\Video\VideosPage;
use App\Livewire\IndexPage;
use App\Livewire\LaboratorySession\LaboratorySessionsPage;
use App\Livewire\LoginPage;
use App\Livewire\Stages\ChromatographStage\ChromatographStage;
use App\Livewire\Stages\ChromatographStage\SoftwarePages\ChromatographMethodPage;
use App\Livewire\Stages\ChromatographStage\SoftwarePages\ChromatographResultPage;
use App\Livewire\Stages\ChromatographStage\SoftwarePages\ChromatographSingleSamplePage;
use App\Livewire\Stages\ChromatographStage\SoftwarePages\ChromatographStatusPage;
use App\Livewire\Stages\CookingStage\CookingStage;
use App\Livewire\Stages\IndexStage;
use App\Livewire\Stages\StorageStage\StorageStage;
use App\Livewire\Stages\WeightingStage\WeightingStage;
use App\Livewire\TestPage;
use App\Models\LaboratorySession;
use Illuminate\Support\Facades\Route;

Route::get('/login', LoginPage::class)
    ->middleware('guest')
    ->name('login');
Route::middleware('auth')->group(function () {
    Route::post('logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');
    // all user roles
    Route::get('/', IndexPage::class)->name('index-page');
    Route::get('/test', TestPage::class)->name('test-page');
    Route::get('/stage/index/{session}', IndexStage::class)->name('index-stage');
    Route::get('/stage/storage/{session}', StorageStage::class)->name('storage-stage');
    Route::get('/stage/weighting/{session}', WeightingStage::class)->name('weighting-stage');
    Route::get('/stage/cooking/{session}', CookingStage::class)->name('cooking-stage');
    Route::get('/stage/chromatograph/{session}', ChromatographStage::class)->name('chromatograph-stage');

    Route::get('/stage/chromatograph/{session}/software/status', ChromatographStatusPage::class)->name('chromatograph-status-page');
    Route::get('/stage/chromatograph/{session}/software/method', ChromatographMethodPage::class)->name('chromatograph-method-page');
    Route::get('/stage/chromatograph/{session}/software/single-sample', ChromatographSingleSamplePage::class)->name('chromatograph-single-sample-page');
    Route::get('/stage/chromatograph/{session}/software/result', ChromatographResultPage::class)->name('chromatograph-result-page');


    Route::prefix('dashboard')->group(function () {

        Route::get('/', DashboardPage::class)->name('admin.dashboard-page');

        Route::middleware('role:admin')->group(function () {
            Route::prefix('components')->group(function () {
                Route::get('/', StorageComponentsPage::class)->name('admin.components-page');
                Route::get('/create', StorageComponentCreatePage::class)->name('admin.component-create-page');
                Route::get('/edit/{storageComponent}', StorageComponentEditPage::class)->name('admin.component-edit-page');
            });
            Route::prefix('laboratories')->group(function () {
                Route::get('/', LaboratoriesPage::class)->name('admin.laboratories-page');
                Route::get('/create', LaboratoryCreatePage::class)->name('admin.laboratory-create-page');
                Route::get('/edit/{laboratory}', LaboratoryEditPage::class)->name('admin.laboratory-edit-page');
                Route::get('/edit/{laboratory}/steps', LaboratoryStepsPage::class)->name('admin.laboratory-steps-page');
                Route::get('/edit/{laboratory}/steps/create', LaboratoryStepCreatePage::class)->name('admin.laboratory-step-create-page');
                Route::get('/edit/{laboratory}/steps/edit/{laboratoryStep}', LaboratoryStepEditPage::class)->name('admin.laboratory-step-edit-page');
            });
            Route::prefix('pharmacological-articles')->group(function () {
                Route::get('/', PharmacologicalArticlesPage::class)->name('admin.pharmacological-articles-page');
                Route::get('/create', PharmacologicalArticleCreatePage::class)->name('admin.pharmacological-article-create-page');
                Route::get('/edit/{pharmacologicalArticle}', PharmacologicalArticleEditPage::class)->name('admin.pharmacological-article-edit-page');
            });
            Route::prefix('laboratory-sessions')->group(function () {
                Route::get('/', LaboratorySessionsPage::class)->name('admin.laboratory-sessions');
            });
            Route::get('students', StudentsPage::class)->name('admin.students-page');
            Route::get('teachers', TeachersPage::class)->name('admin.teachers-page');
            Route::get('groups', GroupsPage::class)->name('admin.groups-page');
        });

        Route::middleware('role:admin,teacher')->group(function () {


        });
    });

});


