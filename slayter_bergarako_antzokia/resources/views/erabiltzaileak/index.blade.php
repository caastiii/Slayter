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

        <!-- Taula edukiontzia (Scroll bertikala soilik) -->
        <div class="bg-white shadow-md rounded-lg border border-gray-200 overflow-y-auto overflow-x-hidden h-[calc(100vh-280px)]">
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
                        <tr onclick="toggleUserRow({{ $user->id }})" class="hover:bg-gray-50 transition-colors cursor-pointer md:cursor-default">
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
    </script>
</body>
</html>