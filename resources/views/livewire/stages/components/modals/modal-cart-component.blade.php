<div class="modal object_modal" id="object1_modal" style="display: {{ $sessionComponent ? 'block' : 'none' }}">
    @if ($sessionComponent)
        <button class="close_btn" type="button" wire:click="close">
            <svg class="icon">
                <use xlink:href="/web/images/sprite.svg#ic_close"></use>
            </svg>
        </button>

        <div class="name">{{ $sessionComponent->name }}</div>

        <div class="overflow">
            <div class="thumb">
                <img src="{{ $sessionComponent->component->image_url }}" alt="" loading="lazy">
            </div>

            <div class="type">Тип: <span>{{ $sessionComponent->component->type->label() }}</span></div>
        </div>

        <div class="status">
            <div class="label">Статус:</div>

            <div class="val">???</div>
        </div>
    @endif
</div>