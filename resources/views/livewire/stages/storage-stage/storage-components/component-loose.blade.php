<div class="modal" id="point{{ $component->id }}_modal">
    <button class="close_btn">
        <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_close"></use></svg>
    </button>

    <div class="name">Вода очищенная</div>

    <div class="overflow">
        <div class="thumb">
            <img src="/web/images/tmp/point_modal_thumb.png" alt="" loading="lazy">
        </div>

        <div class="type">Тип: Посуда</div>
    </div>

    <div class="status">
        <div class="label">Статус:</div>

        <div class="val">Наполнено / Закрыто / Тарировано / Взвешено</div>
    </div>

    <div class="move">
        <div class="label">Переместить в инивентарь?</div>

        <div class="amount">
            <button type="button" class="btn minus"></button>

            <input type="text" value="1" class="input" data-minimum="1" data-maximum="999" data-step="1" data-unit="" maxlength="3">

            <button type="button" class="btn plus"></button>

            <div class="unit">(шт)</div>
        </div>

        <button class="submit_btn">Да</button>
    </div>
</div>

{{--<div style="float: left; border: 1px solid red; padding: 5px; margin: 5px">--}}
{{--    @include('livewire.stages.storage-stage.storage-components.component-card')--}}
{{--    <div class="form">--}}
{{--        <form wire:submit.prevent="addToCart">--}}
{{--            <label for="">гм</label>--}}
{{--            <input type="number" min="0.00001" max="10" step="0.00001" wire:model="value">--}}
{{--            <div>@error('value') {{ $message }} @enderror</div>--}}
{{--            <hr>--}}
{{--            <button class="btn btn-primary" wire:loading.attr="disabled" wire:target="addToCart">--}}
{{--                <div wire:loading.delay wire:target="addToCart">--}}
{{--                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>--}}
{{--                    Loading...--}}
{{--                </div>--}}
{{--                <div wire:loading.delay.remove wire:target="addToCart">--}}
{{--                    Add--}}
{{--                </div>--}}
{{--            </button>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</div>--}}