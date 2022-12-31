<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="{{ asset('radio.svg') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ham Hut') }} - Amateur Radio</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <livewire:styles />

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>

<body class="font-sans antialiased bg-gray-100">

    <x-navigation.navigation/>

    @if (session()->has('alert'))
        <div class="py-2 max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
            <x-alert />
        </div>
    @endif

    <div class="py-4 max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:flex lg:gap-8">

        <main class="flex-grow">
            {{ $slot }}
        </main>

        @isset($aside)
            <aside class="flex w-full lg:w-64">
                <div class="sticky top-6">
                    {{ $aside }}
                </div>
            </aside>
        @endisset

    </div>

    <livewire:scripts />

</body>

</html>
