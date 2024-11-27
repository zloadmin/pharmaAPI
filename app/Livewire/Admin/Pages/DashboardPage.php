<?php

namespace App\Livewire\Admin\Pages;

use Livewire\Attributes\Title;
use Livewire\Component as LivewireComponent;

class DashboardPage extends LivewireComponent
{
    #[Title('Панель')]
    public function render()
    {
        return view('livewire.admin.pages.dashboard-page');
    }
}
