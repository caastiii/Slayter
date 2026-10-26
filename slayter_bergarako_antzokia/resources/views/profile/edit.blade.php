<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profila') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg md:grid md:grid-cols-4 md:divide-x divide-gray-200" x-data="{ tab: 'profile' }">
                
                <!-- Menú lateral de navegación interno -->
                <aside class="p-6 space-y-2 border-b md:border-b-0 border-gray-200 flex flex-col justify-between">
                    <div class="space-y-2">
                        <button 
                            @click="tab = 'profile'" 
                            :class="{ 'bg-indigo-50 text-indigo-700 font-semibold': tab === 'profile' }"
                            class="w-full text-left px-4 py-2 rounded-md text-sm text-gray-700 hover:bg-gray-100 transition">
                            {{ __('Profilaren informazioa') }}
                        </button>
                        <button 
                            @click="tab = 'password'" 
                            :class="{ 'bg-indigo-50 text-indigo-700 font-semibold': tab === 'password' }"
                            class="w-full text-left px-4 py-2 rounded-md text-sm text-gray-700 hover:bg-gray-100 transition">
                            {{ __('Pasahitza aldatu') }}
                        </button>
                        <button 
                            @click="tab = 'delete'" 
                            :class="{ 'bg-red-50 text-red-700 font-semibold': tab === 'delete' }"
                            class="w-full text-left px-4 py-2 rounded-md text-sm text-gray-700 hover:bg-gray-100 transition">
                            {{ __('Kontua ezabatu') }}
                        </button>
                    </div>

                    <!-- Botón Itzuli al final de la barra lateral -->
                    <a href="{{ url('/') }}" class="w-full inline-flex items-center justify-center px-4 py-2 bg-gray-100 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-200 active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        {{ __('Itzuli') }}
                    </a>
                </aside>

                <!-- Panel de contenido activo -->
                <main class="md:col-span-3 p-6 sm:p-8">
                    <div x-show="tab === 'profile'">
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <div x-show="tab === 'password'" x-cloak>
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <div x-show="tab === 'delete'" x-cloak>
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </main>

            </div>
        </div>
    </div>
</x-app-layout>