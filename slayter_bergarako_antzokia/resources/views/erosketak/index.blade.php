<x-app-layout>
    <x-header title="NIRE SARRERAK" />

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Mensaje de confirmación / Arrakasta mezua -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 rounded-r-md flex items-center justify-between">
                    <span class="text-sm font-medium text-green-800">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-md sm:rounded-2xl border border-gray-100 p-6 sm:p-8">
                
                <!-- Goiburukoa -->
                <div class="mb-6 border-b border-gray-100 pb-4 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900">Erositako Sarrerak</h3>
                        <p class="text-sm text-gray-500">Hemen dituzu zure sarrera guztiak ikusteko edo bertan behera uzteko aukera.</p>
                    </div>
                    <a href="{{ route('ekitaldiak.kartelera') }}" class="inline-flex items-center text-sm font-bold text-[#2b56bd] hover:underline">
                        &larr; Kartelerara itzuli
                    </a>
                </div>

                @if($sarrerak->isEmpty())
                    <!-- Egoera hutsa (Sin entradas) -->
                    <div class="text-center py-12 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                        <svg class="w-16 h-16 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 002 2h14a2 2 0 002-2V7a2 2 0 00-2-2H5z"></path>
                        </svg>
                        <p class="text-gray-600 font-medium text-lg">Oraindik ez duzu sarrerarik erosi.</p>
                        <a href="{{ route('ekitaldiak.kartelera') }}" class="mt-4 inline-flex items-center px-5 py-2.5 bg-[#2b56bd] hover:bg-blue-700 text-white rounded-xl font-bold text-sm uppercase tracking-wider transition">
                            Ekitaldiak Ikusi
                        </a>
                    </div>
                @else
                    <!-- Sarreren Zerrenda -->
                    <div class="space-y-4">
                        @foreach($sarrerak as $sarrera)
                            <div class="bg-gray-50 border border-gray-200 rounded-xl p-5 flex flex-col md:flex-row items-start md:items-center justify-between gap-4 hover:shadow-sm transition">
                                
                                <!-- Ekitaldiaren Datuak -->
                                <div class="flex items-start space-x-4 min-w-0 flex-1">
                                    <div class="w-20 h-20 bg-gray-200 rounded-lg overflow-hidden flex-shrink-0">
                                        @if($sarrera->ekitaldia && $sarrera->ekitaldia->irudia)
                                            <img src="{{ asset('storage/' . $sarrera->ekitaldia->irudia) }}" class="w-full h-full object-cover" alt="Irudia">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-gray-400">
                                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 002 2h14a2 2 0 002-2V7a2 2 0 00-2-2H5z"></path>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Título limitado a 2 líneas con ajuste estricto de ancho -->
                                    <div class="min-w-0 flex-1">
                                        <h4 class="text-lg font-bold text-gray-900 leading-snug break-words line-clamp-2 max-w-md" title="{{ $sarrera->ekitaldia->izenburua ?? 'Ekitaldia' }}">
                                            {{ $sarrera->ekitaldia->izenburua ?? 'Ekitaldia' }}
                                        </h4>
                                        <p class="text-sm text-gray-600 mt-1">
                                            <span class="font-semibold">Data:</span> {{ \Carbon\Carbon::parse($sarrera->ekitaldia->ekitaldi_data)->format('Y/m/d') }} - {{ $sarrera->ekitaldia->ordua }}
                                        </p>
                                        <p class="text-sm text-gray-600">
                                            <span class="font-semibold">Sarrera kopurua:</span> {{ $sarrera->kantitatea ?? $sarrera->kopurua }} sarrera
                                        </p>
                                    </div>
                                </div>

                                <!-- Prezioa eta Ekintzak (Ikusi eta Ezeztatu) -->
                                <div class="w-full md:w-auto flex items-center justify-between md:justify-end space-x-6 pt-3 md:pt-0 border-t md:border-0 border-gray-200 flex-shrink-0">
                                    <div class="text-left md:text-right">
                                        <span class="text-xs text-gray-400 font-semibold uppercase block">Guztira Ordainduta</span>
                                        <span class="text-xl font-extrabold text-[#2b56bd]">
                                            {{ number_format($sarrera->prezio_guztira ?? (($sarrera->kantitatea ?? $sarrera->kopurua) * $sarrera->ekitaldia->prezio_sarrera), 2) }} €
                                        </span>
                                    </div>

                                    <!-- Botoiak -->
                                    <div class="flex items-center space-x-2 flex-shrink-0">
                                        <a href="{{ route('ekitaldiak.publikoa.show', $sarrera->id_ekitaldia) }}" class="px-3.5 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-xs font-bold uppercase rounded-lg transition">
                                            Ikusi
                                        </a>

                                        <form method="POST" action="{{ route('erosketak.destroy', $sarrera->id) }}" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Ziur zaude sarrera hau bertan behera utzi nahi duzula? Aforoa berriz ere liberatuko da.');" class="px-3.5 py-2 bg-red-600 hover:bg-red-700 text-white text-xs font-bold uppercase rounded-lg transition">
                                                Ezeztatu
                                            </button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                @endif

            </div>

        </div>
    </div>

    <x-footer />
</x-app-layout>