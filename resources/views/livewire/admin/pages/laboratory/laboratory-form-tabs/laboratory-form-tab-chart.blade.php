<!--- Изображение графика Field --->
<div class="form-group">
    <label for="chart_image">Изображение графика</label>
    <input class="form-control-file @error('chart_image') is-invalid @enderror" type="file" wire:model="chart_image">
    @error('chart_image')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


@if($chart_image)
    <img src="{{ $chart_image->temporaryUrl() }}" class="img-fluid img-thumbnail mb-2" alt="">
@elseif($exists_chart_image)
    <img src="{{ $exists_chart_image }}" class="img-fluid img-thumbnail mb-2" alt="">
@endif