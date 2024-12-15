<div class="exhaust_modal interaction_data interaction_data_tree" id="bath_modal" style="width: 710px; display: {{ $isShow ? 'block' : 'none' }}">
    @if ($isShow)
        <button class="close_btn" type="button" wire:click="$dispatch('hide-modal-mix')">
            <svg class="icon">
                <use xlink:href="/web/images/sprite.svg#ic_close"></use>
            </svg>
        </button>
        <div class="data">
            <div class="head">
                <div class="title">Смещивание</div>
            </div>

            <div class="objects">
                @if($leftBoxSessionComponent)
                    <div class="object object_tree">
                        <button class="remove_btn" type="button" wire:click="moveToCookingTable('{{ $leftBoxSessionComponent->place }}')">
                            <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_remove"></use></svg>
                        </button>
                        <div class="name">{{ $leftBoxSessionComponent->getName() }}</div>

                        <div class="overflow">
                            <div class="thumb">
                                <img src="{{ $leftBoxSessionComponent->getImageUrl() }}" alt="" loading="lazy">
                            </div>

                            <div class="type">Тип: <span>{{ $leftBoxSessionComponent->getTypeLabel() }}</span></div>
                        </div>

                        <div class="status">
                            <div class="label">Статус:</div>

                            <div class="val">{!! $leftBoxSessionComponent->getStatus() !!}</div>
                        </div>
                    </div>
                @else
                    <div class="object object_tree empty">
                        <button class="add_btn" type="button" wire:click="setMixLeftBoxChooseMode">
                            <span class="icon">+</span>
                            <span>Кликните здесь, чтобы добавить объект для взаимодействия</span>
                        </button>
                    </div>
                @endif

                @if($centerBoxSessionComponent)
                    <div class="object object_tree">
                        <button class="remove_btn" type="button" wire:click="moveToCookingTable('{{ $centerBoxSessionComponent->place }}')">
                            <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_remove"></use></svg>
                        </button>
                        <div class="name">{{ $centerBoxSessionComponent->getName() }}</div>
                        <div class="overflow">
                            <div class="thumb">
                                <img src="{{ $centerBoxSessionComponent->getImageUrl() }}" alt="" loading="lazy">
                            </div>

                            <div class="type">Тип: <span>{{ $centerBoxSessionComponent->getTypeLabel() }}</span></div>
                        </div>

                        <div class="status">
                            <div class="label">Статус:</div>

                            <div class="val">{!! $centerBoxSessionComponent->getStatus() !!}</div>
                        </div>
                    </div>
                @else
                    <div class="object object_tree empty">
                        <button class="add_btn" type="button" wire:click="setMixCenterBoxChooseMode">
                            <span class="icon">+</span>
                            <span>Кликните здесь, чтобы добавить объект для взаимодействия</span>
                        </button>
                    </div>
                @endif


                @if($rightBoxSessionComponent)
                        <div class="object object_tree">
                            <button class="remove_btn" type="button" wire:click="moveToCookingTable('{{ $rightBoxSessionComponent->place }}')">
                                <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_remove"></use></svg>
                            </button>
                            <div class="name">{{ $rightBoxSessionComponent->getName() }}</div>
                            <div class="overflow">
                                <div class="thumb">
                                    <img src="{{ $rightBoxSessionComponent->getImageUrl() }}" alt="" loading="lazy">
                                </div>

                                <div class="type">Тип: <span>{{ $rightBoxSessionComponent->getTypeLabel() }}</span></div>
                            </div>

                            <div class="status">
                                <div class="label">Статус:</div>

                                <div class="val">{!! $rightBoxSessionComponent->getStatus() !!}</div>
                            </div>
                        </div>
                @else
                        <div class="object object_tree empty">
                            <button class="add_btn" type="button" wire:click="setMixRightBoxChooseMode">
                                <span class="icon">+</span>
                                <span>Кликните здесь, чтобы добавить объект для взаимодействия</span>
                            </button>
                        </div>
                @endif
            </div>
            @if(
                ($leftBoxSessionComponent && $centerBoxSessionComponent) ||
                ($leftBoxSessionComponent && $rightBoxSessionComponent) ||
                ($centerBoxSessionComponent && $rightBoxSessionComponent)
            )
                <button class="action_btn" type="button" wire:click="run">Смешать</button>
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
