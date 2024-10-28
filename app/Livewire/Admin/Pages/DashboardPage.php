<?php

namespace App\Livewire\Admin\Pages;

use Livewire\Attributes\Title;
use Livewire\Component;

class DashboardPage extends Component
{
    #[Title('Панель')]
    public function render()
    {
        return view('livewire.admin.pages.dashboard-page');
    }
}
