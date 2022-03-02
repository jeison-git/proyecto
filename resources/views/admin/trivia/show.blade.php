<x-app-layout>
    <x-slot name="header">
        '{{ $quiz->title }}' Quiz Details
    </x-slot>

    <div class="card">
        <div class="card-body">
            <p class="card-text">
            <h5 class="card-title">
                <a href="{{ route('admin.trivia.quizzes.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fa fa-arrow-left"></i>
                    Regresar a trivias
                </a>
            </h5>
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Descripción de la trivia</h5>
                            <hr />
                            {{ $quiz->description }}
                        </div>
                    </div>
                    <table class="table mt-3">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Nombre-Apellido</th>
                                <th scope="col">Puntaje</th>
                                <th scope="col">Correcta</th>
                                <th scope="col">Equivocado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quiz->results as $result)
                                <tr>
                                    <td>{{ $result->user->name }}</td>
                                    <td>{{ $result->point }}</td>
                                    <td>{{ $result->correct_answer }}</td>
                                    <td>{{ $result->wrong_answer }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4 div-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Detalles de la trivia</h5>
                            <ul class="list-group mt-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Cantidad de preguntas
                                    <span class="badge badge-info badge-pill">{{ $quiz->questions->count() }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Fecha de vencimiento de la trivia
                                    <span
                                        class="badge badge-info badge-pill">{{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : 'Sin límite de tiempo' }}</span>
                                </li>
                                @if ($quiz->myResult)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Número de participantes
                                        <span
                                            class="badge badge-info badge-pill">{{ $quiz->details['join_count'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Puntuación
                                        <span
                                            class="badge badge-warning text-white badge-pill">{{ $quiz->details['average'] }}</span>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    @if (count($quiz->topTenUser) > 0)
                        <div class="card mt-3">
                            <div class="card-body">
                                <h5 class="card-title">Top 10</h5>
                                <ul class="list-group">
                                    @foreach ($quiz->topTenUser as $result)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong>{{ $loop->iteration }}.</strong>
                                            <img src="{{ $result->user->profile_photo_url }}"
                                                class="w-10 h-10 rounded-full flex">
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

</x-app-layout>
