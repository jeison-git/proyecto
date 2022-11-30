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

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-purple-100">
        @livewire('navigation-menu')
        <!-- Page Heading -->
        <!-- Page Content -->

        <div class="container grid gap-2 py-4 md:grid-cols-5">

            <aside>
                <h1 class="mb-4 text-lg font-bold">Edición del taller/curso/etc.</h1>

                <ul class="mb-4 text-sm text-gray-900">

                    <li
                        class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.index', $course) border-blue-500
@else
border-transparent @endif pl-2">
                        <a href="{{ Route('instructor.courses.index', $course) }}"> Todos mis talleres / cursos. </a>
                    </li>

                    <li
                        class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.edit', $course) border-blue-500
@else
border-transparent @endif pl-2">
                        <a href="{{ Route('instructor.courses.edit', $course) }}">Información o detalles{{-- del taller/curso/etc. --}}</a>
                    </li>

                    <li
                        class="leading-7 mb-1 border-l-4  @routeIs('instructor.courses.curriculum', $course) border-blue-500
@else
border-transparent @endif pl-2">
                        <a href="{{ Route('instructor.courses.curriculum', $course) }}">Lecciones o temas {{-- del taller/curso/etc. --}}</a>
                    </li>

                    <li
                        class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.goals', $course) border-blue-500
@else
border-transparent @endif pl-2">
                        <a href="{{ Route('instructor.courses.goals', $course) }}">Metas o objetivos {{-- del taller/curso/etc. --}}</a>
                    </li>

                    <li
                        class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.students', $course) border-blue-500
@else
border-transparent @endif pl-2">
                        <a href="{{ Route('instructor.courses.students', $course) }}">Estudiantes</a>
                    </li>

                    @if ($course->observation)
                        <li
                            class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.observation', $course) border-blue-500
@else
border-transparent @endif pl-2">
                            <a href="{{ Route('instructor.courses.observation', $course) }}">Observaciones</a>
                        </li>
                    @endif

                </ul>

                @switch($course->status)
                    @case(1)
                        <form action="{{ route('instructor.courses.status', $course) }}" method="POST">
                            @csrf
                            <button class="btn btn-primary">Solicitar revisión</button>
                        </form>
                    @break

                    @case(2)
                        <div class="font-semibold text-center text-gray-800 card">
                            <div class="card-body">
                                Este contenido se encuentra en revisión
                            </div>
                        </div>
                    @break

                    @case(3)
                        <div class="font-semibold text-center text-gray-800 card">
                            <div class="card-body">
                                Este contenido se encuentra publicado
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
        {{ $js }} {{-- scripts de la vista instructor.courses.edit para el slug --}}
    @endisset
</body>

</html>
