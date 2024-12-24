<section class="modal fancybox__content modal_static" id="notepad_modal" @if ($isShow) style="display: block" @endif>
    @if ($isShow)
        <div class="modal_title">Блокнот</div>
        <div class="modal_desc">Заметки будут здесь храниться только в текущей сесии (до перезагрузки браузера)</div>

        <div class="list">
            <div class="item" style="max-height: 300px; overflow: auto">
                @foreach(explode(PHP_EOL, $this->notepad_text) as $line)
                    <p>{{ $line }}</p>
                @endforeach
            </div>
        </div>

        <form wire:submit.prevent="addText" class="form">
            <div class="line">
                <div class="field">
                    <input type="text" wire:model="text" class="input" placeholder="Начните вводить ваш текст">
                </div>
            </div>
        </form>
        <button class="f-button is-close-btn" title="Закрыть" type="button" wire:click="$dispatch('hide-modal-notepad')">
            <svg><use xlink:href="/web/images/sprite.svg#ic_close"></use></svg>
        </button>
    @endif
</section>