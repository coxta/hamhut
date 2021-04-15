<header class="bg-gray-800" x-data="{ mobileNav: false }">
    <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:divide-y lg:divide-gray-700 lg:px-8">
        <div class="relative h-16 flex justify-between">

            <!-- Brand -->
            <div class="relative z-10 px-2 flex lg:px-0">
                <div class="flex-shrink-0 flex items-center">
                    @auth
                    <a href="{{ route('home') }}">
                        <img class="block h-8 w-auto" src="{{ secure_asset('radio.svg') }}" alt="Workflow">
                    </a>
                    @else
                    <a href="{{ route('visitor') }}">
                        <img class="block h-8 w-auto" src="{{ secure_asset('radio.svg') }}" alt="Workflow">
                    </a>
                    @endauth
                </div>
                <div class="hidden md:flex-shrink-0 md:flex items-center">
                    @auth
                    <a href="{{ route('home') }}">
                        <img class="block h-8 w-auto" src="{{ secure_asset('hamhut.svg') }}" alt="Workflow">
                    </a>
                    @else
                    <a href="{{ route('visitor') }}">
                        <img class="block h-8 w-auto" src="{{ secure_asset('hamhut.svg') }}" alt="Workflow">
                    </a>
                    @endauth
                </div>
            </div>

            <!-- Global Search -->
            <div class="relative z-0 flex-1 px-2 flex items-center justify-center sm:absolute sm:inset-0">
                <div class="w-full sm:max-w-xs">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                            <!-- Heroicon name: solid/search -->
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input wire:model="" id="search" name="search" class="block w-full bg-gray-700 border border-transparent rounded-md py-2 pl-10 pr-3 text-sm placeholder-gray-400 focus:outline-none focus:bg-white focus:border-white focus:ring-white focus:text-gray-900 focus:placeholder-gray-500 sm:text-sm" placeholder="Search" type="search">
                    </div>
                </div>
            </div>

            <!-- Global Actions -->
            <div class="relative z-10 flex items-center lg:hidden">

                <!-- Mobile menu button -->
                <button @click="mobileNav = !mobileNav" class="rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-expanded="false">
                    <span class="sr-only">Open menu</span>
                    <!-- Icon when menu is closed. -->
                    <!--
              Heroicon name: outline/menu
  
              Menu open: "hidden", Menu closed: "block"
            -->
                    <svg x-show="!mobileNav" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Icon when menu is open. -->
                    <!--
              Heroicon name: outline/x
  
              Menu open: "block", Menu closed: "hidden"
            -->
                    <svg x-show="mobileNav" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>

                </button>
            </div>
            <div class="hidden lg:relative lg:z-10 lg:ml-4 lg:flex lg:items-center">

                @auth
                <!-- Authenticated -->
                <!-- <button class="bg-gray-800 flex-shrink-0 rounded-full p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                    <span class="sr-only">View notifications</span>
                    <x-heroicon-o-bell class="w-7 h-7"/>
                </button> -->

                <!-- Profile dropdown -->
                <div x-data="{ open: false }" class="flex-shrink-0 rounded-full p-1">
                    <div>
                        <button @click="open = !open" class="bbg-gray-800 rounded-full flex items-center text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="options-menu" aria-haspopup="true" aria-expanded="true">
                            <span class="sr-only">Profile</span>
                            @if(Auth()->user()->licensed)
                                {{ Auth()->user()->call }}
                            @else
                                {{ Auth()->user()->name }}
                            @endif
                            <x-heroicon-s-user-circle class="ml-2 w-6 h-6" />
                        </button>
                    </div>

                    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100 transform" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75 transform" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                        <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Profile</a>

                            <form method="POST" action="logout">
                                <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                    Logout
                                </a>

                            </form>
                        </div>
                    </div>
                </div>

                @else
                <!-- Visitor -->
                <div class="justify-between">
                    <a href="{{ route('login') }}" class="mr-2 inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-yellow-500 bg-transparent hover:bg-yellow-300 hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                        Login
                    </a>
                    <a type="button" href="{{ route('register') }}" class="ml-2 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-gray-800 bg-yellow-500 hover:bg-white hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                        Register
                    </a>
                </div>
                @endauth

            </div>
        </div>
    </div>

    <!-- Mobile Nav -->
    <div :class="{ 'block': mobileNav, 'hidden': !mobileNav }">
        <x-navigation.nav type="mobile" />
    </div>

</header>