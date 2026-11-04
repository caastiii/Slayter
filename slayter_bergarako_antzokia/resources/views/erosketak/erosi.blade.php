<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Bergarako Antzokia') }} - Sarrerak Erosi</title>
        
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    
    <body class="bg-gray-50 min-h-screen font-sans antialiased flex flex-col">

        <x-header />

        <main class="flex-grow max-w-5xl mx-auto py-10 px-4 sm:px-6 lg:px-8 w-full">
            
            <!-- Botón Volver y Título -->
            <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <a href="{{ route('ekitaldiak.kartelera') }}" class="inline-flex items-center text-sm font-semibold text-gray-500 hover:text-blue-600 transition-colors mb-2">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Atzera egin
                    </a>
                    <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Sarrerak Erosi</h1>
                </div>
                
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-[#2b56bd] border border-blue-100">
                    Prozesu Segurua
                </span>
            </div>

            <!-- Alertas de Error -->
            @if(session('error'))
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-xl shadow-sm flex items-center gap-3">
                    <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.424 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <!-- Tarjeta Principal de Checkout -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden grid grid-cols-1 md:grid-cols-12">
                
                <!-- Columna Izquierda: Información del Evento (5 cols) -->
                <div class="md:col-span-5 bg-gray-50/50 p-6 sm:p-8 border-b md:border-b-0 md:border-r border-gray-100 flex flex-col justify-between">
                    <div>
                        <div class="h-60 bg-gray-200 rounded-xl overflow-hidden shadow-inner mb-6 relative">
                            @if($ekitaldia->irudia)
                                <img src="{{ asset('storage/' . $ekitaldia->irudia) }}" alt="{{ $ekitaldia->izenburua }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center text-gray-400 bg-gray-100">
                                    <svg class="w-12 h-12 mb-2 stroke-current" fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span class="text-xs font-medium">[Kartelaren irudirik gabe]</span>
                                </div>
                            @endif
                            <span class="absolute top-3 left-3 bg-white/90 backdrop-blur-md text-[#2b56bd] font-bold text-xs uppercase px-2.5 py-1 rounded-md shadow-sm">
                                {{ $ekitaldia->egoera ?? 'EKITALDIA' }}
                            </span>
                        </div>

                        <!-- Título limitado con ajuste de palabras -->
                        <h2 class="text-2xl font-bold text-gray-900 leading-tight mb-3 break-words max-w-full">
                            {{ $ekitaldia->izenburua }}
                        </h2>
                        
                        @if($ekitaldia->deskripzioa)
                            <p class="text-sm text-gray-600 mb-6 line-clamp-3 leading-relaxed">{{ $ekitaldia->deskripzioa }}</p>
                        @endif
                    </div>

                    <!-- Detalles con Iconos -->
                    <div class="space-y-3 pt-4 border-t border-gray-200/80 text-xs text-gray-600">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span><strong class="text-gray-800">Data:</strong> {{ \Carbon\Carbon::parse($ekitaldia->ekitaldi_data)->format('Y/m/d') }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span><strong class="text-gray-800">Ordua:</strong> {{ $ekitaldia->ordua }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span><strong class="text-gray-800">Aforo librea:</strong> <span class="text-blue-600 font-semibold">{{ $ekitaldia->aforo_librea }}</span> / {{ $ekitaldia->aforo }}</span>
                        </div>
                    </div>
                </div>

                <!-- Columna Derecha: Formulario de Pedido (7 cols) -->
                <div class="md:col-span-7 p-6 sm:p-8 flex flex-col justify-between">
                    <form action="{{ route('erosketak.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="id_ekitaldia" value="{{ $ekitaldia->id }}">

                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Aukeratu sarrera kopurua</h3>
                            
                            <!-- Control numérico con botones - y + -->
                            <div class="flex items-center gap-3">
                                <button type="button" id="btn-minus" class="w-11 h-11 rounded-lg border border-gray-300 flex items-center justify-center text-gray-600 hover:bg-gray-100 active:bg-gray-200 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                    </svg>
                                </button>

                                <input type="number" 
                                       name="kantitatea" 
                                       id="kantitatea" 
                                       value="1" 
                                       min="1" 
                                       max="{{ $ekitaldia->aforo_librea }}" 
                                       class="w-24 text-center text-lg font-bold rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-2"
                                       required>

                                <button type="button" id="btn-plus" class="w-11 h-11 rounded-lg border border-gray-300 flex items-center justify-center text-gray-600 hover:bg-gray-100 active:bg-gray-200 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                </button>

                                <span class="text-xs text-gray-500 ml-2">
                                    (Gehienez: {{ $ekitaldia->aforo_librea }})
                                </span>
                            </div>

                            @error('kantitatea')
                                <p class="text-xs text-red-600 mt-2 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Detalle de la Transacción -->
                        <div class="bg-gray-50 rounded-xl p-5 border border-gray-100 space-y-3">
                            <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Eroslearen Datuak</h4>
                            
                            <!-- Nombre del comprador limitado con truncate y max-w -->
                            <div class="flex justify-between items-center text-xs text-gray-600">
                                <span class="flex-shrink-0 mr-2">Izena:</span>
                                <span class="font-semibold text-gray-800 truncate max-w-[200px]" title="{{ auth()->user()->name }}">
                                    {{ auth()->user()->name }}
                                </span>
                            </div>

                            <!-- Email del comprador limitado con truncate y max-w -->
                            <div class="flex justify-between items-center text-xs text-gray-600">
                                <span class="flex-shrink-0 mr-2">Eposta:</span>
                                <span class="font-semibold text-gray-800 truncate max-w-[200px]" title="{{ auth()->user()->email }}">
                                    {{ auth()->user()->email }}
                                </span>
                            </div>
                            
                            <hr class="my-3 border-gray-200">

                            <div class="flex justify-between items-center text-xs text-gray-600">
                                <span>Sarrera bakoitzeko prezioa:</span>
                                <span class="font-semibold text-gray-800">{{ number_format($ekitaldia->prezio_sarrera, 2) }} €</span>
                            </div>

                            <div class="flex justify-between items-center pt-2 text-gray-900 font-bold">
                                <span class="text-sm">Guztira (Totala):</span>
                                <span class="text-[#2b56bd] text-2xl font-black">
                                    <span id="total-price">{{ number_format($ekitaldia->prezio_sarrera, 2) }}</span> €
                                </span>
                            </div>
                        </div>

                        <!-- Botón Submit -->
                        <button type="submit" 
                                class="w-full inline-flex justify-center items-center px-6 py-3.5 bg-[#2b56bd] border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-wider hover:bg-blue-700 active:bg-blue-800 shadow-md hover:shadow-lg transition-all duration-150">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 0a2 2 0 100 4 2 2 0 000-4z"/>
                            </svg>
                            Erosketa berretsi
                        </button>
                    </form>
                </div>

            </div>

        </main>

        <x-footer />

        <!-- Script de cálculo corregido -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const inputKantitatea = document.getElementById('kantitatea');
                const totalPriceElement = document.getElementById('total-price');
                const btnMinus = document.getElementById('btn-minus');
                const btnPlus = document.getElementById('btn-plus');
                
                const prezioa = parseFloat({{ $ekitaldia->prezio_sarrera }});
                const maxAforo = parseInt({{ $ekitaldia->aforo_librea }});

                function mezuakEtaPrezioaEguneratu() {
                    let kopurua = parseInt(inputKantitatea.value) || 1;

                    if (kopurua > maxAforo) {
                        kopurua = maxAforo;
                        inputKantitatea.value = maxAforo;
                    } else if (kopurua < 1) {
                        kopurua = 1;
                        inputKantitatea.value = 1;
                    }

                    const totala = (kopurua * prezioa).toFixed(2);
                    totalPriceElement.textContent = totala;
                }

                btnMinus.addEventListener('click', function() {
                    let val = parseInt(inputKantitatea.value) || 1;
                    if (val > 1) {
                        inputKantitatea.value = val - 1;
                        mezuakEtaPrezioaEguneratu();
                    }
                });

                btnPlus.addEventListener('click', function() {
                    let val = parseInt(inputKantitatea.value) || 1;
                    if (val < maxAforo) {
                        inputKantitatea.value = val + 1;
                        mezuakEtaPrezioaEguneratu();
                    }
                });

                inputKantitatea.addEventListener('input', mezuakEtaPrezioaEguneratu);
            });
        </script>

    </body>
</html>