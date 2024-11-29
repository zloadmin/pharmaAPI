<div class="object">
    <button class="remove_btn" type="button" wire:click="moveToTable('{{ $sessionComponent->component->on_scales_place }}')">
        <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_remove"></use></svg>
    </button>

    <div class="name">{{ $sessionComponent->component->name }}</div>

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
</div>