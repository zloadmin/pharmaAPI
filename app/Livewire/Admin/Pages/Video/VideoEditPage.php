<?php

namespace App\Livewire\Admin\Pages\Video;

use App\Livewire\Admin\Pages\Laboratory\Traits\HasLaboratoryForm;
use App\Livewire\Admin\Traits\HasBreadcrumb;
use App\Livewire\Admin\Traits\HasRedirects;
use App\Models\Laboratory;
use App\Models\Component;
use App\Models\PharmacologicalArticle;
use App\Models\Video;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component as LivewireComponent;
use Livewire\WithFileUploads;

class VideoEditPage extends LivewireComponent
{
    use HasBreadcrumb;
    use HasRedirects;
    use WithFileUploads;

    public Video $video;

    #[Validate('required|string|max:250')]
    public string $name = '';

    #[Validate('nullable|file|extensions:mp4,mov,wmv,avi,avchd,flv,f4v,swf,mkv,webm|max:512000')]
    public $file = '';


    public function mount(Video $video): void
    {
        $this->video = $video;
        $this->loadFormFields($video);
    }

    public function loadFormFields(Video $video): void
    {
        $this->name = $video->name;
    }

    public function save(): void
    {
        $this->validate();
        $this->updateVideo();
        $this->redirectToVideosPage();
    }

    public function updateVideo(): void
    {
       
        $this->video->name = $this->name;
        if ($this->file) {
            $this->video->path = $this->file->store('pharmacological_articles');
            $this->video->original_name = $this->file->getClientOriginalName();
            $this->video->size = $this->file->getSize();
        }
        $this->video->save();
    }

    #[Title('Редактировать')]
    public function render()
    {
        return view('livewire.admin.pages.video.video-edit-page')->layoutData([
            'breadcrumb' => $this->getVideoEditPageBreadcrumb($this->video)
        ]);
    }


}
