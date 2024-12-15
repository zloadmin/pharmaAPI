<div class="object">
    <button class="remove_btn" type="button" wire:click="moveToTable('{{ $sessionComponent->component->on_scales_place }}')">
        <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_remove"></use></svg>
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
</div>