<div class="main">
    @include('components.layouts.web.header')
    @include('components.layouts.web.change-stage-menu')
    <section class="exhaust">
        @include('livewire.stages.blocks.back-button')

        <div class="image">
            <img src="/web/images/tmp/exhaust_img.jpg" alt="" loading="lazy" class="img">

            <button class="btn btn1" data-modal="ph_meter_modal">Взаимодействовать</button>

            <button class="btn btn2" data-modal="mixer_modal">Взаимодействовать</button>

            <button class="btn btn3" data-modal="bath_modal">Взаимодействовать</button>

            <button class="btn btn4" data-modal="filtration_modal">Взаимодействовать</button>

            <button class="btn btn5" data-modal="filtration_modal">Взаимодействовать</button>


            <div class="exhaust_modal object_modal big" id="ph_meter_modal">
                <button class="close_btn">
                    <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_close"></use></svg>
                </button>

                <div class="title">Взаимойдествие с ph-Meter</div>

                <!-- <div class="border empty">
                    <button class="add_btn">
                        <span class="icon">+</span>
                        <span>Кликните здесь, чтобы добавить объект для взаимодействия</span>
                    </button>
                </div> -->

                <div class="border">
                    <div class="name">Химический стакан</div>

                    <div class="overflow">
                        <div class="thumb">
                            <img src="/web/images/tmp/point_modal_thumb.png" alt="" loading="lazy">
                        </div>

                        <div class="type">Тип: <span>Посуда</span></div>
                    </div>

                    <div class="status">
                        <div class="label">Статус:</div>

                        <div class="val">Хим. вещество 250 мл.</div>
                    </div>
                </div>

                <div class="install_electrodes">
                    <div class="field">
                        <input type="text" inputmode="numeric" name="" value="" class="input" placeholder="000.0000">

                        <div class="unit">pH</div>
                    </div>

                    <div class="exp">Установка электродов</div>

                    <div class="btns">
                        <button class="btn border">Изьять</button>

                        <button class="btn">Установить</button>
                    </div>
                </div>
            </div>


            <div class="exhaust_modal object_modal big" id="mixer_modal">
                <button class="close_btn">
                    <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_close"></use></svg>
                </button>

                <div class="title">Взаимойдествие с мешалкой</div>

                <!-- <div class="border empty">
                    <button class="add_btn">
                        <span class="icon">+</span>
                        <span>Кликните здесь, чтобы добавить объект для взаимодействия</span>
                    </button>
                </div> -->

                <div class="border">
                    <div class="name">Химический стакан</div>

                    <div class="overflow">
                        <div class="thumb">
                            <img src="/web/images/tmp/point_modal_thumb.png" alt="" loading="lazy">
                        </div>

                        <div class="type">Тип: <span>Посуда</span></div>
                    </div>

                    <div class="status">
                        <div class="label">Статус:</div>

                        <div class="val">Хим. вещество 250 мл.</div>
                    </div>
                </div>

                <div class="bottom">
                    <div class="progress">
                        <div style="width: 50%;"></div>
                    </div>

                    <div class="range time">
                        <div class="label">Время (сек)</div>

                        <span class="irs irs--flat js-irs-2 irs-with-grid"><span class="irs"><span class="irs-line" tabindex="0"></span><span class="irs-min" style="">10</span><span class="irs-max" style="">120</span><span class="irs-from" style="visibility: hidden;">0</span><span class="irs-to" style="visibility: hidden;">0</span><span class="irs-single">0</span></span><span class="irs-grid"><span class="irs-grid-pol" style="left: 0%"></span><span class="irs-grid-text js-grid-text-0" style="left: 0%">10</span><span class="irs-grid-pol small" style="left: 6.0606060606060606%"></span><span class="irs-grid-pol small" style="left: 3.0303030303030303%"></span><span class="irs-grid-pol" style="left: 9.090909090909092%"></span><span class="irs-grid-text js-grid-text-1" style="left: 9.09091%; visibility: hidden;">20</span><span class="irs-grid-pol small" style="left: 15.151515151515152%"></span><span class="irs-grid-pol small" style="left: 12.121212121212121%"></span><span class="irs-grid-pol" style="left: 18.181818181818183%"></span><span class="irs-grid-text js-grid-text-2" style="left: 18.1818%; visibility: hidden;">30</span><span class="irs-grid-pol small" style="left: 24.242424242424242%"></span><span class="irs-grid-pol small" style="left: 21.212121212121215%"></span><span class="irs-grid-pol" style="left: 27.272727272727273%"></span><span class="irs-grid-text js-grid-text-3" style="left: 27.2727%; visibility: hidden;">40</span><span class="irs-grid-pol small" style="left: 33.333333333333336%"></span><span class="irs-grid-pol small" style="left: 30.303030303030305%"></span><span class="irs-grid-pol" style="left: 36.36363636363637%"></span><span class="irs-grid-text js-grid-text-4" style="left: 36.36363636363637%">50</span><span class="irs-grid-pol small" style="left: 42.42424242424243%"></span><span class="irs-grid-pol small" style="left: 39.3939393939394%"></span><span class="irs-grid-pol" style="left: 45.45454545454546%"></span><span class="irs-grid-text js-grid-text-5" style="left: 45.4545%; visibility: hidden;">60</span><span class="irs-grid-pol small" style="left: 51.515151515151516%"></span><span class="irs-grid-pol small" style="left: 48.48484848484849%"></span><span class="irs-grid-pol" style="left: 54.54545454545455%"></span><span class="irs-grid-text js-grid-text-6" style="left: 54.5455%; visibility: hidden;">70</span><span class="irs-grid-pol small" style="left: 60.60606060606061%"></span><span class="irs-grid-pol small" style="left: 57.57575757575758%"></span><span class="irs-grid-pol" style="left: 63.63636363636364%"></span><span class="irs-grid-text js-grid-text-7" style="left: 63.6364%; visibility: hidden;">80</span><span class="irs-grid-pol small" style="left: 69.6969696969697%"></span><span class="irs-grid-pol small" style="left: 66.66666666666667%"></span><span class="irs-grid-pol" style="left: 72.72727272727273%"></span><span class="irs-grid-text js-grid-text-8" style="left: 72.72727272727273%">90</span><span class="irs-grid-pol small" style="left: 78.7878787878788%"></span><span class="irs-grid-pol small" style="left: 75.75757575757576%"></span><span class="irs-grid-pol" style="left: 81.81818181818183%"></span><span class="irs-grid-text js-grid-text-9" style="left: 81.8182%; visibility: hidden;">100</span><span class="irs-grid-pol small" style="left: 87.87878787878789%"></span><span class="irs-grid-pol small" style="left: 84.84848484848486%"></span><span class="irs-grid-pol" style="left: 90.90909090909092%"></span><span class="irs-grid-text js-grid-text-10" style="left: 90.9091%; visibility: hidden;">110</span><span class="irs-grid-pol small" style="left: 96.96969696969697%"></span><span class="irs-grid-pol small" style="left: 93.93939393939395%"></span><span class="irs-grid-pol" style="left: 100%"></span><span class="irs-grid-text js-grid-text-11" style="left: 100%; visibility: hidden;">120</span></span><span class="irs-bar irs-bar--single"></span><span class="irs-shadow shadow-single"></span><span class="irs-handle single"><i></i><i></i><i></i></span></span><input type="hidden" id="mixer_time" name="time" value="24" class="irs-hidden-input" tabindex="-1" readonly="">
                    </div>

                    <div class="btns">
                        <button class="btn">
                            <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_video_play"></use></svg>
                            <span>Запустить</span>
                        </button>
                    </div>
                </div>
            </div>


            <div class="exhaust_modal interaction_data" id="bath_modal">
                <button class="close_btn">
                    <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_close"></use></svg>
                </button>

                <div class="data">
                    <div class="head">
                        <div class="title">Взаимойдествие<br> с УЗ ванной</div>
                    </div>

                    <div class="objects">
                        <button class="move_btn">
                            <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_move"></use></svg>
                        </button>

                        <div class="object">
                            <div class="name">Мерная колба</div>

                            <div class="overflow">
                                <div class="thumb">
                                    <img src="/web/images/tmp/object_thumb2.png" alt="" loading="lazy">
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
                                    <img src="/web/images/tmp/object_thumb2.png" alt="" loading="lazy">
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

                            <span class="irs irs--flat js-irs-0 irs-with-grid"><span class="irs"><span class="irs-line" tabindex="0"></span><span class="irs-min" style="">0</span><span class="irs-max" style="">100</span><span class="irs-from" style="visibility: hidden;">0</span><span class="irs-to" style="visibility: hidden;">0</span><span class="irs-single">0</span></span><span class="irs-grid"><span class="irs-grid-pol" style="left: 0%"></span><span class="irs-grid-text js-grid-text-0" style="left: 0%">0</span><span class="irs-grid-pol small" style="left: 6.666666666666666%"></span><span class="irs-grid-pol small" style="left: 3.333333333333333%"></span><span class="irs-grid-pol" style="left: 10%"></span><span class="irs-grid-text js-grid-text-1" style="left: 10%; visibility: hidden;">10</span><span class="irs-grid-pol small" style="left: 16.666666666666668%"></span><span class="irs-grid-pol small" style="left: 13.333333333333332%"></span><span class="irs-grid-pol" style="left: 20%"></span><span class="irs-grid-text js-grid-text-2" style="left: 20%; visibility: hidden;">20</span><span class="irs-grid-pol small" style="left: 26.666666666666668%"></span><span class="irs-grid-pol small" style="left: 23.333333333333332%"></span><span class="irs-grid-pol" style="left: 30%"></span><span class="irs-grid-text js-grid-text-3" style="left: 30%; visibility: hidden;">30</span><span class="irs-grid-pol small" style="left: 36.666666666666664%"></span><span class="irs-grid-pol small" style="left: 33.333333333333336%"></span><span class="irs-grid-pol" style="left: 40%"></span><span class="irs-grid-text js-grid-text-4" style="left: 40%">40</span><span class="irs-grid-pol small" style="left: 46.666666666666664%"></span><span class="irs-grid-pol small" style="left: 43.333333333333336%"></span><span class="irs-grid-pol" style="left: 50%"></span><span class="irs-grid-text js-grid-text-5" style="left: 50%; visibility: hidden;">50</span><span class="irs-grid-pol small" style="left: 56.666666666666664%"></span><span class="irs-grid-pol small" style="left: 53.333333333333336%"></span><span class="irs-grid-pol" style="left: 60%"></span><span class="irs-grid-text js-grid-text-6" style="left: 60%; visibility: hidden;">60</span><span class="irs-grid-pol small" style="left: 66.66666666666667%"></span><span class="irs-grid-pol small" style="left: 63.333333333333336%"></span><span class="irs-grid-pol" style="left: 70%"></span><span class="irs-grid-text js-grid-text-7" style="left: 70%; visibility: hidden;">70</span><span class="irs-grid-pol small" style="left: 76.66666666666667%"></span><span class="irs-grid-pol small" style="left: 73.33333333333333%"></span><span class="irs-grid-pol" style="left: 80%"></span><span class="irs-grid-text js-grid-text-8" style="left: 80%">80</span><span class="irs-grid-pol small" style="left: 86.66666666666667%"></span><span class="irs-grid-pol small" style="left: 83.33333333333333%"></span><span class="irs-grid-pol" style="left: 90%"></span><span class="irs-grid-text js-grid-text-9" style="left: 90%; visibility: hidden;">90</span><span class="irs-grid-pol small" style="left: 96.66666666666667%"></span><span class="irs-grid-pol small" style="left: 93.33333333333333%"></span><span class="irs-grid-pol" style="left: 100%"></span><span class="irs-grid-text js-grid-text-10" style="left: 100%; visibility: hidden;">100</span></span><span class="irs-bar irs-bar--single"></span><span class="irs-shadow shadow-single"></span><span class="irs-handle single"><i></i><i></i><i></i></span></span><input type="hidden" id="bath_temperature" name="temperature" value="14" class="irs-hidden-input" tabindex="-1" readonly="">
                        </div>

                        <div class="range time">
                            <div class="label">Время (сек)</div>

                            <span class="irs irs--flat js-irs-1 irs-with-grid"><span class="irs"><span class="irs-line" tabindex="0"></span><span class="irs-min" style="">10</span><span class="irs-max" style="">120</span><span class="irs-from" style="visibility: hidden;">0</span><span class="irs-to" style="visibility: hidden;">0</span><span class="irs-single">0</span></span><span class="irs-grid"><span class="irs-grid-pol" style="left: 0%"></span><span class="irs-grid-text js-grid-text-0" style="left: 0%">10</span><span class="irs-grid-pol small" style="left: 6.0606060606060606%"></span><span class="irs-grid-pol small" style="left: 3.0303030303030303%"></span><span class="irs-grid-pol" style="left: 9.090909090909092%"></span><span class="irs-grid-text js-grid-text-1" style="left: 9.09091%; visibility: hidden;">20</span><span class="irs-grid-pol small" style="left: 15.151515151515152%"></span><span class="irs-grid-pol small" style="left: 12.121212121212121%"></span><span class="irs-grid-pol" style="left: 18.181818181818183%"></span><span class="irs-grid-text js-grid-text-2" style="left: 18.1818%; visibility: hidden;">30</span><span class="irs-grid-pol small" style="left: 24.242424242424242%"></span><span class="irs-grid-pol small" style="left: 21.212121212121215%"></span><span class="irs-grid-pol" style="left: 27.272727272727273%"></span><span class="irs-grid-text js-grid-text-3" style="left: 27.2727%; visibility: hidden;">40</span><span class="irs-grid-pol small" style="left: 33.333333333333336%"></span><span class="irs-grid-pol small" style="left: 30.303030303030305%"></span><span class="irs-grid-pol" style="left: 36.36363636363637%"></span><span class="irs-grid-text js-grid-text-4" style="left: 36.36363636363637%">50</span><span class="irs-grid-pol small" style="left: 42.42424242424243%"></span><span class="irs-grid-pol small" style="left: 39.3939393939394%"></span><span class="irs-grid-pol" style="left: 45.45454545454546%"></span><span class="irs-grid-text js-grid-text-5" style="left: 45.4545%; visibility: hidden;">60</span><span class="irs-grid-pol small" style="left: 51.515151515151516%"></span><span class="irs-grid-pol small" style="left: 48.48484848484849%"></span><span class="irs-grid-pol" style="left: 54.54545454545455%"></span><span class="irs-grid-text js-grid-text-6" style="left: 54.5455%; visibility: hidden;">70</span><span class="irs-grid-pol small" style="left: 60.60606060606061%"></span><span class="irs-grid-pol small" style="left: 57.57575757575758%"></span><span class="irs-grid-pol" style="left: 63.63636363636364%"></span><span class="irs-grid-text js-grid-text-7" style="left: 63.6364%; visibility: hidden;">80</span><span class="irs-grid-pol small" style="left: 69.6969696969697%"></span><span class="irs-grid-pol small" style="left: 66.66666666666667%"></span><span class="irs-grid-pol" style="left: 72.72727272727273%"></span><span class="irs-grid-text js-grid-text-8" style="left: 72.72727272727273%">90</span><span class="irs-grid-pol small" style="left: 78.7878787878788%"></span><span class="irs-grid-pol small" style="left: 75.75757575757576%"></span><span class="irs-grid-pol" style="left: 81.81818181818183%"></span><span class="irs-grid-text js-grid-text-9" style="left: 81.8182%; visibility: hidden;">100</span><span class="irs-grid-pol small" style="left: 87.87878787878789%"></span><span class="irs-grid-pol small" style="left: 84.84848484848486%"></span><span class="irs-grid-pol" style="left: 90.90909090909092%"></span><span class="irs-grid-text js-grid-text-10" style="left: 90.9091%; visibility: hidden;">110</span><span class="irs-grid-pol small" style="left: 96.96969696969697%"></span><span class="irs-grid-pol small" style="left: 93.93939393939395%"></span><span class="irs-grid-pol" style="left: 100%"></span><span class="irs-grid-text js-grid-text-11" style="left: 100%; visibility: hidden;">120</span></span><span class="irs-bar irs-bar--single"></span><span class="irs-shadow shadow-single"></span><span class="irs-handle single"><i></i><i></i><i></i></span></span><input type="hidden" id="bath_time" name="time" value="24" class="irs-hidden-input" tabindex="-1" readonly="">
                        </div>

                        <div class="btns">
                            <button class="btn">
                                <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_video_play"></use></svg>
                                <span>Запустить</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="exp">
                    <div class="icon">
                        <svg><use xlink:href="/web/images/sprite.svg#ic_exp"></use></svg>
                    </div>

                    <span>выберите необходимые вещества в мернхы колбах/ настройте температуру /  выставьте правильно время / нажмите кнопку запустить</span>
                </div>
            </div>


            <div class="exhaust_modal interaction_data" id="filtration_modal">
                <button class="close_btn">
                    <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_close"></use></svg>
                </button>

                <div class="data">
                    <div class="head">
                        <div class="title">Взаимойдествие с<br> установкой фильтрации</div>
                    </div>

                    <div class="objects">
                        <button class="move_btn">
                            <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_move"></use></svg>
                        </button>

                        <div class="object">
                            <div class="name">Подвижная фаза</div>

                            <div class="overflow">
                                <div class="thumb">
                                    <img src="/web/images/tmp/object_thumb2.png" alt="" loading="lazy">
                                </div>

                                <div class="type">Тип: <span>Посуда: 900 мл</span></div>
                            </div>

                            <div class="status">
                                <div class="label">Статус:</div>

                                <div class="val">Подвижная фаза 500 мл</div>
                            </div>
                        </div>

                        <div class="object">
                            <div class="name">Стакан для ввода</div>

                            <div class="overflow">
                                <div class="thumb">
                                    <img src="/web/images/tmp/object_thumb2.png" alt="" loading="lazy">
                                </div>

                                <div class="type">Тип: <span>Посуда:</span></div>
                            </div>

                            <div class="status">
                                <div class="label">Статус:</div>

                                <div class="val">Пустой</div>
                            </div>
                        </div>

                        <!-- <div class="object empty">
                            <button class="add_btn">
                                <span class="icon">+</span>
                                <span>Кликните здесь, чтобы добавить объект для взаимодействия</span>
                            </button>
                        </div> -->
                    </div>

                    <button class="action_btn">Профильтровать</button>
                </div>

                <div class="exp">
                    <div class="icon">
                        <svg><use xlink:href="/web/images/sprite.svg#ic_exp"></use></svg>
                    </div>

                    <span>выберите необходимые вещества в мернхы колбах/ настройте температуру /  выставьте правильно время / нажмите кнопку запустить</span>
                </div>
            </div>
        </div>

        <div class="right_data">
            <div class="scroll">
                <div class="section on_table">
                    <div class="head">
                        <div class="title">На столе</div>

                        <button class="get_all_btn">Взять все</button>
                    </div>

                    <div class="row" style="visibility: hidden">
                        <div class="item" data-modal="exhaust_object1_modal">
                            <div class="thumb">
                                <img src="/web/images/tmp/weight_equipment_item_thumb2.png" alt="" loading="lazy">
                            </div>

                            <div class="name">Емкость воды очищ</div>
                        </div>

                        <div class="item" data-modal="exhaust_object1_modal">
                            <div class="thumb">
                                <img src="/web/images/tmp/weight_equipment_item_thumb2.png" alt="" loading="lazy">
                            </div>

                            <div class="name">Емкость воды очищ</div>
                        </div>

                        <div class="item" data-modal="exhaust_object1_modal">
                            <div class="thumb">
                                <img src="/web/images/tmp/weight_equipment_item_thumb3.png" alt="" loading="lazy">
                            </div>

                            <div class="name">Открытый бюкс</div>
                        </div>

                        <div class="item" data-modal="exhaust_object1_modal">
                            <button class="remove_btn">
                                <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_close"></use></svg>
                            </button>

                            <div class="icons column">
                                <div class="text">0,8555</div>

                                <div>
                                    <img src="/web/images/ic_drop.png" alt="" class="icon" loading="lazy">
                                </div>
                            </div>

                            <div class="thumb">
                                <img src="/web/images/tmp/weight_equipment_item_thumb3.png" alt="" loading="lazy">
                            </div>

                            <div class="name">Открытый бюкс</div>
                        </div>

                        <div class="item" data-modal="exhaust_object1_modal">
                            <div class="icons column">
                                <div>
                                    <img src="/web/images/ic_mountains.png" alt="" class="icon" loading="lazy">
                                </div>
                            </div>

                            <div class="thumb">
                                <img src="/web/images/tmp/weight_equipment_item_thumb3.png" alt="" loading="lazy">
                            </div>

                            <div class="name">Открытый бюкс</div>
                        </div>

                        <div class="item" data-modal="exhaust_object1_modal">
                            <div class="icons column">
                                <div>
                                    <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_scales"></use></svg>
                                </div>
                            </div>

                            <div class="thumb">
                                <img src="/web/images/tmp/weight_equipment_item_thumb3.png" alt="" loading="lazy">
                            </div>

                            <div class="name">Открытый бюкс</div>
                        </div>

                        <div class="item" data-modal="exhaust_object1_modal">
                            <div class="thumb">
                                <img src="/web/images/tmp/weight_equipment_item_thumb2.png" alt="" loading="lazy">
                            </div>

                            <div class="name">Емкость воды очищ</div>
                        </div>

                        <div class="item" data-modal="exhaust_object1_modal">
                            <div class="icons column">
                                <div>
                                    <img src="/web/images/ic_mountains.png" alt="" class="icon" loading="lazy">
                                </div>
                            </div>

                            <div class="thumb">
                                <img src="/web/images/tmp/weight_equipment_item_thumb3.png" alt="" loading="lazy">
                            </div>

                            <div class="name">Открытый бюкс</div>
                        </div>

                        <div class="item" data-modal="exhaust_object1_modal">
                            <div class="thumb">
                                <img src="/web/images/tmp/weight_equipment_item_thumb2.png" alt="" loading="lazy">
                            </div>

                            <div class="name">Емкость воды очищ</div>
                        </div>

                        <div class="item" data-modal="exhaust_object1_modal">
                            <div class="icons column">
                                <div>
                                    <img src="/web/images/ic_drop.png" alt="" class="icon" loading="lazy">
                                </div>
                            </div>

                            <div class="thumb">
                                <img src="/web/images/tmp/weight_equipment_item_thumb3.png" alt="" loading="lazy">
                            </div>

                            <div class="name">Открытый бюкс</div>
                        </div>

                        <div class="item" data-modal="exhaust_object1_modal">
                            <div class="thumb">
                                <img src="/web/images/tmp/weight_equipment_item_thumb2.png" alt="" loading="lazy">
                            </div>

                            <div class="name">Емкость воды очищ</div>
                        </div>

                        <div class="item" data-modal="exhaust_object1_modal">
                            <div class="icons column">
                                <div>
                                    <img src="/web/images/ic_drop.png" alt="" class="icon" loading="lazy">
                                </div>
                            </div>

                            <div class="thumb">
                                <img src="/web/images/tmp/weight_equipment_item_thumb3.png" alt="" loading="lazy">
                            </div>

                            <div class="name">Открытый бюкс</div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal object_modal" id="exhaust_object1_modal">
                <button class="close_btn">
                    <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_close"></use></svg>
                </button>

                <div class="name">Бюкс</div>

                <div class="overflow">
                    <div class="thumb">
                        <img src="/web/images/tmp/point_modal_thumb.png" alt="" loading="lazy">
                    </div>

                    <div class="type">Тип: <span>Посуда: 30 мл.</span></div>
                </div>

                <div class="status">
                    <div class="label">Статус:</div>

                    <div class="val">Вода: 25 мл</div>
                </div>

                <div class="btns">
                    <button class="btn interaction_btn">Взаимодействовать</button>

                    <button class="btn border">Убрать в мойку</button>

                    <button class="btn border">Переместить в инвентарь</button>
                </div>
            </div>
        </div>

{{--        <livewire:stages.components.modals.modal-cart-component :session='$session' />--}}
        <livewire:stages.components.component-cart :session='$session'/>
    </section>

</div>