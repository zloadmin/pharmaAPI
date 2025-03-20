<div class="row">
    <div class="col-md-4">
        <!--- Название Field --->
        <div class="form-group">
            <label for="checkValues.{{ $index }}.name">Название</label>
            <input class="form-control @error('checkValues.'. $index .'.name') is-invalid @enderror" type="text" wire:model="checkValues.{{ $index }}.name">
            @error('checkValues.'. $index .'.name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-3">
        <!--- Минимальное значение Field --->
        <div class="form-group">
            <label for="checkValues.{{ $index }}.value_min">Минимальное значение</label>
            <input class="form-control @error('checkValues.'. $index .'.value_min') is-invalid @enderror" type="number" min="0.0000" max="9999.9999" step="0.0001" placeholder="0.0001" wire:model="checkValues.{{ $index }}.value_min" >
            @error('checkValues.'. $index .'.value_min')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-3">
        <!--- Максимальное значение Field --->
        <div class="form-group">
            <label for="checkValues.{{ $index }}.value_max">Максимальное значение</label>
            <input class="form-control @error('checkValues.'. $index .'.value_max') is-invalid @enderror" type="number" min="0.0001" max="9999.9999" step="0.0001" placeholder="0.0002" wire:model="checkValues.{{ $index }}.value_max">
            @error('checkValues.'. $index .'.value_max')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-2">
        <label>&nbsp;</label>
        <button type="button" class="btn btn-danger w-100" wire:click="deleteCheckValue({{ $index }})">Удалить</button>
    </div>
</div>