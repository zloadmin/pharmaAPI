<div class="exhaust_modal interaction_data" id="filtration_modal_before" style="display: {{ $isShow ? 'block' : 'none' }}">
    @if ($isShow)
        <button class="close_btn"  type="button" wire:click="$dispatch('hide-modal-filtration')">
            <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_close"></use></svg>
        </button>
        <div class="data">
            <div class="head">
                <div class="title">Взаимойдествие с<br> установкой фильтрации</div>
            </div>

            <div class="objects">
                <div class="object">
                    <div class="name">Фильтр</div>
                    <div class="overflow">
                        <div class="thumb">
                            <img src="/storage/storage_components/filter.png" alt="" loading="lazy">
                        </div>

{{--                        <div class="type">Тип: <span>Посуда: 900 мл</span></div>--}}
                    </div>

                    <div class="status">
{{--                        <div class="label">Статус:</div>--}}

{{--                        <div class="val">Подвижная фаза 500 мл</div>--}}
                    </div>
                </div>

                @if($sessionComponent)
                    <div class="object">
                        <button class="remove_btn" type="button" wire:click="moveToCookingTable('{{ $sessionComponent->place }}')">
                            <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_remove"></use></svg>
                        </button>
                        <div class="name">{{ $sessionComponent->getName() }}</div>

                        <div class="overflow">
                            <div class="thumb">
                                <img src="{{ $sessionComponent->getImageUrl() }}" alt="" loading="lazy">
                            </div>

                            <div class="type">Тип: <span>{{ $sessionComponent->getTypeLabel() }}</span></div>
                        </div>

                        <div class="status">
                            <div class="label">Статус:</div>
                            <div class="val">{!! $sessionComponent->getStatus() !!}</div>
                        </div>
                    </div>
                @else
                    <div class="object empty">
                        <button class="add_btn" type="button" wire:click="setFiltrationBoxChooseMode">
                            <span class="icon">+</span>
                            <span>Кликните здесь, чтобы добавить объект для взаимодействия</span>
                        </button>
                    </div>
                @endif
            </div>

            <button class="action_btn" type="button" wire:click="run">Профильтровать</button>
        </div>
        <div class="exp">
            <div class="icon">
                <svg><use xlink:href="/web/images/sprite.svg#ic_exp"></use></svg>
            </div>
            <span>выберите необходимые вещества в мернхы колбах/ настройте температуру /  выставьте правильно время / нажмите кнопку запустить</span>
        </div>
    @endif
</div>