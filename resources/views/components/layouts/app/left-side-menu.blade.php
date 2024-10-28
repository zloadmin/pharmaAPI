<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu mm-show">

    <!-- LOGO -->
    <a href="{{ route('admin.dashboard-page') }}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="/hyper/images/logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="/hyper/images/logo_sm.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100 mm-active" id="left-side-menu-container" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">

                            <!--- Sidemenu -->
                            <ul class="metismenu side-nav mm-show" id="left-side-menu">

                                <li class="side-nav-title side-nav-item">Меню</li>

                                <li class="side-nav-item">
                                    <a href="{{ route('admin.dashboard-page') }}" class="side-nav-link" wire:navigate>
                                        <i class="uil-home-alt"></i>
                                        <span>Панель</span>
                                    </a>
                                </li>
                                <li class="side-nav-item">
                                    <a href="{{ route('admin.storage-components-page') }}" class="side-nav-link" wire:navigate>
                                        <i class="uil-flask"></i>
                                        <span>Компоненты склада</span>
                                    </a>
                                </li>
{{--                                <li class="side-nav-item">--}}
{{--                                    <a href="{{ route('quizzes-page') }}" class="side-nav-link" wire:navigate>--}}
{{--                                        <i class="uil-science"></i>--}}
{{--                                        <span>Квизы</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                               --}}

                            </ul>


                            <!-- End Sidebar -->

                            <div class="clearfix"></div>

                        </div></div></div></div><div class="simplebar-placeholder" style="width: 260px; height: 1473px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 66px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
