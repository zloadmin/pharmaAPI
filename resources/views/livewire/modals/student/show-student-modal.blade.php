<div>
    <div class="modal-header">
        <h5 class="modal-title">Карта студента </h5>
        <button type="button" wire:click="$dispatch('hideModal')" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="text-start">
            <p class="text-muted"><strong>ID:</strong> <span class="ms-2">{{ $student->id }}</span></p>
            <p class="text-muted"><strong>Email:</strong> <span class="ms-2">{{ $student->email }}</span></p>
            <p class="text-muted"><strong>ФИО:</strong> <span class="ms-2">{{ $student->full_name }}</span></p>
            <p class="text-muted"><strong>Дата рождения:</strong> <span class="ms-2">{{ $student->date_of_birth ? $student->date_of_birth->format('d.m.Y') : '' }}</span></p>
            <p class="text-muted"><strong>Группа:</strong> <span class="ms-2">{{ $student->group->name ?? '' }}</span></p>
            <p class="text-muted"><strong>Создан:</strong> <span class="ms-2">{{ $student->created_at->diffForHumans() }}</span></p>
            <p class="text-muted"><strong>Изменен:</strong> <span class="ms-2">{{ $student->updated_at->diffForHumans() }}</span></p>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  wire:click="$dispatch('hideModal')">Закрыть</button>
    </div>
</div>
