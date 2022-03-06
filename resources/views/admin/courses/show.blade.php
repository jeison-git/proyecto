<x-guest-layout>
    {{-- imagen de presentacion y detalles del curso --}}
    <section class="bg-gray-300 py-12 shadow-lg mb-12">
        <div class="container flex items-center justify-between mb-4">

            <a href="{{ url()->previous() }}" class="mr-2 flex items-center text-base uppercase">
                <img src="https://img.icons8.com/dusk/25/000000/circled-left-2.png" /> Regresar
            </a>

        </div>
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">

            <figure>

                @if ($course->image)
                    <img class="h-64 w-full object-fill" src="{{ Storage::url($course->image->url) }}" alt="">
                @else
                    <img lass="h-60 w-full object-fill"
                        src="https://cdn.pixabay.com/photo/2015/12/22/04/00/edit-1103599__340.png" alt="">
                @endif

            </figure>

            <div class="text-black">
                <h1 class="text-4xl">{{ $course->title }}</h1>
                <h2 class="text-xl mb-3">{{ $course->subtitle }}</h2>
                <p class="mb-2"><i class="fas fa-chart-line"></i>Nivel: {{ $course->level->name }}</p>
                <p class="mb-2"><i class="fas fa-tag"></i>Asignatura: {{ $course->category->name }}</p>
                <p class="mb-2"><i class="fas fa-users"></i>Matriculados: {{ $course->students_count }}
                </p>
                <p class="mb-2"><i class="fas fa-star"></i>Calificación: {{ $course->rating }}</p>
            </div>
        </div>
    </section>

    {{-- - seccion del plan de estudio y metas --}}
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">

        @if (session('info'))
            <div class="lg:col-span-3" x-data="{open: true}" x-show="open">
                <div class="relative px-4 py-3 leading-normal border border-red-300 text-red-800 bg-red-200 rounded-lg"
                    role="alert">
                    <span class="absolute inset-y-0 left-0 flex items-center ml-2">
                        <svg x-on:click="open=false" class="w-4 h-4 fill-current" role="button" viewBox="0 0 20 20">
                            <path
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </span>
                    <p class="ml-6 text-center">{{ session('info') }}</p>
                </div>
            </div>
        @endif

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

            {{-- metas --}}
            <section class="mb-8 card">
                <div class="card-body">
                    <h1 class="mb-4 ml-4 font-bold text-black md:text-3xl text-xl"><i class="fa fa-bullseye"></i>
                        Objetivos / Plan de estudios</h1>

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

                @forelse ($course->sections as $section)
                    <article class="mb-4 shadow-lg"
                        @if ($loop->first) x-data="{ open: true }"
                        @else
                        x-data="{ open: false }" @endif>

                        <header class="bg-gray-400 shadow-lg rounded px-4 py-2 cursor-pointer" x-on:click="open= !open">
                            <h1 class="font-bold text-lg text-black">{{ $section->name }}</h1>
                        </header>
                        {{-- seccin de lecciones y barras  grises --}}
                        <div class="card py-2 px-4" x-show="open">
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-800 text-base"><i
                                            class="fas fa-play-circle mr-2 text-gray-600"></i>{{ $lesson->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </article>

                @empty

                    <article class="card">
                        <div class="card-body">
                            No hay secciones o temas asignados :(
                        </div>
                    </article>

                @endforelse
            </section>
            {{-- seccion de a quien va dirigido el curso --}}

            <section class="mb-8 card">
                <div class="card-body">
                    <h1 class="mb-4 ml-4 font-bold text-black md:text-3xl text-xl"><i class="fa fa-graduation-cap"></i>
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

        </div>

        <div class="order-1 lg:order-2">
            {{-- card para aprobar al curso --}}
            <section class="card mb-4">
                <div class="card-body">

                    <div class="flex items-center">
                        <img class="h-12 w-12 object-fill rounded-full shadow-lg"
                            src="{{ $course->teacher->profile_photo_url }}" alt="{{ $course->teacher->name }}">
                        <div class="ml-4">
                            <h1 class="font-fold text-gray-600 text-lg">Prof. {{ $course->teacher->name }}</h1>
                            <a class="text-blue-400 text-sm font-bold"
                                href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                        </div>
                    </div>

                    <form action="{{ route('admin.courses.approved', $course) }}" class="mt-4"
                        method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary w-full">Aprobar curso</button>
                    </form>
                    <a href="{{ route('admin.courses.observation', $course) }}"
                        class="btn btn-danger w-full block text-center mt-4">Observar curso</a>
                </div>
            </section>

        </div>

    </div>

</x-guest-layout>
