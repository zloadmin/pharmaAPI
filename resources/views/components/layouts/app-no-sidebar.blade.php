<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.layouts.app.head')
<body class="" data-layout="topnav" data-layout-config="{&quot;layoutBoxed&quot;:false,&quot;darkMode&quot;:false,&quot;showRightSidebarOnStart&quot;: true}">
<!-- Begin page -->
<div class="wrapper">

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">
            <!-- Topbar Start -->
            @persist('topbar')
            @include('components.layouts.app.topbar', ['topnav' => true])
            @endpersist
            <!-- end Topbar -->

            <!-- Start Content-->
            <div class="container-fluid mt-3">

                <!-- start page title -->
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
                </div>

                <!-- end row -->

            </div>
            <!-- container -->

        </div>
        <!-- content -->

        <!-- Footer Start -->
        @include('components.layouts.app.footer')
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

@include('components.layouts.app.scripts')
<!-- end demo js-->


</body>
</html>
