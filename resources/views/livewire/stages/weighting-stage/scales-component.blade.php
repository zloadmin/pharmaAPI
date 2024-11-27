<div class="object">
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