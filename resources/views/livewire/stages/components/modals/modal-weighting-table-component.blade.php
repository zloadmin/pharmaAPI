<div class="modal object_modal" id="weight_object1_modal" style="display: {{ $sessionComponent ? 'block' : 'none' }}">
    @if ($sessionComponent)
        <button class="close_btn" type="button" wire:click="close">
            <svg class="icon">
                <use xlink:href="/web/images/sprite.svg#ic_close"></use>
            </svg>
        </button>

        <div class="name">{{ $sessionComponent->getName() }}</div>

        <div class="overflow">
            <div class="thumb">
                <img src="{{ $sessionComponent->getImageUrl() }}" alt="" loading="lazy">
            </div>

            <div class="type">Тип: <span>{{ $sessionComponent->getTypeLabel() }}</span></div>
        </div>

        <div class="status">
            <div class="label">Статус:</div>
            <div class="val">{!! $sessionComponent->getStatus() !!}</div>
        </div>

        <div class="btns">
            @if($sessionComponent->is_dirty)
                <button wire:click="moveToSink" type="button" class="btn border">Убрать в мойку</button>
            @else
                <button wire:click="moveToScales" type="button" class="btn interaction_btn">Взаимодействовать</button>
                <button wire:click="moveToSink" type="button" class="btn border">Убрать в мойку</button>
                <button wire:click="moveToCart" type="button" class="btn border">Переместить в инвентарь</button>
            @endif
        </div>
    @endif
</div>