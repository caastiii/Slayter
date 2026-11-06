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

        <!-- Taula edukiontzia (Altura relativa a la pantalla h-[calc(100vh-280px)] y scroll vertical) -->
        <div class="bg-white shadow-md rounded-lg border border-gray-200 overflow-x-auto overflow-y-auto h-[calc(100vh-280px)]">
            <table class="min-w-[640px] w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 sticky top-0 z-10 shadow-sm">
                    <tr>
                        <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Izena</th>
                        <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Abizena</th>
                        <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Emaila</th>
                        <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mota</th>
                        <th scope="col" class="px-4 sm:px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Ekintzak</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($erabiltzaileak as $user)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 sm:px-6 py-3.5 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->name }}</td>
                            <td class="px-4 sm:px-6 py-3.5 whitespace-nowrap text-sm text-gray-500">{{ $user->Abizena }}</td>
                            <td class="px-4 sm:px-6 py-3.5 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                            <td class="px-4 sm:px-6 py-3.5 whitespace-nowrap text-sm text-gray-500">
                                <span class="px-2.5 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full {{ strtolower($user->Mota) === 'admin' ? 'bg-purple-100 text-purple-800 border border-purple-200' : 'bg-green-100 text-green-800 border border-green-200' }}">
                                    {{ ucfirst($user->Mota) }}
                                </span>
                            </td>
                            <td class="px-4 sm:px-6 py-3.5 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('erabiltzaileak.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3 font-semibold">Editatu</a>
                                <form action="{{ route('erabiltzaileak.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Ziur zaude erabiltzaile hau ezabatu nahi duzula?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 font-semibold">Ezabatu</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>