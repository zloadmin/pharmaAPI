<section class="home_page">
    <div class="rooms">
        <a href="{{ route('storage-stage', $session) }}" wire:navigate>
            <span>Склад</span>
        </a>

        <a href="{{ route('storage-stage', $session) }}" wire:navigate>
            <span>Весовая</span>
        </a>

        <a href="{{ route('storage-stage', $session) }}" wire:navigate>
            <span>Приготовление<br> растворов</span>
        </a>

        <a href="{{ route('storage-stage', $session) }}" wire:navigate>
            <span>Хроматограф</span>
        </a>
    </div>



    <img src="/web/images/tmp/home_page_img.jpg" alt="" loading="lazy" class="img">
</section>