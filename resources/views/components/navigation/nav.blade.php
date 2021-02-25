@if($type == 'side')

<nav aria-label="Navigation" class="sticky top-6 divide-y divide-gray-300">

  <div class="space-y-1">

    @auth
    <x-navigation.nav-link type="side" label="Home" icon="home" href="{{ route('home') }}" active="{{ Route::currentRouteName() == 'home' }}" />
    @else
    <x-navigation.nav-link type="side" label="Home" icon="home" href="{{ route('visitor') }}" active="{{ Route::currentRouteName() == 'visitor' }}" />
    @endauth
    <x-navigation.nav-link type="side" label="Operators" icon="microphone" href="{{ route('operators') }}" active="{{ Route::currentRouteName() == 'operators' }}" />
    <x-navigation.nav-link type="side" label="Events" icon="calendar" href="{{ route('calendar') }}" active="{{ Route::currentRouteName() == 'calendar' }}" />

  </div>

</nav>
@else

<nav aria-label="Navigation">
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
    <x-navigation.nav-link type="mobile" label="Home" icon="home" href="{{ route('home') }}" active="{{ Route::currentRouteName() == 'home' }}" />
    @else
    <x-navigation.nav-link type="mobile" label="Home" icon="home" href="{{ route('visitor') }}" active="{{ Route::currentRouteName() == 'visitor' }}" />
    @endauth
    <x-navigation.nav-link type="mobile" label="Operators" icon="microphone" href="{{ route('operators') }}" active="{{ Route::currentRouteName() == 'operators' }}" />
    <x-navigation.nav-link type="mobile" label="Events" icon="calendar" href="{{ route('calendar') }}" active="{{ Route::currentRouteName() == 'calendar' }}" />

  </div>

</nav>

@endif