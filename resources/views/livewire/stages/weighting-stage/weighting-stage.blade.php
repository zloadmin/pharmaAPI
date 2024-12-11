<div class="main">
    @include('components.layouts.web.header')
    @include('components.layouts.web.change-stage-menu')
    <section class="weight">
        @include('livewire.stages.blocks.back-button')

        @include('livewire.stages.weighting-stage.right-block')


        <livewire:stages.weighting-stage.scales :session='$session'/>



{{--        <div class="total_data">--}}
{{--            <div class="status">Статус = <span>Дефолт</span></div>--}}

{{--            <div class="val">--}}
{{--                <span>000.0000</span> <small>г</small>--}}
{{--            </div>--}}

{{--            <div class="btns">--}}
{{--                <button class="btn border">Тарировать</button>--}}

{{--                <button class="btn">Взвесить</button>--}}
{{--            </div>--}}
{{--        </div>--}}


        <img src="/web/images/tmp/weight_img.jpg" alt="" loading="lazy" class="bg">

        {{-- Modals --}}
        <livewire:stages.components.modals.modal-move-to-weighting-table-component :session='$session'/>
        <livewire:stages.components.modals.modal-weighting-table-component :session='$session'/>
        {{-- Table --}}
        <livewire:stages.components.component-cart :session='$session' click-component-event="show-modal-move-to-weighting-table" />
</section>
</div>

