<?php

namespace App\Livewire\LaboratorySession;

use App\Livewire\Admin\Traits\HasBreadcrumb;
use App\Models\LaboratorySession;
use App\Models\PharmacologicalArticle;
use Livewire\Attributes\Title;
use Livewire\Component;

class LaboratorySessionsPage extends Component
{
    use HasBreadcrumb;

    #[Title('Сессии')]
    public function render()
    {
        return view('livewire.laboratory-session.laboratory-sessions-page', [
            'sessions' => LaboratorySession::with('laboratory')
                ->withCount('sessionComponents')
                ->latest()->paginate(100)
        ])->layoutData([
            'breadcrumb' => $this->getLaboratorySessionsPageBreadcrumb()
        ]);
    }

}
