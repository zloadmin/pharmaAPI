<div class="exhaust_modal interaction_data" id="bath_modal" style="display: {{ $isShow ? 'block' : 'none' }}">
    @if ($isShow)
        <button class="close_btn" type="button" wire:click="$dispatch('hide-modal-bath')">
            <svg class="icon">
                <use xlink:href="/web/images/sprite.svg#ic_close"></use>
            </svg>
        </button>
        <div class="data">
            <div class="head">
                <div class="title">Взаимойдествие<br> с УЗ ванной</div>
            </div>

            <div class="objects">
                {{--            <button class="move_btn">--}}
                {{--                <svg class="icon">--}}
                {{--                    <use xlink:href="/web/images/sprite.svg#ic_move"></use>--}}
                {{--                </svg>--}}
                {{--            </button>--}}

                <div class="object">
                    <div class="name">Мерная колба</div>

                    <div class="overflow">
                        <div class="thumb">
                            <img src="images/tmp/object_thumb2.png" alt="" loading="lazy">
                        </div>

                        <div class="type">Тип: <span>Посуда</span></div>
                    </div>

                    <div class="status">
                        <div class="label">Статус:</div>

                        <div class="val">Хим. вещество</div>
                    </div>
                </div>

                <div class="object">
                    <div class="name">Мерная колба</div>

                    <div class="overflow">
                        <div class="thumb">
                            <img src="images/tmp/object_thumb2.png" alt="" loading="lazy">
                        </div>

                        <div class="type">Тип: <span>Посуда</span></div>
                    </div>

                    <div class="status">
                        <div class="label">Статус:</div>

                        <div class="val">Хим. вещество</div>
                    </div>
                </div>

                <!-- <div class="object empty">
                    <button class="add_btn">
                        <span class="icon">+</span>
                        <span>Кликните здесь, чтобы добавить объект для взаимодействия</span>
                    </button>
                </div> -->
            </div>

            <div class="bottom">
                <div class="progress">
                    <div style="width: 50%;"></div>
                </div>

                <div class="range temperature">
                    <div class="label">Температура</div>

                    <span class="irs irs--flat js-irs-0 irs-with-grid"><span class="irs"><span class="irs-line"
                                                                                               tabindex="0"></span><span
                                    class="irs-min" style="visibility: visible;">0</span><span class="irs-max"
                                                                                               style="visibility: visible;">100</span><span
                                    class="irs-from" style="visibility: hidden;">0</span><span class="irs-to"
                                                                                               style="visibility: hidden;">0</span><span
                                    class="irs-single" style="left: 14.96%;">14</span></span><span class="irs-grid"
                                                                                                   style="width: 97.3333%; left: 1.23333%;"><span
                                    class="irs-grid-pol" style="left: 0%"></span><span class="irs-grid-text js-grid-text-0"
                                                                                       style="left: 0%; margin-left: -0.548611%;">0</span><span
                                    class="irs-grid-pol small" style="left: 6.666666666666666%"></span><span
                                    class="irs-grid-pol small" style="left: 3.333333333333333%"></span><span
                                    class="irs-grid-pol" style="left: 10%"></span><span class="irs-grid-text js-grid-text-1"
                                                                                        style="left: 10%; visibility: visible; margin-left: -1.09722%;">10</span><span
                                    class="irs-grid-pol small" style="left: 16.666666666666668%"></span><span
                                    class="irs-grid-pol small" style="left: 13.333333333333332%"></span><span
                                    class="irs-grid-pol" style="left: 20%"></span><span class="irs-grid-text js-grid-text-2"
                                                                                        style="left: 20%; visibility: visible; margin-left: -1.09722%;">20</span><span
                                    class="irs-grid-pol small" style="left: 26.666666666666668%"></span><span
                                    class="irs-grid-pol small" style="left: 23.333333333333332%"></span><span
                                    class="irs-grid-pol" style="left: 30%"></span><span class="irs-grid-text js-grid-text-3"
                                                                                        style="left: 30%; visibility: visible; margin-left: -1.09722%;">30</span><span
                                    class="irs-grid-pol small" style="left: 36.666666666666664%"></span><span
                                    class="irs-grid-pol small" style="left: 33.333333333333336%"></span><span
                                    class="irs-grid-pol" style="left: 40%"></span><span class="irs-grid-text js-grid-text-4"
                                                                                        style="left: 40%; margin-left: -1.09722%;">40</span><span
                                    class="irs-grid-pol small" style="left: 46.666666666666664%"></span><span
                                    class="irs-grid-pol small" style="left: 43.333333333333336%"></span><span
                                    class="irs-grid-pol" style="left: 50%"></span><span class="irs-grid-text js-grid-text-5"
                                                                                        style="left: 50%; visibility: visible; margin-left: -1.09722%;">50</span><span
                                    class="irs-grid-pol small" style="left: 56.666666666666664%"></span><span
                                    class="irs-grid-pol small" style="left: 53.333333333333336%"></span><span
                                    class="irs-grid-pol" style="left: 60%"></span><span class="irs-grid-text js-grid-text-6"
                                                                                        style="left: 60%; visibility: visible; margin-left: -1.09722%;">60</span><span
                                    class="irs-grid-pol small" style="left: 66.66666666666667%"></span><span
                                    class="irs-grid-pol small" style="left: 63.333333333333336%"></span><span
                                    class="irs-grid-pol" style="left: 70%"></span><span class="irs-grid-text js-grid-text-7"
                                                                                        style="left: 70%; visibility: visible; margin-left: -1.09722%;">70</span><span
                                    class="irs-grid-pol small" style="left: 76.66666666666667%"></span><span
                                    class="irs-grid-pol small" style="left: 73.33333333333333%"></span><span
                                    class="irs-grid-pol" style="left: 80%"></span><span class="irs-grid-text js-grid-text-8"
                                                                                        style="left: 80%; margin-left: -1.09722%;">80</span><span
                                    class="irs-grid-pol small" style="left: 86.66666666666667%"></span><span
                                    class="irs-grid-pol small" style="left: 83.33333333333333%"></span><span
                                    class="irs-grid-pol" style="left: 90%"></span><span class="irs-grid-text js-grid-text-9"
                                                                                        style="left: 90%; visibility: visible; margin-left: -1.09722%;">90</span><span
                                    class="irs-grid-pol small" style="left: 96.66666666666667%"></span><span
                                    class="irs-grid-pol small" style="left: 93.33333333333333%"></span><span
                                    class="irs-grid-pol" style="left: 100%"></span><span
                                    class="irs-grid-text js-grid-text-10"
                                    style="left: 100%; visibility: visible; margin-left: -1.64583%;">100</span></span><span
                                class="irs-bar irs-bar--single" style="left: 0px; width: 14.96%;"></span><span
                                class="irs-shadow shadow-single" style="display: none;"></span><span
                                class="irs-handle single" style="left: 13.6267%;"><i></i><i></i><i></i></span></span><input
                            type="hidden" id="bath_temperature" name="temperature" value="14" class="irs-hidden-input"
                            tabindex="-1" readonly="">
                </div>

                <div class="range time">
                    <div class="label">Время (сек)</div>

                    <span class="irs irs--flat js-irs-1 irs-with-grid"><span class="irs"><span class="irs-line"
                                                                                               tabindex="0"></span><span
                                    class="irs-min" style="visibility: visible;">10</span><span class="irs-max"
                                                                                                style="visibility: visible;">120</span><span
                                    class="irs-from" style="visibility: hidden;">0</span><span class="irs-to"
                                                                                               style="visibility: hidden;">0</span><span
                                    class="irs-single" style="left: 13.7212%;">24</span></span><span class="irs-grid"
                                                                                                     style="width: 97.3333%; left: 1.23333%;"><span
                                    class="irs-grid-pol" style="left: 0%"></span><span class="irs-grid-text js-grid-text-0"
                                                                                       style="left: 0%; margin-left: -1.09722%;">10</span><span
                                    class="irs-grid-pol small" style="left: 6.0606060606060606%"></span><span
                                    class="irs-grid-pol small" style="left: 3.0303030303030303%"></span><span
                                    class="irs-grid-pol" style="left: 9.090909090909092%"></span><span
                                    class="irs-grid-text js-grid-text-1"
                                    style="left: 9.09091%; visibility: visible; margin-left: -1.09722%;">20</span><span
                                    class="irs-grid-pol small" style="left: 15.151515151515152%"></span><span
                                    class="irs-grid-pol small" style="left: 12.121212121212121%"></span><span
                                    class="irs-grid-pol" style="left: 18.181818181818183%"></span><span
                                    class="irs-grid-text js-grid-text-2"
                                    style="left: 18.1818%; visibility: visible; margin-left: -1.09722%;">30</span><span
                                    class="irs-grid-pol small" style="left: 24.242424242424242%"></span><span
                                    class="irs-grid-pol small" style="left: 21.212121212121215%"></span><span
                                    class="irs-grid-pol" style="left: 27.272727272727273%"></span><span
                                    class="irs-grid-text js-grid-text-3"
                                    style="left: 27.2727%; visibility: visible; margin-left: -1.09722%;">40</span><span
                                    class="irs-grid-pol small" style="left: 33.333333333333336%"></span><span
                                    class="irs-grid-pol small" style="left: 30.303030303030305%"></span><span
                                    class="irs-grid-pol" style="left: 36.36363636363637%"></span><span
                                    class="irs-grid-text js-grid-text-4"
                                    style="left: 36.3636%; margin-left: -1.09722%;">50</span><span
                                    class="irs-grid-pol small" style="left: 42.42424242424243%"></span><span
                                    class="irs-grid-pol small" style="left: 39.3939393939394%"></span><span
                                    class="irs-grid-pol" style="left: 45.45454545454546%"></span><span
                                    class="irs-grid-text js-grid-text-5"
                                    style="left: 45.4545%; visibility: visible; margin-left: -1.09722%;">60</span><span
                                    class="irs-grid-pol small" style="left: 51.515151515151516%"></span><span
                                    class="irs-grid-pol small" style="left: 48.48484848484849%"></span><span
                                    class="irs-grid-pol" style="left: 54.54545454545455%"></span><span
                                    class="irs-grid-text js-grid-text-6"
                                    style="left: 54.5455%; visibility: visible; margin-left: -1.09722%;">70</span><span
                                    class="irs-grid-pol small" style="left: 60.60606060606061%"></span><span
                                    class="irs-grid-pol small" style="left: 57.57575757575758%"></span><span
                                    class="irs-grid-pol" style="left: 63.63636363636364%"></span><span
                                    class="irs-grid-text js-grid-text-7"
                                    style="left: 63.6364%; visibility: visible; margin-left: -1.09722%;">80</span><span
                                    class="irs-grid-pol small" style="left: 69.6969696969697%"></span><span
                                    class="irs-grid-pol small" style="left: 66.66666666666667%"></span><span
                                    class="irs-grid-pol" style="left: 72.72727272727273%"></span><span
                                    class="irs-grid-text js-grid-text-8"
                                    style="left: 72.7273%; margin-left: -1.09722%;">90</span><span
                                    class="irs-grid-pol small" style="left: 78.7878787878788%"></span><span
                                    class="irs-grid-pol small" style="left: 75.75757575757576%"></span><span
                                    class="irs-grid-pol" style="left: 81.81818181818183%"></span><span
                                    class="irs-grid-text js-grid-text-9"
                                    style="left: 81.8182%; visibility: visible; margin-left: -1.64583%;">100</span><span
                                    class="irs-grid-pol small" style="left: 87.87878787878789%"></span><span
                                    class="irs-grid-pol small" style="left: 84.84848484848486%"></span><span
                                    class="irs-grid-pol" style="left: 90.90909090909092%"></span><span
                                    class="irs-grid-text js-grid-text-10"
                                    style="left: 90.9091%; visibility: visible; margin-left: -1.64583%;">110</span><span
                                    class="irs-grid-pol small" style="left: 96.96969696969697%"></span><span
                                    class="irs-grid-pol small" style="left: 93.93939393939395%"></span><span
                                    class="irs-grid-pol" style="left: 100%"></span><span
                                    class="irs-grid-text js-grid-text-11"
                                    style="left: 100%; visibility: visible; margin-left: -1.64583%;">120</span></span><span
                                class="irs-bar irs-bar--single" style="left: 0px; width: 13.7212%;"></span><span
                                class="irs-shadow shadow-single" style="display: none;"></span><span
                                class="irs-handle single" style="left: 12.3879%;"><i></i><i></i><i></i></span></span><input
                            type="hidden" id="bath_time" name="time" value="24" class="irs-hidden-input" tabindex="-1"
                            readonly="">
                </div>

                <div class="btns">
                    <button class="btn">
                        <svg class="icon">
                            <use xlink:href="images/sprite.svg#ic_video_play"></use>
                        </svg>
                        <span>Запустить</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="exp">
            <div class="icon">
                <svg>
                    <use xlink:href="images/sprite.svg#ic_exp"></use>
                </svg>
            </div>

            <span>выберите необходимые вещества в мернхы колбах/ настройте температуру /  выставьте правильно время / нажмите кнопку запустить</span>
        </div>
    @endif
</div>