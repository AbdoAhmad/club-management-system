<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Club Management - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ global_asset('dashboard-files/css/style.css') }}" />
    <link rel="stylesheet" href="{{ global_asset('dashboard-files/css/custom.css') }}" />
    <script src="{{ global_asset('dashboard-files/js/script.js') }}" defer></script>
    <style>
        /* Global Gold Theme Overrides for Auth Pages */
        :root {
            --accent: #D4AF37 !important;
            --accent-dark: #B38F22 !important;
            --border: rgba(212, 175, 55, 0.2);
        }

        .btn-primary, .primary-button {
            background: linear-gradient(135deg, #D4AF37, #B38F22) !important;
            box-shadow: 0 20px 40px rgba(212, 175, 55, 0.18) !important;
            border: none !important;
        }

        .btn-primary:hover, .primary-button:hover {
            box-shadow: 0 24px 48px rgba(212, 175, 55, 0.24) !important;
            transform: translateY(-2px);
        }

        .text-link {
            color: #D4AF37 !important;
        }

        .text-link::after {
            background: #D4AF37 !important;
        }

        .checkbox-input:checked, .input[type="checkbox"]:checked {
            border-color: #D4AF37 !important;
            background: linear-gradient(135deg, #D4AF37, #B38F22) !important;
        }

        .input-field:focus, .input:focus {
            border-color: #D4AF37 !important;
            box-shadow: 0 0 0 4px rgba(212, 175, 55, 0.1) !important;
        }
        
        .stadium-bg {
            filter: grayscale(0.5) brightness(0.4) sepia(0.2);
        }
    </style>
</head>

<body>
    <!-- Stadium Background -->
    <div class="stadium-bg"></div>

    <!-- Floating Decorative Elements -->
    <div class="floating-circle"
        style="width: 300px; height: 300px; top: 10%; left: 5%; background: linear-gradient(135deg, #D4AF37, #B38F22); animation-delay: 0s; opacity: 0.08;">
    </div>
    <div class="floating-circle"
        style="width: 200px; height: 200px; bottom: 15%; right: 10%; background: linear-gradient(135deg, #1A1A1A, #D4AF37); animation-delay: 2s; opacity: 0.08;">
    </div>

    {{ $slot }}

</body>

</html>