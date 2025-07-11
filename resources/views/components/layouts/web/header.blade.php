<header>
    <div class="cont row">
        <div class="current_task">
            <div class="current">
                <div><b>{{ $laboratory->name }}</b></div>
                <button class="start_btn" type="button">
                    <svg class="icon">
                        <use xlink:href="/web/images/sprite.svg#ic_video_play"></use>
                    </svg>
                    <span>начать</span>
                </button>

                <button class="spoler_btn" type="button" onclick="showCurrentTask()">
                    <svg class="icon">
                        <use xlink:href="/web/images/sprite.svg#ic_arr_ver"></use>
                    </svg>
                </button>
            </div>

            <div class="dropdown">
                <div class="head">
                    <div class="title">Билет № {{ $laboratory->id }}</div>

                    <div class="count">
                        <svg class="icon">
                            <use xlink:href="/web/images/sprite.svg#ic_tasks"></use>
                        </svg>
                        <span>{{ count($laboratory->tasks) }} задач</span>
                    </div>
                </div>

                <div class="items">
                    @foreach($laboratory->tasks as $task)
                        <div class="active">
                            <div class="number"></div>
                            <div>{{ $task->name }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="menu_wrap">
            <button class="menu_btn" type="button" x-on:click="isVisibleSubMenu =! isVisibleSubMenu">
                <svg class="icon">
                    <use xlink:href="/web/images/sprite.svg#ic_menu"></use>
                </svg>
                <span>меню</span>
            </button>

            <div class="menu" :class="isVisibleSubMenu ? 'show_flex' : ''">
                @if ($pharmacologicalArticle)
                    <div class="menu_item">
                        <button class="btn modal_btn" onclick="showModal('pharmacological_article_modal')">
                            <svg class="icon">
                                <use xlink:href="/web/images/sprite.svg#ic_menu1"></use>
                            </svg>
                            <span><b>ФС</b></span>
                        </button>
                    </div>
                    <div class="divider"></div>
                @endif


                <div class="menu_item">
                    <button class="btn modal_btn" onclick="showModal('tasks_modal')">
                        <svg class="icon">
                            <use xlink:href="/web/images/sprite.svg#ic_menu2"></use>
                        </svg>
                        <span>Задание</span>
                    </button>
                </div>

                <div class="menu_item">
                    <button class="btn modal_btn" type="button" wire:click="$dispatch('show-modal-notepad')">
                        <svg class="icon">
                            <use xlink:href="/web/images/sprite.svg#ic_menu3"></use>
                        </svg>
                        <span>Блокнот</span>
                    </button>
                </div>

                <div class="menu_item">
                    <button class="btn modal_btn" type="button" wire:click="$dispatch('show-modal-check-list')">
                        {{--                    <button class="btn modal_btn" onclick="showModal('pay_slip_modal')">--}}
                        <svg class="icon">
                            <use xlink:href="/web/images/sprite.svg#ic_menu4"></use>
                        </svg>
                        <span>Расчетный лист</span>
                    </button>
                </div>

                <div class="menu_item">
                    <button class="btn modal_btn" onclick="showModal('periodic_table_modal')">
                        <svg class="icon">
                            <use xlink:href="/web/images/sprite.svg#ic_menu5"></use>
                        </svg>
                        <span>Таблица менделеева</span>
                    </button>
                </div>
            </div>
        </div>

        <button class="select_room_btn" x-on:click="isVisibleMenu =! isVisibleMenu">
            <svg class="icon">
                <use xlink:href="/web/images/sprite.svg#ic_menu6"></use>
            </svg>
            <span>Выбрать комнату</span>
        </button>
    </div>
</header>
@include('components.layouts.web.modals')
