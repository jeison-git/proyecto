<div>
    {{-- portada --}}
    <section class="object-fill" style="background-image: url({{ asset('img/trivia/trivia01.gif') }})">
        <div class="container flex items-center justify-between pt-4">

            <a href="{{ url()->previous() }}" class="mr-2">
                <img src="https://img.icons8.com/dusk/25/000000/circled-left-2.png" />
            </a>

        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2 ">
                <h1 class="md:hidden text-xl md:text-3xl text-center text-black font-bold bg-white bg-opacity-100">
                    Bienvenido a la colección de cuestionarios y/o trivias</h1>
                <p class="md:hidden mb-4 md:text-lg font-semibold text-center text-black bg-white bg-opacity-75">Pon a
                    prueba tus conocimientos informáticos y mucho más. Vuelve de vez en cuando para descubrir nuevas
                    trivias y mantente activo mentalmente mientras desafías los conocimientos de tus compañeros,
                    familiares y amigos.</p>
            </div>
        </div>
    </section>
    <div class="h-full relative z-10 mt-8" id="Trivias">
        <div>
            <p
                class="container hidden md:block mb-4 md:text-lg font-semibold text-center text-black bg-white bg-opacity-75">
                Pon a prueba tus conocimientos informáticos y mucho más. Vuelve de vez en cuando para descubrir nuevas
                trivias y mantente activo mentalmente mientras desafías los conocimientos de tus compañeros, familiares
                y amigos.</p>
        </div>
    </div>
    {{-- seccion decuestionarios resueltos --}}
    @auth{{-- opciones desplegadas luego de logearse --}}
    <section class="container mb-8 card">
        <div class="card-body">
            <h1 class="mb-4 ml-4 font-bold text-black md:text-3xl text-xl"><i class="fa fa-question"></i>
                Cuestionarios o trivias resueltas por usted: </h1>

            <ul class="grid md:grid-cols-2 gap-x-6 gap-y-2">
                @if (is_array($results) || is_object($results))
                    @forelse ($results as $result)
                        <li class="text-base text-gray-600">

                            <div class="flex items-center font-semibold text-center text-gray-800 card">
                                <i class="ml-2 mr-2 text-gray-700 fas fa-check"></i>
                                <div class="capitalize card-body">
                                    <a href="{{ route('quiz.detail', $result->quiz->slug) }}"
                                        class="hover:underline hover:text-blue-500">
                                        {{ $result->quiz->title ?? null }}
                                    </a>

                                </div>
                                <span class="float-right text-white badge badge-success badge-pill">
                                    {{ $result->point ?? null }}
                                </span>

                            </div>

                        </li>
                    @empty
                        <li class="text-base text-gray-700"></i>No hay cuestionarios resueltos por usted :( </li>
                    @endforelse
                @endif
            </ul>
        </div>
    </section>
@endauth {{-- end auth --}}
<strong class="container text-gray-600 serif font-extrabold italic px-4 py-4 md:px-24 text-xl md:text-2xl">
    CUESTIONARIOS / TRIVIAS
</strong>

<section
    class="container py-16 flex-1 {{-- min-h-auto md:flex-row p-10 --}}justify-items-center{{-- flex-wrap  sm:flex-col --}} grid md:grid-cols-4 gap-4 gap-x-2">
    @foreach ($quizzes as $quiz)
        <!-- scale -->
        <div class="h-48 w-48 relative cursor-pointer mb-5" id="{{ $quiz->id }}">
            <div class="absolute inset-0 bg-gray-400 opacity-25 rounded-lg shadow-2xl"></div>
            <div class="absolute inset-0 transform  hover:scale-75 transition duration-300">
                <div
                    class="text-semibold text-sm text-center h-full {{-- w-full --}}bg-white rounded-lg shadow-2xl">
                    <br>
                    <br>
                    <br>
                    <a type="reset" href="{{ route('quiz.detail', $quiz->slug) }}"><i
                            class="fa fa-share-square p-2"> {{ $quiz->title }} </i>
                        <small>
                            <span class="badge badge-dark badge-pill">
                                {{ $quiz->questions->count() }}
                            </span>
                            Preguntas disponibles
                        </small>

                    </a>

                </div>
            </div>
        </div>
    @endforeach
</section>

</div>
