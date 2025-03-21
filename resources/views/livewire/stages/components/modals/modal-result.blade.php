<div class="exhaust_modal object_modal result" id="result_modal" style="display: {{ $isShow ? 'block' : 'none' }}">
    @if ($isShow)
        <button class="close_btn" type="button" wire:click="$dispatch('hide-modal-result')">
            <svg class="icon">
                <use xlink:href="/web/images/sprite.svg#ic_close"></use>
            </svg>
        </button>
        @if ($laboratory->hasChartImage())
            <div class="video" style="width: 100%; height: auto; ">
                <img src="{{ $laboratory->getChartImageUrl() }}" alt="" style="max-width: 99%;">
            </div>
        @endif
    @endif
</div>