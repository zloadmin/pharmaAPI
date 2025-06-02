<!--- Название Field --->
<div class="form-group mb-2">
    <label for="name">Название</label>
    <input class="form-control @error('full_name') is-invalid @enderror" type="text" wire:model="name">
    @error('name')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

