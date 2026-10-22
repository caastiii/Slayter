<x-app-layout>
    <x-header title="EKITALDIAK" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <!-- Goiburukoa eta Botoiaren edukiontzia -->
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Ekitaldien Zerrenda</h3>
                            <p class="text-sm text-gray-500">Erregistratutako ekitaldi guztien xehetasunak.</p>
                        </div>
                        
                        <!-- Sortu botoia -->
                        <a href="{{ url('/ekitaldiak/create') }}" style="background-color: #4f46e5; color: #ffffff;" class="inline-flex items-center justify-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            + Ekitaldi Berria
                        </a>
                    </div>

                    <!-- Taula edukiontzia mugikorretarako moldagarria izan dadin -->
                    <div class="overflow-x-auto border border-gray-200 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 text-left">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Irudia</th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Izenburua</th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Data / Ordua</th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Aforo Librea</th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Prezioa</th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Ikusi</th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Edit</th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Delete</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($ekitaldiak as $ekitaldia)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @if($ekitaldia->irudia)
                                                <img src="{{ asset('storage/' . $ekitaldia->irudia) }}" class="h-10 w-10 object-cover rounded-md" alt="Irudia" />
                                            @else
                                                <span class="text-xs text-gray-400">Irudirik gabe</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $ekitaldia->izenburua }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ \Carbon\Carbon::parse($ekitaldia->ekitaldi_data)->format('Y-m-d') }} / {{ $ekitaldia->ordua }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $ekitaldia->aforo_librea }} / {{ $ekitaldia->aforo }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $ekitaldia->prezio_sarrera }} €
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <a href="{{ url('/ekitaldiak/' . $ekitaldia->id) }}" class="text-indigo-600 hover:text-indigo-900">Ikusi</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <a href="{{ url('/ekitaldiak/' . $ekitaldia->id . '/edit') }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-red-500">
                                            <form method="POST" action="{{ url('/ekitaldiak/' . $ekitaldia->id . '/delete') }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onClick="return confirm('Ziur zaude ezabatu nahi duzula?');" class="text-red-600 hover:text-red-900">Ezabatu</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <x-footer />
</x-app-layout>