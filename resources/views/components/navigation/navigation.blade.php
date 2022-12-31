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
                <div class="w-full sm:max-w-xs lg:max-w-lg">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                            <x-heroicon-s-search class="h-4 w-4 text-gray-400"/>
                        </div>
                        <input wire:model="" id="search" name="search" class="block w-full bg-gray-700 border border-transparent rounded-md py-2 pl-10 pr-3 text-sm placeholder-gray-400 focus:outline-none focus:bg-white focus:border-white focus:ring-white focus:text-gray-900 focus:placeholder-gray-500 sm:text-sm" placeholder="Search" type="search">
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="relative z-10 flex items-center lg:hidden">
                <button @click="mobileNav = !mobileNav" class="rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-expanded="false">
                    <span class="sr-only">Open menu</span>
                    <x-heroicon-o-menu x-show="!mobileNav" class="block h-6 w-6"/>
                    <x-heroicon-o-x x-show="mobileNav" class="block h-6 w-6"/>
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
                    <div x-data="{ open: false }" class="flex-shrink-0 p-1">

                        <button @click="open = !open" class="bg-gray-800 rounded px-2.5 py-1.5 flex items-center text-yellow-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="options-menu" aria-haspopup="true" aria-expanded="true">
                            <span class="sr-only">Profile</span>
                            @if(Auth()->user()->licensed)
                                <span class="tracking-widest text-lg">{{ Auth()->user()->call }}</span>
                            @else
                                {{ Auth()->user()->name }}
                            @endif
                            <x-heroicon-s-user-circle class="ml-2 w-6 h-6" />
                        </button>

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

        <nav class="hidden lg:flex lg:space-x-2.5 lg:py-2" aria-label="Global">
            @auth
                <x-navigation.nav-link label="Home" icon="home" href="{{ route('home') }}" active="{{ Route::currentRouteName() == 'home' }}" />
            @else
                <x-navigation.nav-link label="Home" icon="home" href="{{ route('visitor') }}" active="{{ Route::currentRouteName() == 'visitor' }}" />
            @endauth
            <x-navigation.nav-link label="Repeaters" icon="status-online" href="{{ route('repeaters') }}" active="{{ Route::currentRouteName() == 'repeaters' }}" />
            <x-navigation.nav-link label="Stations" icon="microphone" href="{{ route('stations') }}" active="{{ Route::currentRouteName() == 'stations' }}" />
            <x-navigation.nav-link label="Favorites" icon="star" href="{{ route('favorites') }}" active="{{ Route::currentRouteName() == 'favorites' }}" />
            <x-navigation.nav-link label="Events" icon="calendar" href="{{ route('calendar') }}" active="{{ Route::currentRouteName() == 'calendar' }}" />
        </nav>

    </div>

    <nav :class="{ 'block': mobileNav, 'hidden': !mobileNav }" aria-label="Navigation">
        <div class="border-b border-gray-700 py-3">
          @auth
          <div class="px-4 flex items-center">
            <div class="flex-shrink-0">
              <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixqx=p3JfIOb8nb&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            </div>
            <div class="ml-3">
              <div class="text-base font-medium text-white">{{ Auth()->user()->name }}</div>
              <div class="text-sm font-medium text-gray-400">{{ Auth()->user()->email }}</div>
            </div>
            <button class="ml-auto flex-shrink-0 bg-gray-800 rounded-full p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
              <span class="sr-only">View notifications</span>
              <x-heroicon-o-bell class="w-6 h-6" />
            </button>
          </div>
          <div class="mt-3 px-2 space-y-1">
            <a href="#" class="block rounded-md py-2 px-3 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Profile</a>
            <a href="{{ route('logout') }}" class="block rounded-md py-2 px-3 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Logout</a>
          </div>
          @else
          <div class="text-center">
            <a type="button" href="{{ route('login') }}" class="mr-2 inline-flex items-center px-3 py-2 border border-yellow-500 text-sm leading-4 font-medium rounded-md text-yellow-500 bg-transparent hover:bg-yellow-500 hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
              Login
            </a>
            <span class="text-white">or</span>
            <a type="button" href="{{ route('register') }}" class="ml-2 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-gray-800 bg-yellow-500 hover:bg-white hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
              Register
            </a>
          </div>
          @endauth
        </div>

        <div class="pt-2 pb-3 px-2 space-y-1">
          @auth
            <x-navigation.nav-link label="Home" icon="home" href="{{ route('home') }}" active="{{ Route::currentRouteName() == 'home' }}" />
          @else
            <x-navigation.nav-link label="Home" icon="home" href="{{ route('visitor') }}" active="{{ Route::currentRouteName() == 'visitor' }}" />
          @endauth
          <x-navigation.nav-link label="Repeaters" icon="status-online" href="{{ route('repeaters') }}" active="{{ Route::currentRouteName() == 'repeaters' }}" />
          <x-navigation.nav-link label="Stations" icon="microphone" href="{{ route('stations') }}" active="{{ Route::currentRouteName() == 'stations' }}" />
          <x-navigation.nav-link label="Favorites" icon="star" href="{{ route('favorites') }}" active="{{ Route::currentRouteName() == 'favorites' }}" />
          <x-navigation.nav-link label="Events" icon="calendar" href="{{ route('calendar') }}" active="{{ Route::currentRouteName() == 'calendar' }}" />

        </div>

      </nav>

</header>
