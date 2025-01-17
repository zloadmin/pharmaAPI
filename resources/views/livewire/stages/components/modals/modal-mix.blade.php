<div class="exhaust_modal interaction_data interaction_data_tree" id="bath_modal" style="width: 710px; display: {{ $isShow ? 'block' : 'none' }}">
    @if ($isShow)
        <button class="close_btn" type="button" wire:click="$dispatch('hide-modal-mix')">
            <svg class="icon">
                <use xlink:href="/web/images/sprite.svg#ic_close"></use>
            </svg>
        </button>
        <div class="data">
            <div class="head">
                <div class="title">Смешивание</div>
            </div>

            <div class="objects">
                @if($mixBoxOneSessionComponent)
                    @include('livewire.stages.components.modals.modal-mix.mix-component', ['component' => $mixBoxOneSessionComponent])
                @else
                    @include('livewire.stages.components.modals.modal-mix.mix-empty-component', ['click' => 'setMixBoxOneChooseMode'])
                @endif
                @if($mixBoxTwoSessionComponent)
                    @include('livewire.stages.components.modals.modal-mix.mix-component', ['component' => $mixBoxTwoSessionComponent])
                @else
                    @include('livewire.stages.components.modals.modal-mix.mix-empty-component', ['click' => 'setMixBoxTwoChooseMode'])
                @endif
                @if($mixBoxThreeSessionComponent)
                    @include('livewire.stages.components.modals.modal-mix.mix-component', ['component' => $mixBoxThreeSessionComponent])
                @else
                    @include('livewire.stages.components.modals.modal-mix.mix-empty-component', ['click' => 'setMixBoxThreeChooseMode'])
                @endif
                @if($mixBoxFourSessionComponent)
                    @include('livewire.stages.components.modals.modal-mix.mix-component', ['component' => $mixBoxFourSessionComponent])
                @else
                    @include('livewire.stages.components.modals.modal-mix.mix-empty-component', ['click' => 'setMixBoxFourChooseMode'])
                @endif

            </div>
            @if(
                $mixBoxOneSessionComponent &&
                $mixBoxTwoSessionComponent &&
                $mixBoxThreeSessionComponent &&
                $mixBoxFourSessionComponent
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
