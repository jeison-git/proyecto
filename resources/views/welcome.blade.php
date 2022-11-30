<x-app-layout>
    {{-- portada --}}
    <section class="container mt-16">

        <div
            class="p-4 transition duration-500 ease-in-out transform bg-white rounded-lg shadow-xl cursor-pointer mid-w dark:bg-gray-800 hover:-translate-y-1 hover:shadow-lg">

            <h1
                class="w-auto h-auto font-extrabold text-center text-green-400 cursor-default md:text-5xl bg-clip-text hover:text-transparent bg-gradient-to-r from-purple-700 via-green-500 to-purple-600">
                ¡Bienvenido a Nuestra Fundación <br> Cattleya, Café y Cacao!
            </h1>
            <p class="font-semibold text-center text-purple-600 dark:text-gray-300">Únete a nosotros para proteger la naturaleza de Venezuela</p>

        </div>

    </section>

    <div class="py-12 container"> <!-- carousel de la pagina de inicio-->

        {{-- <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">


                <div class="flexslider">
                    <ul class="slides">

                        <li>
                            <img src="{{ asset('img/home/1.jpg') }}" />
                        </li>
                        <li>
                            <img src="{{ asset('img/home/2.jpg') }}" />
                        </li>
                        <li>
                            <img src="{{ asset('img/home/3.jpg') }}" />
                        </li>

                        <li>
                            <img src="{{ asset('img/home/4.jpg') }}" />
                        </li>
                        <li>
                            <img src="{{ asset('img/home/5.jpg') }}" />
                        </li>
                        <li>
                            <img src="{{ asset('img/home/6.jpg') }}" />
                        </li>
                        <li>
                            <img src="{{ asset('img/home/7.jpg') }}" />
                        </li>
                        <li>
                            <img src="{{ asset('img/home/8.jpg') }}" />
                        </li>
                        <li>
                            <img src="{{ asset('img/home/9.jpg') }}" />
                        </li>
                        <li>
                            <img src="{{ asset('img/home/10.jpg') }}" />
                        </li>

                    </ul>
                </div>

            </div>
        </div> --}}

        <div class="container grid grid-cols-1 gap-2 mt-8 cursor-default md:p-4 md:grid-cols-4 md:gap-6">

                <div class="flex items-center px-2 py-4 mb-6 bg-white rounded-lg shadow-lg ">{{-- solo muestra el primer registro no eliminar solo editaar --}}


                           {{-- <div
                                class="items-center min-h-screen p-1 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl"> --}}

                                {{-- <img alt="..." class="w-full min-h-screen bg-fill" src="{{ Storage::url($item->image) }}"> --}}

                        <div class="items-center min-h-screen p-1 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl">
                            <img src="{{ asset('img/logos/gif-logo2.gif') }}" alt="empty" class="min-h-screen ">
                        </div>

                </div>

            <div class="col-span-2 bg-green-400 rounded-full">{{-- Muestra productos --}}

                <!-- component -->

                <div class="flex flex-wrap items-center pt-8">
                    <div class="w-full px-4 ml-auto mr-auto ">
                        <div class="relative flex flex-wrap justify-center">

                            <div class="w-full px-4 my-4">

                                {{-- card con mensaje y bg-imagen --}}
                                {{-- <div class="p-8 mx-auto text-center transition duration-500 ease-in-out transform bg-white rounded-lg shadow-xl hover:-translate-y-1 hover:shadow-2xl"
                                    style="background-image: url('https://cdn.pixabay.com/photo/2012/02/29/12/19/cute-19004_960_720.jpg');
                                    background-position: center;
                                    background-repeat: no-repeat;
                                    background-size: contain;">

                                    <div class="h-16"></div>

                                    <h3
                                        class="text-base font-extrabold text-center text-transparent md:text-2xl bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500">
                                        ¡Sorpréndete con nuestras megas ofertas y descuentos sopresas Vip!</h3>

                                </div> --}}

                                <div class="flexslider">{{-- FlexSlider 2  responsive slider  es utilizado en esta seccion --}}
                                    <ul class="slides">

                                        <li>
                                            <img src="{{ asset('img/home/Brigada.gif') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/brigada.png') }}" />
                                        </li>

                                        <li>
                                            <img src="{{ asset('img/home/1.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/2.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/3.jpg') }}" />
                                        </li>

                                        <li>
                                            <img src="{{ asset('img/home/4.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/5.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/6.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/7.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/8.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/9.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/10.jpg') }}" />
                                        </li>

                                        <li>
                                            <img src="{{ asset('img/home/11.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/12.jpg') }}" />
                                        </li>

                                        <li>
                                            <img src="{{ asset('img/home/14.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/15.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/17.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/18.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/19.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/20.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/21.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/22.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/23.jpg') }}" />
                                        </li>

                                        <li>
                                            <img src="{{ asset('img/home/24.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/25.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/26.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/27.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/28.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/29.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/30.jpg') }}" />
                                        </li>

                                        <li>
                                            <img src="{{ asset('img/home/31.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/32.jpg') }}" />
                                        </li>

                                        <li>
                                            <img src="{{ asset('img/home/34.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/35.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/36.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/37.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/38.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/40.jpg') }}" />
                                        </li>

                                        <li>
                                            <img src="{{ asset('img/home/42.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/43.jpg') }}" />
                                        </li>

                                        <li>
                                            <img src="{{ asset('img/home/44.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/45.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/46.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/47.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/48.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/49.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/50.jpg') }}" />
                                        </li>

                                        <li>
                                            <img src="{{ asset('img/home/51.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/52.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/53.jpg') }}" />
                                        </li>

                                        <li>
                                            <img src="{{ asset('img/home/54.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/55.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/56.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/57.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/58.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/60.jpg') }}" />
                                        </li>

                                        <li>
                                            <img src="{{ asset('img/home/61.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/63.jpg') }}" />
                                        </li>

                                        <li>
                                            <img src="{{ asset('img/home/64.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/66.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/67.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/68.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/69.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/70.jpg') }}" />
                                        </li>

                                        <li>
                                            <img src="{{ asset('img/home/71.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/72.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/73.jpg') }}" />
                                        </li>

                                        <li>
                                            <img src="{{ asset('img/home/74.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/75.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/76.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/77.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/78.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/79.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/80.jpg') }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('img/home/81.jpg') }}" />
                                        </li>

                                    </ul>
                                </div>{{-- end FlexSlider --}}

                                 {{-- url("./images/oriental-tiles.png");este componente se prende utilizar para agregar un carrousel interactivo background-image: url('https://images.unsplash.com/photo-1607082350899-7e105aa886ae?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80'); --}}
                            <div class="flex flex-row flex-wrap w-full h-48 p-3 bg-gray-200 rounded-lg shadow-lg">
                                <img class="w-full object-center object-fill h-48 rounded-lg" src="{{ asset('img/logos/lineaorquidea.jpg') }}" />
                            </div>{{-- end componente --}}

                            </div>

                        </div>
                    </div>
                </div>



            </div>

            {{-- Segundo Layout derecho que contiene publicidad estatica se cambia el orden de la publicidad cada ves que actualiza sesion --}}

                <div class="flex items-center px-2 py-4 mb-6 bg-white rounded-lg shadow-lg ">


                            {{-- <div
                                class="items-center min-h-screen p-1 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl">

                                <img alt="..." class="object-fill w-full min-h-screen bg-center bg-cover" src="{{ Storage::url($advertising->image) }}">

                            </div> --}}

                        <div class="items-center min-h-screen p-1 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl">
                            <img src="{{ asset('img/logos/gif-logo.gif') }}" alt="empty" class="min-h-screen ">
                        </div>

                </div>
        </div>



    </div>

    <!-- card con redericcion hacia las paginas de trivia, cursos y repositorio -->
    <section class="container px-6 py-4 mx-auto cursor-default ">
        <div class="grid gap-6 mb-8 md:grid-cols-3">
            <!-- Card 1 -->
            <a href="{{route('trivia.questions')}}">
            <div class="flex items-center p-4 transition-all duration-500 transform bg-white border-2 border-gray-200 rounded-lg shadow-xl dark:bg-gray-800 hover:shadow-2xl hover:scale-105">
                <div class="p-3 mr-0 rounded-full">
                    <img src="https://img.icons8.com/external-smashingstocks-thin-outline-color-smashing-stocks/67/000000/external-quiz-education-smashingstocks-thin-outline-color-smashing-stocks.png"/>
                </div>
                <div>
                    <p class="mb-2 text-xl text-center text-gray-800">Trivia</p>
                    <p class="text-sm text-center text-gray-800">¿Cuánto sabes sobre la biodiversidad de Venezuela?, Pon a prueba tus conocimientos.</p>
                </div>
            </div>
        </a>
            <!-- Card 2 -->
            <a href="{{route('courses.index')}}">
            <div class="flex items-center p-4 transition-all duration-500 transform bg-white border-2 border-gray-200 rounded-lg shadow-xl dark:bg-gray-800 hover:shadow-2xl hover:scale-105">
                <div class="p-3 mr-0 rounded-full">
                    <img src="https://img.icons8.com/external-bright-fill-juicy-fish/42/000000/external-course-education-bright-fill-bright-fill-juicy-fish.png"/>
                </div>
                <div>
                    <p class="mb-2 mr-4 text-xl text-center text-gray-800">Talleres </p>
                    <p class="text-sm text-center text-gray-800">Sigue desde este espacio digital todo sobre la biodiversidad de venezuela.</p>
                </div>
            </div>
        </a>
            <!-- Card 3 -->
            <a href="{{route('publications.index')}}">
            <div class="flex items-center p-4 transition-all duration-500 transform bg-white border-2 border-gray-200 rounded-lg shadow-xl dark:bg-gray-800 hover:shadow-2xl hover:scale-105">
                <div class="p-3 rounded-full">
                    <img src="https://img.icons8.com/external-flat-land-kalash/64/000000/external-library-education-and-e-learning-flat-land-kalash.png"/>
                </div>
                <div>
                    <p class="mb-2 text-xl text-center text-gray-800">Repositorio </p>
                    <p class="text-sm text-center text-gray-800"> Comparte o accede a los mejores contenidos de referencia cientificos, entre otros. {{-- entre otros, sobre la biodiversidad de nuestra Venezuela.    --}}</p>
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
                    FUNDACATTCC te ofrece talleres con lecciones de alta calidad desarrollados
                     por nuestros docentes y colaboradores para que puedas desarrollar y/o mejorar tu
                      conocimiento sobre la biodiversidad venezolana y puedas aprender de una manera flexible que se adapta a tu tiempo.
                </span>

                <div class="flex-1 w-full h-2 mx-6 bg-gray-400 rounded-full ">
                </div>

            </div>
        </div>

        <div
            class="grid px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

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
                    controlNav: "thumbnails"
                });
            });
        </script>
    @endpush

</x-app-layout>
