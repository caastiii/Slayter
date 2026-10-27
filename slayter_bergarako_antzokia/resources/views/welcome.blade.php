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
    
    <body class="bg-gray-100 min-h-screen font-sans antialiased flex flex-col">

        <!-- Header -->
        <x-header />
        
        <x-carrousel />
        
        <main class="flex-grow max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 w-full">
            
            <!-- Título principal -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">
                    Ongi etorri Bergarako Antzokira
                </h1>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    Gozatu zinema, antzerki eta musika eskaintza onenaz Bergarako bihotzean.
                </p>
            </div>

            <!-- 1. Datozen Ikuskizunak (Primero) -->
            <div class="mb-16">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-800">Datozen Ikuskizunak</h2>
                    <a href="{{ route('dashboard') }}" class="text-[#2b56bd] hover:text-blue-800 font-medium transition-colors">
                        Kartelera osoa ikusi &rarr;
                    </a>
                </div>

                @if(!isset($ekitaldiak) || $ekitaldiak->isEmpty())
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 text-center text-gray-500">
                        Ez dago ekitaldirik ikusgai une honetan.
                    </div>
                @else
                    <!-- Grid de las 3 primeras tarjetas idénticas a las de dashboard.blade.php -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($ekitaldiak->take(3) as $ekitaldia)
                            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col justify-between">
                                
                                <div>
                                    <!-- Área de Imagen -->
                                    <div class="h-64 bg-gray-200 relative overflow-hidden flex items-center justify-center">
                                        @if($ekitaldia->irudia)
                                            <img src="{{ asset('storage/' . $ekitaldia->irudia) }}" alt="{{ $ekitaldia->izenburua }}" class="w-full h-full object-cover">
                                        @else
                                            <span class="text-gray-400 font-medium text-sm">[Kartelaren Irudia]</span>
                                        @endif
                                    </div>

                                    <!-- Contenido de la Tarjeta -->
                                    <div class="p-6">
                                        <!-- Categoría / Tipo en azul -->
                                        <div class="text-xs text-[#2b56bd] font-bold uppercase tracking-wider mb-2">
                                            {{ $ekitaldia->egoera ?? 'EKITALDIA' }}
                                        </div>

                                        <!-- Título -->
                                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-1">
                                            {{ $ekitaldia->izenburua }}
                                        </h3>

                                        <!-- Fecha y hora con icono de calendario -->
                                        <div class="flex items-center text-xs text-gray-500 mb-4">
                                            <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <span>{{ \Carbon\Carbon::parse($ekitaldia->ekitaldi_data)->format('Y/m/d') }} | {{ $ekitaldia->ordua }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Botones de Acción (Ikusi e Erosi) -->
                                <div class="px-6 pb-6 pt-0 flex items-center justify-between gap-3">
                                    <!-- Botón IKUSI -->
                                    <a href="{{ route('ekitaldiak.publikoa.show', $ekitaldia->id) }}" 
                                       class="w-1/2 inline-flex justify-center items-center px-4 py-2.5 bg-gray-700 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-wider hover:bg-gray-800 transition duration-150">
                                        {{ __('Ikusi') }}
                                    </a>

                                    <!-- Botón EROSI / SARRERAK EROSI -->
                                    @if(($ekitaldia->aforo_librea ?? 1) > 0)
                                        <a href="#" 
                                           class="w-1/2 inline-flex justify-center items-center px-4 py-2.5 bg-[#2b56bd] border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-wider hover:bg-blue-700 transition duration-150">
                                            {{ __('Sarrerak erosi') }}
                                        </a>
                                    @else
                                        <button disabled 
                                                class="w-1/2 inline-flex justify-center items-center px-4 py-2.5 bg-gray-300 border border-transparent rounded-lg font-semibold text-xs text-gray-500 uppercase tracking-wider cursor-not-allowed">
                                            {{ __('Agortuta') }}
                                        </button>
                                    @endif
                                </div>

                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- 2. Historiaren atala (Después) -->
            <div class="mb-16">
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

        </main>
        
        <!-- Footer -->
        <x-footer />

    </body>
</html>