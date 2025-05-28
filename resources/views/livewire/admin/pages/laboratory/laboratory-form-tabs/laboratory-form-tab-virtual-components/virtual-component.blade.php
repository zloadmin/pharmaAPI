<div class="row">
    <div class="col-md-4">
        <!--- Название Field --->
        <div class="form-group">
            <label for="virtualComponents.{{ $index }}.name">Название</label>
            <input class="form-control @error('virtualComponents.'. $index .'.name') is-invalid @enderror" type="text" wire:model="virtualComponents.{{ $index }}.name">
            @error('virtualComponents.'. $index .'.name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-3">
        <!--- Первый компонент Field --->
        <div class="form-group">
            <label for="virtualComponents.{{ $index }}.virtual_component_left_id">Первый компонент</label>
            <select class="form-control @error('virtualComponents.'. $index .'.virtual_component_left_id') is-invalid @enderror" wire:model="virtualComponents.{{ $index }}.virtual_component_left_id">
                <option value=""></option>
                @foreach($filledVirtualComponents as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
            @error('virtualComponents.'. $index .'.virtual_component_left_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-3">
        <!--- Второй компонент Field --->
        <div class="form-group">
            <label for="virtualComponents.{{ $index }}.virtual_component_right_id">Второй компонент</label>
            <select class="form-control @error('virtualComponents.'. $index .'.virtual_component_right_id') is-invalid @enderror" wire:model="virtualComponents.{{ $index }}.virtual_component_right_id">
                <option value=""></option>
                @foreach($filledVirtualComponents as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
            @error('virtualComponents.'. $index .'.virtual_component_right_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-2">
        <label>&nbsp;</label>
        <button type="button" class="btn btn-danger w-100" wire:click="deleteVirtualComponent({{ $index }})">Удалить</button>
    </div>
</div>
