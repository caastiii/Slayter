<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Bergarako Antzokia') }} - Kartelera</title>

        @fonts

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    
    <body class="bg-gray-100 min-h-screen font-sans antialiased flex flex-col">

        <!-- Header -->
        <x-header />
        
        <!-- Main Content -->
        <main class="flex-grow max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 w-full">
            
            <div class="mb-12 text-center">
                <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">
                    Ekitaldien Kartelera
                </h1>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    Gozatu Bergarako Antzokian datozen ikuskizun guztiez.
                </p>
            </div>

            @if(session('success'))
                <div class="mb-8 p-4 bg-green-100 border border-green-400 text-green-700 rounded-xl shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if($ekitaldiak->isEmpty())
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-12 text-center text-gray-500 text-lg">
                    Ez dago ekitaldirik erabilgarri une honetan.
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($ekitaldiak as $ekitaldia)
                        <!-- Tarjeta del Ekitaldi (Estilo exacto de la imagen) -->
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

        </main>
        
        <!-- Footer -->
        <x-footer />

    </body>
</html>