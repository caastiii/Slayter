<x-app-layout>
    <x-header title="EKITALDIA EGUNERATU" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="max-w-2xl mx-auto">

                        <form action="{{ url('/ekitaldiak/' . $ekitaldia->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                            @csrf
                            @method('PUT')

                            <!-- Erroreen Kudeaketa Orokorra -->
                            @if ($errors->any())
                                <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded-md" role="alert">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.424 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-red-800">
                                                Mesedez, zuzendu formularioan agertzen diren erroreak:
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- Izenburua -->
                            <div>
                                <label for="izenburua" class="block text-sm font-medium text-gray-700">Izenburua</label>
                                <div class="mt-1">
                                    <input type="text" id="izenburua" name="izenburua" value="{{ old('izenburua', $ekitaldia->izenburua) }}"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('izenburua') border-red-300 text-red-900 focus:ring-red-500 focus:border-red-500 @enderror">
                                </div>
                                @error('izenburua')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Deskripzioa -->
                            <div>
                                <label for="deskripzioa" class="block text-sm font-medium text-gray-700">Deskripzioa</label>
                                <div class="mt-1">
                                    <textarea id="deskripzioa" name="deskripzioa" rows="4"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('deskripzioa') border-red-300 text-red-900 focus:ring-red-500 focus:border-red-500 @enderror">{{ old('deskripzioa', $ekitaldia->deskripzioa) }}</textarea>
                                </div>
                                @error('deskripzioa')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Data eta Ordua -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="ekitaldi_data" class="block text-sm font-medium text-gray-700">Data</label>
                                    <div class="mt-1">
                                        <input type="date" id="ekitaldi_data" name="ekitaldi_data" value="{{ old('ekitaldi_data', \Carbon\Carbon::parse($ekitaldia->ekitaldi_data)->format('Y-m-d')) }}"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('ekitaldi_data') border-red-300 text-red-900 focus:ring-red-500 focus:border-red-500 @enderror">
                                    </div>
                                    @error('ekitaldi_data')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="ordua" class="block text-sm font-medium text-gray-700">Ordua</label>
                                    <div class="mt-1">
                                        <input type="time" id="ordua" name="ordua" value="{{ old('ordua', $ekitaldia->ordua) }}"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('ordua') border-red-300 text-red-900 focus:ring-red-500 focus:border-red-500 @enderror">
                                    </div>
                                    @error('ordua')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Aforo, Prezioa eta Egoera -->
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                <div>
                                    <label for="aforo" class="block text-sm font-medium text-gray-700">Aforo</label>
                                    <div class="mt-1">
                                        <input type="number" id="aforo" name="aforo" min="1" value="{{ old('aforo', $ekitaldia->aforo) }}"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('aforo') border-red-300 text-red-900 focus:ring-red-500 focus:border-red-500 @enderror">
                                    </div>
                                    @error('aforo')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="prezio_sarrera" class="block text-sm font-medium text-gray-700">Prezioa (€)</label>
                                    <div class="mt-1">
                                        <input type="number" step="0.01" min="0" id="prezio_sarrera" name="prezio_sarrera" value="{{ old('prezio_sarrera', $ekitaldia->prezio_sarrera) }}"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('prezio_sarrera') border-red-300 text-red-900 focus:ring-red-500 focus:border-red-500 @enderror">
                                    </div>
                                    @error('prezio_sarrera')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="egoera" class="block text-sm font-medium text-gray-700">Egoera</label>
                                    <div class="mt-1">
                                        <input type="text" id="egoera" name="egoera" value="{{ old('egoera', $ekitaldia->egoera) }}"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('egoera') border-red-300 text-red-900 focus:ring-red-500 focus:border-red-500 @enderror">
                                    </div>
                                    @error('egoera')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Irudia -->
                            <div>
                                <label for="irudia" class="block text-sm font-medium text-gray-700">Irudia Aldatu (Aukerakoa)</label>
                                @if($ekitaldia->irudia)
                                    <div class="mt-2 mb-2">
                                        <img src="{{ asset('storage/' . $ekitaldia->irudia) }}" class="h-20 w-20 object-cover rounded-md" alt="Irudia" />
                                    </div>
                                @endif
                                <div class="mt-1">
                                    <input type="file" id="irudia" name="irudia"
                                        class="shadow-sm block w-full sm:text-sm border-gray-300 rounded-md @error('irudia') border-red-300 text-red-900 focus:ring-red-500 focus:border-red-500 @enderror">
                                </div>
                                @error('irudia')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end">
                                <button type="submit" style="background-color: #4f46e5; color: #ffffff;" class="inline-flex items-center justify-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Submit
                                </button>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <x-footer />
</x-app-layout>