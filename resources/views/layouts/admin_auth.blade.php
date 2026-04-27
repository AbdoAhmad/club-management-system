{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" crossorigin="anonymous" />
    
    <!-- Third Party Plugins -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" crossorigin="anonymous" />
    
    <!-- AdminLTE CSS -->
    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('dashboard-files/css/adminlte.rtl.css') }}" />
    @else
        <link rel="stylesheet" href="{{ asset('dashboard-files/css/adminlte.css') }}" />
    @endif
    <link rel="stylesheet" href="{{ asset('dashboard-files/css/custom.css') }}" />

    <!-- Theme Script -->
    <script>
        (() => {
            'use strict';
            const storedTheme = localStorage.getItem('theme');
            const getPreferredTheme = () => storedTheme || (globalThis.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            const setTheme = theme => document.documentElement.setAttribute('data-bs-theme', theme === 'auto' && globalThis.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : theme);
            setTheme(getPreferredTheme());
        })();
    </script>
    
    @livewireStyles
</head>

<body class="login-page bg-body-secondary">
    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>Football</b>Club</a>
        </div>
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            {{ $slot }}
        </div>
    </div>
    <!-- /.login-box -->

    <!-- Required Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('dashboard-files/js/adminlte.js') }}"></script>
    
    @livewireScripts
    @stack('scripts')
</body>

</html> --}}
