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
{{--                             @if($isShowModalMoveToTableComponent)--}}
                                 wire:click="$dispatch('{{ $clickComponentEvent }}', { id: {{ $cartItem->id }} })"
{{--                            @else--}}
{{--                                 wire:click="$dispatch('show-cart-component-modal', { id: {{ $cartItem->id }} })"--}}
{{--                            @endif--}}
                        >
                            <div class="item">
                                <button class="remove_btn" type="button" wire:click="removeItem({{ $cartItem->id }})">
                                    <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_remove"></use></svg>
                                </button>
                                <div class="icons column">
                                    @if($cartItem->is_weighed)
                                        <div class="text">{{ $cartItem->weighed_value }}</div>
                                    @endif
                                </div>
                                <div class="thumb">
                                    <img src="{{ $cartItem->getImageUrl() }}" alt="" loading="lazy">
                                </div>

                                <div class="name">{{ $cartItem->getShortName() }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="swiper-button-prev">
                    <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_arr_hor"></use></svg>
                </button>

                <button class="swiper-button-next">
                    <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_arr_hor"></use></svg>
                </button>
            </div>
        </div>
    </div>
    <div id="lastElem"></div>
</div>



@script
<script>
    $wire.on('cart-init', () => {
        console.log('cart-init');
        setTimeout(initCartSlider, 100);
    });
</script>
@endscript