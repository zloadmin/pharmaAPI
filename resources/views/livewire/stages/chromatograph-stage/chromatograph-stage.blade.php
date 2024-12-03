<div class="main">
    @include('components.layouts.web.header')
    @include('components.layouts.web.change-stage-menu')
    <section class="chromatograph">
        @include('livewire.stages.blocks.back-button')

        <div class="main_data">
            <div class="row">
                <div class="section big">
                    <div class="title">Хроматограф</div>

                    <div class="row">
                        <button class="btn no">
                            <div class="status">
                                <div class="green"></div>
                                <div class="red"></div>
                            </div>

                            <div class="icon small">
                                <svg><use xlink:href="/web/images/sprite.svg#ic_chromatograph1"></use></svg>
                            </div>

                            <div>
                                <div class="name">Установить</div>

                                <div class="desc">Поставить банки на хроматограф</div>
                            </div>
                        </button>

                        <button class="btn no disabled">
                            <div class="status">
                                <div class="green"></div>
                                <div class="red"></div>
                            </div>

                            <div class="icon small">
                                <svg><use xlink:href="/web/images/sprite.svg#ic_chromatograph1"></use></svg>
                            </div>

                            <div>
                                <div class="name">Включить</div>

                                <div class="desc">Включает весь хроматограф</div>
                            </div>
                        </button>

                        <button class="btn no disabled">
                            <div class="status">
                                <div class="green"></div>
                                <div class="red"></div>
                            </div>

                            <div class="icon">
                                <svg><use xlink:href="/web/images/sprite.svg#ic_chromatograph2"></use></svg>
                            </div>

                            <div>
                                <div class="name">Открыть</div>

                                <div class="desc">Вентель промыки каппиляров</div>
                            </div>
                        </button>

                        <button class="btn no disabled">
                            <div class="status">
                                <div class="green"></div>
                                <div class="red"></div>
                            </div>

                            <div class="icon">
                                <svg><use xlink:href="/web/images/sprite.svg#ic_chromatograph3"></use></svg>
                            </div>

                            <div>
                                <div class="name">Заменить колонки</div>

                                <div class="desc">Замена колонки в хроматографе</div>
                            </div>
                        </button>
                    </div>
                </div>

                <div class="section">
                    <div class="title">Насос</div>

                    <button class="btn no disabled">
                        <div class="status">
                            <div class="green"></div>
                            <div class="red"></div>
                        </div>

                        <div class="icon">
                            <svg><use xlink:href="/web/images/sprite.svg#ic_chromatograph4"></use></svg>
                        </div>

                        <div>
                            <div class="name">Включить</div>

                            <div class="desc">Управление насосом хроматографа</div>
                        </div>
                    </button>
                </div>

                <div class="section">
                    <div class="title">Инжектор</div>

                    <button class="btn no disabled">
                        <div class="status">
                            <div class="green"></div>
                            <div class="red"></div>
                        </div>

                        <div class="icon middle">
                            <svg><use xlink:href="/web/images/sprite.svg#ic_chromatograph5"></use></svg>
                        </div>

                        <div>
                            <div class="name">Подсоеденить</div>

                            <div class="desc">Ввод шприцов в кран хроматографа</div>
                        </div>
                    </button>
                </div>

                <div class="section">
                    <div class="title">Работа с ПО</div>

                    <button class="default_btn modal_btn" data-modal="chromatograph_error_modal">
                        <svg><use xlink:href="/web/images/sprite.svg#ic_chromatograph6"></use></svg>

                        <span>Запустить ПО</span>
                    </button>
                </div>

                <div class="section">
                    <div class="title">Записи</div>

                    <a href="/task_modal4.html" data-type="ajax" class="default_btn">
                        <svg><use xlink:href="/web/images/sprite.svg#ic_chromatograph7"></use></svg>

                        <span>Внести записи</span>
                    </a>
                </div>
            </div>
        </div>

        <img src="/web/images/tmp/chromatograph_img.jpg" alt="" loading="lazy" class="bg">

{{--        <livewire:stages.components.modals.modal-cart-component :session='$session' />--}}
        <livewire:stages.components.component-cart :session='$session'/>
    </section>

</div>