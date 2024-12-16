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

                        @include('livewire.stages.chromatograph-stage.button', [
                            'title' => 'Установить',
                            'desc' => 'Поставить банки на хроматограф',
                            'disabled' => false,
                            'icon_href' => '/web/images/sprite.svg#ic_chromatograph1',
                            'is_on' => $is_set,
                            'on_click' => 'isSetOn'
                        ])
                        @include('livewire.stages.chromatograph-stage.button', [
                            'title' => 'Включить',
                            'desc' => 'Включает весь хроматограф',
                            'disabled' => !$is_set,
                            'icon_href' => '/web/images/sprite.svg#ic_chromatograph1',
                            'is_on' => $is_turn_on,
                            'on_click' => 'isTurnOnOn'
                        ])
                        @include('livewire.stages.chromatograph-stage.button', [
                            'title' => 'Открыть',
                            'desc' => 'Вентель промыки каппиляров',
                            'disabled' => !$is_turn_on,
                            'icon_href' => '/web/images/sprite.svg#ic_chromatograph2',
                            'is_on' => $is_open,
                            'on_click' => 'isOpenOn'
                        ])
                        @include('livewire.stages.chromatograph-stage.button', [
                            'title' => 'Заменить колонки',
                            'desc' => 'Замена колонки в хроматографе',
                            'disabled' => !$is_open,
                            'icon_href' => '/web/images/sprite.svg#ic_chromatograph3',
                            'is_on' => $replaced,
                            'on_click' => 'replacedOn'
                        ])
                    </div>
                </div>

                <div class="section">
                    <div class="title">Насос</div>
                    @include('livewire.stages.chromatograph-stage.button', [
                            'title' => 'Включить',
                            'desc' => 'Управление насосом хроматографа',
                            'disabled' => !$replaced,
                            'icon_href' => '/web/images/sprite.svg#ic_chromatograph4',
                            'is_on' => $pump,
                            'on_click' => 'pumpOn'
                        ])
                </div>

                <div class="section">
                    <div class="title">Инжектор</div>

                    @include('livewire.stages.chromatograph-stage.button', [
                            'title' => 'Подсоеденить',
                            'desc' => 'Ввод шприцов в кран хроматографа',
                            'disabled' => !$pump,
                            'icon_href' => '/web/images/sprite.svg#ic_chromatograph5',
                            'is_on' => $injector,
                            'on_click' => 'injectorOn'
                        ])
                </div>

                <div class="section">
                    <div class="title">Работа с ПО</div>

                    <button
                            class="default_btn modal_btn {{ !$injector ? 'disabled' : '' }}"
                            data-modal="chromatograph_error_modal"
                            type="button"
                            @if ($injector)
                                wire:click="run"
                            @endif
                    >
                        <svg><use xlink:href="/web/images/sprite.svg#ic_chromatograph6"></use></svg>
                        <span>Запустить ПО</span>
                    </button>
                </div>

                <div class="section">
                    <div class="title">Записи</div>
                    <a href="/task_modal4.html" data-type="ajax" class="default_btn disabled">
                        <svg><use xlink:href="/web/images/sprite.svg#ic_chromatograph7"></use></svg>

                        <span>Внести записи</span>
                    </a>
                </div>
            </div>
        </div>

        <img src="/web/images/tmp/chromatograph_img.jpg" alt="" loading="lazy" class="bg">

        <livewire:stages.components.modals.modal-cart-component :session='$session' />
        <livewire:stages.components.component-cart :session='$session' click-component-event="show-cart-component-modal" />
    </section>
    <livewire:stages.components.modals.modal-video />

</div>