<?php

namespace App\Livewire\Admin\Pages\PharmacologicalArticle;

use App\Livewire\Admin\Pages\Laboratory\Traits\HasLaboratoryForm;
use App\Livewire\Admin\Traits\HasBreadcrumb;
use App\Livewire\Admin\Traits\HasRedirects;
use App\Models\Laboratory;
use App\Models\Component;
use App\Models\PharmacologicalArticle;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component as LivewireComponent;
use Livewire\WithFileUploads;

class PharmacologicalArticleEditPage extends LivewireComponent
{
    use HasBreadcrumb;
    use HasRedirects;
    use WithFileUploads;

    public PharmacologicalArticle $pharmacologicalArticle;

    #[Validate('required|string|max:250')]
    public string $name = '';

    #[Validate('nullable|file|extensions:pdf|max:51200')]
    public $file = '';


    public function mount(PharmacologicalArticle $pharmacologicalArticle): void
    {
        $this->pharmacologicalArticle = $pharmacologicalArticle;
        $this->loadFormFields($pharmacologicalArticle);
    }

    public function loadFormFields(PharmacologicalArticle $article): void
    {
        $this->name = $article->name;
    }

    public function save()
    {
        $this->validate();
        $this->updatePharmacologicalArticle();
        $this->redirectToPharmacologicalArticlesPage();
    }

    public function updatePharmacologicalArticle(): void
    {
        $this->pharmacologicalArticle->name = $this->name;
        if ($this->file) {
            $this->pharmacologicalArticle->path = $this->file->store('pharmacological_articles');
        }
        $this->pharmacologicalArticle->save();
    }

    #[Title('Редактировать')]
    public function render()
    {
        return view('livewire.admin.pages.pharmacological-article.pharmacological-article-edit-page')->layoutData([
            'breadcrumb' => $this->getPharmacologicalArticleEditPageBreadcrumb($this->pharmacologicalArticle)
        ]);
    }


}
