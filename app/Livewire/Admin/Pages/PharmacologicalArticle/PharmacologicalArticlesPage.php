<?php

namespace App\Livewire\Admin\Pages\PharmacologicalArticle;

use App\Livewire\Admin\Traits\HasBreadcrumb;
use App\Models\Laboratory;
use App\Models\PharmacologicalArticle;
use Livewire\Attributes\Title;
use Livewire\Component as LivewireComponent;

class PharmacologicalArticlesPage extends LivewireComponent
{
    use HasBreadcrumb;

    #[Title('Фармакологические статьи')]
    public function render()
    {
        return view('livewire.admin.pages.pharmacological-article.pharmacological-articles', [
            'articles' => PharmacologicalArticle::query()->latest()->paginate()
        ])->layoutData([
            'breadcrumb' => $this->getPharmacologicalArticlesPageBreadcrumb()
        ]);
    }
    public function delete($id): void
    {
        $article = PharmacologicalArticle::find($id);
        $article?->delete();
    }
}
