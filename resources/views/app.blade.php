@include('component.head')

<!--begin::App Wrapper-->
<div class="app-wrapper">
    <!--begin::Header-->
    @include('component.navbar')
    <!--end::Header-->

    <!--begin::Sidebar-->
    @include('component.sidebar')
    <!--end::Sidebar-->

    <!--begin::App Main-->
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">

                @yield('content')

            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
    <!--end::App Main-->

    <!--begin::Footer-->
    @include('component.footer')
    <!--end::Footer-->
</div>
<!--end::App Wrapper-->

<!-- Scripts -->
@include('component.script')

<! VERY IMPORTANT - Loads page-specific scripts -->
@stack('script')

</body>
</html>
