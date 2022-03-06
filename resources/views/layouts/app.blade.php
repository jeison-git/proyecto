<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>


    <link rel="shortcut icon" type="image/png" href="{{ asset('/img/logos/logosimon.png') }}">
    <link rel="shortcut icon" sizes="200x200" href="{{ asset('/img/logos/logosimon.png') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    {{-- FlexSlider --}}
    <link rel="stylesheet" href="{{ asset('vendor/sleder/flexslider.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    {{-- FlexSlider --}}
    <script src="{{ asset('vendor/sleder/jquery.flexslider-min.js') }}"></script>

</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')
        <!-- Page Heading -->
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        <x-footer />
    </div>

    @stack('modals')

    @livewireScripts

    @isset($js)
        {{ $js }} {{-- scripts de la vista instructor.courses.edit para el slug --}}
    @endisset

    @stack('script')
</body>

</html>
