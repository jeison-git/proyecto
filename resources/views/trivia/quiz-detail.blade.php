<x-trivia-layout>
    <x-slot name="header">
        '{{ $quiz->title }}' Detalles de la trivia
    </x-slot>
    <div class="container my-16 card">
        <div class="card-body">
            <p class="card-text">
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Descripción de la trivia</h5>
                            <hr />
                            {{ $quiz->description }}
                        </div>
                    </div>
                    @if ($quiz->myResult)
                        <a href="{{ route('quiz.join', $quiz->slug) }}"
                            class="mt-3 card-link btn btn-info btn-sm btn-block">Ver respuestas</a>
                    @elseif($quiz->finished_at > now())
                        <a href="{{ route('quiz.join', $quiz->slug) }}"
                            class="mt-3 card-link btn btn-info btn-sm btn-block">Prueba caducada</a>
                    @else
                        <a href="{{ route('quiz.join', $quiz->slug) }}"
                            class="mt-3 card-link btn btn-info btn-sm btn-block">Iniciar la trivia</a>
                    @endif
                </div>
                <div class="col-md-4 div-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Detalles de la trivia</h5>
                            <ul class="mt-3 list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Cantidad de preguntas
                                    <span class="badge badge-info badge-pill">{{ $quiz->questions->count() }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Fecha de vencimiento de la trivia
                                    <span
                                        class="badge badge-info badge-pill">{{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : 'No time limit' }}</span>
                                </li>
                                @if ($quiz->myResult)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Numero de participantes
                                        <span
                                            class="badge badge-info badge-pill">{{ $quiz->details['join_count'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Puntuación media
                                        <span
                                            class="text-white badge badge-warning badge-pill">{{ $quiz->details['average'] }}</span>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    @if ($quiz->myResult)
                        <div class="mt-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Mi resultado</h5>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Tu ranking
                                        <span
                                            class="text-white badge badge-warning badge-pill">{{ $quiz->my_rank }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Puntos
                                        <span
                                            class="badge badge-primary badge-pill">{{ $quiz->myResult->point }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Respuestas correctas / incorrectas
                                        <span
                                            class="ml-4 badge badge-success badge-pill">{{ $quiz->myResult->correct_answer }}</span>
                                        <span
                                            class="badge badge-danger badge-pill">{{ $quiz->myResult->wrong_answer }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif
                    @if (count($quiz->topTenUser) > 0)
                        <div class="mt-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Top 10</h5>
                                <ul class="list-group">
                                    @foreach ($quiz->topTenUser as $result)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong>{{ $loop->iteration }}.</strong>
                                            <img src="{{ $result->user->profile_photo_url }}"
                                                class="w-10 h-10 rounded-full">
                                            <span
                                                @if (auth()->user()->id == $result->user_id) class="text-success" @endif>{{ $result->user->name }}
                                            </span>
                                            <span class="badge badge-success badge-pill">{{ $result->point }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            </p>

        </div>
    </div>
</x-trivia-layout>
