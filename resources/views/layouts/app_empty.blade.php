<!DOCTYPE html>
<html lang="vi">
<head><base href="../../../">
    <title>AG Store - @yield('page_title')</title>
    <meta charset="utf-8" />
    <meta content="{{ csrf_token() }}" name="csrf-token" />
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link rel="stylesheet" href="{{ asset('css/plugins.bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.bundle.css') }}">
</head>
<body id="kt_body" class="bg-body">
<div class="d-flex flex-column flex-root">
    @yield('content')
</div>

<script src="{{asset('js/plugins.bundle.js')}}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('js/scripts.bundle.js')}}"></script>
<script src="{{ asset('js/utils/controlUtil.js') }}"></script>
<script src="{{ asset('js/utils/flashUtil.js') }}"></script>
@yield('scripts')
</body>
</html>
