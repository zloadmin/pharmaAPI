<div class="exhaust_modal object_modal result" id="result_modal" style="display: {{ $isShow ? 'block' : 'none' }}">
    @if ($isShow)
        <button class="close_btn" type="button" wire:click="$dispatch('hide-modal-result')">
            <svg class="icon">
                <use xlink:href="/web/images/sprite.svg#ic_close"></use>
            </svg>
        </button>

        <div class="video" style="width: 100%; height: auto; ">
            <img src="/web/images/results/graph_1.png" alt="" style="width: 65%; float: left; vertical-align: top">
            <img src="/web/images/results/table_1.png" alt="" style="width: 30%; float: right; vertical-align: top">
        </div>

    @endif
</div>