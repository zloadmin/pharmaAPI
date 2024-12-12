<div class="total_data">
    <div class="status">Статус = <span>Дефол</span></div>

    <div class="val">
        <span id="scales-value"
{{--              data-scales-weight-calibration="{{ $scalesWeightCalibration }}"--}}
{{--              data-scales-weight-of-components="{{ $scalesWeightOfComponents }}"--}}
{{--              data-scales-range-value="{{ $scalesRangeValue }}"--}}
{{--              data-scales-weight="{{ $scalesWeight }}"--}}
        >
            {{ number_format($scalesWeight, 4) }}
{{--            {{ sprintf('%03d.%04d', $scalesWeight, $scalesWeight - floor($scalesWeight)) }}--}}
        </span> <small>г</small>
    </div>


    <form wire:submit.prevent="submit">
        <div class="btns">
            <button class="btn border" type="button" wire:click="calibration">Тарировать</button>
            <button class="btn" type="button" wire:click="weigh">Взвесить</button>
        </div>
    </form>
</div>