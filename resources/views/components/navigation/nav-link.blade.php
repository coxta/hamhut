@if($type == 'side')

@if($active)
<a href="{{ $href }}" class="bg-gray-200 text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md" aria-current="page">

    <x-dynamic-component :component="$icon" class="text-gray-900 mr-3 h-5 w-5" />

    <span class="truncate">
        {{ $label }}
    </span>

</a>
@else
<a href="{{ $href }}" class="text-gray-600 hover:bg-gray-200 hover:text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md" aria-current="page">

    <x-dynamic-component :component="$icon" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 mr-3 h-6 w-6" />

    <span class="truncate">
        {{ $label }}
    </span>

</a>
@endif

@else

@if($active)
<a href="{{ $href }}" class="bg-gray-900 text-white block group flex items-center rounded-md py-2 px-3 text-base font-medium">
    <x-dynamic-component :component="$icon" class="text-white mr-3 h-6 w-6" />
    <span class="truncate">
        {{ $label }}
    </span>
</a>
@else
<a href="{{ $href }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block group flex items-center rounded-md py-2 px-3 text-base font-medium">
    <x-dynamic-component :component="$icon" class="text-gray-300 hover:bg-gray-700 hover:text-white mr-3 h-6 w-6" />
    <span class="truncate">
        {{ $label }}
    </span>
</a>
@endif

@endif