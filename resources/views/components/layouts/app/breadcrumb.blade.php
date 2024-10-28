@if(isset($breadcrumb) && is_array($breadcrumb))
    <ol class="breadcrumb m-0">
        @foreach($breadcrumb as $link => $name)
            <li class="breadcrumb-item{{ $loop->last ? ' active' : ''}}">
                @if($loop->last)
                    {{ $name }}
                @else
                    <a href="{{ $link }}" wire:navigate>
                        {{ $name }}
                    </a>
                @endif
            </li>
        @endforeach
    </ol>
@endif
