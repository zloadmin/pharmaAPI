<div class="main">
    @include('components.layouts.web.header')
    @include('components.layouts.web.change-stage-menu')
    <section class="chromatograph">
        @include('livewire.stages.blocks.back-button')

        <div class="main_data">
            <div class="row">
                <div class="section big">
                    <div class="title">Хроматограф </div>

                    <div class="row">
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
                </div>

                <div class="section">
                    <div class="title">Инжектор</div>
                    @include('livewire.stages.chromatograph-stage.button', [
                            'title' => $chromatographStatusIntroduceSample->getTitle(),
                            'desc' => $chromatographStatusIntroduceSample->getDescription(),
                            'disabled' => $chromatographStatusIntroduceSample->isDisabled(),
                            'icon_href' => $chromatographStatusIntroduceSample->getIconHref(),
                            'is_on' => $chromatographStatusIntroduceSample->isOn(),
                            'on_click' => $chromatographStatusIntroduceSample->onClick(),
                            'enum' => $chromatographStatusIntroduceSample,
                        ])

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
                </div>

                <div class="section">
                    <div class="title">Записи</div>
                    @include('livewire.stages.chromatograph-stage.small-button', [
                          'title' => $chromatographStatusEntries->getTitle(),
                          'disabled' => $chromatographStatusEntries->isDisabled(),
                          'icon_href' => $chromatographStatusEntries->getIconHref(),
                          'is_on' => $chromatographStatusEntries->isOn(),
                          'on_click' => $chromatographStatusEntries->onClick(),
                          'enum' => $chromatographStatusEntries,
                      ])
                </div>
            </div>
        </div>

        <img src="/web/images/chromatograph-backgrounds/{{ $background }}" alt="" loading="lazy" class="bg">

        <livewire:stages.components.modals.modal-cart-component :session='$session'/>
        <livewire:stages.components.component-cart :session='$session'
                                                   click-component-event="show-cart-component-modal"/>
        <livewire:stages.components.modals.modal-result :session='$session'/>
        <div class="exhaust">
            <livewire:stages.components.modals.modal-chromatograph-examples :session='$session' :is-show='$preOpenModalExamples'/>
        </div>
    </section>
    <livewire:stages.components.modals.modal-video/>
</div>
@script
<script>


    $wire.on('unset-cart-choose-mode', () => {
        console.log('chromatograph::unset-cart-choose-mode');
        window.cart_choose_mode = null;
    });
    $wire.on('set-cart-choose-mode', (place) => {
        console.log('chromatograph::unset-cart-choose-mode', place);
        window.cart_choose_mode = place;
    });
    // const components = document.querySelector('.target_component');


    document.addEventListener('click', (event) => {
        const components = Array.prototype.slice.call(document.querySelectorAll('.target_component'));
        let hasTarget = false;
        for (let i = 0; i < components.length; i++) {
            if (event.composedPath().includes(components[i])) {
                hasTarget = true;
            }
        }
        if (!hasTarget && window.cart_choose_mode) {
            console.log('cooking::DISPATCH unset-cooking-table-choose-mode')
            $wire.dispatch('unset-cart-choose-mode');
        }

    })
</script>
@endscript
