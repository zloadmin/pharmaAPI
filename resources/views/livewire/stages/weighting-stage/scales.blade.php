<div class="interaction_data">
    <button class="close_btn">
        <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_close"></use></svg>
    </button>

    <div class="data">
        <div class="head">
            <div class="title">Взаимодействие</div>
        </div>

        <div class="objects">
            <button class="move_btn">
                <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_move"></use></svg>
            </button>

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
                <img src="{{ $bottomBoxComponent->component->image_url }}" class="scales_additional_component" alt="">
            @else
                <button class="add_btn" type="button" wire:click="setBottomBoxChooseMode">+</button>
            @endif


            @if ($leftBoxComponent && $rightBoxComponent && $bottomBoxComponent)
                    <div class="range range1 rangeBlock" style="display: none">
                        <input type="hidden" id="range1" name="range1" value="">

                        <div class="field">
                            <input type="text" inputmode="numeric" name="" value="0.000" class="input from">

                            <div class="unit">
                                <span>(г)</span>
                                <svg class="arr"><use xlink:href="/web/images/sprite.svg#ic_arr_ver"></use></svg>
                            </div>
                        </div>

                        <div class="btns">
                            <button class="btn border">Отнять</button>

                            <button class="btn">Добавить</button>
                        </div>
                    </div>
            @endif

            <!-- <div class="range range2">
                <input type="hidden" id="range2" name="range2" value="">

                <div class="field">
                    <input type="text" inputmode="numeric" name="" value="0.01" class="input from">

                    <div class="unit">
                        <span>(г)</span>
                    </div>
                </div>

                <div class="btns">
                    <button class="btn border">Отнять</button>

                    <button class="btn">Добавить</button>
                </div>
            </div> -->


            <!-- <div class="range range3">
                <input type="hidden" id="range3" name="range3" value="">

                <div class="field">
                    <input type="text" inputmode="numeric" name="" value="0" class="input from">

                    <div class="unit">
                        <span>(%)</span>
                    </div>
                </div>

                <div class="btns">
                    <button class="btn border">Отнять</button>

                    <button class="btn">Добавить</button>
                </div>
            </div> -->


            <!-- <div class="range range4">
                <input type="hidden" id="range4" name="range4" value="">

                <div class="field">
                    <input type="text" inputmode="numeric" name="" value="0.0000" class="input from">

                    <div class="unit">
                        <span>(мл)</span>
                        <svg class="arr"><use xlink:href="/web/images/sprite.svg#ic_arr_ver"></use></svg>
                    </div>
                </div>

                <div class="btns">
                    <button class="btn border">Отнять</button>

                    <button class="btn">Добавить</button>
                </div>
            </div> -->


            <!-- <div class="range range5">
                <input type="hidden" id="range5" name="range5" value="">

                <div class="field">
                    <input type="text" inputmode="numeric" name="" value="0.0000" class="input from">

                    <div class="unit">
                        <span>(мл)</span>
                    </div>
                </div>

                <div class="btns">
                    <button class="btn border">Отнять</button>

                    <button class="btn">Добавить</button>
                </div>
            </div> -->

            <!-- <div class="range range6 custom_values">
                <input type="hidden" id="range6" name="range6" value="">

                <div class="btns">
                    <button class="btn border">Отнять</button>

                    <button class="btn">Добавить</button>
                </div>
            </div> -->
        </div>
    </div>

    <div class="exp">
        <div class="icon">
            <svg><use xlink:href="/web/images/sprite.svg#ic_exp"></use></svg>
        </div>
        <span>выберите необходимы инструмент из оборудования весовой / переместите в пустой слот / внесите правильный вес / нажмите кнопку применить</span>
    </div>
</div>
@script
<script>
    // console.log('loaded scales');
    // initRange();
    document.addEventListener('livewire:navigated', () => {
        console.log('livewire:navigated');
        initRange();
    });
    document.addEventListener('livewire:initialized', () => {
        console.log('livewire:initialized');
        initRange();
    });
    // Livewire.on('session-component-moved-to-scales', () => {
    //     console.log('session-component-moved-to-scales');
    //     initRange();
    // })
    Livewire.hook('morph.updated', ({ el, component }) => {
        console.log('morph.updated');
    });

</script>
@endscript