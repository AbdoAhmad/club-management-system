<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Club Management - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('dashboard-files/css/style.css') }}" />
    <script src="{{ asset('dashboard-files/js/script.js') }}" defer></script>
</head>
<body>
    <!-- Stadium Background -->
    <div class="stadium-bg"></div>

    <!-- Floating Decorative Elements -->
    <div class="floating-circle" style="width: 300px; height: 300px; top: 10%; left: 5%; background: linear-gradient(135deg, #22c55e, #16a34a); animation-delay: 0s;"></div>
    <div class="floating-circle" style="width: 200px; height: 200px; bottom: 15%; right: 10%; background: linear-gradient(135deg, #0f172a, #22c55e); animation-delay: 2s;"></div>

    {{ $slot }}
     
</body>
</html>

