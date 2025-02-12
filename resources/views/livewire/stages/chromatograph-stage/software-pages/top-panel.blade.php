<div class="tabs">
    <img src="/web/images/tmp/software/tabs_img.svg" alt="">
</div>
<div class="top_panel no_m">
    <div class="section">
        <img src="/web/images/tmp/software/head_img1.svg" alt="">
    </div>


    <div class="section">
        <div class="btns">
            <a class="btn @if(isset($activeTab) && $activeTab == 'chromatograph-method-page') active @endif"
{{--               href="{{ route('chromatograph-method-page', $session) }}" wire:navigate--}}
               wire:click="saveAndRedirect('chromatograph-method-page', '{{ $session }}')" href="#"
            >
                <div class="icon">
                    <img src="/web/images/tmp/software/ic_head1.svg" alt="">
                </div>
                <span>Метод</span>
            </a>

            <a class="btn @if(isset($activeTab) && $activeTab == 'chromatograph-status-page') active @endif"
{{--               href="{{ route('chromatograph-status-page', $session) }}" wire:navigate--}}
               wire:click="saveAndRedirect('chromatograph-status-page', '{{ $session }}')" href="#"
            >
                <div class="icon">
                    <img src="/web/images/tmp/software/ic_head2.svg" alt="">
                </div>
                <span>Статус</span>
            </a>

            <a class="btn @if(isset($activeTab) && $activeTab == 'chromatograph-single-sample-page') active @endif"
{{--               href="{{ route('chromatograph-single-sample-page', $session) }}" wire:navigate--}}
               wire:click="saveAndRedirect('chromatograph-single-sample-page', '{{ $session }}')" href="#"
            >
                <div class="icon">
                    <img src="/web/images/tmp/software/ic_head2.svg" alt="">
                </div>

                <span>Еденичная проба</span>
            </a>

            <button class="btn disabled">
                <div class="icon">
                    <img src="/web/images/tmp/software/ic_head1.svg" alt="">
                </div>
                <span>Последовательность</span>
            </button>

            <a class="btn @if(isset($activeTab) && $activeTab == 'chromatograph-result-page') active @endif"
{{--               href="{{ route('chromatograph-result-page', $session) }}" wire:navigate--}}
               wire:click="saveAndRedirect('chromatograph-result-page', '{{ $session }}')" href="#"
            >
                <div class="icon">
                    <img src="/web/images/tmp/software/ic_head2.svg" alt="">
                </div>

                <span>Результаты</span>
            </a>

            <!-- <img src="/web/images/tmp/software/head_img2.svg" alt=""> -->
        </div>

        <div class="name">Макеты</div>
    </div>

    <div class="section">
        <img src="/web/images/tmp/software/head_img3.svg" alt="">
    </div>

    <a class="check_btn"
{{--       href="{{ route('chromatograph-stage', $session) }}" wire:navigate--}}
       wire:click="saveAndRedirect('chromatograph-stage', '{{ $session }}')" href="#"
    >Проверить</a>
</div>