<div class="exhaust_modal object_modal big" id="mixer_modal" style="display: {{ $isShow ? 'block' : 'none' }}">
    @if ($isShow)
        <button class="close_btn" type="button" wire:click="$dispatch('hide-modal-mixer')">
            <svg class="icon">
                <use xlink:href="/web/images/sprite.svg#ic_close"></use>
            </svg>
        </button>

        <div class="title">Взаимойдествие с мешалкой</div>
        @if ($sessionComponent)
            <div class="border">
                <button class="remove_btn" type="button" wire:click="moveToCookingTable('{{ $sessionComponent->place }}')">
                    <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_remove"></use></svg>
                </button>

                <div class="name">{{ $sessionComponent->component->name }}</div>

                <div class="overflow">
                    <div class="thumb">
                        <img src="{{ $sessionComponent->component->image_url }}" alt="" loading="lazy">
                    </div>

                    <div class="type">Тип: <span>{{ $sessionComponent->component->type->label() }}</span></div>
                </div>

                <div class="status">
                    <div class="label">Статус:</div>
                    <div class="val">???</div>
                </div>
            </div>
            <div class="bottom">
                <div class="progress">
                    <div style="width: 50%;"></div>
                </div>

                <div class="range time">
                    <div class="label">Время (сек)</div>

                    <span class="irs irs--flat js-irs-2 irs-with-grid"><span class="irs"><span class="irs-line"
                                                                                               tabindex="0"></span><span
                                    class="irs-min" style="visibility: visible;">10</span><span class="irs-max"
                                                                                                style="visibility: visible;">120</span><span
                                    class="irs-from" style="visibility: hidden;">0</span><span class="irs-to"
                                                                                               style="visibility: hidden;">0</span><span
                                    class="irs-single" style="left: 14.8985%;">24</span></span><span class="irs-grid"
                                                                                                     style="width: 94.1748%; left: 2.81262%;"><span
                                    class="irs-grid-pol" style="left: 0%"></span><span class="irs-grid-text js-grid-text-0"
                                                                                       style="left: 0%; margin-left: -2.39684%;">10</span><span
                                    class="irs-grid-pol small" style="left: 6.0606060606060606%"></span><span
                                    class="irs-grid-pol small" style="left: 3.0303030303030303%"></span><span
                                    class="irs-grid-pol" style="left: 9.090909090909092%"></span><span
                                    class="irs-grid-text js-grid-text-1"
                                    style="left: 9.09091%; visibility: visible; margin-left: -2.39684%;">20</span><span
                                    class="irs-grid-pol small" style="left: 15.151515151515152%"></span><span
                                    class="irs-grid-pol small" style="left: 12.121212121212121%"></span><span
                                    class="irs-grid-pol" style="left: 18.181818181818183%"></span><span
                                    class="irs-grid-text js-grid-text-2"
                                    style="left: 18.1818%; visibility: visible; margin-left: -2.39684%;">30</span><span
                                    class="irs-grid-pol small" style="left: 24.242424242424242%"></span><span
                                    class="irs-grid-pol small" style="left: 21.212121212121215%"></span><span
                                    class="irs-grid-pol" style="left: 27.272727272727273%"></span><span
                                    class="irs-grid-text js-grid-text-3"
                                    style="left: 27.2727%; visibility: visible; margin-left: -2.39684%;">40</span><span
                                    class="irs-grid-pol small" style="left: 33.333333333333336%"></span><span
                                    class="irs-grid-pol small" style="left: 30.303030303030305%"></span><span
                                    class="irs-grid-pol" style="left: 36.36363636363637%"></span><span
                                    class="irs-grid-text js-grid-text-4"
                                    style="left: 36.3636%; margin-left: -2.39684%;">50</span><span
                                    class="irs-grid-pol small" style="left: 42.42424242424243%"></span><span
                                    class="irs-grid-pol small" style="left: 39.3939393939394%"></span><span
                                    class="irs-grid-pol" style="left: 45.45454545454546%"></span><span
                                    class="irs-grid-text js-grid-text-5"
                                    style="left: 45.4545%; visibility: visible; margin-left: -2.39684%;">60</span><span
                                    class="irs-grid-pol small" style="left: 51.515151515151516%"></span><span
                                    class="irs-grid-pol small" style="left: 48.48484848484849%"></span><span
                                    class="irs-grid-pol" style="left: 54.54545454545455%"></span><span
                                    class="irs-grid-text js-grid-text-6"
                                    style="left: 54.5455%; visibility: visible; margin-left: -2.39684%;">70</span><span
                                    class="irs-grid-pol small" style="left: 60.60606060606061%"></span><span
                                    class="irs-grid-pol small" style="left: 57.57575757575758%"></span><span
                                    class="irs-grid-pol" style="left: 63.63636363636364%"></span><span
                                    class="irs-grid-text js-grid-text-7"
                                    style="left: 63.6364%; visibility: visible; margin-left: -2.39684%;">80</span><span
                                    class="irs-grid-pol small" style="left: 69.6969696969697%"></span><span
                                    class="irs-grid-pol small" style="left: 66.66666666666667%"></span><span
                                    class="irs-grid-pol" style="left: 72.72727272727273%"></span><span
                                    class="irs-grid-text js-grid-text-8"
                                    style="left: 72.7273%; margin-left: -2.39684%;">90</span><span
                                    class="irs-grid-pol small" style="left: 78.7878787878788%"></span><span
                                    class="irs-grid-pol small" style="left: 75.75757575757576%"></span><span
                                    class="irs-grid-pol" style="left: 81.81818181818183%"></span><span
                                    class="irs-grid-text js-grid-text-9"
                                    style="left: 81.8182%; visibility: visible; margin-left: -3.59527%;">100</span><span
                                    class="irs-grid-pol small" style="left: 87.87878787878789%"></span><span
                                    class="irs-grid-pol small" style="left: 84.84848484848486%"></span><span
                                    class="irs-grid-pol" style="left: 90.90909090909092%"></span><span
                                    class="irs-grid-text js-grid-text-10"
                                    style="left: 90.9091%; visibility: visible; margin-left: -3.59527%;">110</span><span
                                    class="irs-grid-pol small" style="left: 96.96969696969697%"></span><span
                                    class="irs-grid-pol small" style="left: 93.93939393939395%"></span><span
                                    class="irs-grid-pol" style="left: 100%"></span><span
                                    class="irs-grid-text js-grid-text-11"
                                    style="left: 100%; visibility: visible; margin-left: -3.59527%;">120</span></span><span
                                class="irs-bar irs-bar--single" style="left: 0px; width: 14.8985%;"></span><span
                                class="irs-shadow shadow-single" style="display: none;"></span><span
                                class="irs-handle single" style="left: 11.9859%;"><i></i><i></i><i></i></span></span><input
                            type="hidden" id="mixer_time" name="time" value="24" class="irs-hidden-input" tabindex="-1"
                            readonly="">
                </div>

                <div class="btns">
                    <button class="btn">
                        <svg class="icon">
                            <use xlink:href="images/sprite.svg#ic_video_play"></use>
                        </svg>
                        <span>Запустить</span>
                    </button>
                </div>
            </div>
        @else
            <div class="border empty">
                <button class="add_btn" type="button" wire:click="setMixerChooseMode">
                    <span class="icon">+</span>
                    <span>Кликните здесь, чтобы добавить объект для взаимодействия</span>
                </button>
            </div>
        @endif

    @endif
</div>
