<div class="object object_tree">
    <button class="remove_btn" type="button" wire:click="moveToCookingTable('{{ $component->place }}')">
        <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_remove"></use></svg>
    </button>
    <div class="name">{{ $component->getName() }}</div>
    <div class="overflow">
        <div class="thumb">
            <img src="{{ $component->getImageUrl() }}" alt="" loading="lazy">
        </div>
        <div class="type">Тип: <span>{{ $component->getTypeLabel() }}</span></div>
    </div>
    <div class="status">
        <div class="label">Статус:</div>
        <div class="val">{!! $component->getStatus() !!}</div>
    </div>
</div>