<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Repositorio [Editions] </title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('/img/logos/logosimon.png') }}">
    <link rel="shortcut icon" sizes="200x200" href="{{ asset('/img/logos/logosimon.png') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')
        <!-- Page Heading -->
        <!-- Page Content -->

        <div class="container grid gap-6 py-8 md:grid-cols-5">

            <aside>
                <h1 class="mb-4 text-lg font-bold">Ediciones</h1>

                <ul class="mb-4 text-sm text-gray-900">

                    <li
                        class="leading-7 mb-1 border-l-4 @routeIs('editor.publications.index', $publication) border-blue-500
@else
border-transparent @endif pl-2">
                        <a href="{{ Route('editor.publications.index', $publication) }}"> Publicaciones </a>
                    </li>

                    <li
                        class="leading-7 mb-1 border-l-4 @routeIs('editor.publications.edit', $publication) border-blue-500
@else
border-transparent @endif pl-2">
                        <a href="{{ Route('editor.publications.edit', $publication) }}">Información de la
                            publicación</a>
                    </li>


                    @if ($publication->ckeck)
                        <li
                            class="leading-7 mb-1 border-l-4 @routeIs('editor.publications.check', $publication) border-blue-500
@else
border-transparent @endif pl-2">
                            <a href="{{ Route('editor.publications.ckeck', $publication) }}">Observaciones</a>
                        </li>
                    @endif {{-- ojo este es el componente Observer --}}

                </ul>

                @switch($publication->status)
                    @case(1)
                        <form action="{{ route('editor.publications.status', $publication) }}" method="POST">
                            @csrf
                            <button class="btn btn-primary">Solicitar revisión</button>
                        </form>
                    @break

                    @case(2)
                        <div class="font-semibold text-center text-gray-800 card">
                            <div class="card-body">
                                Este curso se encuentra en revisión
                            </div>
                        </div>
                    @break

                    @case(3)
                        <div class="font-semibold text-center text-gray-800 card">
                            <div class="card-body">
                                Este curso se encuentra publicado
                            </div>
                        </div>
                    @break

                    @default
                @endswitch

            </aside>

            <div class="col-span-4 card">
                <main class="text-gray-700 card-body">

                    {{ $slot }}

                </main>

            </div>

        </div>

    </div>

    @stack('modals')

    @livewireScripts

    @isset($js)
        {{-- scripts de la vista editor public\js... --}}

        {{ $js }}
    @endisset
</body>

</html>
