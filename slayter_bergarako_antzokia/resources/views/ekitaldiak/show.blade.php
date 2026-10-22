<x-app-layout>
    <x-header title="EKITALDIA IKUSI" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <!-- Goiburukoa eta Botoiaren edukiontzia -->
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Ekitaldia ikusi</h3>
                            <p class="text-sm text-gray-500">Ekitaldiaren datu guztiak</p>
                        </div>
                        
                        <!-- Atzera botoia -->
                        <a href="{{ url('/dashboard') }}" style="background-color: #4f46e5; color: #ffffff;" class="inline-flex items-center justify-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Atzera
                        </a>
                    </div>

                    <div class="space-y-6 max-w-2xl">
                        @if($ekitaldia->irudia)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Irudia</label>
                                <img src="{{ asset('storage/' . $ekitaldia->irudia) }}" class="h-48 w-full object-cover rounded-md" alt="Irudia" />
                            </div>
                        @endif

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Izenburua</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $ekitaldia->izenburua }}</p>

                            <label class="block text-sm font-medium text-gray-700 mt-4">Deskripzioa</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $ekitaldia->deskripzioa ?? 'Deskripziorik gabe' }}</p>

                            <div class="grid grid-cols-2 gap-4 mt-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Data</label>
                                    <p class="mt-1 text-sm text-gray-900">{{ \Carbon\Carbon::parse($ekitaldia->ekitaldi_data)->format('Y-m-d') }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Ordua</label>
                                    <p class="mt-1 text-sm text-gray-900">{{ $ekitaldia->ordua }}</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-4 mt-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Aforo Librea</label>
                                    <p class="mt-1 text-sm text-gray-900">{{ $ekitaldia->aforo_librea }} / {{ $ekitaldia->aforo }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Prezioa</label>
                                    <p class="mt-1 text-sm text-gray-900">{{ $ekitaldia->prezio_sarrera }} €</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Egoera</label>
                                    <p class="mt-1 text-sm text-gray-900">{{ $ekitaldia->egoera }}</p>
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