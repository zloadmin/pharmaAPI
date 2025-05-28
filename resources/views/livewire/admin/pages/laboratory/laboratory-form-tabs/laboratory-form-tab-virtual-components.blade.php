
<div class="row mb-3">
    <div class="col-md-12">
        <button class="btn btn-success" type="button" wire:click="addVirtualComponent">Добавить</button>
    </div>
</div>

@foreach($virtualComponents as $index => $virtualComponent)
    @include('livewire.admin.pages.laboratory.laboratory-form-tabs.laboratory-form-tab-virtual-components.virtual-component')
@endforeach
