<x-trivia-layout>

    <x-slot name="header">
        Questions for quiz '{{ $quiz->title }}'
    </x-slot>
    @if (session('info'))
        <div class="alert alert-primary shadow-lg" role="alert">
            {{ session('info') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h5 class="card-title float-right">
                <a href="{{ route('admin.trivia.questions.create', $quiz->id) }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i>
                    Agregar preguntas
                </a>
            </h5>
            <h5 class="card-title">
                <a href="{{ route('admin.trivia.quizzes.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fa fa-arrow-left"></i>
                    Regresar a trivias
                </a>
            </h5>
            <div class="table-responsive">
                <table class="table table-bordered table-sm mt-4">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Preguntas</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">1. Respuesta</th>
                            <th scope="col">2. Respuesta</th>
                            <th scope="col">3. Respuesta</th>
                            <th scope="col">4. Respuesta</th>
                            <th scope="col">Respuesta correcta</th>
                            <th scope="col">Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quiz->questions as $question)
                            <tr>
                                <td scope="row">{{ $question->question }}</td>
                                <td scope="row" class="text-center">
                                    @if ($question->image)
                                        <a href="{{ asset($question->image) }}" target="_blank"
                                            class="btn btn-sm btn-light">
                                            Ver imagen
                                        </a>
                                    @endif
                                </td>
                                <td scope="row" class="text-center">{{ $question->answer_1 }}</td>
                                <td scope="row" class="text-center">{{ $question->answer_2 }}</td>
                                <td scope="row" class="text-center">{{ $question->answer_3 }}</td>
                                <td scope="row" class="text-center">{{ $question->answer_4 }}</td>
                                <td scope="row" class="text-center text-success font-weight-bold">
                                    {{ substr($question->correct_answer, -1) }}. Respuesta</td>
                                <td scope="row" class="text-center flex">
                                    <a href="{{ route('admin.trivia.questions.edit', [$quiz->id, $question->id]) }}"
                                        class="btn btn-sm btn-primary text-white mr-2">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <a href="{{ route('admin.trivia.questions.destroy', [$quiz->id, $question->id]) }}"
                                        class="btn btn-sm btn-danger">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-trivia-layout>
