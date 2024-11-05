<form wire:submit.prevent="save">
    <!--- Назавние Field --->
    <div class="form-group">
        <label for="name">Назавние</label>
        <input class="form-control @error('name') is-invalid @enderror" type="text" wire:model="name" required>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!--- Короткое название Field --->
    <div class="form-group">
        <label for="short_name">Короткое название</label>
        <input class="form-control @error('short_name') is-invalid @enderror" type="text" wire:model="short_name" maxlength="15" required>
        @error('short_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!--- Описание Field --->
    <div class="form-group">
        <label for="description">Описание</label>
        <textarea class="form-control @error('description') is-invalid @enderror" wire:model="description" required></textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!--- Тип Field --->
    <div class="form-group">
        <label for="type">Тип</label>
        <select class="form-control @error('type') is-invalid @enderror" wire:model="type" required>
            <option value=""></option>
            @foreach(\App\Enums\StorageComponent\StorageComponentType::cases() as $item)
                <option value="{{ $item }}">{{ $item->label() }}</option>
            @endforeach
        </select>
        @error('type')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!--- Изображение Field --->
    <div class="form-group">
        <label for="image">Изображение</label>
        <input class="form-control-file @error('image') is-invalid @enderror" type="file" wire:model="image">
        @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!--- Отступ сверху % Field --->
    <div class="form-group">
        <label for="top">Отступ сверху</label>
        <div class="input-group">
            <input class="form-control @error('padding_top') is-invalid @enderror" type="number" min="0.001" max="100" step="0.001" wire:model="padding_top">
            <div class="input-group-append">
                <span class="input-group-text">%</span>
            </div>
        </div>
        @error('padding_top')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!--- Отступ справа % Field --->
    <div class="form-group">
        <label for="top">Отступ справа</label>
        <div class="input-group">
            <input class="form-control @error('padding_right') is-invalid @enderror" type="number" min="0.001" max="100" step="0.001" wire:model="padding_right">
            <div class="input-group-append">
                <span class="input-group-text">%</span>
            </div>
        </div>
        @error('padding_right')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button class="btn btn-primary pull-right float-right" wire:loading.attr="disabled" wire:target="save">
        <div wire:loading.delay wire:target="save">
            <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
            Загрузка...
        </div>
        <div wire:loading.delay.remove wire:target="save">
            Сохранить
        </div>
    </button>
</form>