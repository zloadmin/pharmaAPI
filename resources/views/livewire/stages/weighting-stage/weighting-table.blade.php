<div class="section on_table">
    <div class="head">
        <div class="title">На столе</div>
        <button class="get_all_btn" type="button" wire:click="moveAllCartItemsToTable">Взять все</button>
    </div>

    <div class="row">
        @foreach($sessionComponents as $sessionComponent)
            <div
                 @if($chooseModePlace && $sessionComponent->component->isCanBeChoose($chooseModePlace))
                     class="item item_force_hover target_component"
                    wire:click="moveToScales({{ $sessionComponent->id }}, '{{ $chooseModePlace->value }}')"
                 @else
                     class="item"
                    wire:click="showModalTableComponent({{ $sessionComponent->id }})"
                 @endif
            >
                <div class="icons column">
                    @if($sessionComponent->is_weighed)
                        <div class="text">{{ $sessionComponent->weighed_value }}</div>
                    @endif
                </div>
                <div class="thumb">
                    <img src="{{ $sessionComponent->component->image_url }}" alt="" loading="lazy">
                </div>
                <div class="name">{{ $sessionComponent->component->name }}</div>
            </div>
        @endforeach


    </div>
</div>
@script
<script>
    $wire.on('session-component-moved-to-scales', () => {
        console.log('table::session-component-moved-to-scales');
        window.table_choose_mode = null;
    });
</script>
@endscript