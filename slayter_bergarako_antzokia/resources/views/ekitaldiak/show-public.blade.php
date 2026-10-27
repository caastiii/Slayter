<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $ekitaldia->izenburua }} - Bergarako Antzokia</title>
        
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
        <main class="flex-grow max-w-5xl mx-auto py-12 px-4 sm:px-6 lg:px-8 w-full">
            
            <!-- Atzera egiteko botoia -->
            <div class="mb-6">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center text-sm font-semibold text-[#2b56bd] hover:underline">
                    &larr; {{ __('Kartelerara itzuli') }}
                </a>
            </div>

            <!-- Ekitaldiaren Txartel Nagusia -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col md:flex-row">
                
                <!-- Argazkia -->
                <div class="md:w-1/2 h-80 md:h-auto bg-gray-200 relative overflow-hidden">
                    @if($ekitaldia->irudia)
                        <img src="{{ asset('storage/' . $ekitaldia->irudia) }}" alt="{{ $ekitaldia->izenburua }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-400 bg-gray-100">
                            <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif

                    <span class="absolute top-4 left-4 bg-[#2b56bd] text-white text-xs font-bold px-3 py-1.5 rounded-full uppercase tracking-wider">
                        {{ $ekitaldia->egoera ?? 'Ekitaldia' }}
                    </span>
                </div>

                <!-- Xehetasunak -->
                <div class="md:w-1/2 p-8 flex flex-col justify-between">
                    <div>
                        <h1 class="text-3xl font-extrabold text-gray-900 mb-4">
                            {{ $ekitaldia->izenburua }}
                        </h1>

                        <!-- Datu azkarren zerrenda -->
                        <div class="space-y-3 mb-6 text-sm text-gray-600 border-y py-4 border-gray-100">
                            <div class="flex items-center justify-between">
                                <span class="font-semibold text-gray-700">Data eta Ordua:</span>
                                <span>{{ \Carbon\Carbon::parse($ekitaldia->ekitaldi_data)->format('Y/m/d') }} - {{ $ekitaldia->ordua }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="font-semibold text-gray-700">Sarreraren Prezioa:</span>
                                <span class="text-lg font-bold text-gray-900">
                                    {{ $ekitaldia->prezio_sarrera > 0 ? number_format($ekitaldia->prezio_sarrera, 2) . ' €' : 'Doan' }}
                                </span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="font-semibold text-gray-700">Aforo Librea:</span>
                                <span class="{{ $ekitaldia->aforo_librea > 0 ? 'text-green-600 font-bold' : 'text-red-600 font-bold' }}">
                                    {{ $ekitaldia->aforo_librea > 0 ? $ekitaldia->aforo_librea . ' sarrera gelditzen dira' : 'Agortuta' }}
                                </span>
                            </div>
                        </div>

                        <!-- Deskripzioa -->
                        <div class="mb-6">
                            <h3 class="text-base font-bold text-gray-800 mb-2">Deskripzioa:</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                {{ $ekitaldia->deskripzioa ?? 'Ez dago deskripziorik eskuragarri.' }}
                            </p>
                        </div>
                    </div>

                    <!-- Erosi Botoia -->
                    <div class="pt-4 border-t border-gray-100">
                        @if($ekitaldia->aforo_librea > 0)
                            <a href="#" class="w-full inline-flex justify-center items-center px-6 py-3.5 bg-[#2b56bd] border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-wider hover:bg-blue-700 transition duration-150 shadow-sm">
                                {{ __('Erosi Sarrerak') }}
                            </a>
                        @else
                            <button disabled class="w-full inline-flex justify-center items-center px-6 py-3.5 bg-gray-300 border border-transparent rounded-xl font-bold text-sm text-gray-500 uppercase tracking-wider cursor-not-allowed">
                                {{ __('Sarrera Guztiak Saldu Dira') }}
                            </button>
                        @endif
                    </div>

                </div>

            </div>

        </main>
        
        <!-- Footer -->
        <x-footer />

    </body>
</html>