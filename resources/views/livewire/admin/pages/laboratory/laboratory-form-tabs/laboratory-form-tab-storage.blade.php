<!--- Компаненты Field --->
<div class="form-group">
    <label for="storage_component_ids">Компоненты</label>
    <select class="form-control @error('component_ids') is-invalid @enderror"
            wire:model="component_ids" multiple style="height: 600px">
        @foreach($components as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>
    @error('storage_component_ids')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>