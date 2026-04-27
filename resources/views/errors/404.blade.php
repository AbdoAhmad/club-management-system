<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - {{ __('Page Not Found') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ global_asset('dashboard-files/css/style.css') }}" />
    <link rel="stylesheet" href="{{ global_asset('dashboard-files/css/custom.css') }}" />
    <style>
        :root {
            --accent: #D4AF37 !important;
            --accent-dark: #B38F22 !important;
        }

        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #050505;
            font-family: 'Outfit', sans-serif;
        }

        .error-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 10;
            padding: 2rem;
        }

        .error-card {
            background: rgba(18, 18, 18, 0.7);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 32px;
            padding: 4rem 3rem;
            text-align: center;
            max-width: 550px;
            width: 100%;
            box-shadow: 0 40px 100px -20px rgba(0, 0, 0, 0.7);
            animation: fadeInScale 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .error-code {
            font-size: 10rem;
            font-weight: 900;
            background: linear-gradient(135deg, #D4AF37 0%, #B38F22 50%, #FFD700 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 0.9;
            margin-bottom: 1.5rem;
            filter: drop-shadow(0 15px 30px rgba(212, 175, 55, 0.3));
            letter-spacing: -5px;
        }

        .error-title {
            font-size: 2rem;
            color: #FFFFFF;
            margin-bottom: 1.25rem;
            font-weight: 700;
        }

        .error-message {
            color: #9CA3AF;
            margin-bottom: 2.5rem;
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 1rem 2.5rem;
            background: linear-gradient(135deg, #D4AF37, #B38F22);
            color: #000 !important;
            font-weight: 800;
            font-size: 1.1rem;
            border-radius: 16px;
            text-decoration: none;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 15px 35px rgba(212, 175, 55, 0.25);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .back-button:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 20px 45px rgba(212, 175, 55, 0.4);
            color: #000 !important;
        }

        .stadium-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('{{ global_asset("dashboard-files/images/stadium-bg.jpg") }}');
            background-size: cover;
            background-position: center;
            filter: grayscale(0.4) brightness(0.15) sepia(0.1);
            z-index: 1;
            transform: scale(1.1);
            transition: transform 10s ease-out;
        }
        
        body:hover .stadium-bg {
            transform: scale(1);
        }

        .floating-circle {
            position: fixed;
            border-radius: 50%;
            filter: blur(100px);
            z-index: 2;
            opacity: 0.15;
            animation: pulse 8s infinite alternate;
        }

        @keyframes fadeInScale {
            from { opacity: 0; transform: scale(0.9) translateY(30px); }
            to { opacity: 1; transform: scale(1) translateY(0); }
        }

        @keyframes pulse {
            0% { transform: scale(1) translate(0, 0); }
            100% { transform: scale(1.2) translate(20px, 20px); }
        }

        .glitch-wrapper {
            position: relative;
            display: inline-block;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .error-code { font-size: 7rem; }
            .error-card { padding: 3rem 1.5rem; margin: 1rem; }
            .error-title { font-size: 1.5rem; }
        }
    </style>
</head>

<body>
    <div class="stadium-bg"></div>

    <div class="floating-circle"
        style="width: 500px; height: 500px; top: -150px; left: -150px; background: #D4AF37;">
    </div>
    <div class="floating-circle"
        style="width: 400px; height: 400px; bottom: -100px; right: -100px; background: #B38F22; animation-delay: -4s;">
    </div>

    <div class="error-container">
        <div class="error-card">
            <div class="glitch-wrapper">
                <div class="error-code">404</div>
            </div>
            
            <h1 class="error-title">
                {{ app()->getLocale() == 'ar' ? 'عذراً، الصفحة غير موجودة' : 'Oops! Page Not Found' }}
            </h1>
            
            <p class="error-message">
                {{ app()->getLocale() == 'ar' 
                    ? 'يبدو أنك سلكت طريقاً خاطئاً في الملعب. الصفحة التي تبحث عنها قد تم نقلها أو أنها لم تكن موجودة من الأساس.' 
                    : 'It seems you took a wrong turn on the pitch. The page you are looking for might have been moved or never existed.' }}
            </p>
            
            @php
                $homeUrl = url('/');
                if (function_exists('tenant') && tenant()) {
                    if (Route::has('tenant_dashboard')) {
                        $homeUrl = route('tenant_dashboard');
                    }
                } else {
                    if (Route::has('home')) {
                        $homeUrl = route('home');
                    }
                }
            @endphp
            
            <a href="{{ $homeUrl }}" class="back-button">
                {{ app()->getLocale() == 'ar' ? 'العودة للرئيسية' : 'Back to Home' }}
            </a>
        </div>
    </div>
</body>

</html>
