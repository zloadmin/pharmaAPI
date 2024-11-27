<div class="modal object_modal" style="display: {{ $component ? 'block' : 'none' }}">
    @if ($component)
        <button class="close_btn" type="button" wire:click="close">
                <svg class="icon">
                        <use xlink:href="/web/images/sprite.svg#ic_close"></use>
                </svg>
        </button>

        <div class="name">{{ $component->name }}</div>

        <div class="overflow">
                <div class="thumb">
                        <img src="{{ $component->image_url }}" alt="" loading="lazy">
                </div>
                <div class="type">Тип: {{ $component->type->label() }}</div>
        </div>

        <div class="status">
                <div class="label">Статус:</div>
                <div class="val">Наполнено / Закрыто / Тарировано / Взвешено</div>
        </div>

        <form wire:submit.prevent="addToCart">
                <div class="move">
                        <div class="label">Переместить в инивентарь?</div>
                        <div class="amount">
                                <button type="button" wire:click="removeValue" class="btn minus"></button>
                                <input type="number" min="{{ $component->minValue() }}" max="{{ $component->maxValue() }}" step="{{ $component->stepValue() }}" wire:model="value" class="input">
                                <div>@error('value') {{ $message }} @enderror</div>
                                <button type="button" wire:click="addValue" class="btn plus"></button>
                                <div class="unit">(шт)</div>
                        </div>
                        <button class="submit_btn" wire:loading.attr="disabled" wire:target="addToCart">
                                <div wire:loading.delay wire:target="addToCart">
                                        ...
                                </div>
                                <div wire:loading.delay.remove wire:target="addToCart">
                                        Да
                                </div>
                        </button>
                </div>
        </form>
    @endif
</div>