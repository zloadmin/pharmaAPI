<div>
    @foreach($components as $component)
        <div wire:click="$dispatch('show-component-modal', { id: {{ $component->id }} })" class="point point{{ $component->id }}" style="top: {{ $component->padding_top }}%; right: {{ $component->padding_right }}%;">
            <div class="name">{{ $component->short_name }}</div>
        </div>
    @endforeach
</div>