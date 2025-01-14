<section class="select_room_modal" :class="isVisibleMenu ? 'show' : ''">
    <button class="close_btn" x-on:click="isVisibleMenu =! isVisibleMenu">
        <svg class="icon">
            <use xlink:href="/web/images/sprite.svg#ic_close"></use>
        </svg>
    </button>

    <div class="scroll">
        <div class="title">Выбрать комнату</div>

        <div class="items">

            @foreach(\App\Enums\Stages\Stage::cases() as $stage)
                <div>
                    <a href="{{ $sessionModel->isLockStage($stage) ? '#' : route($stage->value . '-stage', $session)}}"
                       class="{{ $sessionModel->isLockStage($stage) ? 'locked'  : ''}}"
                       wire:navigate
                    >
                        <div class="number"><span></span></div>
                        <div>{{ $stage->label() }}</div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
