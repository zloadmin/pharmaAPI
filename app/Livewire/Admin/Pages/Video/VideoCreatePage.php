<?php

namespace App\Livewire\Admin\Pages\Video;


use App\Livewire\Admin\Traits\HasBreadcrumb;
use App\Livewire\Admin\Traits\HasRedirects;
use App\Models\PharmacologicalArticle;
use App\Models\Video;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component as LivewireComponent;
use Livewire\WithFileUploads;

class VideoCreatePage extends LivewireComponent
{
    use HasBreadcrumb;
    use HasRedirects;
    use WithFileUploads;

    #[Validate('required|string|max:250')]
    public string $name = '';

    #[Validate('required|file|extensions:mp4,mov,wmv,avi,avchd,flv,f4v,swf,mkv,webm|max:512000')]
    public $file = '';


    public function save(): void
    {
        $this->validate();
        $this->createVideo();
        $this->redirectToVideosPage();
    }

    public function createVideo(): Video
    {
        return Video::create([
            'name'          => $this->name,
            'path'          => $this->file->store('videos'),
            'original_name' => $this->file->getClientOriginalName(),
            'size'          => $this->file->getSize(),
        ]);
    }


    #[Title('Создать')]
    public function render()
    {
        return view('livewire.admin.pages.video.video-create-page')->layoutData([
            'breadcrumb' => $this->getVideoCreatePageBreadcrumb()
        ]);
    }


}
