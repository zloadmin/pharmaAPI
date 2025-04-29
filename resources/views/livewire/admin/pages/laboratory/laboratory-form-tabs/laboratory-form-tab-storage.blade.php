{{--<!--- Компаненты Field --->--}}
{{--<div class="form-group">--}}
{{--    <label for="storage_component_ids">Компоненты</label>--}}
{{--    <select class="form-control @error('component_ids') is-invalid @enderror"--}}
{{--            wire:model="component_ids" multiple style="height: 600px">--}}
{{--        @foreach($components as $id => $name)--}}
{{--            <option value="{{ $id }}">{{ $name }}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}
{{--    @error('storage_component_ids')--}}
{{--    <span class="invalid-feedback" role="alert">--}}
{{--            <strong>{{ $message }}</strong>--}}
{{--        </span>--}}
{{--    @enderror--}}
{{--</div>--}}

@foreach($components as $component)
    <!--- {{ $name }} Field --->
    <div class="form-check">
        <input class="form-check-input @error('component_ids.' .  $component['id']) is-invalid @enderror" type="checkbox"
               wire:model="component_ids"  value="{{ $component['id'] }}" id="checkbox_component_ids_{{ $component['id'] }}">
        <label class="form-check-label" for="checkbox_component_ids_{{ $component['id'] }}">
            {{ $component['name'] }}
        </label>
        @error('component_ids.' .  $component['id'])
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
@endforeach