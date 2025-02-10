<p>Компоненты весовой для разблокировки комнаты "Хроматограф"</p>
<div class="row mb-3">
    <div class="col-md-12">
        <button class="btn btn-success" type="button" wire:click="addCookingComponents">Добавить</button>
    </div>
</div>

@foreach($cookingComponents as $index => $cookingComponent)
    @include('livewire.admin.pages.laboratory.laboratory-form-tabs.laboratory-form-tab-cooking-components.cooking-component')
@endforeach