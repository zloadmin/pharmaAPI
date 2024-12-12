<div class="exhaust_modal interaction_data" id="bath_modal" style="display: {{ $isShow ? 'block' : 'none' }}">
    @if ($isShow)
        <button class="close_btn" type="button" wire:click="$dispatch('hide-modal-bath')">
            <svg class="icon">
                <use xlink:href="/web/images/sprite.svg#ic_close"></use>
            </svg>
        </button>
        <div class="data">
            <div class="head">
                <div class="title">Взаимойдествие<br> с УЗ ванной </div>
            </div>

            <div class="objects">
                @if($leftBoxSessionComponent)
                    <div class="object">
                        <button class="remove_btn" type="button" wire:click="moveToCookingTable('{{ $leftBoxSessionComponent->place }}')">
                            <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_remove"></use></svg>
                        </button>
                        <div class="name">{{ $leftBoxSessionComponent->component->name }}</div>

                        <div class="overflow">
                            <div class="thumb">
                                <img src="{{ $leftBoxSessionComponent->component->image_url }}" alt="" loading="lazy">
                            </div>

                            <div class="type">Тип: <span>{{ $leftBoxSessionComponent->component->type->label() }}</span></div>
                        </div>

                        <div class="status">
                            <div class="label">Статус:</div>

                            <div class="val">???</div>
                        </div>
                    </div>
                @else
                    <div class="object empty">
                        <button class="add_btn" type="button" wire:click="setBathLeftBoxChooseMode">
                            <span class="icon">+</span>
                            <span>Кликните здесь, чтобы добавить объект для взаимодействия</span>
                        </button>
                    </div>
                @endif




                @if($rightBoxSessionComponent)
                        <div class="object">
                            <button class="remove_btn" type="button" wire:click="moveToCookingTable('{{ $rightBoxSessionComponent->place }}')">
                                <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_remove"></use></svg>
                            </button>
                            <div class="name">Мерная колба</div>
                            <div class="overflow">
                                <div class="thumb">
                                    <img src="{{ $rightBoxSessionComponent->component->image_url }}" alt="" loading="lazy">
                                </div>

                                <div class="type">Тип: <span>{{ $rightBoxSessionComponent->component->type->label() }}</span></div>
                            </div>

                            <div class="status">
                                <div class="label">Статус:</div>

                                <div class="val">???</div>
                            </div>
                        </div>
                @else
                        <div class="object empty">
                            <button class="add_btn" type="button" wire:click="setBathRightBoxChooseMode">
                                <span class="icon">+</span>
                                <span>Кликните здесь, чтобы добавить объект для взаимодействия</span>
                            </button>
                        </div>
                @endif


            </div>
            @if ($leftBoxSessionComponent || $rightBoxSessionComponent)
                <div class="bottom">
                    <div class="progress">
                        <div style="width: 50%;"></div>
                    </div>

                    <div class="range temperature">
                        <div class="label">Температура</div>
                        <input type="hidden" id="bath_temperature" name="temperature" value="">
                    </div>

                    <div class="range time">
                        <div class="label">Время (сек)</div>
                        <input type="hidden" id="bath_time" name="time" value="">
                    </div>

                    <div class="btns">
                        <button class="btn" type="button" wire:click="run">
                            <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_video_play"></use></svg>
                            <span>Запустить</span>
                        </button>
                    </div>
                </div>
            @endif
        </div>
        <div class="exp">
            <div class="icon">
                <svg>
                    <use xlink:href="/web/images/sprite.svg#ic_exp"></use>
                </svg>
            </div>

            <span>выберите необходимые вещества в мернхы колбах/ настройте температуру /  выставьте правильно время / нажмите кнопку запустить</span>
        </div>
    @endif
</div>
@script
<script>
    $wire.on('bath-init', () => {
        console.log('bath::bath-init');
        setTimeout(initBathRanges, 100);
    });
</script>
@endscript