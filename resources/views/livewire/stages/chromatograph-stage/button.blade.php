<button class="btn no {{ $disabled ? 'disabled' : '' }}" type="button"
        @if ($on_click && !$disabled)
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
{{--        <div class="desc">{{ $enum->value }}</div>--}}
{{--        @if ($on_click && !$disabled)--}}
{{--            <div class="desc">{{ $on_click }}</div>--}}
{{--        @endif--}}
    </div>
</button>