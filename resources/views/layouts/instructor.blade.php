<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">

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

            <div class="container py-8 grid grid-cols-5">

                <aside>
                    <h1 class="font-bold text-lg mb-4">Edición del curso</h1>
        
                    <ul class="text-sm text-gray-900">
                        <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.edit', $course) border-blue-500 @else border-transparent @endif pl-2">
                            <a href="{{Route('instructor.courses.edit', $course)}}">Información del curso</a>
                        </li>
        
                        <li class="leading-7 mb-1 border-l-4  @routeIs('instructor.courses.curriculum', $course) border-blue-500 @else border-transparent @endif pl-2">
                            <a href="{{Route('instructor.courses.curriculum', $course)}}">Lecciones del curso</a>
                        </li>
        
                        <li class="leading-7 mb-1 border-l-4 border-transparent pl-2">
                            <a href="">Metas del curso</a>
                        </li>
        
                        <li class="leading-7 mb-1 border-l-4 border-transparent pl-2">
                            <a href="">Estudiantes</a>
                        </li>
                    </ul>
        
                </aside>
        
                <div class="col-span-4 card">
                    <main class="card-body text-gray-700">
                        
                        {{$slot}}
        
                    </main>
        
                </div>
                
        
            </div>

        </div>

        @stack('modals')

        @livewireScripts

        @isset($js)            
        
            {{$js}} {{--scripts de la vista instructor.courses.edit para el slug--}}

        @endisset
    </body>
</html>
