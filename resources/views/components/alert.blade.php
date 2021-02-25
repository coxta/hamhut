@if( session('alert-type') == 'success' )
<div x-data="{ open: true }" x-show="open" class="rounded-md bg-green-100 p-4 col-span-full">
    <div class="flex">
        <div class="flex-shrink-0">
            <x-heroicon-s-check-circle class="w-5 h-5 text-green-400" />
        </div>
        <div class="ml-3">
            <p class="text-sm font-medium text-green-800">
                {{ session('alert') }}
            </p>
        </div>
        <div class="ml-auto pl-3">
            <div class="-mx-1.5 -my-1.5">
                <button @click="open = !open" class="inline-flex bg-green-100 rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-green-600">
                    <span class="sr-only">Dismiss</span>
                    <x-heroicon-s-x class="w-5 h-5" />
                </button>
            </div>
        </div>
    </div>
</div>
@elseif( session('alert-type') == 'warning' )
<div x-data="{ open: true }" x-show="open" class="rounded-md bg-yellow-100 p-4 col-span-full">
    <div class="flex">
        <div class="flex-shrink-0">
            <x-heroicon-s-exclamation class="w-5 h-5 text-yellow-400" />
        </div>
        <div class="ml-3">
            <p class="text-sm font-medium text-yellow-800">
                {{ session('alert') }}
            </p>
        </div>
        <div class="ml-auto pl-3">
            <div class="-mx-1.5 -my-1.5">
                <button @click="open = !open" class="inline-flex bg-yellow-100 rounded-md p-1.5 text-yellow-500 hover:bg-yellow-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-yellow-50 focus:ring-yellow-600">
                    <span class="sr-only">Dismiss</span>
                    <x-heroicon-s-x class="w-5 h-5" />
                </button>
            </div>
        </div>
    </div>
</div>
@elseif( session('alert-type') == 'error' )
<div x-data="{ open: true }" x-show="open" class="rounded-md bg-red-100 p-4 col-span-full">
    <div class="flex">
        <div class="flex-shrink-0">
            <x-heroicon-s-x-circle class="w-5 h-5 text-red-400" />
        </div>
        <div class="ml-3">
            <p class="text-sm font-medium text-red-800">
                {{ session('alert') }}
            </p>
        </div>
        <div class="ml-auto pl-3">
            <div class="-mx-1.5 -my-1.5">
                <button @click="open = !open" class="inline-flex bg-red-100 rounded-md p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-red-50 focus:ring-red-600">
                    <span class="sr-only">Dismiss</span>
                    <x-heroicon-s-x class="w-5 h-5" />
                </button>
            </div>
        </div>
    </div>
</div>
@else
<div x-data="{ open: true }" x-show="open" class="rounded-md bg-blue-100 p-4 col-span-full">
    <div class="flex">
        <div class="flex-shrink-0">
            <x-heroicon-s-information-circle class="w-5 h-5 text-blue-400" />
        </div>
        <div class="ml-3">
            <p class="text-sm font-medium text-blue-800">
                {{ session('alert') }}
            </p>
        </div>
        <div class="ml-auto pl-3">
            <div class="-mx-1.5 -my-1.5">
                <button @click="open = !open" class="inline-flex bg-blue-100 rounded-md p-1.5 text-blue-500 hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-blue-50 focus:ring-blue-600">
                    <span class="sr-only">Dismiss</span>
                    <x-heroicon-s-x class="w-5 h-5" />
                </button>
            </div>
        </div>
    </div>
</div>
@endif