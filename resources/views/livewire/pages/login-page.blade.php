<div class="card-body p-4">
    <div class="text-center w-75 m-auto">
        <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Вход</h4>
        <p class="text-muted mb-4">Введите email и пароль.</p>
    </div>

    <form wire:submit.prevent="login">
        <!--- Email address Field --->
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input class="form-control @error('email') is-invalid @enderror" type="email" wire:model="email" id="email" placeholder="Введите ваш email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!--- Password Field --->
        <div class="form-group mb-3">
            <label for="password">Пароль</label>
            <input class="form-control @error('password') is-invalid @enderror" type="password" wire:model="password" placeholder="Введите ваш пароль" id="password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group mb-3">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="remember" id="remember" wire:model="remember">
                <label class="custom-control-label" for="remember">Запомнить меня</label>
            </div>
        </div>


        <div class="form-group mb-0 text-center">
            <button class="btn btn-primary" wire:loading.attr="disabled" wire:target="login">
                <div wire:loading.delay wire:target="login">
                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    Загрузка
                </div>
                <div wire:loading.delay.remove wire:target="login">
                    Вход
                </div>
            </button>
        </div>
    </form>
</div>
