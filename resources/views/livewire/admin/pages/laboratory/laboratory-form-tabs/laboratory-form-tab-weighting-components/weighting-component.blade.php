<div class="row">
    <div class="col-md-3">
        <!--- Посуда Field --->
        <div class="form-group">
            <label for="weightingComponents.{{ $index }}.stuff_component_id">Посуда</label>
            <select class="form-control @error('weightingComponents.'. $index .'.stuff_component_id') is-invalid @enderror" wire:model="weightingComponents.{{ $index }}.stuff_component_id">
                <option value=""></option>
                @foreach($stuffComponents as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
            @error('weightingComponents.'. $index .'.stuff_component_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-3">
        <!--- Наполнение Field --->
        <div class="form-group">
            <label for="weightingComponents.{{ $index }}.filled_component_id">Наполнение</label>
            <select class="form-control @error('weightingComponents.'. $index .'.filled_component_id') is-invalid @enderror" wire:model="weightingComponents.{{ $index }}.filled_component_id">
                <option value=""></option>
                @foreach($filledComponents as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
            @error('weightingComponents.'. $index .'.filled_component_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-2">
        <!--- Минимальное значение Field --->
        <div class="form-group">
            <label for="weightingComponents.{{ $index }}.value_min">Минимальное значение</label>
            <input class="form-control @error('weightingComponents.'. $index .'.value_min') is-invalid @enderror" type="number" min="0.0001" max="9999.9999" step="0.0001" placeholder="0.0001" wire:model="weightingComponents.{{ $index }}.value_min" >
            @error('weightingComponents.'. $index .'.value_min')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-2">
        <!--- Максимальное значение Field --->
        <div class="form-group">
            <label for="weightingComponents.{{ $index }}.value_max">Максимальное значение</label>
            <input class="form-control @error('weightingComponents.'. $index .'.value_max') is-invalid @enderror" type="number" min="0.0001" max="9999.9999" step="0.0001" placeholder="0.0002" wire:model="weightingComponents.{{ $index }}.value_max">
            @error('weightingComponents.'. $index .'.value_max')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-2">
        <label>&nbsp;</label>
        <button type="button" class="btn btn-danger w-100" wire:click="deleteWeightingComponent({{ $index }})">Удалить</button>
    </div>
</div>