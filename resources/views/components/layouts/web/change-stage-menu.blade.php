<livewire:stages.menu.change-stage-menu :session="$session" />
{{--<section class="select_room_modal" :class="isVisibleMenu ? 'show' : ''">--}}
{{--    <button class="close_btn" x-on:click="isVisibleMenu =! isVisibleMenu">--}}
{{--        <svg class="icon">--}}
{{--            <use xlink:href="/web/images/sprite.svg#ic_close"></use>--}}
{{--        </svg>--}}
{{--    </button>--}}

{{--    <div class="scroll">--}}
{{--        <div class="title">Выбрать комнату</div>--}}

{{--        <div class="items">--}}
{{--            <div>--}}
{{--                <a href="{{ route('index-stage', $session) }}">--}}
{{--                    <div class="number"><span></span></div>--}}
{{--                    <div>Лаборатория</div>--}}
{{--                </a>--}}
{{--            </div>--}}

{{--            <div>--}}
{{--                <a href="{{ $sessionModel->is_lock_stage ? '#' : route('storage-stage', $session)}}"--}}
{{--                   class="{{ $sessionModel->is_lock_stage ? 'locked'  : ''}}"--}}
{{--                   wire:navigate--}}
{{--                >--}}
{{--                    <div class="number"><span></span></div>--}}
{{--                    <div>Склад</div>--}}
{{--                </a>--}}
{{--            </div>--}}

{{--            <div>--}}
{{--                <a href="{{ $sessionModel->is_lock_weighting ? '#' : route('weighting-stage', $session)}}"--}}
{{--                       class="{{ $sessionModel->is_lock_weighting ? 'locked'  : ''}}"--}}
{{--                       wire:navigate--}}
{{--                    >--}}
{{--                    <div class="number"><span></span></div>--}}
{{--                    <div>Весовая</div>--}}
{{--                </a>--}}
{{--            </div>--}}

{{--            <div>--}}
{{--                <a href="{{ route('cooking-stage', $session) }}" wire:navigate>--}}
{{--                    <div class="number"><span></span></div>--}}
{{--                    <div>Приготовление растворов</div>--}}
{{--                </a>--}}
{{--            </div>--}}

{{--            <div><a href="{{ route('chromatograph-stage', $session) }}" wire:navigate>--}}
{{--                    <div class="number"><span></span></div>--}}
{{--                    <div>Хроматограф</div>--}}
{{--                </a></div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}