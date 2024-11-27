<div class="bottom_panel" id="cardBlock">
    <div class="cont">
        <div class="data">
            <div class="filter">
                <div class="title">Фильтры</div>

                <div class="field">
                    <label class="checkbox">
                        <input type="checkbox" wire:model="filters.is_calibrated" wire:change="changeFilters">
                        <div class="check"></div>
                        <div>тарированные</div>
                    </label>
                </div>

                <div class="field">
                    <label class="checkbox">
                        <input type="checkbox" wire:model="filters.is_weighted" wire:change="changeFilters">
                        <div class="check"></div>
                        <div>взвешенные</div>
                    </label>
                </div>
            </div>

            <div class="swiper" id="swiper">
                <div class="swiper-wrapper">
                    @foreach($cartItems as $cartItem)
                        <div class="swiper-slide visible swiper-slide-fully-visible active" style="margin-right: 16px;"
                             @if($isShowModalMoveToTableComponent)
                                 wire:click="$dispatch('show-modal-move-to-table-component', { id: {{ $cartItem->id }} })"
                            @endif
                        >
                            <div class="item">
                                <button class="remove_btn" type="button" wire:click="removeItem({{ $cartItem->id }})">
                                    <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_remove"></use></svg>
                                </button>
                                <div class="thumb">
                                    <img src="{{ $cartItem->component->image_url }}" alt="" loading="lazy">
                                </div>

                                <div class="name">{{ $cartItem->component->short_name }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div id="lastElem"></div>
</div>


