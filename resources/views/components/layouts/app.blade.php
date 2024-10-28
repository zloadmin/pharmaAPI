<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.layouts.app.head')
<body class="" data-leftbar-theme="dark" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
<div class="wrapper mm-active">
    @include('components.layouts.app.left-side-menu')

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            @persist('topbar')
                @include('components.layouts.app.topbar')
            @endpersist
            <!-- Start Content-->
            <div class="container-fluid">

                @include('components.layouts.app.page-title')

                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    {{ $slot }}
                                </div>  <!-- end row -->
                            </div> <!-- end card body-->
                        </div> <!-- end card -->

                    </div>
                    <!-- end col-12 -->
                </div> <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->

        @include('components.layouts.app.footer')

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
@include('components.layouts.app.scripts')
</body>
</html>
