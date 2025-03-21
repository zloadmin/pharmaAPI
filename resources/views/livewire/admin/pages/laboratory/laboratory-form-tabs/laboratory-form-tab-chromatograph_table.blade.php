<div class="row mb-3">
    <div class="col-md-12">
        <button class="btn btn-success" type="button" wire:click="addChromatographTableItem">Добавить</button>
    </div>
</div>
@foreach($chromatographTableItems as $index => $chromatographTableItem)
    @include('livewire.admin.pages.laboratory.laboratory-form-tabs.laboratory-form-tab-chromatograph_table.chromatograph-table-item')
@endforeach