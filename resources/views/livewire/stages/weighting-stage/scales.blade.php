<div>
    <div class="interaction_data">

        <div class="data">
            <div class="head">
                <div class="title">Взаимодействие</div>
            </div>

            <div class="objects">
                @if($leftBoxComponent)
                    @include('livewire.stages.weighting-stage.scales-component', ['sessionComponent' => $leftBoxComponent])
                @else
                    <div class="object empty target_component @if($tableChooseMode == \App\Enums\SessionComponent\SessionComponentPlace::onScalesLeftBox) item_force_hover @endif"
                         wire:click="setLeftBoxChooseMode">
                        <button class="add_btn" type="button">
                            <span class="icon">+</span>
                            <span>Кликните здесь, чтобы добавить объект для взаимодействия</span>
                        </button>
                    </div>
                @endif
                @if($rightBoxComponent)
                    @include('livewire.stages.weighting-stage.scales-component', ['sessionComponent' => $rightBoxComponent])
                @else
                    <div class="object empty target_component @if($tableChooseMode == \App\Enums\SessionComponent\SessionComponentPlace::onScalesRightBox) item_force_hover @endif"
                         wire:click="setRightBoxChooseMode">
                        <button class="add_btn">
                            <span class="icon">+</span>
                            <span>Кликните здесь, чтобы добавить объект для взаимодействия</span>
                        </button>
                    </div>
                @endif
            </div>

            <div class="bottom">
                @if ($bottomBoxComponent)
                    <div class="scales_additional_block">
                        <button class="remove_btn" type="button"
                                wire:click="moveToTable('{{ $bottomBoxComponent->component->on_scales_place }}')">
                            <svg class="icon">
                                <use xlink:href="/web/images/sprite.svg#ic_remove"></use>
                            </svg>
                        </button>
                        <img src="{{ $bottomBoxComponent->component->image_url }}" class="scales_additional_component"
                             alt="">
                    </div>

                @else
                    <button class="add_btn target_component  @if($tableChooseMode == \App\Enums\SessionComponent\SessionComponentPlace::onScalesBottomBox) item_force_hover @endif"
                            type="button" wire:click="setBottomBoxChooseMode">+
                    </button>
                @endif


                @if ($leftBoxComponent && $rightBoxComponent && $bottomBoxComponent)
                    @include('livewire.stages.weighting-stage.scales-range')
                @endif
            </div>
        </div>

        <div class="exp">
            <div class="icon">
                <svg>
                    <use xlink:href="/web/images/sprite.svg#ic_exp"></use>
                </svg>
            </div>
            <span>выберите необходимы инструмент из оборудования весовой / переместите в пустой слот / внесите правильный вес / нажмите кнопку применить</span>
        </div>
    </div>
    @include('livewire.stages.weighting-stage.scales-board')
</div>

@script
<script>
    $wire.on('scales-init', () => {
        console.log('scales::scales-init');
        setTimeout(initRange, 100);
    });
    $wire.on('session-component-moved-to-scales', () => {
        console.log('scales::session-component-moved-to-scales');
        window.table_choose_mode = null;
    });
    $wire.on('unset-weighting-table-choose-mode', () => {
        console.log('scales::unset-weighting-table-choose-mode');
        window.table_choose_mode = null;
    });
    $wire.on('set-weighting-table-choose-mode', (place) => {
        console.log('scales::set-weighting-table-choose-mode', place);
        window.table_choose_mode = place;
    });
    // const components = document.querySelector('.target_component');


    document.addEventListener('click', (event) => {
        const components = Array.prototype.slice.call(document.querySelectorAll('.target_component'));
        let hasTarget = false;
        for (let i = 0; i < components.length; i++) {
            if(event.composedPath().includes(components[i])) {
                hasTarget = true;
            }
        }
        if(!hasTarget && window.table_choose_mode) {
            console.log('scales::DISPATCH unset-weighting-table-choose-mode')
            $wire.dispatch('unset-weighting-table-choose-mode');
        }

    })
</script>
@endscript