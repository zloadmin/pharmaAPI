<div class="section on_table" style="min-height: 153px;">
    <div class="head">
        <div class="title">На столе</div>
        <button class="get_all_btn get_all_btn_second" style="margin-left: 10px;" type="button" wire:click="$dispatch('show-modal-mix')">Смешать</button>
        <button class="get_all_btn get_all_btn_second" type="button" wire:click="moveAllCookingTableItemsToCart">Вернуть все</button>
        <button class="get_all_btn" type="button" wire:click="moveAllCartItemsToCookingTable">Взять все</button>
    </div>

    <div class="row">
        @foreach($sessionComponents as $sessionComponent)
            <div data-modal="exhaust_object1_modal"
                 @if($chooseModePlace && $sessionComponent->isCanBeChoose($chooseModePlace))
                     class="item item_force_hover target_component"
                 wire:click="moveToPlace({{ $sessionComponent->id }}, '{{ $chooseModePlace->value }}')"
                 @else
                     class="item"
                 wire:click="showModalCookingTableComponent({{ $sessionComponent->id }})"
                 @endif

            >
                <div class="icons column">
                    @if($sessionComponent->is_weighed)
                        <div class="text">{{ $sessionComponent->weighed_value }}</div>
                    @endif
                </div>
                <div class="thumb">
                    <img src="{{ $sessionComponent->getImageUrl() }}" alt="" loading="lazy">
                </div>
                <div class="name">{{ $sessionComponent->getName() }}</div>
            </div>
        @endforeach
    </div>
</div>