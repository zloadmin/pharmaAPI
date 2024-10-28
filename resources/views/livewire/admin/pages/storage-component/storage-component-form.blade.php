<form wire:submit.prevent="save">
    <!--- Назавние Field --->
    <div class="form-group">
        <label for="name">Назавние</label>
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
        <textarea class="form-control @error('description') is-invalid @enderror" wire:model="description"></textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!--- Тип Field --->
    <div class="form-group">
        <label for="type">Тип</label>
        <select class="form-control @error('type') is-invalid @enderror" wire:model="type">
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