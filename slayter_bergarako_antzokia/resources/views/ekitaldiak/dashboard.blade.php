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
                        <a href="{{ route('ekitaldiak.create') }}" style="background-color: #4f46e5; color: #ffffff;" class="inline-flex items-center justify-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            + Ekitaldi Berria
                        </a>
                    </div>

                    <!-- Taula edukiontzia (Zabalera osoa, scroll gabe) -->
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <table class="w-full divide-y divide-gray-200 text-left table-fixed">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="w-12 px-2 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Irudia</th>
                                    <th scope="col" class="w-3/12 px-3 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Izenburua</th>
                                    <th scope="col" class="w-2/12 px-2 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Data / Ordua</th>
                                    <th scope="col" class="w-2/12 px-2 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Aforo Librea</th>
                                    <th scope="col" class="w-1/12 px-2 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">Prezioa</th>
                                    <th scope="col" class="w-2/12 px-2 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Egoera</th>
                                    <th scope="col" class="w-2/12 px-2 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Ekintzak</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($ekitaldiak as $ekitaldia)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <!-- Irudia -->
                                        <td class="px-2 py-3 text-sm text-gray-500 text-center">
                                            @if($ekitaldia->irudia)
                                                <img src="{{ asset('storage/' . $ekitaldia->irudia) }}" class="h-9 w-9 object-cover rounded-md mx-auto" alt="Irudia" />
                                            @else
                                                <span class="text-[10px] text-gray-400 block leading-tight">Irudirik gabe</span>
                                            @endif
                                        </td>

                                        <!-- Izenburua (Mugada line-clamp-2-rekin eta title atributuarekin) -->
                                        <td class="px-3 py-3 text-xs sm:text-sm font-medium text-gray-900 leading-snug">
                                            <div class="line-clamp-2 break-words" title="{{ $ekitaldia->izenburua }}">
                                                {{ $ekitaldia->izenburua }}
                                            </div>
                                        </td>

                                        <!-- Data / Ordua -->
                                        <td class="px-2 py-3 text-xs text-gray-500">
                                            <div class="font-medium text-gray-800">{{ \Carbon\Carbon::parse($ekitaldia->ekitaldi_data)->format('Y-m-d') }}</div>
                                            <div class="text-gray-400">{{ $ekitaldia->ordua }}</div>
                                        </td>

                                        <!-- Aforo Librea -->
                                        <td class="px-2 py-3 text-xs text-gray-500 text-center">
                                            <span class="font-semibold text-gray-800">{{ $ekitaldia->aforo_librea }}</span> / {{ $ekitaldia->aforo }}
                                        </td>

                                        <!-- Prezioa -->
                                        <td class="px-2 py-3 text-xs text-gray-600 text-right font-semibold">
                                            {{ number_format($ekitaldia->prezio_sarrera, 2) }} €
                                        </td>

                                        <!-- Egoera (Respetando Enums de dev) -->
                                        <td class="px-2 py-3 text-center">
                                            <span class="px-2 py-0.5 inline-flex text-[11px] leading-5 font-semibold rounded-full border
                                                @if(($ekitaldia->egoera->value ?? $ekitaldia->egoera) === 'aktiboa') bg-green-100 text-green-800 border-green-200
                                                @elseif(($ekitaldia->egoera->value ?? $ekitaldia->egoera) === 'beteta' || ($ekitaldia->egoera->value ?? $ekitaldia->egoera) === 'agortuta') bg-orange-100 text-orange-800 border-orange-200
                                                @elseif(($ekitaldia->egoera->value ?? $ekitaldia->egoera) === 'bukatuta') bg-gray-100 text-gray-800 border-gray-300
                                                @else bg-red-100 text-red-800 border-red-200 @endif">
                                                
                                                {{ ucfirst($ekitaldia->egoera->value ?? $ekitaldia->egoera) }}
                                            </span>
                                        </td>

                                        <!-- Ekintzak -->
                                        <td class="px-2 py-3 text-center">
                                            <div class="inline-flex items-center justify-center space-x-1.5">
                                                <a href="{{ route('ekitaldiak.show', $ekitaldia->id) }}" class="px-2 py-1 bg-indigo-50 hover:bg-indigo-100 text-indigo-700 font-bold text-[11px] rounded transition border border-indigo-200" title="Ikusi">
                                                    Ikusi
                                                </a>
                                                <a href="{{ route('ekitaldiak.edit', $ekitaldia->id) }}" class="px-2 py-1 bg-amber-50 hover:bg-amber-100 text-amber-700 font-bold text-[11px] rounded transition border border-amber-200" title="Edit">
                                                    Edit
                                                </a>
                                                <form method="POST" action="{{ route('ekitaldiak.delete', $ekitaldia->id) }}" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onClick="return confirm('Ziur zaude ezabatu nahi duzula?');" class="px-2 py-1 bg-red-50 hover:bg-red-100 text-red-700 font-bold text-[11px] rounded transition border border-red-200" title="Ezabatu">
                                                        Ezabatu
                                                    </button>
                                                </form>
                                            </div>
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