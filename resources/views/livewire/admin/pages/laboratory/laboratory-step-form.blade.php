<div>
    <form wire:submit.prevent="save">
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

        <button class="btn btn-primary" wire:loading.attr="disabled" wire:target="save">
            <div wire:loading.delay wire:target="save">
                <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                Загрузка...
            </div>
            <div wire:loading.delay.remove wire:target="save">
                Сохранить
            </div>
        </button>
    </form>

</div>
