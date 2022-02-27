<x-app-layout>
    {{-- portada --}}
    <section class="container mt-16">

        <div
            class="mid-w p-4 bg-white rounded-lg shadow-xl dark:bg-gray-800 cursor-pointer transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">

            <h1
                class="cursor-default w-auto h-auto text-center font-extrabold md:text-5xl bg-clip-text text-gray-700 hover:text-transparent bg-gradient-to-r from-blue-700 via-blue-500 to-blue-600">
                ¡Bienvenido a Cybernetic UNESR!
            </h1>
            <p class="font-semibold text-center text-gray-600 dark:text-gray-300">cursos complementarios y mucho más</p>

        </div>

    </section>

    <div class="py-12"> <!-- carousel de la pagina de inicio-->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                <div class="flexslider">
                    <ul class="slides">

                        <li>
                            <img src="{{ asset('img/home/carousel2.png') }}" />
                        </li>
                        <li>
                            <img src="{{ asset('img/home/carousel1.png') }}" />
                        </li>
                        <li>
                            <img src="{{ asset('img/home/carousel3.gif') }}" />
                        </li>

                    </ul>
                </div>

            </div>
        </div>
    </div>

    <!-- card con redericcion hacia las paginas de trivia, cursos y repositorio -->
    <section class="container px-6 py-4 mx-auto cursor-default ">
        <div class="grid gap-6 mb-8 md:grid-cols-3">
            <!-- Card 1 -->
            <div class="flex items-center p-4 bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-800 transition-all duration-500 transform bg-white shadow-xl hover:shadow-2xl hover:scale-105">
                <div class="p-3 mr-0 rounded-full">
                    <img src="https://img.icons8.com/external-smashingstocks-thin-outline-color-smashing-stocks/67/000000/external-quiz-education-smashingstocks-thin-outline-color-smashing-stocks.png"/>
                </div>
                <div>
                    <p class="mb-2 text-xl text-center text-gray-800">Trivia</p>
                    <p class="text-sm text-center text-gray-800">¿Cuanto sabes de informática?, Pon a prueba tus conocimientos.</p>
                </div>
            </div>
            <!-- Card 2 -->
            <a href="{{route('courses.index')}}">
            <div class="flex items-center p-4 bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-800 transition-all duration-500 transform bg-white shadow-xl hover:shadow-2xl hover:scale-105">
                <div class="p-3 mr-0 rounded-full">
                    <img src="https://img.icons8.com/external-bright-fill-juicy-fish/42/000000/external-course-education-bright-fill-bright-fill-juicy-fish.png"/>
                </div>
                <div>
                    <p class="mb-2 mr-4 text-xl text-center text-gray-800">Cursos </p>
                    <p class="text-sm text-center text-gray-800">Sigue desde este espacio virtual cada una de tus asignaturas.</p>
                </div>
            </div>
        </a>
            <!-- Card 3 -->
            <a href="{{route('publications.index')}}">
            <div class="flex items-center p-4 bg-white border-2 border-gray-200 rounded-lg dark:bg-gray-800 transition-all duration-500 transform bg-white shadow-xl hover:shadow-2xl hover:scale-105">
                <div class="p-3 rounded-full">
                    <img src="https://img.icons8.com/external-flat-land-kalash/64/000000/external-library-education-and-e-learning-flat-land-kalash.png"/>
                </div>
                <div>
                    <p class="mb-2 text-xl text-center text-gray-800">Repositorio </p>
                    <p class="text-sm text-center text-gray-800"> Comparte o accede a los mejores contenidos de referencia, de la institución.</p>
                </div>
            </div>
        </a>
        </div>
    </section>

    {{-- Seccion de ultimos cursos agregados --}}
    <section class="my-16">

        <div class="container mb-8 ">{{-- identifica la seccion de categorias --}}
            <div class="flex items-center justify-between block">

                <span class="flex text-xs text-center text-gray-700 uppercase md:text-2xl ">
                    Sigue practicando con las lecciones de nuestros facilitadores, desarrolla y complementa tu aprendizaje de una manera flexible que se adapte a tu tiempo.
                </span>

                <div class="flex-1 w-full h-2 mx-6 bg-gray-400 rounded-full ">
                </div>

            </div>
        </div>

        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

            @foreach ($courses as $course)
                <x-course-card :course="$course" />
            @endforeach

        </div>
    </section>

    {{-- Script para los slider bar- --}}
    @push('script')
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                });
            });
        </script>
    @endpush

</x-app-layout>
