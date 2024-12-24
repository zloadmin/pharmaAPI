<?php

namespace App\Livewire\Admin\Pages\PharmacologicalArticle;


use App\Livewire\Admin\Traits\HasBreadcrumb;
use App\Livewire\Admin\Traits\HasRedirects;
use App\Models\PharmacologicalArticle;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component as LivewireComponent;
use Livewire\WithFileUploads;

class PharmacologicalArticleCreatePage extends LivewireComponent
{
    use HasBreadcrumb;
    use HasRedirects;
    use WithFileUploads;

    #[Validate('required|string|max:250')]
    public string $name = '';

    #[Validate('required|file|extensions:pdf|max:51200')]
    public $file = '';


    public function save(): void
    {
        $this->validate();
        $article = $this->createPharmacologicalArticle();
        $this->redirectToPharmacologicalArticlesPage();
    }

    public function createPharmacologicalArticle(): PharmacologicalArticle
    {
        return PharmacologicalArticle::create([
            'name' => $this->name,
            'path' => $this->file->store('pharmacological_articles'),
        ]);
    }


    #[Title('Создать')]
    public function render()
    {
        return view('livewire.admin.pages.pharmacological-article.pharmacological-article-create-page')->layoutData([
            'breadcrumb' => $this->getPharmacologicalArticleCreatePageBreadcrumb()
        ]);
    }


}
