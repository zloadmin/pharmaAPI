<div class="row">
    @foreach(\App\Models\Laboratory::$chromatographTableItemTypes as $name => $data)
        <div class="col-md-2">
            <!--- {{ $data['title'] }} Field --->
            <div class="form-group">
                <label for="chromatographTableItems.{{ $index }}.{{ $name }}">{{ $data['title'] }}</label>
                <input class="form-control @error('chromatographTableItems.'. $index .'.' . $name) is-invalid @enderror"
                       type="number" min="0.00" step="0.01" wire:model="chromatographTableItems.{{ $index }}.{{ $name }}">
                @error('chromatographTableItems.'. $index .'.' . $name)
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    @endforeach
    <div class="col-md-2">
        <label>&nbsp;</label>
        <button type="button" class="btn btn-danger w-100" wire:click="deleteChromatographTableItem({{ $index }})">Удалить</button>
    </div>
</div>