<div class="row mb-3">
    <div class="col-md-12">
        <button class="btn btn-success" type="button" wire:click="addTask">Добавить</button>
    </div>
</div>

@foreach($tasks as $index => $task)
    @include('livewire.admin.pages.laboratory.laboratory-form-tabs.laboratory-form-tab-tasks.task')
@endforeach
