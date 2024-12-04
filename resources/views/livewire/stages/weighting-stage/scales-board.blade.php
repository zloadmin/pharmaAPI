<div class="total_data">
    <div class="status">Статус = <span>Дефолт ( $weight {{ $weight }} $value {{ $value }})</span></div>

    <div class="val">
        <span id="scales-value" data-current-value="{{ $weight}}">
{{--            {{ $weight + $value }}--}}
{{--            {{  }}--}}
            {{ sprintf('%03d.%04d', $weight, $weight - floor($weight)) }}
        </span> <small>г</small>
    </div>


    <form wire:submit.prevent="submit">
        <div class="btns">
            <button class="btn border" type="button" wire:click="calibration">Тарировать</button>
            <button class="btn" type="button" wire:click="weigh">Взвесить</button>
        </div>
        {{--<button class="btn btn-primary" wire:loading.attr="disabled" wire:target="">
            <div wire:loading.delay wire:target="">
                <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                Loading
            </div>
            <div wire:loading.delay.remove wire:target="">

            </div>
        </button>--}}
    </form>
</div>