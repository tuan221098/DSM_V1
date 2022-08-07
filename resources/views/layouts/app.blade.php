<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>@yield('page_title') | DSM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <!-- App Css-->
    <link href="{{ asset('css/app.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body data-topbar="dark">

<!-- Begin page -->
<div id="layout-wrapper">

    @include('layouts.header')

    <!-- ========== Left Sidebar Start ========== -->
        @include('layouts.sidebar')
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                @include('layouts.breadcrumbs')
                <!-- end page title -->

                @yield('content')
            </div>
        </div>
        <!-- End Page-content -->
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- App js -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/utils/buttonUtils.js') }}"></script>
<script src="{{ asset('js/utils/controlUtil.js') }}"></script>
<script src="{{ asset('js/utils/flashUtil.js') }}"></script>
@yield('scripts')
</body>

</html>
