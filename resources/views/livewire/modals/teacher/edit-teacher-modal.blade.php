<div>
    <div class="modal-header">
        <h5 class="modal-title">Редактировать преподавателя</h5>
        <button type="button" class="btn-close" wire:click="$dispatch('hideModal')" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        @include('livewire.modals.teacher.teacher-form')
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  wire:click="$dispatch('hideModal')">Закрыть</button>
        <button type="button" class="btn btn-primary" wire:click="save">Сохранить</button>
    </div>
</div>
