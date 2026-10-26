<div x-data="{ menuOpen: false }" class="w-full bg-[#2b56bd] text-white shadow-md relative z-50">
    <!-- Barra Superior -->
    <header class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center relative">
        
        <!-- Botón Menú Hamburguesa (Izquierda) -->
        <div class="flex items-center">
            <button 
                @click="menuOpen = !menuOpen" 
                class="text-white hover:opacity-80 transition-opacity focus:outline-none p-1" 
                aria-label="Menú"
            >
                <svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Título / Sección (Centro Absoluto perfecto) -->
        <div class="absolute left-1/2 transform -translate-x-1/2 text-center font-medium text-lg tracking-wider uppercase pointer-events-none">
            @yield('header-title', 'Bergarako Antzokia')
        </div>

        <!-- Acciones Derecha (Logueado vs Invitado) -->
        <div class="flex items-center space-x-4">
            @auth
                <!-- Ícono Carrito (Apunta a Saskia) -->
                <a href="/saskia" class="no-underline text-white hover:opacity-80 transition-opacity" title="Carrito">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </a>
                
                <!-- Desplegable Perfil -->
                <div class="relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="bg-white text-[#2b56bd] w-9 h-9 rounded-full flex items-center justify-center hover:bg-gray-100 transition-colors focus:outline-none" title="Perfil">
                                <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profila') }}
                            </x-dropdown-link>

                            <!-- Cerrar Sesión -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Irten') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @endauth

            @guest
                <!-- Enlaces de autenticación cuando NO está logueado -->
                <a href="{{ route('login') }}" class="no-underline text-white font-medium hover:opacity-80 transition-opacity text-sm uppercase tracking-wider">
                    {{ __('HASI SAIOA') }}
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="no-underline bg-white text-[#2b56bd] px-3 py-1 rounded-md text-sm font-semibold hover:bg-gray-100 transition-colors uppercase tracking-wider">
                        {{ __('ERREGISTRATU') }}
                    </a>
                @endif
            @endguest
        </div>
    </header>

    <!-- Menú Desplegable Flotante (Ancho completo absoluto) -->
    <div 
        x-show="menuOpen" 
        @click.outside="menuOpen = false"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="absolute top-full left-0 w-full bg-[#2b56bd] shadow-xl py-2 z-50 border-t border-white/10"
        x-cloak
    >
        <nav class="flex flex-col text-sm font-medium tracking-wider uppercase text-center">
            <a href="/" class="no-underline text-white block w-full py-3.5 hover:bg-white/15 transition-colors">
                HASIERA
            </a>

            <a href="{{ route('ekitaldiak.index') }}" class="no-underline text-white block w-full py-3.5 hover:bg-white/15 transition-colors">
                EKITALDIAK
            </a>

            <a href="/saskia" class="no-underline text-white block w-full py-3.5 hover:bg-white/15 transition-colors">
                SASKIA
            </a>

            @auth
                <div class="w-full border-t border-white/20 my-1"></div>
                <a href="/admin/erabiltzaileak" class="no-underline text-white block w-full py-3.5 hover:bg-white/15 transition-colors">
                    ERABILTZAILEEN KUDEAKETA (ADMIN BAKARRIK)
                </a>
                <a href="/admin/ekitaldiak" class="no-underline text-white block w-full py-3.5 hover:bg-white/15 transition-colors">
                    EKITALDIAK KUDEATU (ADMIN BAKARRIK)
                </a>
            @endauth
        </nav>
    </div>
</div>