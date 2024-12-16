<button class="btn no {{ $disabled ? 'disabled' : '' }}" type="button"
        @if (!$is_on)
            wire:click="{{ $on_click }}"
        @endif
>
    <div class="status">
        @if($is_on)
            <div class="green"></div>
        @else
            <div class="red"></div>
        @endif
    </div>
    @isset($icon_href)
        <div class="icon small">
            <svg><use xlink:href="{{ $icon_href }}"></use></svg>
        </div>
    @endisset

    <div>
        <div class="name">{{ $title }}</div>

        <div class="desc">{{ $desc }}</div>
    </div>
</button>