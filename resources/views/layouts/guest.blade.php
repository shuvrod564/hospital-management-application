<!-- resources/views/layouts/guest.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #dbe2ef;
        }
        .auth-card {
            background-color: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            max-width: 1000px;
            width: 100%;
        }
        .banner-blue-section {
            background-color: #3b59d8;
            color: #ffffff;
        }
        .brand-logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
            text-decoration: none;
        }
        .brand-logo-text-white {
            font-size: 1.5rem;
            font-weight: 700;
            color: #ffffff;
            text-decoration: none;
        }
        .btn-primary-custom {
            background-color: #3b59d8;
            border-color: #3b59d8;
            color: #ffffff;
            padding: 10px 16px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        .btn-primary-custom:hover {
            background-color: #2d45b5;
            border-color: #2d45b5;
            color: #ffffff;
        }
        .form-control-custom {
            padding: 10px 14px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            font-size: 0.95rem;
        }
        .form-control-custom:focus {
            border-color: #3b59d8;
            box-shadow: 0 0 0 0.2rem rgba(59, 89, 216, 0.15);
        }
        .text-link {
            color: #3b59d8;
            text-decoration: none;
            font-weight: 600;
        }
        .text-link:hover {
            text-decoration: underline;
        }
    </style>
    
    <link rel="stylesheet" href="{{ asset('frontend/src/css/style.css') }}">
</head>
<body class="min-vh-100 d-flex align-items-center justify-content-center p-3 p-md-4">
    
    <div class="auth-card">
        <div class="row g-0">
            <!-- Left Side: Banner & Information -->
            <div class="col-lg-6 d-none d-lg-flex flex-column">
                <div class="h-50 overflow-hidden">
                    <img src="{{ asset('frontend/images/auth-banner.webp') }}" alt="Hospital Banner" class="w-100 h-100 object-fit-cover">
                </div>
                <div class="h-50 banner-blue-section p-5 d-flex flex-column justify-content-center position-relative">
                    <div class="mb-4">
                        <a href="{{ url('/') }}" class="brand-logo-text-white d-inline-flex align-items-center gap-2">
                            <x-application-logo class="w-8 h-8 fill-current text-white" />
                            <span>Invision</span>
                        </a>
                    </div>
                    <div class="border-start border-3 border-white ps-3">
                        <h4 class="fw-semibold mb-2">Welcome to Invision<br>Hospital Management System</h4>
                        <p class="mb-0 text-white-50 small">Cloud Based Streamline Hospital Management system with centralized user friendly platform</p>
                    </div>
                </div>
            </div>

            <!-- Right Side: Auth Form -->
            <div class="col-lg-6 p-4 p-md-5 d-flex align-items-center bg-white"> 
                <div class="w-100 mx-auto" style="max-width: 380px;"> 
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        });
    </script>
</body>
</html>