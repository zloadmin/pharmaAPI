<section class="select_room_modal" :class="isVisibleMenu ? 'show' : ''">
    <button class="close_btn" x-on:click="isVisibleMenu =! isVisibleMenu">
        <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_close"></use></svg>
    </button>

    <div class="scroll">
        <div class="title">Выбрать комнату</div>

        <div class="items">
            <div><a href="{{ route('index-stage', $session) }}">
                    <div class="number"><span></span></div>
                    <div>Лаборатория</div>
                </a></div>

            <div><a href="{{ route('storage-stage', $session) }}" wire:navigate>
                    <div class="number"><span></span></div>
                    <div>Склад</div>
                </a></div>

            <div><a href="{{ route('weighting-stage', $session) }}" wire:navigate>
                    <div class="number"><span></span></div>
                    <div>Весовая</div>
                </a></div>



            <div><a href="{{ route('cooking-stage', $session) }}" wire:navigate>
                    <div class="number"><span></span></div>
                    <div>Приготовление растворов</div>
                </a></div>

            <div><a href="{{ route('chromatograph-stage', $session) }}" wire:navigate>
                    <div class="number"><span></span></div>
                    <div>Хроматограф</div>
                </a></div>




        </div>
    </div>
</section>