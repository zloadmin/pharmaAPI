<?php

namespace App\Livewire\Stages\StorageStage;

use App\Livewire\Traits\HasSession;
use App\Models\CartStorageComponent;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\On;

class StorageStageComponentCart extends Component
{
    use HasSession;

    public Collection $cartItems;
    public array $filters;
    const SETTING_FILTERS_KEY = 'cart_filters';

    public function mount(string $session): void
    {
        $this->setSession($session);
        $this->setFilters();
        $this->setCartStageComponent();

    }

    public function changeFilters()
    {
        Log::info('Filters', [$this->filters]);
        $this->setCartStageComponent();
        $this->updateFilterSettings();
    }

    public function render(): View
    {
        return view('livewire.stages.storage-stage.storage-stage-component-cart');
    }

    private function setCartStageComponent(): void
    {
        $this->cartItems = $this->getCartItemBuilder()->latest()->get();
    }

    public function getCartItemBuilder(): Builder
    {
        $builder = CartStorageComponent::with('component');
        $builder->bySession($this->session);
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
        return CartStorageComponent::bySession($this->session)->where('id', $id)->first();
    }

    #[On('storage-component-added-in-cart')]
    public function updatePostList(): void
    {
        $this->setCartStageComponent($this->session);
    }

    public function removeItem($id): void
    {
        if ($item = $this->getItem($id)) {
            $item->delete();
            $this->setCartStageComponent();
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



}

