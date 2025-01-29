
<div class="row mb-3">
    <div class="col-md-12">
        <button class="btn btn-success" type="button" wire:click="addMobilePhase">Добавить</button>
    </div>
</div>

@foreach($mobilePhases as $index => $mobilePhase)
    @include('livewire.admin.pages.laboratory.laboratory-form-tabs.laboratory-form-tab-mobile-phases.mobile-phase')
@endforeach