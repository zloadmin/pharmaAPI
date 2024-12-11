<div class="exhaust_modal interaction_data" id="filtration_modal_before" style="display: {{ $isShow ? 'block' : 'none' }}">
    @if ($isShow)
        <button class="close_btn"  type="button" wire:click="$dispatch('hide-modal-filtration-before')">
            <svg class="icon"><use xlink:href="/web/images/sprite.svg#ic_close"></use></svg>
        </button>
        <div class="data">
            <div class="head">
                <div class="title">Взаимойдествие с<br> установкой фильтрации</div>
            </div>

            <div class="objects">
                <button class="move_btn">
                    <svg class="icon"><use xlink:href="images/sprite.svg#ic_move"></use></svg>
                </button>

                <div class="object">
                    <div class="name">Подвижная фаза</div>

                    <div class="overflow">
                        <div class="thumb">
                            <img src="images/tmp/object_thumb2.png" alt="" loading="lazy">
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
                            <img src="images/tmp/object_thumb2.png" alt="" loading="lazy">
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
    @endif
</div>