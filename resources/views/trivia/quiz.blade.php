<x-trivia-layout>
    <x-slot name="header">
        <p class="flex text-center justify-center font-bold uppercase">! Está a punto de comenzar a resolver el siguiente cuestionario de selección simple, revise cada pregunta antes de responder ¡; <br> Es
            muy importante que responda cada pregunta antes de completar el cuestionario.<br>
            Gracias por participar, exitos en su proceso de aprendizaje :)</p>
        '{{ $quiz->title }}' Responde las siguientes preguntas:
    </x-slot>
    <div class="container my-16 card">

        <div class="card-body">
            <form method="POST" action="{{ route('quiz.result', $quiz->slug) }}">
                @csrf
                @foreach ($quiz->questions as $question)
                    @if ($question->image)
                        <img src="{{ asset($question->image) }}" width="40%" class="mt-2 mb-2 rounded img-responsive">
                    @endif
                    <strong>
                        Preguntas {{ $loop->iteration }}:
                    </strong>
                    {{ $question->question }}
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}1" value="answer_1">
                        <label class="form-check-label" for="quiz{{ $question->id }}1">
                            {{ $question->answer_1 }}
                        </label>
                        <br>

                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}2" value="answer_2">
                        <label class="form-check-label" for="quiz{{ $question->id }}2">
                            {{ $question->answer_2 }}
                        </label>

                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}3" value="answer_3">
                        <label class="form-check-label" for="quiz{{ $question->id }}3">
                            {{ $question->answer_3 }}
                        </label>

                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}4" value="answer_4">
                        <label class="form-check-label" for="quiz{{ $question->id }}4">
                            {{ $question->answer_4 }}
                        </label>

                    </div>
                    @if (!$loop->last)
                        <hr>
                    @endif
                @endforeach
                <button class="mt-3 btn btn-primary btn-sm btn-block">Termina la trivia</button>
            </form>
        </div>
    </div>
</x-trivia-layout>
