<div class="main">
    @include('components.layouts.web.header')
    @include('components.layouts.web.change-stage-menu')
    <section class="exhaust">
        @include('livewire.stages.blocks.back-button')

        <div class="image">
            <img src="/web/images/tmp/exhaust_img.jpg" alt="" loading="lazy" class="img">

            <button class="btn btn1" data-modal="ph_meter_modal" wire:click="$dispatch('show-modal-ph-meter')">Взаимодействовать</button>
            <button class="btn btn2" data-modal="mixer_modal"  wire:click="$dispatch('show-modal-mixer')">Взаимодействовать</button>
            <button class="btn btn3" data-modal="bath_modal"  wire:click="$dispatch('show-modal-bath')">Взаимодействовать</button>
            <button class="btn btn4" data-modal="filtration_before_modal" wire:click="$dispatch('show-modal-filtration-after')" >Взаимодействовать</button>
            <button class="btn btn5" data-modal="filtration_after_modal" wire:click="$dispatch('show-modal-filtration-before')" >Взаимодействовать</button>

            <livewire:stages.components.modals.modal-p-h-meter-component :session='$session' />
            <livewire:stages.components.modals.modal-mixer-component :session='$session' />
            <livewire:stages.components.modals.modal-bath-component :session='$session' />
            <livewire:stages.components.modals.modal-filtration-before-component :session='$session' />
            <livewire:stages.components.modals.modal-filtration-after-component :session='$session' />
        </div>

        <div class="right_data">
            <div class="scroll">
                <livewire:stages.cooking-stage.cooking-table :session='$session' />
            </div>


            <div class="modal object_modal" id="exhaust_object1_modal">
                <button class="close_btn">
                    <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_close"></use></svg>
                </button>

                <div class="name">Бюкс</div>

                <div class="overflow">
                    <div class="thumb">
                        <img src="/web/images/tmp/point_modal_thumb.png" alt="" loading="lazy">
                    </div>

                    <div class="type">Тип: <span>Посуда: 30 мл.</span></div>
                </div>

                <div class="status">
                    <div class="label">Статус:</div>

                    <div class="val">Вода: 25 мл</div>
                </div>

                <div class="btns">
                    <button class="btn interaction_btn">Взаимодействовать</button>

                    <button class="btn border">Убрать в мойку</button>

                    <button class="btn border">Переместить в инвентарь</button>
                </div>
            </div>
        </div>

{{--        <livewire:stages.components.modals.modal-cart-component :session='$session' />--}}
        <livewire:stages.components.modals.modal-move-to-cooking-table-component :session='$session'/>
        <livewire:stages.components.modals.modal-cooking-table-component :session='$session'/>
        <livewire:stages.components.component-cart :session='$session' click-component-event="show-modal-move-to-cooking-table"/>
    </section>

</div>
@script
<script>
    $wire.on('show-modal-mixer', () => {
        console.log('mixer::show-modal-mixer');
        setTimeout(initTimeRange, 300);
    });

   // TODO: add another events
    $wire.on('session-component-moved-to-mixer', () => {
        console.log('cooking::session-component-moved-to-mixer');
        window.table_cooking_choose_mode = null;
    });
    $wire.on('session-component-moved-to-cooking-table', () => {
        console.log('cooking::session-component-moved-to-cooking-table');
        window.table_cooking_choose_mode = null;
    });
    $wire.on('session-component-moved-to-cooking-table', () => {
        console.log('cooking::session-component-moved-to-cooking-table');
        window.table_cooking_choose_mode = null;
    });

    $wire.on('unset-cooking-table-choose-mode', () => {
        console.log('cooking::unset-cooking-table-choose-mode');
        window.table_cooking_choose_mode = null;
    });
    $wire.on('set-cooking-table-choose-mode', (place) => {
        console.log('cooking::set-cooking-table-choose-mode', place);
        window.table_cooking_choose_mode = place;
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
        if(!hasTarget && window.table_cooking_choose_mode) {
            console.log('cooking::DISPATCH unset-cooking-table-choose-mode')
            $wire.dispatch('unset-cooking-table-choose-mode');
        }

    })
</script>
@endscript