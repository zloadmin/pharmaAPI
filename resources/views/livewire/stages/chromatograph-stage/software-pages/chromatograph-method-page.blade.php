<div>
    @include('livewire.stages.chromatograph-stage.software-pages.top-panel')

    <div class="data">
        <div class="left_panel">
            <img src="/web/images/tmp/software/left_panel_img.svg" alt="">
        </div>

        <div class="full_panel">
            <div class="head">
                <div class="title">Метод сбора данных — Аминосалициловая кислота <span>(название формируется из хим вещества в билете)</span></div>

                <img src="/web/images/tmp/software/software2_img1.svg" alt="">
            </div>

            <div class="row">
                <div class="col_left">
                    <div class="links">
                        <img src="/web/images/tmp/software/software2_img2.svg" alt="">

                        <div>
                            <a
{{--                                    href="{{ route('chromatograph-method-page', $session) }}" class="sub_link active" wire:navigate--}}
                                    wire:click="saveAndRedirect('chromatograph-method-page', '{{ $session }}')"
                                    href="{{ route('chromatograph-method-page', $session) }}" class="sub_link active" wire:navigate
                            >
                                <img src="/web/images/tmp/software/ic_arr_ver.svg" alt="" class="arr">
                                <span>Параметры прибора</span>
                            </a>

                            <div class="sub" style="display: block;">
                                @foreach($tabs as $tabKey => $tabData)
                                    <div><a href="#" class="{{ $tabData['isShow'] ? 'active' : '' }}" wire:click="showTab('{{ $tabKey }}')">{{ $tabData['title'] }}</a></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($tabs as $tabKey => $tabData)
                    @include('livewire.stages.chromatograph-stage.software-pages.method-page-tabs.' . $tabKey, ['isShow' => $tabData['isShow']])
                @endforeach
            </div>
        </div>
    </div>
    <div class="bottom">
        <img src="/web/images/tmp/software/bottom_img.svg" alt="">
    </div>
</div>