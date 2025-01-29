<div class="row">
    <div class="col-md-4">
        <!--- Название Field --->
        <div class="form-group">
            <label for="mobilePhases.{{ $index }}.name">Название</label>
            <input class="form-control @error('mobilePhases.'. $index .'.name') is-invalid @enderror" type="text" wire:model="mobilePhases.{{ $index }}.name">
            @error('mobilePhases.'. $index .'.name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-3">
        <!--- Первый компонент Field --->
        <div class="form-group">
            <label for="mobilePhases.{{ $index }}.first_component_id">Первый компонент</label>
            <select class="form-control @error('mobilePhases.'. $index .'.first_component_id') is-invalid @enderror" wire:model="mobilePhases.{{ $index }}.first_component_id">
                <option value=""></option>
                @foreach($filledComponents as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
            @error('mobilePhases.'. $index .'.first_component_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-3">
        <!--- Второй компонент Field --->
        <div class="form-group">
            <label for="mobilePhases.{{ $index }}.second_component_id">Второй компонент</label>
            <select class="form-control @error('mobilePhases.'. $index .'.second_component_id') is-invalid @enderror" wire:model="mobilePhases.{{ $index }}.second_component_id">
                <option value=""></option>
                @foreach($filledComponents as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
            @error('mobilePhases.'. $index .'.second_component_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-2">
        <label>&nbsp;</label>
        <button type="button" class="btn btn-danger w-100" wire:click="deleteMobilePhase({{ $index }})">Удалить</button>
    </div>
</div>