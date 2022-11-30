<x-app-layout>
    {{-- imagen de presentacion y detalles del curso --}}

    <section class="bg-green-400 py-12 shadow-lg mb-12">

        <div class="container flex items-center justify-between mb-4">

            <a href="{{ url()->previous() }}" class="mr-2">
                <img src="https://img.icons8.com/dusk/25/000000/circled-left-2.png" />
            </a>

        </div>

        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                <img class="h-64 w-full object-fill" src="{{ Storage::url($course->image->url) }}" alt="">
            </figure>
            <div class="font-semibold text-gray-700 md:text-gray-900">

                <h1 class="text-2xl md:text-4xl">{{ $course->title }}</h1>
                <h2 class="text-2xl md:text-xl mb-3">{{ $course->subtitle }}</h2>
                <p class="mb-2"><i class="fas fa-chart-line"></i> Nivel: {{ $course->level->name }}</p>
                <p class="mb-2"><i class="fas fa-tag"></i> Asignatura: {{ $course->category->name }}</p>
                <p class="mb-2"><i class="fas fa-users"></i> Matriculados: {{ $course->students_count }}
                </p>
                <p class="mb-2"><i class="fas fa-star"></i> Calificación: {{ $course->rating }}</p>

            </div>
        </div>
    </section>

    {{-- - seccion del plan de estudio --}}
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="order-2 lg:col-span-2 lg:order-1">
            {{-- seccion de descripcion del curso --}}
            <section class="mt-4 mb-6 card">
                <div class="card-body">
                    <h1 class="flex-1 mb-4 ml-4 text-xl md:text-3xl font-bold text-black"><i class="fa fa-list"></i>
                        Descripción </h1>

                    <div class="flex items-center font-semibold text-justify text-gray-800 card">
                        <div class=" card-body">
                            {!! $course->description !!}
                        </div>
                    </div>

                </div>
            </section>
            {{-- FIN-DESCRIPCIÖN --}}

            <section class="mb-8 card">
                <div class="card-body">
                    <h1 class="mb-4 ml-4 font-bold text-black md:text-3xl text-xl"><i class="fa fa-bullseye"></i>
                        Objetivos</h1>

                    <ul class="grid grid-cols-1 gap-x-6 gap-y-2">

                        @forelse ($course->goals as $goal)
                            <li class="text-base text-gray-600">

                                <div class="flex items-center font-semibold text-center text-gray-800 card">
                                    <i class="ml-2 mr-2 text-gray-700 fas fa-check"></i>
                                    <div class="capitalize card-body">
                                        {{ $goal->name }}
                                    </div>
                                </div>

                            </li>
                        @empty
                            <li class="text-base text-gray-700"></i>No hay Metas establecidas :(</li>
                        @endforelse

                    </ul>
                </div>
            </section>

            {{-- seccin de temas --}}
            <section>
                <h1 class="font-bold text-3xl mb-2">Temario</h1>

                @foreach ($course->sections as $section)
                    <article class="mb-4 shadow-lg"
                        @if ($loop->first) x-data="{ open: true }"
                        @else

                        x-data="{ open: false }" @endif>

                        <header class="bg-gray-200 shadow-lg rounded px-4 py-2 cursor-pointer" x-on:click="open= !open">
                            <h1 class="font-bold text-lg text-gray-800"> {{ $section->name }} </h1>
                        </header>
                        {{-- seccin de lecciones y barras  grises --}}
                        <div class="card py-2 px-4" x-show="open">
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-800 text-base"><i
                                            class="fas fa-play-circle mr-2 text-gray-400"></i>{{ $lesson->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </article>
                @endforeach

                {{-- seccion de a quien va dirigido el curso --}}

                <section class="mb-8 card">
                    <div class="card-body">
                        <h1 class="mb-4 ml-4 font-bold text-black md:text-3xl text-xl"><i
                                class="fa fa-graduation-cap"></i>
                            A Quien Va Dirigido</h1>

                        <ul class="grid grid-cols-1 gap-x-6 gap-y-2">

                            @forelse ($course->audiences as $audience)
                                <li class="text-base text-gray-600">

                                    <div class="flex items-center font-semibold text-center text-gray-800 card">
                                        <i class="ml-2 mr-2 text-gray-700 fas fa-check"></i>
                                        <div class="capitalize card-body">
                                            {{ $audience->name }}
                                        </div>
                                    </div>

                                </li>
                            @empty
                                <li class="text-base text-gray-700"></i>No hay Audiencia establecida :( </li>
                            @endforelse

                        </ul>
                    </div>
                </section>

                {{-- seccion de requisitos --}}

                <section class="mb-8 card">
                    <div class="card-body">
                        <h1 class="mb-4 ml-4 font-bold text-black md:text-3xl text-xl"><i class="fas fa-dot-circle"></i>
                            Requisitos Recomendados</h1>

                        <ul class="grid grid-cols-1 gap-x-6 gap-y-2">

                            @forelse ($course->requirements as $requirement)
                                <li class="text-base text-gray-600">

                                    <div class="flex items-center font-semibold text-center text-gray-800 card">
                                        <i class="ml-2 mr-2 text-gray-700 fas fa-check"></i>
                                        <div class="capitalize card-body">
                                            {{ $requirement->name }}
                                        </div>
                                    </div>

                                </li>
                            @empty
                                <li class="text-base text-gray-700"></i>No hay Requerimientos establecidos :( </li>
                            @endforelse

                        </ul>
                    </div>
                </section>

            </section>

            <div class="my-8">
                @livewire('courses-reviews', ['course' => $course]) {{-- //se deben solucionar los errores que produce esta seccion de reseñas --}}
            </div>

        </div>

        <div class="order-1 lg:order-2">
            <section class="card mb-4">
                <div class="card-body">
                    {{-- targeta para matricularse al curso --}}
                    <div class="flex items-center">
                        <img class="h-12 w-12 object-fill rounded-full shadow-lg"
                            src="{{ $course->teacher->profile_photo_url }}" alt="{{ $course->teacher->name }}">
                        <div class="ml-4">
                            <h1 class="font-fold text-gray-600 text-lg">Prof. {{ $course->teacher->name }}</h1>
                            <a class="text-blue-400 text-sm font-bold"
                                href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                        </div>
                    </div>

                    @can('enrolled', $course)

                        <a class="btn {{-- btn-danger --}}bg-green-500 hover:bg-green-700 hover:text-white btn-block mt-4" href="{{ route('courses.status', $course) }}"> Continuar
                            con las lecciones</a>
                    @else
                        @if ($course->price->value == 0)
                            <p class="text-2xl font-semibold text-gray-500 mt-3 mb-2">{{ $course->price->name }}</p>
                            <form action="{{ route('courses.enrolled', $course) }}" method="POST">
                                @csrf
                                <button class="btn {{-- btn-danger --}}bg-purple-500 hover:bg-purple-700 hover:text-white btn-block" type="submit">Matricularse</button>
                            </form>
                        @else
                            <p class="text-2xl font-semibold text-gray-500 mt-3 mb-2">US$ {{ $course->price->value }}</p>
                            <a href="{{ route('payment.checkout', $course) }}" class="btn {{-- btn-danger --}}bg-purple-500 hover:bg-purple-700 hover:text-white btn-block">Comprar
                                este contenido</a>
                        @endif

                    @endcan

                </div>
            </section>
            {{-- seccion  que refleja otros cursos similares al que esta visualizando --}}
            <aside class="hidden lg:block">
                @foreach ($similares as $similar)
                    <article class="flex mb-6">
                        <img class="h-32 w-40 object-fill rounded shadow-lg"
                            src="{{ Storage::url($similar->image->url) }}" alt="">
                        <div class="ml-3">

                            <h1>
                                <a class="font-bold text-gray-900 mb-3"
                                    href="{{ route('courses.show', $similar) }}">{{ Str::limit($similar->title, 40) }}</a>
                            </h1>

                            <div class="flex items-center">
                                <img class="h-8 w-8 object-fill rounded-full shadow-lg"
                                    src="{{ $similar->teacher->profile_photo_url }}" alt="">
                                <p class="text-gray-700 text-sm ml-2">{{ $similar->teacher->name }}</p>
                            </div>

                            <p class="text-sm"><i
                                    class="fas fa-star text-yellow-400 mr-2"></i>{{ $similar->rating }}</p>

                        </div>
                    </article>
                @endforeach
            </aside>

        </div>

    </div>

</x-app-layout>
