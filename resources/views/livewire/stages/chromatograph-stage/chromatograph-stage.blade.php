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

                        {{--                        @include('livewire.stages.chromatograph-stage.button', ['status' => $chromatographStatusInstalledJars])--}}
                        @include('livewire.stages.chromatograph-stage.button', [
                            'title' => $chromatographStatusInstalledJars->getTitle(),
                            'desc' => $chromatographStatusInstalledJars->getDescription(),
                            'disabled' => $chromatographStatusInstalledJars->isDisabled(),
                            'icon_href' => $chromatographStatusInstalledJars->getIconHref(),
                            'is_on' => $chromatographStatusInstalledJars->isOn(),
                            'on_click' => 'turnOnStatusInstalledJars',
                            'enum' => $chromatographStatusInstalledJars,
                        ])
                        @include('livewire.stages.chromatograph-stage.button', [
                            'title' => $chromatographStatusTurnOn->getTitle(),
                            'desc' => $chromatographStatusTurnOn->getDescription(),
                            'disabled' => $chromatographStatusTurnOn->isDisabled(),
                            'icon_href' => $chromatographStatusTurnOn->getIconHref(),
                            'is_on' => $chromatographStatusTurnOn->isOn(),
                            'on_click' => 'turnOnChromatograph',
                            'enum' => $chromatographStatusTurnOn,
                        ])
                        @include('livewire.stages.chromatograph-stage.button', [
                            'title' => $chromatographStatusFlushValve->getTitle(),
                            'desc' => $chromatographStatusFlushValve->getDescription(),
                            'disabled' => $chromatographStatusFlushValve->isDisabled(),
                            'icon_href' => $chromatographStatusFlushValve->getIconHref(),
                            'is_on' => $chromatographStatusFlushValve->isOn(),
                            'on_click' => $chromatographStatusFlushValve->onClick(),
                            'enum' => $chromatographStatusFlushValve,
                        ])
                        @include('livewire.stages.chromatograph-stage.button', [
                            'title' => $chromatographStatusPump->getTitle(),
                            'desc' => $chromatographStatusPump->getDescription(),
                            'disabled' => $chromatographStatusPump->isDisabled(),
                            'icon_href' => $chromatographStatusPump->getIconHref(),
                            'is_on' => $chromatographStatusPump->isOn(),
                            'on_click' => $chromatographStatusPump->onClick(),
                            'enum' => $chromatographStatusPump,
                        ])


                        {{--                        @include('livewire.stages.chromatograph-stage.button', [--}}
                        {{--                            'title' => 'Установить',--}}
                        {{--                            'desc' => 'Поставить банки на хроматограф',--}}
                        {{--                            'disabled' => false,--}}
                        {{--                            'icon_href' => '/web/images/sprite.svg#ic_chromatograph1',--}}
                        {{--                            'is_on' => $is_set,--}}
                        {{--                            'on_click' => 'isSetOn'--}}
                        {{--                        ])--}}
                        {{--                        @include('livewire.stages.chromatograph-stage.button', [--}}
                        {{--                            'title' => 'Включить',--}}
                        {{--                            'desc' => 'Включает весь хроматограф',--}}
                        {{--                            'disabled' => !$is_set,--}}
                        {{--                            'icon_href' => '/web/images/sprite.svg#ic_chromatograph1',--}}
                        {{--                            'is_on' => $is_turn_on,--}}
                        {{--                            'on_click' => 'isTurnOnOn'--}}
                        {{--                        ])--}}
                        {{--                        @include('livewire.stages.chromatograph-stage.button', [--}}
                        {{--                            'title' => 'Открыть',--}}
                        {{--                            'desc' => 'Вентель промыки каппиляров',--}}
                        {{--                            'disabled' => !$is_turn_on,--}}
                        {{--                            'icon_href' => '/web/images/sprite.svg#ic_chromatograph2',--}}
                        {{--                            'is_on' => $is_open,--}}
                        {{--                            'on_click' => 'isOpenOn'--}}
                        {{--                        ])--}}
                        {{--                        @include('livewire.stages.chromatograph-stage.button', [--}}
                        {{--                            'title' => 'Заменить колонки',--}}
                        {{--                            'desc' => 'Замена колонки в хроматографе',--}}
                        {{--                            'disabled' => !$is_open,--}}
                        {{--                            'icon_href' => '/web/images/sprite.svg#ic_chromatograph3',--}}
                        {{--                            'is_on' => $replaced,--}}
                        {{--                            'on_click' => 'replacedOn'--}}
                        {{--                        ])--}}
                    </div>
                </div>

                <div class="section">
                    <div class="title">Колонки</div>
                    @include('livewire.stages.chromatograph-stage.button', [
                            'title' => $chromatographStatusColumns->getTitle(),
                            'desc' => $chromatographStatusColumns->getDescription(),
                            'disabled' => $chromatographStatusColumns->isDisabled(),
                            'icon_href' => $chromatographStatusColumns->getIconHref(),
                            'is_on' => $chromatographStatusColumns->isOn(),
                            'on_click' => 'replaceColumns',
                            'enum' => $chromatographStatusColumns,
                        ])
                    {{--                    @include('livewire.stages.chromatograph-stage.button', [--}}
                    {{--                            'title' => 'Включить',--}}
                    {{--                            'desc' => 'Управление насосом хроматографа',--}}
                    {{--                            'disabled' => !$replaced,--}}
                    {{--                            'icon_href' => '/web/images/sprite.svg#ic_chromatograph4',--}}
                    {{--                            'is_on' => $pump,--}}
                    {{--                            'on_click' => 'pumpOn'--}}
                    {{--                        ])--}}
                </div>

                <div class="section">
                    <div class="title">Инжектор</div>
                    @include('livewire.stages.chromatograph-stage.button', [
                            'title' => $chromatographStatusIntroduceSample->getTitle(),
                            'desc' => $chromatographStatusIntroduceSample->getDescription(),
                            'disabled' => $chromatographStatusIntroduceSample->isDisabled(),
                            'icon_href' => $chromatographStatusIntroduceSample->getIconHref(),
                            'is_on' => $chromatographStatusIntroduceSample->isOn(),
                            'on_click' => 'on',
                            'enum' => $chromatographStatusIntroduceSample,
                        ])

                    {{--                    @include('livewire.stages.chromatograph-stage.button', [--}}
                    {{--                            'title' => 'Подсоеденить',--}}
                    {{--                            'desc' => 'Ввод шприцов в кран хроматографа',--}}
                    {{--                            'disabled' => !$pump,--}}
                    {{--                            'icon_href' => '/web/images/sprite.svg#ic_chromatograph5',--}}
                    {{--                            'is_on' => $injector,--}}
                    {{--                            'on_click' => 'injectorOn'--}}
                    {{--                        ])--}}
                </div>

                <div class="section">
                    <div class="title">Работа с ПО</div>

                    @include('livewire.stages.chromatograph-stage.small-button', [
                           'title' => $chromatographStatusSoftWare->getTitle(),
                           'disabled' => $chromatographStatusSoftWare->isDisabled(),
                           'icon_href' => $chromatographStatusSoftWare->getIconHref(),
                           'is_on' => $chromatographStatusSoftWare->isOn(),
                           'on_click' => 'runSoftWare',
                           'enum' => $chromatographStatusSoftWare,
                       ])

                    {{--                    <button--}}
                    {{--                            class="default_btn modal_btn {{ !$injector ? 'disabled' : '' }}"--}}
                    {{--                            data-modal="chromatograph_error_modal"--}}
                    {{--                            type="button"--}}
                    {{--                            @if ($injector)--}}
                    {{--                                wire:click="run"--}}
                    {{--                            @endif--}}
                    {{--                    >--}}
                    {{--                        <svg><use xlink:href="/web/images/sprite.svg#ic_chromatograph6"></use></svg>--}}
                    {{--                        <span>Запустить ПО</span>--}}
                    {{--                    </button>--}}
                </div>

                <div class="section">
                    {{--                    <div class="title">Записи</div>--}}
                    {{--                    <a href="/task_modal4.html" data-type="ajax" class="default_btn disabled">--}}
                    {{--                        <svg><use xlink:href="/web/images/sprite.svg#ic_chromatograph7"></use></svg>--}}
                    {{--                        <span>Внести записи</span>--}}
                    {{--                    </a>--}}
                </div>
            </div>
        </div>

        <img src="/web/images/tmp/chromatograph_img.jpg" alt="" loading="lazy" class="bg">

        <livewire:stages.components.modals.modal-cart-component :session='$session'/>
        <livewire:stages.components.component-cart :session='$session'
                                                   click-component-event="show-cart-component-modal"/>
    </section>
    <livewire:stages.components.modals.modal-video/>

</div>