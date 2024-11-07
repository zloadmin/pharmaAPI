<!--- Название Field --->
<div class="form-group">
    <label for="name">Название</label>
    <input class="form-control @error('name') is-invalid @enderror" type="text" wire:model="name">
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<!--- Описание Field --->
<div class="form-group">
    <label for="description">Описание</label>
    <textarea class="form-control @error('description') is-invalid @enderror" wire:model="description" style="height: 300px"></textarea>
    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>