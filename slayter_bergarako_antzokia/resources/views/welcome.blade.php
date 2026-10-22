<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Bergarako Antzokia') }}</title>

        @fonts

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    
    <!-- 1. Añadimos 'flex flex-col' al body -->
    <body class="bg-gray-100 min-h-screen font-sans antialiased flex flex-col">

        <!-- Header único con tu diseño azul -->
        <x-header />
        
        <x-carrousel />
        
        <!-- 2. Añadimos 'flex-grow' al main para que empuje el footer -->
        <!-- También le he puesto w-full para que no haya problemas de anchos -->
        <main class="flex-grow max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 w-full">
            <!-- Aquí va el contenido principal de tu aplicación -->
        </main>
        
        <!-- 3. El Footer AHORA ESTÁ DENTRO del body -->
        <x-footer />

    </body>
</html>