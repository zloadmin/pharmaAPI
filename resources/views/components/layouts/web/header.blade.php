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
                    <button class="btn modal_btn" data-modal="tasks_modal">
                        <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_menu2"></use></svg>
                        <span>Задание</span>
                    </button>
                </div>

                <div class="menu_item">
                    <button class="btn modal_btn" data-modal="notepad_modal">
                        <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_menu3"></use></svg>
                        <span>Блокнот</span>
                    </button>
                </div>

                <div class="menu_item">
                    <button class="btn modal_btn" data-modal="pay_slip_modal">
                        <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_menu4"></use></svg>
                        <span>Расчетный лист</span>
                    </button>
                </div>

                <div class="menu_item">
                    <button class="btn modal_btn" data-modal="periodic_table_modal">
                        <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_menu5"></use></svg>
                        <span>Таблица менделеева</span>
                    </button>
                </div>
            </div>
        </div>

        <button class="select_room_btn" x-on:click="isVisibleMenu =! isVisibleMenu" >
            <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_menu6"></use></svg>
            <span>Выбрать комнату</span>
        </button>
    </div>
</header>