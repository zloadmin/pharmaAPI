<?php

namespace App\Livewire\Admin\Pages\Video;

use App\Livewire\Admin\Traits\HasBreadcrumb;
use App\Models\Laboratory;
use App\Models\PharmacologicalArticle;
use App\Models\Video;
use Livewire\Attributes\Title;
use Livewire\Component as LivewireComponent;

class VideosPage extends LivewireComponent
{
    use HasBreadcrumb;

    #[Title('Видео')]
    public function render()
    {
        return view('livewire.admin.pages.video.videos', [
            'videos' => Video::query()->latest()->paginate()
        ])->layoutData([
            'breadcrumb' => $this->getVideosPageBreadcrumb()
        ]);
    }
    public function delete($id): void
    {
        $article = Video::find($id);
        $article?->delete();
    }
}
