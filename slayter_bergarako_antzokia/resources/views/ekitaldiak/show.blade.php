<x-app-layout>
    <x-header title="EKITALDIA IKUSI" />

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
                    
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        
                        <!-- Columna Izquierda: Imagen y Estado -->
                        <div class="lg:col-span-1 flex flex-col items-center">
                            <div class="w-full h-64 bg-gray-100 rounded-xl overflow-hidden shadow-sm border border-gray-200 relative mb-4">
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

                            <!-- Badge de Egoera -->
                            <div class="w-full text-center py-2 px-4 rounded-xl font-bold text-sm uppercase tracking-wider
                                @if($ekitaldia->egoera === 'aktiboa') bg-green-100 text-green-800 border border-green-200
                                @elseif($ekitaldia->egoera === 'bertan behera') bg-red-100 text-red-800 border border-red-200
                                @else bg-gray-100 text-gray-800 border border-gray-200 @endif">
                                {{ $ekitaldia->egoera ?? 'Egoerarik gabe' }}
                            </div>
                        </div>

                        <!-- Columna Derecha: Información Principal -->
                        <div class="lg:col-span-2 space-y-6">
                            
                            <!-- Título -->
                            <div>
                                <span class="text-xs font-bold uppercase tracking-wider text-gray-400 block mb-1">Izenburua</span>
                                <h1 class="text-3xl font-extrabold text-gray-900 leading-tight">
                                    {{ $ekitaldia->izenburua }}
                                </h1>
                            </div>

                            <!-- Métricas Rápidas (Tarjetas) -->
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                                <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                                    <span class="text-xs font-semibold text-gray-500 uppercase block mb-1">Data & Ordua</span>
                                    <p class="text-base font-bold text-gray-900">
                                        {{ \Carbon\Carbon::parse($ekitaldia->ekitaldi_data)->format('Y/m/d') }}
                                    </p>
                                    <p class="text-sm font-medium text-gray-600">{{ $ekitaldia->ordua }}</p>
                                </div>

                                <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                                    <span class="text-xs font-semibold text-gray-500 uppercase block mb-1">Prezioa</span>
                                    <p class="text-xl font-black text-[#2b56bd]">
                                        {{ $ekitaldia->prezio_sarrera > 0 ? number_format($ekitaldia->prezio_sarrera, 2) . ' €' : 'Doan' }}
                                    </p>
                                </div>

                                <div class="bg-gray-50 p-4 rounded-xl border border-gray-100 col-span-2 sm:col-span-1">
                                    <span class="text-xs font-semibold text-gray-500 uppercase block mb-1">Aforo Libre / Guztira</span>
                                    <p class="text-base font-bold text-gray-900">
                                        <span class="{{ $ekitaldia->aforo_librea > 0 ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $ekitaldia->aforo_librea }}
                                        </span> 
                                        / {{ $ekitaldia->aforo }}
                                    </p>
                                </div>
                            </div>

                            <!-- Deskripzioa -->
                            <div class="border-t border-gray-100 pt-5">
                                <span class="text-xs font-bold uppercase tracking-wider text-gray-400 block mb-2">Deskripzioa</span>
                                <p class="text-gray-700 text-base leading-relaxed bg-gray-50 p-4 rounded-xl border border-gray-100">
                                    {{ $ekitaldia->deskripzioa ?? 'Ez dago deskripziorik eskuragarri.' }}
                                </p>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

    <x-footer />
</x-app-layout>