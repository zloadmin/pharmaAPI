<div class="exhaust_modal object_modal big" id="mixer_modal" style="display: {{ $isShow ? 'block' : 'none' }}">
    @if ($isShow)
        <button class="close_btn" type="button" wire:click="$dispatch('hide-modal-mixer')">
            <svg class="icon">
                <use xlink:href="/web/images/sprite.svg#ic_close"></use>
            </svg>
        </button>

        <div class="title">Взаимойдествие с мешалкой</div>
        @if ($sessionComponent)
            <div class="border">
                <button class="remove_btn" type="button" wire:click="moveToCookingTable('{{ $sessionComponent->place }}')">
                    <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_remove"></use></svg>
                </button>

                <div class="name">{{ $sessionComponent->getName() }}</div>

                <div class="overflow">
                    <div class="thumb">
                        <img src="{{ $sessionComponent->getImageUrl() }}" alt="" loading="lazy">
                    </div>

                    <div class="type">Тип: <span>{{ $sessionComponent->getTypeLabel() }}</span></div>
                </div>

                <div class="status">
                    <div class="label">Статус:</div>
                    <div class="val">{!! $sessionComponent->getStatus() !!}</div>
                </div>
            </div>
            <div class="bottom">
                <div class="progress">
                    <div style="width: 50%;"></div>
                </div>

                <div class="range time">
                    <div class="label">Время (сек)</div>
                    <input type="hidden" id="timeRange" name="time" value="">
                </div>

                <div class="btns">
                    <button class="btn" type="button" wire:click="run">
                        <svg class="icon">
                            <use xlink:href="/web/images/sprite.svg#ic_video_play"></use>
                        </svg>
                        <span>Запустить</span>
                    </button>
                </div>
            </div>
        @else
            <div class="border empty">
                <button class="add_btn" type="button" wire:click="setMixerChooseMode">
                    <span class="icon">+</span>
                    <span>Кликните здесь, чтобы добавить объект для взаимодействия</span>
                </button>
            </div>
        @endif

    @endif
</div>
@script
<script>
    $wire.on('mixer-init', () => {
        console.log('mixer::mixer-init');
        setTimeout(initTimeRange, 100);
    });

</script>
@endscript
