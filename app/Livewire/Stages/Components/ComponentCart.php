<?php

namespace App\Livewire\Stages\Components;

use App\Livewire\Traits\HasSession;
use App\Livewire\Traits\HasUnlockStages;
use App\Models\SessionComponent;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component as LivewireComponent;

class ComponentCart extends LivewireComponent
{
    use HasSession;
    use HasUnlockStages;

    public Collection $cartItems;
    public array $filters;
    public string $clickComponentEvent = '';
    const SETTING_FILTERS_KEY = 'cart_filters';

    public function mount(string $session, string $clickComponentEvent = ''): void
    {
        $this->setSession($session);
        $this->setClickComponentEvent($clickComponentEvent);
        $this->setFilters();
        $this->setCartStageComponent();
        $this->dispatch('cart-init');
    }

    public function changeFilters()
    {
        Log::info('Filters', [$this->filters]);
        $this->setCartStageComponent();
        $this->updateFilterSettings();
    }

    public function render(): View
    {
        return view('livewire.stages.components.component-cart');
    }

    private function setCartStageComponent(): void
    {
        $this->cartItems = $this->getCartItemBuilder()->latest()->get();
        $this->dispatch('cart-init');
    }

    public function getCartItemBuilder(): Builder
    {
        $builder = SessionComponent::with('component');
        $builder->bySession($this->session);
        $builder->inCart();
        if (!$this->getIsCalibratedFilter()) {
            $builder->whereNull('valueStuff');
        }
        if (!$this->getIsWeightedFilter()) {
            $builder->whereNull('valueLoose')->whereNull('valueLiquid');
        }

        return $builder;
    }

    public function getItem($id)
    {
        return SessionComponent::bySession($this->session)->where('id', $id)->first();
    }

    #[On('storage-component-added-in-cart')]
    #[On('session-component-moved-to-weighting-table')]
    #[On('session-component-moved-to-cooking-table')]
    #[On('session-component-moved-to-cart')]
    public function updateList(): void
    {
        $this->setCartStageComponent($this->session);
        $this->checkCookingRoomLock();
    }

    public function removeItem($id): void
    {
        Log::info('ComponentCart::removeItem', [$id]);
        if ($item = $this->getItem($id)) {
            $item->delete();
            $this->setCartStageComponent();
        }
    }

    public function showModalMoveToTableComponent($id): void
    {
        Log::info('ComponentCart::showModalMoveToTable', [$id]);
        if ($this->isShowModalMoveToTable && $item = $this->getItem($id)) {
            $this->dispatch('show-modal-move-to-weighting-table', $id);
        }
    }

    private function setFilters(): void
    {
        $this->setIsCalibratedFilter();
        $this->setIsWeightedFilter();
    }

    private function setIsCalibratedFilter(): void
    {
        $this->filters['is_calibrated'] = $this->getIsCalibratedFilterSetting();
    }

    private function getIsCalibratedFilter(): bool
    {
        return (bool)$this->filters['is_calibrated'];
    }


    private function getIsCalibratedFilterSetting(): bool
    {
        $settings = $this->getFiltersSettings();
        return !isset($settings['is_calibrated']) || (bool)$settings['is_calibrated'];
    }

    private function setIsWeightedFilter(): void
    {
        $this->filters['is_weighted'] = $this->getIsWeightedFilterSetting();
    }

    private function getIsWeightedFilter(): bool
    {
        return (bool)$this->filters['is_weighted'];
    }

    private function getIsWeightedFilterSetting(): bool
    {
        $settings = $this->getFiltersSettings();
        return !isset($settings['is_weighted']) || (bool)$settings['is_weighted'];
    }

    private function updateFilterSettings(): void
    {
        $this->setSessionSetting(self::SETTING_FILTERS_KEY, $this->filters);
    }

    public function getFiltersSettings(): array
    {
        return $this->getSessionSetting(self::SETTING_FILTERS_KEY) ?? [];
    }

    public function setClickComponentEvent(string $clickComponentEvent): void
    {
        $this->clickComponentEvent = $clickComponentEvent;
    }


}

