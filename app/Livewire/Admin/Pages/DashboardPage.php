<?php

namespace App\Livewire\Admin\Pages;

use App\Livewire\Admin\Traits\HasRedirects;
use Livewire\Attributes\Title;
use Livewire\Component as LivewireComponent;

class DashboardPage extends LivewireComponent
{
    use HasRedirects;
    public function mount()
    {
        if(\Auth::user()->isStudent()) {
            return $this->redirectToIndexPage();
        }
    }
    #[Title('Панель')]
    public function render()
    {
        return view('livewire.admin.pages.dashboard-page');
    }
}
