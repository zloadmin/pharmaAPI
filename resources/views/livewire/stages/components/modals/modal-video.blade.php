<div class="exhaust_modal object_modal video" id="vidoe_modal" style="display: {{ $isShow ? 'block' : 'none' }}">
    @if ($isShow)
        <button class="close_btn" type="button" wire:click="$dispatch('hide-modal-video')">
            <svg class="icon">
                <use xlink:href="/web/images/sprite.svg#ic_close"></use>
            </svg>
        </button>

        <div class="video" style="width: 100%; height: 100%; object-fit: fill">
            <video controls autoplay style="width: 100%; max-height: 100%">
                <source src="/storage/videos/{{ $fileName }}" type="video/mp4">
            </video>
        </div>

    @endif
</div>