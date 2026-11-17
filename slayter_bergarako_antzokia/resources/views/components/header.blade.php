<div class="w-full bg-[#2b56bd] text-white shadow-md relative z-50">
    <!-- Barra Superior -->
    <header class="max-w-7xl mx-auto px-3 sm:px-4 py-3 flex justify-between items-center gap-2 relative">
        
        <!-- Izquierda: Hamburguesa (Móvil) + Título y Enlaces (Ordenador) -->
        <div class="flex items-center flex-1 lg:flex-initial min-w-0 lg:space-x-6">
            <!-- Botón Menú Hamburguesa (Solo móvil/tablet) -->
            <button 
                type="button" 
                onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" 
                class="lg:hidden flex-shrink-0 text-white hover:opacity-80 transition-opacity focus:outline-none p-1 cursor-pointer" 
                aria-label="Menú"
            >
                <svg class="w-7 h-7 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <!-- Título / Marca (Centrado en el espacio disponible en móvil, a la izquierda en ordenador) -->
            <a href="/" class="no-underline text-white flex-1 lg:flex-initial text-center lg:text-left font-bold text-xs sm:text-base lg:text-lg tracking-wider uppercase leading-tight sm:whitespace-nowrap px-1">
                @yield('header-title', 'Bergarako Antzokia')
            </a>

            <!-- Navegación Horizontal (Solo ordenador) -->
            <nav class="hidden lg:flex items-center space-x-1 xl:space-x-2 text-xs xl:text-sm font-medium tracking-wider uppercase">
                <a href="/" class="no-underline text-white px-3 py-2 rounded-md hover:bg-white/15 transition-colors whitespace-nowrap {{ request()->is('/') ? 'bg-white/20 font-semibold' : '' }}">
                    HASIERA
                </a>

                <a href="{{ Route::has('ekitaldiak.kartelera') ? route('ekitaldiak.kartelera') : '/kartelera' }}" class="no-underline text-white px-3 py-2 rounded-md hover:bg-white/15 transition-colors whitespace-nowrap {{ request()->routeIs('ekitaldiak.kartelera') || request()->is('kartelera') ? 'bg-white/20 font-semibold' : '' }}">
                    EKITALDIAK
                </a>

                <a href="/saskia" class="no-underline text-white px-3 py-2 rounded-md hover:bg-white/15 transition-colors whitespace-nowrap {{ request()->is('saskia*') ? 'bg-white/20 font-semibold' : '' }}">
                    SARRERAK
                </a>

                <!-- SOLO VISIBLE SI ES ADMINISTRADOR -->
                @if(auth()->check() && auth()->user()->Mota === 'Admin')
                    <span class="h-5 w-px bg-white/30 mx-1"></span>

                    <a href="{{ route('erabiltzaileak.index') }}" class="no-underline text-white px-3 py-2 rounded-md hover:bg-white/15 transition-colors whitespace-nowrap {{ request()->routeIs('erabiltzaileak.*') ? 'bg-white/20 font-semibold' : '' }}">
                        ERABILTZAILEEN KUDEAKETA
                    </a>

                    <a href="{{ route('ekitaldiak.index') }}" class="no-underline text-white px-3 py-2 rounded-md hover:bg-white/15 transition-colors whitespace-nowrap {{ request()->routeIs('ekitaldiak.index', 'ekitaldiak.create', 'ekitaldiak.edit', 'ekitaldiak.show') ? 'bg-white/20 font-semibold' : '' }}">
                        EKITALDIAK KUDEATU
                    </a>
                @endif
            </nav>
        </div>

        <!-- Acciones Derecha -->
        <div class="flex items-center flex-shrink-0 space-x-2 sm:space-x-4">
            @auth
                <!-- Ícono Saskia (Entradas) -->
                <a href="/saskia" class="no-underline text-white hover:opacity-80 transition-opacity" title="Saskia">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                    </svg>
                </a>
                
                <!-- Desplegable Perfil -->
                <div class="relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="bg-white text-[#2b56bd] w-8 h-8 sm:w-9 sm:h-9 rounded-full flex items-center justify-center hover:bg-gray-100 transition-colors focus:outline-none cursor-pointer" title="Profila">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 fill-current" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profila') }}
                            </x-dropdown-link>

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
                <a href="{{ route('login') }}" class="no-underline text-white font-medium hover:opacity-80 transition-opacity text-[11px] sm:text-sm uppercase tracking-wider whitespace-nowrap">
                    {{ __('HASI SAIOA') }}
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="no-underline bg-white text-[#2b56bd] px-2 sm:px-3 py-1 rounded-md text-[11px] sm:text-sm font-semibold hover:bg-gray-100 transition-colors uppercase tracking-wider whitespace-nowrap">
                        {{ __('ERREGISTRATU') }}
                    </a>
                @endif
            @endguest
        </div>
    </header>

    <!-- Menú Desplegable Flotante (Solo móvil/tablet) -->
    <div 
        id="mobile-menu" 
        class="hidden lg:hidden absolute top-full left-0 w-full bg-[#2b56bd] shadow-xl py-2 z-50 border-t border-white/10"
    >
        <nav class="flex flex-col text-sm font-medium tracking-wider uppercase text-center">
            <a href="/" class="no-underline text-white block w-full py-3.5 hover:bg-white/15 transition-colors">
                HASIERA
            </a>

            <a href="{{ Route::has('ekitaldiak.kartelera') ? route('ekitaldiak.kartelera') : '/kartelera' }}" class="no-underline text-white block w-full py-3.5 hover:bg-white/15 transition-colors">
                EKITALDIAK
            </a>

            <a href="/saskia" class="no-underline text-white block w-full py-3.5 hover:bg-white/15 transition-colors">
                SARRERAK
            </a>

            @if(auth()->check() && auth()->user()->Mota === 'Admin')
                <div class="w-full border-t border-white/20 my-1"></div>
                
                <a href="{{ route('erabiltzaileak.index') }}" class="no-underline text-white block w-full py-3.5 hover:bg-white/15 transition-colors">
                    ERABILTZAILEEN KUDEAKETA
                </a>
                
                <a href="{{ route('ekitaldiak.index') }}" class="no-underline text-white block w-full py-3.5 hover:bg-white/15 transition-colors">
                    EKITALDIAK KUDEATU
                </a>
            @endif
        </nav>
    </div>
</div>