<div class="exhaust_modal object_modal video" id="vidoe_modal" style="display: {{ $isShow ? 'block' : 'none' }}">
    @if ($isShow)
        <button class="close_btn" type="button" wire:click="$dispatch('hide-modal-video')">
            <svg class="icon">
                <use xlink:href="/web/images/sprite.svg#ic_close"></use>
            </svg>
        </button>

        <div class="video">
            video here {{ $url }}
        </div>

    @endif
</div>