<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" >

    @include('layouts.admin_dashboard.partials.header')

    <body class="layout-fixed sidebar-expand-lg">
    <div class="app-wrapper">
        @include('layouts.admin_dashboard.partials.navbar')
        @include('layouts.admin_dashboard.partials.sidebar')

        <main class="app-main">
            <div class="container-fluid p-4">
                {{ $slot }}
            </div>
        </main>

        @include('layouts.admin_dashboard.partials.footer')
    </div>
</html>
