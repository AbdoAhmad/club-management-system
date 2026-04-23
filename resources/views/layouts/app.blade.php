<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" >

    @include('layouts.partials.header')
    @stack("styles")
    @livewireStyles

    <body class="layout-fixed sidebar-expand-lg">
    <div class="app-wrapper">
        @include('layouts.partials.navbar')
        @include('layouts.partials.sidebar')

        <main class="app-main">
            <div class="container-fluid p-4">
                {{ $slot }}
            </div>
        </main>

        @include('layouts.partials.footer')
    </div>

    @stack("scripts")
    @livewireScripts
    @stack('scripts')
    @livewireScripts

</html>
