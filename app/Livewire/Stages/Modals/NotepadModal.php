<?php

namespace App\Livewire\Stages\Modals;

use App\Livewire\Traits\HasSession;
use Livewire\Attributes\On;
use Livewire\Component;

class NotepadModal extends Component
{
    use HasSession;

    public $isShow = false;
    public $notepad_text;
    public $text = '';

    public function mount($session)
    {
        $this->init($session);
    }

    public function init($session): void
    {
        $this->setSession($session);
        $this->setNotepadText();
        $this->setText();
    }

    #[On('show-modal-notepad')]
    public function showModal(): void
    {
        $this->isShow = true;
    }
    #[On('hide-modal-notepad')]
    public function hideModal(): void
    {
        $this->isShow = false;
    }
    public function addText(): void
    {
        if ($this->text) {
            $this->sessionModel->update([
                'notepad_text' => $this->notepad_text . PHP_EOL . $this->text
            ]);
        }
        $this->init($this->session);

    }

    public function render()
    {
        return view('livewire.stages.modals.notepad-modal');
    }

    private function setNotepadText(): void
    {
        $this->notepad_text = $this->sessionModel->notepad_text ?? '';
    }

    private function setText()
    {
        $this->text = '';
    }
}
