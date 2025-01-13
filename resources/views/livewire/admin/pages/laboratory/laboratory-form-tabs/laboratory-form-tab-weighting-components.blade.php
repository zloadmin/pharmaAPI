<p>Компоненты весовой для разблокировки комнаты "Приготовление растворов"</p>
<div class="row mb-3">
    <div class="col-md-12">
        <button class="btn btn-success" type="button" wire:click="addWeightingComponents">Добавить</button>
    </div>
</div>

@foreach($weightingComponents as $index => $weightingComponent)
    @include('livewire.admin.pages.laboratory.laboratory-form-tabs.laboratory-form-tab-weighting-components.weighting-component')
@endforeach