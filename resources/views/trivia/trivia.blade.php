<x-trivia-layout>
    <x-slot name="header">
        Trivia
    </x-slot>

    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class="container my-16 card">
                <div class="card-header">
                    Cuestionarios
                </div>
                <div class="list-group">
                    @if (is_array($quizzes) || is_object($quizzes))
                        @foreach ($quizzes as $quiz)
                            <a href="{{ route('quiz.detail', $quiz->slug) }}"
                                class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $quiz->title }}</h5>
                                    <small>{{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : 'Sin límite de tiempo' }}</small>
                                </div>
                                <p class="mb-1">{{ Str::limit($quiz->description, 100, '...') }}</p>
                                <small>
                                    <span class="badge badge-dark badge-pill">
                                        {{ $quiz->questions->count() }}
                                    </span>
                                    trivias disponibles
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
        <div class="col-md-4 col-sm-12">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    Los resultados de su trivia
                    <span class="float-right">Puntos</span>
                </div>
                <ul class="list-group list-group-flush">
                    @if (is_array($results) || is_object($results))
                        @foreach ($results as $result)
                            <li class="list-group-item">
                                <a href="{{ route('quiz.detail', $result->quiz->slug) }}"
                                    class="text-decoration-none text-dark">
                                    {{ $result->quiz->title ?? null }}
                                </a>
                                <span class="float-right text-white badge badge-success badge-pill">
                                    {{ $result->point ?? null }}
                                </span>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</x-trivia-layout>
