<!DOCTYPE html>
<html lang="ru">
@include('components.layouts.web.head')

<body>
<div class="wrap">
    <div class="main">
        <header>
            <div class="cont row">
                <div class="current_task">
                    <div class="current">
                        <div>Текущая задача: <b>1. Заполните расчетный лист в соответсвии с фармокопейной статьей</b></div>

                        <button class="start_btn">
                            <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_video_play"></use></svg>
                            <span>начать</span>
                        </button>

                        <button class="spoler_btn">
                            <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_arr_ver"></use></svg>
                        </button>
                    </div>

                    <div class="dropdown">
                        <div class="head">
                            <div class="title">Билет № 1</div>

                            <div class="count">
                                <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_tasks"></use></svg>
                                <span>6 задач</span>
                            </div>
                        </div>

                        <div class="items">
                            <div class="active">
                                <div class="number"></div>
                                <div>Начало</div>
                            </div>

                            <div class="active">
                                <div class="number"></div>
                                <div>Введение</div>
                            </div>

                            <div>
                                <div class="number"></div>
                                <div>Смешивание базовых инглидиентов</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="menu_wrap">
                    <button class="menu_btn">
                        <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_menu"></use></svg>
                        <span>меню</span>
                    </button>

                    <div class="menu">
                        <div class="menu_item">
                            <a href="/">
                                <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_menu1"></use></svg>
                                <span><b>ФС</b></span>
                            </a>
                        </div>

                        <div class="divider"></div>

                        <div class="menu_item">
                            <a href="/">
                                <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_menu2"></use></svg>
                                <span>Задание</span>
                            </a>
                        </div>

                        <div class="menu_item">
                            <a href="/">
                                <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_menu3"></use></svg>
                                <span>Блокнот</span>
                            </a>
                        </div>

                        <div class="menu_item">
                            <a href="/">
                                <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_menu4"></use></svg>
                                <span>Расчетный лист</span>
                            </a>
                        </div>

                        <div class="menu_item">
                            <a href="/">
                                <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_menu5"></use></svg>
                                <span>Таблица менделеева</span>
                            </a>
                        </div>
                    </div>
                </div>

                <button class="select_room">
                    <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_menu6"></use></svg>
                    <span>Выбрать комнату</span>
                </button>
            </div>
        </header>


        <section class="home_page">
            <div class="rooms">
                <a href="{{ route('storage-stage', $session) }}" wire:navigate>
                    <span>Склад</span>
                </a>

                <a href="/">
                    <span>Весовая</span>
                </a>

                <a href="/">
                    <span>Приготовление<br> растворов</span>
                </a>

                <a href="/">
                    <span>Хроматограф</span>
                </a>
            </div>

            <div class="bottom">
                <div class="cont">
                    <div class="data"></div>
                </div>
            </div>

            <img src="/web/images/tmp/home_page_img.jpg" alt="" loading="lazy" class="img">
        </section>
    </div>
</div>


<!-- Connecting javascript files -->
@include('components.layouts.web.scripts')
</body>
</html>