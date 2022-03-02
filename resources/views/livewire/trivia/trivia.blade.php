<div>
    <div class="h-full relative z-10 mt-8" id="Trivias">
        <div>
            <strong class="text-gray-600 serif font-extrabolditalic px-6 py-6 md:px-24 md:py-10 text-xl md:text-2xl">
                CUESTIONARIOS / TRIVIAS
            </strong>
        </div>
    </div>

    {{-- <div class="row min-w-screen min-h-screen flex md:flex-row items-center justify-around flex-wrap sm:flex-col justify-items-center">
        <div class="col-md-8 col-sm-12 ">
            <div class="card">
                <div class="card-header">
                    Trivias
                </div>
            <div class="list-group">
                @if (is_array($quizzes) || is_object($quizzes))
                    @foreach ($quizzes as $quiz)

                        <a href="{{ route('quiz.detail', $quiz->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start">

                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $quiz->title }}</h5>
                            <small>{{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : 'Sin limite de tiempo'}}</small>
                        </div>
                        <p class="mb-1">{{ Str::limit($quiz->description, 100, '...') }}</p>
                        <small>
                                <span class="badge badge-dark badge-pill">
                                    {{ $quiz->questions->count() }}
                                </span>
                                Trivias disponibles
                        </small>
                        </a>
                    @endforeach
                        <div class="p-2 mt-2">
                            {{ $quizzes->links() }}
                        </div>
                @endif

            </div>
            </div>
        </div>
    </div> --}}

    <section class="p-10 min-h-auto py-36 flex md:flex-row items-center justify-around flex-wrap sm:flex-col">
        @foreach ($quizzes as $quiz)
            <!-- scale -->
            <div class="h-48 w-48 relative cursor-pointer mb-5" id="{{ $quiz->id }}">
                <div class="absolute inset-0 bg-gray-400 opacity-25 rounded-lg shadow-2xl"></div>
                <div class="absolute inset-0 transform  hover:scale-75 transition duration-300">
                    <div class="text-semibold text-sm text-center h-full w-full bg-white rounded-lg shadow-2xl">
                        <br>
                        <br>
                        <br>
                        <a type="reset" href="{{ route('quiz.detail', $quiz->slug) }}"><i
                                class="fa fa-share-square p-2"> {{ $quiz->title }} </i>
                            <small>
                                <span class="badge badge-dark badge-pill">
                                    {{ $quiz->questions->count() }}
                                </span>
                                Trivias disponibles
                            </small>

                        </a>

                    </div>
                </div>
            </div>
        @endforeach
    </section>

</div>
