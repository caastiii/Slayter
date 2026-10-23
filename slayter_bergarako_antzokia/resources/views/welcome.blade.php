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
            <!-- Ongietorria eta Historia -->
<div class="mb-16">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">
            Ongi etorri Bergarako Antzokira
        </h1>
        <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
            Gozatu zinema, antzerki eta musika eskaintza onenaz Bergarako bihotzean.
        </p>
    </div>

    <!-- Historiaren atala -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 sm:p-12 text-center lg:text-left flex flex-col lg:flex-row items-center gap-8">
        <div class="lg:w-2/3">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Gure Historia</h2>
            <p class="text-gray-600 text-lg leading-relaxed mb-4">
                1922an ateak ireki zituenetik, Bergarako Antzokia gure herriko kulturaren benetako taupada izan da. Hasierako urteetan zarzuelak, bertso-saioak eta antzerki klasikoak nagusi baziren ere, garai berrietara egokitzen jakin dugu beti, gure xarma eta arkitektura historikoa mantenduz.
            </p>
            <p class="text-gray-600 text-lg leading-relaxed">
                Gaur egun, azken belaunaldiko argiztapen eta soinu teknologiaz hornituta gaude. Bertako talentua bultzatzea eta maila goreneko obrak gure oholtzara ekartzea da gure konpromisoa. Kultura elkarrekin bizitzeko gunea da hau; zure gunea.
            </p>
        </div>
        <div class="lg:w-1/3 w-full h-64 bg-gray-200 rounded-xl overflow-hidden relative">
    <img src="{{ asset('img/ArgazkiHistorikoa.jpg') }}" class="absolute inset-0 w-full h-full object-cover" alt="Bergarako Antzokia">
</div>
    </div>
</div>

<!-- Datozen Ikuskizunak -->
<div class="mb-16">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800">Datozen Ikuskizunak</h2>
        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">
            Kartelera osoa ikusi &rarr;
        </a>
    </div>

    <!-- Txartelen Grid-a Blade osagaiak erabiliz -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <x-event-card 
            type="Zinema" 
            typeColor="blue" 
            title="Estreinoko Filma" 
            date="Ostirala, 24 | 19:30" 
        />
        
        <x-event-card 
            type="Antzerkia" 
            typeColor="rose" 
            title="Bertako Antzezlana" 
            date="Larunbata, 25 | 20:00" 
        />
        
        <x-event-card 
            type="Musika" 
            typeColor="emerald" 
            title="Kontzertu Akustikoa" 
            date="Igandea, 26 | 19:00" 
        />
    </div>
</div>
        </main>
        
        <!-- 3. El Footer AHORA ESTÁ DENTRO del body -->
        <x-footer />

    </body>
</html>