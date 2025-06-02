<!--- ФИО Field --->
<div class="form-group mb-2">
    <label for="full_name">ФИО</label>
    <input class="form-control @error('full_name') is-invalid @enderror" type="text" wire:model="full_name">
    @error('full_name')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<!--- Email Field --->
<div class="form-group mb-2">
    <label for="email">Email</label>
    <input class="form-control @error('email') is-invalid @enderror" type="email" wire:model="email">
    @error('email')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<!--- Пароль Field --->
<div class="form-group mb-2">
    <label for="password">Пароль</label>
    <input class="form-control @error('password') is-invalid @enderror" type="password" wire:model="password">
    @error('password')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<!--- Подтверждение пароля Field --->
<div class="form-group mb-2">
    <label for="password_confirmation">Подтверждение пароля</label>
    <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password"
           wire:model="password_confirmation">
    @error('password_confirmation')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<!--- Группа Field --->
<div class="form-group">
    <label for="group_id">Группа</label>
    <select class="form-control @error('group_id') is-invalid @enderror" wire:model="group_id">
        <option value=""></option>
        @foreach($groups as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>
    @error('group_id')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!--- Дата рождения Field --->
<div class="form-group mb-2">
    <label for="date_of_birth">Дата рождения</label>
    <input class="form-control @error('date_of_birth') is-invalid @enderror" type="date" wire:model="date_of_birth">
    @error('date_of_birth')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
