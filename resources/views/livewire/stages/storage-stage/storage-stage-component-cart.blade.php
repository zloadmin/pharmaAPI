<div class="bottom" id="cardBlock">
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
                        <div class="swiper-slide visible swiper-slide-fully-visible active" style="margin-right: 16px;">
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
{{--                    <div class="swiper-slide">--}}
{{--                        <div class="item">--}}
{{--                            <div class="thumb">--}}
{{--                                <img src="/web/images/tmp/warehouse_item_thumb1.png" alt="" loading="lazy">--}}
{{--                            </div>--}}

{{--                            <div class="name">Мерный цилиндр</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="swiper-slide">--}}
{{--                        <div class="item">--}}
{{--                            <div class="thumb">--}}
{{--                                <img src="/web/images/tmp/warehouse_item_thumb2.png" alt="" loading="lazy">--}}
{{--                            </div>--}}

{{--                            <div class="name">Закрытый бюкс</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="swiper-slide">--}}
{{--                        <div class="item">--}}
{{--                            <button class="remove_btn">--}}
{{--                                <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_remove"></use></svg>--}}
{{--                            </button>--}}

{{--                            <div class="thumb">--}}
{{--                                <img src="/web/images/tmp/warehouse_item_thumb3.png" alt="" loading="lazy">--}}
{{--                            </div>--}}

{{--                            <div class="name">Мерная колба</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="swiper-slide">--}}
{{--                        <div class="item">--}}
{{--                            <div class="thumb">--}}
{{--                                <img src="/web/images/tmp/warehouse_item_thumb4.png" alt="" loading="lazy">--}}
{{--                            </div>--}}

{{--                            <div class="name">Емкость воды очищ</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="swiper-slide">--}}
{{--                        <div class="item">--}}
{{--                            <div class="thumb">--}}
{{--                                <img src="/web/images/tmp/warehouse_item_thumb5.png" alt="" loading="lazy">--}}
{{--                            </div>--}}

{{--                            <div class="name">Крышка бюкса</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="swiper-slide">--}}
{{--                        <div class="item">--}}
{{--                            <div class="icons">--}}
{{--                                <div>--}}
{{--                                    <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_scales"></use></svg>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="thumb">--}}
{{--                                <img src="/web/images/tmp/warehouse_item_thumb6.png" alt="" loading="lazy">--}}
{{--                            </div>--}}

{{--                            <div class="name">Открытый бюкс</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="swiper-slide">--}}
{{--                        <div class="item">--}}
{{--                            <div class="icons">--}}
{{--                                <div>--}}
{{--                                    <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_scales"></use></svg>--}}
{{--                                </div>--}}

{{--                                <div>--}}
{{--                                    <img src="/web/images/ic_drop.png" alt="" class="icon" loading="lazy">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="thumb">--}}
{{--                                <img src="/web/images/tmp/warehouse_item_thumb6.png" alt="" loading="lazy">--}}
{{--                            </div>--}}

{{--                            <div class="name">Открытый бюкс</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="swiper-slide">--}}
{{--                        <div class="item">--}}
{{--                            <div class="icons">--}}
{{--                                <div>--}}
{{--                                    <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_scales"></use></svg>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="thumb">--}}
{{--                                <img src="/web/images/tmp/warehouse_item_thumb6.png" alt="" loading="lazy">--}}
{{--                            </div>--}}

{{--                            <div class="name">Открытый бюкс</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="swiper-slide">--}}
{{--                        <div class="item">--}}
{{--                            <div class="icons">--}}
{{--                                <div>--}}
{{--                                    <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_scales"></use></svg>--}}
{{--                                </div>--}}

{{--                                <div>--}}
{{--                                    <img src="/web/images/ic_drop.png" alt="" class="icon" loading="lazy">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="thumb">--}}
{{--                                <img src="/web/images/tmp/warehouse_item_thumb6.png" alt="" loading="lazy">--}}
{{--                            </div>--}}

{{--                            <div class="name">Открытый бюкс</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>

{{--                <button class="swiper-button-prev">--}}
{{--                    <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_arr_hor"></use></svg>--}}
{{--                </button>--}}

{{--                <button class="swiper-button-next">--}}
{{--                    <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_arr_hor"></use></svg>--}}
{{--                </button>--}}
            </div>
        </div>
    </div>
    <div id="lastElem"></div>
</div>


