<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Erabiltzaileak - Bergarako Antzokia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen font-sans antialiased flex flex-col">
    <x-header />
    
    <main class="flex-grow max-w-7xl mx-auto py-6 sm:py-12 px-4 sm:px-6 lg:px-8 w-full">
        
        <!-- Goiburukoa eta Botoia adaptagarriak -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Erabiltzaileen Kudeaketa</h1>
            <a href="{{ route('erabiltzaileak.create') }}" class="w-full sm:w-auto inline-flex items-center justify-center bg-[#2b56bd] text-white px-4 py-2.5 rounded-md hover:bg-blue-800 transition font-semibold text-sm shadow-sm text-center">
                + Erabiltzaile Berria
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

        <!-- Bilatzailea -->
        <div class="mb-4">
            <div class="relative w-full sm:max-w-md">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input 
                    type="text" 
                    id="user-search-input" 
                    oninput="filterUsers()" 
                    placeholder="Bilatu izena, abizena, emaila edo mota..." 
                    class="w-full pl-10 pr-10 py-2.5 bg-white border border-gray-300 rounded-lg text-sm text-gray-900 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#2b56bd] focus:border-[#2b56bd] transition"
                >
                <button 
                    type="button" 
                    id="clear-search-btn" 
                    onclick="clearUserSearch()" 
                    class="hidden absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600 cursor-pointer"
                    title="Garbitu"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Taula edukiontzia (Scroll bertikala soilik) -->
        <div class="bg-white shadow-md rounded-lg border border-gray-200 overflow-y-auto overflow-x-hidden h-[calc(100vh-335px)]">
            <table class="w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 sticky top-0 z-10 shadow-sm">
                    <tr>
                        <th scope="col" class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Izena</th>
                        <th scope="col" class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Abizena</th>
                        <th scope="col" class="hidden md:table-cell px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Emaila</th>
                        <th scope="col" class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mota</th>
                        <th scope="col" class="hidden md:table-cell px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Ekintzak</th>
                        <th scope="col" class="md:hidden px-3 py-3 w-8"><span class="sr-only">Ireki</span></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($erabiltzaileak as $user)
                        <!-- Fila principal del usuario -->
                        <tr 
                            onclick="toggleUserRow({{ $user->id }})" 
                            data-user-id="{{ $user->id }}"
                            data-search="{{ mb_strtolower($user->name . ' ' . $user->Abizena . ' ' . $user->email . ' ' . $user->Mota, 'UTF-8') }}"
                            class="user-row hover:bg-gray-50 transition-colors cursor-pointer md:cursor-default"
                        >
                            <td class="px-3 sm:px-6 py-3.5 text-sm font-medium text-gray-900 break-words">
                                {{ $user->name }}
                            </td>
                            <td class="px-3 sm:px-6 py-3.5 text-sm text-gray-500 break-words">
                                {{ $user->Abizena }}
                            </td>
                            <td class="hidden md:table-cell px-6 py-3.5 whitespace-nowrap text-sm text-gray-500">
                                {{ $user->email }}
                            </td>
                            <td class="px-3 sm:px-6 py-3.5 whitespace-nowrap text-sm text-gray-500">
                                {{ ucfirst($user->Mota) }}
                            </td>
                            
                            <!-- Ekintzak en Ordenador -->
                            <td class="hidden md:table-cell px-6 py-3.5 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('erabiltzaileak.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3 font-semibold">Editatu</a>
                                <form action="{{ route('erabiltzaileak.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Ziur zaude erabiltzaile hau ezabatu nahi duzula?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 font-semibold">Ezabatu</button>
                                </form>
                            </td>

                            <!-- Indicador desplegable solo en Móvil -->
                            <td class="md:hidden px-3 py-3.5 text-right text-gray-400">
                                <svg id="chevron-{{ $user->id }}" class="w-4 h-4 inline-block transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </td>
                        </tr>

                        <!-- Fila desplegable de acciones y email en Móvil -->
                        <tr id="actions-row-{{ $user->id }}" class="hidden md:hidden bg-gray-50">
                            <td colspan="4" class="px-4 py-3 text-sm">
                                <div class="flex flex-col gap-3">
                                    <div class="text-xs text-gray-500 truncate">
                                        <span class="font-semibold text-gray-700">Emaila:</span> {{ $user->email }}
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('erabiltzaileak.edit', $user->id) }}" class="flex-1 text-center py-2 px-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md font-semibold text-xs uppercase tracking-wider transition">
                                            Editatu
                                        </a>
                                        <form action="{{ route('erabiltzaileak.destroy', $user->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Ziur zaude erabiltzaile hau ezabatu nahi duzula?');">
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

                    <!-- Mezua emaitzarik ez dagoenean -->
                    <tr id="no-results-row" class="hidden">
                        <td colspan="6" class="px-6 py-10 text-center text-sm text-gray-500">
                            Ez da bilaketarekin bat datorren erabiltzailerik aurkitu.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <script>
        function toggleUserRow(userId) {
            if (window.innerWidth >= 768) return;

            const row = document.getElementById('actions-row-' + userId);
            const chevron = document.getElementById('chevron-' + userId);

            if (row) {
                row.classList.toggle('hidden');
            }
            if (chevron) {
                chevron.classList.toggle('rotate-180');
            }
        }

        function normalizeText(text) {
            return text
                .toLowerCase()
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '');
        }

        function filterUsers() {
            const input = document.getElementById('user-search-input');
            const clearBtn = document.getElementById('clear-search-btn');
            const query = normalizeText(input.value.trim());
            const rows = document.querySelectorAll('.user-row');
            const noResultsRow = document.getElementById('no-results-row');
            let visibleCount = 0;

            clearBtn.classList.toggle('hidden', query.length === 0);

            rows.forEach(row => {
                const searchData = normalizeText(row.getAttribute('data-search') || '');
                const userId = row.getAttribute('data-user-id');
                const actionsRow = document.getElementById('actions-row-' + userId);
                const chevron = document.getElementById('chevron-' + userId);

                if (searchData.includes(query)) {
                    row.classList.remove('hidden');
                    visibleCount++;
                } else {
                    row.classList.add('hidden');
                    if (actionsRow) actionsRow.classList.add('hidden');
                    if (chevron) chevron.classList.remove('rotate-180');
                }
            });

            if (noResultsRow) {
                noResultsRow.classList.toggle('hidden', visibleCount > 0);
            }
        }

        function clearUserSearch() {
            const input = document.getElementById('user-search-input');
            input.value = '';
            filterUsers();
            input.focus();
        }
    </script>
</body>
</html>