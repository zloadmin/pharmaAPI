<div>
    <input type="text" wire:model="componentValues.{{ $component->id }}">
    <hr>
{{--    <button x-on:click="$wire.increment('componentValues.{{ $component->id }}')" type="button">+</button>--}}
{{--    <button wire:click="removeComponentValueStuff({{ $component->id }})" type="button">-</button>--}}

    <button wire:click="addComponentValueStuff({{ $component->id }})" type="button">+</button>
    <button wire:click="removeComponentValueStuff({{ $component->id }})" type="button">-</button>
    <hr>
    <button wire:click="addToCartStuff({{ $component->id }})" type="button">Add</button>
</div>