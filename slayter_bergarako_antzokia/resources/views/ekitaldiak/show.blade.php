<x-app-layout>
    <x-header title="EKITALDIA IKUSI" />

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

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Barra Superior de Acciones -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900">Ekitaldiaren Xehetasunak</h3>
                    <p class="text-sm text-gray-500">Administrazioko ikuspegi osoa</p>
                </div>
                
                <div class="flex items-center space-x-3">
                    <a href="{{ route('ekitaldiak.edit', $ekitaldia->id) }}" class="inline-flex items-center justify-center px-4 py-2.5 bg-amber-500 hover:bg-amber-600 text-white rounded-xl font-bold text-xs uppercase tracking-wider transition duration-150 shadow-sm">
                        Edit
                    </a>
                    <a href="{{ route('ekitaldiak.index') }}" class="inline-flex items-center justify-center px-4 py-2.5 bg-[#2b56bd] hover:bg-blue-700 text-white rounded-xl font-bold text-xs uppercase tracking-wider transition duration-150 shadow-sm">
                        &larr; Atzera
                    </a>
                </div>
            </div>

            <!-- Content Card -->
            <div class="bg-white overflow-hidden shadow-md sm:rounded-2xl border border-gray-100">
                <div class="p-6 sm:p-8 text-gray-900">
                    
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                        
                        <!-- Columna Izquierda: Imagen y Estado -->
                        <div class="lg:col-span-1 flex flex-col items-center">
                            <div class="w-full h-64 bg-gray-100 rounded-xl overflow-hidden shadow-sm border border-gray-200 relative mb-4 flex-shrink-0">
                                @if($ekitaldia->irudia)
                                    <img src="{{ asset('storage/' . $ekitaldia->irudia) }}" alt="{{ $ekitaldia->izenburua }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center text-gray-400">
                                        <svg class="w-16 h-16 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span class="text-xs uppercase font-semibold">Irudirik gabe</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Badge de Egoera (Corregidas las comparaciones y el ucfirst con ->value) -->
                            <div class="w-full text-center py-2 px-4 rounded-xl font-bold text-xs uppercase tracking-wider
                                @if(($ekitaldia->egoera->value ?? $ekitaldia->egoera) === 'aktiboa') bg-green-100 text-green-800 border border-green-200
                                @elseif(($ekitaldia->egoera->value ?? $ekitaldia->egoera) === 'bertan behera') bg-red-100 text-red-800 border border-red-200
                                @elseif(($ekitaldia->egoera->value ?? $ekitaldia->egoera) === 'beteta' || ($ekitaldia->egoera->value ?? $ekitaldia->egoera) === 'agortuta') bg-orange-100 text-orange-800 border border-orange-200
                                @elseif(($ekitaldia->egoera->value ?? $ekitaldia->egoera) === 'bukatuta') bg-gray-100 text-gray-800 border border-gray-300
                                @else bg-yellow-100 text-yellow-800 border border-yellow-200 @endif">
                                {{ ucfirst($ekitaldia->egoera->value ?? $ekitaldia->egoera ?? 'desaktibatuta') }}
                            </div>
                        </div>

                        <!-- Columna Derecha: Información Principal -->
                        <div class="lg:col-span-2 space-y-5">
                            
                            <!-- Título -->
                            <div>
                                <span class="text-xs font-bold uppercase tracking-wider text-gray-400 block mb-1">Izenburua</span>
                                <h1 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug line-clamp-2" title="{{ $ekitaldia->izenburua }}">
                                    {{ $ekitaldia->izenburua }}
                                </h1>
                            </div>

                            <!-- Métricas Rápidas -->
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                                <div class="bg-gray-50 p-3.5 rounded-xl border border-gray-100">
                                    <span class="text-[11px] font-semibold text-gray-500 uppercase block mb-0.5">Data & Ordua</span>
                                    <p class="text-sm font-bold text-gray-900">
                                        {{ \Carbon\Carbon::parse($ekitaldia->ekitaldi_data)->format('Y/m/d') }}
                                    </p>
                                    <p class="text-xs font-medium text-gray-600">{{ $ekitaldia->ordua }}</p>
                                </div>

                                <div class="bg-gray-50 p-3.5 rounded-xl border border-gray-100">
                                    <span class="text-[11px] font-semibold text-gray-500 uppercase block mb-0.5">Prezioa</span>
                                    <p class="text-lg font-black text-[#2b56bd]">
                                        {{ $ekitaldia->prezio_sarrera > 0 ? number_format($ekitaldia->prezio_sarrera, 2) . ' €' : 'Doan' }}
                                    </p>
                                </div>

                                <div class="bg-gray-50 p-3.5 rounded-xl border border-gray-100 col-span-2 sm:col-span-1">
                                    <span class="text-[11px] font-semibold text-gray-500 uppercase block mb-0.5">Aforo Libre / Guztira</span>
                                    <p class="text-sm font-bold text-gray-900">
                                        <span class="{{ $ekitaldia->aforo_librea > 0 ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $ekitaldia->aforo_librea }}
                                        </span> 
                                        / {{ $ekitaldia->aforo }}
                                    </p>
                                </div>
                            </div>

                            <!-- Deskripzioa -->
                            <div class="border-t border-gray-100 pt-4">
                                <span class="text-xs font-bold uppercase tracking-wider text-gray-400 block mb-1.5">Deskripzioa</span>
                                <div class="bg-gray-50 p-3.5 rounded-xl border border-gray-100 max-h-28 overflow-y-auto pr-2 custom-scrollbar">
                                    <p class="text-gray-700 text-xs sm:text-sm leading-relaxed break-words">
                                        {{ $ekitaldia->deskripzioa ?? 'Ez dago deskripziorik eskuragarri.' }}
                                    </p>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

    <x-footer />
</x-app-layout>