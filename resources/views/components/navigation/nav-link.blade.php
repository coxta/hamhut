@if($active)
    <a href="{{ $href }}" class="text-yellow-500 group flex items-center rounded-md py-2 px-3 text-sm ">
        <x-dynamic-component :component="$icon" class="mr-3 h-5 w-5" />
        <span class="truncate">
            {{ $label }}
        </span>
    </a>
@else
    <a href="{{ $href }}" class="text-gray-300 hover:bg-gray-700 hover:text-yellow-500 group flex items-center rounded-md py-2 px-3 text-sm">
        <x-dynamic-component :component="$icon" class="mr-3 h-5 w-5" />
        <span class="truncate">
            {{ $label }}
        </span>
    </a>
@endif
