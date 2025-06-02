<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <button type="button" class="btn btn-danger mb-2" wire:click="$dispatch('showModal', {data: {'alias' : 'modals.group.create-group-modal'}})">
                Создать
            </button>
        </div>
    </div>

    <livewire:data-tables.groups-table />
</div>
