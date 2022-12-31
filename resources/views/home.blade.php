<x-app-layout>

    <h2 class="text-2xl">{{ Auth::user()->call }}</h2>

    <hr class="my-2" />

    Home Content

    @slot('aside')
        <script src="https://apps.elfsight.com/p/platform.js" defer></script>
        <div class="elfsight-app-5d06a999-6829-41ab-a571-c53bc2506391"></div>
    @endslot


</x-app-layout>
