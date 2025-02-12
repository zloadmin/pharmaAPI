<!--- Температура колонки Field --->
<div class="form-group">
    <label for="chromatographColumnTemp">Температура колонки °C</label>
    <input class="form-control @error('chromatographColumnTemp') is-invalid @enderror" wire:model="chromatographColumnTemp"
        type="number" min="0.1" max="999.9" step="0.1" placeholder="25.0"
    >
    @error('chromatographColumnTemp')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<!--- Скорость потока Field --->
<div class="form-group">
    <label for="chromatographFlowSpeed">Скорость потока мл/мин</label>
    <input class="form-control @error('chromatographFlowSpeed') is-invalid @enderror" wire:model="chromatographFlowSpeed"
           type="number" min="0.001" max="99.999" step="0.001" placeholder="1.0"
    >
    @error('chromatographFlowSpeed')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<!--- Детектор Field --->
<div class="form-group">
    <label for="chromatographDetector">Детектор нм</label>
    <input class="form-control @error('chromatographDetector') is-invalid @enderror" wire:model="chromatographDetector"
           type="number" min="1" max="9999999" step="1" placeholder="270"
    >
    @error('chromatographDetector')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<!--- Объём пробы Field --->
<div class="form-group">
    <label for="chromatographValue">Объём пробы мкл</label>
    <input class="form-control @error('chromatographValue') is-invalid @enderror" wire:model="chromatographValue"
           type="number" min="1" max="9999999" step="1" placeholder="10"
    >
    @error('chromatographValue')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>