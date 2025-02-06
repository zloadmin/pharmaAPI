<div class="exhaust_modal interaction_data interaction_data_tree" id="modal_filtration_examples"
     style="width: 710px; display: {{ $isShow ? 'block' : 'none' }}">
    @if ($isShow)
        <button class="close_btn" type="button" wire:click="$dispatch('hide-modal-filtration-examples')">
            <svg class="icon">
                <use xlink:href="/web/images/sprite.svg#ic_close"></use>
            </svg>
        </button>
        <div class="data">
            <div class="head">
                <div class="title">Фильтрация испытуемых образцов</div>
            </div>

            <div class="objects">
                @if($filtrationExampleBoxOne)
                    @include('livewire.stages.components.modals.component.component', ['component' => $filtrationExampleBoxOne])
                @else
                    @include('livewire.stages.components.modals.component.empty-component', ['click' => 'setFiltrationExampleBoxOneChooseMode'])
                @endif
                @if($filtrationExampleBoxTwo)
                    @include('livewire.stages.components.modals.component.component', ['component' => $filtrationExampleBoxTwo])
                @else
                    @include('livewire.stages.components.modals.component.empty-component', ['click' => 'setFiltrationExampleBoxTwoChooseMode'])
                @endif
                @if($filtrationExampleBoxThree)
                    @include('livewire.stages.components.modals.component.component', ['component' => $filtrationExampleBoxThree])
                @else
                    @include('livewire.stages.components.modals.component.empty-component', ['click' => 'setFiltrationExampleBoxThreeChooseMode'])
                @endif
                @if($filtrationExampleBoxFour)
                    @include('livewire.stages.components.modals.component.component', ['component' => $filtrationExampleBoxFour])
                @else
                    @include('livewire.stages.components.modals.component.empty-component', ['click' => 'setFiltrationExampleBoxFourChooseMode'])
                @endif

            </div>
                    @if(
                        $filtrationExampleBoxOne &&
                        $filtrationExampleBoxTwo &&
                        $filtrationExampleBoxThree &&
                        $filtrationExampleBoxFour
                    )
                        <button class="action_btn" type="button" wire:click="run">Профильтровать</button>
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
