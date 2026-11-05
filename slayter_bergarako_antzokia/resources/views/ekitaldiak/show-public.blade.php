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

        <style>
            /* Scrollbar leuna eta estéticoa deskripzioarentzat */
            .custom-scrollbar::-webkit-scrollbar {
                width: 4px;
            }
            .custom-scrollbar::-webkit-scrollbar-track {
                background: #f1f1f1;
                border-radius: 4px;
            }
            .custom-scrollbar::-webkit-scrollbar-thumb {
                background: #c5c5c5;
                border-radius: 4px;
            }
            .custom-scrollbar::-webkit-scrollbar-thumb:hover {
                background: #a8a8a8;
            }
        </style>
    </head>
    
    <body class="bg-gray-100 min-h-screen font-sans antialiased flex flex-col">

        <!-- Header -->
        <x-header />
        
        <!-- Main Content -->
        <main class="flex-grow max-w-4xl mx-auto py-10 px-4 sm:px-6 lg:px-8 w-full">
            
            <!-- Atzera egiteko botoia -->
            <div class="mb-5">
                <a href="{{ route('ekitaldiak.kartelera') }}" class="inline-flex items-center text-sm font-bold text-[#2b56bd] hover:underline">
                    &larr; {{ __('Kartelerara itzuli') }}
                </a>
            </div>

            <!-- Ekitaldiaren Txartel Nagusia -->
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden flex flex-col md:flex-row items-stretch">
                
                <!-- Argazkia (Altura fija controlada en escritorio) -->
                <div class="md:w-1/2 h-64 md:h-96 bg-gray-200 relative overflow-hidden flex-shrink-0">
                    @if($ekitaldia->irudia)
                        <img src="{{ asset('storage/' . $ekitaldia->irudia) }}" alt="{{ $ekitaldia->izenburua }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-400 bg-gray-100">
                            <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif

                    <span class="absolute top-4 left-4 bg-[#2b56bd] text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-sm">
                        {{ $ekitaldia->egoera ?? 'Ekitaldia' }}
                    </span>
                </div>

                <!-- Xehetasunak -->
                <div class="md:w-1/2 p-6 flex flex-col justify-between">
                    <div>
                        <!-- Título ajustado -->
                        <h1 class="text-xl font-bold text-gray-900 mb-3 leading-snug line-clamp-2" title="{{ $ekitaldia->izenburua }}">
                            {{ $ekitaldia->izenburua }}
                        </h1>

                        <!-- Datu azkarren zerrenda -->
                        <div class="space-y-2.5 mb-4 text-xs sm:text-sm text-gray-700 border-y py-3 border-gray-200">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-gray-800">Data eta Ordua:</span>
                                <span class="font-medium text-gray-900">{{ \Carbon\Carbon::parse($ekitaldia->ekitaldi_data)->format('Y/m/d') }} - {{ $ekitaldia->ordua }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-gray-800">Sarreraren Prezioa:</span>
                                <span class="text-base font-extrabold text-gray-900">
                                    {{ $ekitaldia->prezio_sarrera > 0 ? number_format($ekitaldia->prezio_sarrera, 2) . ' €' : 'Doan' }}
                                </span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-gray-800">Aforo Librea:</span>
                                <span class="text-xs sm:text-sm {{ $ekitaldia->aforo_librea > 0 ? 'text-green-600 font-extrabold' : 'text-red-600 font-extrabold' }}">
                                    {{ $ekitaldia->aforo_librea > 0 ? $ekitaldia->aforo_librea . ' sarrera gelditzen dira' : 'Agortuta' }}
                                </span>
                            </div>
                        </div>

                        <!-- Deskripzioa (Reducida a max-h-24 para evitar expansión) -->
                        <div class="mb-3">
                            <h3 class="text-xs font-bold text-gray-900 uppercase tracking-wider mb-1">Deskripzioa:</h3>
                            <div class="max-h-24 overflow-y-auto pr-1.5 custom-scrollbar">
                                <p class="text-gray-600 text-xs sm:text-sm leading-relaxed break-words">
                                    {{ $ekitaldia->deskripzioa ?? 'Ez dago deskripziorik eskuragarri.' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Erosi Botoia -->
                    <div class="pt-3 border-t border-gray-100">
                        @if($ekitaldia->egoera === 'aktiboa' && ($ekitaldia->aforo_librea ?? 0) > 0)
                            <a href="{{ route('erosketak.create', $ekitaldia->id) }}" class="w-full inline-flex justify-center items-center px-4 py-2.5 bg-[#2b56bd] border border-transparent rounded-xl font-extrabold text-xs sm:text-sm text-white uppercase tracking-wider hover:bg-blue-700 transition duration-150 shadow-md">
                                {{ __('Erosi Sarrerak') }}
                            </a>
                        @elseif($ekitaldia->egoera === 'bertan behera')
                            <button disabled class="w-full inline-flex justify-center items-center px-4 py-2.5 bg-red-100 border border-red-200 rounded-xl font-extrabold text-xs sm:text-sm text-red-600 uppercase tracking-wider cursor-not-allowed">
                                {{ __('Bertan behera') }}
                            </button>
                        @elseif($ekitaldia->egoera === 'bukatuta')
                            <button disabled class="w-full inline-flex justify-center items-center px-4 py-2.5 bg-gray-200 border border-gray-300 rounded-xl font-extrabold text-xs sm:text-sm text-gray-600 uppercase tracking-wider cursor-not-allowed">
                                {{ __('Bukatuta') }}
                            </button>
                        @else
                            <button disabled class="w-full inline-flex justify-center items-center px-4 py-2.5 bg-gray-300 border border-transparent rounded-xl font-extrabold text-xs sm:text-sm text-gray-500 uppercase tracking-wider cursor-not-allowed">
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