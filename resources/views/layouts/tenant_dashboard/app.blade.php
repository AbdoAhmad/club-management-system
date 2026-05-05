<!DOCTYPE html>
<html lang="en">
@include('layouts.tenant_dashboard.partials.header')

<body>
    <!-- Sidebar -->
    @include('layouts.tenant_dashboard.partials.sidebar')

    <!-- Navbar -->
    @include('layouts.tenant_dashboard.partials.navbar')

    <!-- Main Content -->
    <main class="content-main">
        {{ $slot }}
    </main>

    <!-- Footer -->
    @include('layouts.tenant_dashboard.partials.footer')
</body>

</html>
