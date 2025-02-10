<div class="row">
    <div class="col-md-3">
        <!--- Компонент Field --->
        <div class="form-group">
            <label for="cookingComponents.{{ $index }}.stuff_component_id">Компонент</label>
            <select class="form-control @error('cookingComponents.'. $index .'.component_id') is-invalid @enderror" wire:model="cookingComponents.{{ $index }}.component_id">
                <option value=""></option>
                @foreach($components as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
            @error('cookingComponents.'. $index .'.component_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-3"></div>
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>
    <div class="col-md-2">
        <label>&nbsp;</label>
        <button type="button" class="btn btn-danger w-100" wire:click="deleteCookingComponent({{ $index }})">Удалить</button>
    </div>
</div>