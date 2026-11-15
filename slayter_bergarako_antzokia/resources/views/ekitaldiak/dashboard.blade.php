<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ekitaldiak - Bergarako Antzokia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen font-sans antialiased flex flex-col">
    <x-header />
    
    <main class="flex-grow max-w-7xl mx-auto py-6 sm:py-12 px-4 sm:px-6 lg:px-8 w-full">
        
        <!-- Goiburukoa eta Botoia adaptagarriak -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Ekitaldien Kudeaketa</h1>
            <a href="{{ route('ekitaldiak.create') }}" class="w-full sm:w-auto inline-flex items-center justify-center bg-[#2b56bd] text-white px-4 py-2.5 rounded-md hover:bg-blue-800 transition font-semibold text-sm shadow-sm text-center">
                + Ekitaldi Berria
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

        <!-- Taula edukiontzia (Scroll bertikala soilik) -->
        <div class="bg-white shadow-md rounded-lg border border-gray-200 overflow-y-auto overflow-x-hidden h-[calc(100vh-280px)]">
            <table class="w-full divide-y divide-gray-200 text-left">
                <thead class="bg-gray-50 sticky top-0 z-10 shadow-sm">
                    <tr>
                        <th scope="col" class="hidden md:table-cell w-20 px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Irudia</th>
                        <th scope="col" class="px-3 sm:px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Izenburua</th>
                        <th scope="col" class="px-3 sm:px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Data / Ordua</th>
                        <th scope="col" class="hidden md:table-cell px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Aforo Librea</th>
                        <th scope="col" class="hidden md:table-cell px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">Prezioa</th>
                        <th scope="col" class="px-3 sm:px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Egoera</th>
                        <th scope="col" class="hidden md:table-cell px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">Ekintzak</th>
                        <th scope="col" class="md:hidden px-3 py-3 w-8"><span class="sr-only">Ireki</span></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($ekitaldiak as $ekitaldia)
                        <!-- Fila principal del evento -->
                        <tr onclick="toggleEkitaldiRow({{ $ekitaldia->id }})" class="hover:bg-gray-50 transition-colors cursor-pointer md:cursor-default">
                            <!-- Irudia (Ordenador) -->
                            <td class="hidden md:table-cell px-6 py-3.5 text-sm font-normal text-gray-500 text-center whitespace-nowrap">
                                @if($ekitaldia->irudia)
                                    <img src="{{ asset('storage/' . $ekitaldia->irudia) }}" class="h-9 w-9 object-cover rounded-md mx-auto" alt="Irudia" />
                                @else
                                    <span class="text-xs text-gray-400">Irudirik gabe</span>
                                @endif
                            </td>

                            <!-- Izenburua -->
                            <td class="px-3 sm:px-6 py-3.5 text-sm font-medium text-gray-900">
                                <div class="line-clamp-2 break-words max-w-[160px] sm:max-w-xs" title="{{ $ekitaldia->izenburua }}">
                                    {{ $ekitaldia->izenburua }}
                                </div>
                            </td>

                            <!-- Data / Ordua -->
                            <td class="px-3 sm:px-6 py-3.5 text-sm font-normal text-gray-500 whitespace-nowrap">
                                <div>{{ \Carbon\Carbon::parse($ekitaldia->ekitaldi_data)->format('Y-m-d') }}</div>
                                <div class="text-xs text-gray-400">{{ $ekitaldia->ordua }}</div>
                            </td>

                            <!-- Aforo Librea (Ordenador) -->
                            <td class="hidden md:table-cell px-6 py-3.5 text-sm font-normal text-gray-500 text-center whitespace-nowrap">
                                {{ $ekitaldia->aforo_librea }} / {{ $ekitaldia->aforo }}
                            </td>

                            <!-- Prezioa (Ordenador) -->
                            <td class="hidden md:table-cell px-6 py-3.5 text-sm font-normal text-gray-500 text-right whitespace-nowrap">
                                {{ number_format($ekitaldia->prezio_sarrera, 2) }} €
                            </td>

                            <!-- Egoera -->
                            <td class="px-3 sm:px-6 py-3.5 text-sm font-normal text-gray-500 whitespace-nowrap">
                                {{ ucfirst($ekitaldia->egoera->value ?? $ekitaldia->egoera) }}
                            </td>

                            <!-- Ekintzak (Ordenador) -->
                            <td class="hidden md:table-cell px-6 py-3.5 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('ekitaldiak.show', $ekitaldia->id) }}" class="text-gray-600 hover:text-gray-900 mr-3 font-semibold">Ikusi</a>
                                <a href="{{ route('ekitaldiak.edit', $ekitaldia->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3 font-semibold">Editatu</a>
                                <form method="POST" action="{{ route('ekitaldiak.delete', $ekitaldia->id) }}" class="inline-block" onsubmit="return confirm('Ziur zaude ezabatu nahi duzula?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 font-semibold">Ezabatu</button>
                                </form>
                            </td>

                            <!-- Indicador desplegable solo en Móvil -->
                            <td class="md:hidden px-3 py-3.5 text-right text-gray-400">
                                <svg id="ekitaldi-chevron-{{ $ekitaldia->id }}" class="w-4 h-4 inline-block transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </td>
                        </tr>

                        <!-- Fila desplegable de detalles y acciones en Móvil -->
                        <tr id="ekitaldi-actions-row-{{ $ekitaldia->id }}" class="hidden md:hidden bg-gray-50">
                            <td colspan="4" class="px-4 py-3 text-sm">
                                <div class="flex flex-col gap-3">
                                    <div class="flex items-center justify-between gap-3 text-xs text-gray-500">
                                        <div class="flex items-center gap-2.5">
                                            @if($ekitaldia->irudia)
                                                <img src="{{ asset('storage/' . $ekitaldia->irudia) }}" class="h-10 w-10 object-cover rounded-md border border-gray-200" alt="Irudia" />
                                            @endif
                                            <div>
                                                <div><span class="font-semibold text-gray-700">Aforoa:</span> {{ $ekitaldia->aforo_librea }} / {{ $ekitaldia->aforo }}</div>
                                                <div><span class="font-semibold text-gray-700">Prezioa:</span> {{ number_format($ekitaldia->prezio_sarrera, 2) }} €</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('ekitaldiak.show', $ekitaldia->id) }}" class="flex-1 text-center py-2 px-3 bg-gray-700 hover:bg-gray-800 text-white rounded-md font-semibold text-xs uppercase tracking-wider transition">
                                            Ikusi
                                        </a>
                                        <a href="{{ route('ekitaldiak.edit', $ekitaldia->id) }}" class="flex-1 text-center py-2 px-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md font-semibold text-xs uppercase tracking-wider transition">
                                            Editatu
                                        </a>
                                        <form method="POST" action="{{ route('ekitaldiak.delete', $ekitaldia->id) }}" class="flex-1" onsubmit="return confirm('Ziur zaude ezabatu nahi duzula?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-full py-2 px-3 bg-red-600 hover:bg-red-700 text-white rounded-md font-semibold text-xs uppercase tracking-wider transition">
                                                Ezabatu
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
    </main>

    <script>
        function toggleEkitaldiRow(ekitaldiId) {
            if (window.innerWidth >= 768) return;

            const row = document.getElementById('ekitaldi-actions-row-' + ekitaldiId);
            const chevron = document.getElementById('ekitaldi-chevron-' + ekitaldiId);

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