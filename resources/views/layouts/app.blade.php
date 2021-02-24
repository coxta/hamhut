<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
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

    <x-navigation.top/>

    <!-- Three Column Layout -->
    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">

   
        <!-- Side Nav -->
        <div class="hidden lg:block lg:col-span-2">
            <x-navigation.nav type="side"/>
        </div>

        <!-- Main Content -->
        <main class="lg:col-span-8">
            {{ $slot }}
        </main>

        <!-- Side Col -->
        <aside class="hidden lg:block lg:col-span-2">
            <div class="sticky top-6 space-y-4">
                News? Misc? 
            </div>
        </aside>
    </div>

    <livewire:scripts />
</body>

</html>