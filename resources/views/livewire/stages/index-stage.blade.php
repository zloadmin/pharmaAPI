<div class="main">
    @include('components.layouts.web.header')
    @include('components.layouts.web.change-stage-menu')
    <section class="home_page">
        <div class="rooms">
            <a href="{{ route('storage-stage', $session) }}" wire:navigate>
                <span>Склад</span>
            </a>

            <a href="{{ route('weighting-stage', $session) }}" wire:navigate>
                <span>Весовая</span>
            </a>

            <a href="#" wire:navigate>
                <span>Приготовление<br> растворов</span>
            </a>

            <a href="#" wire:navigate>
                <span>Хроматограф</span>
            </a>
        </div>



        <img src="/web/images/tmp/home_page_img.jpg" alt="" loading="lazy" class="img">
    </section>
</div>