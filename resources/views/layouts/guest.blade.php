<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{ asset('frontend/src/css/style.css') }}">
</head>
<body>
    <div class="min-vh-100 bg-white">
        <div class="row g-0">
            <div class="col-lg-6 min-vh-100 d-flex" style="">
                <img src="{{ asset('frontend/images/auth-banner.webp') }}" alt="Banner Image" class="img-fluid w-100 h-100 object-fit-cover">
            </div>
            <div class="col-lg-6 p-md-5 min-vh-100 d-flex align-items-center"> 
                <div class="mx-auto w-100" style="max-width:600px;"> 
                    <div class="text-center">
                        <a href="{{ url('/') }}">
                            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                        </a>
                    </div>
        
                    <div class="mt-3">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initializes all icons across the page on first load
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        });
    </script>
</body>
</html>
