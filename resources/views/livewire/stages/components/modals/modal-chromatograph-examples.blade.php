<div class="exhaust_modal interaction_data " id="modal_chromatograph_examples" style="display: {{ $isShow ? 'block' : 'none' }}; top: 200px; left: 544px;">

    @if ($isShow)
        <button class="close_btn" type="button" wire:click="$dispatch('modal-chromatograph-examples')">
            <svg class="icon">
                <use xlink:href="/web/images/sprite.svg#ic_close"></use>
            </svg>
        </button>
        <div class="data">
            <div class="head">
                <div class="title">Ввод пробы</div>
            </div>
            <div class="objects">
                @if($leftBoxSessionComponent)
                    <div class="object ">
                        <button class="remove_btn" type="button" wire:click="moveToCart('{{ $leftBoxSessionComponent->place }}')">
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
                    <div class="object empty target_component">
                        <button class="add_btn" type="button" wire:click="setChromatographExampleLeftBoxChooseMode">
                            <span class="icon">+</span>
                            <span>Кликните здесь, чтобы добавить объект для взаимодействия</span>
                        </button>
                    </div>
                @endif

                @if($rightBoxSessionComponent)
                    <div class="object">
                        <button class="remove_btn" type="button" wire:click="moveToCart('{{ $rightBoxSessionComponent->place }}')">
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
                    <div class="object empty target_component">
                        <button class="add_btn" type="button" wire:click="setChromatographExampleRightBoxChooseMode">
                            <span class="icon">+</span>
                            <span>Кликните здесь, чтобы добавить объект для взаимодействия</span>
                        </button>
                    </div>
                @endif


            </div>
            @if ($leftBoxSessionComponent && $rightBoxSessionComponent)
                <button class="action_btn" type="button" wire:click="run">Ввести</button>
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
