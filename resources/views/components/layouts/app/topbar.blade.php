<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topbar-right-menu float-right mb-0">
{{--        <li class="dropdown notification-list d-lg-none">--}}
{{--            <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">--}}
{{--                <i class="dripicons-search noti-icon"></i>--}}
{{--            </a>--}}
{{--            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">--}}
{{--                <form class="p-3">--}}
{{--                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </li>--}}

        <li class=" notification-list topbar-dropdown">
            <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">

            </a>
        </li>

        @include('components.layouts.app.user-block')

    </ul>
    <button class="button-menu-mobile open-left disable-btn">
        <i class="mdi mdi-menu"></i>
    </button>
</div>
<!-- end Topbar -->

<div class="navbar-custom topnav-navbar" style="display: none">
    <div class="container-fluid">
        <a href="/" class="topnav-logo">
                                <span class="topnav-logo-lg">
                                    <img src="/hyper/images/logo-light.png" alt="" height="16">
                                </span>
            <span class="topnav-logo-sm">
                                    <img src="/hyper/images/logo_sm_dark.png" alt="" height="16">
                                </span>
        </a>

        <ul class="list-unstyled topbar-right-menu float-right mb-0">
            @include('components.layouts.app.user-block')
        </ul>

        <button class="button-menu-mobile open-left disable-btn">
            <i class="mdi mdi-menu"></i>
        </button>
    </div>

</div>
