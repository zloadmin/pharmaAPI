<div>
    @foreach($components as $component)
        @switch($component->type)
            @case(\App\Enums\StorageComponent\StorageComponentType::Stuff)
                <livewire:stages.storage-stage.storage-components.component-stuff :component='$component'
                                                                                  :session='$session'/>
                @break
            @case(\App\Enums\StorageComponent\StorageComponentType::Loose)
                <livewire:stages.storage-stage.storage-components.component-loose :component='$component'
                                                                                  :session='$session'/>
                @break
            @case(\App\Enums\StorageComponent\StorageComponentType::Liquid)
                <livewire:stages.storage-stage.storage-components.component-liquid :component='$component'
                                                                                   :session='$session'/>
                @break
        @endswitch
    @endforeach
</div>


