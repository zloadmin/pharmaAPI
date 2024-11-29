<div>
    <div class="interaction_data">
{{--        <button class="close_btn">--}}
{{--            <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_close"></use></svg>--}}
{{--        </button>--}}

        <div class="data">
            <div class="head">
                <div class="title">Взаимодействие</div>
            </div>

            <div class="objects">
{{--                <button class="move_btn">--}}
{{--                    <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_move"></use></svg>--}}
{{--                </button>--}}

                @if($leftBoxComponent)
                    @include('livewire.stages.weighting-stage.scales-component', ['sessionComponent' => $leftBoxComponent])
                @else
                    <div class="object empty" wire:click="setLeftBoxChooseMode">
                        <button class="add_btn" type="button" >
                            <span class="icon">+</span>
                            <span>Кликните здесь, чтобы добавить объект для взаимодействия</span>
                        </button>
                    </div>
                @endif
                @if($rightBoxComponent)
                    @include('livewire.stages.weighting-stage.scales-component', ['sessionComponent' => $rightBoxComponent])
                @else
                    <div class="object empty" wire:click="setRightBoxChooseMode">
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
                        <button class="remove_btn" type="button" wire:click="moveToTable('{{ $bottomBoxComponent->component->on_scales_place }}')">
                            <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_remove"></use></svg>
                        </button>
                        <img src="{{ $bottomBoxComponent->component->image_url }}" class="scales_additional_component" alt="">
                    </div>

                @else
                    <button class="add_btn" type="button" wire:click="setBottomBoxChooseMode">+</button>
                @endif


                @if ($leftBoxComponent && $rightBoxComponent && $bottomBoxComponent)
                        @include('livewire.stages.weighting-stage.scales-range')
                @endif
            </div>
        </div>

        <div class="exp">
            <div class="icon">
                <svg><use xlink:href="/web/images/sprite.svg#ic_exp"></use></svg>
            </div>
            <span>выберите необходимы инструмент из оборудования весовой / переместите в пустой слот / внесите правильный вес / нажмите кнопку применить</span>
        </div>
    </div>
    @include('livewire.stages.weighting-stage.scales-board')
</div>

@script
<script>
    $wire.on('scales-init', () => {
        console.log('scales-init');
        // initRange();
        setTimeout(initRange, 100);
    });
</script>
@endscript