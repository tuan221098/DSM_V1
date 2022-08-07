<!doctype html>
<html lang="vi">

<head>

    <meta charset="utf-8" />
    <title>@yield('page_title') | DSM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ csrf_token() }}" name="csrf-token" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <link href="{{ asset('css/app.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="auth-body-bg">
<div class="bg-overlay"></div>
<div class="wrapper-page">
    <div class="container-fluid p-0">
        @yield('content')
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/utils/flashUtil.js') }}"></script>
<script src="{{ asset('js/utils/controlUtil.js') }}"></script>

@yield('scripts')
</body>
</html>
