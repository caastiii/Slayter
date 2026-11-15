<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Erositako Sarrerak - Bergarako Antzokia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen font-sans antialiased flex flex-col">
    <x-header />
    
    <main class="flex-grow max-w-7xl mx-auto py-6 sm:py-12 px-4 sm:px-6 lg:px-8 w-full">
        
        <!-- Goiburukoa eta Botoia adaptagarriak -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Erositako Sarrerak</h1>
            <a href="{{ route('ekitaldiak.kartelera') }}" class="w-full sm:w-auto inline-flex items-center justify-center bg-[#2b56bd] text-white px-4 py-2.5 rounded-md hover:bg-blue-800 transition font-semibold text-sm shadow-sm text-center">
                &larr; Kartelerara itzuli
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 text-sm sm:text-base">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 text-sm sm:text-base">
                {{ session('error') }}
            </div>
        @endif

        @if($sarrerak->isEmpty())
            <!-- Egoera hutsa -->
            <div class="bg-white shadow-md rounded-lg border border-gray-200 p-12 text-center">
                <svg class="w-14 h-14 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                </svg>
                <p class="text-gray-600 font-medium text-base sm:text-lg">Oraindik ez duzu sarrerarik erosi.</p>
                <a href="{{ route('ekitaldiak.kartelera') }}" class="mt-4 inline-flex items-center justify-center bg-[#2b56bd] text-white px-4 py-2.5 rounded-md hover:bg-blue-800 transition font-semibold text-sm shadow-sm">
                    Ekitaldiak Ikusi
                </a>
            </div>
        @else
            <!-- Taula edukiontzia (Scroll bertikala soilik) -->
            <div class="bg-white shadow-md rounded-lg border border-gray-200 overflow-y-auto overflow-x-hidden h-[calc(100vh-280px)]">
                <table class="w-full divide-y divide-gray-200 text-left">
                    <thead class="bg-gray-50 sticky top-0 z-10 shadow-sm">
                        <tr>
                            <th scope="col" class="hidden md:table-cell w-20 px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Irudia</th>
                            <th scope="col" class="px-3 sm:px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Ekitaldia</th>
                            <th scope="col" class="px-3 sm:px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Data / Ordua</th>
                            <th scope="col" class="hidden md:table-cell px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Kopurua</th>
                            <th scope="col" class="px-3 sm:px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">Guztira</th>
                            <th scope="col" class="hidden md:table-cell px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">Ekintzak</th>
                            <th scope="col" class="md:hidden px-3 py-3 w-8"><span class="sr-only">Ireki</span></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($sarrerak as $sarrera)
                            @php
                                $kopurua = $sarrera->kantitatea ?? $sarrera->kopurua ?? 1;
                                $prezioUnitarioa = $sarrera->ekitaldia->prezio_sarrera ?? 0;
                                $guztira = $sarrera->prezio_guztira ?? ($kopurua * $prezioUnitarioa);
                            @endphp

                            <!-- Fila principal de la entrada -->
                            <tr onclick="toggleSarreraRow({{ $sarrera->id }})" class="hover:bg-gray-50 transition-colors cursor-pointer md:cursor-default">
                                <!-- Irudia (Ordenador) -->
                                <td class="hidden md:table-cell px-6 py-3.5 text-sm font-normal text-gray-500 text-center whitespace-nowrap">
                                    @if($sarrera->ekitaldia && $sarrera->ekitaldia->irudia)
                                        <img src="{{ asset('storage/' . $sarrera->ekitaldia->irudia) }}" class="h-9 w-9 object-cover rounded-md mx-auto" alt="Irudia" />
                                    @else
                                        <span class="text-xs text-gray-400">Irudirik gabe</span>
                                    @endif
                                </td>

                                <!-- Ekitaldia -->
                                <td class="px-3 sm:px-6 py-3.5 text-sm font-medium text-gray-900">
                                    <div class="line-clamp-2 break-words max-w-[160px] sm:max-w-xs" title="{{ $sarrera->ekitaldia->izenburua ?? 'Ekitaldia' }}">
                                        {{ $sarrera->ekitaldia->izenburua ?? 'Ekitaldia' }}
                                    </div>
                                </td>

                                <!-- Data / Ordua -->
                                <td class="px-3 sm:px-6 py-3.5 text-sm font-normal text-gray-500 whitespace-nowrap">
                                    @if($sarrera->ekitaldia)
                                        <div>{{ \Carbon\Carbon::parse($sarrera->ekitaldia->ekitaldi_data)->format('Y-m-d') }}</div>
                                        <div class="text-xs text-gray-400">{{ $sarrera->ekitaldia->ordua }}</div>
                                    @else
                                        <span>-</span>
                                    @endif
                                </td>

                                <!-- Kopurua (Ordenador) -->
                                <td class="hidden md:table-cell px-6 py-3.5 text-sm font-normal text-gray-500 text-center whitespace-nowrap">
                                    {{ $kopurua }} sarrera
                                </td>

                                <!-- Guztira -->
                                <td class="px-3 sm:px-6 py-3.5 text-sm font-normal text-gray-500 text-right whitespace-nowrap">
                                    {{ number_format($guztira, 2) }} €
                                </td>

                                <!-- Ekintzak (Ordenador) -->
                                <td class="hidden md:table-cell px-6 py-3.5 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('ekitaldiak.publikoa.show', $sarrera->id_ekitaldia) }}" class="text-gray-600 hover:text-gray-900 mr-3 font-semibold">Ikusi</a>
                                    <form method="POST" action="{{ route('erosketak.destroy', $sarrera->id) }}" class="inline-block" onsubmit="return confirm('Ziur zaude sarrera hau bertan behera utzi nahi duzula? Aforoa berriz ere liberatuko da.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 font-semibold">Ezeztatu</button>
                                    </form>
                                </td>

                                <!-- Indicador desplegable solo en Móvil -->
                                <td class="md:hidden px-3 py-3.5 text-right text-gray-400">
                                    <svg id="sarrera-chevron-{{ $sarrera->id }}" class="w-4 h-4 inline-block transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </td>
                            </tr>

                            <!-- Fila desplegable de detalles y acciones en Móvil -->
                            <tr id="sarrera-actions-row-{{ $sarrera->id }}" class="hidden md:hidden bg-gray-50">
                                <td colspan="4" class="px-4 py-3 text-sm">
                                    <div class="flex flex-col gap-3">
                                        <div class="flex items-center gap-2.5 text-xs text-gray-500">
                                            @if($sarrera->ekitaldia && $sarrera->ekitaldia->irudia)
                                                <img src="{{ asset('storage/' . $sarrera->ekitaldia->irudia) }}" class="h-10 w-10 object-cover rounded-md border border-gray-200" alt="Irudia" />
                                            @endif
                                            <div>
                                                <div><span class="font-semibold text-gray-700">Sarrera kopurua:</span> {{ $kopurua }} sarrera</div>
                                                <div><span class="font-semibold text-gray-700">Guztira ordainduta:</span> {{ number_format($guztira, 2) }} €</div>
                                            </div>
                                        </div>

                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('ekitaldiak.publikoa.show', $sarrera->id_ekitaldia) }}" class="flex-1 text-center py-2 px-3 bg-gray-700 hover:bg-gray-800 text-white rounded-md font-semibold text-xs uppercase tracking-wider transition">
                                                Ikusi
                                            </a>
                                            <form method="POST" action="{{ route('erosketak.destroy', $sarrera->id) }}" class="flex-1" onsubmit="return confirm('Ziur zaude sarrera hau bertan behera utzi nahi duzula? Aforoa berriz ere liberatuko da.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="w-full py-2 px-3 bg-red-600 hover:bg-red-700 text-white rounded-md font-semibold text-xs uppercase tracking-wider transition">
                                                    Ezeztatu
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

    </main>

    <x-footer />

    <script>
        function toggleSarreraRow(sarreraId) {
            if (window.innerWidth >= 768) return;

            const row = document.getElementById('sarrera-actions-row-' + sarreraId);
            const chevron = document.getElementById('sarrera-chevron-' + sarreraId);

            if (row) {
                row.classList.toggle('hidden');
            }
            if (chevron) {
                chevron.classList.toggle('rotate-180');
            }
        }
    </script>
</body>
</html>