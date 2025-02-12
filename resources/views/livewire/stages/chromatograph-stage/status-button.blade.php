<button class="btn no {{ $status->isDisabled() ? 'disabled' : '' }}" type="button"
        @if (!$status->isOn())
            wire:click="{{ $status->onClick() }}"
        @endif
>
    <div class="status">
        @if($status->isOn())
            <div class="green"></div>
        @else
            <div class="red"></div>
        @endif
    </div>
    @if($status->getIconHref())
        <div class="icon small">
            <svg><use xlink:href="{{ $status->getIconHref() }}"></use></svg>
        </div>
    @endif

    <div>
        <div class="name">{{ $status->getTitle() }}</div>

        <div class="desc">{{ $status->getDescription() }}</div>
    </div>
</button>