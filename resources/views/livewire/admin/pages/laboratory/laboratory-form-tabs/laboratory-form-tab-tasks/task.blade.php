<div class="row">
    <div class="col-md-10">
        <!--- Название Field --->
        <div class="form-group">
            <label for="checkValues.{{ $index }}.name">Название задачи</label>
            <input class="form-control @error('tasks.'. $index .'.name') is-invalid @enderror" type="text" wire:model="tasks.{{ $index }}.name">
            @error('tasks.'. $index .'.name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-2">
        <label>&nbsp;</label>
        <button type="button" class="btn btn-danger w-100" wire:click="deleteTask({{ $index }})">Удалить</button>
    </div>
    <div class="col-md-10">
        <!--- Описание Field --->
        <div class="form-group">
            <label for="description">Описание задачи</label>
            <textarea class="form-control @error('tasks.'. $index .'.description') is-invalid @enderror" wire:model="tasks.{{ $index }}.description"></textarea>
            @error('tasks.'. $index .'.description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


</div>